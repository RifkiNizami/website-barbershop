@extends('user.layouts.app')

@section('title', 'Pesan Jadwal Cukur — Rusdi Barbershop')
@section('page_title', 'Form Reservasi Cukur')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">

    {{-- Header Section --}}
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl sm:text-2xl font-black text-white tracking-tight">Formulir Reservasi Mandiri Pelanggan</h2>
            <p class="text-xs sm:text-sm text-gray-400 mt-1">Pilih layanan, barber favorit, dan slot jam kedatangan Anda.</p>
        </div>
        <a href="{{ route('user.dashboard') }}" class="px-4 py-2 rounded-xl bg-gray-900 border border-gray-800 text-gray-300 text-xs font-bold uppercase tracking-wider hover:bg-gray-800 transition">
            &larr; Dashboard
        </a>
    </div>

    {{-- Form Card --}}
    <div class="bg-gray-900 rounded-3xl border border-gray-800 p-6 sm:p-8 shadow-2xl">
        <form action="{{ route('user.booking.store') }}" method="POST" class="space-y-6">
            @csrf

            {{-- Info Member Auto-Fill --}}
            <div class="p-4 rounded-2xl bg-gray-950 border border-gray-800 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-amber-500 to-amber-300 text-gray-950 flex items-center justify-center font-bold text-sm">
                        DP
                    </div>
                    <div>
                        <span class="text-xs font-bold text-white block">Dimas Pratama</span>
                        <span class="text-[11px] text-gray-400">0812-3456-7890 &bull; Gold VIP Member</span>
                    </div>
                </div>
                <span class="text-xs font-bold text-emerald-400 bg-emerald-500/10 px-2.5 py-1 rounded-full border border-emerald-500/20">
                    Auto-Verified
                </span>
            </div>

            {{-- 1. PILIH LAYANAN --}}
            <div>
                <label for="layanan" class="block text-xs font-bold uppercase tracking-wider text-amber-400 mb-2">
                    1. Pilih Menu Layanan Cukur / Perawatan <span class="text-red-400">*</span>
                </label>
                <select id="layanan" name="layanan" required
                        class="w-full px-4 py-3.5 rounded-xl bg-gray-950 border border-gray-800 text-white text-sm focus:border-amber-500 focus:ring-1 focus:ring-amber-500 outline-none transition">
                    <option value="" disabled selected>-- Pilih Layanan --</option>
                    <option value="Gentlemen Haircut + Wash" {{ old('layanan') == 'Gentlemen Haircut + Wash' ? 'selected' : '' }}>Gentlemen Haircut + Wash — Rp 65.000</option>
                    <option value="Classic Beard Trim & Shave" {{ old('layanan') == 'Classic Beard Trim & Shave' ? 'selected' : '' }}>Classic Beard Trim & Shave — Rp 45.000</option>
                    <option value="Hair Treatment + Styling" {{ old('layanan') == 'Hair Treatment + Styling' ? 'selected' : '' }}>Hair Treatment + Styling — Rp 85.000</option>
                    <option value="Royal Grooming Package" {{ old('layanan') == 'Royal Grooming Package' ? 'selected' : '' }}>Royal Grooming Package — Rp 120.000</option>
                    <option value="Express Cut" {{ old('layanan') == 'Express Cut' ? 'selected' : '' }}>Express Cut — Rp 50.000</option>
                </select>
            </div>

            {{-- 2. PILIH BARBER --}}
            <div>
                <label for="barber" class="block text-xs font-bold uppercase tracking-wider text-amber-400 mb-2">
                    2. Pilih Kapster / Barber <span class="text-red-400">*</span>
                </label>
                <select id="barber" name="barber" required
                        class="w-full px-4 py-3.5 rounded-xl bg-gray-950 border border-gray-800 text-white text-sm focus:border-amber-500 focus:ring-1 focus:ring-amber-500 outline-none transition">
                    <option value="" disabled selected>-- Pilih Barber --</option>
                    <option value="Rusdi (Master Barber)" {{ old('barber') == 'Rusdi (Master Barber)' ? 'selected' : '' }}>Mas Rusdi (Master Barber) — Favorit Anda</option>
                    <option value="Farhan (Fade Specialist)" {{ old('barber') == 'Farhan (Fade Specialist)' ? 'selected' : '' }}>Farhan (Fade Specialist)</option>
                    <option value="Budi (Classic Style)" {{ old('barber') == 'Budi (Classic Style)' ? 'selected' : '' }}>Budi (Classic Pompadour Specialist)</option>
                    <option value="Agung (Beard & Hot Shave)" {{ old('barber') == 'Agung (Beard & Hot Shave)' ? 'selected' : '' }}>Agung (Beard & Hot Shave Specialist)</option>
                </select>
            </div>

            {{-- 3. TANGGAL & JAM --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label for="tanggal" class="block text-xs font-bold uppercase tracking-wider text-amber-400 mb-2">
                        3. Tanggal <span class="text-red-400">*</span>
                    </label>
                    <input type="date" id="tanggal" name="tanggal" value="{{ old('tanggal', date('Y-m-d')) }}" required
                           class="w-full px-4 py-3.5 rounded-xl bg-gray-950 border border-gray-800 text-white text-sm focus:border-amber-500 focus:ring-1 focus:ring-amber-500 outline-none transition">
                </div>

                <div>
                    <label for="jam" class="block text-xs font-bold uppercase tracking-wider text-amber-400 mb-2">
                        4. Slot Waktu <span class="text-red-400">*</span>
                    </label>
                    <select id="jam" name="jam" required
                            class="w-full px-4 py-3.5 rounded-xl bg-gray-950 border border-gray-800 text-white text-sm focus:border-amber-500 focus:ring-1 focus:ring-amber-500 outline-none transition">
                        <option value="" disabled selected>-- Pilih Slot Waktu --</option>
                        <option value="10:00 WIB" {{ old('jam') == '10:00 WIB' ? 'selected' : '' }}>10:00 WIB</option>
                        <option value="11:00 WIB" {{ old('jam') == '11:00 WIB' ? 'selected' : '' }}>11:00 WIB</option>
                        <option value="13:00 WIB" {{ old('jam') == '13:00 WIB' ? 'selected' : '' }}>13:00 WIB</option>
                        <option value="14:00 WIB" {{ old('jam') == '14:00 WIB' ? 'selected' : '' }}>14:00 WIB</option>
                        <option value="15:30 WIB" {{ old('jam') == '15:30 WIB' ? 'selected' : '' }}>15:30 WIB</option>
                        <option value="17:00 WIB" {{ old('jam') == '17:00 WIB' ? 'selected' : '' }}>17:00 WIB</option>
                        <option value="19:00 WIB" {{ old('jam') == '19:00 WIB' ? 'selected' : '' }}>19:00 WIB</option>
                        <option value="20:00 WIB" {{ old('jam') == '20:00 WIB' ? 'selected' : '' }}>20:00 WIB</option>
                    </select>
                </div>
            </div>

            {{-- 4. CATATAN / REQUEST MODEL --}}
            <div>
                <label for="catatan" class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">
                    Catatan Request Cukuran (Opsional)
                </label>
                <textarea id="catatan" name="catatan" rows="2" placeholder="Contoh: Model Taper Fade seperti biasa, rapikan kumis tipis..."
                          class="w-full px-4 py-3 rounded-xl bg-gray-950 border border-gray-800 text-white text-sm focus:border-amber-500 focus:ring-1 focus:ring-amber-500 outline-none transition placeholder-gray-600">{{ old('catatan') }}</textarea>
            </div>

            {{-- SUBMIT BUTTONS --}}
            <div class="pt-4 border-t border-gray-800 flex items-center justify-end gap-3">
                <a href="{{ route('user.dashboard') }}" class="px-5 py-3 rounded-xl bg-gray-800 hover:bg-gray-700 text-gray-300 text-xs font-bold uppercase tracking-wider transition">
                    Batal
                </a>
                <button type="submit" class="px-7 py-3 rounded-xl bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-400 hover:to-amber-500 text-gray-950 font-black text-xs uppercase tracking-widest transition-all shadow-lg shadow-amber-500/20 transform hover:-translate-y-0.5 cursor-pointer">
                    Konfirmasi Reservasi Jadwal
                </button>
            </div>

        </form>
    </div>

</div>
@endsection
