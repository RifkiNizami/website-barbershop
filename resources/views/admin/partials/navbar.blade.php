{{-- TOP NAVBAR ADMIN --}}
<header class="h-16 bg-slate-950/90 backdrop-blur-md border-b border-slate-800/80 sticky top-0 z-20 flex items-center justify-between px-4 sm:px-6 lg:px-8 shrink-0">
    
    {{-- Left Section: Mobile Toggle & Page Header --}}
    <div class="flex items-center gap-3">
        <button type="button" id="openSidebarBtn" class="lg:hidden p-2 rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white focus:outline-none" aria-label="Buka Menu Sidebar">
            <i class="bi bi-list text-xl"></i>
        </button>

        <div class="flex items-center gap-2">
            <span class="text-xs font-bold uppercase tracking-wider text-red-400 bg-red-500/10 px-2.5 py-1 rounded-lg border border-red-500/20 hidden sm:inline-flex items-center gap-1">
                <i class="bi bi-shield-lock-fill"></i> Admin Panel
            </span>
            <span class="text-slate-600 hidden sm:inline-block">/</span>
            <h1 class="text-base sm:text-lg font-bold text-white tracking-tight">
                @yield('page_title', 'Dashboard Overview')
            </h1>
        </div>
    </div>

    {{-- Right Section: Quick Actions, Live Status & Logout --}}
    <div class="flex items-center gap-3">
        
        {{-- Quick Action: Tambah Booking --}}
        <a href="{{ route('admin.booking.create') }}" class="hidden sm:inline-flex items-center gap-1.5 px-3.5 py-2 text-xs font-bold uppercase tracking-wider bg-slate-800 hover:bg-slate-700 text-white rounded-xl transition-all shadow-sm border border-slate-700">
            <i class="bi bi-calendar-plus text-red-500"></i>
            Booking Baru
        </a>

        {{-- Quick Action: Tambah Layanan --}}
        <a href="{{ route('admin.layanan.create') }}" class="hidden md:inline-flex items-center gap-1.5 px-3.5 py-2 text-xs font-bold uppercase tracking-wider bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white rounded-xl transition-all shadow-md shadow-red-600/20">
            <i class="bi bi-plus-lg"></i>
            Tambah Layanan
        </a>

        {{-- Logout Button Form --}}
        <form action="{{ route('logout') }}" method="POST" class="inline-flex">
            @csrf
            <button type="submit" class="inline-flex items-center gap-1.5 px-3.5 py-2 text-xs font-bold uppercase tracking-wider bg-red-950/60 hover:bg-red-900 border border-red-800/60 text-red-200 rounded-xl transition-all cursor-pointer">
                <i class="bi bi-box-arrow-right text-red-400 text-sm"></i>
                <span>Logout</span>
            </button>
        </form>

    </div>

</header>
