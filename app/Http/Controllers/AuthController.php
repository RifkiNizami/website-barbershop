<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Memproses data login
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Coba login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Sesuai permintaan Anda: "apabila login berhasil akan menampilkan login berhasil"
            // Kode ini akan mengembalikan ke halaman login untuk menampilkan blok hijau
            return back()->with('success', 'Login berhasil!');

            /*
             * CATATAN:
             * Jika nanti Anda ingin setelah login langsung masuk ke halaman dashboard,
             * matikan kode return back() di atas, dan gunakan kode di bawah ini:
             *
             * return redirect()->intended('/dashboard')->with('success', 'Login berhasil!');
             */
        }

        // Jika gagal, kembalikan ke halaman login dengan error
        // yang akan memicu blok warna merah di login.blade.php
        return back()->with([
            'error' => 'Username atau password salah',
        ])->onlyInput('email');
    }

    // Proses logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
