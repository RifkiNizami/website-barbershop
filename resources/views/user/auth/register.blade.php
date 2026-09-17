@extends('user.layouts.auth')

@section('title', 'Daftar Member Baru — Rusdi Barbershop Gentleman Lounge')

@section('content')
<div class="w-full max-w-lg mx-auto">

    {{-- Card Header --}}
    <div class="text-center mb-8">
        <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-tr from-amber-500 to-amber-300 text-gray-950 shadow-2xl shadow-amber-500/30 mb-4">
            <i class="bi bi-person-plus-fill text-2xl"></i>
        </div>
        <div class="flex items-center justify-center gap-2 mb-2">
            <div class="h-px w-8 bg-amber-500/50"></div>
            <span class="text-amber-500 text-xs font-bold uppercase tracking-widest">Rusdi Barbershop</span>
            <div class="h-px w-8 bg-amber-500/50"></div>
        </div>
        <h1 class="text-2xl sm:text-3xl font-black uppercase tracking-tight text-white">
            Gabung Member VIP
        </h1>
        <p class="text-xs sm:text-sm text-gray-400 mt-2 max-w-xs mx-auto">
            Dapatkan bonus 50 poin selamat datang dan kumpulkan 10 stempel untuk 1× potong rambut gratis!
        </p>
    </div>

    {{-- Benefits strip --}}
    <div class="flex items-center justify-center gap-4 mb-6">
        <div class="flex items-center gap-1.5 text-xs text-gray-400">
            <i class="bi bi-star-fill text-amber-500 text-[10px]"></i> Poin Loyalitas
        </div>
        <div class="w-px h-4 bg-gray-700"></div>
        <div class="flex items-center gap-1.5 text-xs text-gray-400">
            <i class="bi bi-calendar-check-fill text-amber-500 text-[10px]"></i> Booking Prioritas
        </div>
        <div class="w-px h-4 bg-gray-700"></div>
        <div class="flex items-center gap-1.5 text-xs text-gray-400">
            <i class="bi bi-gift-fill text-amber-500 text-[10px]"></i> Promo Eksklusif
        </div>
    </div>

    {{-- Register Card --}}
    <div class="bg-gray-950/80 backdrop-blur-xl border border-gray-800 rounded-3xl p-6 sm:p-8 shadow-2xl shadow-black/80">

        {{-- Flash Error --}}
        @if (session('error'))
            <div class="mb-5 p-3 rounded-xl bg-red-900/40 border border-red-800 text-red-300 text-xs flex items-center gap-2">
                <i class="bi bi-exclamation-triangle-fill text-red-400"></i>
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-5 p-3 rounded-xl bg-red-900/40 border border-red-800 text-red-300 text-xs">
                <ul class="space-y-1">
                    @foreach ($errors->all() as $err)
                        <li class="flex items-center gap-2"><i class="bi bi-dot text-red-400"></i>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('user.register.post') }}" method="POST" class="space-y-4">
            @csrf

            {{-- Nama Lengkap --}}
            <div>
                <label for="nama_lengkap" class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-1.5">
                    Nama Lengkap <span class="text-amber-500">*</span>
                </label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-gray-500">
                        <i class="bi bi-person-fill text-sm"></i>
                    </span>
                    <input type="text" id="nama_lengkap" name="nama_lengkap"
                           value="{{ old('nama_lengkap') }}"
                           placeholder="Contoh: Dimas Pratama" required
                           class="w-full pl-10 pr-4 py-3 rounded-xl bg-gray-900 border border-gray-800 text-white text-sm focus:border-amber-500 focus:ring-1 focus:ring-amber-500 outline-none transition placeholder-gray-600">
                </div>
            </div>

            {{-- Nomor WhatsApp --}}
            <div>
                <label for="no_whatsapp" class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-1.5">
                    Nomor WhatsApp / HP Aktif <span class="text-amber-500">*</span>
                </label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-gray-500">
                        <i class="bi bi-phone-fill text-sm"></i>
                    </span>
                    <input type="tel" id="no_whatsapp" name="no_whatsapp"
                           value="{{ old('no_whatsapp') }}"
                           placeholder="Contoh: 081234567890" required
                           class="w-full pl-10 pr-4 py-3 rounded-xl bg-gray-900 border border-gray-800 text-white text-sm focus:border-amber-500 focus:ring-1 focus:ring-amber-500 outline-none transition placeholder-gray-600">
                </div>
            </div>

            {{-- Gaya Rambut Favorit --}}
            <div>
                <label for="favorite_style" class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-1.5">
                    Gaya Rambut Favorit <span class="text-gray-600 font-normal normal-case tracking-normal">(Opsional)</span>
                </label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-gray-500">
                        <i class="bi bi-scissors text-sm"></i>
                    </span>
                    <select id="favorite_style" name="favorite_style"
                            class="w-full pl-10 pr-4 py-3 rounded-xl bg-gray-900 border border-gray-800 text-white text-sm focus:border-amber-500 focus:ring-1 focus:ring-amber-500 outline-none transition appearance-none">
                        <option value="">— Pilih gaya —</option>
                        <option value="Classic Pompadour / Side Part">Classic Pompadour / Side Part</option>
                        <option value="Taper Fade / Low Fade">Taper Fade / Low Fade</option>
                        <option value="Two-Block / Korean Style">Two-Block / Korean Style</option>
                        <option value="Buzz Cut / Crop Fringe">Buzz Cut / Crop Fringe</option>
                        <option value="Beard Grooming & Shave">Beard Grooming & Shave</option>
                    </select>
                </div>
            </div>

            {{-- PIN Akses --}}
            <div>
                <label for="password" class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-1.5">
                    Buat 6-Digit PIN Akses <span class="text-amber-500">*</span>
                </label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-gray-500">
                        <i class="bi bi-shield-lock-fill text-sm"></i>
                    </span>
                    <input type="password" id="password" name="password"
                           placeholder="Contoh: 123456" required
                           class="w-full pl-10 pr-4 py-3 rounded-xl bg-gray-900 border border-gray-800 text-white text-sm focus:border-amber-500 focus:ring-1 focus:ring-amber-500 outline-none transition placeholder-gray-600">
                </div>
            </div>

            {{-- Submit --}}
            <div class="pt-3">
                <button type="submit"
                        class="w-full py-3.5 px-6 rounded-xl bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-400 hover:to-amber-500 text-gray-950 font-black text-xs uppercase tracking-widest transition-all duration-200 shadow-lg shadow-amber-500/20 transform hover:-translate-y-0.5 cursor-pointer flex items-center justify-center gap-2">
                    <i class="bi bi-person-check-fill"></i>
                    Daftar & Buka Member Card
                </button>
            </div>
        </form>

        {{-- Login Link --}}
        <div class="mt-6 pt-6 border-t border-gray-800 text-center">
            <p class="text-xs text-gray-400">
                Sudah punya akun member?
                <a href="{{ route('user.login') }}" class="font-bold text-amber-400 hover:text-amber-300 ml-1 underline">
                    Login di Sini
                </a>
            </p>
            <div class="mt-4">
                <a href="{{ url('/') }}" class="text-xs text-gray-500 hover:text-white transition flex items-center justify-center gap-1.5">
                    <i class="bi bi-arrow-left"></i> Kembali ke Beranda Barbershop
                </a>
            </div>
        </div>
    </div>

    {{-- Info strip --}}
    <div class="mt-6 text-center text-[11px] text-gray-500 bg-gray-950/40 p-3 rounded-xl border border-gray-800/60">
        <i class="bi bi-shield-check text-amber-500"></i>
        <strong>Data Aman:</strong> Informasi Anda kami jaga dan tidak dibagikan ke pihak ketiga.
    </div>

</div>
@endsection
