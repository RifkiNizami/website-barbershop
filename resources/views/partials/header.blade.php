<!-- NAVIGATION BAR -->
<header id="main-header" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 py-4 bg-transparent border-b border-transparent">
    <div class="max-w-6xl mx-auto px-6 flex items-center justify-between">
        <!-- Brand Logo -->
        <a href="{{ url('/') }}" class="flex items-center gap-2.5 text-white font-extrabold tracking-widest text-lg md:text-xl uppercase group">
            <span class="p-1.5 bg-barber-red rounded text-white flex items-center justify-center shadow-md group-hover:scale-110 transition-transform duration-300">
                <i class="bi bi-scissors text-lg"></i>
            </span>
            <span class="group-hover:text-gray-200 transition-colors duration-300">RUSDI BARBER</span>
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
        <button id="mobileMenuBtn" type="button" class="md:hidden text-white focus:outline-none p-1.5 hover:text-barber-red transition-colors" aria-label="Buka Menu">
            <i class="bi bi-list text-3xl"></i>
        </button>
    </div>

    <!-- Mobile Drawer -->
    <div id="mobileMenu" class="md:hidden absolute top-full left-0 w-full bg-barber-black/95 backdrop-blur-md border-b border-gray-800 px-6 py-6 flex flex-col gap-5 text-center shadow-xl">
        <a href="{{ url('/#home') }}" class="text-white py-1 font-semibold border-b border-barber-red/50 mobile-link">Home</a>
        <a href="{{ url('/#about') }}" class="text-gray-300 hover:text-white py-1 mobile-link">About</a>
        <a href="{{ url('/#pricing') }}" class="text-gray-300 hover:text-white py-1 mobile-link">Services & Pricing</a>
        <a href="{{ url('/#gallery') }}" class="text-gray-300 hover:text-white py-1 mobile-link">Gallery</a>
        <a href="{{ route('user.login') }}" class="text-amber-400 font-bold py-2 mobile-link border-t border-gray-800 flex items-center justify-center gap-2 mt-2">
            <i class="bi bi-person-fill text-lg"></i> Login Member Portal
        </a>
        <button onclick="openBookingModal()" class="mt-2 w-full py-3 bg-barber-red text-white font-semibold rounded-full shadow-lg hover:bg-barber-darkred transition-colors">
            Book Appointment
        </button>
    </div>
</header>
