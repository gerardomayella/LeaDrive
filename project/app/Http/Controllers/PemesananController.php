<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instruktur; // Use the Instruktur model

class PemesananController extends Controller
{
    public function show($name)
    {
        // Fetch instruktur data based on the name (case-insensitive)
        $instruktur = Instruktur::whereRaw('LOWER(nama) = ?', [strtolower($name)])->first();

        if (!$instruktur) {
            abort(404, 'Instruktur not found');
        }

        // Pass the data to the view
        return view('pemesanan', [
            'nama' => $instruktur->nama, // From the 'nama' column
            'email' => $instruktur->email, // From the 'email' column
            'no_hp' => $instruktur->no_hp, // From the 'no_hp' column
            'jam_pengajar' => $instruktur->jam_pengajar, // From the 'jam_pengajar' column
        ]);
    }
}
