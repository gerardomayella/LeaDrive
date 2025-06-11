<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BerhasilController extends Controller
{
    public function store(Request $request)
    {
        return view('berhasil');
    }
}
