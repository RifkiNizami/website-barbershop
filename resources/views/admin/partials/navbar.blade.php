{{-- TOP NAVBAR --}}
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

    {{-- Right Section: Quick Actions & Live Status --}}
    <div class="flex items-center gap-3">
        
        {{-- Quick Action: Tambah Booking --}}
        <a href="{{ route('admin.booking.create') }}" class="hidden sm:inline-flex items-center gap-1.5 px-3.5 py-2 text-xs font-bold uppercase tracking-wider bg-slate-800 hover:bg-slate-700 text-white rounded-xl transition-all shadow-sm border border-slate-700">
            <i class="bi bi-calendar-plus text-red-500"></i>
            Booking Baru
        </a>

        {{-- Quick Action: Tambah Layanan --}}
        <a href="{{ route('admin.layanan.create') }}" class="inline-flex items-center gap-1.5 px-3.5 py-2 text-xs font-bold uppercase tracking-wider bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white rounded-xl transition-all shadow-md shadow-red-600/20">
            <i class="bi bi-plus-lg"></i>
            Tambah Layanan
        </a>

        {{-- Live Status Pill --}}
        <div class="flex items-center gap-2 pl-3 border-l border-slate-800">
            <div class="w-8 h-8 rounded-xl bg-slate-900 text-amber-400 flex items-center justify-center font-bold text-sm border border-slate-800">
                <i class="bi bi-scissors"></i>
            </div>
            <div class="hidden md:flex flex-col text-left leading-tight">
                <span class="text-xs font-bold text-white">Rusdi Master</span>
                <span class="text-[10px] text-emerald-400 font-semibold flex items-center gap-1">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                    Direct Mode
                </span>
            </div>
        </div>

    </div>

</header>
