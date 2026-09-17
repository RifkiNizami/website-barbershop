{{-- TOP NAVBAR MEMBER --}}
<header class="h-16 bg-slate-950/90 backdrop-blur-md border-b border-slate-800/80 sticky top-0 z-20 flex items-center justify-between px-4 sm:px-6 lg:px-8 shrink-0">
    
    {{-- Left Section: Mobile Toggle & Page Title --}}
    <div class="flex items-center gap-3">
        <button type="button" id="openUserSidebarBtn" class="lg:hidden p-2 rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white focus:outline-none" aria-label="Buka Menu">
            <i class="bi bi-list text-xl"></i>
        </button>

        <div class="flex items-center gap-2">
            <span class="text-xs font-bold uppercase tracking-wider text-amber-400 bg-amber-500/10 px-2.5 py-1 rounded-lg border border-amber-500/20 hidden sm:inline-flex items-center gap-1">
                <i class="bi bi-star-fill text-amber-400"></i> Member Lounge
            </span>
            <span class="text-slate-600 hidden sm:inline-block">/</span>
            <h1 class="text-base sm:text-lg font-bold text-white tracking-tight">
                @yield('page_title', 'Dashboard Member')
            </h1>
        </div>
    </div>

    {{-- Right Section: Booking CTA & Member Profile Pill --}}
    <div class="flex items-center gap-3">
        
        {{-- Quick CTA: Booking Cukur --}}
        <a href="{{ route('user.booking.create') }}" class="inline-flex items-center gap-1.5 px-4 py-2 text-xs font-bold uppercase tracking-wider bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-400 hover:to-amber-500 text-slate-950 rounded-xl transition-all shadow-md shadow-amber-500/20">
            <i class="bi bi-calendar-plus-fill"></i>
            Booking Cukur
        </a>

        {{-- Member Mini Profile Pill --}}
        <div class="flex items-center gap-2.5 pl-3 border-l border-slate-800">
            <div class="w-8 h-8 rounded-full bg-gradient-to-tr from-amber-500 to-amber-300 text-slate-950 flex items-center justify-center font-bold text-xs shadow-xs">
                DP
            </div>
            <div class="hidden md:flex flex-col text-left leading-tight">
                <span class="text-xs font-bold text-white">Dimas Pratama</span>
                <span class="text-[10px] text-amber-400 font-semibold flex items-center gap-1">
                    <i class="bi bi-patch-check-fill"></i> Gold VIP Member
                </span>
            </div>
        </div>

    </div>

</header>
