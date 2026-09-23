<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    // Menampilkan form tambah booking baru
    public function create()
    {
        return view('admin.bookings.create'); // Sesuaikan dengan nama view Anda jika ada
    }

    // Menyimpan data booking
    public function store(Request $request)
    {
        // Logika simpan booking ke database
        return redirect()->route('admin.dashboard')->with('success', 'Booking berhasil ditambahkan!');
    }
}