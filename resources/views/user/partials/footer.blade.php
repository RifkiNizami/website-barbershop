<footer class="mt-auto py-6 px-6 sm:px-8 border-t border-gray-200 bg-white/80 backdrop-blur-md text-xs text-gray-500 flex flex-col sm:flex-row items-center justify-between gap-3">
    <div class="flex items-center gap-2">
        <span class="font-bold text-gray-800">Rusdi Gentlemen Club</span>
        <span>&bull;</span>
        <span>Member Loyalty Portal &copy; {{ date('Y') }}</span>
    </div>
    <div class="flex items-center gap-4">
        <a href="{{ url('/') }}" class="text-gray-600 hover:text-barber-red transition font-medium">
            Halaman Utama Website
        </a>
        <span class="text-gray-300">|</span>
        <span class="text-amber-600 font-semibold flex items-center gap-1">
            <span>✨</span> Status: Member Aktif
        </span>
    </div>
</footer>
