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
            'nomorTelepon' => 'required|digits_between:9,15|numeric',
            'motivasi' => 'nullable|string|max:200',
        ], [
            'nomorTelepon.digits_between' => 'Nomor telepon harus 9-15 digit.',
            'nomorTelepon.numeric' => 'Nomor telepon hanya boleh angka.',
            'motivasi.max' => 'Motivasi tidak boleh melebihi 200 karakter.',
        ]);

        PartisipanCampaign::create([
            'akun_id' => Auth::id(),
            'campaign_id' => $id,
            'nama' => $request->nama,
            'email' => $request->email,
            'nomorTelepon' => $request->nomorTelepon,
            'motivasi' => $request->motivasi,
        ]);

        // Tampilkan halaman berhasil daftar
        return view('berhasil-daftar', ['campaign_id' => $id]);
    }

    public function akun()
    {
        return $this->belongsTo(\App\Models\User::class, 'akun_id');
    }
}