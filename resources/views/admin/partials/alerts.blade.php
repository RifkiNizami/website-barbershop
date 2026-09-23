@if (session('success'))
    <div class="mx-4 md:mx-6 mt-4 p-3 rounded-md bg-emerald-950/80 border border-emerald-800 text-emerald-300 text-xs flex items-center justify-between alert-auto-close">
        <div class="flex items-center gap-2">
            <span>✓</span>
            <span>{{ session('success') }}</span>
        </div>
        <button onclick="this.parentElement.remove()" class="text-emerald-400 hover:text-white">&times;</button>
    </div>
@endif

@if (session('error'))
    <div class="mx-4 md:mx-6 mt-4 p-3 rounded-md bg-red-950/80 border border-red-800 text-red-300 text-xs flex items-center justify-between alert-auto-close">
        <div class="flex items-center gap-2">
            <span>⚠️</span>
            <span>{{ session('error') }}</span>
        </div>
        <button onclick="this.parentElement.remove()" class="text-red-400 hover:text-white">&times;</button>
    </div>
@endif