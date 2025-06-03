<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/dashboard', function () { // Ketika user mengakses alamat dashboard maka jalankan fungsi
    return view('dashboard'); // yang mengembalikan view dashboard
});