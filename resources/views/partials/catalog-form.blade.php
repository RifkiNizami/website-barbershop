<!-- ======================================================== -->
<!-- 5. FORMULIR PEMESANAN / RESERVASI MODEL KATALOG FOTO      -->
<!-- ======================================================== -->
<section id="form-katalog" class="py-20 bg-zinc-950 text-white relative overflow-hidden border-t border-zinc-900 scroll-mt-16">
    <!-- Ambient Glow Elements -->
    <div class="absolute top-1/4 -right-32 w-80 h-80 bg-barber-red/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-1/4 -left-32 w-80 h-80 bg-red-600/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-4xl mx-auto px-6 relative z-10">

        {{-- Flash Alert Sukses Booking --}}
        @if(session('catalog_success'))
        <div id="catalogAlert" class="mb-10 p-5 rounded-2xl bg-emerald-500/15 border border-emerald-500/40 text-emerald-300 flex items-start justify-between gap-4 shadow-2xl animate-fade-up">
            <div class="flex items-start gap-3.5">
                <div class="w-10 h-10 rounded-xl bg-emerald-500/20 text-emerald-400 flex items-center justify-center shrink-0">
                    <i class="bi bi-check-circle-fill text-xl"></i>
                </div>
                <div>
                    <h4 class="font-bold text-base text-white">Reservasi Berhasil Dikirim!</h4>
                    <p class="text-sm text-emerald-200/90 mt-1 leading-relaxed">{{ session('catalog_success') }}</p>
                </div>
            </div>
            <button type="button" onclick="document.getElementById('catalogAlert').remove()" class="text-emerald-400 hover:text-white p-1" aria-label="Tutup Notifikasi">
                <i class="bi bi-x-lg text-lg"></i>
            </button>
        </div>
        @endif

        <!-- Header Form Section (Centered) -->
        <div class="text-center max-w-2xl mx-auto mb-10 reveal">
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full text-xs font-bold tracking-widest uppercase bg-barber-red/20 text-barber-red border border-barber-red/40 mb-3">
                <i class="bi bi-calendar-check-fill"></i> Reservasi Katalog
            </div>
            <h2 class="text-3xl sm:text-4xl font-black tracking-tight uppercase text-white mb-3">
                Detail Model & Reservasi
            </h2>
            <p class="text-sm text-zinc-400">
                Pilih gaya rambut dari portofolio di atas. Pastikan Anda telah masuk ke akun Anda sebelum melakukan booking jadwal.
            </p>
        </div>

        <!-- ======================================================== -->
        <!-- DETAIL MODEL RAMBUT TERPILIH (POSISI DI TENGAH)          -->
        <!-- ======================================================== -->
        <div class="max-w-xl mx-auto bg-gradient-to-b from-zinc-900 via-zinc-900 to-black rounded-3xl border border-zinc-800 p-6 sm:p-8 shadow-2xl text-center relative transition-all duration-300 reveal">
            
            <!-- Badges Kategori Model (Di Tengah) -->
            <div class="flex items-center justify-center gap-2 mb-4">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-extrabold uppercase bg-barber-red/20 text-barber-red border border-barber-red/30">
                    <i class="bi bi-check2-circle"></i> Model Rambut Terpilih
                </span>
                <span id="selectedStyleTag" class="text-[10px] font-mono uppercase bg-zinc-800 text-zinc-400 px-2.5 py-1 rounded-full border border-zinc-700/60">
                    FRENCH CROP
                </span>
            </div>

            <!-- Foto Model Thumbnail (Di Tengah) -->
            <div class="relative w-64 h-64 sm:w-80 sm:h-80 mx-auto rounded-2xl overflow-hidden mb-5 border border-zinc-800/80 bg-zinc-950 shadow-2xl group">
                <img id="selectedStyleImg" src="{{ asset('images/style-crop.jpg') }}" alt="Model Terpilih" class="w-full h-full object-cover object-top transition-transform duration-500 group-hover:scale-105">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent pointer-events-none"></div>
                <div class="absolute bottom-3 left-3 right-3 flex items-center justify-center text-xs text-white">
                    <span id="selectedStyleMeta" class="bg-black/80 backdrop-blur-md px-3.5 py-1.5 rounded-xl border border-white/10 font-mono shadow-lg flex items-center gap-2">
                        <span class="inline-flex items-center gap-1 text-xs text-amber-400 font-semibold"><i class="bi bi-clock-fill"></i> 40 Menit</span> &bull; <span class="text-xs text-emerald-400 font-bold">Rp 55.000</span>
                    </span>
                </div>
            </div>

            <!-- Nama & Deskripsi Model (Di Tengah) -->
            <h3 id="selectedStyleName" class="text-2xl sm:text-3xl font-black text-white uppercase tracking-tight text-center">
                Textured French Crop
            </h3>
            <p id="selectedStyleDesc" class="text-xs sm:text-sm text-zinc-400 max-w-md mx-auto text-center mt-2 leading-relaxed">
                Poni tumpul horizontal dengan tekstur acak di bagian atas. Kesan fresh dan low-maintenance.
            </p>

            <!-- Rekomendasi Barber (Di Tengah) -->
            <div id="selectedStyleBarber" class="inline-flex items-center justify-center gap-1.5 mt-3 text-xs text-zinc-400 bg-zinc-900/90 px-3.5 py-1.5 rounded-full border border-zinc-800 mx-auto">
                <i class="bi bi-person-badge text-barber-red"></i>
                <span>Rekomendasi Kapster: <strong id="selectedStyleBarberName" class="text-zinc-200 font-semibold">Farhan (Fade Stylist)</strong></span>
            </div>

            {{-- Upload Custom Reference Photo Box (Di Tengah) --}}
            <div class="mt-6 pt-5 border-t border-zinc-800/80 max-w-md mx-auto text-left sm:text-center">
                <label class="block text-xs font-bold text-zinc-300 uppercase tracking-wider mb-2 flex items-center justify-between sm:justify-center sm:gap-2">
                    <span><i class="bi bi-cloud-arrow-up text-amber-400"></i> Punya Referensi Foto Sendiri?</span>
                    <span class="text-[10px] text-zinc-500 font-normal lowercase">(opsional)</span>
                </label>
                
                <div class="relative flex items-center">
                    <input type="file" id="foto_referensi" name="foto_referensi" form="catalogBookingForm" accept="image/*" onchange="previewCustomReferencePhoto(this)" class="w-full text-xs text-zinc-400 file:mr-3 file:py-2 file:px-3.5 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-zinc-800 file:text-zinc-200 hover:file:bg-zinc-700 file:cursor-pointer border border-zinc-800 rounded-xl p-1 bg-zinc-950">
                </div>

                {{-- Instant Image Preview Box --}}
                <div id="customRefPreviewBox" class="mt-3 hidden relative rounded-xl overflow-hidden border border-amber-500/40 bg-zinc-950 p-2.5 flex items-center gap-3 text-left">
                    <img id="customRefImg" src="" alt="Foto Referensi Pengguna" class="w-14 h-14 object-cover rounded-lg">
                    <div class="flex-1 min-w-0">
                        <p class="text-xs font-bold text-amber-400">Foto Referensi Terlampir</p>
                        <p class="text-[11px] text-zinc-400 truncate">Kapster akan menyesuaikan potongan dengan foto ini.</p>
                    </div>
                    <button type="button" onclick="clearCustomReferencePhoto()" class="text-zinc-400 hover:text-red-400 p-1.5" title="Hapus foto">
                        <i class="bi bi-x-circle text-lg"></i>
                    </button>
                </div>
            </div>

        </div>

        <!-- ======================================================== -->
        <!-- AREA RESERVASI: ARAHKAN KE LOGIN / TAMPILKAN FORM        -->
        <!-- ======================================================== -->
        @guest
        {{-- JIKA BELUM LOGIN: ARAHKAN KE LOGIN TERLEBIH DAHULU --}}
        <div class="max-w-xl mx-auto mt-8 p-8 bg-gradient-to-b from-zinc-900/90 to-black border border-barber-red/30 rounded-3xl shadow-2xl text-center relative overflow-hidden reveal">
            <div class="w-16 h-16 rounded-2xl bg-barber-red/15 text-barber-red flex items-center justify-center mx-auto mb-4 border border-barber-red/25 shadow-lg">
                <i class="bi bi-shield-lock-fill text-2xl"></i>
            </div>
            
            <h3 class="text-2xl font-black text-white tracking-tight uppercase mb-2">
                Login Terlebih Dahulu untuk Booking
            </h3>
            
            <p class="text-xs sm:text-sm text-zinc-300 max-w-md mx-auto leading-relaxed mb-6">
                Untuk memastikan jadwal dan kapster favorit Anda tersimpan di sistem, Anda perlu masuk ke akun terlebih dahulu sebelum melakukan reservasi.
            </p>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
                <a href="{{ route('login') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-3.5 bg-barber-red hover:bg-barber-darkred text-white font-black text-xs uppercase tracking-wider rounded-xl shadow-lg shadow-barber-red/40 transition transform hover:-translate-y-0.5">
                    <i class="bi bi-box-arrow-in-right text-base"></i>
                    <span>Masuk / Login Sekarang</span>
                </a>
                <a href="{{ route('user.register') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3.5 bg-zinc-800 hover:bg-zinc-700 text-zinc-200 hover:text-white font-bold text-xs uppercase tracking-wider rounded-xl border border-zinc-700 transition">
                    <i class="bi bi-person-plus text-base"></i>
                    <span>Daftar Akun Baru</span>
                </a>
            </div>

            <p class="text-[11px] text-zinc-500 mt-5 flex items-center justify-center gap-1.5">
                <i class="bi bi-info-circle text-amber-400"></i>
                <span>Gaya rambut yang Anda pilih di atas akan tetap tersimpan saat reservasi.</span>
            </p>
        </div>
        @else
        {{-- JIKA SUDAH LOGIN: TAMPILKAN FORMULIR RESERVASI LENGKAP --}}
        <div class="max-w-2xl mx-auto mt-8 bg-gradient-to-b from-zinc-900 to-black border border-zinc-800 rounded-3xl p-6 sm:p-10 shadow-2xl text-left reveal">
            
            <!-- Info Akun Member Aktif -->
            <div class="mb-6 p-4 rounded-2xl bg-zinc-950 border border-zinc-800 flex items-center justify-between">
                <div class="flex items-center gap-3.5">
                    <div class="w-10 h-10 rounded-xl bg-barber-red text-white flex items-center justify-center font-black text-base shadow-md">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                    <div>
                        <p class="text-xs sm:text-sm font-bold text-white">{{ auth()->user()->name }}</p>
                        <p class="text-[11px] text-zinc-400">{{ auth()->user()->email }} &bull; {{ auth()->user()->phone ?? 'Member' }}</p>
                    </div>
                </div>
                <span class="text-[10px] uppercase font-bold tracking-wider text-emerald-400 bg-emerald-500/10 border border-emerald-500/30 px-3 py-1 rounded-full">
                    ✓ Akun Terverifikasi
                </span>
            </div>

            <form id="catalogBookingForm" action="{{ route('booking.catalog') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                
                {{-- Hidden Model Rambut Value --}}
                <input type="hidden" name="model_rambut" id="formModelRambut" value="Textured French Crop">

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    {{-- Nama Pemesan --}}
                    <div>
                        <label class="block text-xs font-bold text-zinc-300 uppercase tracking-wider mb-1.5">
                            Nama Lengkap <span class="text-barber-red">*</span>
                        </label>
                        <input type="text" name="nama_pelanggan" id="formCustName" required value="{{ auth()->user()->name }}" class="w-full text-xs sm:text-sm px-4 py-3 bg-zinc-950 border border-zinc-800 rounded-xl text-white focus:border-barber-red focus:ring-1 focus:ring-barber-red outline-none transition">
                    </div>

                    {{-- WhatsApp --}}
                    <div>
                        <label class="block text-xs font-bold text-zinc-300 uppercase tracking-wider mb-1.5">
                            Nomor WhatsApp <span class="text-barber-red">*</span>
                        </label>
                        <input type="tel" name="no_whatsapp" id="formCustPhone" required value="{{ auth()->user()->phone ?? '' }}" placeholder="Contoh: 081234567890" class="w-full text-xs sm:text-sm px-4 py-3 bg-zinc-950 border border-zinc-800 rounded-xl text-white focus:border-barber-red focus:ring-1 focus:ring-barber-red outline-none transition">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    {{-- Layanan --}}
                    <div>
                        <label class="block text-xs font-bold text-zinc-300 uppercase tracking-wider mb-1.5">
                            Paket Layanan <span class="text-barber-red">*</span>
                        </label>
                        <select name="layanan" id="formLayanan" class="w-full text-xs sm:text-sm px-4 py-3 bg-zinc-950 border border-zinc-800 rounded-xl text-white focus:border-barber-red focus:ring-1 focus:ring-barber-red outline-none transition">
                            @if(isset($services) && count($services) > 0)
                                @foreach($services as $svc)
                                    <option value="{{ $svc->nama_layanan }}" {{ $svc->nama_layanan === 'Gentleman Haircut & Styling' ? 'selected' : '' }}>
                                        {{ $svc->nama_layanan }} (Rp {{ number_format($svc->harga, 0, ',', '.') }})
                                    </option>
                                @endforeach
                            @else
                                <option value="Gentleman Haircut & Styling">Gentleman Haircut & Styling (Rp 65.000)</option>
                                <option value="Undercut & Taper Fade Precision">Undercut & Taper Fade Precision (Rp 50.000)</option>
                                <option value="Beard Trim & Hot Towel Shave">Beard Trim & Hot Towel Shave (Rp 45.000)</option>
                                <option value="Classic Regular Haircut">Classic Regular Haircut (Rp 35.000)</option>
                                <option value="VIP Royal Full Grooming Package">VIP Royal Full Grooming Package (Rp 150.000)</option>
                            @endif
                        </select>
                    </div>

                    {{-- Pilihan Barber --}}
                    <div>
                        <label class="block text-xs font-bold text-zinc-300 uppercase tracking-wider mb-1.5">
                            Pilihan Kapster / Barber
                        </label>
                        <select name="barber" id="formBarber" class="w-full text-xs sm:text-sm px-4 py-3 bg-zinc-950 border border-zinc-800 rounded-xl text-white focus:border-barber-red focus:ring-1 focus:ring-barber-red outline-none transition">
                            <option value="Bebas / Rekomendasi Terbaik">Bebas / Rekomendasi Terbaik</option>
                            <option value="Rusdi (Master Barber)">Mas Rusdi (Master Barber)</option>
                            <option value="Farhan (Fade Specialist)" selected>Farhan (Fade Specialist)</option>
                            <option value="Budi (Classic Style)">Mas Budi (Classic Style)</option>
                            <option value="Agung (Beard & Shave)">Mas Agung (Beard & Shave)</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    {{-- Tanggal --}}
                    <div>
                        <label class="block text-xs font-bold text-zinc-300 uppercase tracking-wider mb-1.5">
                            Tanggal Kunjungan <span class="text-barber-red">*</span>
                        </label>
                        <input type="date" name="tanggal" id="formTanggal" required value="{{ date('Y-m-d') }}" min="{{ date('Y-m-d') }}" class="w-full text-xs sm:text-sm px-4 py-3 bg-zinc-950 border border-zinc-800 rounded-xl text-white focus:border-barber-red focus:ring-1 focus:ring-barber-red outline-none transition">
                    </div>

                    {{-- Jam --}}
                    <div>
                        <label class="block text-xs font-bold text-zinc-300 uppercase tracking-wider mb-1.5">
                            Pilihan Slot Jam <span class="text-barber-red">*</span>
                        </label>
                        <select name="jam" id="formJam" class="w-full text-xs sm:text-sm px-4 py-3 bg-zinc-950 border border-zinc-800 rounded-xl text-white focus:border-barber-red focus:ring-1 focus:ring-barber-red outline-none transition">
                            <option>10:00 WIB</option>
                            <option>11:00 WIB</option>
                            <option>13:00 WIB</option>
                            <option selected>14:00 WIB</option>
                            <option>15:00 WIB</option>
                            <option>16:00 WIB</option>
                            <option>17:00 WIB</option>
                            <option>19:00 WIB</option>
                            <option>20:00 WIB</option>
                        </select>
                    </div>
                </div>

                {{-- Catatan --}}
                <div>
                    <label class="block text-xs font-bold text-zinc-300 uppercase tracking-wider mb-1.5">
                        Catatan / Permintaan Khusus
                    </label>
                    <textarea name="catatan" id="formCatatan" rows="2" placeholder="Contoh: Bagian samping dibuat tipis high taper fade, atas disisir ke samping." class="w-full text-xs sm:text-sm px-4 py-2.5 bg-zinc-950 border border-zinc-800 rounded-xl text-white focus:border-barber-red focus:ring-1 focus:ring-barber-red outline-none transition resize-none"></textarea>
                </div>

                {{-- Action Buttons (WhatsApp & Database) --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2">
                    <button type="button" onclick="submitCatalogWhatsApp()" class="w-full py-3.5 px-4 bg-emerald-600 hover:bg-emerald-500 text-white font-black text-xs uppercase tracking-wider rounded-xl shadow-lg shadow-emerald-900/30 transition flex items-center justify-center gap-2 cursor-pointer">
                        <i class="bi bi-whatsapp text-base"></i> Booking via WhatsApp
                    </button>
                    
                    <button type="submit" class="w-full py-3.5 px-4 bg-barber-red hover:bg-barber-darkred text-white font-black text-xs uppercase tracking-wider rounded-xl shadow-lg shadow-red-900/40 transition flex items-center justify-center gap-2 cursor-pointer">
                        <i class="bi bi-calendar-check text-base"></i> Simpan Reservasi Web
                    </button>
                </div>
            </form>
        </div>
        @endguest

    </div>
</section>
