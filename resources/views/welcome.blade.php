@extends('layouts.app')

@section('title', 'Black Crown Barbershop')

@section('content')
    <!-- 1. HERO SECTION -->
    <section id="home" class="relative min-h-145 md:min-h-screen flex items-center justify-center text-center text-white overflow-hidden">
        <!-- Background Image with Overlay (Diperbaiki Gradientnya) -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/hero-barber.jpg') }}" alt="Black Crown Barbershop Hero" class="w-full h-full object-cover object-center filter brightness-50">
            <!-- Memperhalus gradient agar teks lebih kontras -->
            <div class="absolute inset-0 bg-linear-to-b from-black/70 via-black/40 to-black/90"></div>
        </div>

        <!-- Hero Content (Ditambahkan animasi masuk) -->
        <div class="relative z-10 max-w-4xl mx-auto px-6 pt-24 pb-16 flex flex-col items-center reveal active">
            <p class="text-xs md:text-sm font-bold tracking-[0.3em] uppercase text-barber-red mb-4 drop-shadow">
                Premium Gentlemen Grooming
            </p>

            <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-extrabold tracking-tight leading-tight md:leading-tight mb-6 uppercase drop-shadow-lg text-white">
                GET POPULAR <br class="hidden md:block" /> <span class="text-transparent bg-clip-text bg-linear-to-r from-white to-gray-400">HAIR STYLE</span>
            </h1>

            <p class="text-sm md:text-base text-gray-300 max-w-xl mx-auto mb-10 font-normal leading-relaxed drop-shadow">
                Wujudkan potongan rambut idaman Anda bersama barber berpengalaman dengan teknik cukur presisi dan pelayanan ternyaman di kelasnya.
            </p>

            <button onclick="openBookingModal()" type="button" class="inline-flex items-center justify-center px-8 py-4 bg-barber-red hover:bg-barber-darkred text-white text-sm font-bold tracking-wider uppercase rounded-full shadow-lg shadow-barber-red/40 transition-all duration-300 transform hover:-translate-y-1 active:translate-y-0 cursor-pointer group">
                <span>Book Appointment</span>
                <i class="bi bi-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
            </button>

            <!-- Scroll Down Indicator -->
            <a href="#about" class="absolute bottom-10 flex flex-col items-center gap-2 text-gray-400 hover:text-white transition-colors duration-300 group cursor-pointer">
                <span class="text-[10px] tracking-[0.2em] uppercase opacity-75 group-hover:opacity-100">Scroll Down</span>
                <svg class="w-5 h-5 animate-bounce text-gray-400 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </a>
        </div>
    </section>

    <!-- 2. ABOUT SECTION -->
    <section id="about" class="py-24 md:py-32 bg-white overflow-hidden">
        <div class="max-w-6xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-16 lg:gap-24 items-center">
                <!-- Left Image -->
                <div class="relative flex justify-center md:justify-start reveal">
                    <div class="relative w-full max-w-md group">
                        <img src="{{ asset('images/hair-wash.jpg') }}" alt="Layanan Cuci Rambut Black Crown Barbershop" class="w-full h-100 md:h-125 object-cover rounded-2xl shadow-2xl group-hover:scale-[1.02] transition-transform duration-500">
                                                <!-- Circular Badge -->
                        <div class="absolute -bottom-6 -right-6 w-28 h-28 md:w-32 md:h-32 rounded-full bg-barber-red text-white flex flex-col items-center justify-center text-center shadow-xl">
                            <span class="text-[10px] md:text-xs uppercase font-semibold tracking-widest opacity-90">EST.</span>
                            <span class="text-2xl md:text-3xl font-black tracking-tight leading-none my-1">2026</span>
                        </div>
                    </div>
                </div>

                <!-- Right Description -->
                <div class="flex flex-col text-left reveal delay-200">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="w-10 h-0.5 bg-barber-red"></span>
                        <span class="text-xs font-bold text-barber-red uppercase tracking-widest">Tentang Kami</span>
                    </div>
                    <h2 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-gray-900 mb-6 tracking-tight leading-tight">
                        Lebih Dari Sekadar <br /> Tempat Cukur
                    </h2>
                    
                    <p class="text-base text-gray-600 leading-relaxed mb-5">
                        Black Crown Barbershop adalah pilihan pria modern yang menghargai kerapian, ketelitian, dan kenyamanan. Kami percaya bahwa setiap potongan rambut merefleksikan karakter dan kepercayaan diri Anda.
                    </p>

                    <p class="text-base text-gray-600 leading-relaxed mb-8">
                        Dengan pengalaman bertahun-tahun, kapster kami ahli dalam berbagai gaya—dari potongan klasik <i>gentlemen</i> hingga tren <i>fade</i> kekinian. Alat selalu disterilkan secara berkala untuk menjaga kebersihan maksimal.
                    </p>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="flex items-center gap-3 bg-gray-50 p-4 rounded-xl border border-gray-100 hover:border-barber-red/30 transition-colors">
                            <div class="w-10 h-10 rounded-full bg-red-50 flex items-center justify-center text-barber-red shrink-0">
                                <i class="bi bi-person-badge-fill text-lg"></i>
                            </div>
                            <span class="text-sm font-bold text-gray-800">Barber Profesional</span>
                        </div>
                        <div class="flex items-center gap-3 bg-gray-50 p-4 rounded-xl border border-gray-100 hover:border-barber-red/30 transition-colors">
                            <div class="w-10 h-10 rounded-full bg-red-50 flex items-center justify-center text-barber-red shrink-0">
                                <i class="bi bi-snow text-lg"></i>
                            </div>
                            <span class="text-sm font-bold text-gray-800">Tempat Full AC</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. PRICING SECTION -->
    <section id="pricing" class="py-24 md:py-32 bg-gray-50 border-t border-gray-100">
        <div class="max-w-6xl mx-auto px-6">
            <!-- Section Header -->
            <div class="text-center mb-16 reveal">
                <span class="text-xs font-bold text-barber-red uppercase tracking-widest block mb-2">Harga Transparan</span>
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-gray-900 mb-4 tracking-tight">
                    Pricing
                </h2>
                <p class="text-base text-gray-500 font-normal max-w-2xl mx-auto">
                    Kualitas pelayanan premium dengan harga yang rasional. Pilih layanan yang sesuai dengan kebutuhan gaya Anda hari ini.
                </p>
            </div>
            <div class="max-w-md mx-auto">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden flex flex-col hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 reveal">
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{ asset('images/service-haircut.jpg') }}" alt="Layanan Haircut & Styling" class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                        <div class="absolute inset-0 bg-linear-to-t from-black/70 to-transparent flex items-end p-6">
                            <h3 class="text-2xl font-bold text-white drop-shadow-md">Haircut & Styling</h3>
                        </div>
                    </div>
                    <div class="p-8 flex-1 flex flex-col bg-white relative z-10 -mt-2 rounded-t-2xl">
                        <ul class="space-y-4 text-sm text-gray-600 flex-1">
                            <li class="flex items-baseline justify-between group">
                                <span class="font-semibold text-gray-800">Potong Rambut Biasa</span>
                                <span class="price-dots"></span>
                                <span class="font-bold text-barber-red">Rp 25.000</span>
                            </li>
                            <li class="flex items-baseline justify-between group">
                                <span class="font-semibold text-gray-800">Potong Rambut, Cuci & Style</span>
                                <span class="price-dots"></span>
                                <span class="font-bold text-barber-red">Rp 35.000</span>
                            </li>
                            <li class="flex items-baseline justify-between group">
                                <span class="font-semibold text-gray-800">Hair Coloring</span>
                                <span class="price-dots"></span>
                                <span class="font-bold text-barber-red">Rp 120.000</span>
                            </li>
                        </ul>
                    </div>
        </div>
    </section>

    <!-- 4. KATALOG FOTO GAYA RAMBUT & FORM PEMESANAN -->
    <section id="katalog" class="py-24 bg-zinc-950 text-white relative overflow-hidden border-t border-zinc-900 scroll-mt-16">
        <div id="gallery" class="absolute -top-20"></div>

        <!-- Ambient Glow Elements -->
        <div class="absolute top-1/4 -left-32 w-96 h-96 bg-barber-red/10 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-1/4 -right-32 w-96 h-96 bg-red-600/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-6xl mx-auto px-6 relative z-10">

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

            <!-- Section Header -->
            <div class="text-center max-w-3xl mx-auto mb-12 reveal">
                <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full text-xs font-bold tracking-widest uppercase bg-barber-red/20 text-barber-red border border-barber-red/40 mb-3">
                    <i class="bi bi-camera-fill"></i> Lookbook & Hairstyle Catalog
                </div>
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-black tracking-tight uppercase text-white mb-4">
                    Katalog Foto Gaya Rambut
                </h2>
                <p class="text-sm md:text-base text-zinc-400 leading-relaxed">
                    Pilih potongan rambut idaman Anda dari koleksi portofolio terbaik kami di bawah ini. Klik <strong class="text-white">"Pilih Gaya Ini"</strong> untuk langsung memasukkannya ke formulir pemesanan.
                </p>
            </div>

            <!-- Filter Categories -->
            <div class="flex items-center justify-center gap-2 sm:gap-3 flex-wrap mb-12 reveal">
                <button type="button" onclick="filterCatalog('all', this)" class="filter-btn active px-4 py-2 rounded-full text-xs sm:text-sm font-semibold border border-zinc-800 bg-zinc-900 text-zinc-300 hover:text-white cursor-pointer">
                    Semua Model (8)
                </button>
                <button type="button" onclick="filterCatalog('crop', this)" class="filter-btn px-4 py-2 rounded-full text-xs sm:text-sm font-semibold border border-zinc-800 bg-zinc-900 text-zinc-300 hover:text-white cursor-pointer">
                    French Crop
                </button>
                <button type="button" onclick="filterCatalog('fade', this)" class="filter-btn px-4 py-2 rounded-full text-xs sm:text-sm font-semibold border border-zinc-800 bg-zinc-900 text-zinc-300 hover:text-white cursor-pointer">
                    Fade & Taper
                </button>
                <button type="button" onclick="filterCatalog('classic', this)" class="filter-btn px-4 py-2 rounded-full text-xs sm:text-sm font-semibold border border-zinc-800 bg-zinc-900 text-zinc-300 hover:text-white cursor-pointer">
                    Classic Pompadour
                </button>
                <button type="button" onclick="filterCatalog('beard', this)" class="filter-btn px-4 py-2 rounded-full text-xs sm:text-sm font-semibold border border-zinc-800 bg-zinc-900 text-zinc-300 hover:text-white cursor-pointer">
                    Beard & Shave
                </button>
                <button type="button" onclick="filterCatalog('coloring', this)" class="filter-btn px-4 py-2 rounded-full text-xs sm:text-sm font-semibold border border-zinc-800 bg-zinc-900 text-zinc-300 hover:text-white cursor-pointer">
                    Coloring & Care
                </button>
            </div>

            <!-- Catalog Cards Grid (8 Models) -->
            <div id="catalogGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-16">

                <!-- 1. French Crop -->
                <div class="catalog-item catalog-card group flex flex-col bg-zinc-900 rounded-2xl border border-zinc-800 overflow-hidden shadow-lg hover:border-barber-red/50 reveal" data-category="crop">
                    <div class="relative h-64 overflow-hidden bg-black cursor-pointer" onclick="openCatalogLightbox('{{ asset('images/style-crop.jpg') }}', 'Textured French Crop', 'FRENCH CROP', 'Poni tumpul horizontal dengan tekstur acak alami di bagian atas. Memberikan kesan muda, berani, dan sangat mudah diatur tanpa perlu pomade berlebih.')">
                        <img src="{{ asset('images/style-crop.jpg') }}" alt="Textured French Crop" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-black/20"></div>
                        <span class="absolute top-3 left-3 px-2.5 py-1 rounded-md text-[10px] font-extrabold uppercase tracking-wider bg-barber-red text-white shadow">
                            🔥 Trending
                        </span>
                        <div class="absolute bottom-3 right-3 text-xs text-white/90 bg-black/60 backdrop-blur-xs px-2.5 py-1 rounded-md font-mono">
                            40 Mnt &bull; Rp 55K
                        </div>
                    </div>
                    <div class="p-5 flex-1 flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between gap-2 mb-1">
                                <h3 class="font-extrabold text-base text-white">Textured French Crop</h3>
                                <span class="text-[10px] uppercase font-bold text-zinc-400 bg-zinc-800 px-2 py-0.5 rounded">Crop</span>
                            </div>
                            <p class="text-xs text-zinc-400 leading-relaxed mb-4">
                                Poni tumpul horizontal dengan tekstur acak di bagian atas. Kesan fresh dan low-maintenance.
                            </p>
                            <div class="text-[11px] text-zinc-400 mb-4 flex items-center gap-1.5">
                                <i class="bi bi-person-badge text-barber-red"></i> Rekomendasi: <span class="text-zinc-200 font-semibold">Farhan (Fade Stylist)</span>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-2 pt-2 border-t border-zinc-800">
                            <button type="button" onclick="openCatalogLightbox('{{ asset('images/style-crop.jpg') }}', 'Textured French Crop', 'FRENCH CROP', 'Poni tumpul horizontal dengan tekstur acak alami di bagian atas. Memberikan kesan muda, berani, dan sangat mudah diatur tanpa perlu pomade berlebih.')" class="py-2 px-3 rounded-xl border border-zinc-700 bg-zinc-800 hover:bg-zinc-700 text-zinc-300 text-xs font-bold transition flex items-center justify-center gap-1 cursor-pointer">
                                <i class="bi bi-zoom-in"></i> Zoom
                            </button>
                            <button type="button" onclick="selectCatalogStyle('Textured French Crop', 'French Crop', '{{ asset('images/style-crop.jpg') }}', 'Rp 55.000', '40 Menit', 'Poni tumpul horizontal dengan tekstur acak di bagian atas. Kesan fresh dan low-maintenance.', 'Farhan', 'Gentleman Haircut & Styling')" class="py-2 px-3 rounded-xl bg-barber-red hover:bg-barber-darkred text-white text-xs font-bold transition flex items-center justify-center gap-1 shadow cursor-pointer">
                                <i class="bi bi-check2"></i> Pilih Gaya
                            </button>
                        </div>
                    </div>
                </div>

                <!-- 2. Low Skin Taper Fade -->
                <div class="catalog-item catalog-card group flex flex-col bg-zinc-900 rounded-2xl border border-zinc-800 overflow-hidden shadow-lg hover:border-barber-red/50 reveal delay-100" data-category="fade">
                    <div class="relative h-64 overflow-hidden bg-black cursor-pointer" onclick="openCatalogLightbox('{{ asset('images/style-fade.jpg') }}', 'Low Skin Taper Fade', 'FADE & TAPER', 'Gradasi halus dari kulit licin di samping dan belakang yang berpadu presisi ke rambut bagian atas. Pilihan utama untuk tampilan rapi dan maskulin.')">
                        <img src="{{ asset('images/style-fade.jpg') }}" alt="Low Skin Taper Fade" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-black/20"></div>
                        <span class="absolute top-3 left-3 px-2.5 py-1 rounded-md text-[10px] font-extrabold uppercase tracking-wider bg-zinc-800 text-amber-400 border border-amber-500/30 shadow">
                            ⚡ Clean Fade
                        </span>
                        <div class="absolute bottom-3 right-3 text-xs text-white/90 bg-black/60 backdrop-blur-xs px-2.5 py-1 rounded-md font-mono">
                            40 Mnt &bull; Rp 50K
                        </div>
                    </div>
                    <div class="p-5 flex-1 flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between gap-2 mb-1">
                                <h3 class="font-extrabold text-base text-white">Low Skin Taper Fade</h3>
                                <span class="text-[10px] uppercase font-bold text-zinc-400 bg-zinc-800 px-2 py-0.5 rounded">Fade</span>
                            </div>
                            <p class="text-xs text-zinc-400 leading-relaxed mb-4">
                                Gradasi kulit samping presisi tinggi yang halus. Paling digemari untuk gaya harian kerja dan kuliah.
                            </p>
                            <div class="text-[11px] text-zinc-400 mb-4 flex items-center gap-1.5">
                                <i class="bi bi-person-badge text-barber-red"></i> Rekomendasi: <span class="text-zinc-200 font-semibold">Rusdi (Master Barber)</span>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-2 pt-2 border-t border-zinc-800">
                            <button type="button" onclick="openCatalogLightbox('{{ asset('images/style-fade.jpg') }}', 'Low Skin Taper Fade', 'FADE & TAPER', 'Gradasi halus dari kulit licin di samping dan belakang yang berpadu presisi ke rambut bagian atas. Pilihan utama untuk tampilan rapi dan maskulin.')" class="py-2 px-3 rounded-xl border border-zinc-700 bg-zinc-800 hover:bg-zinc-700 text-zinc-300 text-xs font-bold transition flex items-center justify-center gap-1 cursor-pointer">
                                <i class="bi bi-zoom-in"></i> Zoom
                            </button>
                            <button type="button" onclick="selectCatalogStyle('Low Skin Taper Fade', 'Fade & Taper', '{{ asset('images/style-fade.jpg') }}', 'Rp 50.000', '40 Menit', 'Gradasi kulit samping presisi tinggi yang halus. Paling digemari untuk gaya harian kerja dan kuliah.', 'Rusdi', 'Undercut & Taper Fade Precision')" class="py-2 px-3 rounded-xl bg-barber-red hover:bg-barber-darkred text-white text-xs font-bold transition flex items-center justify-center gap-1 shadow cursor-pointer">
                                <i class="bi bi-check2"></i> Pilih Gaya
                            </button>
                        </div>
                    </div>
                </div>

                <!-- 3. Beard Sculpting & Razor Fade -->
                <div class="catalog-item catalog-card group flex flex-col bg-zinc-900 rounded-2xl border border-zinc-800 overflow-hidden shadow-lg hover:border-barber-red/50 reveal delay-200" data-category="beard">
                    <div class="relative h-64 overflow-hidden bg-black cursor-pointer" onclick="openCatalogLightbox('{{ asset('images/style-beard.jpg') }}', 'Beard Trim & Hot Shave', 'BEARD & SHAVE', 'Kombinasi potongan samping bersih dengan pembentukan garis brewok dan kumis simetris menggunakan handuk hangat & pisau steril.')">
                        <img src="{{ asset('images/style-beard.jpg') }}" alt="Beard Trim & Side Fade" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-black/20"></div>
                        <span class="absolute top-3 left-3 px-2.5 py-1 rounded-md text-[10px] font-extrabold uppercase tracking-wider bg-amber-500 text-zinc-950 font-black shadow">
                            👑 Gentleman
                        </span>
                        <div class="absolute bottom-3 right-3 text-xs text-white/90 bg-black/60 backdrop-blur-xs px-2.5 py-1 rounded-md font-mono">
                            30 Mnt &bull; Rp 45K
                        </div>
                    </div>
                    <div class="p-5 flex-1 flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between gap-2 mb-1">
                                <h3 class="font-extrabold text-base text-white">Beard Sculpt & Shave</h3>
                                <span class="text-[10px] uppercase font-bold text-zinc-400 bg-zinc-800 px-2 py-0.5 rounded">Beard</span>
                            </div>
                            <p class="text-xs text-zinc-400 leading-relaxed mb-4">
                                Merapikan garis kumis dan brewok simetris dengan hot towel spa dan krim cukur eksklusif.
                            </p>
                            <div class="text-[11px] text-zinc-400 mb-4 flex items-center gap-1.5">
                                <i class="bi bi-person-badge text-barber-red"></i> Rekomendasi: <span class="text-zinc-200 font-semibold">Agung (Beard Specialist)</span>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-2 pt-2 border-t border-zinc-800">
                            <button type="button" onclick="openCatalogLightbox('{{ asset('images/style-beard.jpg') }}', 'Beard Trim & Hot Shave', 'BEARD & SHAVE', 'Kombinasi potongan samping bersih dengan pembentukan garis brewok dan kumis simetris menggunakan handuk hangat & pisau steril.')" class="py-2 px-3 rounded-xl border border-zinc-700 bg-zinc-800 hover:bg-zinc-700 text-zinc-300 text-xs font-bold transition flex items-center justify-center gap-1 cursor-pointer">
                                <i class="bi bi-zoom-in"></i> Zoom
                            </button>
                            <button type="button" onclick="selectCatalogStyle('Beard Sculpt & Hot Shave', 'Beard & Shave', '{{ asset('images/style-beard.jpg') }}', 'Rp 45.000', '30 Menit', 'Merapikan garis kumis dan brewok simetris dengan hot towel spa dan krim cukur eksklusif.', 'Agung', 'Beard Trim & Hot Towel Shave')" class="py-2 px-3 rounded-xl bg-barber-red hover:bg-barber-darkred text-white text-xs font-bold transition flex items-center justify-center gap-1 shadow cursor-pointer">
                                <i class="bi bi-check2"></i> Pilih Gaya
                            </button>
                        </div>
                    </div>
                </div>

                <!-- 4. Classic Pompadour Slick -->
                <div class="catalog-item catalog-card group flex flex-col bg-zinc-900 rounded-2xl border border-zinc-800 overflow-hidden shadow-lg hover:border-barber-red/50 reveal" data-category="classic">
                    <div class="relative h-64 overflow-hidden bg-black cursor-pointer" onclick="openCatalogLightbox('{{ asset('images/service-haircut.jpg') }}', 'Classic Gentleman Pompadour', 'CLASSIC', 'Volume rambut atas disisir ke belakang dengan kilau pomade klasik. Gaya abadi yang selalu memberikan impresi berkelas.')">
                        <img src="{{ asset('images/service-haircut.jpg') }}" alt="Classic Pompadour" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-black/20"></div>
                        <span class="absolute top-3 left-3 px-2.5 py-1 rounded-md text-[10px] font-extrabold uppercase tracking-wider bg-zinc-800 text-zinc-200 border border-zinc-700 shadow">
                            💼 Formal
                        </span>
                        <div class="absolute bottom-3 right-3 text-xs text-white/90 bg-black/60 backdrop-blur-xs px-2.5 py-1 rounded-md font-mono">
                            45 Mnt &bull; Rp 65K
                        </div>
                    </div>
                    <div class="p-5 flex-1 flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between gap-2 mb-1">
                                <h3 class="font-extrabold text-base text-white">Classic Pompadour</h3>
                                <span class="text-[10px] uppercase font-bold text-zinc-400 bg-zinc-800 px-2 py-0.5 rounded">Classic</span>
                            </div>
                            <p class="text-xs text-zinc-400 leading-relaxed mb-4">
                                Gaya rambut klimis bervolume disisir ke belakang. Elegan, rapi, dan mencerminkan wibawa sejati.
                            </p>
                            <div class="text-[11px] text-zinc-400 mb-4 flex items-center gap-1.5">
                                <i class="bi bi-person-badge text-barber-red"></i> Rekomendasi: <span class="text-zinc-200 font-semibold">Budi (Classic Style)</span>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-2 pt-2 border-t border-zinc-800">
                            <button type="button" onclick="openCatalogLightbox('{{ asset('images/service-haircut.jpg') }}', 'Classic Gentleman Pompadour', 'CLASSIC', 'Volume rambut atas disisir ke belakang dengan kilau pomade klasik. Gaya abadi yang selalu memberikan impresi berkelas.')" class="py-2 px-3 rounded-xl border border-zinc-700 bg-zinc-800 hover:bg-zinc-700 text-zinc-300 text-xs font-bold transition flex items-center justify-center gap-1 cursor-pointer">
                                <i class="bi bi-zoom-in"></i> Zoom
                            </button>
                            <button type="button" onclick="selectCatalogStyle('Classic Pompadour', 'Classic Style', '{{ asset('images/service-haircut.jpg') }}', 'Rp 65.000', '45 Menit', 'Gaya rambut klimis bervolume disisir ke belakang. Elegan, rapi, dan mencerminkan wibawa sejati.', 'Budi', 'Gentleman Haircut & Styling')" class="py-2 px-3 rounded-xl bg-barber-red hover:bg-barber-darkred text-white text-xs font-bold transition flex items-center justify-center gap-1 shadow cursor-pointer">
                                <i class="bi bi-check2"></i> Pilih Gaya
                            </button>
                        </div>
                    </div>
                </div>

                <!-- 5. Modern Side-Part Quiff -->
                <div class="catalog-item catalog-card group flex flex-col bg-zinc-900 rounded-2xl border border-zinc-800 overflow-hidden shadow-lg hover:border-barber-red/50 reveal delay-100" data-category="classic">
                    <div class="relative h-64 overflow-hidden bg-black cursor-pointer" onclick="openCatalogLightbox('{{ asset('images/service-styling.jpg') }}', 'Modern Side-Part Quiff', 'CLASSIC & MODERN', 'Belahan samping natural dengan jambul bertekstur. Fleksibel untuk acara santai maupun pertemuan profesional.')">
                        <img src="{{ asset('images/service-styling.jpg') }}" alt="Modern Side-Part Quiff" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-black/20"></div>
                        <span class="absolute top-3 left-3 px-2.5 py-1 rounded-md text-[10px] font-extrabold uppercase tracking-wider bg-zinc-800 text-zinc-200 border border-zinc-700 shadow">
                            ✨ Casual Quiff
                        </span>
                        <div class="absolute bottom-3 right-3 text-xs text-white/90 bg-black/60 backdrop-blur-xs px-2.5 py-1 rounded-md font-mono">
                            40 Mnt &bull; Rp 50K
                        </div>
                    </div>
                    <div class="p-5 flex-1 flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between gap-2 mb-1">
                                <h3 class="font-extrabold text-base text-white">Side-Part Quiff</h3>
                                <span class="text-[10px] uppercase font-bold text-zinc-400 bg-zinc-800 px-2 py-0.5 rounded">Classic</span>
                            </div>
                            <p class="text-xs text-zinc-400 leading-relaxed mb-4">
                                Belahan samping rapi dengan quiff bertekstur. Mudah ditata ulang memakai jari dan clay matte.
                            </p>
                            <div class="text-[11px] text-zinc-400 mb-4 flex items-center gap-1.5">
                                <i class="bi bi-person-badge text-barber-red"></i> Rekomendasi: <span class="text-zinc-200 font-semibold">Rusdi (Master Barber)</span>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-2 pt-2 border-t border-zinc-800">
                            <button type="button" onclick="openCatalogLightbox('{{ asset('images/service-styling.jpg') }}', 'Modern Side-Part Quiff', 'CLASSIC & MODERN', 'Belahan samping natural dengan jambul bertekstur. Fleksibel untuk acara santai maupun pertemuan profesional.')" class="py-2 px-3 rounded-xl border border-zinc-700 bg-zinc-800 hover:bg-zinc-700 text-zinc-300 text-xs font-bold transition flex items-center justify-center gap-1 cursor-pointer">
                                <i class="bi bi-zoom-in"></i> Zoom
                            </button>
                            <button type="button" onclick="selectCatalogStyle('Modern Side-Part Quiff', 'Classic Style', '{{ asset('images/service-styling.jpg') }}', 'Rp 50.000', '40 Menit', 'Belahan samping rapi dengan quiff bertekstur. Mudah ditata ulang memakai jari dan clay matte.', 'Rusdi', 'Gentleman Haircut & Styling')" class="py-2 px-3 rounded-xl bg-barber-red hover:bg-barber-darkred text-white text-xs font-bold transition flex items-center justify-center gap-1 shadow cursor-pointer">
                                <i class="bi bi-check2"></i> Pilih Gaya
                            </button>
                        </div>
                    </div>
                </div>

                <!-- 6. Bleaching & Silver Ash -->
                <div class="catalog-item catalog-card group flex flex-col bg-zinc-900 rounded-2xl border border-zinc-800 overflow-hidden shadow-lg hover:border-barber-red/50 reveal delay-200" data-category="coloring">
                    <div class="relative h-64 overflow-hidden bg-black cursor-pointer" onclick="openCatalogLightbox('{{ asset('images/service-care.jpg') }}', 'Silver Ash Grey Trend', 'COLORING', 'Pewarnaan silver ash profesional dengan teknik bleaching bertahap yang melindungi kesehatan kutikula dan kulit kepala.')">
                        <img src="{{ asset('images/service-care.jpg') }}" alt="Silver Ash Grey" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-black/20"></div>
                        <span class="absolute top-3 left-3 px-2.5 py-1 rounded-md text-[10px] font-extrabold uppercase tracking-wider bg-purple-600 text-white shadow">
                            🎨 Trend 2026
                        </span>
                        <div class="absolute bottom-3 right-3 text-xs text-white/90 bg-black/60 backdrop-blur-xs px-2.5 py-1 rounded-md font-mono">
                            120 Mnt &bull; Rp 160K
                        </div>
                    </div>
                    <div class="p-5 flex-1 flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between gap-2 mb-1">
                                <h3 class="font-extrabold text-base text-white">Silver Ash Grey</h3>
                                <span class="text-[10px] uppercase font-bold text-zinc-400 bg-zinc-800 px-2 py-0.5 rounded">Coloring</span>
                            </div>
                            <p class="text-xs text-zinc-400 leading-relaxed mb-4">
                                Pewarnaan abu-abu perak berkilau dengan toner anti-kuning dan serum pelindung batang rambut.
                            </p>
                            <div class="text-[11px] text-zinc-400 mb-4 flex items-center gap-1.5">
                                <i class="bi bi-person-badge text-barber-red"></i> Rekomendasi: <span class="text-zinc-200 font-semibold">Farhan (Stylist)</span>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-2 pt-2 border-t border-zinc-800">
                            <button type="button" onclick="openCatalogLightbox('{{ asset('images/service-care.jpg') }}', 'Silver Ash Grey Trend', 'COLORING', 'Pewarnaan silver ash profesional dengan teknik bleaching bertahap yang melindungi kesehatan kutikula dan kulit kepala.')" class="py-2 px-3 rounded-xl border border-zinc-700 bg-zinc-800 hover:bg-zinc-700 text-zinc-300 text-xs font-bold transition flex items-center justify-center gap-1 cursor-pointer">
                                <i class="bi bi-zoom-in"></i> Zoom
                            </button>
                            <button type="button" onclick="selectCatalogStyle('Silver Ash Grey', 'Coloring', '{{ asset('images/service-care.jpg') }}', 'Rp 160.000', '120 Menit', 'Pewarnaan abu-abu perak berkilau dengan toner anti-kuning dan serum pelindung batang rambut.', 'Farhan', 'Bleaching Level 8 + Ash Grey')" class="py-2 px-3 rounded-xl bg-barber-red hover:bg-barber-darkred text-white text-xs font-bold transition flex items-center justify-center gap-1 shadow cursor-pointer">
                                <i class="bi bi-check2"></i> Pilih Gaya
                            </button>
                        </div>
                    </div>
                </div>

                <!-- 7. Buzz Cut Military Line Up -->
                <div class="catalog-item catalog-card group flex flex-col bg-zinc-900 rounded-2xl border border-zinc-800 overflow-hidden shadow-lg hover:border-barber-red/50 reveal" data-category="fade">
                    <div class="relative h-64 overflow-hidden bg-black cursor-pointer" onclick="openCatalogLightbox('{{ asset('images/hero-barber.jpg') }}', 'Buzz Cut & Sharp Line Up', 'FADE & TAPER', 'Potongan pendek militer nomor 1-3 dengan razor line tegas di dahi dan cambang. Praktis, dingin, dan tidak butuh styling.')">
                        <img src="{{ asset('images/hero-barber.jpg') }}" alt="Buzz Cut Line Up" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-black/20"></div>
                        <span class="absolute top-3 left-3 px-2.5 py-1 rounded-md text-[10px] font-extrabold uppercase tracking-wider bg-zinc-800 text-zinc-200 border border-zinc-700 shadow">
                            👌 Zero Styling
                        </span>
                        <div class="absolute bottom-3 right-3 text-xs text-white/90 bg-black/60 backdrop-blur-xs px-2.5 py-1 rounded-md font-mono">
                            20 Mnt &bull; Rp 30K
                        </div>
                    </div>
                    <div class="p-5 flex-1 flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between gap-2 mb-1">
                                <h3 class="font-extrabold text-base text-white">Buzz Cut Line Up</h3>
                                <span class="text-[10px] uppercase font-bold text-zinc-400 bg-zinc-800 px-2 py-0.5 rounded">Fade</span>
                            </div>
                            <p class="text-xs text-zinc-400 leading-relaxed mb-4">
                                Potongan cepak ringkas bernomor dengan garis tepi dahi presisi. Ringan, dingin, dan sporty.
                            </p>
                            <div class="text-[11px] text-zinc-400 mb-4 flex items-center gap-1.5">
                                <i class="bi bi-person-badge text-barber-red"></i> Rekomendasi: <span class="text-zinc-200 font-semibold">Agung (Beard & Shave)</span>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-2 pt-2 border-t border-zinc-800">
                            <button type="button" onclick="openCatalogLightbox('{{ asset('images/hero-barber.jpg') }}', 'Buzz Cut & Sharp Line Up', 'FADE & TAPER', 'Potongan pendek militer nomor 1-3 dengan razor line tegas di dahi dan cambang. Praktis, dingin, dan tidak butuh styling.')" class="py-2 px-3 rounded-xl border border-zinc-700 bg-zinc-800 hover:bg-zinc-700 text-zinc-300 text-xs font-bold transition flex items-center justify-center gap-1 cursor-pointer">
                                <i class="bi bi-zoom-in"></i> Zoom
                            </button>
                            <button type="button" onclick="selectCatalogStyle('Buzz Cut & Line Up', 'Fade & Taper', '{{ asset('images/hero-barber.jpg') }}', 'Rp 30.000', '20 Menit', 'Potongan cepak ringkas bernomor dengan garis tepi dahi presisi. Ringan, dingin, dan sporty.', 'Agung', 'Buzz Cut & Clean Line Up')" class="py-2 px-3 rounded-xl bg-barber-red hover:bg-barber-darkred text-white text-xs font-bold transition flex items-center justify-center gap-1 shadow cursor-pointer">
                                <i class="bi bi-check2"></i> Pilih Gaya
                            </button>
                        </div>
                    </div>
                </div>

                <!-- 8. Scalp Spa & Hair Care -->
                <div class="catalog-item catalog-card group flex flex-col bg-zinc-900 rounded-2xl border border-zinc-800 overflow-hidden shadow-lg hover:border-barber-red/50 reveal delay-100" data-category="coloring">
                    <div class="relative h-64 overflow-hidden bg-black cursor-pointer" onclick="openCatalogLightbox('{{ asset('images/hair-wash.jpg') }}', 'Royal Scalp Spa & Tonic', 'TREATMENT', 'Pencucian rambut air hangat ganda, masker nutrisi rambut, hair tonic menyegarkan, serta pijat bahu dan kepala pelepas penat.')">
                        <img src="{{ asset('images/hair-wash.jpg') }}" alt="Hair Wash & Spa" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-black/20"></div>
                        <span class="absolute top-3 left-3 px-2.5 py-1 rounded-md text-[10px] font-extrabold uppercase tracking-wider bg-emerald-600 text-white shadow">
                            🌿 Relaksasi
                        </span>
                        <div class="absolute bottom-3 right-3 text-xs text-white/90 bg-black/60 backdrop-blur-xs px-2.5 py-1 rounded-md font-mono">
                            45 Mnt &bull; Rp 75K
                        </div>
                    </div>
                    <div class="p-5 flex-1 flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between gap-2 mb-1">
                                <h3 class="font-extrabold text-base text-white">Scalp Spa & Creambath</h3>
                                <span class="text-[10px] uppercase font-bold text-zinc-400 bg-zinc-800 px-2 py-0.5 rounded">Treatment</span>
                            </div>
                            <p class="text-xs text-zinc-400 leading-relaxed mb-4">
                                Cuci bersih air hangat, creambath ginseng penumbuh akar, dan pijat relaksasi pundak leher.
                            </p>
                            <div class="text-[11px] text-zinc-400 mb-4 flex items-center gap-1.5">
                                <i class="bi bi-person-badge text-barber-red"></i> Rekomendasi: <span class="text-zinc-200 font-semibold">Semua Kapster</span>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-2 pt-2 border-t border-zinc-800">
                            <button type="button" onclick="openCatalogLightbox('{{ asset('images/hair-wash.jpg') }}', 'Royal Scalp Spa & Tonic', 'TREATMENT', 'Pencucian rambut air hangat ganda, masker nutrisi rambut, hair tonic menyegarkan, serta pijat bahu dan kepala pelepas penat.')" class="py-2 px-3 rounded-xl border border-zinc-700 bg-zinc-800 hover:bg-zinc-700 text-zinc-300 text-xs font-bold transition flex items-center justify-center gap-1 cursor-pointer">
                                <i class="bi bi-zoom-in"></i> Zoom
                            </button>
                            <button type="button" onclick="selectCatalogStyle('Scalp Spa & Creambath', 'Treatment', '{{ asset('images/hair-wash.jpg') }}', 'Rp 75.000', '45 Menit', 'Cuci bersih air hangat, creambath ginseng penumbuh akar, dan pijat relaksasi pundak leher.', 'Rusdi', 'Hair Creambath Ginseng Relaksasi')" class="py-2 px-3 rounded-xl bg-barber-red hover:bg-barber-darkred text-white text-xs font-bold transition flex items-center justify-center gap-1 shadow cursor-pointer">
                                <i class="bi bi-check2"></i> Pilih Gaya
                            </button>
                        </div>
                    </div>
                </div>

            </div>

            <!-- ======================================================== -->
            <!-- FORMULIR PEMILIHAN & RESERVASI DARI KATALOG FOTO         -->
            <!-- ======================================================== -->
            <div id="form-katalog" class="scroll-mt-24 bg-gradient-to-br from-zinc-900 via-zinc-900 to-black rounded-3xl border border-zinc-800 p-6 sm:p-10 shadow-2xl relative transition-all duration-300 reveal">
                
                <div class="flex flex-col lg:flex-row items-start gap-8 lg:gap-12">
                    
                    {{-- KOLOM KIRI: PREVIEW MODEL TERPILIH --}}
                    <div class="w-full lg:w-5/12 bg-black/50 border border-zinc-800 rounded-2xl p-5 flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between mb-3">
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-extrabold uppercase bg-barber-red/20 text-barber-red border border-barber-red/30">
                                    <i class="bi bi-check2-circle"></i> Model Rambut Terpilih
                                </span>
                                <span id="selectedStyleTag" class="text-[10px] font-mono uppercase bg-zinc-800 text-zinc-400 px-2 py-0.5 rounded">
                                    FRENCH CROP
                                </span>
                            </div>

                            {{-- Selected Image Thumbnail --}}
                            <div class="relative h-64 sm:h-72 w-full rounded-xl overflow-hidden mb-4 border border-zinc-800 bg-zinc-950">
                                <img id="selectedStyleImg" src="{{ asset('images/style-crop.jpg') }}" alt="Model Terpilih" class="w-full h-full object-cover object-top transition-transform duration-300">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent pointer-events-none"></div>
                                <div class="absolute bottom-3 left-3 right-3 flex items-center justify-between text-xs text-white">
                                    <span id="selectedStyleMeta" class="bg-black/70 backdrop-blur-xs px-3 py-1.5 rounded-lg border border-white/10 font-mono">
                                        <i class="bi bi-clock-fill text-amber-400"></i> 40 Menit &bull; <span class="text-emerald-400 font-bold">Rp 55.000</span>
                                    </span>
                                </div>
                            </div>

                            <h4 id="selectedStyleName" class="text-xl font-black text-white uppercase tracking-tight mb-2">
                                Textured French Crop
                            </h4>
                            <p id="selectedStyleDesc" class="text-xs text-zinc-400 leading-relaxed mb-4">
                                Poni tumpul horizontal dengan tekstur acak di bagian atas. Kesan fresh dan low-maintenance.
                            </p>
                        </div>

                        {{-- Upload Custom Reference Photo Box --}}
                        <div class="mt-4 pt-4 border-t border-zinc-800/80">
                            <label class="block text-xs font-bold text-zinc-300 uppercase tracking-wider mb-2 flex items-center justify-between">
                                <span><i class="bi bi-cloud-arrow-up text-amber-400"></i> Atau Unggah Foto Referensi Sendiri</span>
                                <span class="text-[10px] text-zinc-500 font-normal lowercase">(opsional)</span>
                            </label>
                            
                            <div class="relative flex items-center">
                                <input type="file" id="foto_referensi" name="foto_referensi" form="catalogBookingForm" accept="image/*" onchange="previewCustomReferencePhoto(this)" class="w-full text-xs text-zinc-400 file:mr-3 file:py-2 file:px-3.5 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-zinc-800 file:text-zinc-200 hover:file:bg-zinc-700 file:cursor-pointer border border-zinc-800 rounded-xl p-1 bg-zinc-950">
                            </div>

                            {{-- Instant Image Preview Box --}}
                            <div id="customRefPreviewBox" class="mt-3 hidden relative rounded-xl overflow-hidden border border-amber-500/40 bg-zinc-950 p-2 flex items-center gap-3">
                                <img id="customRefImg" src="" alt="Foto Referensi Pengguna" class="w-16 h-16 object-cover rounded-lg">
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

                    {{-- KOLOM KANAN: FORMULIR INPUT --}}
                    <div class="w-full lg:w-7/12">
                        <div class="mb-6">
                            <h3 class="text-2xl font-black text-white tracking-tight uppercase">
                                Formulir Reservasi Model
                            </h3>
                            <p class="text-xs sm:text-sm text-zinc-400 mt-1">
                                Isi data singkat Anda. Reservasi dapat disimpan ke sistem web atau langsung dikirimkan via WhatsApp.
                            </p>
                        </div>

                        <form id="catalogBookingForm" action="{{ route('booking.catalog') }}" method="POST" enctype="multipart/form-data" class="space-y-4 text-left">
                            @csrf
                            
                            {{-- Hidden Model Rambut Value --}}
                            <input type="hidden" name="model_rambut" id="formModelRambut" value="Textured French Crop">

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                {{-- Nama --}}
                                <div>
                                    <label class="block text-xs font-bold text-zinc-300 uppercase tracking-wider mb-1.5">
                                        Nama Lengkap <span class="text-barber-red">*</span>
                                    </label>
                                    <input type="text" name="nama_pelanggan" id="formCustName" required placeholder="Contoh: Dimas Pratama" class="w-full text-xs sm:text-sm px-4 py-3 bg-zinc-950 border border-zinc-800 rounded-xl text-white focus:border-barber-red focus:ring-1 focus:ring-barber-red outline-none transition">
                                </div>

                                {{-- WhatsApp --}}
                                <div>
                                    <label class="block text-xs font-bold text-zinc-300 uppercase tracking-wider mb-1.5">
                                        Nomor WhatsApp <span class="text-barber-red">*</span>
                                    </label>
                                    <input type="tel" name="no_whatsapp" id="formCustPhone" required placeholder="Contoh: 081234567890" class="w-full text-xs sm:text-sm px-4 py-3 bg-zinc-950 border border-zinc-800 rounded-xl text-white focus:border-barber-red focus:ring-1 focus:ring-barber-red outline-none transition">
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
                                <textarea name="catatan" id="formCatatan" rows="2" placeholder="Contoh: Minta bagian samping dipotong agak tipis, jambul disisir ke kanan." class="w-full text-xs sm:text-sm px-4 py-2.5 bg-zinc-950 border border-zinc-800 rounded-xl text-white focus:border-barber-red focus:ring-1 focus:ring-barber-red outline-none transition resize-none"></textarea>
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

                </div>
            </div>

        </div>

        {{-- LIGHTBOX MODAL FULLSCREEN UNTUK ZOOM FOTO KATALOG --}}
        <div id="catalogLightboxModal" class="fixed inset-0 z-50 items-center justify-center bg-black/85 backdrop-blur-md hidden p-4 opacity-0 transition-opacity duration-300 flex">
            <div class="bg-zinc-900 border border-zinc-800 w-full max-w-2xl rounded-3xl overflow-hidden shadow-2xl relative text-left">
                <button type="button" onclick="closeCatalogLightbox()" class="absolute top-4 right-4 z-10 w-9 h-9 rounded-full bg-black/70 hover:bg-black text-zinc-300 hover:text-white flex items-center justify-center transition cursor-pointer">
                    <i class="bi bi-x-lg text-sm"></i>
                </button>
                <div class="relative max-h-[70vh] overflow-hidden bg-black flex items-center justify-center">
                    <img id="lightboxImg" src="" alt="Pratinjau Foto" class="max-w-full max-h-[70vh] object-contain">
                </div>
                <div class="p-6 bg-zinc-900 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 border-t border-zinc-800">
                    <div>
                        <span id="lightboxTag" class="text-[10px] uppercase font-bold text-barber-red bg-barber-red/10 border border-barber-red/30 px-2.5 py-0.5 rounded-full inline-block mb-1">
                            KATALOG GAYA
                        </span>
                        <h4 id="lightboxTitle" class="text-xl font-black text-white">Judul Gaya</h4>
                        <p id="lightboxDesc" class="text-xs text-zinc-400 mt-1 max-w-md">Deskripsi potongan rambut.</p>
                    </div>
                    <button type="button" onclick="closeCatalogLightbox(); document.getElementById('form-katalog').scrollIntoView({behavior:'smooth'});" class="px-5 py-2.5 bg-barber-red hover:bg-barber-darkred text-white text-xs font-bold uppercase tracking-wider rounded-xl shadow transition shrink-0 cursor-pointer">
                        Pilih Gaya Ini &darr;
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. MORE SERVICES SECTION -->
    <section class="py-24 bg-gray-900 text-white relative overflow-hidden">
        <!-- Abstract Background Shape -->
        <div class="absolute top-0 right-0 w-96 h-96 bg-barber-red/10 rounded-full blur-3xl -translate-y-1/2 translate-x-1/3"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-barber-red/10 rounded-full blur-3xl translate-y-1/2 -translate-x-1/3"></div>
        
        <div class="max-w-6xl mx-auto px-6 relative z-10">
            <!-- Header -->
            <div class="text-center mb-16 reveal">
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-extrabold tracking-tight mb-4">
                    The Complete Experience
                </h2>
                <p class="text-base text-gray-400 max-w-2xl mx-auto">
                    Layanan ekstra kami hadirkan untuk memastikan Anda pulang dengan tampilan yang segar dan rasa percaya diri yang tinggi.
                </p>
            </div>

            <!-- 3 Features -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <div class="flex flex-col items-center text-center reveal">
                    <div class="w-20 h-20 rounded-2xl bg-linear-to-br from-barber-red to-barber-darkred text-white flex items-center justify-center shadow-lg shadow-red-900/50 mb-6 transform rotate-3 hover:rotate-0 transition-transform duration-300">
                        <i class="bi bi-scissors text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Fast & Precise Cut</h3>
                    <p class="text-sm text-gray-400 leading-relaxed">
                        Potong rambut efisien tanpa antre lama dengan hasil yang presisi dan rapi, dilakukan oleh profesional.
                    </p>
                </div>

                <div class="flex flex-col items-center text-center reveal delay-100">
                    <div class="w-20 h-20 rounded-2xl bg-linear-to-br from-barber-red to-barber-darkred text-white flex items-center justify-center shadow-lg shadow-red-900/50 mb-6 transform -rotate-3 hover:rotate-0 transition-transform duration-300">
                        <i class="bi bi-droplet-fill text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Tonic & Hair Wash</h3>
                    <p class="text-sm text-gray-400 leading-relaxed">
                        Keramas bersih dengan air hangat, dilanjutkan pijatan tonic untuk menyegarkan akar rambut Anda.
                    </p>
                </div>

                <div class="flex flex-col items-center text-center reveal delay-200">
                    <div class="w-20 h-20 rounded-2xl bg-linear-to-br from-barber-red to-barber-darkred text-white flex items-center justify-center shadow-lg shadow-red-900/50 mb-6 transform rotate-3 hover:rotate-0 transition-transform duration-300">
                        <i class="bi bi-brush-fill text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Classic Shave</h3>
                    <p class="text-sm text-gray-400 leading-relaxed">
                        Cukur kumis dan jenggot tradisional menggunakan silet tajam dan handuk hangat yang menenangkan.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. TESTIMONIALS -->
    <section class="py-24 bg-gray-50 border-t border-gray-100">
        <div class="max-w-6xl mx-auto px-6">
            <!-- Header -->
            <div class="text-center mb-16 reveal">
                <span class="text-xs font-bold text-barber-red uppercase tracking-widest block mb-2">Testimoni</span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 tracking-tight">
                    Apa Kata Pelanggan Kami
                </h2>
            </div>

            <!-- Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Review 1 -->
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 flex flex-col justify-between hover:shadow-md transition-shadow reveal">
                    <div class="mb-6">
                        <div class="flex text-amber-400 text-sm mb-4 gap-1">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                        <p class="text-sm text-gray-600 leading-relaxed italic">
                            "Potongan rambutnya sangat rapi dan presisi. Barbernya ramah dan mau diajak diskusi model yang cocok. Tempatnya bersih!"
                        </p>
                    </div>
                    <div class="flex items-center gap-4 border-t border-gray-100 pt-4">
                        <div class="w-12 h-12 rounded-full bg-gray-200 overflow-hidden">
                            <img src="{{ asset('images/avatar-1.jpg') }}" alt="Rahmat" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-gray-900">Rahmat S.</h4>
                            <span class="text-xs text-gray-500">Pelanggan Tetap</span>
                        </div>
                    </div>
                </div>

                <!-- Review 2 -->
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 flex flex-col justify-between hover:shadow-md transition-shadow reveal delay-100">
                    <div class="mb-6">
                        <div class="flex text-amber-400 text-sm mb-4 gap-1">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                        <p class="text-sm text-gray-600 leading-relaxed italic">
                            "Hair tonic dan pijat kepalanya luar biasa segar. Barbershop nomor satu di daerah ini. Wajib coba Royal Package."
                        </p>
                    </div>
                    <div class="flex items-center gap-4 border-t border-gray-100 pt-4">
                        <div class="w-12 h-12 rounded-full bg-gray-200 overflow-hidden">
                            <img src="{{ asset('images/avatar-2.jpg') }}" alt="Kurniawan" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-gray-900">Kurniawan</h4>
                            <span class="text-xs text-gray-500">Local Guide</span>
                        </div>
                    </div>
                </div>

                <!-- Review 3 -->
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 flex flex-col justify-between hover:shadow-md transition-shadow reveal delay-200">
                    <div class="mb-6">
                        <div class="flex text-amber-400 text-sm mb-4 gap-1">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                        <p class="text-sm text-gray-600 leading-relaxed italic">
                            "Harga bersahabat tapi pelayanan bintang lima. Teknik fade-nya halus sekali. Pasti akan selalu potong di sini."
                        </p>
                    </div>
                    <div class="flex items-center gap-4 border-t border-gray-100 pt-4">
                        <div class="w-12 h-12 rounded-full bg-gray-200 overflow-hidden">
                            <img src="{{ asset('images/avatar-3.jpg') }}" alt="Andiansyah" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-gray-900">Andiansyah</h4>
                            <span class="text-xs text-gray-500">Mahasiswa</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 8. QUALITY HAIRCUT CTA BANNER -->
    <section class="py-20 relative bg-[url('/images/hero-barber.jpg')] bg-cover bg-center bg-fixed">
        <div class="absolute inset-0 bg-gray-900/90 backdrop-blur-sm"></div>
        <div class="relative z-10 max-w-4xl mx-auto px-6 text-center reveal">
            <h2 class="text-3xl md:text-5xl font-extrabold text-white tracking-tight mb-4">
                Siap Tampil Lebih Maksimal?
            </h2>
            <p class="text-base text-gray-300 max-w-xl mx-auto mb-8 leading-relaxed">
                Nikmati potongan rambut berkualitas tinggi dengan harga bersahabat. Pesan jadwal Anda sekarang tanpa harus antre lama.
            </p>
            <button onclick="openBookingModal()" type="button" class="inline-flex items-center justify-center px-10 py-4 bg-barber-red hover:bg-barber-darkred text-white text-sm font-bold tracking-wider uppercase rounded-full shadow-xl shadow-barber-red/30 transition-all duration-300 hover:-translate-y-1 active:translate-y-0 cursor-pointer">
                Book Your Seat Now
            </button>
        </div>
    </section>
@endsection