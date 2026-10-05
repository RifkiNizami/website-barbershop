<footer class="mt-auto py-5 px-6 sm:px-8 border-t border-white/[0.06] bg-user-bg text-xs text-user-muted flex flex-col sm:flex-row items-center justify-between gap-3">
    <div class="flex items-center gap-2">
        <span class="font-medium text-user-text">Rusdi Barbershop</span>
        <span>&bull;</span>
        <span>Gentleman Member Lounge &copy; {{ date('Y') }}</span>
    </div>
    <div class="flex items-center gap-4">
        <a href="{{ url('/') }}" class="text-user-muted hover:text-user-text transition">
            Website Utama
        </a>
        <span class="text-white/10">|</span>
        <span class="text-user-gold font-medium flex items-center gap-1.5">
            <i class="bi bi-patch-check-fill text-xs"></i> Member Aktif
        </span>
    </div>
</footer>
