@extends('admin.layouts.app')
@section('title', 'Input Booking Baru — Admin Rusdi Barbershop')
@section('page_title', 'Input Booking')

@section('content')
<div class="form-page">

    <div class="page-header">
        <div>
            <h2 class="page-header-title">Formulir Input Booking</h2>
            <p class="page-header-desc">Catat reservasi manual dari pelanggan walk-in, WhatsApp, atau telepon.</p>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="btn btn--ghost">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
            Kembali
        </a>
    </div>

    <div class="form-card">
        <div class="form-card-header">
            <div class="form-card-title">Data Reservasi Pelanggan</div>
            <div class="form-card-desc">Isi semua kolom bertanda <span style="color:var(--c-red)">*</span> untuk menyimpan booking.</div>
        </div>

        <form action="{{ route('admin.booking.store') }}" method="POST">
            @csrf
            <div class="form-body">

                {{-- Section 1: Identitas --}}
                <div class="form-section-label">1 · Informasi Pelanggan</div>
                <div class="form-grid">
                    <div class="form-field">
                        <label class="form-label" for="nama_pelanggan">Nama Lengkap <span class="form-required">*</span></label>
                        <input type="text" id="nama_pelanggan" name="nama_pelanggan"
                               value="{{ old('nama_pelanggan') }}" placeholder="Contoh: Budi Santoso"
                               required class="form-input">
                    </div>
                    <div class="form-field">
                        <label class="form-label" for="no_whatsapp">No. WhatsApp <span class="form-required">*</span></label>
                        <input type="tel" id="no_whatsapp" name="no_whatsapp"
                               value="{{ old('no_whatsapp') }}" placeholder="Contoh: 081234567890"
                               required class="form-input">
                    </div>
                </div>

                {{-- Section 2: Layanan & Barber --}}
                <div class="form-section-label">2 · Layanan & Kapster</div>
                <div class="form-grid">
                    <div class="form-field">
                        <label class="form-label" for="layanan">Pilih Layanan <span class="form-required">*</span></label>
                        <select id="layanan" name="layanan" required class="form-input">
                            <option value="" disabled selected>-- Pilih layanan --</option>
                            @foreach($services as $svc)
                                <option value="{{ $svc->nama_layanan }}"
                                    {{ old('layanan') == $svc->nama_layanan ? 'selected' : '' }}>
                                    {{ $svc->nama_layanan }} — Rp {{ number_format($svc->harga, 0, ',', '.') }}
                                </option>
                            @endforeach
                            {{-- fallback manual options if no services yet --}}
                            @if($services->isEmpty())
                                <option value="Gentlemen Haircut + Wash" {{ old('layanan')=='Gentlemen Haircut + Wash'?'selected':'' }}>Gentlemen Haircut + Wash — Rp 65.000</option>
                                <option value="Classic Beard Trim & Shave" {{ old('layanan')=='Classic Beard Trim & Shave'?'selected':'' }}>Classic Beard Trim & Shave — Rp 45.000</option>
                                <option value="Royal Grooming Package" {{ old('layanan')=='Royal Grooming Package'?'selected':'' }}>Royal Grooming Package — Rp 120.000</option>
                                <option value="Express Cut" {{ old('layanan')=='Express Cut'?'selected':'' }}>Express Cut — Rp 50.000</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-field">
                        <label class="form-label" for="barber">Pilih Barber <span class="form-required">*</span></label>
                        <select id="barber" name="barber" required class="form-input">
                            <option value="" disabled selected>-- Pilih kapster --</option>
                            <option value="Rusdi (Master Barber)"   {{ old('barber')=='Rusdi (Master Barber)'?'selected':'' }}>Rusdi (Master Barber)</option>
                            <option value="Farhan (Fade Specialist)" {{ old('barber')=='Farhan (Fade Specialist)'?'selected':'' }}>Farhan (Fade Specialist)</option>
                            <option value="Budi (Classic Style)"    {{ old('barber')=='Budi (Classic Style)'?'selected':'' }}>Budi (Classic Style)</option>
                            <option value="Agung (Beard & Shave)"   {{ old('barber')=='Agung (Beard & Shave)'?'selected':'' }}>Agung (Beard & Shave)</option>
                        </select>
                    </div>
                </div>

                {{-- Section 3: Jadwal --}}
                <div class="form-section-label">3 · Jadwal Kunjungan</div>
                <div class="form-grid">
                    <div class="form-field">
                        <label class="form-label" for="tanggal">Tanggal <span class="form-required">*</span></label>
                        <input type="date" id="tanggal" name="tanggal"
                               value="{{ old('tanggal', date('Y-m-d')) }}"
                               min="{{ date('Y-m-d') }}" required class="form-input">
                    </div>
                    <div class="form-field">
                        <label class="form-label" for="jam">Slot Jam <span class="form-required">*</span></label>
                        <select id="jam" name="jam" required class="form-input">
                            <option value="" disabled selected>-- Pilih jam --</option>
                            @foreach(['10:00','10:45','11:30','13:00','13:45','14:30','15:15','16:00','17:00','19:00','19:45'] as $slot)
                            <option value="{{ $slot }} WIB" {{ old('jam')==$slot.' WIB'?'selected':'' }}>{{ $slot }} WIB</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- Catatan --}}
                <div class="form-field">
                    <label class="form-label" for="catatan">Catatan Tambahan</label>
                    <textarea id="catatan" name="catatan" class="form-input" rows="2"
                              placeholder="Contoh: Minta model two-block, alergi produk tertentu...">{{ old('catatan') }}</textarea>
                    <span class="form-hint">Opsional — catatan khusus dari pelanggan.</span>
                </div>

                {{-- Actions --}}
                <div class="form-actions">
                    <a href="{{ route('admin.dashboard') }}" class="btn btn--ghost">Batal</a>
                    <button type="submit" class="btn btn--primary">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        Simpan Booking
                    </button>
                </div>

            </div>
        </form>
    </div>

</div>
@endsection