@extends('user.layouts.app')

@section('title', 'Tagihan Pembayaran #' . ($booking->booking_code ?? 'BK') . ' — Black Round Barbershop')
@section('page_title', 'Tagihan & Barcode Pembayaran')

@section('styles')
<style>
    @media print {
        body {
            background-color: #ffffff !important;
            color: #000000 !important;
        }
        #userSidebar, #userSidebarBackdrop, nav, header, footer, .no-print {
            display: none !important;
        }
        main {
            padding: 0 !important;
            margin: 0 !important;
        }
        .lg\:pl-60 {
            padding-left: 0 !important;
        }
        .print-invoice-card {
            background-color: #ffffff !important;
            color: #111827 !important;
            border: 1px solid #e5e7eb !important;
            box-shadow: none !important;
            max-width: 100% !important;
            width: 100% !important;
            margin: 0 auto !important;
            page-break-inside: avoid;
        }
        .print-dark-text {
            color: #111827 !important;
        }
        .print-muted-text {
            color: #4b5563 !important;
        }
        .print-border {
            border-color: #e5e7eb !important;
        }
        .print-bg-subtle {
            background-color: #f9fafb !important;
        }
    }
</style>
@endsection

@section('content')
<div class="max-w-3xl mx-auto space-y-6">

    {{-- Breadcrumbs & Top Navigation --}}
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 no-print">
        <div class="flex items-center gap-2 text-xs text-[#9CA3AF]">
            <a href="{{ route('user.dashboard') }}" class="hover:text-[#D4A72C] transition">Dashboard</a>
            <span>/</span>
            <a href="{{ route('user.bookings.index') }}" class="hover:text-[#D4A72C] transition">Riwayat Cukur</a>
            <span>/</span>
            <a href="{{ route('user.bookings.show', $booking->id) }}" class="hover:text-[#D4A72C] transition">Detail #{{ $booking->booking_code }}</a>
            <span>/</span>
            <span class="text-[#F5F5F5] font-semibold">Tagihan & Barcode</span>
        </div>

        <div class="flex items-center gap-2 self-start sm:self-auto">
            <button type="button" onclick="window.print()" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-white/[0.06] hover:bg-white/[0.1] text-xs font-semibold text-[#F5F5F5] border border-white/[0.08] transition shadow-xs cursor-pointer">
                <i class="bi bi-printer text-sm text-[#D4A72C]"></i>
                <span>Cetak / Simpan PDF</span>
            </button>
            <a href="{{ route('user.bookings.show', $booking->id) }}" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-[#151B26] hover:bg-[#1c2433] text-xs font-semibold text-[#9CA3AF] hover:text-white border border-white/[0.08] transition">
                <i class="bi bi-arrow-left text-xs"></i>
                <span>Kembali</span>
            </a>
        </div>
    </div>

    {{-- Notification Banner --}}
    <div class="no-print p-4 rounded-2xl bg-[#D4A72C]/10 border border-[#D4A72C]/20 flex items-start gap-3 text-xs text-[#D4A72C]">
        <i class="bi bi-info-circle-fill text-base shrink-0 mt-0.5"></i>
        <div class="space-y-0.5 leading-relaxed text-[#F5F5F5]">
            <p class="font-semibold text-[#D4A72C]">Petunjuk Pembayaran & Validasi</p>
            <p class="text-xs text-[#9CA3AF]">Tunjukkan nota tagihan ini beserta <strong>Barcode / QR Code</strong> di bawah kepada Admin / Kasir Black Round Barbershop saat tiba di outlet untuk check-in dan menyelesaikan pembayaran.</p>
        </div>
    </div>

    {{-- Main Invoice / Bill Card --}}
    <div class="print-invoice-card rounded-3xl bg-[#111827] border border-white/[0.08] shadow-2xl overflow-hidden transition">
        
        {{-- Header Slip --}}
        <div class="p-6 sm:p-8 bg-gradient-to-b from-[#151B26] to-[#111827] border-b border-white/[0.06] print-border print-bg-subtle">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-6">
                {{-- Brand --}}
                <div class="flex items-center gap-3">
                    <span class="w-12 h-12 rounded-2xl bg-[#D4A72C]/10 border border-[#D4A72C]/30 flex items-center justify-center text-[#D4A72C] text-xl shadow-inner">
                        <i class="bi bi-scissors"></i>
                    </span>
                    <div>
                        <div class="flex items-center gap-2">
                            <h1 class="text-lg sm:text-xl font-bold text-[#F5F5F5] tracking-tight uppercase print-dark-text">Black Round Barbershop</h1>
                        </div>
                        <p class="text-xs text-[#9CA3AF] print-muted-text">Gentleman Lounge & Grooming Lounge &bull; Official Digital Bill</p>
                    </div>
                </div>

                {{-- Status Badge & Code --}}
                <div class="sm:text-right space-y-1.5">
                    <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold
                        @if($booking->status === 'completed' || ($payment && $payment->payment_status === 'paid'))
                            bg-emerald-500/10 text-emerald-400 border border-emerald-500/20
                        @elseif($booking->status === 'cancelled')
                            bg-red-500/10 text-red-400 border border-red-500/20
                        @else
                            bg-amber-500/10 text-amber-400 border border-amber-500/20
                        @endif">
                        <span class="w-1.5 h-1.5 rounded-full 
                            @if($booking->status === 'completed' || ($payment && $payment->payment_status === 'paid')) bg-emerald-400 
                            @elseif($booking->status === 'cancelled') bg-red-400 
                            @else bg-amber-400 animate-pulse @endif"></span>
                        <span>
                            @if($booking->status === 'completed' || ($payment && $payment->payment_status === 'paid'))
                                LUNAS (PAID)
                            @elseif($booking->status === 'cancelled')
                                DIBATALKAN
                            @else
                                MENUNGGU PEMBAYARAN KASIR
                            @endif
                        </span>
                    </div>
                    <div class="text-[11px] font-mono text-[#9CA3AF] print-muted-text">
                        No. Invoice: <strong class="text-[#F5F5F5] print-dark-text">{{ $payment->transaction_code ?? ('TRX-' . strtoupper(substr(md5($booking->booking_code), 0, 8))) }}</strong>
                    </div>
                </div>
            </div>
        </div>

        {{-- Bill Details Grid --}}
        <div class="p-6 sm:p-8 space-y-6">

            {{-- 2 Columns: User Credential & Service Information --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pb-6 border-b border-white/[0.06] print-border">
                
                {{-- Column 1: User / Customer Credential --}}
                <div class="space-y-3">
                    <div class="flex items-center gap-2 text-[11px] font-bold uppercase tracking-wider text-[#D4A72C]">
                        <i class="bi bi-person-badge"></i>
                        <span>Customer Credentials</span>
                    </div>
                    <div class="p-4 rounded-2xl bg-[#151B26]/80 border border-white/[0.04] space-y-2 print-bg-subtle print-border">
                        <div class="flex items-center justify-between text-xs">
                            <span class="text-[#9CA3AF] print-muted-text">Nama Pelanggan</span>
                            <span class="font-semibold text-[#F5F5F5] print-dark-text">{{ $booking->nama_pelanggan }}</span>
                        </div>
                        <div class="flex items-center justify-between text-xs">
                            <span class="text-[#9CA3AF] print-muted-text">No. WhatsApp</span>
                            <span class="font-mono text-[#F5F5F5] print-dark-text">{{ $booking->no_whatsapp }}</span>
                        </div>
                        <div class="flex items-center justify-between text-xs">
                            <span class="text-[#9CA3AF] print-muted-text">Email Member</span>
                            <span class="text-[#F5F5F5] print-dark-text">{{ $booking->user->email ?? (Auth::user()->email ?? '-') }}</span>
                        </div>
                        <div class="flex items-center justify-between text-xs pt-1 border-t border-white/[0.04] print-border">
                            <span class="text-[#9CA3AF] print-muted-text">Member ID</span>
                            <span class="font-mono font-medium text-[#D4A72C]">#MEMBER-{{ strtoupper(substr(md5($booking->no_whatsapp), 0, 6)) }}</span>
                        </div>
                    </div>
                </div>

                {{-- Column 2: Barber & Appointment Time --}}
                <div class="space-y-3">
                    <div class="flex items-center gap-2 text-[11px] font-bold uppercase tracking-wider text-[#D4A72C]">
                        <i class="bi bi-calendar2-week"></i>
                        <span>Waktu & Barber Bertugas</span>
                    </div>
                    <div class="p-4 rounded-2xl bg-[#151B26]/80 border border-white/[0.04] space-y-2 print-bg-subtle print-border">
                        <div class="flex items-center justify-between text-xs">
                            <span class="text-[#9CA3AF] print-muted-text">Barber in Duty</span>
                            <span class="font-semibold text-[#F5F5F5] flex items-center gap-1.5 print-dark-text">
                                <i class="bi bi-scissors text-[#D4A72C]"></i>
                                {{ $booking->barber ?? 'Master Barber on Duty' }}
                            </span>
                        </div>
                        <div class="flex items-center justify-between text-xs">
                            <span class="text-[#9CA3AF] print-muted-text">Tanggal Layanan</span>
                            <span class="font-medium text-[#F5F5F5] print-dark-text">
                                {{ $booking->tanggal ? $booking->tanggal->translatedFormat('l, d F Y') : '-' }}
                            </span>
                        </div>
                        <div class="flex items-center justify-between text-xs">
                            <span class="text-[#9CA3AF] print-muted-text">Jam Sesi</span>
                            <span class="font-mono font-semibold text-[#F5F5F5] print-dark-text">
                                {{ $booking->jam }} WIB
                            </span>
                        </div>
                        <div class="flex items-center justify-between text-xs pt-1 border-t border-white/[0.04] print-border">
                            <span class="text-[#9CA3AF] print-muted-text">Station Layanan</span>
                            <span class="text-[#9CA3AF] print-muted-text">Gentleman Lounge Chair</span>
                        </div>
                    </div>
                </div>

            </div>

            {{-- Service Breakdown / Cost Table --}}
            <div class="space-y-3">
                <div class="flex items-center gap-2 text-[11px] font-bold uppercase tracking-wider text-[#D4A72C]">
                    <i class="bi bi-receipt"></i>
                    <span>Rincian Biaya Layanan</span>
                </div>

                <div class="rounded-2xl border border-white/[0.06] overflow-hidden print-border">
                    <table class="w-full text-left text-xs text-[#9CA3AF]">
                        <thead class="bg-[#151B26] text-[11px] uppercase tracking-wider text-[#9CA3AF] font-bold border-b border-white/[0.06] print-bg-subtle print-border">
                            <tr>
                                <th class="px-5 py-3 print-dark-text">Deskripsi Layanan</th>
                                <th class="px-5 py-3 text-center print-dark-text">Durasi</th>
                                <th class="px-5 py-3 text-right print-dark-text">Harga</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/[0.04] print-border">
                            <tr>
                                <td class="px-5 py-4">
                                    <div class="font-semibold text-sm text-[#F5F5F5] print-dark-text">{{ $booking->layanan }}</div>
                                    <div class="text-[11px] text-[#9CA3AF] print-muted-text mt-0.5">
                                        Perawatan rambut profesional oleh {{ $booking->barber ?? 'Master Barber' }}
                                    </div>
                                    @if($booking->catatan)
                                        <div class="text-[11px] text-amber-400/90 mt-1 italic">
                                            Catatan khusus: "{{ $booking->catatan }}"
                                        </div>
                                    @endif
                                </td>
                                <td class="px-5 py-4 text-center font-medium text-[#F5F5F5] print-dark-text">
                                    ~45 Menit
                                </td>
                                <td class="px-5 py-4 text-right font-mono font-semibold text-sm text-[#F5F5F5] print-dark-text">
                                    Rp {{ number_format($booking->harga, 0, ',', '.') }}
                                </td>
                            </tr>
                            <tr class="bg-white/[0.01] print-bg-subtle">
                                <td colspan="2" class="px-5 py-2.5 text-right text-xs text-[#9CA3AF] print-muted-text">
                                    Biaya Layanan & Konsultasi Grooming
                                </td>
                                <td class="px-5 py-2.5 text-right font-mono text-xs text-emerald-400">
                                    GRATIS (Rp 0)
                                </td>
                            </tr>
                            <tr class="bg-white/[0.01] print-bg-subtle">
                                <td colspan="2" class="px-5 py-2.5 text-right text-xs text-[#9CA3AF] print-muted-text">
                                    PPN / Pajak Restorasi
                                </td>
                                <td class="px-5 py-2.5 text-right font-mono text-xs text-[#9CA3AF] print-muted-text">
                                    Termasuk
                                </td>
                            </tr>
                        </tbody>
                        <tfoot class="bg-[#151B26] border-t-2 border-white/[0.08] print-bg-subtle print-border">
                            <tr>
                                <td colspan="2" class="px-5 py-4 text-right font-bold text-sm text-[#F5F5F5] uppercase tracking-wider print-dark-text">
                                    Total Tagihan
                                </td>
                                <td class="px-5 py-4 text-right font-mono font-bold text-lg text-[#D4A72C]">
                                    Rp {{ number_format($booking->harga, 0, ',', '.') }}
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            {{-- BARCODE & QR VALIDATION SECTION FOR ADMIN TO SCAN --}}
            <div class="p-6 rounded-2xl bg-white text-gray-900 border border-gray-200 text-center space-y-4 shadow-lg print-border">
                <div class="space-y-1">
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[10px] font-bold tracking-wider uppercase bg-amber-100 text-amber-800">
                        <i class="bi bi-qr-code-scan"></i> Barcode Validasi Kasir / Admin
                    </span>
                    <h3 class="text-sm font-bold text-gray-900 tracking-tight">Tunjukkan Kode Ini Saat Tiba di Barbershop</h3>
                    <p class="text-xs text-gray-500 max-w-md mx-auto">Admin atau kasir akan memindai barcode di bawah untuk mengonfirmasi kehadiran serta memvalidasi pembayaran.</p>
                </div>

                {{-- Barcode Render + QR Code Side by Side --}}
                <div class="flex flex-col sm:flex-row items-center justify-center gap-6 py-2">
                    {{-- 1D Linear Barcode --}}
                    <div class="flex flex-col items-center justify-center p-3 bg-white rounded-xl border border-gray-200 shadow-xs">
                        <svg id="barcodeCanvas" class="max-w-[260px]"></svg>
                        <div class="text-[11px] font-mono tracking-widest font-bold text-gray-700 mt-1">
                            {{ $booking->booking_code }}
                        </div>
                    </div>

                    {{-- QR Code Alternative --}}
                    <div class="flex flex-col items-center justify-center p-3 bg-white rounded-xl border border-gray-200 shadow-xs">
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=110x110&data={{ urlencode($booking->booking_code) }}" 
                             alt="QR Code Booking {{ $booking->booking_code }}" 
                             class="w-24 h-24 object-contain">
                        <span class="text-[10px] font-mono text-gray-500 mt-1">Scan QR</span>
                    </div>
                </div>

                <div class="pt-2 border-t border-gray-100 text-[11px] text-gray-500 flex flex-wrap items-center justify-center gap-4">
                    <span>Metode Bayar: <strong>Tunai (Cash) / QRIS / Debit di Kasir</strong></span>
                    <span>&bull;</span>
                    <span>Kode Unik: <strong class="font-mono text-gray-800">{{ $booking->booking_code }}</strong></span>
                </div>
            </div>

            {{-- Policy / Footer Note --}}
            <div class="text-center text-xs text-[#9CA3AF] space-y-1 print-muted-text">
                <p>Terima kasih telah mempercayakan grooming Anda di <strong>Black Round Barbershop</strong>.</p>
                <p class="text-[11px] text-[#6B7280]">Harap hadir 10 menit sebelum jam reservasi. Untuk perubahan jadwal atau pertanyaan, hubungi layanan pelanggan kami via WhatsApp.</p>
            </div>

        </div>

        {{-- Bottom Actions (Hidden in Print) --}}
        <div class="no-print p-5 sm:p-6 bg-[#151B26] border-t border-white/[0.06] flex flex-col sm:flex-row items-center justify-between gap-3">
            <div class="flex items-center gap-2 text-xs text-[#9CA3AF]">
                <i class="bi bi-shield-check text-emerald-400 text-base"></i>
                <span>Transaksi aman & terverifikasi sistem barbershop</span>
            </div>

            <div class="flex items-center gap-2 w-full sm:w-auto">
                <a href="https://wa.me/6281234567890?text=Halo%20Black%20Round%20Barbershop,%20saya%20ingin%20konfirmasi%20pembayaran%20booking%20{{ $booking->booking_code }}" 
                   target="_blank" 
                   class="flex-1 sm:flex-none inline-flex items-center justify-center gap-1.5 px-4 py-2.5 rounded-xl bg-emerald-600/10 hover:bg-emerald-600/20 text-emerald-400 border border-emerald-500/20 text-xs font-semibold transition">
                    <i class="bi bi-whatsapp"></i>
                    <span>Konfirmasi WA</span>
                </a>
                <button type="button" 
                        onclick="window.print()" 
                        class="flex-1 sm:flex-none inline-flex items-center justify-center gap-1.5 px-5 py-2.5 rounded-xl bg-[#D4A72C] hover:bg-[#c49826] text-black font-semibold text-xs tracking-wider uppercase transition shadow-lg shadow-[#D4A72C]/10 cursor-pointer">
                    <i class="bi bi-printer-fill"></i>
                    <span>Cetak Nota</span>
                </button>
            </div>
        </div>

    </div>

</div>
@endsection

@section('scripts')
{{-- Load JsBarcode CDN to render crisp Code128 barcode --}}
<script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.5/dist/JsBarcode.all.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (window.JsBarcode) {
            try {
                JsBarcode("#barcodeCanvas", "{{ $booking->booking_code }}", {
                    format: "CODE128",
                    lineColor: "#111827",
                    width: 2,
                    height: 54,
                    displayValue: false,
                    margin: 0
                });
            } catch (e) {
                console.error("JsBarcode render error:", e);
            }
        }
    });
</script>
@endsection
