@extends('admin.layouts.app')

@section('content')
<div class="space-y-6">

    <!-- Header Ringkas (Gantikan Banner Besar AI) -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 pb-4 border-b border-slate-800">
        <div>
            <h1 class="text-2xl font-bold text-white tracking-tight">Dashboard Overview</h1>
            <p class="text-xs text-slate-400 mt-1">Pantau performa harian dan jadwal reservasi Black Crown Barbershop.</p>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('admin.bookings.create') }}" class="px-3.5 py-2 text-xs font-medium text-white bg-red-600 hover:bg-red-700 rounded-md transition-colors">
                + Input Booking Baru
            </a>
        </div>
    </div>

    <!-- Stat Cards (4 Kolom Sederhana) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Card 1 -->
        <div class="bg-slate-900 border border-slate-800 rounded-lg p-4">
            <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-400">Booking Hari Ini</p>
            <div class="mt-2 flex items-baseline justify-between">
                <span class="text-2xl font-bold text-white">0 <span class="text-xs font-normal text-slate-400">Antrean</span></span>
                <span class="text-[11px] text-emerald-400 font-medium">+12% vs kemarin</span>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="bg-slate-900 border border-slate-800 rounded-lg p-4">
            <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-400">Omset Bulan Ini</p>
            <div class="mt-2 flex items-baseline justify-between">
                <span class="text-xl font-bold text-white">Rp 110.000</span>
                <span class="text-[11px] text-emerald-400 font-medium">+18% target</span>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="bg-slate-900 border border-slate-800 rounded-lg p-4">
            <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-400">Layanan Barbershop</p>
            <div class="mt-2 flex items-baseline justify-between">
                <span class="text-2xl font-bold text-white">4 <span class="text-xs font-normal text-slate-400">Menu</span></span>
                <a href="{{ route('admin.services.create') }}" class="text-[11px] text-red-400 hover:underline">+ Tambah</a>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="bg-slate-900 border border-slate-800 rounded-lg p-4">
            <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-400">Barber On Duty</p>
            <div class="mt-2 flex items-baseline justify-between">
                <span class="text-2xl font-bold text-white">4 <span class="text-xs font-normal text-slate-400">Kapster</span></span>
                <span class="text-[11px] text-emerald-400 font-medium">● Semua Siap</span>
            </div>
        </div>
    </div>

    <!-- Tabel Reservasi & Status Kapster -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Area Tabel Reservasi -->
        <div class="lg:col-span-2 bg-slate-900 border border-slate-800 rounded-lg p-5">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-sm font-semibold text-white">Daftar Reservasi Terbaru</h3>
                <span class="text-xs text-slate-500">Hari ini</span>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-xs text-left text-slate-300">
                    <thead class="bg-slate-950 text-slate-400 uppercase text-[10px] tracking-wider border-b border-slate-800">
                        <tr>
                            <th class="py-2.5 px-3">Nama</th>
                            <th class="py-2.5 px-3">Layanan</th>
                            <th class="py-2.5 px-3">Jam</th>
                            <th class="py-2.5 px-3">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800">
                        <tr>
                            <td colspan="4" class="py-6 text-center text-slate-500 italic">Belum ada reservasi masuk hari ini.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Barber Hari Ini -->
        <div class="bg-slate-900 border border-slate-800 rounded-lg p-5">
            <h3 class="text-sm font-semibold text-white mb-4">Barber Hari Ini</h3>
            <div class="space-y-2.5">
                <div class="flex items-center justify-between p-2.5 bg-slate-950 rounded border border-slate-800/80">
                    <span class="text-xs text-slate-200">Kapster 1</span>
                    <span class="text-[10px] px-2 py-0.5 rounded bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">Siap</span>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection