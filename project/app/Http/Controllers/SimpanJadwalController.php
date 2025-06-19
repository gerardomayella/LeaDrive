<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instruktur;
use App\Models\Jadwal;
use Illuminate\Support\Facades\Log;

class SimpanJadwalController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'tanggal' => 'required|date',
            'metode_pembayaran' => 'required|string',
        ]);

        $instruktur = Instruktur::where('nama', $request->nama)->firstOrFail();

        $userId = auth()->id();
        Log::info('User ID:', ['user_id' => $userId]); // Log user_id untuk debugging

        // Simpan data ke tabel Jadwal
        Jadwal::create([
            'nama_instruktur' => $instruktur->nama, // Ambil nama instruktur dari tabel Instruktur
            'jam_pengajar' => $instruktur->jam_pengajar, // Ambil jam_pengajar dari tabel Instruktur
            'tanggal' => $validatedData['tanggal'],
            'metode_pembayaran' => $validatedData['metode_pembayaran'], // Simpan metode pembayaran
            'harga' => $instruktur->harga, // Ambil harga dari tabel Instruktur
            'user_id' => $userId, // Pastikan auth()->id() digunakan
        ]);

        // Redirect ke halaman berhasil
        return redirect()->route('berhasil');
        
    }
}
