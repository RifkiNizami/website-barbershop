<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // Menampilkan form tambah layanan
    public function create()
    {
        return view('admin.services.create');
    }

    // Menyimpan layanan baru
    public function store(Request $request)
    {
        // Logika simpan data ke database
        return redirect()->route('admin.dashboard')->with('success', 'Layanan berhasil ditambahkan!');
    }

    // Menampilkan form edit layanan
    public function edit($id)
    {
        return view('admin.services.edit');
    }

    // Memperbarui data layanan
    public function update(Request $request, $id)
    {
        // Logika update data ke database
        return redirect()->route('admin.dashboard')->with('success', 'Layanan berhasil diperbarui!');
    }
}