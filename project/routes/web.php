<?php

use App\Http\Controllers\instrukturController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;

Route::redirect('/', '/login');

Route::get('/dashboard', [instrukturController::class, 'index'])
->middleware(['auth', 'verified'])
->name('dashboard'); // Rute untuk menampilkan dashboard yang hanya dapat diakses oleh pengguna yang sudah terautentikasi dan terverifikasi

Route::middleware(['auth'])->group(function () { // Menggunakan middleware auth untuk melindungi rute ini dari akses pengguna yang tidak terautentikasi
    Route::get('/profile', [UserController::class, 'profile'])->name('profile'); // Rute untuk menampilkan profil pengguna
    Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('profile.updateProfile'); // Rute untuk memperbarui profil pengguna
    Route::post('/profile/change-password', [UserController::class, 'ubahPassword'])->name('profile.ubahPassword'); // Rute untuk mengubah password pengguna
});

// Dynamic route for pemesanan based on name
Route::get('/pemesanan/{name}', [PemesananController::class, 'show'])->name('pemesanan.show');

Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');

// Route for berhasil page
Route::get('/berhasil', function () {
    return view('berhasil');
});

// Use Laravel Breeze's authentication routes
require __DIR__.'/auth.php';

Route::get('/jadwalUser', function () {
    return view('jadwalUser');
});