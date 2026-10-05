{{-- SIDEBAR MEMBER WRAPPER (Full Height Fixed) --}}
<aside id="userSidebar"
    class="fixed top-0 bottom-0 left-0 z-40 w-60 h-screen bg-user-surface text-user-muted flex flex-col justify-between transition-transform duration-300 transform -translate-x-full lg:translate-x-0 border-r border-white/[0.06] overflow-hidden select-none">

    {{-- Top Portion --}}
    <div class="flex flex-col flex-1 overflow-y-auto">

        {{-- Sidebar Brand Header --}}
        <div class="h-16 px-5 flex items-center justify-between border-b border-white/[0.06] bg-user-surface shrink-0">
            <a href="{{ route('user.dashboard') }}" class="flex items-center gap-2.5 group">
                <span
                    class="w-8 h-8 rounded-lg bg-white/[0.04] border border-white/[0.08] flex items-center justify-center text-user-gold group-hover:border-user-gold/40 transition-colors">
                    <i class="bi bi-scissors text-sm"></i>
                </span>
                <div class="flex flex-col">
                    <span class="text-xs font-semibold text-user-text tracking-wider uppercase leading-tight">Black
                        Round Barbershop</span>
                    <span class="text-[10px] text-user-muted leading-tight">Gentleman Lounge</span>
                </div>
            </a>

            {{-- Mobile Close Button --}}
            <button type="button" id="closeUserSidebarBtn"
                class="lg:hidden text-user-muted hover:text-user-text p-1 rounded-lg hover:bg-white/[0.05]"
                aria-label="Tutup Sidebar">
                <i class="bi bi-x-lg text-base"></i>
            </button>
        </div>

        {{-- Navigation Menu Links --}}
        <div class="flex-1 px-3 py-5 space-y-5">

            {{-- Member Portal --}}
            <div>
                <p class="px-2.5 text-[10px] font-medium uppercase tracking-widest text-user-dim mb-2">Member Area</p>
                <nav class="space-y-1">
                    {{-- Dashboard --}}
                    <a href="{{ route('user.dashboard') }}"
                        class="flex items-center gap-2.5 px-2.5 py-2 rounded-lg text-xs font-medium transition-colors {{ request()->routeIs('user.dashboard') ? 'bg-user-gold/10 text-user-gold' : 'text-user-muted hover:text-user-text hover:bg-white/[0.03]' }}">
                        <i
                            class="bi bi-grid-1x2 text-sm {{ request()->routeIs('user.dashboard') ? 'text-user-gold' : 'text-user-muted' }}"></i>
                        <span>Dashboard Saya</span>
                    </a>

                    {{-- Form Reservasi Cukur --}}
                    <a href="{{ route('user.booking.create') }}"
                        class="flex items-center gap-2.5 px-2.5 py-2 rounded-lg text-xs font-medium transition-colors {{ request()->routeIs('user.booking.create') ? 'bg-user-gold/10 text-user-gold' : 'text-user-muted hover:text-user-text hover:bg-white/[0.03]' }}">
                        <i
                            class="bi bi-calendar-check text-sm {{ request()->routeIs('user.booking.create') ? 'text-user-gold' : 'text-user-muted' }}"></i>
                        <span>Reservasi Cukur</span>
                    </a>

                    {{-- Riwayat Cukur --}}
                    <a href="{{ route('user.bookings.index') }}"
                        class="flex items-center gap-2.5 px-2.5 py-2 rounded-lg text-xs font-medium transition-colors {{ request()->routeIs('user.bookings.index') ? 'bg-user-gold/10 text-user-gold' : 'text-user-muted hover:text-user-text hover:bg-white/[0.03]' }}">
                        <i
                            class="bi bi-clock-history text-sm {{ request()->routeIs('user.bookings.index') ? 'text-user-gold' : 'text-user-muted' }}"></i>
                        <span>Riwayat Cukur</span>
                    </a>
                </nav>
            </div>

            {{-- Navigasi & Logout --}}
            <div>
                <p class="px-2.5 text-[10px] font-medium uppercase tracking-widest text-user-dim mb-2">Navigasi</p>
                <nav class="space-y-1">
                    <a href="{{ url('/') }}"
                        class="flex items-center gap-2.5 px-2.5 py-2 rounded-lg text-xs font-medium text-user-muted hover:text-user-text hover:bg-white/[0.03] transition-colors">
                        <i class="bi bi-house text-sm"></i>
                        <span>Website Utama</span>
                    </a>

                    <form action="{{ route('logout') }}" method="POST" class="w-full">
                        @csrf
                        <button type="submit"
                            class="w-full flex items-center gap-2.5 px-2.5 py-2 rounded-lg text-xs font-medium text-red-400 hover:text-red-300 hover:bg-red-500/10 transition-colors text-left cursor-pointer">
                            <i class="bi bi-box-arrow-right text-sm"></i>
                            <span>Logout / Keluar</span>
                        </button>
                    </form>
                </nav>
            </div>

        </div>
    </div>

    {{-- Bottom Portion: Compact & Elegant Loyalty Stamps Widget --}}
    <div class="p-3 border-t border-white/[0.06] bg-user-surface shrink-0">
        <div class="p-3 rounded-xl bg-user-card border border-white/[0.06]">
            <div class="flex items-center justify-between text-xs font-medium text-user-text mb-1.5">
                <span class="flex items-center gap-1.5 text-[11px] text-user-muted">
                    <i class="bi bi-award text-user-gold"></i> Loyalty Stamps
                </span>
                <span class="text-[11px] font-mono font-semibold text-user-gold">7/10</span>
            </div>
            <div class="w-full bg-user-input rounded-full h-1.5 overflow-hidden">
                <div class="user-sidebar-loyalty-bar bg-user-gold h-1.5 rounded-full"></div>
            </div>
            <p class="text-[10px] text-user-muted mt-1.5 leading-snug">
                3 visits remaining to unlock free grooming
            </p>
        </div>
    </div>
</aside>

{{-- Mobile Backdrop --}}
<div id="userSidebarBackdrop"
    class="fixed inset-0 bg-black/70 z-30 hidden lg:hidden backdrop-blur-xs transition-opacity duration-300"></div>