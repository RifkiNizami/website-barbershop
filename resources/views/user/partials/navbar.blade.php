{{-- TOP NAVBAR MEMBER --}}
<header
    class="h-16 bg-user-bg/90 backdrop-blur-md border-b border-white/[0.06] sticky top-0 z-20 flex items-center justify-between px-4 sm:px-6 lg:px-8 shrink-0">

    {{-- Left Section: Mobile Toggle & Page Title --}}
    <div class="flex items-center gap-3">
        <button type="button" id="openUserSidebarBtn"
            class="lg:hidden p-1.5 rounded-lg text-user-muted hover:text-user-text hover:bg-white/[0.04] focus:outline-none"
            aria-label="Buka Menu">
            <i class="bi bi-list text-xl"></i>
        </button>

        <h1 class="text-base sm:text-lg font-semibold text-user-text tracking-tight">
            @yield('page_title', 'Dashboard Member')
        </h1>
    </div>

    {{-- Right Section: User Name, Membership Badge, Booking CTA & Logout --}}
    <div class="flex items-center gap-3">

        {{-- User Name & Membership Badge --}}
        <div class="flex items-center gap-2">
            <span class="text-xs font-medium text-user-text hidden md:inline">
                {{ Auth::user()->name ?? 'Dimas Pratama' }}
            </span>
            <span
                class="text-[11px] font-medium text-user-gold bg-user-gold/10 border border-user-gold/20 px-2 py-0.5 rounded-full hidden sm:inline-flex items-center">
                VIP Member
            </span>
        </div>

        <div class="h-4 w-px bg-white/[0.08] hidden sm:block"></div>

        {{-- Booking Button (CTA Utama) --}}
        <a href="{{ route('user.booking.create') }}"
            class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-lg bg-user-gold hover:bg-user-gold-hover text-black font-semibold text-xs transition">
            <i class="bi bi-calendar-plus text-xs"></i>
            <span>Booking Cukur</span>
        </a>

        {{-- Logout --}}
        <form action="{{ route('logout') }}" method="POST" class="inline-flex">
            @csrf
            <button type="submit"
                class="inline-flex items-center gap-1 px-2 py-1.5 text-xs font-medium text-user-muted hover:text-red-400 hover:bg-red-500/10 rounded-lg transition cursor-pointer"
                title="Logout">
                <i class="bi bi-box-arrow-right text-xs"></i>
                <span class="hidden sm:inline">Logout</span>
            </button>
        </form>

    </div>

</header>