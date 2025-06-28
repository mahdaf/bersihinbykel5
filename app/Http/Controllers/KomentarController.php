<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Komentar;

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

        // Ambil ulang komentar beserta relasi user
        $komentar = Komentar::with('akun')->find($komentar->id);

        return response()->json([
            'success' => true,
            'komentar' => [
                'id' => $komentar->id,
                'akun_id' => $komentar->akun_id,
                'campaign_id' => $komentar->campaign_id,
                'komentar' => $komentar->komentar,
                'created_at' => $komentar->created_at->diffForHumans(),
                'user' => $komentar->akun->namaPengguna ?? '',
                'avatar' => $komentar->akun->fotoProfil ?? '',
            ]
        ]);
    }

    public function like($id, Request $request)
    {
        $user = auth()->user();
        $komentar = Komentar::findOrFail($id);

        // Cek apakah user sudah like
        $liked = $komentar->likes()->where('akun_id', $user->id)->exists();

        if ($liked) {
            // Unlike
            $komentar->likes()->detach($user->id);
        } else {
            // Like
            $komentar->likes()->attach($user->id);
        }

        return response()->json([
            'success' => true,
            'liked' => !$liked,
            'count' => $komentar->likes()->count(),
        ]);
    }
}