<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Charity;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Ambil data charity buat dikelola (paginate 10 biar rapi)
        $charities = Charity::latest()->paginate(10);
        return view('admin.dashboard', compact('charities'));
    }
}
