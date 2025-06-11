<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;
use Auth;

class CampaignController extends Controller
{
    public function show($id)
    {
        $campaign = Campaign::with('gambar_campaign')->findOrFail($id);
        $komentar = \App\Models\Komentar::with('akun')->where('campaign_id', $id)->orderBy('created_at', 'desc')->get();
        $user = Auth::user();

        return view('detailcampaignvol', compact('campaign', 'komentar', 'user'));
    }
}