<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Campaign;

class ProfilCommunityController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $campaigns = collect();
        if ($user) {
            $campaignsAll = Campaign::with('coverImage')
                ->where('akun_id', $user->id)
                ->whereNotNull('nama') // hanya campaign yang valid
                ->get();

            $now = now();
            $campaignsBerlangsung = $campaignsAll->filter(function($c) use ($now) {
                $waktuDiperbarui = \Carbon\Carbon::parse($c->waktu_diperbarui);
                $waktu = \Carbon\Carbon::parse($c->waktu);
                return $now->gte($waktuDiperbarui->copy()->addSeconds(60)) && $now->lt($waktu);
            });
            $campaignsSelesai = $campaignsAll->filter(function($c) use ($now) {
                $waktu = \Carbon\Carbon::parse($c->waktu);
                return $now->gte($waktu);
            });
        }

        return view('profilcommunity', [
            'user' => $user,
            'campaignsAll' => $campaignsAll ?? collect(),
            'campaignsBerlangsung' => $campaignsBerlangsung ?? collect(),
            'campaignsSelesai' => $campaignsSelesai ?? collect(),
        ]);
    }
}
