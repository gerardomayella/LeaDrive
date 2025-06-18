<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instruktur;
use App\Models\Jadwal;

class SimpanJadwalController extends Controller
{
    public function store(Request $request)
    {
        // // Validasi input
        // $validatedData = $request->validate([
        //     'instruktur_id' => 'required|exists:instrukturs,id', // Pastikan instruktur_id valid
        //     'tanggal' => 'required|date',
        //     'lokasi' => 'required|string|max:255',
        //     'metode_pembayaran' => 'required|string',
        // ]);

        // // Ambil data instruktur berdasarkan instruktur_id
        // $instruktur = Instruktur::findOrFail($validatedData['instruktur_id']);

        // // Simpan data ke tabel Jadwal
        // Jadwal::create([
        //     'jam_pengajar' => $instruktur->jam_pengajar, // Ambil jam_pengajar dari tabel Instruktur
        //     'tanggal' => $validatedData['tanggal'],
        //     'lokasi' => $validatedData['lokasi'],
        //     'metode_pembayaran' => $validatedData['metode_pembayaran'],
        // ]);

        // // Redirect ke halaman berhasil
        // return redirect()->route('berhasil');
        dd('Data diterima', $request->all());
    }
}
