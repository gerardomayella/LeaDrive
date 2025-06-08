<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController; // menambahkan UserController untuk mengelola profil pengguna
use App\Http\Controllers\AdminController; // menambahkan AdminController untuk mengelola dashboard admin


Route::get('/', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () { // Ketika user mengakses alamat dashboard maka jalankan fungsi
    return view('dashboard'); // yang mengembalikan view dashboard
});

Route::get('/profile', [UserController::class, 'profile'])->name('profile'); // rute untuk menampilkan profil pengguna
Route::put('/profile/update', [UserController::class, 'updateProfile'])->name('profile.updateProfile'); // rute untuk memperbarui profil pengguna
Route::put('/profile/change-password', [UserController::class, 'ubahPassword'])->name('profile.ubahPassword'); // rute untuk mengubah password pengguna

Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});
