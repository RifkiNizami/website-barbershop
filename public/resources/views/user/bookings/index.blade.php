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
                    @forelse($bookings as $b)
                    <tr class="hover:bg-gray-800/40 transition">
                        <td class="px-6 py-4 font-mono font-bold text-amber-400">#{{ $b->booking_code }}</td>
                        <td class="px-6 py-4">
                            <span class="font-bold text-white block">{{ $b->layanan }}</span>
                            @if($b->catatan)
                            <span class="text-xs text-gray-400">Catatan: {{ Str::limit($b->catatan, 35) }}</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-gray-800 text-xs text-gray-200">
                                💈 {{ $b->barber ?? 'Kapster Siap' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-xs font-semibold text-gray-200">
                            {{ $b->tanggal ? $b->tanggal->format('d M Y') : '-' }} &bull; {{ $b->jam }}
                        </td>
                        <td class="px-6 py-4 font-bold text-amber-400">
                            Rp {{ number_format($b->harga, 0, ',', '.') }}
                        </td>
                        <td class="px-6 py-4">
                            @if($b->status === 'confirmed')
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-bold bg-blue-500/10 text-blue-400 border border-blue-500/30">
                                    Terkonfirmasi
                                </span>
                            @elseif($b->status === 'pending')
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-bold bg-amber-500/10 text-amber-400 border border-amber-500/30">
                                    Menunggu
                                </span>
                            @elseif($b->status === 'completed')
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-bold bg-emerald-500/10 text-emerald-400 border border-emerald-500/30">
                                    ✓ Selesai
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-bold bg-red-500/10 text-red-400 border border-red-500/30">
                                    Dibatalkan
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="https://wa.me/6281234567890?text=Halo%20Rusdi%20Barbershop,%20saya%20ingin%20tanya%20booking%20{{ $b->booking_code }}" target="_blank" class="text-xs text-amber-400 hover:underline font-bold">
                                WhatsApp &rarr;
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-12 text-center text-gray-500 text-sm">
                            Belum ada riwayat booking. Silakan buat reservasi baru!
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination Footer --}}
        @if($bookings->hasPages())
        <div class="px-6 py-4 border-t border-gray-800 bg-gray-950 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-gray-400">
            <div>
                Menampilkan <span class="font-bold text-white">{{ $bookings->firstItem() }}</span> - <span class="font-bold text-white">{{ $bookings->lastItem() }}</span> dari <span class="font-bold text-white">{{ $bookings->total() }}</span> total reservasi
            </div>
            <div class="flex items-center gap-1.5">
                {{-- Prev --}}
                @if ($bookings->onFirstPage())
                    <span class="px-3 py-1.5 rounded-lg border border-gray-800 bg-gray-900 text-gray-600 opacity-50 cursor-not-allowed">
                        &laquo; Prev
                    </span>
                @else
                    <a href="{{ $bookings->previousPageUrl() }}" class="px-3 py-1.5 rounded-lg border border-gray-700 bg-gray-800 text-gray-200 hover:bg-gray-700 hover:text-white transition">
                        &laquo; Prev
                    </a>
                @endif

                {{-- Page Numbers --}}
                @foreach ($bookings->getUrlRange(1, $bookings->lastPage()) as $page => $url)
                    @if ($page == $bookings->currentPage())
                        <span class="px-3 py-1.5 rounded-lg bg-amber-500 text-gray-950 font-bold">
                            {{ $page }}
                        </span>
                    @else
                        <a href="{{ $url }}" class="px-3 py-1.5 rounded-lg border border-gray-800 bg-gray-900 text-gray-300 hover:bg-gray-800 hover:text-white transition">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach

                {{-- Next --}}
                @if ($bookings->hasMorePages())
                    <a href="{{ $bookings->nextPageUrl() }}" class="px-3 py-1.5 rounded-lg border border-gray-700 bg-gray-800 text-gray-200 hover:bg-gray-700 hover:text-white transition">
                        Next &raquo;
                    </a>
                @else
                    <span class="px-3 py-1.5 rounded-lg border border-gray-800 bg-gray-900 text-gray-600 opacity-50 cursor-not-allowed">
                        Next &raquo;
                    </span>
                @endif
            </div>
        </div>
        @endif
    </div>

</div>
@endsection
