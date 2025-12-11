<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Charity;

class CauseController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        $query = Charity::where('is_verified', true);

        // --- 1. SEARCH BAR & QUICK FILTERS ---
        if ($request->has('search') && $request->search != null) {
            $search = $request->search;

            // A. FITUR TRENDING (Klik #Trending)
            if (strtolower($search) == 'trending') {
                $query->where('is_trending', true);
            }
            // B. FITUR LOCAL (Klik #Local)
            elseif (strtolower($search) == 'local') {
                if (auth()->check() && auth()->user()->country) {
                    $userCountry = auth()->user()->country;
                } else {
                    $userCountry = 'Indonesia';
                }

                $query->where('country', 'LIKE', "%$userCountry%");
            }
            // C. SEARCH MANUAL
            else {
                $query->where(function($q) use ($search) {
                    $q->where('name', 'LIKE', "%$search%")
                      ->orWhere('description', 'LIKE', "%$search%")
                      ->orWhere('country', 'LIKE', "%$search%") // Bisa cari negara juga
                      ->orWhereHas('categories', function($catQuery) use ($search) {
                          $catQuery->where('name', 'LIKE', "%$search%");
                      });
                });
            }
        }

        // --- 2. STRICT CATEGORY FILTER  ---
        if ($request->has('category') && $request->category != null) {
            $catName = $request->category;
            $query->whereHas('categories', function($q) use ($catName) {
                $q->where('name', $catName);
            });
        }

        // --- 3. SORTING ---
        if ($request->has('sort')) {
            switch ($request->sort) {
                case 'impact_score': $query->orderBy('impact_score', 'desc'); break;
                case 'a-z': $query->orderBy('name', 'asc'); break;
                case 'newest': default: $query->latest(); break;
            }
        } else {
            $query->orderBy('is_trending', 'desc')
                  ->orderBy('impact_score', 'desc');
        }

        $charities = $query->paginate(9)->withQueryString();

        return view('causes.index', compact('categories', 'charities'));
    }

    public function show(Charity $charity)
    {
        return view('causes.show', compact('charity'));
    }
}
