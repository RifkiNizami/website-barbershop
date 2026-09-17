@extends('user.layouts.app')

@section('title', 'Riwayat Cukur Saya — Rusdi Barbershop')
@section('page_title', 'Riwayat Booking & Cukur')

@section('content')
<div class="space-y-6">

    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-xl sm:text-2xl font-black text-white tracking-tight">Riwayat & Daftar Reservasi Cukur</h2>
            <p class="text-xs sm:text-sm text-gray-400 mt-1">Daftar semua kunjungan dan stempel potong rambut yang telah Anda selesaikan.</p>
        </div>
        <a href="{{ route('user.booking.create') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-gradient-to-r from-amber-500 to-amber-600 text-gray-950 font-black text-xs uppercase tracking-wider shadow-lg shadow-amber-500/20 hover:from-amber-400 hover:to-amber-500 transition">
            + Reservasi Baru
        </a>
    </div>

    {{-- Booking Table Card --}}
    <div class="bg-gray-900 rounded-3xl border border-gray-800 shadow-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-gray-300">
                <thead class="bg-gray-950 text-[11px] uppercase tracking-wider text-gray-400 font-bold border-b border-gray-800">
                    <tr>
                        <th class="px-6 py-4">ID Booking</th>
                        <th class="px-6 py-4">Layanan Cukur</th>
                        <th class="px-6 py-4">Barber</th>
                        <th class="px-6 py-4">Tanggal & Jam</th>
                        <th class="px-6 py-4">Harga</th>
                        <th class="px-6 py-4">Status & Stempel</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-800/80 font-normal">
                    
                    {{-- Row 1: Upcoming --}}
                    <tr class="hover:bg-gray-800/40 transition">
                        <td class="px-6 py-4 font-mono font-bold text-amber-400">#BK-1049</td>
                        <td class="px-6 py-4">
                            <span class="font-bold text-white block">Gentlemen Haircut + Wash</span>
                            <span class="text-xs text-gray-400">Model: Taper Fade</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-gray-800 text-xs text-gray-200">
                                💈 Mas Rusdi
                            </span>
                        </td>
                        <td class="px-6 py-4 text-xs font-semibold text-gray-200">
                            Hari Ini &bull; 10:30 WIB
                        </td>
                        <td class="px-6 py-4 font-bold text-amber-400">
                            Rp 65.000
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-bold bg-blue-500/10 text-blue-400 border border-blue-500/30">
                                Menunggu Kedatangan
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="https://wa.me/6281234567890?text=Halo%20Rusdi%20Barbershop,%20saya%20ingin%20tanya%20booking%20BK-1049" target="_blank" class="text-xs text-amber-400 hover:underline font-bold">
                                WhatsApp &rarr;
                            </a>
                        </td>
                    </tr>

                    {{-- Row 2: Past Completed --}}
                    <tr class="hover:bg-gray-800/40 transition">
                        <td class="px-6 py-4 font-mono text-gray-400">#BK-0982</td>
                        <td class="px-6 py-4">
                            <span class="font-medium text-gray-200 block">Haircut & Beard Shaving</span>
                            <span class="text-xs text-gray-500">Stempel Ke-7</span>
                        </td>
                        <td class="px-6 py-4 text-xs text-gray-400">Mas Rusdi</td>
                        <td class="px-6 py-4 text-xs text-gray-400">12 Agustus 2026</td>
                        <td class="px-6 py-4 font-medium text-gray-300">Rp 65.000</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-bold bg-emerald-500/10 text-emerald-400 border border-emerald-500/30">
                                ✓ Selesai (Stamped)
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right text-xs text-yellow-400">
                            ★★★★★
                        </td>
                    </tr>

                    {{-- Row 3: Past Completed --}}
                    <tr class="hover:bg-gray-800/40 transition">
                        <td class="px-6 py-4 font-mono text-gray-400">#BK-0891</td>
                        <td class="px-6 py-4">
                            <span class="font-medium text-gray-200 block">Royal Grooming Package</span>
                            <span class="text-xs text-gray-500">Stempel Ke-6</span>
                        </td>
                        <td class="px-6 py-4 text-xs text-gray-400">Farhan</td>
                        <td class="px-6 py-4 text-xs text-gray-400">15 Juli 2026</td>
                        <td class="px-6 py-4 font-medium text-gray-300">Rp 120.000</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-bold bg-emerald-500/10 text-emerald-400 border border-emerald-500/30">
                                ✓ Selesai (Stamped)
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right text-xs text-yellow-400">
                            ★★★★★
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
