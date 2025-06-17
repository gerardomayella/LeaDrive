<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Import DB facade

class AdminController extends Controller
{
    public function index()
    {
        // Fetch data from the "Instruktur" table
        $instructors = DB::table('Instruktur')->get();

        // Pass the data to the view
        return view('admin.dashboard', ['instructors' => $instructors]);
    }

    public function jadwalKursus()
    {
        // Fetch data from the "Jadwal" table
        $jadwalKursus = DB::table('Jadwal')->get();

        // Pass the data to the view
        return view('admin.jadwal_kursus', ['jadwalKursus' => $jadwalKursus]);
    }
}
