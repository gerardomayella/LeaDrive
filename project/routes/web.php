<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;

Route::redirect('/', '/login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('profile.updateProfile');
    Route::post('/profile/change-password', [UserController::class, 'ubahPassword'])->name('profile.ubahPassword');
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
