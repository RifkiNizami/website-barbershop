@extends('admin.layouts.app')
<<<<<<< HEAD
=======
@section('title', 'Dashboard — Rusdi Barbershop Admin')
@section('page_title', 'Dashboard')
>>>>>>> 236b8661ee4fa497f380a5bd668c8c7103d2b822

@section('content')

<<<<<<< HEAD
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
=======
{{-- ── STAT ROW ────────────────────────────────────────────── --}}
<div class="stat-row">
    <div class="stat-cell">
        <span class="stat-label">Booking Hari Ini</span>
        <span class="stat-value">{{ $stats['total_bookings_today'] ?? 0 }}</span>
        <span class="stat-sub stat-sub--up flex items-center gap-1">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="18 15 12 9 6 15"/></svg>
            Antrean aktif
        </span>
    </div>
    <div class="stat-cell">
        <span class="stat-label">Omset Bulan Ini</span>
        <span class="stat-value" style="font-size:18px">{{ $stats['monthly_income'] ?? 'Rp 0' }}</span>
        <span class="stat-sub stat-sub--up">Non-cancelled</span>
>>>>>>> 236b8661ee4fa497f380a5bd668c8c7103d2b822
    </div>
    <div class="stat-cell">
        <span class="stat-label">Layanan Aktif</span>
        <span class="stat-value">{{ $stats['total_services'] ?? 0 }}</span>
        <span class="stat-sub stat-sub--info">
            <a href="{{ route('admin.layanan.create') }}" style="color:inherit;text-decoration:none;">+ Tambah baru</a>
        </span>
    </div>
    <div class="stat-cell">
        <span class="stat-label">Barber On Duty</span>
        <span class="stat-value">{{ $stats['active_barbers'] ?? 4 }}</span>
        <span class="stat-sub flex items-center gap-1" style="color:var(--c-green)">
            <span style="width:6px;height:6px;border-radius:50%;background:var(--c-green);display:inline-block"></span>
            Semua tersedia
        </span>
    </div>
</div>

<<<<<<< HEAD
    <!-- Tabel Reservasi & Status Kapster -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Area Tabel Reservasi -->
        <div class="lg:col-span-2 bg-slate-900 border border-slate-800 rounded-lg p-5">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-sm font-semibold text-white">Daftar Reservasi Terbaru</h3>
                <span class="text-xs text-slate-500">Hari ini</span>
=======
{{-- ── MAIN GRID ───────────────────────────────────────────── --}}
<div class="dash-grid">

    {{-- LEFT: Booking table + Service list --}}
    <div class="dash-grid-left">

        {{-- RECENT BOOKINGS TABLE --}}
        <div class="data-table-wrap">
            <div class="data-table-header">
                <div>
                    <div class="section-title">Reservasi Terbaru</div>
                    <div class="section-title-sub">10 booking paling baru</div>
                </div>
                <a href="{{ route('admin.booking.create') }}" class="btn btn--primary" style="font-size:11px;padding:5px 12px">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                    Input Manual
                </a>
>>>>>>> 236b8661ee4fa497f380a5bd668c8c7103d2b822
            </div>
            
            <div class="overflow-x-auto">
<<<<<<< HEAD
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
=======
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Pelanggan</th>
                            <th>Layanan</th>
                            <th>Barber</th>
                            <th>Jam</th>
                            <th>Status</th>
                            <th style="text-align:right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentBookings as $b)
                        <tr>
                            <td>
                                <div class="cell-name">{{ $b['customer_name'] }}</div>
                                <div class="cell-meta">{{ $b['id'] }} · {{ $b['phone'] }}</div>
                            </td>
                            <td>
                                <div style="font-size:12px;color:var(--c-text-2)">{{ $b['service'] }}</div>
                                <div class="cell-price" style="margin-top:2px">{{ $b['price'] }}</div>
                            </td>
                            <td>
                                <span class="badge badge--barber">{{ $b['barber'] }}</span>
                            </td>
                            <td>
                                <span class="cell-time">{{ $b['time'] }}</span>
                            </td>
                            <td>
                                @php
                                    $statusClass = match($b['status']) {
                                        'confirmed' => 'badge--confirmed',
                                        'pending'   => 'badge--pending',
                                        'completed' => 'badge--completed',
                                        default     => 'badge--cancelled',
                                    };
                                    $statusLabel = match($b['status']) {
                                        'confirmed' => 'Confirmed',
                                        'pending'   => 'Pending',
                                        'completed' => 'Selesai',
                                        default     => 'Batal',
                                    };
                                @endphp
                                <span class="badge {{ $statusClass }}">{{ $statusLabel }}</span>
                            </td>
                            <td style="text-align:right">
                                <div style="display:inline-flex;gap:4px;align-items:center">
                                    {{-- Status update --}}
                                    <form action="{{ route('admin.booking.status', $b['db_id']) }}" method="POST" class="status-form inline-flex items-center">
                                        @csrf @method('PATCH')
                                        <select name="status" onchange="this.form.submit()" title="Ubah status booking">
                                            <option value="confirmed" {{ $b['status']=='confirmed'?'selected':'' }}>Confirmed</option>
                                            <option value="pending"   {{ $b['status']=='pending'?'selected':'' }}>Pending</option>
                                            <option value="completed" {{ $b['status']=='completed'?'selected':'' }}>Selesai</option>
                                            <option value="cancelled" {{ $b['status']=='cancelled'?'selected':'' }}>Batal</option>
                                        </select>
                                    </form>

                                    {{-- Delete --}}
                                    <form action="{{ route('admin.booking.destroy', $b['db_id']) }}" method="POST"
                                          onsubmit="return confirm('Hapus booking {{ $b['id'] }}?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn-icon btn-icon--danger" title="Hapus booking">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="data-table-empty">
                                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" style="margin:0 auto 8px;display:block;color:var(--c-text-3)"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="3" y1="10" x2="21" y2="10"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="16" y1="2" x2="16" y2="6"/></svg>
                                Belum ada booking. <a href="{{ route('admin.booking.create') }}" style="color:var(--c-red)">Input sekarang →</a>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- PAGINATION CONTROLS --}}
            @if($recentBookings->hasPages())
            <div class="data-table-footer">
                <div class="pagination-info">
                    Menampilkan <span>{{ $recentBookings->firstItem() }}</span> - <span>{{ $recentBookings->lastItem() }}</span> dari <span>{{ $recentBookings->total() }}</span> reservasi
                </div>
                <div class="pagination-controls">
                    {{-- Previous Page Link --}}
                    @if ($recentBookings->onFirstPage())
                        <span class="pagination-btn pagination-btn--disabled">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="15 18 9 12 15 6"/></svg> Prev
                        </span>
                    @else
                        <a href="{{ $recentBookings->previousPageUrl() }}" class="pagination-btn">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="15 18 9 12 15 6"/></svg> Prev
                        </a>
                    @endif

                    {{-- Page Numbers --}}
                    @foreach ($recentBookings->getUrlRange(1, $recentBookings->lastPage()) as $page => $url)
                        @if ($page == $recentBookings->currentPage())
                            <span class="pagination-page pagination-page--active">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="pagination-page">{{ $page }}</a>
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($recentBookings->hasMorePages())
                        <a href="{{ $recentBookings->nextPageUrl() }}" class="pagination-btn">
                            Next <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"/></svg>
                        </a>
                    @else
                        <span class="pagination-btn pagination-btn--disabled">
                            Next <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"/></svg>
                        </span>
                    @endif
                </div>
            </div>
            @endif

        </div>

        {{-- SERVICE LIST --}}
        <div class="data-table-wrap">
            <div class="data-table-header">
                <div>
                    <div class="section-title">Daftar Layanan</div>
                    <div class="section-title-sub">Semua layanan barbershop</div>
                </div>
                <a href="{{ route('admin.layanan.create') }}" class="btn btn--ghost" style="font-size:11px;padding:5px 12px">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                    Tambah
                </a>
            </div>
            <div class="service-list">
                @forelse($services as $svc)
                <div class="service-row">
                    <div class="service-row-info">
                        <div class="service-row-name">{{ $svc->nama_layanan }}</div>
                        <div class="service-row-meta">
                            {{ $svc->kategori }} · {{ $svc->durasi }} menit
                        </div>
                    </div>
                    <div style="display:flex;align-items:center;gap:10px">
                        <span class="service-row-price">Rp {{ number_format($svc->harga, 0, ',', '.') }}</span>
                        <span class="badge {{ $svc->is_active ? 'badge--active' : 'badge--inactive' }}">
                            {{ $svc->is_active ? 'Aktif' : 'Nonaktif' }}
                        </span>
                        <div class="service-row-actions">
                            <a href="{{ route('admin.layanan.edit', $svc->id) }}" class="btn-icon" title="Edit layanan">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                            </a>
                            <form action="{{ route('admin.layanan.destroy', $svc->id) }}" method="POST"
                                  onsubmit="return confirm('Hapus layanan {{ $svc->nama_layanan }}?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn-icon btn-icon--danger" title="Hapus layanan">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/></svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @empty
                <div class="service-row" style="justify-content:center;color:var(--c-text-3);font-size:12px;padding:24px">
                    Belum ada layanan. <a href="{{ route('admin.layanan.create') }}" style="color:var(--c-red);margin-left:4px">Tambah sekarang →</a>
                </div>
                @endforelse
            </div>
        </div>

    </div>

    {{-- RIGHT: Barbers + Quick actions + Info --}}
    <div class="dash-grid-right">

        {{-- BARBER STATUS --}}
        <div class="side-panel">
            <div class="side-panel-header">
                <span>Barber Hari Ini</span>
                <span class="badge badge--active">{{ $stats['active_barbers'] ?? 4 }} Siap</span>
            </div>
            <div class="side-panel-body">
                @php
                $barbers = [
                    ['init'=>'R','name'=>'Rusdi (Master)','queue'=>6,'status'=>'on'],
                    ['init'=>'F','name'=>'Farhan',        'queue'=>4,'status'=>'on'],
                    ['init'=>'B','name'=>'Budi',          'queue'=>5,'status'=>'on'],
                    ['init'=>'A','name'=>'Agung',         'queue'=>3,'status'=>'away'],
                ];
                @endphp
                @foreach($barbers as $i => $br)
                <div class="barber-row">
                    <div class="barber-avatar {{ $i===0 ? 'barber-avatar--red' : '' }}">{{ $br['init'] }}</div>
                    <div style="flex:1;min-width:0">
                        <div class="barber-name">{{ $br['name'] }}</div>
                        <div class="barber-queue">{{ $br['queue'] }} antrean</div>
                    </div>
                    <span class="barber-dot barber-dot--{{ $br['status'] }}" title="{{ $br['status']==='on' ? 'Siap' : 'Istirahat' }}"></span>
                </div>
                @endforeach
            </div>
        </div>

        {{-- QUICK ACTIONS --}}
        <div class="side-panel">
            <div class="side-panel-header">
                <span>Aksi Cepat</span>
            </div>
            <div class="side-panel-body">
                <div class="quick-actions">
                    <a href="{{ route('admin.booking.create') }}" class="quick-action-btn">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/><line x1="12" y1="14" x2="12" y2="18"/><line x1="10" y1="16" x2="14" y2="16"/></svg>
                        Input Booking Baru
                    </a>
                    <a href="{{ route('admin.layanan.create') }}" class="quick-action-btn">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="16"/><line x1="8" y1="12" x2="16" y2="12"/></svg>
                        Tambah Layanan Baru
                    </a>
                    <a href="{{ url('/') }}" target="_blank" class="quick-action-btn">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                        Lihat Halaman Utama
                    </a>
                </div>
            </div>
        </div>

        {{-- STORE INFO --}}
        <div class="info-block">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
            <div class="info-block-text">
                <strong style="color:var(--c-text-2)">Jam Operasional</strong><br>
                Setiap hari · <strong>10.00 – 21.00 WIB</strong><br>
                Sabtu & Minggu · <strong>09.00 – 22.00 WIB</strong><br>
                <span style="color:var(--c-green)">● Toko sedang buka</span>
            </div>
>>>>>>> 236b8661ee4fa497f380a5bd668c8c7103d2b822
        </div>
    </div>

</div>
<<<<<<< HEAD
=======

@endsection

@section('scripts')
<script>
// Auto-dismiss flash alert after 4s
const fa = document.getElementById('flashAlert');
if (fa) setTimeout(() => { fa.style.opacity='0'; fa.style.transition='opacity .4s'; setTimeout(()=>fa.remove(), 400); }, 4000);
</script>
>>>>>>> 236b8661ee4fa497f380a5bd668c8c7103d2b822
@endsection