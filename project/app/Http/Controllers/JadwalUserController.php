<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;

class jadwalUser extends Controller
{
    public function index()
    {
        $jadwal = Jadwal::all(); // Mengambil semua data jadwal dari model Jadwal
        return view('jadwalUser', compact('jadwal')); // Mengirim data jadwal ke view 'jadwalUser'
    }

    public function deleteJadwal($id_jadwal)
    {
        $jadwal = Jadwal::findorFail($id_jadwal); // Mencari jadwal berdasarkan ID yang diberikan, jika tidak ditemukan akan menghasilkan error 404
        if ($jadwal) {
            $jadwal->delete(); // Menghapus jadwal jika ditemukan
            return redirect()->back()->with('success', 'Jadwal berhasil dihapus!'); // Redirect kembali dengan pesan sukses
        } else {
            return redirect()->back()->with('error', 'Jadwal tidak ditemukan!'); // Redirect kembali dengan pesan error
        }
    }
}
