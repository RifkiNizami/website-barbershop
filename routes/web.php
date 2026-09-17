<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// 1. Rute bawaan Laravel (Halaman Welcome)
Route::get('/', function () {
    return view('welcome');
});

// 2. Rute untuk form Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// 3. Rute Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
