<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Campaign;

class CampaignController extends Controller
{
    public function show($id)
    {
        // Ambil data campaign beserta gambar-gambarnya
        $campaign = \App\Models\Campaign::with(['gambar_campaign' => function($q) {
            $q->orderBy('id');
        }])->findOrFail($id);

        return view('detailcampaignvol', compact('campaign'));
    }

    public function showCom($id)
    {
        $campaign = \App\Models\Campaign::with('gambar_campaign')->findOrFail($id);
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
}