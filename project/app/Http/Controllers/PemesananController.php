<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instruktur; // Use the Instruktur model
use App\Models\Mobil;

class PemesananController extends Controller
{
    public function show($name)
    {
        // Fetch instruktur data based on the name (case-insensitive)
        $instruktur = Instruktur::whereRaw('LOWER(nama) = ?', [strtolower($name)])->first();

        if (!$instruktur) {
            abort(404, 'Instruktur not found');
        }

        // Fetch transmisi based on name with fallback
        $transmisi = match (strtolower($name)) {
            'mas_irgi' => 'Matic',
            'gerardo' => 'Manual',
            'ditus' => 'Matic',
            'samuel' => 'Manual',
            default => Mobil::whereRaw('LOWER(nama) = ?', [strtolower($name)])->value('transmisi') ?? 'Unknown',
        };

        // Fetch user_id from the authenticated user
        $user_id = auth()->id();

        // Pass the data to the view
        return view('pemesanan', [
            'nama' => $instruktur->nama, // From the 'nama' column
            'email' => $instruktur->email, // From the 'email' column
            'no_hp' => $instruktur->no_hp, // From the 'no_hp' column
            'jam_pengajar' => $instruktur->jam_pengajar, // From the 'jam_pengajar' column
            'transmisi' => $transmisi, // From the 'transmisi' column
            'harga' => $instruktur->harga, // From the 'harga' column
            'user_id' => $user_id, // Add user_id from the authenticated user
        ]);
    }
}