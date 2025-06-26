<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\AkunKomunitas;
use App\Models\GambarCampaign;
use Illuminate\Support\Facades\DB;

class CampaignController extends Controller
{
    public function show($id)
    {
        $user = auth()->user();

        // Ambil campaign beserta gambar
        $campaign = \App\Models\Campaign::with('gambar_campaign')->findOrFail($id);

        // Cek role berdasarkan jenis_akun_id
        if ($user->jenis_akun_id == 1) {
            return view('detailcampaignvol', compact('campaign'));
        } elseif ($user->jenis_akun_id == 2) {
            if ($campaign->akun_id == $user->id) {
                return view('detailcampaigncom', compact('campaign'));
            } else {
                return view('detailcampaignvol', compact('campaign'));
            }
        } else {
            abort(403, 'Role tidak dikenali');
        }
    }

    public function showCom($id)
    {
        // Ambil campaign beserta gambar dan partisipan+usernya sekaligus (eager loading)
        $campaign = \App\Models\Campaign::with([
            'gambar_campaign',
            'partisipanCampaigns.akun'
        ])->findOrFail($id);

        // Kirim ke blade
        return view('detailcampaigncom', compact('campaign'));
    }

    public function bookmark($id, Request $request)
    {
        $akunId = Auth::id();
        // Cek jika sudah pernah bookmark
        $exists = DB::table('campaign_ditandai')
            ->where('akun_id', $akunId)
            ->where('campaign_id', $id)
            ->exists();

        if (!$exists) {
            DB::table('campaign_ditandai')->insert([
                'akun_id' => $akunId,
                'campaign_id' => $id,
            ]);
        }

        return back()->with('success', 'Campaign berhasil ditandai!');
    }

    public function unbookmark($id)
    {
        $akunId = auth()->id();
        \DB::table('campaign_ditandai')
            ->where('akun_id', $akunId)
            ->where('campaign_id', $id)
            ->delete();

        return back()->with('success', 'Bookmark dihapus!');
    }

    public function edit($id)
    {
        $user = auth()->user();
        $campaign = Campaign::findOrFail($id);

        // Hanya izinkan jika user komunitas dan pemilik campaign
        if ($user->jenis_akun_id == 2 && $campaign->akun_id == $user->id) {
            return view('editcampaign', compact('campaign'));
        } else {
            abort(403, 'Anda tidak memiliki akses untuk mengedit campaign ini');
        }
    }

    public function update(Request $request, $id)
    {
        // dd($request->file('gambar_latar'));
        $request->validate([
            'nama_campaign' => 'required|string|max:100',
            'deskripsi_campaign' => 'required|string',
            'waktu' => 'required|date_format:d-m-Y H:i',
            'kuota_partisipan' => 'required|integer|min:10',
            'alamat_singkat' => 'required|string|max:100',
            'gambar_latar.*' => 'nullable|image|mimes:jpeg,png,jpg,svg,gif|max:2048',
        ]);

        $success = false;
        // Update campaign
        $campaign = Campaign::findOrFail($id);
        $oldData = $campaign->toArray();
        $campaign->nama = $request->nama_campaign;
        $campaign->deskripsi = $request->deskripsi_campaign;
        $campaign->waktu_diperbarui = now();
        $campaign->waktu = \Carbon\Carbon::createFromFormat('d-m-Y H:i', $request->waktu)->format('Y-m-d H:i:s');
        $campaign->kuota_partisipan = $request->kuota_partisipan;
        $campaign->lokasi = $request->alamat_singkat;
        if ($campaign->isDirty()) {
            $campaign->save();
            $success = true;
        }

        // Hapus gambar yang dihapus user (jika ada)
        if ($request->has('gambar_dihapus')) {
            foreach ($request->gambar_dihapus as $idGambar) {
                $gambar = GambarCampaign::find($idGambar);
                if ($gambar) {
                    if (!filter_var($gambar->gambar, FILTER_VALIDATE_URL)) {
                        \Storage::disk('public')->delete($gambar->gambar);
                    }
                    $gambar->delete();
                    $success = true;
                }
            }
        }

        // Tambah gambar baru (maksimal 3 gambar total, isCover urut 1-3)
        if ($request->hasFile('gambar_latar')) {
            $gambarLama = GambarCampaign::where('campaign_id', $campaign->id)->orderBy('isCover')->get();
            $jumlahGambarLama = $gambarLama->count();
            $gambarBaru = $request->file('gambar_latar');
            if (!is_array($gambarBaru)) {
                $gambarBaru = $gambarBaru ? [$gambarBaru] : [];
            }
            \Log::info('DEBUG_GAMBAR_BARU', ['gambarBaru' => $gambarBaru]);
            // dd($gambarBaru); // Uncomment baris ini untuk debug langsung di browser
            $sisaSlot = 3 - $jumlahGambarLama;
            $startIsCover = $jumlahGambarLama + 1;
            foreach (array_slice($gambarBaru, 0, $sisaSlot) as $idx => $file) {
                if ($file && $file->isValid()) {
                    $path = $file->store('gambar_campaign', 'public');
                    $gambar = GambarCampaign::create([
                        'campaign_id' => $campaign->id,
                        'gambar' => $path,
                        'isCover' => $startIsCover + $idx,
                    ]);
                    \Log::info('DEBUG_GAMBAR_SIMPAN', ['gambar' => $gambar]);
                    $success = true;
                } else {
                    \Log::error('DEBUG_FILE_TIDAK_VALID', ['file' => $file]);
                }
            }
        }

        if (!$success) {
            return redirect()->back()->with('error', 'Tidak ada perubahan data atau gambar yang berhasil disimpan.')->withInput();
        }

        return redirect()->back()->with('success', 'Campaign berhasil diperbarui!');
    }

    public function akun()
    {
        return $this->belongsTo(\App\Models\User::class, 'akun_id');
    }

    public function nullify($id)
    {
        $campaign = \App\Models\Campaign::findOrFail($id);

        // Set semua kolom selain id menjadi NULL
        $campaign->nama = null;
        $campaign->waktu = null;
        $campaign->waktu_diperbarui = null;
        $campaign->deskripsi = null;
        $campaign->lokasi = null;
        $campaign->kontak = null;
        $campaign->kuota_partisipan = null;
        $campaign->save();

        return back()->with('success', 'Data campaign telah dinull-kan!');
    }

    public function hapusGambar($id)
    {
        $gambar = \App\Models\GambarCampaign::find($id);
        if ($gambar) {
            // Hapus file dari storage jika bukan URL
            if (!filter_var($gambar->gambar, FILTER_VALIDATE_URL)) {
                \Storage::disk('public')->delete($gambar->gambar);
            }
            $gambar->delete();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false], 404);
    }
}
