<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController; // Pindahkan ke atas

Route::get('/', function () {
    return view('welcome');
});

// Route untuk Auth
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Tambahkan ->name('login.post') di sini agar terhubung dengan form HTML Anda
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Contoh rute dashboard (hanya bisa diakses jika sudah login)
Route::middleware('auth')->get('/dashboard', function () {
    return 'Selamat datang! Anda berhasil login.';
});
