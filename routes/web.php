<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// 1. Rute bawaan Laravel (Halaman Welcome)
Route::get('/', function () {
    return view('welcome');
})->name('home');

// ==========================================
// 1. AUTH & USER / MEMBER PORTAL ROUTES
// ==========================================
Route::get('/login', [UserController::class, 'showLogin'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login.post');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::prefix('user')->name('user.')->group(function () {
    // Auth Khusus Pelanggan
    Route::get('/login', [UserController::class, 'showLogin'])->name('login');
    Route::post('/login', [UserController::class, 'login'])->name('login.post');
    Route::get('/register', [UserController::class, 'showRegister'])->name('register');
    Route::post('/register', [UserController::class, 'register'])->name('register.post');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');

    // Dashboard Member Area
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/', [UserController::class, 'dashboard']);

    // Booking Mandiri & Riwayat Cukur Member
    Route::get('/booking/tambah', [UserController::class, 'createBooking'])->name('booking.create');
    Route::post('/booking', [UserController::class, 'storeBooking'])->name('booking.store');
    Route::get('/riwayat', [UserController::class, 'bookingsIndex'])->name('bookings.index');
    Route::get('/booking', [UserController::class, 'bookingsIndex']);
});

// ==========================================
// 2. ADMIN SUITE ROUTES (Direct Access Tanpa Login)
// ==========================================
Route::prefix('admin')->name('admin.')->group(function () {
    // Dashboard Utama
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard', [AdminController::class, 'dashboard']);

    // Form Tambah / Edit / Hapus Layanan
    Route::get('/layanan/tambah', [AdminController::class, 'createService'])->name('layanan.create');
    Route::post('/layanan', [AdminController::class, 'storeService'])->name('layanan.store');
    Route::get('/layanan/{id}/edit', [AdminController::class, 'editService'])->name('layanan.edit');
    Route::put('/layanan/{id}', [AdminController::class, 'updateService'])->name('layanan.update');
    Route::delete('/layanan/{id}', [AdminController::class, 'destroyService'])->name('layanan.destroy');

    // Form Tambah / Status / Hapus Booking
    Route::get('/booking/tambah', [AdminController::class, 'createBooking'])->name('booking.create');
    Route::post('/booking', [AdminController::class, 'storeBooking'])->name('booking.store');
    Route::patch('/booking/{id}/status', [AdminController::class, 'updateBookingStatus'])->name('booking.status');
    Route::delete('/booking/{id}', [AdminController::class, 'destroyBooking'])->name('booking.destroy');
});

// 2. Rute untuk form Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// 3. Rute Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
