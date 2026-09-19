@extends('admin.layouts.app')

@section('title', 'Dashboard Admin — Rusdi Barbershop')
@section('page_title', 'Ringkasan Dashboard')

@section('content')
<div class="space-y-6">

    {{-- 1. WELCOME BANNER --}}
    <div class="relative overflow-hidden rounded-3xl bg-linear-to-r from-slate-950 via-slate-900 to-black text-white p-6 sm:p-8 shadow-2xl border border-slate-800">
        <div class="relative z-10 max-w-2xl">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-red-500/20 text-red-400 text-xs font-semibold mb-3 border border-red-500/30">
                <i class="bi bi-scissors text-sm"></i> Panel Manajemen Barbershop
            </div>
            <h2 class="text-2xl sm:text-3xl font-extrabold tracking-tight mb-2">
                Selamat Datang di Admin Barbershop!
            </h2>
            <p class="text-sm text-slate-300 leading-relaxed mb-6">
                Kelola jadwal booking pelanggan, atur daftar layanan cukur, dan pantau performa barber harian secara real-time langsung dari dashboard ini.
            </p>
            <div class="flex flex-wrap gap-3">
                <a href="{{ route('admin.booking.create') }}" class="inline-flex items-center gap-2 px-4.5 py-2.5 bg-linear-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white text-xs font-bold uppercase tracking-wider rounded-xl transition-all shadow-md shadow-red-600/20">
                    <i class="bi bi-calendar-plus text-base"></i>
                    Input Booking Baru
                </a>
                <a href="{{ route('admin.layanan.create') }}" class="inline-flex items-center gap-2 px-4.5 py-2.5 bg-linear-to-r from-slate-800/80 to-slate-700/80 hover:from-slate-700 hover:to-slate-600 text-white text-xs font-bold uppercase tracking-wider rounded-xl transition-all border border-slate-700">
                    <i class="bi bi-plus-circle text-base"></i>
                    Tambah Layanan
                </a>
            </div>
        </div>
        {{-- Decorative Glow --}}
        <div class="absolute right-0 -bottom-10 w-72 h-72 rounded-full bg-red-600/10 blur-3xl pointer-events-none"></div>
    </div>

    {{-- 2. STATISTIC CARDS --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        
        {{-- Card 1: Booking Hari Ini --}}
        <div class="bg-slate-900 p-5 rounded-2xl border border-slate-800 shadow-xl flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Booking Hari Ini</p>
                <h3 class="text-2xl font-black text-white mt-1">{{ $stats['total_bookings_today'] ?? 18 }} <span class="text-xs font-normal text-slate-400">Antrean</span></h3>
                <p class="text-xs text-emerald-400 font-semibold mt-2 flex items-center gap-1">
                    <i class="bi bi-arrow-up-short text-base"></i>
                    +12% dari kemarin
                </p>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-red-500/10 text-red-500 border border-red-500/20 flex items-center justify-center text-2xl font-bold">
                <i class="bi bi-scissors"></i>
            </div>
        </div>

        {{-- Card 2: Estimasi Omset Bulan Ini --}}
        <div class="bg-slate-900 p-5 rounded-2xl border border-slate-800 shadow-xl flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Omset Bulan Ini</p>
                <h3 class="text-2xl font-black text-white mt-1">{{ $stats['monthly_income'] ?? 'Rp 8.450.000' }}</h3>
                <p class="text-xs text-emerald-400 font-semibold mt-2 flex items-center gap-1">
                    <i class="bi bi-graph-up-arrow text-xs"></i>
                    +18% target tercapai
                </p>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 flex items-center justify-center text-2xl font-bold">
                <i class="bi bi-cash-stack"></i>
            </div>
        </div>

        {{-- Card 3: Total Layanan Aktif --}}
        <div class="bg-slate-900 p-5 rounded-2xl border border-slate-800 shadow-xl flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Layanan Barbershop</p>
                <h3 class="text-2xl font-black text-white mt-1">{{ $stats['total_services'] ?? 12 }} <span class="text-xs font-normal text-slate-400">Menu</span></h3>
                <a href="{{ route('admin.layanan.create') }}" class="text-xs text-red-400 font-semibold mt-2 hover:underline inline-block">
                    + Tambah menu baru
                </a>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-blue-500/10 text-blue-400 border border-blue-500/20 flex items-center justify-center text-2xl font-bold">
                <i class="bi bi-tag-fill"></i>
            </div>
        </div>

        {{-- Card 4: Barber Bertugas --}}
        <div class="bg-slate-900 p-5 rounded-2xl border border-slate-800 shadow-xl flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Barber On Duty</p>
                <h3 class="text-2xl font-black text-white mt-1">{{ $stats['active_barbers'] ?? 4 }} <span class="text-xs font-normal text-slate-400">Kapster</span></h3>
                <p class="text-xs text-slate-400 font-semibold mt-2 flex items-center gap-1.5">
                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                    Semua kursi terisi
                </p>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-amber-500/10 text-amber-400 border border-amber-500/20 flex items-center justify-center text-2xl font-bold">
                <i class="bi bi-people-fill"></i>
            </div>
        </div>

    </div>

    {{-- 3. MAIN SECTION GRID: RECENT BOOKINGS & BARBER STATUS --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        {{-- Table: Recent Bookings (2 Cols) --}}
        <div class="lg:col-span-2 bg-slate-900 rounded-3xl border border-slate-800 shadow-xl overflow-hidden">
            
            <div class="p-5 border-b border-slate-800 flex flex-col sm:flex-row sm:items-center justify-between gap-3 bg-slate-950/40">
                <div>
                    <h3 class="font-bold text-white text-base flex items-center gap-2">
                        <i class="bi bi-clock-history text-red-500"></i> Daftar Reservasi Terbaru
                    </h3>
                    <p class="text-xs text-slate-400">Pantau pelanggan yang sudah melakukan booking hari ini</p>
                </div>
                <a href="{{ route('admin.booking.create') }}" class="inline-flex items-center gap-1 text-xs font-bold text-red-400 hover:text-red-300">
                    <span>+ Form Input Manual</span>
                    <i class="bi bi-chevron-right text-xs"></i>
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-300">
                    <thead class="bg-slate-950/80 text-[11px] uppercase tracking-wider text-slate-400 font-bold border-b border-slate-800">
                        <tr>
                            <th class="px-5 py-3.5">ID / Pelanggan</th>
                            <th class="px-5 py-3.5">Layanan</th>
                            <th class="px-5 py-3.5">Barber</th>
                            <th class="px-5 py-3.5">Waktu</th>
                            <th class="px-5 py-3.5">Status</th>
                            <th class="px-5 py-3.5 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800/60 font-normal">
                        @forelse($recentBookings as $booking)
                            <tr class="hover:bg-slate-800/40 transition-colors">
                                <td class="px-5 py-4">
                                    <div class="font-bold text-white">{{ $booking['customer_name'] }}</div>
                                    <div class="text-xs text-slate-400 font-mono">{{ $booking['id'] }} &bull; {{ $booking['phone'] }}</div>
                                </td>
                                <td class="px-5 py-4">
                                    <span class="font-medium text-slate-200">{{ $booking['service'] }}</span>
                                    <div class="text-xs text-slate-400">{{ $booking['price'] }}</div>
                                </td>
                                <td class="px-5 py-4">
                                    <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-slate-300 bg-slate-800 px-2.5 py-1 rounded-lg">
                                        <i class="bi bi-person-fill text-red-400"></i> {{ $booking['barber'] }}
                                    </span>
                                </td>
                                <td class="px-5 py-4 text-xs font-semibold text-slate-300">
                                    {{ $booking['time'] }}
                                </td>
                                <td class="px-5 py-4">
                                    @if($booking['status'] == 'confirmed')
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-bold bg-blue-500/10 text-blue-400 border border-blue-500/30">
                                            Terkonfirmasi
                                        </span>
                                    @elseif($booking['status'] == 'pending')
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-bold bg-amber-500/10 text-amber-400 border border-amber-500/30">
                                            Menunggu
                                        </span>
                                    @elseif($booking['status'] == 'completed')
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-bold bg-emerald-500/10 text-emerald-400 border border-emerald-500/30">
                                            Selesai
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-bold bg-red-500/10 text-red-400 border border-red-500/30">
                                            Batal
                                        </span>
                                    @endif
                                </td>
                                <td class="px-5 py-4 text-right">
                                    <div class="inline-flex items-center gap-1">
                                        <button type="button" class="p-1.5 text-slate-400 hover:text-white rounded-lg hover:bg-slate-800 transition" title="Edit Booking">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button type="button" class="p-1.5 text-red-400 hover:text-red-300 rounded-lg hover:bg-red-500/10 transition" title="Batalkan">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-5 py-8 text-center text-slate-400 text-sm">
                                    Belum ada antrean booking hari ini.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>

        {{-- Right Side: Barber on duty & Quick shortcuts (1 Col) --}}
        <div class="space-y-6">
            
            {{-- Barber On Duty Card --}}
            <div class="bg-slate-900 p-5 rounded-3xl border border-slate-800 shadow-xl">
                <h3 class="font-bold text-white text-base mb-4 flex items-center justify-between">
                    <span class="flex items-center gap-2">
                        <i class="bi bi-people text-red-500"></i> Barber Hari Ini
                    </span>
                    <span class="text-xs font-normal text-emerald-400 bg-emerald-500/10 px-2.5 py-0.5 rounded-full border border-emerald-500/20">4 Siap</span>
                </h3>

                <div class="space-y-3">
                    
                    {{-- Barber 1 --}}
                    <div class="flex items-center justify-between p-3 rounded-2xl bg-slate-950 border border-slate-800/80">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-red-600 text-white flex items-center justify-center font-bold text-sm shadow">
                                R
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-white">Rusdi (Master)</h4>
                                <p class="text-xs text-slate-400">6 Antrean hari ini</p>
                            </div>
                        </div>
                        <span class="w-2.5 h-2.5 rounded-full bg-emerald-500" title="Sedang Melayani"></span>
                    </div>

                    {{-- Barber 2 --}}
                    <div class="flex items-center justify-between p-3 rounded-2xl bg-slate-950 border border-slate-800/80">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-slate-800 text-white flex items-center justify-center font-bold text-sm">
                                F
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-white">Farhan</h4>
                                <p class="text-xs text-slate-400">4 Antrean hari ini</p>
                            </div>
                        </div>
                        <span class="w-2.5 h-2.5 rounded-full bg-emerald-500" title="Siap"></span>
                    </div>

                    {{-- Barber 3 --}}
                    <div class="flex items-center justify-between p-3 rounded-2xl bg-slate-950 border border-slate-800/80">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-slate-800 text-white flex items-center justify-center font-bold text-sm">
                                B
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-white">Budi</h4>
                                <p class="text-xs text-slate-400">5 Antrean hari ini</p>
                            </div>
                        </div>
                        <span class="w-2.5 h-2.5 rounded-full bg-emerald-500" title="Siap"></span>
                    </div>

                    {{-- Barber 4 --}}
                    <div class="flex items-center justify-between p-3 rounded-2xl bg-slate-950 border border-slate-800/80">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-slate-800 text-white flex items-center justify-center font-bold text-sm">
                                A
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-white">Agung</h4>
                                <p class="text-xs text-slate-400">3 Antrean hari ini</p>
                            </div>
                        </div>
                        <span class="w-2.5 h-2.5 rounded-full bg-amber-400" title="Istirahat"></span>
                    </div>

                </div>
            </div>

            {{-- Jam Operasional Info Card --}}
            <div class="p-5 rounded-3xl bg-linear-to-br from-red-600 to-red-800 text-white shadow-xl space-y-3">
                <div class="flex items-center gap-2 font-bold text-sm">
                    <i class="bi bi-clock-history text-lg"></i>
                    <span>Jam Operasional Toko</span>
                </div>
                <p class="text-xs text-red-100 leading-relaxed">
                    Buka setiap hari: <strong>10.00 - 21.00 WIB</strong>.<br>
                    Slot booking manual otomatis dialokasikan tiap 45 menit.
                </p>
                <div class="text-xs font-semibold bg-white/20 px-3 py-1.5 rounded-xl inline-block">
                    <i class="bi bi-circle-fill text-[8px] text-emerald-300 mr-1"></i> Status: BUKA (Aktif)
                </div>
            </div>

        </div>

    </div>

</div>
@endsection
