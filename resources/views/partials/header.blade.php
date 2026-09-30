<!-- NAVIGATION BAR -->
<header id="main-header" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 py-4 bg-transparent border-b border-transparent">
    <div class="max-w-6xl mx-auto px-6 flex items-center justify-between">
        <!-- Brand Logo -->
        <a href="{{ url('/') }}" class="flex items-center gap-2.5 text-white font-extrabold tracking-widest text-lg md:text-xl uppercase group">
            <span class="p-1.5 bg-barber-red rounded text-white flex items-center justify-center shadow-md group-hover:scale-110 transition-transform duration-300">
                <i class="bi bi-scissors text-lg"></i>
            </span>
            <span class="group-hover:text-gray-200 transition-colors duration-300">BLACK CROWN BARBER</span>
        </a>

        <!-- Desktop Nav Links -->
        <nav class="hidden md:flex items-center gap-7 text-sm font-medium tracking-wide">
            <a href="#home" class="text-white hover:text-barber-red transition duration-200">Home</a>
            <a href="#about" class="text-gray-300 hover:text-white transition duration-200">About</a>
            <a href="#katalog" class="text-white bg-barber-red/20 px-3 py-1 rounded-full border border-barber-red/40 hover:bg-barber-red hover:text-white transition duration-200 flex items-center gap-1.5 font-semibold">
                <i class="bi bi-images text-xs"></i> Katalog Foto
            </a>
            <a href="#pricing" class="text-gray-300 hover:text-white transition duration-200">Pricing</a>
            <a href="#contact" class="text-gray-300 hover:text-white transition duration-200">Testimoni</a>
            <a href="{{ route('login') }}" class="text-gray-300 hover:text-white transition duration-200">Login</a>
        </nav>

        <!-- Mobile Menu Toggle Button -->
        <button id="mobileMenuBtn" type="button" class="md:hidden text-white focus:outline-none p-1.5 hover:text-barber-red transition-colors" aria-label="Buka Menu">
            <i class="bi bi-list text-3xl"></i>
        </button>
    </div>

    <!-- Mobile Drawer (starts hidden by default) -->
    <div id="mobileMenu" class="hidden md:hidden absolute top-full left-0 w-full bg-barber-black/95 backdrop-blur-md border-b border-gray-800 px-6 py-6 flex flex-col gap-4 text-center shadow-2xl">
        <a href="{{ url('/#home') }}" class="text-white py-1 font-semibold mobile-link">Home</a>
        <a href="{{ url('/#about') }}" class="text-gray-300 hover:text-white py-1 mobile-link">About</a>
        <a href="{{ url('/#katalog') }}" class="text-white bg-barber-red/30 border border-barber-red/50 py-2.5 rounded-xl font-bold mobile-link flex items-center justify-center gap-2">
            <i class="bi bi-images text-sm text-barber-red"></i> Katalog & Form Model Rambut
        </a>
        <a href="{{ url('/#pricing') }}" class="text-gray-300 hover:text-white py-1 mobile-link">Pricing</a>
        <a href="{{ url('/#contact') }}" class="text-gray-300 hover:text-white py-1 mobile-link">Testimoni</a>
        <a href="{{ route('login') }}" class="text-amber-400 font-bold py-2 mobile-link border-t border-gray-800 flex items-center justify-center gap-2 mt-1">
            <i class="bi bi-person-fill text-lg"></i> Login Member Portal
        </a>
        <button onclick="openBookingModal()" class="mt-2 w-full py-3 bg-barber-red text-white font-semibold rounded-full shadow-lg hover:bg-barber-darkred transition-colors">
            Book Appointment
        </button>
    </div>
</header>
