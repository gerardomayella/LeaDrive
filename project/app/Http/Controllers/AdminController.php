<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $Instrukturs = DB::table('Instruktur')->get();
        return view('admin.dashboard', compact('Instrukturs'));
    }

    public function editDatabase($id)
    {
        $Instruktur = DB::table('Instruktur')->where('id_instruktur', $id)->first();
        return view('admin.edit-database', compact('Instruktur'));
    }

    public function updateDatabase(Request $request)
    {
        $request->validate([
            'id_instruktur' => 'required|exists:Instruktur,id_instruktur',
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'image_url' => 'nullable|string',
            'jam_pengajar' => 'nullable|string',
            'harga' => 'nullable|integer',
        ]);

        DB::table('Instruktur')
            ->where('id_instruktur', $request->id_instruktur)
            ->update([
                'nama' => $request->nama,
                'no_hp' => $request->no_hp,
                'email' => $request->email,
                'image_url' => $request->image_url,
                'jam_pengajar' => $request->jam_pengajar,
                'harga' => $request->harga,
            ]);

        return redirect()->route('admin.editDatabase')->with('success', 'Data berhasil diperbarui.');
    }

    public function addDatabase()
    {
        return view('admin.add-database');
    }

    public function storeDatabase(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'email' => 'required|email|max:255|unique:Instruktur,email',
            'image_url' => 'nullable|string',
            'jam_pengajar' => 'nullable|string',
            'harga' => 'nullable|integer',
        ]);

        DB::table('Instruktur')->insert([
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'image_url' => $request->image_url,
            'jam_pengajar' => $request->jam_pengajar,
            'harga' => $request->harga,
            'created_at' => now(),
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Data berhasil ditambahkan.');
    }

    public function deleteDatabase($id)
    {
        DB::table('Instruktur')->where('id_instruktur', $id)->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Data berhasil dihapus.');
    }

    public function jadwalKursus()
    {
        $jadwals = DB::table('Jadwal')
            ->leftJoin('users', 'Jadwal.user_id', '=', 'users.id') // Join dengan tabel users
            ->select('Jadwal.id_jadwal as id', 'Jadwal.*', 'users.name as user') // Pastikan kolom id diambil dari id_jadwal
            ->get();

        return view('admin.jadwal-kursus', compact('jadwals'));
    }

    public function deleteJadwal($id)
    {
        DB::table('Jadwal')->where('id', $id)->delete();
        return redirect()->route('admin.jadwalKursus')->with('success', 'Sesi berhasil diselesaikan.');
    }
}
