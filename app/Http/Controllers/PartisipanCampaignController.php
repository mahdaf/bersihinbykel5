<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PartisipanCampaign;
use Illuminate\Support\Facades\Auth;

class PartisipanCampaignController extends Controller
{
    public function create($id)
    {
        return view('form-pendaftaran', ['campaign_id' => $id]);
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'nomorTelepon' => 'required|string|max:100',
        ]);

        PartisipanCampaign::create([
            'akun_id' => Auth::id(),
            'campaign_id' => $id,
            'nama' => $request->nama,
            'email' => $request->email,
            'nomorTelepon' => $request->nomorTelepon,
        ]);

        // Tampilkan halaman berhasil daftar
        return view('berhasil-daftar', ['campaign_id' => $id]);
    }
}