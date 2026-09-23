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
                        <div class="absolute -bottom-6 -right-6 w-28 h-28 md:w-32 md:h-32 rounded-full bg-barber-red text-white flex flex-col items-center justify-center text-
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

    <!-- 4. STYLE GALLERY -->
    <section id="gallery" class="py-24 bg-white border-t border-gray-100">
        <div class="max-w-6xl mx-auto px-6">
            <!-- Section Header -->
            <div class="flex flex-col md:flex-row justify-between items-end mb-12 reveal">
                <div>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 tracking-tight mb-2">
                        Lookbook & Inspirasi
                    </h2>
                    <p class="text-gray-500">Beberapa karya terbaik dari kapster kami.</p>
                </div>
                <a href="#" class="hidden md:inline-flex items-center text-barber-red font-bold hover:text-barber-darkred transition-colors group">
                    Lihat Semua <i class="bi bi-arrow-right ml-1 group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>

            <!-- 3 Style Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 lg:gap-8">
                <!-- Style 1 -->
                <div class="group cursor-pointer reveal">
                    <div class="relative overflow-hidden rounded-2xl shadow-sm">
                        <img src="{{ asset('images/style-crop.jpg') }}" alt="Textured Crop" class="w-full h-64 md:h-80 object-cover object-top group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <span class="text-white bg-barber-red/90 px-4 py-2 rounded-full text-sm font-bold backdrop-blur-sm">View Style</span>
                        </div>
                    </div>
                    <div class="mt-4 text-center">
                        <h4 class="text-lg font-bold text-gray-900">Textured Crop</h4>
                    </div>
                </div>

                <!-- Style 2 -->
                <div class="group cursor-pointer reveal delay-100">
                    <div class="relative overflow-hidden rounded-2xl shadow-sm">
                        <img src="{{ asset('images/style-fade.jpg') }}" alt="Low Skin Fade" class="w-full h-64 md:h-80 object-cover object-top group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <span class="text-white bg-barber-red/90 px-4 py-2 rounded-full text-sm font-bold backdrop-blur-sm">View Style</span>
                        </div>
                    </div>
                    <div class="mt-4 text-center">
                        <h4 class="text-lg font-bold text-gray-900">Low Skin Fade</h4>
                    </div>
                </div>

                <!-- Style 3 -->
                <div class="group cursor-pointer reveal delay-200">
                    <div class="relative overflow-hidden rounded-2xl shadow-sm">
                        <img src="{{ asset('images/style-beard.jpg') }}" alt="Beard Trim & Side Fade" class="w-full h-64 md:h-80 object-cover object-top group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <span class="text-white bg-barber-red/90 px-4 py-2 rounded-full text-sm font-bold backdrop-blur-sm">View Style</span>
                        </div>
                    </div>
                    <div class="mt-4 text-center">
                        <h4 class="text-lg font-bold text-gray-900">Beard Trim & Fade</h4>
                    </div>
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