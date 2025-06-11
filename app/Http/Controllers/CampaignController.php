<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function show($id)
    {
        $campaign = Campaign::findOrFail($id);
        return view('detailcampaign', compact('campaign'));
    }
}