<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instruktur; // Import the Instruktur model

class PemesananController extends Controller
{
    public function show($slug)
    {
    // Manual mapping dari nama instruktur (slug) ke ID di database
    $mapping = [
        'gerardo' => [
            'id' => 1,
            'nama' => 'Gerardo',
            'jam' => '09:00 - 16:00 WIB',
        ],
        'ditus' => [
            'id' => 2,
            'nama' => 'Ditus',
            'jam' => '08:00 - 15:00 WIB',
        ],
        'mas_Irgi' => [
            'id' => 3,
            'nama' => 'Mas Irgi',
            'jam' => '10:00 - 17:00 WIB',
        ],
        'samuel' => [
            'id' => 4,
            'nama' => 'Samuel',
            'jam' => '11:00 - 16:00 WIB',
        ]
    ];

    // Cek apakah slug valid
    if (!array_key_exists($slug, $mapping)) {
        abort(404);
    }

    // Ambil ID
    $id = $mapping[$slug]['id'];
    
    // Ambil data email dan no_hp dari database berdasarkan ID
    $instruktur = \App\Models\Instruktur::find($id);

    if (!$instruktur) {
        abort(404, "Instruktur tidak ditemukan di database");
    }

    return view('pemesanan', [
        'slug' => $slug,
        'nama' => $mapping[$slug]['nama'],
        'jam' => $mapping[$slug]['jam'],
        'email' => $instruktur->email,
        'no_hp' => $instruktur->no_hp,
    ]);
    }

    public function store(Request $request)
    {
    $tanggal = $request->input('tanggal');
    $slug = $request->input('slug');
    
    return back()->with('success', "Pemesanan kursus '$slug' untuk tanggal $tanggal berhasil!");
    }
}

?>