<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function show()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        if ($user->jenis_akun_id == 1) {
            // Volunteer
            return app(\App\Http\Controllers\ProfilVolunteerController::class)->show();
        } elseif ($user->jenis_akun_id == 2) {
            // Community
            return app(\App\Http\Controllers\ProfilCommunityController::class)->show();
        } else {
            abort(403, 'Tipe akun tidak dikenali.');
        }
    }
}
