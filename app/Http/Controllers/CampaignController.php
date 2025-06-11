<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}