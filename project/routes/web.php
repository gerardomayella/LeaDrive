<?php

use App\Http\Controllers\jadwalUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\InstrukturController;
use App\Http\Controllers\JadwalUserController;
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
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard'); // definisikan rute untuk dashboard admin

Route::get('/profile', [UserController::class, 'profile'])->name('profile'); // rute untuk menampilkan profil pengguna
Route::put('/profile/update', [UserController::class, 'updateProfile'])->name('profile.updateProfile'); // rute untuk memperbarui profil pengguna
Route::put('/profile/change-password', [UserController::class, 'ubahPassword'])->name('profile.ubahPassword'); // rute untuk mengubah password pengguna

Route::get('/admin/login', [AuthController::class, 'showAdminLoginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'adminLogin']);
Route::post('/admin/logout', [AuthController::class, 'adminLogout'])->name('admin.logout');
Route::get('/admin/edit-database/{id}', [AdminController::class, 'editDatabase'])->name('admin.editDatabase');
Route::post('/admin/update-database', [AdminController::class, 'updateDatabase'])->name('admin.updateDatabase');
Route::get('/admin/add-database', [AdminController::class, 'addDatabase'])->name('admin.addDatabase');
Route::post('/admin/store-database', [AdminController::class, 'storeDatabase'])->name('admin.storeDatabase');
Route::delete('/admin/delete-database/{id}', [AdminController::class, 'deleteDatabase'])->name('admin.deleteDatabase');
Route::get('/admin/jadwal-kursus', [AdminController::class, 'jadwalKursus'])->name('admin.jadwalKursus');
Route::delete('/admin/jadwal-kursus/{id}', [AdminController::class, 'deleteJadwal'])->name('admin.deleteJadwal');


Route::get('/pemesanan/{name}', [PemesananController::class, 'show'])->name('pemesanan.show');
Route::post('/pemesanan', [SimpanJadwalController::class, 'store'])
    ->middleware('auth') // Pastikan middleware auth digunakan
    ->name('pemesanan.store');

Route::get('/berhasil', function () {
    return view('berhasil');
})->name('berhasil');

Route::get('/dashboard', [InstrukturController::class, 'index'])
->middleware(['auth', 'verified'])
->name('dashboard'); // Rute untuk menampilkan dashboard yang hanya dapat diakses oleh pengguna yang sudah terautentikasi dan terverifikasi

Route::get('/jadwalUser', [JadwalUserController::class, 'index'])->name('jadwalUser.index'); // Rute untuk menampilkan jadwal pengguna
Route::delete('/jadwalUser/{id_jadwal}', [JadwalUserController::class, 'deleteJadwal'])->name('jadwalUser.delete'); // Rute untuk menghapus jadwal pengguna berdasarkan ID
