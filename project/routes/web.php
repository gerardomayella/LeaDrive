<?php

use App\Http\Controllers\jadwalUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\InstrukturController;
use App\Http\Controllers\SimpanJadwalController;


Route::get('/', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    $user = Auth::user();
    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard'); // Arahkan admin ke dashboard admin
    } elseif ($user->role === 'user') {
        return view('dashboard'); // Arahkan user biasa ke dashboard user
    }
    abort(403, 'Access denied'); // Tidak diizinkan masuk ke manapun
})->name('dashboard');

Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard'); // definisikan rute untuk dashboard admin

Route::get('/profile', [UserController::class, 'profile'])->name('profile'); // rute untuk menampilkan profil pengguna
Route::put('/profile/update', [UserController::class, 'updateProfile'])->name('profile.updateProfile'); // rute untuk memperbarui profil pengguna
Route::put('/profile/change-password', [UserController::class, 'ubahPassword'])->name('profile.ubahPassword'); // rute untuk mengubah password pengguna

Route::get('/pemesanan/{name}', [PemesananController::class, 'show'])->name('pemesanan.show');
Route::post('/pemesanan', [SimpanJadwalController::class, 'store'])->name('pemesanan.store');

Route::get('/berhasil', function () {
    return view('berhasil');
})->name('berhasil');

Route::get('/dashboard', [InstrukturController::class, 'index'])
->middleware(['auth', 'verified'])
->name('dashboard'); // Rute untuk menampilkan dashboard yang hanya dapat diakses oleh pengguna yang sudah terautentikasi dan terverifikasi

Route::get('/jadwalUser', [jadwalUser::class, 'index'])->name('jadwalUser.index'); // Rute untuk menampilkan jadwal pengguna
Route::delete('/jadwalUser/{id_jadwal}', [jadwalUser::class, 'deleteJadwal'])->name('jadwalUser.deleteJadwal'); // Rute untuk menghapus jadwal pengguna berdasarkan ID