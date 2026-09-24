<header class="admin-topbar">
    <div class="topbar-left">
        {{-- Mobile hamburger --}}
        <button type="button" id="openSidebarBtn" class="topbar-hamburger lg:hidden" onclick="openSidebar()" aria-label="Buka sidebar">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
        </button>

        {{-- Breadcrumb / Page Title --}}
        <div class="topbar-breadcrumb">
            <a href="{{ route('admin.dashboard') }}" class="topbar-breadcrumb-root">Admin</a>
            <svg class="topbar-breadcrumb-sep" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
            <span class="topbar-breadcrumb-current">@yield('page_title', 'Dashboard')</span>
        </div>
    </div>

    <div class="topbar-right">
        {{-- Store Status --}}
        <div class="topbar-status">
            <span class="topbar-status-dot"></span>
            <span class="hidden sm:inline">Buka · 10.00–21.00</span>
        </div>

        {{-- Quick action: New Booking --}}
        <a href="{{ route('admin.booking.create') }}" class="topbar-action-btn hidden sm:inline-flex" title="Input booking baru">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/><line x1="12" y1="14" x2="12" y2="18"/><line x1="10" y1="16" x2="14" y2="16"/></svg>
            <span>Booking Baru</span>
        </a>

        {{-- Logout --}}
        <form action="{{ route('logout') }}" method="POST" class="inline-flex">
            @csrf
            <button type="submit" class="topbar-logout-btn" title="Keluar">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                <span class="hidden sm:inline">Logout</span>
            </button>
        </form>
    </div>
</header>