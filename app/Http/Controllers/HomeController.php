<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Charity;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $charities = Charity::where('is_high_impact', true)
                            ->where('is_verified', true)
                            ->inRandomOrder()
                            ->take(6)
                            ->get();

        return view('home', compact('categories', 'charities'));
    }

    public function about()
    {
        return view('about');
    }

    public function profile()
    {
        $user = auth()->user();
        return view('profile', compact('user'));
    }
}
