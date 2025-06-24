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
        $campaign = Campaign::findOrFail($id);
        // return view edit campaign, misal:
        return view('editcampaign', compact('campaign'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_campaign' => 'required|string|max:100',
            'deskripsi_campaign' => 'required|string',
            'tanggal' => 'required',
            'alamat_campaign' => 'required|string|max:100',
            'portofolio' => 'nullable|file|mimes:pdf,doc,docx',
            'gambar_latar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Update campaign
        $campaign = Campaign::findOrFail($id);
        $campaign->nama = $request->nama_campaign;
        $campaign->deskripsi = $request->deskripsi_campaign;
        $campaign->waktu_diperbarui = $request->tanggal;
        $campaign->lokasi = $request->alamat_campaign;
        $campaign->save();

        // Update portofolio akun komunitas
        if ($request->hasFile('portofolio')) {
            $path = $request->file('portofolio')->store('portofolio', 'public');
            AkunKomunitas::updateOrCreate(
                ['akun_id' => Auth::id()],
                ['portofolio' => $path]
            );
        }

        // Update gambar latar campaign
        if ($request->hasFile('gambar_latar')) {
            $path = $request->file('gambar_latar')->store('gambar_campaign', 'public');
            GambarCampaign::updateOrCreate(
                ['campaign_id' => $campaign->id, 'isCover' => true],
                ['gambar' => $path]
            );
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

}