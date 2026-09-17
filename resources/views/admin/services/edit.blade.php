@extends('admin.layouts.app')

@section('title', 'Edit Layanan — Admin Barbershop')
@section('page_title', 'Edit Layanan')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-xl sm:text-2xl font-black text-white tracking-tight">Formulir Edit Layanan Barbershop</h2>
            <p class="text-xs sm:text-sm text-slate-400 mt-1">Ubah rincian informasi layanan "{{ $service->nama_layanan }}".</p>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-slate-800 border border-slate-700 text-slate-300 text-xs font-bold uppercase tracking-wider rounded-xl hover:bg-slate-700 transition shadow-sm self-start sm:self-auto">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>

    <!-- Main Form Card -->
    <div class="bg-slate-900 rounded-3xl border border-slate-800 shadow-xl overflow-hidden">
        <form action="{{ route('admin.layanan.update', $service->id) }}" method="POST" class="p-6 sm:p-8 space-y-6">
            @csrf
            @method('PUT')

            <!-- Grid 1: Nama Layanan & Kategori -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Nama Layanan -->
                <div>
                    <label for="nama_layanan" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">
                        Nama Layanan <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="nama_layanan" name="nama_layanan" value="{{ old('nama_layanan', $service->nama_layanan) }}" required
                           class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white text-sm focus:ring-1 focus:ring-red-500 focus:border-red-500 outline-none transition duration-150">
                </div>

                <!-- Kategori -->
                <div>
                    <label for="kategori" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">
                        Kategori Layanan <span class="text-red-500">*</span>
                    </label>
                    <select id="kategori" name="kategori" required
                            class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white text-sm focus:ring-1 focus:ring-red-500 focus:border-red-500 outline-none transition duration-150">
                        <option value="Haircut" {{ old('kategori', $service->kategori) == 'Haircut' ? 'selected' : '' }}>Haircut & Styling</option>
                        <option value="Shaving" {{ old('kategori', $service->kategori) == 'Shaving' ? 'selected' : '' }}>Beard Trim & Hot Towel Shave</option>
                        <option value="Treatment" {{ old('kategori', $service->kategori) == 'Treatment' ? 'selected' : '' }}>Hair Treatment / Creambath</option>
                        <option value="Coloring" {{ old('kategori', $service->kategori) == 'Coloring' ? 'selected' : '' }}>Hair Coloring / Bleaching</option>
                        <option value="Combo Package" {{ old('kategori', $service->kategori) == 'Combo Package' ? 'selected' : '' }}>Paket Komplit / Combo</option>
                    </select>
                </div>
            </div>

            <!-- Grid 2: Harga & Durasi -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Harga -->
                <div>
                    <label for="harga" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">
                        Harga Layanan (Rp) <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-500 font-bold text-sm">Rp</span>
                        <input type="number" id="harga" name="harga" value="{{ old('harga', $service->harga) }}" min="0" required
                               class="w-full pl-12 pr-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white text-sm focus:ring-1 focus:ring-red-500 focus:border-red-500 outline-none transition duration-150">
                    </div>
                </div>

                <!-- Estimasi Durasi -->
                <div>
                    <label for="durasi" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">
                        Estimasi Durasi (Menit) <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <input type="number" id="durasi" name="durasi" value="{{ old('durasi', $service->durasi) }}" min="10" step="5" required
                               class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white text-sm focus:ring-1 focus:ring-red-500 focus:border-red-500 outline-none transition duration-150">
                        <span class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-500 text-xs font-medium">Menit</span>
                    </div>
                </div>
            </div>

            <!-- Deskripsi Layanan -->
            <div>
                <label for="deskripsi" class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">
                    Deskripsi & Informasi Layanan
                </label>
                <textarea id="deskripsi" name="deskripsi" rows="3"
                          class="w-full px-4 py-3 rounded-xl bg-slate-950 border border-slate-800 text-white text-sm focus:ring-1 focus:ring-red-500 focus:border-red-500 outline-none transition duration-150">{{ old('deskripsi', $service->deskripsi) }}</textarea>
            </div>

            <!-- Status Aktif -->
            <div class="pt-2 border-t border-slate-800 flex items-center justify-between">
                <div>
                    <span class="text-sm font-bold text-white">Status Menu Aktif</span>
                    <p class="text-xs text-slate-400">Tampilkan layanan ini di pilihan booking online.</p>
                </div>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" {{ $service->is_active ? 'checked' : '' }} class="sr-only peer">
                    <div class="w-11 h-6 bg-slate-800 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-red-600"></div>
                </label>
            </div>

            <!-- Action Buttons -->
            <div class="pt-4 border-t border-slate-800 flex items-center justify-end gap-3">
                <a href="{{ route('admin.dashboard') }}" class="px-5 py-2.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 text-xs font-bold uppercase tracking-wider transition">
                    Batal
                </a>
                <button type="submit" class="inline-flex items-center gap-2 px-6 py-2.5 rounded-xl bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white text-xs font-bold uppercase tracking-wider transition shadow-md">
                    <i class="bi bi-check-lg text-base"></i> Simpan Perubahan
                </button>
            </div>

        </form>
    </div>

</div>
@endsection
