<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->query('q');

        if (!$query) {
            return view('search');
        }

        $campaigns = Campaign::where('nama', 'LIKE', "%{$query}%")
            ->orWhere('deskripsi', 'LIKE', "%{$query}%")
            ->paginate(9)
            ->withQueryString();

        return view('search', [
            'campaigns' => $campaigns,
            'query' => $query
        ]);
    }
}
