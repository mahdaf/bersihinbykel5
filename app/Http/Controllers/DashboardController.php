<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\PartisipanCampaign;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $userCampaigns = collect();
        if ($user) {
            $userCampaigns = PartisipanCampaign::with('campaign.coverImage')
                ->where('akun_id', $user->id)
                ->whereHas('campaign', function($q) {
                    $q->where('waktu', '>=', now());
                })
                ->get()
                ->map(function($partisipan) {
                    return $partisipan->campaign;
                })
                ->filter()
                ->sortByDesc('waktu') // urutkan berdasarkan waktu DESC (terdekat dulu)
                ->take(3) // ambil 3 terdekat
                ->values(); // reset index agar urut
        }

        $recommendedCampaigns = Campaign::with('coverImage')
            ->withCount('partisipanCampaigns') // relasi ke tabel partisipan_campaign
            ->where('waktu', '>', now()) // hanya campaign yang masih valid pada H-1
            ->orderByDesc('partisipan_campaigns_count') // urutkan dari yang paling banyak partisipan
            ->orderBy('id') // jika jumlah sama, urutkan berdasarkan id campaign
            ->take(3)
            ->get();

        return view('dashboard', compact('userCampaigns', 'recommendedCampaigns', 'user'));
    }

    public function allTerdaftar()
    {
        $user = Auth::user();

        $userCampaigns = collect();
        if ($user) {
            $userCampaigns = PartisipanCampaign::with('campaign.coverImage')
                ->where('akun_id', $user->id)
                ->whereHas('campaign', function($q) {
                    $q->where('waktu', '>=', now());
                })
                ->get()
                ->map(function($partisipan) {
                    return $partisipan->campaign;
                })
                ->filter()
                ->sortByDesc('waktu')
                ->values();
        }

        return view('allterdaftar', compact('userCampaigns', 'user'));
    }

    public function allRekomendasi()
    {
        $recommendedCampaigns = Campaign::with('coverImage')
            ->withCount('partisipanCampaigns')
            ->where('waktu', '>', now())
            ->orderByDesc('partisipan_campaigns_count')
            ->orderBy('id')
            ->get();

        return view('allrekomendasi', compact('recommendedCampaigns'));
    }
}
