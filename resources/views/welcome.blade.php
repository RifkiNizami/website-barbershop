@extends('layouts.app')

@section('title', 'Rusdi Barbershop — Premium Gentleman Grooming')

@section('content')
    <!-- 1. HERO SECTION -->
    <section id="home" class="relative min-h-145 md:min-h-160 flex items-center justify-center text-center text-white overflow-hidden">
        <!-- Background Image with Overlay -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/hero-barber.jpg') }}" alt="Rusdi Barbershop Hero" class="w-full h-full object-cover object-center filter brightness-[0.45]">
            <div class="absolute inset-0 bg-linear-to-b from-black/60 via-transparent to-black/70"></div>
        </div>

        <!-- Hero Content -->
        <div class="relative z-10 max-w-4xl mx-auto px-6 pt-24 pb-16 flex flex-col items-center">
            <!-- Small Eyebrow -->
            <p class="text-xs md:text-sm font-semibold tracking-[0.25em] uppercase text-gray-300 mb-3 drop-shadow">
                OUR POPULAR SERVICES
            </p>

            <!-- Main Heading -->
            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold tracking-tight leading-tight md:leading-tight mb-4 uppercase drop-shadow-md">
                GET POPULAR HAIR STYLE
            </h1>

            <!-- Subtitle -->
            <p class="text-xs sm:text-sm md:text-base text-gray-200 max-w-xl mx-auto mb-8 font-normal leading-relaxed drop-shadow">
                Wujudkan potongan rambut idaman Anda bersama barber berpengalaman dengan teknik cukur presisi dan pelayanan ternyaman.
            </p>

            <!-- CTA Pill Button -->
            <button onclick="openBookingModal()" type="button" class="inline-flex items-center justify-center px-8 py-3.5 bg-barber-red hover:bg-barber-dark-red text-white text-xs md:text-sm font-bold tracking-wider uppercase rounded-full shadow-lg hover:shadow-red-600/30 transition-all duration-300 transform hover:-translate-y-0.5 active:translate-y-0 cursor-pointer">
                GET AN APPOINTMENT
            </button>

            <!-- Scroll Down Indicator -->
            <a href="#about" class="mt-12 flex flex-col items-center gap-1 text-gray-400 hover:text-white transition-colors duration-200 group">
                <span class="text-[10px] tracking-widest uppercase opacity-75 group-hover:opacity-100">About us</span>
                <svg class="w-4 h-4 animate-bounce text-gray-400 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </a>
        </div>
    </section>

    <!-- 2. ABOUT SECTION ("Rusdi Barbershop") -->
    <section id="about" class="py-20 md:py-28 bg-white overflow-hidden">
        <div class="max-w-5xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 lg:gap-16 items-center">
                <!-- Left Image with Overlapping Round Badge -->
                <div class="relative flex justify-center md:justify-start">
                    <div class="relative w-full max-w-md">
                        <img src="{{ asset('images/hair-wash.jpg') }}" alt="Layanan Cuci Rambut Rusdi Barbershop" class="w-full h-80 md:h-95 object-cover rounded-md shadow-lg">
                        
                        <!-- Circular Red Stamp/Badge -->
                        <div class="absolute -bottom-6 -right-4 md:-bottom-7 md:-right-6 w-24 h-24 md:w-28 md:h-28 rounded-full bg-barber-red text-white flex flex-col items-center justify-center text-center shadow-xl border-4 border-white p-2">
                            <span class="text-[9px] md:text-[10px] uppercase font-semibold tracking-widest opacity-90">SINCE</span>
                            <span class="text-lg md:text-xl font-black tracking-tight leading-none my-0.5">2018</span>
                            <span class="text-[8px] md:text-[9px] uppercase font-bold tracking-wider leading-tight opacity-90">BARBERSHOP</span>
                        </div>
                    </div>
                </div>

                <!-- Right Description -->
                <div class="flex flex-col text-left md:pl-4">
                    <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-barber-red mb-5 tracking-tight">
                        Rusdi Barbershop
                    </h2>
                    
                    <p class="text-sm md:text-base text-gray-600 leading-relaxed mb-4">
                        Rusdi Barbershop adalah barbershop pilihan pria modern yang menghargai kerapian, ketelitian, dan kenyamanan. Kami percaya bahwa setiap potongan rambut merefleksikan karakter dan kepercayaan diri seseorang.
                    </p>

                    <p class="text-sm md:text-base text-gray-600 leading-relaxed mb-6">
                        Dengan pengalaman bertahun-tahun di dunia tata rambut pria, kapster kami ahli dalam berbagai gaya mulai dari potongan klasik gentlemen hingga tren fade kekinian. Semua peralatan disterilkan secara berkala untuk menjaga kebersihan maksimal.
                    </p>

                    <div class="flex items-center gap-6 pt-2">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-barber-red" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-xs md:text-sm font-semibold text-gray-700">Barber Profesional</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-barber-red" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-xs md:text-sm font-semibold text-gray-700">Tempat Nyaman & Ber-AC</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. SERVICES & PRICING SECTION -->
    <section id="pricing" class="py-20 md:py-28 bg-barber-bg">
        <div class="max-w-5xl mx-auto px-6">
            <!-- Section Header -->
            <div class="text-center mb-14">
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold text-barber-red mb-2 tracking-tight">
                    Services & Pricing
                </h2>
                <p class="text-xs md:text-sm text-gray-500 font-normal">
                    Layanan terbaik kami sediakan untuk melengkapi gaya pria Anda
                </p>
            </div>

            <!-- 3 Pricing Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">
                <!-- Card 1: Haircut -->
                <div class="bg-white rounded-md shadow-sm border border-gray-100 overflow-hidden flex flex-col hover:shadow-md transition-shadow duration-300">
                    <img src="{{ asset('images/service-haircut.jpg') }}" alt="Layanan Haircut" class="w-full h-44 object-cover">
                    <div class="p-6 flex-1 flex flex-col">
                        <h3 class="text-lg font-bold text-barber-red">Haircut</h3>
                        <div class="w-8 h-0.5 bg-barber-red mt-1.5 mb-5"></div>

                        <ul class="space-y-3.5 text-xs text-gray-600 flex-1">
                            <li class="flex items-baseline justify-between">
                                <span class="font-medium text-gray-700">Hair Cut</span>
                                <span class="price-dots"></span>
                                <span class="font-bold text-gray-800">Rp 35.000</span>
                            </li>
                            <li class="flex items-baseline justify-between">
                                <span class="font-medium text-gray-700">Hair Cut + Wash + Tonic</span>
                                <span class="price-dots"></span>
                                <span class="font-bold text-gray-800">Rp 50.000</span>
                            </li>
                            <li class="flex items-baseline justify-between">
                                <span class="font-medium text-gray-700">Gentlemen's Cut + Styling</span>
                                <span class="price-dots"></span>
                                <span class="font-bold text-gray-800">Rp 65.000</span>
                            </li>
                            <li class="flex items-baseline justify-between">
                                <span class="font-medium text-gray-700">Kids Haircut</span>
                                <span class="price-dots"></span>
                                <span class="font-bold text-gray-800">Rp 30.000</span>
                            </li>
                            <li class="flex items-baseline justify-between">
                                <span class="font-medium text-gray-700">Beard Trim</span>
                                <span class="price-dots"></span>
                                <span class="font-bold text-gray-800">Rp 25.000</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Card 2: Hair Styling -->
                <div class="bg-white rounded-md shadow-sm border border-gray-100 overflow-hidden flex flex-col hover:shadow-md transition-shadow duration-300">
                    <img src="{{ asset('images/service-styling.jpg') }}" alt="Layanan Hair Styling" class="w-full h-44 object-cover">
                    <div class="p-6 flex-1 flex flex-col">
                        <h3 class="text-lg font-bold text-barber-red">Hair Styling</h3>
                        <div class="w-8 h-0.5 bg-barber-red mt-1.5 mb-5"></div>

                        <ul class="space-y-3.5 text-xs text-gray-600 flex-1">
                            <li class="flex items-baseline justify-between">
                                <span class="font-medium text-gray-700">Pomade</span>
                                <span class="price-dots"></span>
                                <span class="font-bold text-gray-800">Rp 20.000</span>
                            </li>
                            <li class="flex items-baseline justify-between">
                                <span class="font-medium text-gray-700">Hair Spa</span>
                                <span class="price-dots"></span>
                                <span class="font-bold text-gray-800">Rp 55.000</span>
                            </li>
                            <li class="flex items-baseline justify-between">
                                <span class="font-medium text-gray-700">Colour Treatment</span>
                                <span class="price-dots"></span>
                                <span class="font-bold text-gray-800">Rp 85.000</span>
                            </li>
                            <li class="flex items-baseline justify-between">
                                <span class="font-medium text-gray-700">Curling/Straight</span>
                                <span class="price-dots"></span>
                                <span class="font-bold text-gray-800">Rp 95.000</span>
                            </li>
                            <li class="flex items-baseline justify-between">
                                <span class="font-medium text-gray-700">Blow Dry</span>
                                <span class="price-dots"></span>
                                <span class="font-bold text-gray-800">Rp 25.000</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Card 3: Hair Body Care -->
                <div class="bg-white rounded-md shadow-sm border border-gray-100 overflow-hidden flex flex-col hover:shadow-md transition-shadow duration-300">
                    <img src="{{ asset('images/service-care.jpg') }}" alt="Layanan Hair Body Care" class="w-full h-44 object-cover">
                    <div class="p-6 flex-1 flex flex-col">
                        <h3 class="text-lg font-bold text-barber-red">Hair Body Care</h3>
                        <div class="w-8 h-0.5 bg-barber-red mt-1.5 mb-5"></div>

                        <ul class="space-y-3.5 text-xs text-gray-600 flex-1">
                            <li class="flex items-baseline justify-between">
                                <span class="font-medium text-gray-700">Face Mask</span>
                                <span class="price-dots"></span>
                                <span class="font-bold text-gray-800">Rp 35.000</span>
                            </li>
                            <li class="flex items-baseline justify-between">
                                <span class="font-medium text-gray-700">Head Massage</span>
                                <span class="price-dots"></span>
                                <span class="font-bold text-gray-800">Rp 30.000</span>
                            </li>
                            <li class="flex items-baseline justify-between">
                                <span class="font-medium text-gray-700">Hot Towel Shave</span>
                                <span class="price-dots"></span>
                                <span class="font-bold text-gray-800">Rp 30.000</span>
                            </li>
                            <li class="flex items-baseline justify-between">
                                <span class="font-medium text-gray-700">Beard Grooming</span>
                                <span class="price-dots"></span>
                                <span class="font-bold text-gray-800">Rp 45.000</span>
                            </li>
                            <li class="flex items-baseline justify-between">
                                <span class="font-medium text-gray-700">Full Package</span>
                                <span class="price-dots"></span>
                                <span class="font-bold text-gray-800">Rp 120.000</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. STYLE GALLERY ("Lebih banyak style") -->
    <section id="gallery" class="py-20 md:py-26 bg-white">
        <div class="max-w-5xl mx-auto px-6">
            <!-- Section Header -->
            <div class="text-center mb-12">
                <h2 class="text-2xl md:text-3xl font-bold text-barber-red tracking-tight">
                    Lebih banyak style
                </h2>
            </div>

            <!-- 3 Style Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 lg:gap-8">
                <!-- Style 1 -->
                <div class="group cursor-pointer">
                    <div class="overflow-hidden rounded-md shadow-sm">
                        <img src="{{ asset('images/style-crop.jpg') }}" alt="Textured Crop" class="w-full h-52 sm:h-56 md:h-64 object-cover object-top group-hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="mt-3 text-left">
                        <h4 class="text-xs md:text-sm font-bold text-gray-800">Textured Crop</h4>
                        <p class="text-xs font-semibold text-barber-red">Rp 45.000</p>
                    </div>
                </div>

                <!-- Style 2 -->
                <div class="group cursor-pointer">
                    <div class="overflow-hidden rounded-md shadow-sm">
                        <img src="{{ asset('images/style-fade.jpg') }}" alt="Low Skin Fade" class="w-full h-52 sm:h-56 md:h-64 object-cover object-top group-hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="mt-3 text-left">
                        <h4 class="text-xs md:text-sm font-bold text-gray-800">Low Skin Fade</h4>
                        <p class="text-xs font-semibold text-barber-red">Rp 40.000</p>
                    </div>
                </div>

                <!-- Style 3 -->
                <div class="group cursor-pointer">
                    <div class="overflow-hidden rounded-md shadow-sm">
                        <img src="{{ asset('images/style-beard.jpg') }}" alt="Beard Trim & Side Fade" class="w-full h-52 sm:h-56 md:h-64 object-cover object-top group-hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="mt-3 text-left">
                        <h4 class="text-xs md:text-sm font-bold text-gray-800">Beard Trim</h4>
                        <p class="text-xs font-semibold text-barber-red">Rp 50.000</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. MORE SERVICES SECTION -->
    <section class="py-20 md:py-24 bg-[#6e6e6e] text-white">
        <div class="max-w-5xl mx-auto px-6 text-center">
            <!-- Header -->
            <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold tracking-tight mb-2">
                More Services
            </h2>
            <p class="text-xs md:text-sm text-gray-200 opacity-90 max-w-lg mx-auto mb-14">
                Layanan ekstra kami hadirkan untuk melengkapi kenyamanan dan kesegaran Anda
            </p>

            <!-- 3 Red Circle Features -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-10">
                <!-- Service 1: Fast Cut -->
                <div class="flex flex-col items-center">
                    <div class="w-14 h-14 md:w-16 md:h-16 rounded-full bg-barber-red text-white flex items-center justify-center shadow-lg mb-4">
                        <!-- Clipper / Scissor Icon -->
                        <svg class="w-7 h-7 fill-current" viewBox="0 0 24 24">
                            <path d="M9.64 7.64c.23-.5.36-1.05.36-1.64 0-2.21-1.79-4-4-4S2 3.79 2 6s1.79 4 4 4c.59 0 1.14-.13 1.64-.36L10 12l-2.36 2.36C7.14 14.13 6.59 14 6 14c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4c0-.59-.13-1.14-.36-1.64L12 14l7 7h3v-1L9.64 7.64zM6 8c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm0 12c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-base font-bold mb-1.5">Fast Cut</h3>
                    <p class="text-xs text-gray-200 opacity-85 leading-relaxed max-w-xs">
                        Potong rambut efisien & presisi tanpa antre lama dengan hasil tetap maksimal.
                    </p>
                </div>

                <!-- Service 2: Tonic & Hair Wash -->
                <div class="flex flex-col items-center">
                    <div class="w-14 h-14 md:w-16 md:h-16 rounded-full bg-barber-red text-white flex items-center justify-center shadow-lg mb-4">
                        <!-- Hair Wash / Droplet Icon -->
                        <svg class="w-7 h-7 fill-current" viewBox="0 0 24 24">
                            <path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-base font-bold mb-1.5">Tonic & Hair Wash</h3>
                    <p class="text-xs text-gray-200 opacity-85 leading-relaxed max-w-xs">
                        Keramas bersih dengan air hangat dan pijatan tonic penyegar akar rambut.
                    </p>
                </div>

                <!-- Service 3: Shave -->
                <div class="flex flex-col items-center">
                    <div class="w-14 h-14 md:w-16 md:h-16 rounded-full bg-barber-red text-white flex items-center justify-center shadow-lg mb-4">
                        <!-- Razor / Blade Icon -->
                        <svg class="w-7 h-7 fill-current" viewBox="0 0 24 24">
                            <path d="M21 7.28V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v2.28c-.6.35-1 .99-1 1.72 0 1.1.9 2 2 2h.28l1.32 8.58C5.86 20.69 6.82 21.5 8 21.5h8c1.18 0 2.14-.81 2.4-1.92L19.72 11H20c1.1 0 2-.9 2-2 0-.73-.4-1.37-1-1.72zM5 5h14v2H5V5zm11.6 14.12c-.08.38-.4.88-.8.88H8.2c-.4 0-.72-.5-.8-.88L6.2 11h11.6l-1.2 8.12z"/>
                        </svg>
                    </div>
                    <h3 class="text-base font-bold mb-1.5">Shave</h3>
                    <p class="text-xs text-gray-200 opacity-85 leading-relaxed max-w-xs">
                        Cukur kumis dan jenggot halus dengan handuk hangat yang menenangkan kulit wajah.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. REVIEW DARI PELANGGAN KAMI -->
    <section class="py-20 md:py-26 bg-barber-bg">
        <div class="max-w-5xl mx-auto px-6">
            <!-- Header -->
            <div class="text-center mb-14">
                <h2 class="text-2xl md:text-3xl font-bold text- tracking-tight">
                    Review dari pelanggan kami
                </h2>
            </div>

            <!-- 3 Testimonial Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">
                <!-- Review 1 -->
                <div class="bg-white p-6 rounded-md shadow-sm border border-gray-100 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-3 mb-4">
                            <img src="{{ asset('images/avatar-1.jpg') }}" alt="Rahmat" class="w-10 h-10 rounded-full object-cover border border-gray-200">
                            <div>
                                <h4 class="text-xs font-bold text-gray-800">Rahmat</h4>
                                <div class="flex text-amber-400 text-[10px]">
                                    ★★★★★
                                </div>
                            </div>
                        </div>
                        <p class="text-xs text-gray-600 leading-relaxed">
                            Potongan rambutnya sangat rapi dan presisi. Barbernya ramah dan mau diajak diskusi model yang cocok untuk bentuk wajah saya. Tempatnya bersih dan nyaman!
                        </p>
                    </div>
                </div>

                <!-- Review 2 -->
                <div class="bg-white p-6 rounded-md shadow-sm border border-gray-100 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-3 mb-4">
                            <img src="{{ asset('images/avatar-2.jpg') }}" alt="Kurniawan" class="w-10 h-10 rounded-full object-cover border border-gray-200">
                            <div>
                                <h4 class="text-xs font-bold text-gray-800">Kurniawan</h4>
                                <div class="flex text-amber-400 text-[10px]">
                                    ★★★★★
                                </div>
                            </div>
                        </div>
                        <p class="text-xs text-gray-600 leading-relaxed">
                            Setiap potong di sini hasilnya tidak pernah mengecewakan. Hair tonic dan pijat kepalanya segar banget. Barbershop nomor satu di daerah ini.
                        </p>
                    </div>
                </div>

                <!-- Review 3 -->
                <div class="bg-white p-6 rounded-md shadow-sm border border-gray-100 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-3 mb-4">
                            <img src="{{ asset('images/avatar-3.jpg') }}" alt="Andiansyah" class="w-10 h-10 rounded-full object-cover border border-gray-200">
                            <div>
                                <h4 class="text-xs font-bold text-gray-800">Andiansyah</h4>
                                <div class="flex text-amber-400 text-[10px]">
                                    ★★★★★
                                </div>
                            </div>
                        </div>
                        <p class="text-xs text-gray-600 leading-relaxed">
                            Harga sangat bersahabat dengan pelayanan bintang lima. Teknik fade-nya halus sekali. Pasti akan jadi pelanggan langganan di Rusdi Barbershop.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 8. QUALITY HAIRCUT CTA BANNER -->
    <section class="py-16 bg-[#707070] text-white text-center border-t border-gray-600">
        <div class="max-w-3xl mx-auto px-6">
            <h2 class="text-2xl md:text-3xl font-bold tracking-tight mb-3">
                Quality Haircut
            </h2>
            <p class="text-xs md:text-sm text-gray-200 opacity-90 max-w-xl mx-auto mb-6 leading-relaxed">
                Nikmati potongan rambut berkualitas tinggi dengan harga bersahabat dan sentuhan tenaga profesional kami.
            </p>
            <button onclick="openBookingModal()" type="button" class="inline-flex items-center justify-center px-8 py-2.5 bg-barber-red hover:bg-barber-darkred text-white text-xs font-bold tracking-wider uppercase rounded-full shadow-lg transition-all duration-300 hover:scale-105 active:scale-95 cursor-pointer">
                GET AN APPOINTMENT
            </button>
        </div>
    </section>
@endsection