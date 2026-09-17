@if (session('success'))
    <div class="mb-6 flex items-center gap-3 p-4 text-sm text-emerald-900 bg-emerald-50 border border-emerald-200 rounded-2xl shadow-xs" role="alert">
        <div class="w-8 h-8 rounded-full bg-emerald-500 text-white flex items-center justify-center shrink-0 font-bold text-sm">
            ✓
        </div>
        <div class="font-medium">
            {{ session('success') }}
        </div>
        <button type="button" onclick="this.parentElement.remove()" class="ml-auto text-emerald-600 hover:text-emerald-800 p-1.5 rounded-lg hover:bg-emerald-100 transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>
@endif

@if (isset($errors) && $errors->any())
    <div class="mb-6 p-4 text-sm text-red-900 bg-red-50 border border-red-200 rounded-2xl shadow-xs" role="alert">
        <div class="flex items-center gap-2 font-bold mb-2">
            <svg class="w-5 h-5 text-barber-red" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
            </svg>
            Mohon periksa isian formulir:
        </div>
        <ul class="list-disc list-inside space-y-1 text-xs md:text-sm pl-2">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
