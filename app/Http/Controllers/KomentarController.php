<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komentar;
use Illuminate\Support\Facades\Auth;

class KomentarController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'komentar' => 'required|string|max:280',
        ]);

        $komentar = Komentar::create([
            'akun_id' => Auth::id(),
            'campaign_id' => $id,
            'komentar' => $request->komentar,
        ]);

        // Untuk AJAX, bisa return JSON
        return response()->json([
            'success' => true,
            'komentar' => [
                'id' => $komentar->id,
                'akun_id' => $komentar->akun_id,
                'campaign_id' => $komentar->campaign_id,
                'komentar' => $komentar->komentar,
                'created_at' => $komentar->created_at->diffForHumans(),
                'user' => Auth::user()->namaPengguna,
                'avatar' => Auth::user()->fotoProfil,
            ]
        ]);
    }
}
