<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instruktur;
use App\Models\Jadwal;

class SimpanJadwalController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'tanggal' => 'required|date',
            'lokasi' => 'required|string|max:255',
            'metode_pembayaran' => 'required|string',
        ]);

        $jam_pengajar = Instruktur::where('nama', $request->nama)->value('jam_pengajar');
        $instruktur = Instruktur::where('nama', $request->nama)->firstOrFail();

        // Simpan data ke tabel Jadwal
        Jadwal::create([
            'nama_instruktur' => $instruktur->nama, // Ambil nama instruktur dari tabel Instruktur
            'jam_pengajar' => $instruktur->jam_pengajar, // Ambil jam_pengajar dari tabel Instruktur
            'tanggal' => $validatedData['tanggal'],
            'lokasi' => $validatedData['lokasi'],
            'metode_pembayaran' => $validatedData['metode_pembayaran'], // Simpan metode pembayaran
        ]);

        // Redirect ke halaman berhasil
        return redirect()->route('berhasil');
        
    }
}
