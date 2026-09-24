@extends('admin.layouts.app')
@section('title', 'Demo Eloquent ORM vs SQL Builder — Admin Rusdi Barbershop')
@section('page_title', 'Demo ORM & SQL Builder')

@section('content')
<div class="space-y-6">

    {{-- Header Banner --}}
    <div class="page-header">
        <div>
            <h2 class="page-header-title">Contoh Penerapan Eloquent ORM vs SQL Query Builder</h2>
            <p class="page-header-desc">Dokumentasi dan pengujian langsung query database menggunakan Eloquent Model dan Facade DB (Query Builder).</p>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="btn btn--ghost">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
            Kembali ke Dashboard
        </a>
    </div>

    {{-- Ringkasan Perbedaan Card --}}
    <div class="stat-row">
        <div class="stat-cell">
            <span class="stat-label">Pendekatan 1</span>
            <span class="stat-value" style="font-size:16px;color:#93c5fd">Eloquent ORM</span>
            <span class="stat-sub">Object-Relational Mapping (Active Record Model)</span>
        </div>
        <div class="stat-cell">
            <span class="stat-label">Pendekatan 2</span>
            <span class="stat-value" style="font-size:16px;color:#fcd34d">SQL Builder</span>
            <span class="stat-sub">Fluent Query Interface via <code>DB::table()</code></span>
        </div>
        <div class="stat-cell">
            <span class="stat-label">Total Data Bookings</span>
            <span class="stat-value">{{ $eloquentAggregates['total_bookings'] }}</span>
            <span class="stat-sub stat-sub--up">Tersimpan di database</span>
        </div>
        <div class="stat-cell">
            <span class="stat-label">Omset Completed</span>
            <span class="stat-value" style="font-size:16px">Rp {{ number_format($eloquentAggregates['total_omset'], 0, ',', '.') }}</span>
            <span class="stat-sub stat-sub--up">Dihitung otomatis</span>
        </div>
    </div>

    {{-- ========================================================================= --}}
    {{-- BAGIAN 1: ELOQUENT ORM --}}
    {{-- ========================================================================= --}}
    <div class="form-card">
        <div class="form-card-header" style="background:rgba(59,130,246,0.08);border-bottom:1px solid rgba(59,130,246,0.2)">
            <div style="display:flex;align-items:center;gap:8px">
                <span class="badge badge--confirmed">BAGIAN 1</span>
                <span class="form-card-title" style="color:#93c5fd">Penerapan Eloquent ORM (App\Models\Booking)</span>
            </div>
            <p class="form-card-desc">Menggunakan representasi Class/Model PHP yang memetakan tabel database secara berorientasi objek.</p>
        </div>

        <div class="form-body">
            {{-- Code Snippet 1 --}}
            <div>
                <span class="form-section-label" style="color:#93c5fd">1.1 Query Where + Order By + Pagination dengan Eloquent</span>
                <pre style="background:var(--c-bg);padding:12px;border-radius:var(--radius-sm);border:1px solid var(--c-border);font-family:'Space Mono',monospace;font-size:11px;color:#93c5fd;overflow-x:auto;margin:8px 0 14px">// Mengambil data booking berstatus 'confirmed' dengan pagination 5 data per halaman
$eloquentPaginated = Booking::where('status', 'confirmed')
    ->orderBy('tanggal', 'desc')
    ->paginate(5, ['*'], 'eloquent_page');</pre>

                <div class="overflow-x-auto" style="border:1px solid var(--c-border);border-radius:var(--radius-sm)">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Kode Booking</th>
                                <th>Pelanggan</th>
                                <th>Layanan</th>
                                <th>Barber</th>
                                <th>Harga</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($eloquentPaginated as $b)
                            <tr>
                                <td class="cell-meta font-bold">{{ $b->booking_code }}</td>
                                <td class="cell-name">{{ $b->nama_pelanggan }}</td>
                                <td>{{ $b->layanan }}</td>
                                <td><span class="badge badge--barber">{{ $b->barber }}</span></td>
                                <td class="cell-price">Rp {{ number_format($b->harga, 0, ',', '.') }}</td>
                                <td><span class="badge badge--confirmed">{{ ucfirst($b->status) }}</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Pagination Links for Eloquent --}}
                @if($eloquentPaginated->hasPages())
                <div class="data-table-footer" style="margin-top:6px;border-radius:var(--radius-sm)">
                    <div class="pagination-info">
                        Halaman <span>{{ $eloquentPaginated->currentPage() }}</span> dari <span>{{ $eloquentPaginated->lastPage() }}</span> (Total {{ $eloquentPaginated->total() }} data)
                    </div>
                    <div class="pagination-controls">
                        @if(!$eloquentPaginated->onFirstPage())
                            <a href="{{ $eloquentPaginated->previousPageUrl() }}" class="pagination-btn">&laquo; Prev</a>
                        @endif
                        @foreach($eloquentPaginated->getUrlRange(1, $eloquentPaginated->lastPage()) as $p => $u)
                            <a href="{{ $u }}" class="pagination-page {{ $p == $eloquentPaginated->currentPage() ? 'pagination-page--active' : '' }}">{{ $p }}</a>
                        @endforeach
                        @if($eloquentPaginated->hasMorePages())
                            <a href="{{ $eloquentPaginated->nextPageUrl() }}" class="pagination-btn">Next &raquo;</a>
                        @endif
                    </div>
                </div>
                @endif
            </div>

            {{-- Code Snippet 2: Eager Loading Relasi --}}
            <div style="margin-top:16px;padding-top:16px;border-top:1px solid var(--c-border)">
                <span class="form-section-label" style="color:#93c5fd">1.2 Eager Loading Relasi Eloquent (Booking -> User)</span>
                <pre style="background:var(--c-bg);padding:12px;border-radius:var(--radius-sm);border:1px solid var(--c-border);font-family:'Space Mono',monospace;font-size:11px;color:#93c5fd;overflow-x:auto;margin:8px 0 14px">// Mengambil data Booking sekaligus me-load data relasi User miliknya (belongsTo)
$bookings = Booking::with('user')->whereNotNull('user_id')->latest()->take(5)->get();</pre>

                <div class="overflow-x-auto" style="border:1px solid var(--c-border);border-radius:var(--radius-sm)">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Booking Code</th>
                                <th>Nama di Booking</th>
                                <th>Relasi User (Name & Email)</th>
                                <th>Role User</th>
                                <th>Layanan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($eloquentWithRelation as $rel)
                            <tr>
                                <td class="cell-meta font-bold">{{ $rel->booking_code }}</td>
                                <td class="cell-name">{{ $rel->nama_pelanggan }}</td>
                                <td>
                                    @if($rel->user)
                                        <span class="cell-name">{{ $rel->user->name }}</span>
                                        <div class="cell-meta">{{ $rel->user->email }}</div>
                                    @else
                                        <span class="text-xs text-gray-500">Non-registered Customer</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge {{ ($rel->user && $rel->user->role === 'admin') ? 'badge--cancelled' : 'badge--barber' }}">
                                        {{ $rel->user ? ucfirst($rel->user->role) : 'Guest' }}
                                    </span>
                                </td>
                                <td>{{ $rel->layanan }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    {{-- ========================================================================= --}}
    {{-- BAGIAN 2: SQL QUERY BUILDER --}}
    {{-- ========================================================================= --}}
    <div class="form-card">
        <div class="form-card-header" style="background:rgba(245,158,11,0.08);border-bottom:1px solid rgba(245,158,11,0.2)">
            <div style="display:flex;align-items:center;gap:8px">
                <span class="badge badge--pending">BAGIAN 2</span>
                <span class="form-card-title" style="color:#fcd34d">Penerapan SQL Query Builder (Illuminate\Support\Facades\DB)</span>
            </div>
            <p class="form-card-desc">Menggunakan fluent interface <code>DB::table()</code> langsung ke tabel database tanpa perantara Model.</p>
        </div>

        <div class="form-body">
            {{-- Code Snippet 2.1 --}}
            <div>
                <span class="form-section-label" style="color:#fcd34d">2.1 Query Builder Select + Where + Pagination</span>
                <pre style="background:var(--c-bg);padding:12px;border-radius:var(--radius-sm);border:1px solid var(--c-border);font-family:'Space Mono',monospace;font-size:11px;color:#fcd34d;overflow-x:auto;margin:8px 0 14px">// Mengambil data dengan DB::table() langsung ke tabel 'bookings'
$builderPaginated = DB::table('bookings')
    ->select('booking_code', 'nama_pelanggan', 'layanan', 'barber', 'harga', 'status')
    ->where('status', 'confirmed')
    ->orderBy('tanggal', 'desc')
    ->paginate(5, ['*'], 'builder_page');</pre>

                <div class="overflow-x-auto" style="border:1px solid var(--c-border);border-radius:var(--radius-sm)">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Kode Booking</th>
                                <th>Pelanggan</th>
                                <th>Layanan</th>
                                <th>Barber</th>
                                <th>Harga</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($builderPaginated as $row)
                            <tr>
                                <td class="cell-meta font-bold">{{ $row->booking_code }}</td>
                                <td class="cell-name">{{ $row->nama_pelanggan }}</td>
                                <td>{{ $row->layanan }}</td>
                                <td><span class="badge badge--barber">{{ $row->barber }}</span></td>
                                <td class="cell-price">Rp {{ number_format($row->harga, 0, ',', '.') }}</td>
                                <td><span class="badge badge--confirmed">{{ ucfirst($row->status) }}</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Pagination Links for Builder --}}
                @if($builderPaginated->hasPages())
                <div class="data-table-footer" style="margin-top:6px;border-radius:var(--radius-sm)">
                    <div class="pagination-info">
                        Halaman <span>{{ $builderPaginated->currentPage() }}</span> dari <span>{{ $builderPaginated->lastPage() }}</span> (Total {{ $builderPaginated->total() }} data)
                    </div>
                    <div class="pagination-controls">
                        @if(!$builderPaginated->onFirstPage())
                            <a href="{{ $builderPaginated->previousPageUrl() }}" class="pagination-btn">&laquo; Prev</a>
                        @endif
                        @foreach($builderPaginated->getUrlRange(1, $builderPaginated->lastPage()) as $p => $u)
                            <a href="{{ $u }}" class="pagination-page {{ $p == $builderPaginated->currentPage() ? 'pagination-page--active' : '' }}">{{ $p }}</a>
                        @endforeach
                        @if($builderPaginated->hasMorePages())
                            <a href="{{ $builderPaginated->nextPageUrl() }}" class="pagination-btn">Next &raquo;</a>
                        @endif
                    </div>
                </div>
                @endif
            </div>

            {{-- Code Snippet 2.2: INNER JOIN --}}
            <div style="margin-top:16px;padding-top:16px;border-top:1px solid var(--c-border)">
                <span class="form-section-label" style="color:#fcd34d">2.2 Query Builder dengan SQL JOIN (Antara bookings & users)</span>
                <pre style="background:var(--c-bg);padding:12px;border-radius:var(--radius-sm);border:1px solid var(--c-border);font-family:'Space Mono',monospace;font-size:11px;color:#fcd34d;overflow-x:auto;margin:8px 0 14px">// Menggabungkan tabel bookings dan users menggunakan perintah join()
$joinedData = DB::table('bookings')
    ->join('users', 'bookings.user_id', '=', 'users.user_id')
    ->select('bookings.booking_code', 'bookings.nama_pelanggan', 'users.email', 'users.role', 'bookings.layanan', 'bookings.harga')
    ->take(5)
    ->get();</pre>

                <div class="overflow-x-auto" style="border:1px solid var(--c-border);border-radius:var(--radius-sm)">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Kode Booking</th>
                                <th>Nama Pelanggan</th>
                                <th>Email (Dari Tabel users)</th>
                                <th>Role User</th>
                                <th>Layanan</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($builderWithJoin as $j)
                            <tr>
                                <td class="cell-meta font-bold">{{ $j->booking_code }}</td>
                                <td class="cell-name">{{ $j->nama_pelanggan }}</td>
                                <td>{{ $j->user_email }}</td>
                                <td><span class="badge badge--barber">{{ ucfirst($j->user_role) }}</span></td>
                                <td>{{ $j->layanan }}</td>
                                <td class="cell-price">Rp {{ number_format($j->harga, 0, ',', '.') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Code Snippet 2.3: GROUP BY & DB::raw() --}}
            <div style="margin-top:16px;padding-top:16px;border-top:1px solid var(--c-border)">
                <span class="form-section-label" style="color:#fcd34d">2.3 Agregasi Kompleks: GROUP BY & DB::raw() (Statistik Barber)</span>
                <pre style="background:var(--c-bg);padding:12px;border-radius:var(--radius-sm);border:1px solid var(--c-border);font-family:'Space Mono',monospace;font-size:11px;color:#fcd34d;overflow-x:auto;margin:8px 0 14px">// Menghitung agregasi GROUP BY barber dengan DB::raw()
$barberStats = DB::table('bookings')
    ->select('barber', DB::raw('COUNT(*) as total_transaksi'), DB::raw('SUM(harga) as total_omset'), DB::raw('AVG(harga) as rata_rata_omset'))
    ->whereNotNull('barber')
    ->groupBy('barber')
    ->get();</pre>

                <div class="overflow-x-auto" style="border:1px solid var(--c-border);border-radius:var(--radius-sm)">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Nama Barber</th>
                                <th>Total Transaksi Cukur</th>
                                <th>Total Omset (SUM)</th>
                                <th>Rata-rata Harga Per Kunjungan (AVG)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($builderGroupByBarber as $stat)
                            <tr>
                                <td class="cell-name">💈 {{ $stat->barber }}</td>
                                <td class="font-mono font-bold" style="color:var(--c-blue)">{{ $stat->total_transaksi }} Transaksi</td>
                                <td class="cell-price" style="color:var(--c-green)">Rp {{ number_format($stat->total_omset, 0, ',', '.') }}</td>
                                <td class="cell-price">Rp {{ number_format(round($stat->rata_rata_omset), 0, ',', '.') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    {{-- ========================================================================= --}}
    {{-- BAGIAN 3: TABEL PERBANDINGAN TEORI (UNTUK LAPORAN / TUGAS) --}}
    {{-- ========================================================================= --}}
    <div class="form-card">
        <div class="form-card-header">
            <div class="form-card-title">Perbandingan: Kapan Menggunakan Eloquent ORM vs SQL Query Builder?</div>
            <p class="form-card-desc">Panduan komparatif untuk menjawab pertanyaan dosen atau laporan praktikum basis data web.</p>
        </div>
        <div class="overflow-x-auto">
            <table class="data-table">
                <thead>
                    <tr>
                        <th style="width:20%">Kriteria</th>
                        <th style="width:40%;color:#93c5fd">Eloquent ORM</th>
                        <th style="width:40%;color:#fcd34d">SQL Query Builder (DB::table)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="font-bold">Konsep Dasar</td>
                        <td>Object-Relational Mapping (Active Record). Tabel dipetakan ke dalam Class Model PHP.</td>
                        <td>Fluent Interface untuk membangun query SQL secara dinamis tanpa Model Class.</td>
                    </tr>
                    <tr>
                        <td class="font-bold">Kecepatan & Performa</td>
                        <td>Sedikit lebih lambat karena ada overhead instansiasi objek Model dan pemrosesan relasi.</td>
                        <td>Lebih cepat dan hemat memori (mendekati performa PDO / Native SQL murni).</td>
                    </tr>
                    <tr>
                        <td class="font-bold">Relasi Antar Tabel</td>
                        <td>Sangat mudah dan elegan menggunakan <code>hasMany</code>, <code>belongsTo</code>, <code>with()</code>.</td>
                        <td>Harus menulis <code>join('table', 'col1', '=', 'col2')</code> secara manual.</td>
                    </tr>
                    <tr>
                        <td class="font-bold">Fitur Tambahan</td>
                        <td>Mendukung Mutators, Accessors, Model Events, Observers, Soft Deletes, Query Scopes.</td>
                        <td>Mendukung query kompleks, nested subquery, agregasi raw SQL dengan <code>DB::raw()</code>.</td>
                    </tr>
                    <tr>
                        <td class="font-bold">Rekomendasi Pemakaian</td>
                        <td>Operasi CRUD standar, logika bisnis domain aplikasi, fitur yang membutuhkan relasi objek.</td>
                        <td>Laporan analitik, query data dalam jumlah jutaan baris (batch processing), join multi-tabel berat.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
