@extends('admin.layouts.app')
@section('title', 'Tambah Layanan — Admin Rusdi Barbershop')
@section('page_title', 'Tambah Layanan')

@section('content')
<div class="form-page">

    <div class="page-header">
        <div>
            <h2 class="page-header-title">Tambah Layanan Baru</h2>
            <p class="page-header-desc">Lengkapi detail layanan barbershop yang akan ditampilkan di daftar booking.</p>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="btn btn--ghost">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
            Kembali
        </a>
    </div>

    <div class="form-card">
        <div class="form-card-header">
            <div class="form-card-title">Detail Layanan</div>
            <div class="form-card-desc">Kolom bertanda <span style="color:var(--c-red)">*</span> wajib diisi.</div>
        </div>

        <form action="{{ route('admin.layanan.store') }}" method="POST">
            @csrf
            <div class="form-body">

                <div class="form-grid">
                    <div class="form-field">
                        <label class="form-label" for="nama_layanan">Nama Layanan <span class="form-required">*</span></label>
                        <input type="text" id="nama_layanan" name="nama_layanan"
                               value="{{ old('nama_layanan') }}"
                               placeholder="Contoh: Gentlemen Cut & Wash" required class="form-input">
                        <span class="form-hint">Nama yang muncul di pilihan booking pelanggan.</span>
                    </div>
                    <div class="form-field">
                        <label class="form-label" for="kategori">Kategori <span class="form-required">*</span></label>
                        <select id="kategori" name="kategori" required class="form-input">
                            <option value="" disabled selected>-- Pilih kategori --</option>
                            <option value="Haircut"      {{ old('kategori')=='Haircut'?'selected':'' }}>Haircut & Styling</option>
                            <option value="Shaving"      {{ old('kategori')=='Shaving'?'selected':'' }}>Beard Trim & Hot Towel Shave</option>
                            <option value="Treatment"    {{ old('kategori')=='Treatment'?'selected':'' }}>Hair Treatment / Creambath</option>
                            <option value="Coloring"     {{ old('kategori')=='Coloring'?'selected':'' }}>Hair Coloring / Bleaching</option>
                            <option value="Combo Package"{{ old('kategori')=='Combo Package'?'selected':'' }}>Paket Komplit / Combo</option>
                        </select>
                    </div>
                </div>

                <div class="form-grid">
                    <div class="form-field">
                        <label class="form-label" for="harga">Harga (Rp) <span class="form-required">*</span></label>
                        <div class="form-input-prefix">
                            <span class="prefix-label">Rp</span>
                            <input type="number" id="harga" name="harga"
                                   value="{{ old('harga') }}" placeholder="65000" min="0" required class="form-input">
                        </div>
                    </div>
                    <div class="form-field">
                        <label class="form-label" for="durasi">Estimasi Durasi <span class="form-required">*</span></label>
                        <div class="form-input-suffix">
                            <input type="number" id="durasi" name="durasi"
                                   value="{{ old('durasi', 45) }}" placeholder="45" min="5" step="5" required class="form-input">
                            <span class="suffix-label">Menit</span>
                        </div>
                    </div>
                </div>

                <div class="form-field">
                    <label class="form-label" for="deskripsi">Deskripsi Layanan</label>
                    <textarea id="deskripsi" name="deskripsi" class="form-input" rows="3"
                              placeholder="Contoh: Termasuk konsultasi model rambut, cuci rambut sebelum dan sesudah cukur, pijat kepala...">{{ old('deskripsi') }}</textarea>
                    <span class="form-hint">Opsional. Ditampilkan sebagai keterangan layanan.</span>
                </div>

                <div class="toggle-row">
                    <div class="toggle-info">
                        <div class="toggle-label">Aktifkan Layanan</div>
                        <div class="toggle-desc">Layanan ditampilkan di pilihan booking online pelanggan.</div>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox" name="is_active" value="1" checked>
                        <div class="toggle-track"><span class="toggle-thumb"></span></div>
                    </label>
                </div>

                <div class="form-actions">
                    <a href="{{ route('admin.dashboard') }}" class="btn btn--ghost">Batal</a>
                    <button type="submit" class="btn btn--primary">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        Simpan Layanan
                    </button>
                </div>

            </div>
        </form>
    </div>

</div>
@endsection