<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PemesananController extends Controller
{
    public function show($nama)
    {
        // Anda dapat mengirimkan data ke view berdasarkan nama
        return view('pemesanan', ['nama' => $nama]);
    }
}
