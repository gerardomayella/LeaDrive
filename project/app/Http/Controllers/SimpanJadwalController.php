<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Instruktur; // Pastikan model Instruktur sudah ada

class JadwalController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'tanggal' => 'required|date',
            'lokasi' => 'required|string|max:255',
            'instruktur_id' => 'required|exists:instruktur,id', // Validasi ID instruktur
        ]);

        // Ambil data jam_pengajar dari tabel Instruktur
        $instruktur = Instruktur::find($validatedData['instruktur_id']);
        if (!$instruktur) {
            return redirect()->back()->withErrors(['instruktur_id' => 'Instruktur tidak ditemukan.']);
        }

        // Simpan data ke tabel Jadwal
        Jadwal::create([
            'tanggal' => $validatedData['tanggal'],
            'jam' => $instruktur->jam_pengajar, // Ambil jam_pengajar dari tabel Instruktur
            'lokasi' => $validatedData['lokasi'],
        ]);

        // Redirect ke halaman selesai dengan pesan sukses
        return redirect()->route('selesai')->with('success', 'Pemesanan berhasil disimpan!');
    }
}