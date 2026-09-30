<footer class="mt-auto py-5 px-6 sm:px-8 border-t border-white/[0.06] bg-[#080B12] text-xs text-[#9CA3AF] flex flex-col sm:flex-row items-center justify-between gap-3">
    <div class="flex items-center gap-2">
        <span class="font-medium text-[#F5F5F5]">Rusdi Barbershop</span>
        <span>&bull;</span>
        <span>Gentleman Member Lounge &copy; {{ date('Y') }}</span>
    </div>
    <div class="flex items-center gap-4">
        <a href="{{ url('/') }}" class="text-[#9CA3AF] hover:text-[#F5F5F5] transition">
            Website Utama
        </a>
        <span class="text-white/10">|</span>
        <span class="text-[#D4A72C] font-medium flex items-center gap-1.5">
            <i class="bi bi-patch-check-fill text-xs"></i> Member Aktif
        </span>
    </div>
</footer>
