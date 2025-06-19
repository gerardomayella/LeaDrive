<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function jadwalKursus()
    {
        return view('admin.jadwal-kursus');
    }
}
