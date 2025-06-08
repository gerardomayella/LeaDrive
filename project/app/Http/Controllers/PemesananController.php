<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PemesananController extends Controller
{
    public function show($slug)
    {
        $dataKursus = [
            'ditus' => [
                'nama' => 'Ditus',
                'telepon' => '08123456789',
                'email' => 'ditus@gmail.com',
                'jam' => '08:00 - 15:00 WIB',
            ],
            'mas_Irgi' => [
                'nama' => 'Mas Irgi',
                'telepon' => '0811223344',
                'email' => 'irgi@gmail.com',
                'jam' => '09:00 - 16:00 WIB',
            ],
            'gerardo' => [
                'nama' => 'gerardo',
                'telepon' => '0811223344',
                'email' => 'irgi@gmail.com',
                'jam' => '09:00 - 16:00 WIB',
            ],
            'samuel' => [
                'nama' => 'samuel',
                'telepon' => '0811223344',
                'email' => 'irgi@gmail.com',
                'jam' => '09:00 - 16:00 WIB',
            ],
        ];

        if (!array_key_exists($slug, $dataKursus)) {
            abort(404);
        }

        return view('pemesanan', [
            'slug' => $slug,
            'kursus' => $dataKursus[$slug],
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'slug' => 'required',
            'tanggal' => 'required|date',
        ]);

        // Simpan atau proses data jika perlu
        return redirect()->back()->with('success', 'Pemesanan berhasil dikirim!');
    }
}

?>