{{-- SIDEBAR WRAPPER (Full Height Fixed) --}}
<aside id="adminSidebar" class="fixed top-0 bottom-0 left-0 z-40 w-64 h-screen bg-slate-950 text-slate-300 flex flex-col justify-between transition-transform duration-300 transform -translate-x-full lg:translate-x-0 border-r border-slate-800/80 shadow-2xl overflow-hidden">
    
    {{-- Top Portion --}}
    <div class="flex flex-col flex-1 overflow-y-auto">
        
        {{-- Sidebar Brand Header --}}
        <div class="h-16 px-6 flex items-center justify-between border-b border-slate-800/80 bg-slate-950/90 shrink-0">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 font-black tracking-wider text-white uppercase text-base group">
                <span class="w-9 h-9 rounded-xl bg-gradient-to-tr from-red-600 to-red-500 flex items-center justify-center text-white shadow-md shadow-red-600/30 group-hover:scale-105 transition-transform">
                    <i class="bi bi-scissors text-lg"></i>
                </span>
                <div class="flex flex-col">
                    <span class="leading-tight text-sm font-extrabold tracking-wide">RUSDI ADMIN</span>
                    <span class="text-[10px] text-slate-400 font-medium tracking-normal capitalize">Management Suite</span>
                </div>
            </a>

            {{-- Mobile Close Button --}}
            <button type="button" id="closeSidebarBtn" class="lg:hidden text-slate-400 hover:text-white p-1 rounded-lg hover:bg-slate-800" aria-label="Tutup Sidebar">
                <i class="bi bi-x-lg text-lg"></i>
            </button>
        </div>

        {{-- Navigation Menu Links --}}
        <div class="flex-1 px-4 py-6 space-y-6">
            
            {{-- Menu Utama --}}
            <div>
                <p class="px-3 text-[11px] font-bold text-slate-400 uppercase tracking-widest mb-2.5">Menu Utama</p>
                <nav class="space-y-1.5">
                    {{-- Dashboard --}}
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold transition-all duration-150 {{ request()->routeIs('admin.dashboard') ? 'bg-gradient-to-r from-red-600 to-red-700 text-white shadow-lg shadow-red-600/30 font-bold' : 'text-slate-300 hover:bg-slate-800/80 hover:text-white' }}">
                        <i class="bi bi-speedometer2 text-base {{ request()->routeIs('admin.dashboard') ? 'text-white' : 'text-slate-400' }}"></i>
                        <span>Dashboard Overview</span>
                    </a>
                </nav>
            </div>

            {{-- Form & Operasional --}}
            <div>
                <p class="px-3 text-[11px] font-bold text-slate-400 uppercase tracking-widest mb-2.5">Form & Operasional</p>
                <nav class="space-y-1.5">
                    {{-- Form Tambah Booking --}}
                    <a href="{{ route('admin.booking.create') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold transition-all duration-150 {{ request()->routeIs('admin.booking.create') ? 'bg-gradient-to-r from-red-600 to-red-700 text-white shadow-lg shadow-red-600/30 font-bold' : 'text-slate-300 hover:bg-slate-800/80 hover:text-white' }}">
                        <i class="bi bi-calendar-plus text-base {{ request()->routeIs('admin.booking.create') ? 'text-white' : 'text-slate-400' }}"></i>
                        <span>Form Booking Baru</span>
                    </a>

                    {{-- Form Tambah Layanan --}}
                    <a href="{{ route('admin.layanan.create') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold transition-all duration-150 {{ request()->routeIs('admin.layanan.create') ? 'bg-gradient-to-r from-red-600 to-red-700 text-white shadow-lg shadow-red-600/30 font-bold' : 'text-slate-300 hover:bg-slate-800/80 hover:text-white' }}">
                        <i class="bi bi-plus-circle-dotted text-base {{ request()->routeIs('admin.layanan.create') ? 'text-white' : 'text-slate-400' }}"></i>
                        <span>Form Tambah Layanan</span>
                    </a>
                </nav>
            </div>

            {{-- Akses Publik & Logout --}}
            <div>
                <p class="px-3 text-[11px] font-bold text-slate-400 uppercase tracking-widest mb-2.5">Autentikasi</p>
                <nav class="space-y-1.5">
                    <a href="{{ url('/') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-medium text-slate-400 hover:bg-slate-800/80 hover:text-white transition-colors">
                        <i class="bi bi-house-door text-base"></i>
                        <span>Website Utama</span>
                    </a>

                    <form action="{{ route('logout') }}" method="POST" class="w-full">
                        @csrf
                        <button type="submit" class="w-full flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-medium text-red-400 hover:bg-red-500/10 hover:text-red-300 transition-colors cursor-pointer text-left">
                            <i class="bi bi-box-arrow-right text-base"></i>
                            <span>Logout / Keluar</span>
                        </button>
                    </form>
                </nav>
            </div>

        </div>
    </div>

    {{-- Bottom Section: Admin Profile Widget --}}
    <div class="p-4 border-t border-slate-800/80 bg-slate-950 shrink-0">
        <div class="flex items-center justify-between p-2 rounded-xl bg-slate-900/80 border border-slate-800/60">
            <div class="flex items-center gap-3 overflow-hidden">
                <div class="relative shrink-0">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-red-600 to-rose-500 flex items-center justify-center font-bold text-white shadow-md">
                        <i class="bi bi-person-fill text-lg"></i>
                    </div>
                    <span class="absolute -bottom-0.5 -right-0.5 w-3 h-3 bg-emerald-500 border-2 border-slate-950 rounded-full" title="Online"></span>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-xs font-bold text-white truncate">Administrator</p>
                    <p class="text-[11px] text-slate-400 truncate">admin@gmail.com</p>
                </div>
            </div>
            
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" title="Logout" class="p-2 text-red-400 hover:text-red-300 hover:bg-red-500/10 rounded-lg transition-colors cursor-pointer">
                    <i class="bi bi-box-arrow-right text-lg"></i>
                </button>
            </form>
        </div>
    </div>
</aside>

{{-- Mobile Backdrop --}}
<div id="sidebarBackdrop" class="fixed inset-0 bg-black/70 z-30 hidden lg:hidden backdrop-blur-xs transition-opacity duration-300"></div>
