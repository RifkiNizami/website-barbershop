<!-- NAVIGATION BAR -->
<header class="absolute top-0 left-0 right-0 z-50 transition-all duration-300">
    <div class="max-w-6xl mx-auto px-6 py-6 flex items-center justify-between">
        <!-- Brand Logo -->
        <a href="{{ url('/') }}" class="flex items-center gap-2.5 text-white font-extrabold tracking-widest text-lg md:text-xl uppercase group">
            <span class="p-1.5 bg-barber-red rounded text-white flex items-center justify-center shadow-md group-hover:scale-105 transition-transform">
                <i class="bi bi-scissors text-lg"></i>
            </span>
            <span>RUSDI BARBER</span>
        </a>

        <!-- Desktop Nav Links -->
        <nav class="hidden md:flex items-center gap-8 text-sm font-medium tracking-wide">
            <a href="{{ url('/#home') }}" class="text-white border-b-2 border-barber-red pb-0.5 font-semibold">Home</a>
            <a href="{{ url('/#about') }}" class="text-gray-300 hover:text-white transition duration-200">About</a>
            <a href="{{ url('/#pricing') }}" class="text-gray-300 hover:text-white transition duration-200">Services</a>
            <a href="{{ url('/#pricing') }}" class="text-gray-300 hover:text-white transition duration-200">Pricing</a>
            <a href="{{ url('/#gallery') }}" class="text-gray-300 hover:text-white transition duration-200">Blog</a>
            <a href="{{ url('/#contact') }}" class="text-gray-300 hover:text-white transition duration-200">Contact</a>
            <a href="{{ route('user.login') }}" class="inline-flex items-center gap-1.5 px-4 py-1.5 rounded-full bg-amber-500 hover:bg-amber-400 text-gray-950 font-bold text-xs uppercase tracking-wider transition duration-200 shadow-md">
                <i class="bi bi-person-fill"></i> Login Member
            </a>
        </nav>

        <!-- Mobile Menu Toggle Button -->
        <button id="mobileMenuBtn" type="button" class="md:hidden text-white focus:outline-none p-1.5" aria-label="Buka Menu">
            <i class="bi bi-list text-2xl"></i>
        </button>
    </div>

    <!-- Mobile Drawer -->
    <div id="mobileMenu" class="md:hidden bg-barber-black/95 backdrop-blur-md border-b border-gray-800 px-6 py-4 flex flex-col gap-4 text-center">
        <a href="{{ url('/#home') }}" class="text-white py-1 font-semibold border-b border-barber-red/50 mobile-link">Home</a>
        <a href="{{ url('/#about') }}" class="text-gray-300 hover:text-white py-1 mobile-link">About</a>
        <a href="{{ url('/#pricing') }}" class="text-gray-300 hover:text-white py-1 mobile-link">Services</a>
        <a href="{{ url('/#pricing') }}" class="text-gray-300 hover:text-white py-1 mobile-link">Pricing</a>
        <a href="{{ url('/#gallery') }}" class="text-gray-300 hover:text-white py-1 mobile-link">Blog</a>
        <a href="{{ url('/#contact') }}" class="text-gray-300 hover:text-white py-1 mobile-link">Contact</a>
        <a href="{{ route('user.login') }}" class="text-amber-400 font-bold py-2 mobile-link border-t border-gray-800 flex items-center justify-center gap-1">
            <i class="bi bi-person-fill"></i> Login Member Portal
        </a>
        <button onclick="openBookingModal()" class="mt-1 w-full py-2.5 bg-barber-red text-white font-semibold rounded-full shadow">
            Book Appointment
        </button>
    </div>
</header>