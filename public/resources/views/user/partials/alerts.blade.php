@if (session('success'))
    <div class="mb-6 flex items-center gap-3 p-4 text-xs sm:text-sm text-emerald-300 bg-emerald-950/40 border border-emerald-800/40 rounded-xl" role="alert">
        <div class="w-6 h-6 rounded-full bg-emerald-500/20 text-emerald-400 flex items-center justify-center shrink-0 font-bold text-xs">
            ✓
        </div>
        <div class="font-medium">
            {{ session('success') }}
        </div>
        <button type="button" onclick="this.parentElement.remove()" class="ml-auto text-emerald-400/70 hover:text-emerald-300 p-1 rounded-lg hover:bg-emerald-900/40 transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>
@endif

@if (isset($errors) && $errors->any())
    <div class="mb-6 p-4 text-xs sm:text-sm text-red-300 bg-red-950/40 border border-red-800/40 rounded-xl" role="alert">
        <div class="flex items-center gap-2 font-medium mb-2 text-red-300">
            <i class="bi bi-exclamation-triangle"></i>
            Periksa isian formulir:
        </div>
        <ul class="list-disc list-inside space-y-1 text-xs pl-2 text-red-300/90">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
