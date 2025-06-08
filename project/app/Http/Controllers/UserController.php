<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // Mengimpor kelas Request untuk menangani permintaan HTTP
use App\Models\User; // Mengimpor model User untuk berinteraksi dengan tabel users di database
use Illuminate\Support\Facades\Hash; // Mengimpor kelas Hash untuk mengenkripsi password
use Illuminate\Support\Facades\Auth; // Mengimpor kelas Auth untuk mengelola otentikasi pengguna

class UserController extends Controller
{
    public function profile() // Function profile untuk menampilkan profil pengguna
    {
        // Cek apakah user sudah login
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu!'); 
        }

        $user = Auth::user(); // Mendapatkan data pengguna yang sedang login
        return view('profile', compact('user')); // Mengembalikan view profile dengan data pengguna
    }

    public function updateProfile(Request $request) // Function untuk mengupdate profil pengguna
    {
        // Cek apakah user sudah login
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu!'); // Mengarahkan pengguna ke halaman login jika belum login
        }

        $request->validate([ // Validasi input dari pengguna
            'name' => 'required|string|max:255',        // Nama pengguna harus diisi, berupa string, dan maksimal 255 karakter
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(), // Email harus diisi, berupa string, harus valid, maksimal 255 karakter, dan unik kecuali untuk pengguna yang sedang login
        ]);

        $user = Auth::user(); // Mendapatkan data pengguna yang sedang login
        $user->name = $request->name; // Memperbarui nama pengguna dengan input dari form
        $user->email = $request->email; // Memperbarui email pengguna dengan input dari form
        $user->save(); // Menyimpan perubahan pada pengguna

        return redirect()->route('profile')->with('success', 'Data berhasil diperbarui!'); // Mengarahkan kembali ke halaman profil dengan pesan sukses
    }

    public function ubahPassword(Request $request) // Function untuk mengubah password pengguna
    {
        // Cek apakah user sudah login
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.'); // Mengarahkan pengguna ke halaman login jika belum login
        }

        $request->validate([ // Validasi input dari pengguna
            'current_password' => 'required|string', // Password saat ini harus diisi dan berupa string. Laravel bawaan (otomatis) membandingkan new_password & new_password_confirmation
            'new_password' => 'required|string|min:6|confirmed', // Password baru harus diisi, minimal 6 karakter, dan harus dikonfirmasi
        ]);

        $user = Auth::user(); // Mendapatkan data pengguna yang sedang login

        if (!Hash::check($request->current_password, $user->password)) { // Memeriksa apakah password saat ini yang dimasukkan cocok dengan password yang tersimpan
            return back()->withErrors(['current_password' => 'Password Lama Salah!']); // Jika tidak cocok, mengembalikan error
        }

        $user->password = Hash::make($request->new_password); // Mengenkripsi password baru yang dimasukkan
        $user->save(); // Menyimpan perubahan pada pengguna

        return redirect()->route('profile')->with('success', 'Password berhasil diubah.'); // Mengarahkan kembali ke halaman profil dengan pesan sukses
    }
}
