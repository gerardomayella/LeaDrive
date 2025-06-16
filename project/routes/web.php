<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;


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
