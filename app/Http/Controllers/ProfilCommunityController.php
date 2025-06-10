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
            $campaigns = Campaign::with('coverImage')
                ->where('akun_id', $user->id)
                ->get();
        }

        return view('profilcommunity', compact('campaigns', 'user'));
    }
}
