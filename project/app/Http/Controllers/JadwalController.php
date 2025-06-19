<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;

class JadwalController extends Controller
{
    public function index()
{
     $jadwal = Jadwal::all(); // Mengambil semua data instruktur dari model Instruktur
        return view('jadwalSaya', compact('jadwal')); // Mengirim data jadwal ke view 'jadwalSaya'
}
}
