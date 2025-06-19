<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/login', [AdminAuthController::class, 'showAdminLogin'])->name('admin.login.view');
Route::post('/admin/login', [AdminAuthController::class, 'adminLogin'])->name('admin.login');
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
