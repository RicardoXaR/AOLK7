<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Submission;
use App\Models\Category;

class SubmissionController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('submissions.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'program_name' => 'required|string|max:255',
            'organization_name' => 'required|string|max:255',
            'category' => 'required|string',
            'country' => 'required|string',
            'website_url' => 'nullable|url',
            'contact_email' => 'required|email',
            'description' => 'required|string|min:50',
        ]);

        Submission::create($validated);

        return redirect()->route('home')->with('success', 'Thank you! Your charity program has been submitted for review.');
    }
}
