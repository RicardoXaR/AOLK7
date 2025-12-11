<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MerchandiseController extends Controller
{
    public function index()
    {
        return view('merchandise.index');
    }
}
