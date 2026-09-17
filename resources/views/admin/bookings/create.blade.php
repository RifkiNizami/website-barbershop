@extends('admin.layouts.app')

@section('title', 'Form Input Booking Baru — Admin Barbershop')
@section('page_title', 'Form Input Booking')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-xl sm:text-2xl font-black text-gray-900 tracking-tight">Formulir Reservasi Booking Pelanggan</h2>
            <p class="text-xs sm:text-sm text-gray-500 mt-1">Input reservasi manual yang datang dari telepon, WhatsApp, maupun walk-in customer.</p>
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
        <form action="{{ route('admin.booking.store') }}" method="POST" class="p-6 sm:p-8 space-y-6">
            @csrf

            <!-- Section Title 1: Info Pelanggan -->
            <div class="border-b border-gray-100 pb-3">
                <h3 class="text-sm font-bold uppercase tracking-wider text-barber-red flex items-center gap-2">
                    <span>1.</span> Informasi Pelanggan
                </h3>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Nama Pelanggan -->
                <div>
                    <label for="nama_pelanggan" class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-2">
                        Nama Lengkap Pelanggan <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="nama_pelanggan" name="nama_pelanggan" value="{{ old('nama_pelanggan') }}" placeholder="Contoh: Muhammad Farhan" required
                           class="w-full px-4 py-3 rounded-xl border border-gray-300 text-sm focus:ring-2 focus:ring-barber-red focus:border-barber-red outline-none transition duration-150">
                </div>

                <!-- No WhatsApp -->
                <div>
                    <label for="no_whatsapp" class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-2">
                        No. WhatsApp / HP <span class="text-red-500">*</span>
                    </label>
                    <input type="tel" id="no_whatsapp" name="no_whatsapp" value="{{ old('no_whatsapp') }}" placeholder="Contoh: 081234567890" required
                           class="w-full px-4 py-3 rounded-xl border border-gray-300 text-sm focus:ring-2 focus:ring-barber-red focus:border-barber-red outline-none transition duration-150">
                </div>
            </div>

            <!-- Section Title 2: Layanan & Barber -->
            <div class="border-b border-gray-100 pb-3 pt-2">
                <h3 class="text-sm font-bold uppercase tracking-wider text-barber-red flex items-center gap-2">
                    <span>2.</span> Pemilihan Layanan & Barber
                </h3>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Pilihan Layanan -->
                <div>
                    <label for="layanan" class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-2">
                        Pilih Menu Layanan <span class="text-red-500">*</span>
                    </label>
                    <select id="layanan" name="layanan" required
                            class="w-full px-4 py-3 rounded-xl border border-gray-300 text-sm focus:ring-2 focus:ring-barber-red focus:border-barber-red outline-none transition duration-150 bg-white">
                        <option value="" disabled selected>-- Pilih Layanan Cukur / Perawatan --</option>
                        <option value="Gentlemen Haircut + Wash" {{ old('layanan') == 'Gentlemen Haircut + Wash' ? 'selected' : '' }}>Gentlemen Haircut + Wash — Rp 65.000</option>
                        <option value="Classic Beard Trim & Shave" {{ old('layanan') == 'Classic Beard Trim & Shave' ? 'selected' : '' }}>Classic Beard Trim & Shave — Rp 45.000</option>
                        <option value="Hair Treatment + Styling" {{ old('layanan') == 'Hair Treatment + Styling' ? 'selected' : '' }}>Hair Treatment + Styling — Rp 85.000</option>
                        <option value="Royal Grooming Package" {{ old('layanan') == 'Royal Grooming Package' ? 'selected' : '' }}>Royal Grooming Package — Rp 120.000</option>
                        <option value="Express Cut" {{ old('layanan') == 'Express Cut' ? 'selected' : '' }}>Express Cut — Rp 50.000</option>
                    </select>
                </div>

                <!-- Pilih Barber -->
                <div>
                    <label for="barber" class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-2">
                        Pilih Barber (Kapster) <span class="text-red-500">*</span>
                    </label>
                    <select id="barber" name="barber" required
                            class="w-full px-4 py-3 rounded-xl border border-gray-300 text-sm focus:ring-2 focus:ring-barber-red focus:border-barber-red outline-none transition duration-150 bg-white">
                        <option value="" disabled selected>-- Pilih Barber yang Bertugas --</option>
                        <option value="Rusdi (Master Barber)" {{ old('barber') == 'Rusdi (Master Barber)' ? 'selected' : '' }}>Rusdi (Master Barber)</option>
                        <option value="Farhan (Fade Specialist)" {{ old('barber') == 'Farhan (Fade Specialist)' ? 'selected' : '' }}>Farhan (Fade Specialist)</option>
                        <option value="Budi (Classic Style)" {{ old('barber') == 'Budi (Classic Style)' ? 'selected' : '' }}>Budi (Classic Style)</option>
                        <option value="Agung (Beard & Shave)" {{ old('barber') == 'Agung (Beard & Shave)' ? 'selected' : '' }}>Agung (Beard & Shave)</option>
                    </select>
                </div>
            </div>

            <!-- Section Title 3: Waktu & Tanggal -->
            <div class="border-b border-gray-100 pb-3 pt-2">
                <h3 class="text-sm font-bold uppercase tracking-wider text-barber-red flex items-center gap-2">
                    <span>3.</span> Jadwal Booking
                </h3>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Tanggal -->
                <div>
                    <label for="tanggal" class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-2">
                        Tanggal Kedatangan <span class="text-red-500">*</span>
                    </label>
                    <input type="date" id="tanggal" name="tanggal" value="{{ old('tanggal', date('Y-m-d')) }}" required
                           class="w-full px-4 py-3 rounded-xl border border-gray-300 text-sm focus:ring-2 focus:ring-barber-red focus:border-barber-red outline-none transition duration-150">
                </div>

                <!-- Jam / Slot Waktu -->
                <div>
                    <label for="jam" class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-2">
                        Pilihan Jam / Slot <span class="text-red-500">*</span>
                    </label>
                    <select id="jam" name="jam" required
                            class="w-full px-4 py-3 rounded-xl border border-gray-300 text-sm focus:ring-2 focus:ring-barber-red focus:border-barber-red outline-none transition duration-150 bg-white">
                        <option value="" disabled selected>-- Pilih Slot Jam --</option>
                        <option value="10:00 WIB" {{ old('jam') == '10:00 WIB' ? 'selected' : '' }}>10:00 WIB</option>
                        <option value="10:45 WIB" {{ old('jam') == '10:45 WIB' ? 'selected' : '' }}>10:45 WIB</option>
                        <option value="11:30 WIB" {{ old('jam') == '11:30 WIB' ? 'selected' : '' }}>11:30 WIB</option>
                        <option value="13:00 WIB" {{ old('jam') == '13:00 WIB' ? 'selected' : '' }}>13:00 WIB (Setelah Istirahat)</option>
                        <option value="13:45 WIB" {{ old('jam') == '13:45 WIB' ? 'selected' : '' }}>13:45 WIB</option>
                        <option value="14:30 WIB" {{ old('jam') == '14:30 WIB' ? 'selected' : '' }}>14:30 WIB</option>
                        <option value="15:15 WIB" {{ old('jam') == '15:15 WIB' ? 'selected' : '' }}>15:15 WIB</option>
                        <option value="16:00 WIB" {{ old('jam') == '16:00 WIB' ? 'selected' : '' }}>16:00 WIB</option>
                        <option value="17:00 WIB" {{ old('jam') == '17:00 WIB' ? 'selected' : '' }}>17:00 WIB</option>
                        <option value="19:00 WIB" {{ old('jam') == '19:00 WIB' ? 'selected' : '' }}>19:00 WIB (Sesi Malam)</option>
                        <option value="19:45 WIB" {{ old('jam') == '19:45 WIB' ? 'selected' : '' }}>19:45 WIB</option>
                    </select>
                </div>
            </div>

            <!-- Catatan Khusus -->
            <div>
                <label for="catatan" class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-2">
                    Catatan Tambahan (Opsional)
                </label>
                <textarea id="catatan" name="catatan" rows="2" placeholder="Contoh: Permintaan model Two-Block cut, request minuman dingin saat antre..."
                          class="w-full px-4 py-3 rounded-xl border border-gray-300 text-sm focus:ring-2 focus:ring-barber-red focus:border-barber-red outline-none transition duration-150">{{ old('catatan') }}</textarea>
            </div>

            <!-- Action Buttons -->
            <div class="pt-4 border-t border-gray-200 flex items-center justify-end gap-3">
                <a href="{{ route('admin.dashboard') }}" class="px-5 py-2.5 rounded-xl border border-gray-300 text-gray-700 text-xs font-bold uppercase tracking-wider hover:bg-gray-50 transition">
                    Batal
                </a>
                <button type="submit" class="inline-flex items-center gap-2 px-6 py-2.5 rounded-xl bg-barber-red hover:bg-barber-darkred text-white text-xs font-bold uppercase tracking-wider transition shadow-md">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/>
                    </svg>
                    Simpan & Buat Booking
                </button>
            </div>

        </form>
    </div>

</div>
@endsection
