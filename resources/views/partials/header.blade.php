<!-- NAVIGATION BAR WITH SLIDING PILL NAVIGATION -->
<header id="main-header" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 py-3.5 sm:py-4 bg-transparent border-b border-transparent">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 flex items-center justify-between gap-4">
        
        <!-- Brand Logo -->
        <a href="{{ url('/') }}" class="flex items-center gap-2.5 text-white font-extrabold tracking-widest text-base sm:text-lg uppercase shrink-0 group">
            <span class="w-8 h-8 sm:w-9 sm:h-9 bg-barber-red rounded-xl text-white flex items-center justify-center shadow-md shadow-red-900/40 group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
                <i class="bi bi-scissors text-base sm:text-lg"></i>
            </span>
            <div class="flex flex-col text-left">
                <span class="font-black tracking-wider text-sm sm:text-base leading-none group-hover:text-zinc-200 transition-colors">BLACK CROWN</span>
                <span class="text-[9px] font-semibold text-zinc-400 tracking-[0.25em] leading-tight">BARBERSHOP</span>
            </div>
        </a>

        <!-- Desktop Sliding Pill Navigation Dock -->
        <nav id="slidingNav" class="relative hidden md:inline-flex items-center p-1 rounded-full bg-zinc-950/80 border border-white/10 backdrop-blur-xl shadow-lg shadow-black/40" aria-label="Main Navigation">
            <!-- Morphing / Sliding Animated Pill Indicator -->
            <div id="slidingPillIndicator" class="sliding-pill-indicator opacity-0"></div>

            <!-- Nav Pill Items -->
            <a href="{{ Request::is('/') ? '#home' : url('/#home') }}" data-target="home" class="nav-pill-item px-3.5 sm:px-4 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider text-zinc-400 hover:text-white flex items-center gap-1.5 select-none active-pill">
                <span>Home</span>
            </a>
            <a href="{{ Request::is('/') ? '#about' : url('/#about') }}" data-target="about" class="nav-pill-item px-3.5 sm:px-4 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider text-zinc-400 hover:text-white flex items-center gap-1.5 select-none">
                <span>About</span>
            </a>
            <a href="{{ Request::is('/') ? '#pricing' : url('/#pricing') }}" data-target="pricing" class="nav-pill-item px-3.5 sm:px-4 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider text-zinc-400 hover:text-white flex items-center gap-1.5 select-none">
                <span>Pricing</span>
            </a>
            <a href="{{ Request::is('/') ? '#katalog' : url('/#katalog') }}" data-target="katalog" class="nav-pill-item px-3.5 sm:px-4 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider text-zinc-400 hover:text-white flex items-center gap-1.5 select-none">
                <i class="bi bi-images text-[11px] opacity-80"></i>
                <span>Katalog</span>
            </a>
            <a href="{{ Request::is('/') ? '#testimoni' : url('/#testimoni') }}" data-target="testimoni" class="nav-pill-item px-3.5 sm:px-4 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider text-zinc-400 hover:text-white flex items-center gap-1.5 select-none">
                <span>Testimoni</span>
            </a>
        </nav>

        <!-- Desktop Action CTA Buttons -->
        <div class="hidden md:flex items-center gap-2.5 shrink-0">
            @auth
                <a href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : route('user.dashboard') }}" class="px-3.5 py-1.5 rounded-full text-xs font-semibold text-zinc-300 hover:text-white hover:bg-white/10 transition-all duration-200 flex items-center gap-1.5 border border-transparent hover:border-zinc-700">
                    <i class="bi bi-person-fill text-xs text-amber-400"></i>
                    <span>{{ auth()->user()->name }}</span>
                </a>
                <a href="{{ auth()->user()->role === 'admin' ? route('admin.booking.create') : route('user.booking.create') }}" class="btn-ripple px-4 py-2 rounded-full text-xs font-bold uppercase tracking-wider bg-white hover:bg-zinc-100 text-zinc-950 transition-all duration-200 shadow-md hover:shadow-lg hover:shadow-white/10 cursor-pointer flex items-center gap-1.5 group">
                    <i class="bi bi-calendar-check-fill text-xs text-barber-red group-hover:scale-110 transition-transform"></i>
                    <span>Book Now</span>
                </a>
            @else
                <a href="{{ route('login') }}" class="px-3.5 py-1.5 rounded-full text-xs font-semibold text-zinc-300 hover:text-white hover:bg-white/10 transition-all duration-200 flex items-center gap-1.5 border border-transparent hover:border-zinc-700">
                    <i class="bi bi-person-fill text-xs text-amber-400"></i>
                    <span>Login</span>
                </a>
                <a href="{{ route('login') }}" class="btn-ripple px-4 py-2 rounded-full text-xs font-bold uppercase tracking-wider bg-white hover:bg-zinc-100 text-zinc-950 transition-all duration-200 shadow-md hover:shadow-lg hover:shadow-white/10 cursor-pointer flex items-center gap-1.5 group">
                    <i class="bi bi-calendar-check-fill text-xs text-barber-red group-hover:scale-110 transition-transform"></i>
                    <span>Book Now</span>
                </a>
            @endauth
        </div>

        <!-- Mobile Controls (Quick Book CTA + Hamburger Toggle) -->
        <div class="flex md:hidden items-center gap-2">
            @auth
                <a href="{{ auth()->user()->role === 'admin' ? route('admin.booking.create') : route('user.booking.create') }}" class="px-3 py-1.5 rounded-full text-[11px] font-bold uppercase tracking-wider bg-barber-red text-white shadow-md shadow-red-900/30 flex items-center gap-1">
                    <i class="bi bi-scissors text-xs"></i>
                    <span>Book</span>
                </a>
            @else
                <a href="{{ route('login') }}" class="px-3 py-1.5 rounded-full text-[11px] font-bold uppercase tracking-wider bg-barber-red text-white shadow-md shadow-red-900/30 flex items-center gap-1">
                    <i class="bi bi-scissors text-xs"></i>
                    <span>Book</span>
                </a>
            @endauth
            <button id="mobileMenuBtn" type="button" class="text-white focus:outline-none p-1.5 rounded-xl hover:bg-white/10 text-2xl transition-colors" aria-label="Buka Menu Navigasi">
                <i id="mobileMenuIcon" class="bi bi-list leading-none"></i>
            </button>
        </div>
    </div>

    <!-- Mobile Drawer (starts hidden by default) -->
    <div id="mobileMenu" class="hidden md:hidden absolute top-full left-0 w-full bg-zinc-950/95 backdrop-blur-2xl border-b border-zinc-800 px-5 py-4 shadow-2xl transition-all duration-300">
        <div class="flex flex-col gap-3">
            <!-- Mobile Segmented Pill Navigation List -->
            <div class="p-1.5 rounded-2xl bg-zinc-900/90 border border-zinc-800/80 flex flex-col gap-1">
                <a href="{{ url('/#home') }}" data-target="home" class="mobile-nav-link flex items-center justify-between px-4 py-2.5 rounded-xl text-xs font-bold uppercase tracking-wider text-white bg-barber-red/20 border border-barber-red/30 transition-all">
                    <span class="flex items-center gap-2">
                        <i class="bi bi-house-door text-xs text-barber-red"></i>
                        Home
                    </span>
                    <i class="bi bi-chevron-right text-xs opacity-60"></i>
                </a>
                <a href="{{ url('/#about') }}" data-target="about" class="mobile-nav-link flex items-center justify-between px-4 py-2.5 rounded-xl text-xs font-medium uppercase tracking-wider text-zinc-400 hover:text-white hover:bg-white/5 transition-all">
                    <span class="flex items-center gap-2">
                        <i class="bi bi-info-circle text-xs"></i>
                        About
                    </span>
                    <i class="bi bi-chevron-right text-xs opacity-60"></i>
                </a>
                <a href="{{ url('/#pricing') }}" data-target="pricing" class="mobile-nav-link flex items-center justify-between px-4 py-2.5 rounded-xl text-xs font-medium uppercase tracking-wider text-zinc-400 hover:text-white hover:bg-white/5 transition-all">
                    <span class="flex items-center gap-2">
                        <i class="bi bi-tag text-xs"></i>
                        Pricing
                    </span>
                    <i class="bi bi-chevron-right text-xs opacity-60"></i>
                </a>
                <a href="{{ url('/#katalog') }}" data-target="katalog" class="mobile-nav-link flex items-center justify-between px-4 py-2.5 rounded-xl text-xs font-medium uppercase tracking-wider text-zinc-400 hover:text-white hover:bg-white/5 transition-all">
                    <span class="flex items-center gap-2">
                        <i class="bi bi-images text-xs text-barber-red"></i>
                        Katalog & Form Cukur
                    </span>
                    <i class="bi bi-chevron-right text-xs opacity-60"></i>
                </a>
                <a href="{{ url('/#testimoni') }}" data-target="testimoni" class="mobile-nav-link flex items-center justify-between px-4 py-2.5 rounded-xl text-xs font-medium uppercase tracking-wider text-zinc-400 hover:text-white hover:bg-white/5 transition-all">
                    <span class="flex items-center gap-2">
                        <i class="bi bi-chat-quote text-xs"></i>
                        Testimoni
                    </span>
                    <i class="bi bi-chevron-right text-xs opacity-60"></i>
                </a>
            </div>

            <!-- Auth & Action Buttons -->
            <div class="pt-1 flex flex-col gap-2">
                @auth
                    <a href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : route('user.dashboard') }}" class="w-full py-2.5 px-4 rounded-xl border border-zinc-800 text-xs font-bold text-amber-400 bg-zinc-900/60 flex items-center justify-center gap-2 hover:bg-zinc-800/80 transition-colors">
                        <i class="bi bi-person-fill text-sm"></i> Halo, {{ auth()->user()->name }}
                    </a>
                    <a href="{{ auth()->user()->role === 'admin' ? route('admin.booking.create') : route('user.booking.create') }}" class="w-full py-3 bg-barber-red hover:bg-barber-darkred text-white text-xs font-bold uppercase tracking-wider rounded-xl shadow-lg shadow-red-900/40 transition-colors flex items-center justify-center gap-2">
                        <i class="bi bi-scissors text-sm"></i> Book Appointment
                    </a>
                @else
                    <a href="{{ route('login') }}" class="w-full py-2.5 px-4 rounded-xl border border-zinc-800 text-xs font-bold text-amber-400 bg-zinc-900/60 flex items-center justify-center gap-2 hover:bg-zinc-800/80 transition-colors">
                        <i class="bi bi-person-fill text-sm"></i> Login Member Portal
                    </a>
                    <a href="{{ route('login') }}" class="w-full py-3 bg-barber-red hover:bg-barber-darkred text-white text-xs font-bold uppercase tracking-wider rounded-xl shadow-lg shadow-red-900/40 transition-colors flex items-center justify-center gap-2">
                        <i class="bi bi-scissors text-sm"></i> Book Appointment (Login Dulu)
                    </a>
                @endauth
            </div>
        </div>
    </div>
</header>
