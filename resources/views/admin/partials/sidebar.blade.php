<aside id="sidebar" class="w-64 bg-slate-900 border-r border-slate-800 flex-shrink-0 flex flex-col justify-between min-h-screen transition-transform duration-200 ease-in-out md:translate-x-0 md:relative z-40">
    <div>
        <!-- Brand / Logo Section -->
        <div class="p-5 border-b border-slate-800 flex items-center gap-3">
            <div class="w-8 h-8 rounded bg-red-600 flex items-center justify-center text-white font-bold text-lg">
                👑
            </div>
            <div>
                <h2 class="text-base font-bold text-white tracking-wide">BLACK CROWN</h2>
                <p class="text-[10px] text-slate-400 uppercase tracking-widest">Management Suite</p>
            </div>
        </div>

        <!-- Navigation Links -->
        <nav class="p-4 space-y-1">
            <div class="text-[10px] font-semibold text-slate-500 uppercase tracking-wider mb-2 px-3">Menu Utama</div>

            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium rounded-md bg-red-600/10 text-red-500 border border-red-600/20">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 00-1-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 00-1 1m-6 0h6"></path></svg>
                Dashboard Overview
            </a>

            <a href="{{ route('admin.bookings.create') }}" class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium rounded-md text-slate-400 hover:bg-slate-800 hover:text-white transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Input Booking Baru
            </a>

            <a href="{{ route('admin.services.create') }}" class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium rounded-md text-slate-400 hover:bg-slate-800 hover:text-white transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                Form Tambah Layanan
            </a>
        </nav>
    </div>

    <!-- User Profile Bottom -->
    <div class="p-4 border-t border-slate-800 flex items-center justify-between">
        <div class="truncate">
            <p class="text-sm font-semibold text-white truncate">Administrator</p>
            <p class="text-xs text-slate-400 truncate">admin@blackcrown.com</p>
        </div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="p-1.5 text-slate-400 hover:text-red-400 rounded-md hover:bg-slate-800 transition-colors" title="Logout">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
            </button>
        </form>
    </div>
</aside>