@extends('admin.layouts.app')

@section('title', 'Tambah Layanan Baru — Admin Barbershop')
@section('page_title', 'Form Tambah Layanan')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-xl sm:text-2xl font-black text-gray-900 tracking-tight">Formulir Tambah Layanan Barbershop</h2>
            <p class="text-xs sm:text-sm text-gray-500 mt-1">Lengkapi informasi di bawah ini untuk menambahkan menu perawatan atau potongan rambut baru.</p>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-white border border-gray-300 text-gray-700 text-xs font-bold uppercase tracking-wider rounded-lg hover:bg-gray-50 transition shadow-xs self-start sm:self-auto">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Kembali
        </a>
    </div>

    <!-- Main Form Card -->
    <div class="bg-white rounded-2xl border border-gray-200 shadow-xs overflow-hidden">
        <form action="{{ route('admin.layanan.store') }}" method="POST" enctype="multipart/form-data" class="p-6 sm:p-8 space-y-6">
            @csrf

            <!-- Grid 1: Nama Layanan & Kategori -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Nama Layanan -->
                <div>
                    <label for="nama_layanan" class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-2">
                        Nama Layanan <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="nama_layanan" name="nama_layanan" value="{{ old('nama_layanan') }}" placeholder="Contoh: Premium Gentlemen Cut & Wash" required
                           class="w-full px-4 py-3 rounded-xl border border-gray-300 text-sm focus:ring-2 focus:ring-barber-red focus:border-barber-red outline-none transition duration-150">
                    <p class="text-[11px] text-gray-400 mt-1.5">Nama layanan yang akan tampil di halaman pricelist pelanggan.</p>
                </div>

                <!-- Kategori -->
                <div>
                    <label for="kategori" class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-2">
                        Kategori Layanan <span class="text-red-500">*</span>
                    </label>
                    <select id="kategori" name="kategori" required
                            class="w-full px-4 py-3 rounded-xl border border-gray-300 text-sm focus:ring-2 focus:ring-barber-red focus:border-barber-red outline-none transition duration-150 bg-white">
                        <option value="" disabled selected>-- Pilih Kategori --</option>
                        <option value="Haircut" {{ old('kategori') == 'Haircut' ? 'selected' : '' }}>Haircut & Styling</option>
                        <option value="Shaving" {{ old('kategori') == 'Shaving' ? 'selected' : '' }}>Beard Trim & Hot Towel Shave</option>
                        <option value="Treatment" {{ old('kategori') == 'Treatment' ? 'selected' : '' }}>Hair Treatment / Creambath</option>
                        <option value="Coloring" {{ old('kategori') == 'Coloring' ? 'selected' : '' }}>Hair Coloring / Bleaching</option>
                        <option value="Combo Package" {{ old('kategori') == 'Combo Package' ? 'selected' : '' }}>Paket Komplit / Combo</option>
                    </select>
                </div>
            </div>

            <!-- Grid 2: Harga & Durasi -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Harga -->
                <div>
                    <label for="harga" class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-2">
                        Harga Layanan (Rp) <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400 font-bold text-sm">Rp</span>
                        <input type="number" id="harga" name="harga" value="{{ old('harga') }}" placeholder="65000" min="0" required
                               class="w-full pl-12 pr-4 py-3 rounded-xl border border-gray-300 text-sm focus:ring-2 focus:ring-barber-red focus:border-barber-red outline-none transition duration-150">
                    </div>
                </div>

                <!-- Estimasi Durasi -->
                <div>
                    <label for="durasi" class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-2">
                        Estimasi Durasi (Menit) <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <input type="number" id="durasi" name="durasi" value="{{ old('durasi', 45) }}" placeholder="45" min="10" step="5" required
                               class="w-full px-4 py-3 rounded-xl border border-gray-300 text-sm focus:ring-2 focus:ring-barber-red focus:border-barber-red outline-none transition duration-150">
                        <span class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 text-xs font-medium">Menit</span>
                    </div>
                </div>
            </div>

            <!-- Deskripsi Layanan -->
            <div>
                <label for="deskripsi" class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-2">
                    Deskripsi & Apa yang Didapat Pelanggan
                </label>
                <textarea id="deskripsi" name="deskripsi" rows="3" placeholder="Contoh: Termasuk konsultasi model rambut, cuci rambut sebelum dan sesudah cukur, pijat kepala rileks, dan pomade styling."
                          class="w-full px-4 py-3 rounded-xl border border-gray-300 text-sm focus:ring-2 focus:ring-barber-red focus:border-barber-red outline-none transition duration-150">{{ old('deskripsi') }}</textarea>
            </div>

            <!-- Status Aktif / Tampilkan -->
            <div class="pt-2 border-t border-gray-100 flex items-center justify-between">
                <div>
                    <span class="text-sm font-bold text-gray-800">Status Menu Aktif</span>
                    <p class="text-xs text-gray-500">Tampilkan layanan ini di daftar pilihan booking online.</p>
                </div>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" checked class="sr-only peer">
                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-barber-red"></div>
                </label>
            </div>

            <!-- Action Buttons -->
            <div class="pt-4 border-t border-gray-200 flex items-center justify-end gap-3">
                <a href="{{ route('admin.dashboard') }}" class="px-5 py-2.5 rounded-xl border border-gray-300 text-gray-700 text-xs font-bold uppercase tracking-wider hover:bg-gray-50 transition">
                    Batal
                </a>
                <button type="submit" class="inline-flex items-center gap-2 px-6 py-2.5 rounded-xl bg-barber-red hover:bg-barber-darkred text-white text-xs font-bold uppercase tracking-wider transition shadow-md">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Simpan Layanan
                </button>
            </div>

        </form>
    </div>

</div>
@endsection
