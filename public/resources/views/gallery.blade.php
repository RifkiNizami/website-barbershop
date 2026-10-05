<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Katalog & Portofolio Gaya Rambut — Black Crown Barbershop</title>
    <meta name="description" content="Eksplorasi katalog foto dan portofolio gaya rambut pria premium di Black Crown Barbershop. Temukan inspirasi potongan rambut mulai dari skin fade, french crop, hingga classic gentleman.">

    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml"
        href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%23e53935'><path d='M9.64 7.64c.23-.5.36-1.05.36-1.64 0-2.21-1.79-4-4-4S2 3.79 2 6s1.79 4 4 4c.59 0 1.14-.13 1.64-.36L10 12l-2.36 2.36C7.14 14.13 6.59 14 6 14c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4c0-.59-.13-1.14-.36-1.64L12 14l7 7h3v-1L9.64 7.64zM6 8c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm0 12c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm6-7.5c-.28 0-.5-.22-.5-.5s.22-.5.5-.5.5.22.5.5-.22.5-.5.5zM19 3l-6 6 2 2 7-7V3h-3z'/></svg>">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Tailwind Play CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'barber-red': '#e63946',
                        'barber-dark': '#09090b',
                        'barber-card': '#121215',
                        'barber-border': '#27272a',
                    }
                }
            }
        }
    </script>

    <!-- Native CSS & JS Assets -->
    <link rel="stylesheet" href="{{ url('resources/css/app.css') }}">
    <script src="{{ url('resources/js/app.js') }}" defer></script>
</head>

<body class="bg-zinc-950 text-white font-sans antialiased selection:bg-barber-red selection:text-white min-h-screen flex flex-col">

    <!-- ======================================================== -->
    <!-- 1. HEADER & STANDARD NAVIGATION (DARK MONOCHROME THEME)  -->
    <!-- ======================================================== -->
    <header id="gallery-header" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 py-4 bg-zinc-950/85 backdrop-blur-xl border-b border-zinc-800/80">
        <div class="max-w-7xl mx-auto px-6 flex items-center justify-between gap-6">
            
            <!-- Brand Logo -->
            <a href="{{ url('/') }}" class="flex items-center gap-3 text-white font-extrabold tracking-widest text-lg uppercase group shrink-0">
                <span class="w-9 h-9 bg-barber-red rounded-xl text-white flex items-center justify-center shadow-lg shadow-red-900/40 group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
                    <i class="bi bi-scissors text-lg"></i>
                </span>
                <div class="flex flex-col text-left">
                    <span class="font-black tracking-wider text-base leading-none group-hover:text-zinc-200 transition-colors">BLACK CROWN</span>
                    <span class="text-[9px] font-semibold text-zinc-400 tracking-[0.25em] leading-tight">BARBERSHOP</span>
                </div>
            </a>

            <!-- Standard Desktop Navigation Menu (No Sliding Pill, Pure Elegant Hover) -->
            <nav class="hidden md:flex items-center gap-8 text-sm font-medium tracking-wide">
                <a href="{{ url('/#home') }}" class="text-zinc-400 hover:text-white transition-colors duration-200">
                    Home
                </a>
                <a href="{{ url('/#about') }}" class="text-zinc-400 hover:text-white transition-colors duration-200">
                    About
                </a>
                <a href="{{ url('/gallery') }}" class="text-white font-semibold relative py-1 after:content-[''] after:absolute after:-bottom-1 after:left-0 after:w-full after:h-0.5 after:bg-white after:rounded-full">
                    Katalog Foto
                </a>
                <a href="{{ url('/#pricing') }}" class="text-zinc-400 hover:text-white transition-colors duration-200">
                    Pricing
                </a>
                <a href="{{ url('/#testimoni') }}" class="text-zinc-400 hover:text-white transition-colors duration-200">
                    Testimoni
                </a>
                <a href="{{ route('login') }}" class="text-zinc-400 hover:text-white transition-colors duration-200">
                    Login
                </a>
            </nav>

            <!-- Right Action CTA Buttons -->
            <div class="hidden md:flex items-center gap-3 shrink-0">
                <a href="{{ route('login') }}" class="px-3.5 py-2 rounded-full text-xs font-semibold text-zinc-300 hover:text-white hover:bg-white/5 transition-all duration-200 flex items-center gap-1.5 border border-transparent hover:border-zinc-800">
                    <i class="bi bi-person-fill text-xs text-amber-400"></i>
                    <span>Portal Member</span>
                </a>
                <button onclick="openBookingModal()" type="button" class="btn-ripple px-5 py-2 rounded-full text-xs font-bold uppercase tracking-wider bg-white hover:bg-zinc-200 text-zinc-950 transition-all duration-200 shadow-md hover:shadow-lg cursor-pointer flex items-center gap-2 group">
                    <i class="bi bi-calendar-check-fill text-xs text-barber-red group-hover:scale-110 transition-transform"></i>
                    <span>Book Appointment</span>
                </button>
            </div>

            <!-- Mobile Hamburger Toggle Button -->
            <div class="flex md:hidden items-center gap-2">
                <button onclick="openBookingModal()" type="button" class="px-3 py-1.5 rounded-full text-[11px] font-bold uppercase tracking-wider bg-barber-red text-white shadow-md shadow-red-900/40 flex items-center gap-1">
                    <i class="bi bi-scissors text-xs"></i>
                    <span>Book</span>
                </button>
                <button id="galleryMobileBtn" type="button" class="text-white focus:outline-none p-1.5 rounded-xl hover:bg-white/10 text-2xl transition-colors" aria-label="Buka Menu Navigasi">
                    <i id="galleryMobileIcon" class="bi bi-list leading-none"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Drawer -->
        <div id="galleryMobileMenu" class="hidden md:hidden absolute top-full left-0 w-full bg-zinc-950/95 backdrop-blur-2xl border-b border-zinc-800 px-6 py-5 shadow-2xl transition-all duration-300">
            <div class="flex flex-col gap-3">
                <div class="flex flex-col gap-1 text-sm font-medium">
                    <a href="{{ url('/#home') }}" class="py-2.5 px-3 rounded-lg text-zinc-400 hover:text-white hover:bg-zinc-900 transition-colors">
                        Home
                    </a>
                    <a href="{{ url('/#about') }}" class="py-2.5 px-3 rounded-lg text-zinc-400 hover:text-white hover:bg-zinc-900 transition-colors">
                        About
                    </a>
                    <a href="{{ url('/gallery') }}" class="py-2.5 px-3 rounded-lg text-white font-bold bg-zinc-900/80 border border-zinc-800 flex items-center justify-between">
                        <span>Katalog Foto</span>
                        <i class="bi bi-check2 text-barber-red"></i>
                    </a>
                    <a href="{{ url('/#pricing') }}" class="py-2.5 px-3 rounded-lg text-zinc-400 hover:text-white hover:bg-zinc-900 transition-colors">
                        Pricing
                    </a>
                    <a href="{{ url('/#testimoni') }}" class="py-2.5 px-3 rounded-lg text-zinc-400 hover:text-white hover:bg-zinc-900 transition-colors">
                        Testimoni
                    </a>
                    <a href="{{ route('login') }}" class="py-2.5 px-3 rounded-lg text-amber-400 hover:text-amber-300 font-semibold flex items-center gap-2">
                        <i class="bi bi-person-fill"></i> Login Member
                    </a>
                </div>
                <div class="pt-2 border-t border-zinc-800/80">
                    <button onclick="openBookingModal()" type="button" class="w-full py-3 bg-barber-red hover:bg-barber-darkred text-white text-xs font-bold uppercase tracking-wider rounded-xl shadow-lg shadow-red-900/40 transition-colors flex items-center justify-center gap-2">
                        <i class="bi bi-scissors text-sm"></i> Book Appointment
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- ======================================================== -->
    <!-- 2. MAIN GALLERY SECTION & PORTFOLIO CONTENT              -->
    <!-- ======================================================== -->
    <main class="flex-1 pt-32 pb-24 relative overflow-hidden">
        
        <!-- Subtle Ambient Background Glows -->
        <div class="absolute top-20 left-1/2 -translate-x-1/2 w-[700px] h-[350px] bg-red-900/10 rounded-full blur-[120px] pointer-events-none"></div>
        <div class="absolute top-[600px] -left-40 w-96 h-96 bg-zinc-800/20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-40 -right-40 w-96 h-96 bg-red-950/15 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-6 relative z-10">

            <!-- Breadcrumb Navigation -->
            <nav class="flex items-center gap-2 text-xs font-medium text-zinc-500 mb-8" aria-label="Breadcrumb">
                <a href="{{ url('/') }}" class="hover:text-zinc-300 transition-colors">Beranda</a>
                <i class="bi bi-chevron-right text-[10px]"></i>
                <span class="text-zinc-300">Katalog & Galeri Foto</span>
            </nav>

            <!-- Page Header / Hero Title & Description -->
            <div class="text-center max-w-3xl mx-auto mb-14">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-[11px] font-bold tracking-widest uppercase bg-zinc-900 border border-zinc-800 text-zinc-300 shadow-sm mb-4">
                    <i class="bi bi-camera-fill text-barber-red"></i>
                    <span>PORTFOLIO & LOOKBOOK MASTERPIECE</span>
                </div>
                
                <h1 class="text-3xl sm:text-5xl lg:text-6xl font-black tracking-tight text-white mb-6 uppercase">
                    Katalog & Portofolio <br class="hidden sm:block" />
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-white via-zinc-200 to-zinc-500">Gaya Rambut</span>
                </h1>
                
                <p class="text-sm sm:text-base text-zinc-400 font-normal leading-relaxed max-w-2xl mx-auto">
                    Koleksi kurasi gaya rambut pria modern dan klasik yang dirancang presisi oleh master barber kami. Temukan potongan terbaik yang menyempurnakan bentuk wajah dan karakter percaya diri Anda.
                </p>

                <!-- Highlight Stats Bar -->
                <div class="flex items-center justify-center gap-6 sm:gap-10 mt-8 pt-8 border-t border-zinc-800/60 text-center">
                    <div>
                        <span class="block text-xl sm:text-2xl font-black text-white">9+</span>
                        <span class="text-[11px] text-zinc-500 font-medium uppercase tracking-wider">Model Kurasi</span>
                    </div>
                    <div class="w-px h-8 bg-zinc-800"></div>
                    <div>
                        <span class="block text-xl sm:text-2xl font-black text-white">100%</span>
                        <span class="text-[11px] text-zinc-500 font-medium uppercase tracking-wider">Presisi Razor</span>
                    </div>
                    <div class="w-px h-8 bg-zinc-800"></div>
                    <div>
                        <span class="block text-xl sm:text-2xl font-black text-amber-400">4.9 <i class="bi bi-star-fill text-xs text-amber-400"></i></span>
                        <span class="text-[11px] text-zinc-500 font-medium uppercase tracking-wider">Rating Pelanggan</span>
                    </div>
                </div>
            </div>

            <!-- ======================================================== -->
            <!-- 3. CATEGORY FILTER PILLS (INTERACTIVE TABS)             -->
            <!-- ======================================================== -->
            <div class="flex items-center justify-center gap-2.5 sm:gap-3 flex-wrap mb-12 sm:mb-16">
                <button type="button" onclick="filterGallery('all', this)" class="gallery-filter-btn active-filter px-4 sm:px-5 py-2 rounded-full text-xs sm:text-sm font-semibold border transition-all duration-200 cursor-pointer select-none">
                    Semua Gaya
                </button>
                <button type="button" onclick="filterGallery('fade', this)" class="gallery-filter-btn px-4 sm:px-5 py-2 rounded-full text-xs sm:text-sm font-semibold border transition-all duration-200 cursor-pointer select-none">
                    Skin Fade
                </button>
                <button type="button" onclick="filterGallery('crop', this)" class="gallery-filter-btn px-4 sm:px-5 py-2 rounded-full text-xs sm:text-sm font-semibold border transition-all duration-200 cursor-pointer select-none">
                    Textured Crop
                </button>
                <button type="button" onclick="filterGallery('classic', this)" class="gallery-filter-btn px-4 sm:px-5 py-2 rounded-full text-xs sm:text-sm font-semibold border transition-all duration-200 cursor-pointer select-none">
                    Classic Gentlemen
                </button>
                <button type="button" onclick="filterGallery('beard', this)" class="gallery-filter-btn px-4 sm:px-5 py-2 rounded-full text-xs sm:text-sm font-semibold border transition-all duration-200 cursor-pointer select-none">
                    Beard Trim
                </button>
            </div>

            <!-- ======================================================== -->
            <!-- 4. RESPONSIVE PHOTO GRID (3 COLS DESKTOP, 1-2 MOBILE)    -->
            <!-- ======================================================== -->
            <div id="galleryPhotoGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-10">

                <!-- CARD 1: Low Skin Taper Fade -->
                <div class="gallery-card group relative rounded-2xl overflow-hidden bg-zinc-900/90 border border-zinc-800/90 hover:border-zinc-600/80 transition-all duration-500 shadow-xl flex flex-col" data-category="fade">
                    <!-- Photo Container with Zoom Effect -->
                    <div class="relative aspect-[3/4] sm:aspect-[4/5] overflow-hidden bg-zinc-950">
                        <img src="{{ asset('images/style-fade.jpg') }}" alt="Low Skin Taper Fade" class="w-full h-full object-cover object-top group-hover:scale-110 transition-transform duration-700 ease-out">
                        
                        <!-- Dark Transparent Gradient Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent opacity-85 group-hover:opacity-95 transition-opacity duration-500"></div>

                        <!-- Top Badges -->
                        <div class="absolute top-4 left-4 right-4 flex items-center justify-between pointer-events-none z-10">
                            <span class="px-2.5 py-1 rounded-md text-[10px] font-black uppercase tracking-wider bg-zinc-900/80 backdrop-blur-md text-white border border-white/10 shadow">
                                Skin Fade
                            </span>
                            <span class="px-2.5 py-1 rounded-md text-[10px] font-bold uppercase tracking-wider bg-barber-red text-white shadow-md">
                                🔥 Paling Populer
                            </span>
                        </div>

                        <!-- Bottom Content Info (Smoothly revealed on hover & ambient view) -->
                        <div class="absolute bottom-0 left-0 right-0 p-6 flex flex-col justify-end z-10">
                            <span class="text-[11px] font-bold uppercase tracking-widest text-zinc-400 mb-1">
                                Modern Gentlemen
                            </span>
                            <h3 class="text-xl sm:text-2xl font-black text-white tracking-tight mb-2 group-hover:text-zinc-100 transition-colors">
                                Low Skin Taper Fade
                            </h3>
                            <p class="text-xs text-zinc-300 leading-relaxed mb-4 line-clamp-2">
                                Gradasi halus dari kulit licin di pelipis dan tengkuk, berpadu presisi ke rambut atas. Sangat rapi untuk tampilan bisnis maupun kasual.
                            </p>

                            <!-- Pricing & Stylist Meta Bar -->
                            <div class="flex items-center justify-between pt-3 border-t border-white/15 text-xs">
                                <div class="flex items-baseline gap-2">
                                    <span class="text-base font-extrabold text-white">Rp 50.000</span>
                                    <span class="text-[11px] text-zinc-400 font-mono">&bull; 40 Mnt</span>
                                </div>
                                <span class="text-[11px] text-zinc-300 font-medium">
                                    <i class="bi bi-person-badge text-barber-red"></i> Mas Gatot
                                </span>
                            </div>

                            <!-- Interactive Action Buttons (Revealed on Hover) -->
                            <div class="grid grid-cols-2 gap-2 mt-4 pt-3 border-t border-white/10 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 sm:translate-y-2 sm:group-hover:translate-y-0 transition-all duration-300">
                                <button type="button" onclick="openPhotoLightbox('{{ asset('images/style-fade.jpg') }}', 'Low Skin Taper Fade', 'SKIN FADE', 'Rp 50.000', '40 Menit', 'Gradasi halus dari kulit licin di pelipis dan tengkuk, berpadu presisi ke rambut atas.', 'Oval, Persegi & Bulat', 'Matte Paste / Clay', 'Mas Gatot (Senior Barber)')" class="py-2 px-3 rounded-xl border border-white/20 bg-zinc-900/80 hover:bg-white hover:text-zinc-950 text-white text-xs font-bold transition flex items-center justify-center gap-1.5 cursor-pointer">
                                    <i class="bi bi-zoom-in"></i> Detail
                                </button>
                                <button type="button" onclick="quickBookStyle('Low Skin Taper Fade', 'Rp 50.000')" class="py-2 px-3 rounded-xl bg-barber-red hover:bg-barber-darkred text-white text-xs font-bold transition flex items-center justify-center gap-1.5 shadow cursor-pointer">
                                    <i class="bi bi-calendar2-check"></i> Booking
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CARD 2: Textured French Crop -->
                <div class="gallery-card group relative rounded-2xl overflow-hidden bg-zinc-900/90 border border-zinc-800/90 hover:border-zinc-600/80 transition-all duration-500 shadow-xl flex flex-col" data-category="crop">
                    <!-- Photo Container with Zoom Effect -->
                    <div class="relative aspect-[3/4] sm:aspect-[4/5] overflow-hidden bg-zinc-950">
                        <img src="{{ asset('images/style-crop.jpg') }}" alt="Textured French Crop" class="w-full h-full object-cover object-top group-hover:scale-110 transition-transform duration-700 ease-out">
                        
                        <!-- Dark Transparent Gradient Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent opacity-85 group-hover:opacity-95 transition-opacity duration-500"></div>

                        <!-- Top Badges -->
                        <div class="absolute top-4 left-4 right-4 flex items-center justify-between pointer-events-none z-10">
                            <span class="px-2.5 py-1 rounded-md text-[10px] font-black uppercase tracking-wider bg-zinc-900/80 backdrop-blur-md text-white border border-white/10 shadow">
                                Textured Crop
                            </span>
                            <span class="px-2.5 py-1 rounded-md text-[10px] font-bold uppercase tracking-wider bg-zinc-800 text-amber-400 border border-amber-400/30 shadow">
                                ⚡ Trending 2026
                            </span>
                        </div>

                        <!-- Bottom Content Info -->
                        <div class="absolute bottom-0 left-0 right-0 p-6 flex flex-col justify-end z-10">
                            <span class="text-[11px] font-bold uppercase tracking-widest text-zinc-400 mb-1">
                                Street & Casual
                            </span>
                            <h3 class="text-xl sm:text-2xl font-black text-white tracking-tight mb-2 group-hover:text-zinc-100 transition-colors">
                                Textured French Crop
                            </h3>
                            <p class="text-xs text-zinc-300 leading-relaxed mb-4 line-clamp-2">
                                Poni tumpul horizontal dengan tekstur acak di bagian atas. Tampilan berani, fresh, dan sangat mudah ditata tanpa pomade tebal.
                            </p>

                            <!-- Pricing & Stylist Meta Bar -->
                            <div class="flex items-center justify-between pt-3 border-t border-white/15 text-xs">
                                <div class="flex items-baseline gap-2">
                                    <span class="text-base font-extrabold text-white">Rp 55.000</span>
                                    <span class="text-[11px] text-zinc-400 font-mono">&bull; 40 Mnt</span>
                                </div>
                                <span class="text-[11px] text-zinc-300 font-medium">
                                    <i class="bi bi-person-badge text-barber-red"></i> Farhan Stylist
                                </span>
                            </div>

                            <!-- Interactive Action Buttons -->
                            <div class="grid grid-cols-2 gap-2 mt-4 pt-3 border-t border-white/10 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 sm:translate-y-2 sm:group-hover:translate-y-0 transition-all duration-300">
                                <button type="button" onclick="openPhotoLightbox('{{ asset('images/style-crop.jpg') }}', 'Textured French Crop', 'TEXTURED CROP', 'Rp 55.000', '40 Menit', 'Poni tumpul horizontal dengan tekstur acak di bagian atas. Kesan fresh dan low-maintenance.', 'Lonjong, Persegi & Hati', 'Sea Salt Spray / Styling Powder', 'Farhan (Fade Stylist)')" class="py-2 px-3 rounded-xl border border-white/20 bg-zinc-900/80 hover:bg-white hover:text-zinc-950 text-white text-xs font-bold transition flex items-center justify-center gap-1.5 cursor-pointer">
                                    <i class="bi bi-zoom-in"></i> Detail
                                </button>
                                <button type="button" onclick="quickBookStyle('Textured French Crop', 'Rp 55.000')" class="py-2 px-3 rounded-xl bg-barber-red hover:bg-barber-darkred text-white text-xs font-bold transition flex items-center justify-center gap-1.5 shadow cursor-pointer">
                                    <i class="bi bi-calendar2-check"></i> Booking
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CARD 3: Full Beard Sculpt & Trim -->
                <div class="gallery-card group relative rounded-2xl overflow-hidden bg-zinc-900/90 border border-zinc-800/90 hover:border-zinc-600/80 transition-all duration-500 shadow-xl flex flex-col" data-category="beard">
                    <!-- Photo Container with Zoom Effect -->
                    <div class="relative aspect-[3/4] sm:aspect-[4/5] overflow-hidden bg-zinc-950">
                        <img src="{{ asset('images/style-beard.jpg') }}" alt="Full Beard Sculpt & Sharp Line-Up" class="w-full h-full object-cover object-center group-hover:scale-110 transition-transform duration-700 ease-out">
                        
                        <!-- Dark Transparent Gradient Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent opacity-85 group-hover:opacity-95 transition-opacity duration-500"></div>

                        <!-- Top Badges -->
                        <div class="absolute top-4 left-4 right-4 flex items-center justify-between pointer-events-none z-10">
                            <span class="px-2.5 py-1 rounded-md text-[10px] font-black uppercase tracking-wider bg-zinc-900/80 backdrop-blur-md text-white border border-white/10 shadow">
                                Beard Trim
                            </span>
                            <span class="px-2.5 py-1 rounded-md text-[10px] font-bold uppercase tracking-wider bg-zinc-800 text-zinc-300 border border-zinc-700 shadow">
                                ✂️ Razor Shave
                            </span>
                        </div>

                        <!-- Bottom Content Info -->
                        <div class="absolute bottom-0 left-0 right-0 p-6 flex flex-col justify-end z-10">
                            <span class="text-[11px] font-bold uppercase tracking-widest text-zinc-400 mb-1">
                                Gentleman Grooming
                            </span>
                            <h3 class="text-xl sm:text-2xl font-black text-white tracking-tight mb-2 group-hover:text-zinc-100 transition-colors">
                                Beard Sculpt & Line-Up
                            </h3>
                            <p class="text-xs text-zinc-300 leading-relaxed mb-4 line-clamp-2">
                                Pembentukan jenggot dan kumis presisi tinggi dengan pisau cukur silet, handuk hangat rileks, dan vitamin beard oil.
                            </p>

                            <!-- Pricing & Stylist Meta Bar -->
                            <div class="flex items-center justify-between pt-3 border-t border-white/15 text-xs">
                                <div class="flex items-baseline gap-2">
                                    <span class="text-base font-extrabold text-white">Rp 45.000</span>
                                    <span class="text-[11px] text-zinc-400 font-mono">&bull; 30 Mnt</span>
                                </div>
                                <span class="text-[11px] text-zinc-300 font-medium">
                                    <i class="bi bi-person-badge text-barber-red"></i> Mas Gatot
                                </span>
                            </div>

                            <!-- Interactive Action Buttons -->
                            <div class="grid grid-cols-2 gap-2 mt-4 pt-3 border-t border-white/10 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 sm:translate-y-2 sm:group-hover:translate-y-0 transition-all duration-300">
                                <button type="button" onclick="openPhotoLightbox('{{ asset('images/style-beard.jpg') }}', 'Beard Sculpt & Line-Up', 'BEARD TRIM', 'Rp 45.000', '30 Menit', 'Pembentukan jenggot dan kumis presisi tinggi dengan pisau silet dan handuk hangat.', 'Semua Pria Berjanggut', 'Beard Oil & Balm', 'Mas Gatot (Senior Barber)')" class="py-2 px-3 rounded-xl border border-white/20 bg-zinc-900/80 hover:bg-white hover:text-zinc-950 text-white text-xs font-bold transition flex items-center justify-center gap-1.5 cursor-pointer">
                                    <i class="bi bi-zoom-in"></i> Detail
                                </button>
                                <button type="button" onclick="quickBookStyle('Beard Sculpt & Line-Up', 'Rp 45.000')" class="py-2 px-3 rounded-xl bg-barber-red hover:bg-barber-darkred text-white text-xs font-bold transition flex items-center justify-center gap-1.5 shadow cursor-pointer">
                                    <i class="bi bi-calendar2-check"></i> Booking
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CARD 4: Classic Executive Pompadour -->
                <div class="gallery-card group relative rounded-2xl overflow-hidden bg-zinc-900/90 border border-zinc-800/90 hover:border-zinc-600/80 transition-all duration-500 shadow-xl flex flex-col" data-category="classic">
                    <!-- Photo Container with Zoom Effect -->
                    <div class="relative aspect-[3/4] sm:aspect-[4/5] overflow-hidden bg-zinc-950">
                        <img src="{{ asset('images/service-haircut.jpg') }}" alt="Classic Executive Pompadour" class="w-full h-full object-cover object-center group-hover:scale-110 transition-transform duration-700 ease-out">
                        
                        <!-- Dark Transparent Gradient Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent opacity-85 group-hover:opacity-95 transition-opacity duration-500"></div>

                        <!-- Top Badges -->
                        <div class="absolute top-4 left-4 right-4 flex items-center justify-between pointer-events-none z-10">
                            <span class="px-2.5 py-1 rounded-md text-[10px] font-black uppercase tracking-wider bg-zinc-900/80 backdrop-blur-md text-white border border-white/10 shadow">
                                Classic Gentlemen
                            </span>
                            <span class="px-2.5 py-1 rounded-md text-[10px] font-bold uppercase tracking-wider bg-zinc-800 text-zinc-300 border border-zinc-700 shadow">
                                👑 Timeless Cut
                            </span>
                        </div>

                        <!-- Bottom Content Info -->
                        <div class="absolute bottom-0 left-0 right-0 p-6 flex flex-col justify-end z-10">
                            <span class="text-[11px] font-bold uppercase tracking-widest text-zinc-400 mb-1">
                                Executive & Formal
                            </span>
                            <h3 class="text-xl sm:text-2xl font-black text-white tracking-tight mb-2 group-hover:text-zinc-100 transition-colors">
                                Executive Pompadour
                            </h3>
                            <p class="text-xs text-zinc-300 leading-relaxed mb-4 line-clamp-2">
                                Volume elegan di bagian depan dengan sisiran klimis ke belakang. Karakteristik pria mapan dengan cita rasa gaya tak lekang oleh waktu.
                            </p>

                            <!-- Pricing & Stylist Meta Bar -->
                            <div class="flex items-center justify-between pt-3 border-t border-white/15 text-xs">
                                <div class="flex items-baseline gap-2">
                                    <span class="text-base font-extrabold text-white">Rp 50.000</span>
                                    <span class="text-[11px] text-zinc-400 font-mono">&bull; 45 Mnt</span>
                                </div>
                                <span class="text-[11px] text-zinc-300 font-medium">
                                    <i class="bi bi-person-badge text-barber-red"></i> Mas Gatot
                                </span>
                            </div>

                            <!-- Interactive Action Buttons -->
                            <div class="grid grid-cols-2 gap-2 mt-4 pt-3 border-t border-white/10 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 sm:translate-y-2 sm:group-hover:translate-y-0 transition-all duration-300">
                                <button type="button" onclick="openPhotoLightbox('{{ asset('images/service-haircut.jpg') }}', 'Executive Pompadour', 'CLASSIC GENTLEMEN', 'Rp 50.000', '45 Menit', 'Volume elegan di bagian depan dengan sisiran klimis ke belakang.', 'Oval, Persegi & Bulat', 'Oil-based / Water Pomade', 'Mas Gatot (Senior Barber)')" class="py-2 px-3 rounded-xl border border-white/20 bg-zinc-900/80 hover:bg-white hover:text-zinc-950 text-white text-xs font-bold transition flex items-center justify-center gap-1.5 cursor-pointer">
                                    <i class="bi bi-zoom-in"></i> Detail
                                </button>
                                <button type="button" onclick="quickBookStyle('Executive Pompadour', 'Rp 50.000')" class="py-2 px-3 rounded-xl bg-barber-red hover:bg-barber-darkred text-white text-xs font-bold transition flex items-center justify-center gap-1.5 shadow cursor-pointer">
                                    <i class="bi bi-calendar2-check"></i> Booking
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CARD 5: Modern Textured Quiff -->
                <div class="gallery-card group relative rounded-2xl overflow-hidden bg-zinc-900/90 border border-zinc-800/90 hover:border-zinc-600/80 transition-all duration-500 shadow-xl flex flex-col" data-category="fade">
                    <!-- Photo Container with Zoom Effect -->
                    <div class="relative aspect-[3/4] sm:aspect-[4/5] overflow-hidden bg-zinc-950">
                        <img src="{{ asset('images/service-styling.jpg') }}" alt="Modern Textured Quiff with Drop Fade" class="w-full h-full object-cover object-center group-hover:scale-110 transition-transform duration-700 ease-out">
                        
                        <!-- Dark Transparent Gradient Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent opacity-85 group-hover:opacity-95 transition-opacity duration-500"></div>

                        <!-- Top Badges -->
                        <div class="absolute top-4 left-4 right-4 flex items-center justify-between pointer-events-none z-10">
                            <span class="px-2.5 py-1 rounded-md text-[10px] font-black uppercase tracking-wider bg-zinc-900/80 backdrop-blur-md text-white border border-white/10 shadow">
                                Skin Fade
                            </span>
                            <span class="px-2.5 py-1 rounded-md text-[10px] font-bold uppercase tracking-wider bg-zinc-800 text-amber-400 border border-amber-400/30 shadow">
                                ⭐ 4.9 Rating
                            </span>
                        </div>

                        <!-- Bottom Content Info -->
                        <div class="absolute bottom-0 left-0 right-0 p-6 flex flex-col justify-end z-10">
                            <span class="text-[11px] font-bold uppercase tracking-widest text-zinc-400 mb-1">
                                Dynamic & Clean
                            </span>
                            <h3 class="text-xl sm:text-2xl font-black text-white tracking-tight mb-2 group-hover:text-zinc-100 transition-colors">
                                Modern Textured Quiff
                            </h3>
                            <p class="text-xs text-zinc-300 leading-relaxed mb-4 line-clamp-2">
                                Kombinasi quiff bervolume dinamis dengan drop fade di pelipis. Menciptakan ilusi proporsi wajah yang lebih tegap dan maskulin.
                            </p>

                            <!-- Pricing & Stylist Meta Bar -->
                            <div class="flex items-center justify-between pt-3 border-t border-white/15 text-xs">
                                <div class="flex items-baseline gap-2">
                                    <span class="text-base font-extrabold text-white">Rp 55.000</span>
                                    <span class="text-[11px] text-zinc-400 font-mono">&bull; 40 Mnt</span>
                                </div>
                                <span class="text-[11px] text-zinc-300 font-medium">
                                    <i class="bi bi-person-badge text-barber-red"></i> Farhan Stylist
                                </span>
                            </div>

                            <!-- Interactive Action Buttons -->
                            <div class="grid grid-cols-2 gap-2 mt-4 pt-3 border-t border-white/10 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 sm:translate-y-2 sm:group-hover:translate-y-0 transition-all duration-300">
                                <button type="button" onclick="openPhotoLightbox('{{ asset('images/service-styling.jpg') }}', 'Modern Textured Quiff', 'SKIN FADE', 'Rp 55.000', '40 Menit', 'Kombinasi quiff dinamis dengan drop fade di bagian samping.', 'Bulat, Oval & Persegi', 'Matte Clay / Paste', 'Farhan (Stylist)')" class="py-2 px-3 rounded-xl border border-white/20 bg-zinc-900/80 hover:bg-white hover:text-zinc-950 text-white text-xs font-bold transition flex items-center justify-center gap-1.5 cursor-pointer">
                                    <i class="bi bi-zoom-in"></i> Detail
                                </button>
                                <button type="button" onclick="quickBookStyle('Modern Textured Quiff', 'Rp 55.000')" class="py-2 px-3 rounded-xl bg-barber-red hover:bg-barber-darkred text-white text-xs font-bold transition flex items-center justify-center gap-1.5 shadow cursor-pointer">
                                    <i class="bi bi-calendar2-check"></i> Booking
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CARD 6: Classic Gentleman Side-Part & Shave -->
                <div class="gallery-card group relative rounded-2xl overflow-hidden bg-zinc-900/90 border border-zinc-800/90 hover:border-zinc-600/80 transition-all duration-500 shadow-xl flex flex-col" data-category="classic">
                    <!-- Photo Container with Zoom Effect -->
                    <div class="relative aspect-[3/4] sm:aspect-[4/5] overflow-hidden bg-zinc-950">
                        <img src="{{ asset('images/hero-barber.jpg') }}" alt="Classic Gentleman Side-Part & Shave" class="w-full h-full object-cover object-center group-hover:scale-110 transition-transform duration-700 ease-out">
                        
                        <!-- Dark Transparent Gradient Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent opacity-85 group-hover:opacity-95 transition-opacity duration-500"></div>

                        <!-- Top Badges -->
                        <div class="absolute top-4 left-4 right-4 flex items-center justify-between pointer-events-none z-10">
                            <span class="px-2.5 py-1 rounded-md text-[10px] font-black uppercase tracking-wider bg-zinc-900/80 backdrop-blur-md text-white border border-white/10 shadow">
                                Classic Gentlemen
                            </span>
                            <span class="px-2.5 py-1 rounded-md text-[10px] font-bold uppercase tracking-wider bg-zinc-800 text-zinc-300 border border-zinc-700 shadow">
                                💼 Executive Choice
                            </span>
                        </div>

                        <!-- Bottom Content Info -->
                        <div class="absolute bottom-0 left-0 right-0 p-6 flex flex-col justify-end z-10">
                            <span class="text-[11px] font-bold uppercase tracking-widest text-zinc-400 mb-1">
                                European Heritage
                            </span>
                            <h3 class="text-xl sm:text-2xl font-black text-white tracking-tight mb-2 group-hover:text-zinc-100 transition-colors">
                                Side-Part & Clean Shave
                            </h3>
                            <p class="text-xs text-zinc-300 leading-relaxed mb-4 line-clamp-2">
                                Garis belah samping tegas khas aristokrat Eropa, dipadukan cukur bersih halus dengan aftershave sandalwood menyegarkan.
                            </p>

                            <!-- Pricing & Stylist Meta Bar -->
                            <div class="flex items-center justify-between pt-3 border-t border-white/15 text-xs">
                                <div class="flex items-baseline gap-2">
                                    <span class="text-base font-extrabold text-white">Rp 60.000</span>
                                    <span class="text-[11px] text-zinc-400 font-mono">&bull; 45 Mnt</span>
                                </div>
                                <span class="text-[11px] text-zinc-300 font-medium">
                                    <i class="bi bi-person-badge text-barber-red"></i> Mas Gatot
                                </span>
                            </div>

                            <!-- Interactive Action Buttons -->
                            <div class="grid grid-cols-2 gap-2 mt-4 pt-3 border-t border-white/10 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 sm:translate-y-2 sm:group-hover:translate-y-0 transition-all duration-300">
                                <button type="button" onclick="openPhotoLightbox('{{ asset('images/hero-barber.jpg') }}', 'Side-Part & Clean Shave', 'CLASSIC GENTLEMEN', 'Rp 60.000', '45 Menit', 'Garis belahan samping tegas dipadukan cukur bersih halus aroma sandalwood.', 'Semua Bentuk Wajah', 'Classic Grooming Pomade', 'Mas Gatot (Senior Barber)')" class="py-2 px-3 rounded-xl border border-white/20 bg-zinc-900/80 hover:bg-white hover:text-zinc-950 text-white text-xs font-bold transition flex items-center justify-center gap-1.5 cursor-pointer">
                                    <i class="bi bi-zoom-in"></i> Detail
                                </button>
                                <button type="button" onclick="quickBookStyle('Side-Part & Clean Shave', 'Rp 60.000')" class="py-2 px-3 rounded-xl bg-barber-red hover:bg-barber-darkred text-white text-xs font-bold transition flex items-center justify-center gap-1.5 shadow cursor-pointer">
                                    <i class="bi bi-calendar2-check"></i> Booking
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CARD 7: Caesar Crop Minimalist -->
                <div class="gallery-card group relative rounded-2xl overflow-hidden bg-zinc-900/90 border border-zinc-800/90 hover:border-zinc-600/80 transition-all duration-500 shadow-xl flex flex-col" data-category="crop">
                    <!-- Photo Container with Zoom Effect -->
                    <div class="relative aspect-[3/4] sm:aspect-[4/5] overflow-hidden bg-zinc-950">
                        <img src="{{ asset('images/style-crop.jpg') }}" alt="Caesar Crop Minimalist" class="w-full h-full object-cover object-bottom group-hover:scale-110 transition-transform duration-700 ease-out filter contrast-105">
                        
                        <!-- Dark Transparent Gradient Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent opacity-85 group-hover:opacity-95 transition-opacity duration-500"></div>

                        <!-- Top Badges -->
                        <div class="absolute top-4 left-4 right-4 flex items-center justify-between pointer-events-none z-10">
                            <span class="px-2.5 py-1 rounded-md text-[10px] font-black uppercase tracking-wider bg-zinc-900/80 backdrop-blur-md text-white border border-white/10 shadow">
                                Textured Crop
                            </span>
                            <span class="px-2.5 py-1 rounded-md text-[10px] font-bold uppercase tracking-wider bg-zinc-800 text-zinc-300 border border-zinc-700 shadow">
                                🛡️ Low Maintenance
                            </span>
                        </div>

                        <!-- Bottom Content Info -->
                        <div class="absolute bottom-0 left-0 right-0 p-6 flex flex-col justify-end z-10">
                            <span class="text-[11px] font-bold uppercase tracking-widest text-zinc-400 mb-1">
                                Minimalist Edge
                            </span>
                            <h3 class="text-xl sm:text-2xl font-black text-white tracking-tight mb-2 group-hover:text-zinc-100 transition-colors">
                                Caesar Crop Minimalist
                            </h3>
                            <p class="text-xs text-zinc-300 leading-relaxed mb-4 line-clamp-2">
                                Potongan poni pendek rata ala Kaisar Romawi dengan taper fade halus di pelipis. Praktis, sporty, dan langsung siap beraktivitas.
                            </p>

                            <!-- Pricing & Stylist Meta Bar -->
                            <div class="flex items-center justify-between pt-3 border-t border-white/15 text-xs">
                                <div class="flex items-baseline gap-2">
                                    <span class="text-base font-extrabold text-white">Rp 50.000</span>
                                    <span class="text-[11px] text-zinc-400 font-mono">&bull; 35 Mnt</span>
                                </div>
                                <span class="text-[11px] text-zinc-300 font-medium">
                                    <i class="bi bi-person-badge text-barber-red"></i> Farhan Stylist
                                </span>
                            </div>

                            <!-- Interactive Action Buttons -->
                            <div class="grid grid-cols-2 gap-2 mt-4 pt-3 border-t border-white/10 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 sm:translate-y-2 sm:group-hover:translate-y-0 transition-all duration-300">
                                <button type="button" onclick="openPhotoLightbox('{{ asset('images/style-crop.jpg') }}', 'Caesar Crop Minimalist', 'TEXTURED CROP', 'Rp 50.000', '35 Menit', 'Potongan pendek rata ala Romawi dengan taper halus di pelipis.', 'Oval, Persegi & Berlian', 'Matte Hair Wax', 'Farhan (Stylist)')" class="py-2 px-3 rounded-xl border border-white/20 bg-zinc-900/80 hover:bg-white hover:text-zinc-950 text-white text-xs font-bold transition flex items-center justify-center gap-1.5 cursor-pointer">
                                    <i class="bi bi-zoom-in"></i> Detail
                                </button>
                                <button type="button" onclick="quickBookStyle('Caesar Crop Minimalist', 'Rp 50.000')" class="py-2 px-3 rounded-xl bg-barber-red hover:bg-barber-darkred text-white text-xs font-bold transition flex items-center justify-center gap-1.5 shadow cursor-pointer">
                                    <i class="bi bi-calendar2-check"></i> Booking
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CARD 8: Hot Towel Shave & Royal Beard Spa -->
                <div class="gallery-card group relative rounded-2xl overflow-hidden bg-zinc-900/90 border border-zinc-800/90 hover:border-zinc-600/80 transition-all duration-500 shadow-xl flex flex-col" data-category="beard">
                    <!-- Photo Container with Zoom Effect -->
                    <div class="relative aspect-[3/4] sm:aspect-[4/5] overflow-hidden bg-zinc-950">
                        <img src="{{ asset('images/hair-wash.jpg') }}" alt="Hot Towel Shave & Royal Beard Care" class="w-full h-full object-cover object-center group-hover:scale-110 transition-transform duration-700 ease-out">
                        
                        <!-- Dark Transparent Gradient Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent opacity-85 group-hover:opacity-95 transition-opacity duration-500"></div>

                        <!-- Top Badges -->
                        <div class="absolute top-4 left-4 right-4 flex items-center justify-between pointer-events-none z-10">
                            <span class="px-2.5 py-1 rounded-md text-[10px] font-black uppercase tracking-wider bg-zinc-900/80 backdrop-blur-md text-white border border-white/10 shadow">
                                Beard Trim
                            </span>
                            <span class="px-2.5 py-1 rounded-md text-[10px] font-bold uppercase tracking-wider bg-emerald-950/80 text-emerald-400 border border-emerald-500/30 shadow">
                                🌿 Spa & Relaxing
                            </span>
                        </div>

                        <!-- Bottom Content Info -->
                        <div class="absolute bottom-0 left-0 right-0 p-6 flex flex-col justify-end z-10">
                            <span class="text-[11px] font-bold uppercase tracking-widest text-zinc-400 mb-1">
                                Royal Treatment
                            </span>
                            <h3 class="text-xl sm:text-2xl font-black text-white tracking-tight mb-2 group-hover:text-zinc-100 transition-colors">
                                Hot Towel Shave & Beard Spa
                            </h3>
                            <p class="text-xs text-zinc-300 leading-relaxed mb-4 line-clamp-2">
                                Relaksasi uap handuk hangat, busa krim kaya nutrisi, pencukuran presisi silet, serta pijatan lembut pada rahang dan leher.
                            </p>

                            <!-- Pricing & Stylist Meta Bar -->
                            <div class="flex items-center justify-between pt-3 border-t border-white/15 text-xs">
                                <div class="flex items-baseline gap-2">
                                    <span class="text-base font-extrabold text-white">Rp 65.000</span>
                                    <span class="text-[11px] text-zinc-400 font-mono">&bull; 45 Mnt</span>
                                </div>
                                <span class="text-[11px] text-zinc-300 font-medium">
                                    <i class="bi bi-person-badge text-barber-red"></i> Mas Gatot
                                </span>
                            </div>

                            <!-- Interactive Action Buttons -->
                            <div class="grid grid-cols-2 gap-2 mt-4 pt-3 border-t border-white/10 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 sm:translate-y-2 sm:group-hover:translate-y-0 transition-all duration-300">
                                <button type="button" onclick="openPhotoLightbox('{{ asset('images/hair-wash.jpg') }}', 'Hot Towel Shave & Beard Spa', 'BEARD TRIM', 'Rp 65.000', '45 Menit', 'Relaksasi uap handuk hangat, busa kaya nutrisi, dan pencukuran presisi silet.', 'Pria Berjanggut / Kumis', 'Eucalyptus Shaving Cream', 'Mas Gatot (Senior Barber)')" class="py-2 px-3 rounded-xl border border-white/20 bg-zinc-900/80 hover:bg-white hover:text-zinc-950 text-white text-xs font-bold transition flex items-center justify-center gap-1.5 cursor-pointer">
                                    <i class="bi bi-zoom-in"></i> Detail
                                </button>
                                <button type="button" onclick="quickBookStyle('Hot Towel Shave & Beard Spa', 'Rp 65.000')" class="py-2 px-3 rounded-xl bg-barber-red hover:bg-barber-darkred text-white text-xs font-bold transition flex items-center justify-center gap-1.5 shadow cursor-pointer">
                                    <i class="bi bi-calendar2-check"></i> Booking
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CARD 9: High & Tight Military Skin Fade -->
                <div class="gallery-card group relative rounded-2xl overflow-hidden bg-zinc-900/90 border border-zinc-800/90 hover:border-zinc-600/80 transition-all duration-500 shadow-xl flex flex-col" data-category="fade">
                    <!-- Photo Container with Zoom Effect -->
                    <div class="relative aspect-[3/4] sm:aspect-[4/5] overflow-hidden bg-zinc-950">
                        <img src="{{ asset('images/240_F_310722163_fvLciF2seWfeybpfTvpwjNfBRnHQMsrr.jpg') }}" alt="High & Tight Military Skin Fade" class="w-full h-full object-cover object-center group-hover:scale-110 transition-transform duration-700 ease-out">
                        
                        <!-- Dark Transparent Gradient Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent opacity-85 group-hover:opacity-95 transition-opacity duration-500"></div>

                        <!-- Top Badges -->
                        <div class="absolute top-4 left-4 right-4 flex items-center justify-between pointer-events-none z-10">
                            <span class="px-2.5 py-1 rounded-md text-[10px] font-black uppercase tracking-wider bg-zinc-900/80 backdrop-blur-md text-white border border-white/10 shadow">
                                Skin Fade
                            </span>
                            <span class="px-2.5 py-1 rounded-md text-[10px] font-bold uppercase tracking-wider bg-zinc-800 text-zinc-300 border border-zinc-700 shadow">
                                ⚡ Clean & Sharp
                            </span>
                        </div>

                        <!-- Bottom Content Info -->
                        <div class="absolute bottom-0 left-0 right-0 p-6 flex flex-col justify-end z-10">
                            <span class="text-[11px] font-bold uppercase tracking-widest text-zinc-400 mb-1">
                                Military Precision
                            </span>
                            <h3 class="text-xl sm:text-2xl font-black text-white tracking-tight mb-2 group-hover:text-zinc-100 transition-colors">
                                High & Tight Skin Fade
                            </h3>
                            <p class="text-xs text-zinc-300 leading-relaxed mb-4 line-clamp-2">
                                Sisi samping dan belakang dicukur licin tinggi dengan transisi kontras tegas ke rambut atas. Sangat bersih, segar, dan anti gerah.
                            </p>

                            <!-- Pricing & Stylist Meta Bar -->
                            <div class="flex items-center justify-between pt-3 border-t border-white/15 text-xs">
                                <div class="flex items-baseline gap-2">
                                    <span class="text-base font-extrabold text-white">Rp 45.000</span>
                                    <span class="text-[11px] text-zinc-400 font-mono">&bull; 30 Mnt</span>
                                </div>
                                <span class="text-[11px] text-zinc-300 font-medium">
                                    <i class="bi bi-person-badge text-barber-red"></i> Farhan Stylist
                                </span>
                            </div>

                            <!-- Interactive Action Buttons -->
                            <div class="grid grid-cols-2 gap-2 mt-4 pt-3 border-t border-white/10 opacity-90 sm:opacity-0 sm:group-hover:opacity-100 sm:translate-y-2 sm:group-hover:translate-y-0 transition-all duration-300">
                                <button type="button" onclick="openPhotoLightbox('{{ asset('images/240_F_310722163_fvLciF2seWfeybpfTvpwjNfBRnHQMsrr.jpg') }}', 'High & Tight Skin Fade', 'SKIN FADE', 'Rp 45.000', '30 Menit', 'Sisi samping dicukur licin tinggi dengan transisi kontras tegas ke atas.', 'Persegi, Bulat & Atletik', 'Matte Pomade / Tonic', 'Farhan (Stylist)')" class="py-2 px-3 rounded-xl border border-white/20 bg-zinc-900/80 hover:bg-white hover:text-zinc-950 text-white text-xs font-bold transition flex items-center justify-center gap-1.5 cursor-pointer">
                                    <i class="bi bi-zoom-in"></i> Detail
                                </button>
                                <button type="button" onclick="quickBookStyle('High & Tight Skin Fade', 'Rp 45.000')" class="py-2 px-3 rounded-xl bg-barber-red hover:bg-barber-darkred text-white text-xs font-bold transition flex items-center justify-center gap-1.5 shadow cursor-pointer">
                                    <i class="bi bi-calendar2-check"></i> Booking
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Empty State (Shown if filter has no cards) -->
            <div id="galleryEmptyState" class="hidden text-center py-20 bg-zinc-900/40 rounded-3xl border border-zinc-800 mt-8">
                <i class="bi bi-images text-4xl text-zinc-600 block mb-3"></i>
                <h4 class="text-lg font-bold text-white mb-1">Gaya Tidak Ditemukan</h4>
                <p class="text-xs text-zinc-400 max-w-sm mx-auto mb-5">Model untuk kategori ini belum tersedia saat ini. Silakan pilih kategori lain.</p>
                <button type="button" onclick="filterGallery('all', document.querySelector('.gallery-filter-btn'))" class="px-4 py-2 rounded-full text-xs font-bold bg-white text-zinc-950 hover:bg-zinc-200 transition">
                    Kembali ke Semua Gaya
                </button>
            </div>

            <!-- ======================================================== -->
            <!-- 5. CONSULTATION & CUSTOM PHOTO REFERENCE CTA BANNER       -->
            <!-- ======================================================== -->
            <div class="mt-20 sm:mt-24 p-8 sm:p-12 rounded-3xl bg-gradient-to-r from-zinc-900 via-zinc-900/90 to-black border border-zinc-800 shadow-2xl relative overflow-hidden flex flex-col md:flex-row items-center justify-between gap-8">
                <!-- Ambient glow inside banner -->
                <div class="absolute -right-20 -top-20 w-80 h-80 bg-barber-red/10 rounded-full blur-3xl pointer-events-none"></div>

                <div class="relative z-10 max-w-xl text-center md:text-left">
                    <span class="inline-flex items-center gap-2 text-xs font-bold text-barber-red uppercase tracking-widest mb-3">
                        <i class="bi bi-chat-dots-fill"></i> Free Haircut Consultation
                    </span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight mb-3">
                        Punya Foto Referensi Sendiri?
                    </h2>
                    <p class="text-sm text-zinc-400 leading-relaxed">
                        Tunjukkan foto gaya rambut yang Anda inginkan kepada kapster kami. Kami siap mendiskusikan penyesuaian potongan yang paling harmonis dengan kontur wajah dan ketebalan rambut Anda.
                    </p>
                </div>

                <div class="relative z-10 flex flex-col sm:flex-row items-center gap-3 shrink-0 w-full sm:w-auto">
                    <a href="https://wa.me/6281234567890?text=Halo%20Black%20Crown%20Barber,%20saya%20punya%20foto%20referensi%20model%20rambut%20dan%20ingin%20konsultasi%20jadwal%20cukur." target="_blank" rel="noopener noreferrer" class="w-full sm:w-auto px-6 py-3.5 rounded-full text-xs font-bold uppercase tracking-wider bg-emerald-600 hover:bg-emerald-500 text-white transition-all shadow-lg shadow-emerald-900/30 flex items-center justify-center gap-2">
                        <i class="bi bi-whatsapp text-sm"></i> Kirim Foto via WhatsApp
                    </a>
                    <button onclick="openBookingModal()" type="button" class="w-full sm:w-auto px-6 py-3.5 rounded-full text-xs font-bold uppercase tracking-wider bg-white hover:bg-zinc-200 text-zinc-950 transition-all shadow-md flex items-center justify-center gap-2">
                        <i class="bi bi-calendar-check text-sm text-barber-red"></i> Book Appointment
                    </button>
                </div>
            </div>

        </div>
    </main>

    <!-- ======================================================== -->
    <!-- 6. HIGH-RESOLUTION PHOTO LIGHTBOX MODAL                   -->
    <!-- ======================================================== -->
    <div id="photoLightboxModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/85 backdrop-blur-md hidden p-4 sm:p-6 opacity-0 transition-opacity duration-300 overflow-y-auto">
        <div class="bg-zinc-900 border border-zinc-800 w-full max-w-3xl rounded-3xl shadow-2xl overflow-hidden transform scale-95 transition-transform duration-300 flex flex-col md:flex-row max-h-[90vh] m-auto my-auto relative" id="photoLightboxContent">
            
            <!-- Left: Big Photo Frame -->
            <div class="relative md:w-1/2 bg-black flex items-center justify-center overflow-hidden min-h-[280px] md:min-h-full">
                <img id="lightboxPhotoImg" src="" alt="Preview Gaya Rambut" class="w-full h-full object-cover object-top">
                <span id="lightboxPhotoTag" class="absolute top-4 left-4 px-3 py-1 rounded-md text-[10px] font-black uppercase tracking-wider bg-zinc-950/80 backdrop-blur-md text-white border border-white/10 shadow"></span>
            </div>

            <!-- Right: Hairstyle Deep Info & Quick Actions (Centered Layout) -->
            <div class="p-6 md:p-8 md:w-1/2 flex flex-col justify-between overflow-y-auto relative text-center">
                <!-- Close Button (Top Right) -->
                <button type="button" onclick="closePhotoLightbox()" class="absolute top-4 right-4 text-zinc-400 hover:text-white text-xl p-1.5 leading-none rounded-xl hover:bg-zinc-800 transition z-10 cursor-pointer" aria-label="Tutup Preview">
                    <i class="bi bi-x-lg"></i>
                </button>

                <div>
                    <!-- Modal Header (Centered) -->
                    <div class="mb-4 text-center pr-6 md:pr-0">
                        <span class="text-[11px] font-bold text-zinc-400 uppercase tracking-widest block mb-1">Detail Model Rambut</span>
                        <h3 id="lightboxPhotoTitle" class="text-2xl sm:text-3xl font-black text-white tracking-tight"></h3>
                    </div>

                    <!-- Price & Duration (Centered) -->
                    <div class="inline-flex items-center justify-center gap-3 mb-5 px-5 py-2.5 rounded-xl bg-zinc-950/80 border border-zinc-800/80 mx-auto text-center shadow-inner">
                        <span id="lightboxPhotoPrice" class="text-lg font-black text-emerald-400"></span>
                        <span class="text-xs text-zinc-600">&bull;</span>
                        <span id="lightboxPhotoDuration" class="text-xs text-zinc-300 font-mono"></span>
                    </div>

                    <!-- Description (Centered) -->
                    <p id="lightboxPhotoDesc" class="text-xs sm:text-sm text-zinc-300 leading-relaxed mb-6 text-center max-w-md mx-auto"></p>

                    <!-- Stylist Insights Matrix (Balanced Centered Box) -->
                    <div class="space-y-2.5 text-xs border border-zinc-800/80 bg-zinc-950/60 p-4 rounded-2xl mb-6 text-left max-w-md mx-auto">
                        <div class="flex items-center justify-between text-zinc-400 gap-2">
                            <span><i class="bi bi-person-fill text-zinc-500 mr-1.5"></i> Rekomendasi Wajah:</span>
                            <span id="lightboxPhotoFace" class="text-white font-semibold text-right"></span>
                        </div>
                        <div class="flex items-center justify-between text-zinc-400 gap-2">
                            <span><i class="bi bi-magic text-zinc-500 mr-1.5"></i> Produk Penataan:</span>
                            <span id="lightboxPhotoProduct" class="text-white font-semibold text-right"></span>
                        </div>
                        <div class="flex items-center justify-between text-zinc-400 gap-2">
                            <span><i class="bi bi-award-fill text-barber-red mr-1.5"></i> Stylist Handal:</span>
                            <span id="lightboxPhotoStylist" class="text-white font-semibold text-right"></span>
                        </div>
                    </div>
                </div>

                <!-- Footer CTAs (Centered) -->
                <div class="pt-4 border-t border-zinc-800 flex flex-col gap-2.5">
                    <button type="button" id="lightboxBookBtn" class="w-full py-3.5 bg-barber-red hover:bg-barber-darkred text-white text-xs font-bold uppercase tracking-wider rounded-xl shadow-lg shadow-red-900/40 transition-colors flex items-center justify-center gap-2 cursor-pointer">
                        <i class="bi bi-scissors text-base"></i> Booking Model Ini Sekarang
                    </button>
                    <button type="button" onclick="closePhotoLightbox()" class="w-full py-2.5 bg-zinc-800/80 hover:bg-zinc-800 text-zinc-400 hover:text-white text-xs font-medium rounded-xl transition cursor-pointer">
                        Kembali ke Galeri
                    </button>
                </div>
            </div>

        </div>
    </div>

    <!-- ======================================================== -->
    <!-- 7. BOOKING APPOINTMENT MODAL                             -->
    <!-- ======================================================== -->
    @include('partials.modal')

    <!-- ======================================================== -->
    <!-- 8. FOOTER SECTION                                        -->
    <!-- ======================================================== -->
    @include('partials.footer')

    <!-- ======================================================== -->
    <!-- 9. JAVASCRIPT LOGIC (FILTERING & LIGHTBOX)               -->
    <!-- ======================================================== -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Mobile Menu Toggle for Gallery Header
            const mobileBtn = document.getElementById('galleryMobileBtn');
            const mobileMenu = document.getElementById('galleryMobileMenu');
            const mobileIcon = document.getElementById('galleryMobileIcon');
            if (mobileBtn && mobileMenu) {
                mobileBtn.addEventListener('click', () => {
                    const isClosed = mobileMenu.classList.contains('hidden');
                    if (isClosed) {
                        mobileMenu.classList.remove('hidden');
                        if (mobileIcon) {
                            mobileIcon.classList.remove('bi-list');
                            mobileIcon.classList.add('bi-x-lg');
                        }
                    } else {
                        mobileMenu.classList.add('hidden');
                        if (mobileIcon) {
                            mobileIcon.classList.remove('bi-x-lg');
                            mobileIcon.classList.add('bi-list');
                        }
                    }
                });
            }

            // Style default active filter button
            updateFilterButtonStyles();
        });

        // Interactive Filter Categories
        window.filterGallery = function (category, clickedBtn) {
            const buttons = document.querySelectorAll('.gallery-filter-btn');
            buttons.forEach(btn => btn.classList.remove('active-filter'));
            if (clickedBtn) clickedBtn.classList.add('active-filter');
            updateFilterButtonStyles();

            const cards = document.querySelectorAll('.gallery-card');
            let visibleCount = 0;

            cards.forEach(card => {
                const cardCat = card.getAttribute('data-category');
                if (category === 'all' || cardCat === category) {
                    card.style.display = 'flex';
                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'scale(1)';
                    }, 10);
                    visibleCount++;
                } else {
                    card.style.opacity = '0';
                    card.style.transform = 'scale(0.95)';
                    setTimeout(() => {
                        card.style.display = 'none';
                    }, 250);
                }
            });

            // Toggle empty state
            const emptyState = document.getElementById('galleryEmptyState');
            if (emptyState) {
                if (visibleCount === 0) {
                    setTimeout(() => emptyState.classList.remove('hidden'), 250);
                } else {
                    emptyState.classList.add('hidden');
                }
            }
        };

        function updateFilterButtonStyles() {
            document.querySelectorAll('.gallery-filter-btn').forEach(btn => {
                if (btn.classList.contains('active-filter')) {
                    btn.className = 'gallery-filter-btn active-filter px-4 sm:px-5 py-2 rounded-full text-xs sm:text-sm font-bold border border-white bg-white text-zinc-950 shadow-md shadow-white/10 cursor-pointer select-none';
                } else {
                    btn.className = 'gallery-filter-btn px-4 sm:px-5 py-2 rounded-full text-xs sm:text-sm font-semibold border border-zinc-800 bg-zinc-900/90 text-zinc-400 hover:text-white hover:border-zinc-700 hover:bg-zinc-800/80 cursor-pointer select-none';
                }
            });
        }

        // Open Lightbox Modal with Full Details
        window.openPhotoLightbox = function (imgUrl, title, tag, price, duration, desc, face, product, stylist) {
            const modal = document.getElementById('photoLightboxModal');
            const modalContent = document.getElementById('photoLightboxContent');
            
            document.getElementById('lightboxPhotoImg').src = imgUrl;
            document.getElementById('lightboxPhotoTitle').innerText = title;
            document.getElementById('lightboxPhotoTag').innerText = tag;
            document.getElementById('lightboxPhotoPrice').innerText = price;
            document.getElementById('lightboxPhotoDuration').innerText = duration;
            document.getElementById('lightboxPhotoDesc').innerText = desc;
            document.getElementById('lightboxPhotoFace').innerText = face;
            document.getElementById('lightboxPhotoProduct').innerText = product;
            document.getElementById('lightboxPhotoStylist').innerText = stylist;

            const bookBtn = document.getElementById('lightboxBookBtn');
            if (bookBtn) {
                bookBtn.onclick = function () {
                    closePhotoLightbox();
                    quickBookStyle(title, price);
                };
            }

            if (modal && modalContent) {
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                setTimeout(() => {
                    modal.classList.remove('opacity-0');
                    modalContent.classList.remove('scale-95');
                    modalContent.classList.add('scale-100');
                }, 10);
                document.body.style.overflow = 'hidden';
            }
        };

        window.closePhotoLightbox = function () {
            const modal = document.getElementById('photoLightboxModal');
            const modalContent = document.getElementById('photoLightboxContent');
            if (modal && modalContent) {
                modal.classList.add('opacity-0');
                modalContent.classList.remove('scale-100');
                modalContent.classList.add('scale-95');
                setTimeout(() => {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                    document.body.style.overflow = '';
                }, 250);
            }
        };

        // Quick Book Style Handler
        window.quickBookStyle = function (styleName, price) {
            @auth
                window.location.href = "{{ route('user.booking.create') }}";
            @else
                window.location.href = "{{ route('login') }}";
            @endauth
        };

        // Close modal on escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                closePhotoLightbox();
            }
        });
    </script>
</body>

</html>
