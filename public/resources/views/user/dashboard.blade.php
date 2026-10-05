@extends('user.layouts.app')

@section('title', 'Dashboard Member — Black Round Barbershop Gentleman Lounge')
@section('page_title', 'Dashboard Member')

@section('content')
    @php
        $currentStamps = (int) ($member['stamps'] ?? 7);
        $maxStamps = 10;
        $remainingStamps = max(0, $maxStamps - $currentStamps);
        $progressPercent = min(100, max(0, ($currentStamps / $maxStamps) * 100));

        $memberId = '#MEMBER-' . strtoupper(substr(md5($member['phone'] ?? '123'), 0, 6));
    @endphp

    <div class="max-w-5xl mx-auto space-y-6 text-user-text select-none sm:select-auto">

        {{-- ========================================================================= --}}
        {{-- 1. WELCOME / HEADER --}}
        {{-- ========================================================================= --}}
        <section class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-2">
            <div>
                <h1 class="text-2xl sm:text-[26px] font-semibold text-user-text tracking-tight">
                    Selamat datang, {{ $member['name'] ?? 'Dimas Pratama' }}
                </h1>
                <p class="text-sm text-user-muted mt-0.5">
                    Siap untuk jadwal potong rambut berikutnya?
                </p>
            </div>
            <div class="sm:hidden">
                <a href="{{ route('user.booking.create') }}"
                    class="inline-flex items-center justify-center gap-2 w-full py-2.5 rounded-lg bg-user-gold hover:bg-user-gold-hover text-black font-semibold text-xs uppercase tracking-wider transition">
                    <i class="bi bi-calendar-plus"></i>
                    <span>Booking Cukur</span>
                </a>
            </div>
        </section>

        {{-- ========================================================================= --}}
        {{-- 2. NEXT APPOINTMENT (FOCAL POINT) --}}
        {{-- ========================================================================= --}}
        @if(isset($upcomingBooking))
            <section class="rounded-2xl bg-user-card border border-white/6 p-5 sm:p-6 transition">
                <div class="flex items-center justify-between mb-4">
                    <span class="text-[11px] font-semibold uppercase tracking-wider text-user-gold flex items-center gap-1.5">
                        <i class="bi bi-calendar-check text-user-gold"></i>
                        <span>NEXT APPOINTMENT</span>
                    </span>
                    <span
                        class="text-[11px] px-2.5 py-0.5 rounded-full bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 font-medium capitalize">
                        {{ $upcomingBooking['status'] ?? 'Confirmed' }}
                    </span>
                </div>

                <div class="flex flex-col md:flex-row md:items-center justify-between gap-5">
                    {{-- Service & Barber --}}
                    <div class="space-y-0.5">
                        <h2 class="text-base sm:text-lg font-semibold text-user-text tracking-tight">
                            {{ $upcomingBooking['service'] }}
                        </h2>
                        <p class="text-xs sm:text-sm text-user-muted">
                            {{ $upcomingBooking['barber'] }} &bull; Master Barber
                        </p>
                    </div>

                    {{-- Date, Time & Price --}}
                    <div class="flex flex-wrap items-center gap-3 sm:gap-4 text-xs sm:text-sm text-user-muted">
                        <div class="flex items-center gap-1.5">
                            <i class="bi bi-calendar text-user-gold/80"></i>
                            <span class="text-user-text">{{ $upcomingBooking['date'] }}</span>
                        </div>
                        <span class="text-white/20 hidden sm:inline">&bull;</span>
                        <div class="flex items-center gap-1.5">
                            <i class="bi bi-clock text-user-gold/80"></i>
                            <span class="text-user-text">{{ $upcomingBooking['time'] }} WIB</span>
                        </div>
                        <span class="text-white/20 hidden sm:inline">&bull;</span>
                        <span class="font-bold text-user-gold font-mono text-sm sm:text-base">
                            {{ $upcomingBooking['price'] }}
                        </span>
                    </div>

                    {{-- Action Buttons --}}
                    <div class="flex items-center gap-2 pt-3 md:pt-0 border-t md:border-t-0 border-white/6">
                        <button type="button"
                            onclick="alert('Tunjukkan booking ID ini saat tiba di barbershop: #{{ $upcomingBooking['id'] }}')"
                            class="px-3.5 py-2 rounded-lg bg-user-input hover:bg-user-card-hover text-xs font-medium text-user-text border border-white/8 transition flex items-center gap-1.5">
                            <i class="bi bi-ticket-perforated text-xs text-user-muted"></i>
                            <span>View Ticket</span>
                        </button>
                        <a href="https://wa.me/6281234567890?text=Halo%20Rusdi%20Barbershop,%20saya%20ingin%20reschedule%20booking%20{{ $upcomingBooking['id'] }}"
                            target="_blank"
                            class="px-3.5 py-2 rounded-lg bg-user-input hover:bg-user-card-hover text-xs font-medium text-user-muted hover:text-user-text border border-white/8 transition flex items-center gap-1.5">
                            <i class="bi bi-whatsapp text-emerald-400 text-xs"></i>
                            <span>Reschedule</span>
                        </a>
                    </div>
                </div>
            </section>
        @else
            {{-- Clean & Compact Empty State --}}
            <section
                class="rounded-2xl bg-user-card border border-white/6 p-5 sm:p-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div>
                    <span class="text-[11px] font-semibold uppercase tracking-wider text-user-muted block mb-1">
                        NEXT APPOINTMENT
                    </span>
                    <h2 class="text-base font-semibold text-user-text">Belum ada jadwal cukur mendatang</h2>
                    <p class="text-xs text-user-muted mt-0.5">Reservasi sesi grooming Anda dengan barber pilihan.</p>
                </div>
                <a href="{{ route('user.booking.create') }}"
                    class="inline-flex items-center justify-center gap-2 px-4 py-2 rounded-lg bg-user-gold hover:bg-user-gold-hover text-black font-semibold text-xs uppercase tracking-wider transition self-start sm:self-auto shrink-0">
                    <i class="bi bi-calendar-plus"></i>
                    <span>Booking Cukur</span>
                </a>
            </section>
        @endif

        {{-- ========================================================================= --}}
        {{-- 3. LOYALTY REWARD (HORIZONTAL PROGRESS) --}}
        {{-- ========================================================================= --}}
        <section class="rounded-2xl bg-user-card border border-white/6 p-5 sm:p-6 space-y-3.5">
            <div class="flex items-start justify-between">
                <div>
                    <span class="text-[11px] font-semibold uppercase tracking-wider text-user-muted block">
                        LOYALTY REWARD
                    </span>
                    <div class="text-base sm:text-lg font-bold text-user-text mt-0.5">
                        {{ $currentStamps }} / {{ $maxStamps }} Visits
                    </div>
                </div>
                <div class="text-right">
                    <span class="text-[11px] font-semibold uppercase tracking-wider text-user-muted block">
                        Loyalty Points
                    </span>
                    <div class="text-base sm:text-lg font-bold text-user-gold font-mono mt-0.5">
                        {{ number_format($member['loyalty_points'] ?? 380, 0, ',', '.') }}
                        <span class="text-xs font-normal text-user-muted font-sans ml-0.5">Pts</span>
                    </div>
                </div>
            </div>

            {{-- Single Horizontal Progress Bar --}}
            <div class="w-full bg-user-input h-2 rounded-full overflow-hidden border border-white/4">
                <div class="user-loyalty-progress bg-user-gold h-full rounded-full transition-all duration-300"
                    style="--progress-pct: {{ $progressPercent }}%;"></div>
            </div>

            <div class="flex flex-col sm:flex-row sm:items-center justify-between text-xs text-user-muted gap-2 pt-0.5">
                <div>
                    @if($remainingStamps > 0)
                        <span><strong class="font-medium text-user-text">{{ $remainingStamps }} visits remaining</strong> &bull;
                            Free Grooming Treatment</span>
                    @else
                        <span class="text-emerald-400 font-medium"><i class="bi bi-gift-fill mr-1"></i> Reward siap diklaim:
                            Free Grooming Treatment</span>
                    @endif
                </div>
                <a href="{{ route('user.booking.create') }}"
                    class="text-user-gold hover:underline flex items-center gap-1 font-medium self-start sm:self-auto">
                    <span>Book visit</span>
                    <i class="bi bi-arrow-right text-[11px]"></i>
                </a>
            </div>
        </section>

        {{-- ========================================================================= --}}
        {{-- 4. RECENT VISITS & MEMBER INFORMATION --}}
        {{-- ========================================================================= --}}
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-5 lg:gap-6 items-start">

            {{-- Kiri: Recent Visits (7 Columns) --}}
            <section class="lg:col-span-7 rounded-2xl bg-user-card border border-white/6 p-5 sm:p-6 space-y-4">
                <div class="flex items-center justify-between pb-3 border-b border-white/6">
                    <h3 class="text-xs font-semibold uppercase tracking-wider text-user-muted">
                        RECENT VISITS
                    </h3>
                    <a href="{{ route('user.bookings.index') }}"
                        class="text-xs text-user-muted hover:text-user-gold transition inline-flex items-center gap-1 font-medium">
                        <span>View History</span>
                        <i class="bi bi-arrow-right text-[10px]"></i>
                    </a>
                </div>

                <div class="divide-y divide-white/4">
                    @forelse(($pastBookings ?? collect())->take(4) as $history)
                        <div class="py-3 first:pt-0 last:pb-0 flex items-center justify-between gap-4 text-xs sm:text-sm">
                            <div class="space-y-0.5">
                                <h4 class="font-medium text-user-text">{{ $history['service'] }}</h4>
                                <p class="text-xs text-user-muted">
                                    {{ $history['barber'] }} &bull; {{ $history['date'] }}
                                </p>
                            </div>
                            <div class="text-right space-y-0.5 shrink-0">
                                <span class="font-mono font-medium text-user-text block">{{ $history['price'] }}</span>
                                <div class="flex text-[10px] text-user-gold justify-end gap-0.5">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="py-6 text-center text-xs text-user-muted">
                            Belum ada riwayat kunjungan.
                        </div>
                    @endforelse
                </div>
            </section>

            {{-- Kanan: Member Profile & Your Style (5 Columns) --}}
            <div class="lg:col-span-5 space-y-5">
                <section class="rounded-2xl bg-user-card border border-white/6 p-5 space-y-4">
                    <div class="pb-3 border-b border-white/6">
                        <span class="text-[11px] font-semibold uppercase tracking-wider text-user-muted block">
                            MEMBER PROFILE
                        </span>
                        <div class="flex items-center justify-between mt-1">
                            <h3 class="text-base font-semibold text-user-text">{{ $member['name'] ?? 'Dimas Pratama' }}</h3>
                            <span
                                class="text-[11px] font-medium text-user-gold bg-user-gold/10 border border-user-gold/20 px-2 py-0.5 rounded-full">
                                {{ $member['tier'] ?? 'Gold VIP Member' }}
                            </span>
                        </div>
                        <p class="text-xs font-mono text-user-muted mt-0.5">{{ $memberId }}</p>
                    </div>

                    {{-- Your Style Section --}}
                    <div class="space-y-2">
                        <span class="text-[11px] font-semibold uppercase tracking-wider text-user-muted block">
                            YOUR STYLE
                        </span>
                        <div class="p-3.5 rounded-xl bg-user-input border border-white/4 space-y-1">
                            <p class="text-xs font-medium text-user-text flex items-center gap-1.5">
                                <i class="bi bi-scissors text-user-gold text-xs"></i>
                                <span>{{ $member['favorite_style'] ?? 'Taper Fade + Textured Quiff' }}</span>
                            </p>
                            <p class="text-xs text-user-muted">
                                Preferred Barber: <span
                                    class="text-user-text font-medium">{{ $member['favorite_barber'] ?? 'Mas Rusdi' }}</span>
                            </p>
                        </div>
                    </div>

                    {{-- Quick Actions --}}
                    <div class="pt-2 flex items-center gap-2">
                        <a href="{{ route('user.booking.create') }}"
                            class="flex-1 py-2 text-center rounded-lg bg-user-gold hover:bg-user-gold-hover text-black font-semibold text-xs tracking-wider uppercase transition">
                            Booking
                        </a>
                        <a href="{{ route('user.bookings.index') }}"
                            class="flex-1 py-2 text-center rounded-lg bg-user-input hover:bg-user-card-hover text-user-muted hover:text-user-text font-medium text-xs border border-white/8 transition uppercase">
                            History
                        </a>
                    </div>
                </section>
            </div>

        </div>

    </div>
@endsection