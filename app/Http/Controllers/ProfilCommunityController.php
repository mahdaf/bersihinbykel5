<?php

namespace App\Http\Controllers;

use App\Models\Campaign;

class ProfilCommunityController extends Controller
{
    public function show()
    {
        $campaigns = Campaign::with('coverImage')->get();
        return view('profilcommunity', compact('campaigns'));
    }
}
