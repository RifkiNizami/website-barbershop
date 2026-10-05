{{-- SIDEBAR MEMBER WRAPPER (Full Height Fixed) --}}
<aside id="userSidebar"
    class="fixed top-0 bottom-0 left-0 z-40 w-60 h-screen bg-[#0B0F19] text-[#9CA3AF] flex flex-col justify-between transition-transform duration-300 transform -translate-x-full lg:translate-x-0 border-r border-white/[0.06] overflow-hidden select-none">

    {{-- Top Portion --}}
    <div class="flex flex-col flex-1 overflow-y-auto">

        {{-- Sidebar Brand Header --}}
        <div class="h-16 px-5 flex items-center justify-between border-b border-white/[0.06] bg-[#0B0F19] shrink-0">
            <a href="{{ route('user.dashboard') }}" class="flex items-center gap-2.5 group">
                <span
                    class="w-8 h-8 rounded-lg bg-white/[0.04] border border-white/[0.08] flex items-center justify-center text-[#D4A72C] group-hover:border-[#D4A72C]/40 transition-colors">
                    <i class="bi bi-scissors text-sm"></i>
                </span>
                <div class="flex flex-col">
                    <span class="text-xs font-semibold text-[#F5F5F5] tracking-wider uppercase leading-tight">Black
                        Round Barbershop</span>
                    <span class="text-[10px] text-[#9CA3AF] leading-tight">Gentleman Lounge</span>
                </div>
            </a>

            {{-- Mobile Close Button --}}
            <button type="button" id="closeUserSidebarBtn"
                class="lg:hidden text-[#9CA3AF] hover:text-[#F5F5F5] p-1 rounded-lg hover:bg-white/[0.05]"
                aria-label="Tutup Sidebar">
                <i class="bi bi-x-lg text-base"></i>
            </button>
        </div>

        {{-- Navigation Menu Links --}}
        <div class="flex-1 px-3 py-5 space-y-5">

            {{-- Member Portal --}}
            <div>
                <p class="px-2.5 text-[10px] font-medium uppercase tracking-widest text-[#6B7280] mb-2">Member Area</p>
                <nav class="space-y-1">
                    {{-- Dashboard --}}
                    <a href="{{ route('user.dashboard') }}"
                        class="flex items-center gap-2.5 px-2.5 py-2 rounded-lg text-xs font-medium transition-colors {{ request()->routeIs('user.dashboard') ? 'bg-[#D4A72C]/10 text-[#D4A72C]' : 'text-[#9CA3AF] hover:text-[#F5F5F5] hover:bg-white/[0.03]' }}">
                        <i
                            class="bi bi-grid-1x2 text-sm {{ request()->routeIs('user.dashboard') ? 'text-[#D4A72C]' : 'text-[#9CA3AF]' }}"></i>
                        <span>Dashboard Saya</span>
                    </a>

                    {{-- Form Reservasi Cukur --}}
                    <a href="{{ route('user.booking.create') }}"
                        class="flex items-center gap-2.5 px-2.5 py-2 rounded-lg text-xs font-medium transition-colors {{ request()->routeIs('user.booking.create') ? 'bg-[#D4A72C]/10 text-[#D4A72C]' : 'text-[#9CA3AF] hover:text-[#F5F5F5] hover:bg-white/[0.03]' }}">
                        <i
                            class="bi bi-calendar-check text-sm {{ request()->routeIs('user.booking.create') ? 'text-[#D4A72C]' : 'text-[#9CA3AF]' }}"></i>
                        <span>Reservasi Cukur</span>
                    </a>

                    <a href="{{ route('user.bookings.index') }}" 
                       class="flex items-center gap-2.5 px-2.5 py-2 rounded-lg text-xs font-medium transition-colors {{ request()->routeIs('user.bookings*') ? 'bg-[#D4A72C]/10 text-[#D4A72C]' : 'text-[#9CA3AF] hover:text-[#F5F5F5] hover:bg-white/[0.03]' }}">
                        <i class="bi bi-clock-history text-sm {{ request()->routeIs('user.bookings*') ? 'text-[#D4A72C]' : 'text-[#9CA3AF]' }}"></i>
                        <span>Riwayat Cukur</span>
                    </a>

                    {{-- Tagihan & Barcode Pembayaran --}}
                    <a href="{{ route('user.payment.show') }}" 
                       class="flex items-center gap-2.5 px-2.5 py-2 rounded-lg text-xs font-medium transition-colors {{ request()->routeIs('user.payment*') ? 'bg-[#D4A72C]/10 text-[#D4A72C]' : 'text-[#9CA3AF] hover:text-[#F5F5F5] hover:bg-white/[0.03]' }}">
                        <i class="bi bi-receipt-cutoff text-sm {{ request()->routeIs('user.payment*') ? 'text-[#D4A72C]' : 'text-[#9CA3AF]' }}"></i>
                        <span>Tagihan & Barcode</span>
                    </a>
                </nav>
            </div>

            {{-- Navigasi & Logout --}}
            <div>
                <p class="px-2.5 text-[10px] font-medium uppercase tracking-widest text-[#6B7280] mb-2">Navigasi</p>
                <nav class="space-y-1">
                    <a href="{{ url('/') }}"
                        class="flex items-center gap-2.5 px-2.5 py-2 rounded-lg text-xs font-medium text-[#9CA3AF] hover:text-[#F5F5F5] hover:bg-white/[0.03] transition-colors">
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
    @php
        use App\Models\Booking;
        use Illuminate\Support\Facades\Auth;
        $sidebarUser     = Auth::user();
        $sidebarTotal    = $sidebarUser
            ? Booking::where('user_id', $sidebarUser->user_id)->where('status', 'completed')->count()
            : 0;
        $sidebarStamps   = $sidebarTotal % 10;
        $sidebarRemain   = 10 - $sidebarStamps;
        $sidebarProgress = ($sidebarStamps / 10) * 100;
    @endphp
    <div class="p-3 border-t border-white/[0.06] bg-[#0B0F19] shrink-0">
        <div class="p-3 rounded-xl bg-[#111827] border border-white/[0.06]">
            <div class="flex items-center justify-between text-xs font-medium text-[#F5F5F5] mb-1.5">
                <span class="flex items-center gap-1.5 text-[11px] text-[#9CA3AF]">
                    <i class="bi bi-award text-[#D4A72C]"></i> Loyalty Stamps
                </span>
                <span class="text-[11px] font-mono font-semibold text-[#D4A72C]">{{ $sidebarStamps }}/10</span>
            </div>
            <div class="w-full bg-[#151B26] rounded-full h-1.5 overflow-hidden">
                <div class="bg-[#D4A72C] h-1.5 rounded-full transition-all duration-300" style="width: {{ $sidebarProgress }}%"></div>
            </div>
            <p class="text-[10px] text-[#9CA3AF] mt-1.5 leading-snug">
                @if($sidebarRemain > 0)
                    {{ $sidebarRemain }} visits remaining to unlock free grooming
                @else
                    <span class="text-emerald-400"><i class="bi bi-gift-fill"></i> Reward ready to claim!</span>
                @endif
            </p>
        </div>
    </div>
</aside>

{{-- Mobile Backdrop --}}
<div id="userSidebarBackdrop"
    class="fixed inset-0 bg-black/70 z-30 hidden lg:hidden backdrop-blur-xs transition-opacity duration-300"></div>