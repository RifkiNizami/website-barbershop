@extends('user.layouts.app')

@section('title', 'Detail Reservasi #' . ($booking->booking_code ?? 'BK') . ' — Black Round Barbershop')
@section('page_title', 'Detail Reservasi Cukur')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    {{-- Breadcrumb & Back Action --}}
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div class="flex items-center gap-2 text-xs text-[#9CA3AF]">
            <a href="{{ route('user.dashboard') }}" class="hover:text-[#D4A72C] transition">Dashboard</a>
            <span>/</span>
            <a href="{{ route('user.bookings.index') }}" class="hover:text-[#D4A72C] transition">Riwayat Cukur</a>
            <span>/</span>
            <span class="text-[#F5F5F5] font-semibold">Detail #{{ $booking->booking_code }}</span>
        </div>

        <div class="flex items-center gap-2">
            <a href="{{ route('user.bookings.index') }}" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-[#151B26] hover:bg-[#1c2433] text-xs font-semibold text-[#9CA3AF] hover:text-white border border-white/[0.08] transition">
                <i class="bi bi-arrow-left text-xs"></i>
                <span>Kembali ke Riwayat</span>
            </a>
            <a href="{{ route('user.payment.show', $booking->id) }}" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl bg-[#D4A72C] hover:bg-[#c49826] text-black font-semibold text-xs uppercase tracking-wider transition shadow-lg shadow-[#D4A72C]/10">
                <i class="bi bi-qr-code text-sm"></i>
                <span>Lihat Tagihan & Barcode</span>
            </a>
        </div>
    </div>

    {{-- Header Banner Card --}}
    <div class="rounded-3xl bg-[#111827] border border-white/[0.08] p-6 sm:p-8 space-y-4 shadow-xl">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div class="space-y-1">
                <div class="flex items-center gap-2.5">
                    <span class="text-xs font-mono font-bold uppercase tracking-wider text-[#D4A72C]">
                        KODE RESERVASI
                    </span>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-bold
                        @if($booking->status === 'confirmed') bg-blue-500/10 text-blue-400 border border-blue-500/20
                        @elseif($booking->status === 'pending') bg-amber-500/10 text-amber-400 border border-amber-500/20
                        @elseif($booking->status === 'completed') bg-emerald-500/10 text-emerald-400 border border-emerald-500/20
                        @else bg-red-500/10 text-red-400 border border-red-500/20 @endif">
                        @if($booking->status === 'confirmed')
                            <i class="bi bi-check2-circle mr-1"></i> Terkonfirmasi
                        @elseif($booking->status === 'pending')
                            <i class="bi bi-hourglass-split mr-1"></i> Menunggu Konfirmasi
                        @elseif($booking->status === 'completed')
                            <i class="bi bi-patch-check-fill mr-1"></i> Selesai
                        @else
                            <i class="bi bi-x-circle mr-1"></i> Dibatalkan
                        @endif
                    </span>
                </div>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-[#F5F5F5] font-mono tracking-tight">
                    #{{ $booking->booking_code }}
                </h1>
            </div>

            <div class="flex flex-col sm:items-end justify-center">
                <span class="text-xs text-[#9CA3AF]">Total Biaya Layanan</span>
                <span class="text-2xl sm:text-3xl font-bold font-mono text-[#D4A72C]">
                    Rp {{ number_format($booking->harga, 0, ',', '.') }}
                </span>
                <span class="text-[11px] text-[#9CA3AF]">
                    Status Bayar: 
                    @if($booking->status === 'completed' || ($booking->payment && $booking->payment->payment_status === 'paid'))
                        <strong class="text-emerald-400">Lunas</strong>
                    @else
                        <strong class="text-amber-400">Bayar di Kasir</strong>
                    @endif
                </span>
            </div>
        </div>
    </div>

    {{-- Grid Content: 2 Columns (Appointment Info + User & Quick Payment) --}}
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
        
        {{-- Left Column: 7 Cols (Service, Barber, Time Details) --}}
        <div class="lg:col-span-7 space-y-6">
            
            {{-- Service Card --}}
            <div class="rounded-3xl bg-[#111827] border border-white/[0.08] p-6 space-y-5 shadow-xl">
                <div class="flex items-center justify-between pb-3 border-b border-white/[0.06]">
                    <h2 class="text-xs font-bold uppercase tracking-wider text-[#9CA3AF] flex items-center gap-2">
                        <i class="bi bi-scissors text-[#D4A72C]"></i>
                        <span>Detail Layanan & Jadwal</span>
                    </h2>
                    <span class="text-[11px] text-[#9CA3AF] font-medium">Gentleman Lounge</span>
                </div>

                <div class="space-y-4">
                    {{-- Service Name --}}
                    <div class="p-4 rounded-2xl bg-[#151B26] border border-white/[0.04]">
                        <span class="text-[11px] uppercase tracking-wider text-[#9CA3AF] block mb-1">Layanan yang Dipilih</span>
                        <div class="text-base sm:text-lg font-bold text-[#F5F5F5]">
                            {{ $booking->layanan }}
                        </div>
                        <p class="text-xs text-[#9CA3AF] mt-1">Perawatan rambut & grooming pria berstandar barbershop premium.</p>
                    </div>

                    {{-- Barber & Date Grid --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div class="p-4 rounded-2xl bg-[#151B26] border border-white/[0.04] space-y-1">
                            <span class="text-[11px] uppercase tracking-wider text-[#9CA3AF] block">Barber Bertugas</span>
                            <div class="text-sm font-semibold text-[#F5F5F5] flex items-center gap-1.5">
                                <i class="bi bi-person-circle text-[#D4A72C]"></i>
                                <span>{{ $booking->barber ?? 'Master Barber on Duty' }}</span>
                            </div>
                            <span class="text-[11px] text-[#9CA3AF] block">Spesialis Grooming</span>
                        </div>

                        <div class="p-4 rounded-2xl bg-[#151B26] border border-white/[0.04] space-y-1">
                            <span class="text-[11px] uppercase tracking-wider text-[#9CA3AF] block">Waktu Reservasi</span>
                            <div class="text-sm font-semibold text-[#F5F5F5] flex items-center gap-1.5">
                                <i class="bi bi-clock text-[#D4A72C]"></i>
                                <span>{{ $booking->jam }} WIB</span>
                            </div>
                            <span class="text-[11px] text-[#9CA3AF] block">
                                {{ $booking->tanggal ? $booking->tanggal->translatedFormat('d F Y') : '-' }}
                            </span>
                        </div>
                    </div>

                    {{-- Catatan Khusus --}}
                    <div class="p-4 rounded-2xl bg-[#151B26] border border-white/[0.04] space-y-1">
                        <span class="text-[11px] uppercase tracking-wider text-[#9CA3AF] block">Catatan / Preferensi Gaya</span>
                        <p class="text-xs text-[#F5F5F5] leading-relaxed">
                            {{ $booking->catatan ? $booking->catatan : 'Tidak ada catatan tambahan untuk kapster.' }}
                        </p>
                    </div>
                </div>
            </div>

            {{-- Process Flow / Check-in Steps --}}
            <div class="rounded-3xl bg-[#111827] border border-white/[0.08] p-6 space-y-4 shadow-xl">
                <h2 class="text-xs font-bold uppercase tracking-wider text-[#9CA3AF] flex items-center gap-2">
                    <i class="bi bi-signpost-split text-[#D4A72C]"></i>
                    <span>Alur Kunjungan & Validasi</span>
                </h2>

                <div class="space-y-3 text-xs text-[#9CA3AF]">
                    <div class="flex items-start gap-3 p-3 rounded-xl bg-[#151B26]/60 border border-white/[0.04]">
                        <span class="w-6 h-6 rounded-full bg-[#D4A72C]/10 text-[#D4A72C] flex items-center justify-center font-bold text-xs shrink-0 mt-0.5">1</span>
                        <div>
                            <strong class="text-[#F5F5F5] block">Tiba 10 Menit Lebih Awal</strong>
                            <span>Mohon hadir di Black Round Barbershop sebelum sesi dimulai agar tidak antre.</span>
                        </div>
                    </div>

                    <div class="flex items-start gap-3 p-3 rounded-xl bg-[#151B26]/60 border border-white/[0.04]">
                        <span class="w-6 h-6 rounded-full bg-[#D4A72C]/10 text-[#D4A72C] flex items-center justify-center font-bold text-xs shrink-0 mt-0.5">2</span>
                        <div>
                            <strong class="text-[#F5F5F5] block">Scan Barcode di Kasir</strong>
                            <span>Buka halaman tagihan dan tunjukkan barcode ke kasir untuk verifikasi cepat.</span>
                        </div>
                    </div>

                    <div class="flex items-start gap-3 p-3 rounded-xl bg-[#151B26]/60 border border-white/[0.04]">
                        <span class="w-6 h-6 rounded-full bg-[#D4A72C]/10 text-[#D4A72C] flex items-center justify-center font-bold text-xs shrink-0 mt-0.5">3</span>
                        <div>
                            <strong class="text-[#F5F5F5] block">Nikmati Sesi Cukur & Dapatkan Stempel</strong>
                            <span>Setelah selesai, kunjungan ini akan otomatis menambah 1 poin stempel loyalty Anda.</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- Right Column: 5 Cols (Payment Bill Box & Customer Info) --}}
        <div class="lg:col-span-5 space-y-6">
            
            {{-- Quick Payment Bill Card --}}
            <div class="rounded-3xl bg-gradient-to-b from-[#182030] to-[#111827] border border-[#D4A72C]/30 p-6 space-y-5 shadow-2xl relative overflow-hidden">
                <div class="absolute -right-6 -bottom-6 w-32 h-32 bg-[#D4A72C]/5 rounded-full blur-2xl pointer-events-none"></div>

                <div class="flex items-center justify-between pb-3 border-b border-white/[0.08]">
                    <span class="text-xs font-bold uppercase tracking-wider text-[#D4A72C] flex items-center gap-1.5">
                        <i class="bi bi-receipt"></i>
                        <span>Tagihan & Barcode</span>
                    </span>
                    <span class="text-[10px] font-mono px-2 py-0.5 rounded-full bg-white/[0.06] text-[#9CA3AF]">
                        Bayar di Kasir
                    </span>
                </div>

                <div class="text-center py-2 space-y-3">
                    <div class="inline-flex p-3 rounded-2xl bg-white border border-gray-200 shadow-md">
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=120x120&data={{ urlencode($booking->booking_code) }}" 
                             alt="QR Code {{ $booking->booking_code }}" 
                             class="w-24 h-24 object-contain">
                    </div>
                    <div>
                        <div class="text-xs font-mono font-bold tracking-widest text-[#F5F5F5]">{{ $booking->booking_code }}</div>
                        <p class="text-[11px] text-[#9CA3AF] mt-0.5">Scan kode ini di kasir untuk validasi</p>
                    </div>
                </div>

                <a href="{{ route('user.payment.show', $booking->id) }}" 
                   class="w-full inline-flex items-center justify-center gap-2 py-3 px-4 rounded-xl bg-[#D4A72C] hover:bg-[#c49826] text-black font-bold text-xs uppercase tracking-wider transition shadow-lg shadow-[#D4A72C]/20">
                    <i class="bi bi-receipt-cutoff text-sm"></i>
                    <span>Buka Tagihan Lengkap</span>
                </a>
            </div>

            {{-- Customer Credential Card --}}
            <div class="rounded-3xl bg-[#111827] border border-white/[0.08] p-6 space-y-4 shadow-xl">
                <div class="pb-3 border-b border-white/[0.06]">
                    <h2 class="text-xs font-bold uppercase tracking-wider text-[#9CA3AF] flex items-center gap-2">
                        <i class="bi bi-person-vcard text-[#D4A72C]"></i>
                        <span>Data Pelanggan</span>
                    </h2>
                </div>

                <div class="space-y-3 text-xs">
                    <div class="flex items-center justify-between">
                        <span class="text-[#9CA3AF]">Nama Lengkap</span>
                        <span class="font-semibold text-[#F5F5F5]">{{ $booking->nama_pelanggan }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-[#9CA3AF]">WhatsApp</span>
                        <span class="font-mono text-[#F5F5F5]">{{ $booking->no_whatsapp }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-[#9CA3AF]">Email</span>
                        <span class="text-[#F5F5F5]">{{ $booking->user->email ?? (Auth::user()->email ?? '-') }}</span>
                    </div>
                    <div class="flex items-center justify-between pt-2 border-t border-white/[0.04]">
                        <span class="text-[#9CA3AF]">Member ID</span>
                        <span class="font-mono font-semibold text-[#D4A72C]">
                            #MEMBER-{{ strtoupper(substr(md5($booking->no_whatsapp), 0, 6)) }}
                        </span>
                    </div>
                </div>

                {{-- Action Links --}}
                <div class="pt-3 border-t border-white/[0.06] space-y-2">
                    <a href="https://wa.me/6281234567890?text=Halo%20Black%20Round%20Barbershop,%20saya%20ingin%20tanya%20mengenai%20reservasi%20{{ $booking->booking_code }}" 
                       target="_blank" 
                       class="w-full inline-flex items-center justify-center gap-2 py-2.5 px-4 rounded-xl bg-emerald-600/10 hover:bg-emerald-600/20 text-emerald-400 border border-emerald-500/20 text-xs font-semibold transition">
                        <i class="bi bi-whatsapp"></i>
                        <span>Chat WhatsApp Barbershop</span>
                    </a>

                    @if(in_array($booking->status, ['confirmed', 'pending']))
                    <form action="{{ route('user.booking.destroy', $booking->id) }}" 
                          method="POST" 
                          onsubmit="return confirm('Apakah Anda yakin ingin membatalkan reservasi ini?');"
                          class="w-full">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="w-full inline-flex items-center justify-center gap-2 py-2 px-4 rounded-xl bg-red-500/10 hover:bg-red-500/20 text-red-400 border border-red-500/20 text-xs font-medium transition cursor-pointer">
                            <i class="bi bi-x-circle"></i>
                            <span>Batalkan Reservasi</span>
                        </button>
                    </form>
                    @endif
                </div>
            </div>

        </div>

    </div>

</div>
@endsection
