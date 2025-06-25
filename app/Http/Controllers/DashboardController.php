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
            // campaign
            if ($user->jenis_akun_id == 2) { // Community
                $userCampaigns = Campaign::with('coverImage')
                    ->where('akun_id', $user->id)
                    ->orderBy('waktu', 'desc')
                    ->take(3)
                    ->get();
            }
            // volunteer
            elseif ($user->jenis_akun_id == 1) { // Volunteer
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
                    ->take(3)
                    ->values();
            }
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
        $campaigns = Campaign::with('coverImage')
            ->withCount('partisipanCampaigns')
            ->where('waktu', '>', now())
            ->orderByDesc('partisipan_campaigns_count')
            ->orderBy('id')
            ->paginate(9);

        return view('allrekomendasi', compact('campaigns'));
    }

    public function campaignFollowed()
    {
        $user = Auth::user();

        $campaignIds = PartisipanCampaign::where('akun_id', $user->id)
            ->whereHas('campaign', function ($q) {
                $q->where('waktu', '>=', now());
            })
            ->pluck('campaign_id');

        $campaigns = Campaign::with('coverImage')
            ->whereIn('id', $campaignIds)
            ->orderByDesc('waktu')
            ->paginate(9);

        $title = "Campaign Yang Terdaftar";
        $emptyMessage = "Belum ada campaign yang kamu ikuti";
        return view('sectioncamp1', compact('campaigns', 'title', 'emptyMessage'));
    }

    public function campaignCreated()
    {
        $user = Auth::user();
        $campaigns = Campaign::with('coverImage')
            ->where('akun_id', $user->id)
            ->orderBy('waktu', 'desc')
            ->paginate(9);

        $title = "Campaign Yang Dibuat";
        $emptyMessage = "Belum ada campaign yang kamu buat";
        return view('sectioncamp1', compact('campaigns', 'title', 'emptyMessage'));
    }
}
