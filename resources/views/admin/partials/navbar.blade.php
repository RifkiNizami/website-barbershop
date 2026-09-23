<header class="bg-slate-900 border-b border-slate-800 h-16 px-4 md:px-6 flex items-center justify-between">
    <!-- Breadcrumb & Mobile Toggle -->
    <div class="flex items-center gap-3">
        <button id="sidebarToggle" class="md:hidden text-slate-400 hover:text-white p-1">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
        </button>
        <div class="flex items-center gap-2 text-xs font-medium">
            <span class="px-2 py-0.5 rounded bg-red-950 text-red-400 border border-red-900/50">ADMIN PANEL</span>
            <span class="text-slate-600">/</span>
            <span class="text-slate-300">Ringkasan Dashboard</span>
        </div>
    </div>

    <!-- Quick Action Buttons (Bersih & Proporsional) -->
    <div class="flex items-center gap-3">
        <a href="{{ route('admin.bookings.create') }}" class="px-3 py-1.5 text-xs font-semibold text-white bg-red-600 hover:bg-red-700 rounded transition-colors flex items-center gap-1.5">
            <span>+</span> Booking Baru
        </a>
    </div>
</header>