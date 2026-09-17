<footer class="mt-auto py-6 px-6 sm:px-8 border-t border-gray-200 bg-white text-xs text-gray-500 flex flex-col sm:flex-row items-center justify-between gap-3">
    <div class="flex items-center gap-2">
        <span class="font-semibold text-gray-700">Rusdi Barbershop</span>
        <span>&bull;</span>
        <span>Admin Panel &copy; {{ date('Y') }}</span>
    </div>
    <div class="flex items-center gap-4">
        <span class="inline-flex items-center gap-1.5 text-gray-400">
            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
            Server v1.0.0 (Ready)
        </span>
        <a href="{{ url('/') }}" target="_blank" class="text-barber-red hover:underline font-medium flex items-center gap-1">
            Lihat Website
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
            </svg>
        </a>
    </div>
</footer>
