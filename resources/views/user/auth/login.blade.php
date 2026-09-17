@extends('user.layouts.auth')

@section('title', 'Login Member — Rusdi Barbershop Gentleman Lounge')

@section('content')
<div class="w-full max-w-md mx-auto">

    {{-- Card Header --}}
    <div class="text-center mb-8">
        <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-gradient-to-tr from-amber-500 to-amber-300 text-gray-950 shadow-2xl shadow-amber-500/30 mb-4">
            <i class="bi bi-scissors text-2xl"></i>
        </div>
        <div class="flex items-center justify-center gap-2 mb-2">
            <div class="h-px w-8 bg-amber-500/50"></div>
            <span class="text-amber-500 text-xs font-bold uppercase tracking-widest">Rusdi Barbershop</span>
            <div class="h-px w-8 bg-amber-500/50"></div>
        </div>
        <h1 class="text-2xl sm:text-3xl font-black uppercase tracking-tight text-white">
            Member Area
        </h1>
        <p class="text-xs sm:text-sm text-gray-400 mt-2 max-w-xs mx-auto">
            Masuk ke dashboard pelanggan untuk cek stempel loyalitas, jadwal potong, dan reservasi prioritas.
        </p>
    </div>

    {{-- Login Card --}}
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

        <form action="{{ route('user.login.post') }}" method="POST" class="space-y-5">
            @csrf

            {{-- Nomor WhatsApp --}}
            <div>
                <label for="no_whatsapp" class="block text-xs font-bold uppercase tracking-wider text-gray-300 mb-2">
                    Nomor WhatsApp / HP Terdaftar <span class="text-amber-500">*</span>
                </label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-gray-500">
                        <i class="bi bi-phone-fill text-sm"></i>
                    </span>
                    <input type="tel" id="no_whatsapp" name="no_whatsapp"
                           value="{{ old('no_whatsapp', '081234567890') }}"
                           placeholder="Contoh: 081234567890" required
                           class="w-full pl-10 pr-4 py-3 rounded-xl bg-gray-900 border border-gray-800 text-white text-sm focus:border-amber-500 focus:ring-1 focus:ring-amber-500 outline-none transition placeholder-gray-600">
                </div>
                <p class="text-[11px] text-gray-500 mt-1.5">Gunakan nomor HP yang sama saat registrasi.</p>
            </div>

            {{-- Password --}}
            <div>
                <div class="flex items-center justify-between mb-2">
                    <label for="password" class="block text-xs font-bold uppercase tracking-wider text-gray-300">
                        PIN / Kata Sandi
                    </label>
                    <span class="text-[11px] text-amber-500 cursor-pointer hover:underline">Bantuan Login?</span>
                </div>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-gray-500">
                        <i class="bi bi-lock-fill text-sm"></i>
                    </span>
                    <input type="password" id="password" name="password"
                           value="password"
                           placeholder="••••••"
                           class="w-full pl-10 pr-4 py-3 rounded-xl bg-gray-900 border border-gray-800 text-white text-sm focus:border-amber-500 focus:ring-1 focus:ring-amber-500 outline-none transition placeholder-gray-600">
                </div>
            </div>

            {{-- Submit --}}
            <div class="pt-2">
                <button type="submit"
                        class="w-full py-3.5 px-6 rounded-xl bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-400 hover:to-amber-500 text-gray-950 font-black text-xs uppercase tracking-widest transition-all duration-200 shadow-lg shadow-amber-500/20 transform hover:-translate-y-0.5 cursor-pointer flex items-center justify-center gap-2">
                    <i class="bi bi-box-arrow-in-right"></i>
                    Masuk ke Dashboard Member
                </button>
            </div>
        </form>

        {{-- Register Prompt --}}
        <div class="mt-6 pt-6 border-t border-gray-800 text-center">
            <p class="text-xs text-gray-400">
                Belum punya kartu member?
                <a href="{{ route('user.register') }}" class="font-bold text-amber-400 hover:text-amber-300 ml-1 underline">
                    Daftar Gratis di Sini
                </a>
            </p>
            <div class="mt-4">
                <a href="{{ url('/') }}" class="text-xs text-gray-500 hover:text-white transition flex items-center justify-center gap-1.5">
                    <i class="bi bi-arrow-left"></i> Kembali ke Beranda Barbershop
                </a>
            </div>
        </div>
    </div>

    {{-- Demo Hint --}}
    <div class="mt-6 text-center text-[11px] text-gray-500 bg-gray-950/40 p-3 rounded-xl border border-gray-800/60">
        <i class="bi bi-info-circle text-amber-500"></i>
        <strong>Mode Akses Cepat:</strong> Klik tombol masuk untuk preview Dashboard Member Pelanggan.
    </div>

</div>
@endsection
