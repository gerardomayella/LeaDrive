<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PemesananController extends Controller
{
    // Tampilkan form berdasarkan slug
    public function showBySlug($slug)
    {
        return view('pemesanan', ['slug' => $slug]);
    }

    // Proses simpan data form
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'telepon' => 'required|string|max:20',
            'slug' => 'required|string',
        ]);

        // Simulasi simpan data - bisa diubah ke database jika perlu
        // Pemesanan::create([...]);

        return redirect()->back()->with('success', 'Pemesanan untuk ' . $request->slug . ' berhasil dikirim!');
    }
}

?>