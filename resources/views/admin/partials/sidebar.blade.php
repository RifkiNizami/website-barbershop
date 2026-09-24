<aside id="adminSidebar" class="admin-sidebar">
    {{-- Brand --}}
    <div class="sidebar-brand">
        <a href="{{ route('admin.dashboard') }}" class="sidebar-logo">
            <span class="sidebar-logo-icon">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M9.64 7.64c.23-.5.36-1.05.36-1.64C10 4.79 8.21 3 6 3S2 4.79 2 7s1.79 4 4 4c.59 0 1.14-.13 1.64-.36L10 13l-2.36 2.36C7.14 15.13 6.59 15 6 15c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4c0-.59-.13-1.14-.36-1.64L12 15l7 7h3v-1L9.64 7.64zM6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm0 12c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm6-7.5c-.28 0-.5-.22-.5-.5s.22-.5.5-.5.5.22.5.5-.22.5-.5.5zM19 3l-6 6 2 2 7-7V3h-3z"/></svg>
            </span>
            <div class="sidebar-logo-text">
                <span class="sidebar-logo-name">RUSDI</span>
                <span class="sidebar-logo-sub">Admin Panel</span>
            </div>
        </a>
        <button id="closeSidebarBtn" class="sidebar-close-btn lg:hidden" onclick="closeSidebar()" aria-label="Tutup sidebar">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
        </button>
    </div>

    {{-- Nav --}}
    <nav class="sidebar-nav">

        <div class="nav-group">
            <span class="nav-group-label">Utama</span>

            <a href="{{ route('admin.dashboard') }}"
               class="nav-link {{ request()->routeIs('admin.dashboard') ? 'nav-link--active' : '' }}">
                <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>
                <span>Dashboard</span>
            </a>
        </div>

        <div class="nav-group">
            <span class="nav-group-label">Operasional</span>

            <a href="{{ route('admin.booking.create') }}"
               class="nav-link {{ request()->routeIs('admin.booking.create') ? 'nav-link--active' : '' }}">
                <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/><line x1="12" y1="14" x2="12" y2="18"/><line x1="10" y1="16" x2="14" y2="16"/></svg>
                <span>Input Booking</span>
            </a>

            <a href="{{ route('admin.layanan.create') }}"
               class="nav-link {{ request()->routeIs('admin.layanan.create') ? 'nav-link--active' : '' }}">
                <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="16"/><line x1="8" y1="12" x2="16" y2="12"/></svg>
                <span>Tambah Layanan</span>
            </a>
        </div>

        <div class="nav-group">
            <span class="nav-group-label">Tugas & Demo</span>

            <a href="{{ route('admin.query.demo') }}"
               class="nav-link {{ request()->routeIs('admin.query.demo') ? 'nav-link--active' : '' }}">
                <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"/><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/></svg>
                <span>Demo ORM vs SQL</span>
            </a>
        </div>

        <div class="nav-group nav-group--bottom">
            <a href="{{ url('/') }}" target="_blank" class="nav-link nav-link--muted">
                <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                <span>Website</span>
                <svg class="ml-auto w-3 h-3 opacity-40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
            </a>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="nav-link nav-link--danger w-full text-left cursor-pointer">
                    <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                    <span>Keluar</span>
                </button>
            </form>
        </div>

    </nav>

    {{-- Profile Footer --}}
    <div class="sidebar-profile">
        <div class="sidebar-profile-avatar">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
        </div>
        <div class="sidebar-profile-info">
            <p class="sidebar-profile-name">Administrator</p>
            <p class="sidebar-profile-email">admin@rusdibarbershop.id</p>
        </div>
        <span class="sidebar-profile-status" title="Online"></span>
    </div>
</aside>