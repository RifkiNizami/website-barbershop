{{-- SIDEBAR MEMBER WRAPPER (Full Height Fixed) --}}
<aside id="userSidebar" class="fixed top-0 bottom-0 left-0 z-40 w-64 h-screen bg-slate-950 text-slate-300 flex flex-col justify-between transition-transform duration-300 transform -translate-x-full lg:translate-x-0 border-r border-slate-800/80 shadow-2xl overflow-hidden">
    
    {{-- Top Portion --}}
    <div class="flex flex-col flex-1 overflow-y-auto">
        
        {{-- Sidebar Brand Header --}}
        <div class="h-16 px-6 flex items-center justify-between border-b border-slate-800/80 bg-slate-950/90 shrink-0">
            <a href="{{ route('user.dashboard') }}" class="flex items-center gap-3 font-black tracking-wider text-white uppercase text-base group">
                <span class="w-9 h-9 rounded-xl bg-gradient-to-tr from-amber-500 to-amber-400 flex items-center justify-center text-slate-950 shadow-md shadow-amber-500/20 group-hover:scale-105 transition-transform">
                    <i class="bi bi-scissors text-lg"></i>
                </span>
                <div class="flex flex-col">
                    <span class="leading-tight text-sm font-extrabold text-amber-400 tracking-wide">GENTLEMAN CLUB</span>
                    <span class="text-[10px] text-slate-400 font-medium tracking-normal capitalize">Rusdi Barbershop</span>
                </div>
            </a>

            {{-- Mobile Close Button --}}
            <button type="button" id="closeUserSidebarBtn" class="lg:hidden text-slate-400 hover:text-white p-1 rounded-lg hover:bg-slate-800" aria-label="Tutup Sidebar">
                <i class="bi bi-x-lg text-lg"></i>
            </button>
        </div>

        {{-- Navigation Menu Links --}}
        <div class="flex-1 px-4 py-6 space-y-6">
            
            {{-- Member Portal --}}
            <div>
                <p class="px-3 text-[11px] font-bold text-slate-400 uppercase tracking-widest mb-2.5">Member Area</p>
                <nav class="space-y-1.5">
                    {{-- Dashboard --}}
                    <a href="{{ route('user.dashboard') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold transition-all duration-150 {{ request()->routeIs('user.dashboard') ? 'bg-gradient-to-r from-amber-500 to-amber-600 text-slate-950 font-bold shadow-lg shadow-amber-500/20' : 'text-slate-300 hover:bg-slate-900 hover:text-white' }}">
                        <i class="bi bi-grid-1x2-fill text-base {{ request()->routeIs('user.dashboard') ? 'text-slate-950' : 'text-amber-500' }}"></i>
                        <span>Dashboard Saya</span>
                    </a>

                    {{-- Form Reservasi Cukur --}}
                    <a href="{{ route('user.booking.create') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold transition-all duration-150 {{ request()->routeIs('user.booking.create') ? 'bg-gradient-to-r from-amber-500 to-amber-600 text-slate-950 font-bold shadow-lg shadow-amber-500/20' : 'text-slate-300 hover:bg-slate-900 hover:text-white' }}">
                        <i class="bi bi-calendar-check text-base {{ request()->routeIs('user.booking.create') ? 'text-slate-950' : 'text-amber-500' }}"></i>
                        <span>Reservasi Cukur</span>
                    </a>

                    {{-- Riwayat Cukur --}}
                    <a href="{{ route('user.bookings.index') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold transition-all duration-150 {{ request()->routeIs('user.bookings.index') ? 'bg-gradient-to-r from-amber-500 to-amber-600 text-slate-950 font-bold shadow-lg shadow-amber-500/20' : 'text-slate-300 hover:bg-slate-900 hover:text-white' }}">
                        <i class="bi bi-clock-history text-base {{ request()->routeIs('user.bookings.index') ? 'text-slate-950' : 'text-amber-500' }}"></i>
                        <span>Riwayat Cukur</span>
                    </a>
                </nav>
            </div>

            {{-- Navigasi & Logout --}}
            <div>
                <p class="px-3 text-[11px] font-bold text-slate-400 uppercase tracking-widest mb-2.5">Autentikasi</p>
                <nav class="space-y-1.5">
                    <a href="{{ url('/') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-medium text-slate-400 hover:bg-slate-900 hover:text-white transition-all">
                        <i class="bi bi-house text-base"></i>
                        <span>Website Utama</span>
                    </a>

                    <form action="{{ route('logout') }}" method="POST" class="w-full">
                        @csrf
                        <button type="submit" class="w-full flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-medium text-red-400 hover:bg-red-500/10 hover:text-red-300 transition-all cursor-pointer text-left">
                            <i class="bi bi-box-arrow-right text-base"></i>
                            <span>Logout / Keluar</span>
                        </button>
                    </form>
                </nav>
            </div>

        </div>
    </div>

    {{-- Bottom Portion: Member Loyalty Badge Widget --}}
    <div class="p-4 border-t border-slate-800/80 bg-slate-950 shrink-0">
        <div class="p-3.5 rounded-xl bg-gradient-to-br from-amber-500/10 to-amber-600/5 border border-amber-500/30">
            <div class="flex items-center justify-between text-xs font-bold text-amber-400 mb-1.5">
                <span class="flex items-center gap-1">
                    <i class="bi bi-award-fill"></i> Loyalty Stamps
                </span>
                <span>7/10</span>
            </div>
            <div class="w-full bg-slate-800 rounded-full h-2 mb-2 overflow-hidden">
                <div class="bg-gradient-to-r from-amber-500 to-amber-300 h-2 rounded-full" style="width: 70%"></div>
            </div>
            <p class="text-[11px] text-slate-400 leading-tight">
                3x cukur lagi untuk klaim <strong>1x Free Grooming Treatment</strong>!
            </p>
        </div>
    </div>
</aside>

{{-- Mobile Backdrop --}}
<div id="userSidebarBackdrop" class="fixed inset-0 bg-black/70 z-30 hidden lg:hidden backdrop-blur-xs transition-opacity duration-300"></div>
