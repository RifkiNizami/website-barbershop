@extends('user.layouts.app')

@section('title', 'Dashboard Member — Rusdi Barbershop Gentleman Lounge')
@section('page_title', 'Dashboard Member')

@section('content')
<div class="space-y-8">

    {{-- 1. DIGITAL MEMBER CARD & LOYALTY STAMPS --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-stretch">
        
        {{-- Digital Membership Card (1 Col) --}}
        <div class="p-6 sm:p-7 rounded-3xl bg-gradient-to-br from-amber-500 via-amber-600 to-amber-700 text-slate-950 flex flex-col justify-between shadow-2xl shadow-amber-600/30 relative overflow-hidden">
            {{-- Watermark --}}
            <div class="absolute -right-6 -bottom-6 opacity-15 pointer-events-none text-8xl">
                <i class="bi bi-scissors"></i>
            </div>
            
            <div class="flex items-center justify-between">
                <div>
                    <span class="text-[10px] uppercase tracking-widest font-black text-amber-950/80 bg-amber-400/60 px-2.5 py-1 rounded-full">
                        VIP PASS
                    </span>
                    <h3 class="text-xl font-black tracking-tight mt-2 uppercase">Rusdi Gentleman Club</h3>
                </div>
                <div class="w-10 h-10 rounded-2xl bg-slate-950 text-amber-400 flex items-center justify-center font-black text-lg shadow">
                    <i class="bi bi-award-fill"></i>
                </div>
            </div>

            <div class="my-6">
                <p class="text-xs font-semibold text-amber-950">Nama Pelanggan</p>
                <h4 class="text-2xl font-black text-slate-950 tracking-tight">{{ $member['name'] ?? 'Dimas Pratama' }}</h4>
                <p class="text-xs font-mono text-amber-950/80 mt-1">ID: #MEMBER-{{ substr(md5($member['phone'] ?? '123'), 0, 6) }} &bull; {{ $member['phone'] ?? '0812-3456-7890' }}</p>
            </div>

            <div class="pt-4 border-t border-amber-400/40 flex items-center justify-between text-xs font-bold">
                <div>
                    <span class="text-[10px] text-amber-950 font-normal block">Kategori</span>
                    <span class="text-slate-950 flex items-center gap-1">
                        <i class="bi bi-patch-check-fill text-amber-950"></i> {{ $member['tier'] ?? 'Gold VIP Member' }}
                    </span>
                </div>
                <div class="text-right">
                    <span class="text-[10px] text-amber-950 font-normal block">Poin Loyalty</span>
                    <span class="text-slate-950 text-sm font-black">{{ $member['loyalty_points'] ?? 380 }} Pts</span>
                </div>
            </div>
        </div>

        {{-- Interactive Loyalty Stamp Card (2 Cols) --}}
        <div class="lg:col-span-2 p-6 sm:p-7 rounded-3xl bg-slate-900 border border-slate-800 shadow-xl flex flex-col justify-between">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-4">
                <div>
                    <h3 class="text-lg font-bold text-white flex items-center gap-2">
                        <i class="bi bi-award-fill text-amber-400"></i> Kartu Stempel Potong Rambut
                    </h3>
                    <p class="text-xs text-slate-400">Kumpulkan 10 stempel cukur untuk mendapatkan 1x Free Grooming Treatment.</p>
                </div>
                <span class="text-xs font-bold text-amber-400 bg-amber-400/10 px-3 py-1 rounded-full border border-amber-400/30 self-start sm:self-auto">
                    {{ $member['stamps'] ?? 7 }} dari 10 Terkumpul
                </span>
            </div>

            {{-- 10 Stamp Circles Grid --}}
            <div class="grid grid-cols-5 sm:grid-cols-5 gap-3 sm:gap-4 my-3">
                @for ($i = 1; $i <= 10; $i++)
                    @if ($i <= ($member['stamps'] ?? 7))
                        {{-- Stempel yang sudah aktif --}}
                        <div class="h-16 sm:h-20 rounded-2xl bg-gradient-to-br from-amber-500 to-amber-600 border border-amber-400 text-slate-950 flex flex-col items-center justify-center p-2 shadow-lg shadow-amber-500/20 transform hover:scale-105 transition duration-150">
                            <i class="bi bi-scissors text-xl"></i>
                            <span class="text-[10px] font-black uppercase mt-1">#{{ $i }} Selesai</span>
                        </div>
                    @elseif ($i == 10)
                        {{-- Stempel ke 10: Hadiah Gratis --}}
                        <div class="h-16 sm:h-20 rounded-2xl bg-gradient-to-br from-red-600/30 to-red-800/40 border-2 border-dashed border-red-500 text-red-300 flex flex-col items-center justify-center p-2 text-center animate-pulse">
                            <i class="bi bi-gift-fill text-xl"></i>
                            <span class="text-[9px] font-black uppercase leading-tight mt-1 text-red-400">FREE CUT!</span>
                        </div>
                    @else
                        {{-- Stempel yang belum dicapai --}}
                        <div class="h-16 sm:h-20 rounded-2xl bg-slate-950/80 border border-slate-800 text-slate-600 flex flex-col items-center justify-center p-2">
                            <i class="bi bi-lock-fill text-base opacity-40"></i>
                            <span class="text-[10px] font-semibold mt-1 opacity-50">#{{ $i }}</span>
                        </div>
                    @endif
                @endfor
            </div>

            <div class="pt-3 border-t border-slate-800 flex items-center justify-between text-xs text-slate-400">
                <span>Tunjukkan kartu ini kepada kasir setiap kali selesai potong rambut.</span>
                <a href="{{ route('user.booking.create') }}" class="font-bold text-amber-400 hover:text-amber-300 hover:underline flex items-center gap-1">
                    <span>+ Tambah Stempel via Booking Baru</span>
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>

    </div>

    {{-- 2. UPCOMING BOOKING & QUICK PREFERENCES --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        {{-- Jadwal Booking Aktif (2 Cols) --}}
        <div class="lg:col-span-2 bg-slate-900 rounded-3xl border border-slate-800 p-6 sm:p-7 shadow-xl">
            <div class="flex items-center justify-between mb-5">
                <div>
                    <h3 class="text-lg font-bold text-white flex items-center gap-2">
                        <i class="bi bi-calendar-event-fill text-amber-400"></i> Jadwal Reservasi Mendatang
                    </h3>
                    <p class="text-xs text-slate-400">Booking aktif Anda yang sedang terjadwal di Rusdi Barbershop.</p>
                </div>
                <a href="{{ route('user.booking.create') }}" class="px-3.5 py-1.5 rounded-xl bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white text-xs font-bold uppercase tracking-wider transition">
                    + Reservasi Baru
                </a>
            </div>

            @if(isset($upcomingBooking))
                <div class="p-5 rounded-2xl bg-slate-950 border border-slate-800 flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div class="space-y-2">
                        <div class="flex items-center gap-2">
                            <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider bg-emerald-500/10 text-emerald-400 border border-emerald-500/30">
                                Terkonfirmasi
                            </span>
                            <span class="text-xs font-mono text-slate-400">{{ $upcomingBooking['id'] }}</span>
                        </div>
                        <h4 class="text-xl font-black text-white">{{ $upcomingBooking['service'] }}</h4>
                        <div class="flex flex-wrap items-center gap-4 text-xs text-slate-300">
                            <span class="flex items-center gap-1.5">
                                <i class="bi bi-person-fill text-amber-400"></i> Barber: <strong>{{ $upcomingBooking['barber'] }}</strong>
                            </span>
                            <span class="flex items-center gap-1.5">
                                <i class="bi bi-clock-fill text-amber-400"></i> <strong>{{ $upcomingBooking['date'] }} &bull; {{ $upcomingBooking['time'] }}</strong>
                            </span>
                            <span class="text-amber-400 font-bold">
                                {{ $upcomingBooking['price'] }}
                            </span>
                        </div>
                    </div>

                    <div class="flex items-center gap-2 shrink-0">
                        <a href="https://wa.me/6281234567890?text=Halo%20Rusdi%20Barbershop,%20saya%20ingin%20reschedule%20booking%20{{ $upcomingBooking['id'] }}" target="_blank"
                           class="px-4 py-2.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-200 text-xs font-bold transition flex items-center gap-1">
                            <i class="bi bi-whatsapp text-emerald-400"></i> Ubah Jam
                        </a>
                        <button type="button" onclick="alert('Petunjuk: Tunjukkan booking ini ke kasir/barber saat tiba.')"
                                class="px-4 py-2.5 rounded-xl bg-gradient-to-r from-amber-500 to-amber-600 text-slate-950 text-xs font-black transition shadow">
                            Lihat Tiket QR
                        </button>
                    </div>
                </div>
            @else
                <div class="p-8 text-center bg-slate-950 rounded-2xl border border-slate-800">
                    <p class="text-sm text-slate-400 mb-3">Anda belum memiliki jadwal reservasi aktif saat ini.</p>
                    <a href="{{ route('user.booking.create') }}" class="inline-block px-5 py-2.5 bg-red-600 text-white text-xs font-bold uppercase tracking-wider rounded-xl">
                        Pesan Jadwal Cukur Sekarang
                    </a>
                </div>
            @endif

            {{-- Riwayat Booking Singkat --}}
            <div class="mt-6 pt-6 border-t border-slate-800">
                <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-3">Riwayat Potong Rambut Terakhir</h4>
                <div class="divide-y divide-slate-800/60">
                    @foreach($pastBookings ?? [] as $history)
                        <div class="py-3 flex items-center justify-between text-xs">
                            <div>
                                <span class="font-bold text-slate-200">{{ $history['service'] }}</span>
                                <span class="text-slate-500 text-[11px] block">Barber: {{ $history['barber'] }} &bull; {{ $history['date'] }}</span>
                            </div>
                            <div class="text-right">
                                <span class="text-amber-400 font-semibold">{{ $history['price'] }}</span>
                                <div class="text-[10px] text-yellow-400">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Profil Gaya Rambut Favorit Pelanggan (1 Col) --}}
        <div class="space-y-6">
            <div class="bg-slate-900 rounded-3xl border border-slate-800 p-6 shadow-xl space-y-4">
                <h3 class="text-base font-bold text-white flex items-center gap-2">
                    <i class="bi bi-journal-bookmark-fill text-amber-400"></i> Gaya Rambut Favorit
                </h3>
                
                <div class="p-4 rounded-2xl bg-slate-950 border border-slate-800 space-y-3">
                    <div>
                        <span class="text-[10px] uppercase font-bold text-slate-500 tracking-wider">Model Cukuran Pilihan</span>
                        <p class="text-sm font-bold text-amber-400">{{ $member['favorite_style'] ?? 'Taper Fade + Textured Quiff' }}</p>
                    </div>
                    <div>
                        <span class="text-[10px] uppercase font-bold text-slate-500 tracking-wider">Kapster Andalan</span>
                        <p class="text-sm font-bold text-slate-200">{{ $member['favorite_barber'] ?? 'Mas Rusdi (Master Barber)' }}</p>
                    </div>
                    <div>
                        <span class="text-[10px] uppercase font-bold text-slate-500 tracking-wider">Produk Styling Suka</span>
                        <p class="text-sm font-bold text-slate-200">Matte Clay Pomade (Waterbased)</p>
                    </div>
                </div>

                <p class="text-xs text-slate-400 leading-relaxed">
                    Data preferensi ini otomatis dibaca oleh barber Anda agar hasil cukuran selalu konsisten dan sesuai selera!
                </p>
            </div>

            {{-- Promo Voucher Box --}}
            <div class="p-6 rounded-3xl bg-gradient-to-br from-red-600 to-red-800 text-white shadow-xl space-y-3">
                <div class="flex items-center justify-between">
                    <span class="text-[10px] font-black bg-white/20 px-2.5 py-1 rounded-full uppercase tracking-wider flex items-center gap-1">
                        <i class="bi bi-ticket-perforated-fill"></i> Kupon Spesial
                    </span>
                    <span class="text-xs font-mono font-bold">HEMAT20K</span>
                </div>
                <h4 class="text-lg font-black leading-tight">Diskon Rp 20.000 untuk Royal Grooming</h4>
                <p class="text-xs text-red-100">Berlaku untuk booking sesi weekdays (Senin - Kamis).</p>
                <a href="{{ route('user.booking.create') }}" class="block text-center py-2 bg-white text-slate-950 text-xs font-bold uppercase tracking-wider rounded-xl hover:bg-slate-100 transition shadow">
                    Gunakan Kupon Ini
                </a>
            </div>
        </div>

    </div>

</div>
@endsection
