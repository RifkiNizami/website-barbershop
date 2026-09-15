<!-- NAVIGATION BAR -->
<header class="absolute top-0 left-0 right-0 z-50 transition-all duration-300">
    <div class="max-w-6xl mx-auto px-6 py-6 flex items-center justify-between">
        <!-- Brand Logo -->
        <a href="#home" class="flex items-center gap-2.5 text-white font-extrabold tracking-widest text-lg md:text-xl uppercase group">
            <span class="p-1.5 bg-barber-red rounded text-white flex items-center justify-center shadow-md group-hover:scale-105 transition-transform">
                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                    <path d="M9.64 7.64c.23-.5.36-1.05.36-1.64 0-2.21-1.79-4-4-4S2 3.79 2 6s1.79 4 4 4c.59 0 1.14-.13 1.64-.36L10 12l-2.36 2.36C7.14 14.13 6.59 14 6 14c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4c0-.59-.13-1.14-.36-1.64L12 14l7 7h3v-1L9.64 7.64zM6 8c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm0 12c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm6-7.5c-.28 0-.5-.22-.5-.5s.2２-.5.5-.5.5.２２.5.5-.２２.5-.5.5zM19 3l-6 6 ２ ２ 7-7V3h-3z"/>
                </svg>
            </span>
            <span>RUSDI BARBER</span>
        </a>

        <!-- Desktop Nav Links -->
        <nav class="hidden md:flex items-center gap-8 text-sm font-medium tracking-wide">
    <a href="#home" class="text-white border-b-2 border-barber-red pb-0.5 font-semibold">Home</a>
    <a href="#about" class="text-gray-300 hover:text-white transition duration-200">About</a>
    <a href="#pricing" class="text-gray-300 hover:text-white transition duration-200">Services</a>
    <a href="#pricing" class="text-gray-300 hover:text-white transition duration-200">Pricing</a>
    <a href="#gallery" class="text-gray-300 hover:text-white transition duration-200">Blog</a>
    <a href="#contact" class="text-gray-300 hover:text-white transition duration-200">Contact</a>
    <a href="/login" class="text-gray-300 hover:text-white transition duration-200">Login</a>
</nav>

        <!-- Mobile Menu Toggle Button -->
        <button id="mobileMenuBtn" type="button" class="md:hidden text-white focus:outline-none p-1.5" aria-label="Buka Menu">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
    </div>

    <!-- Mobile Drawer -->
    <div id="mobileMenu" class="md:hidden bg-barber-black/95 backdrop-blur-md border-b border-gray-800 px-6 py-4 flex flex-col gap-4 text-center">
        <a href="#home" class="text-white py-1 font-semibold border-b border-barber-red/50 mobile-link">Home</a>
        <a href="#about" class="text-gray-300 hover:text-white py-1 mobile-link">About</a>
        <a href="#pricing" class="text-gray-300 hover:text-white py-1 mobile-link">Services</a>
        <a href="#pricing" class="text-gray-300 hover:text-white py-1 mobile-link">Pricing</a>
        <a href="#gallery" class="text-gray-300 hover:text-white py-1 mobile-link">Blog</a>
        <a href="#contact" class="text-gray-300 hover:text-white py-1 mobile-link">Contact</a>
        <button onclick="openBookingModal()" class="mt-2 w-full py-2.5 bg-barber-red text-white font-semibold rounded-full shadow">
            Book Appointment
        </button>
    </div>
</header>
