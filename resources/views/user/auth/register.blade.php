<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Daftar Member Baru — Rusdi Barbershop</title>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- Vite Assets --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Plus Jakarta Sans', -apple-system, sans-serif; }
    </style>
</head>
<body class="bg-black text-zinc-100 min-h-screen flex flex-col justify-between antialiased selection:bg-white selection:text-black">

    {{-- Main Container (Full Viewport Height) --}}
    <main class="min-h-screen w-full flex items-center justify-center p-6 sm:p-10">
        <div class="w-full max-w-md space-y-6">

            {{-- Header --}}
            <div class="text-center space-y-2 js-animate-in">
                <a href="{{ url('/') }}" class="inline-flex items-center gap-2 text-white font-extrabold text-lg uppercase">
                    <span class="w-8 h-8 rounded-md bg-white text-black flex items-center justify-center text-sm font-black shadow-sm">
                        <i class="bi bi-scissors"></i>
                    </span>
                    <span>RUSDI BARBERSHOP</span>
                </a>
                <h1 class="text-2xl font-bold text-white tracking-tight">Daftar Member VIP</h1>
                <p class="text-xs text-zinc-400">Dapatkan bonus poin & klaim cukur gratis di kunjungan ke-10!</p>
            </div>

            {{-- Register Card --}}
            <div class="bg-black border border-zinc-800 rounded-md p-6 sm:p-7 space-y-4 js-animate-in">

                {{-- Flash Messages --}}
                @if (session('error'))
                    <div class="p-3 rounded-md bg-zinc-900 border border-zinc-700 text-white text-xs flex items-center gap-2">
                        <i class="bi bi-exclamation-triangle-fill text-white shrink-0"></i>
                        <span>{{ session('error') }}</span>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="p-3 rounded-md bg-zinc-900 border border-zinc-700 text-white text-xs space-y-1">
                        @foreach ($errors->all() as $err)
                            <div class="flex items-center gap-2">
                                <i class="bi bi-x-circle-fill text-white shrink-0"></i>
                                <span>{{ $err }}</span>
                            </div>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('user.register.post') }}" method="POST" class="space-y-4">
                    @csrf

                    {{-- Nama Lengkap --}}
                    <div class="space-y-1.5">
                        <label for="nama_lengkap" class="block text-xs font-semibold text-zinc-300">
                            Nama Lengkap <span class="text-white">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-zinc-500">
                                <i class="bi bi-person text-xs"></i>
                            </div>
                            <input type="text" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}" placeholder="Contoh: Dimas Pratama" required
                                   class="w-full pl-9 pr-3 py-2.5 bg-zinc-950 border border-zinc-800 rounded-md text-white text-sm focus:bg-zinc-950 focus:border-white focus:ring-1 focus:ring-white outline-none transition duration-150 placeholder:text-zinc-600">
                        </div>
                    </div>

                    {{-- Email --}}
                    <div class="space-y-1.5">
                        <label for="email" class="block text-xs font-semibold text-zinc-300">
                            Alamat Email <span class="text-white">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-zinc-500">
                                <i class="bi bi-envelope text-xs"></i>
                            </div>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="contoh@email.com" required
                                   class="w-full pl-9 pr-3 py-2.5 bg-zinc-950 border border-zinc-800 rounded-md text-white text-sm focus:bg-zinc-950 focus:border-white focus:ring-1 focus:ring-white outline-none transition duration-150 placeholder:text-zinc-600">
                        </div>
                    </div>

                    {{-- WhatsApp --}}
                    <div class="space-y-1.5">
                        <label for="no_whatsapp" class="block text-xs font-semibold text-zinc-300">
                            Nomor WhatsApp / HP <span class="text-white">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-zinc-500">
                                <i class="bi bi-whatsapp text-xs"></i>
                            </div>
                            <input type="tel" id="no_whatsapp" name="no_whatsapp" value="{{ old('no_whatsapp') }}" placeholder="Contoh: 081234567890" required
                                   class="w-full pl-9 pr-3 py-2.5 bg-zinc-950 border border-zinc-800 rounded-md text-white text-sm focus:bg-zinc-950 focus:border-white focus:ring-1 focus:ring-white outline-none transition duration-150 placeholder:text-zinc-600">
                        </div>
                    </div>

                    {{-- Gaya Rambut Favorit --}}
                    <div class="space-y-1.5">
                        <label for="favorite_style" class="block text-xs font-semibold text-zinc-300">
                            Gaya Rambut Favorit <span class="text-zinc-500 font-normal">(Opsional)</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-zinc-500">
                                <i class="bi bi-scissors text-xs"></i>
                            </div>
                            <select id="favorite_style" name="favorite_style"
                                    class="w-full pl-9 pr-3 py-2.5 bg-zinc-950 border border-zinc-800 rounded-md text-white text-sm focus:bg-zinc-950 focus:border-white focus:ring-1 focus:ring-white outline-none transition appearance-none">
                                <option value="">— Pilih gaya —</option>
                                <option value="Classic Pompadour / Side Part">Classic Pompadour / Side Part</option>
                                <option value="Taper Fade / Low Fade">Taper Fade / Low Fade</option>
                                <option value="Two-Block / Korean Style">Two-Block / Korean Style</option>
                                <option value="Buzz Cut / Crop Fringe">Buzz Cut / Crop Fringe</option>
                                <option value="Beard Grooming & Shave">Beard Grooming & Shave</option>
                            </select>
                        </div>
                    </div>

                    {{-- Password --}}
                    <div class="space-y-1.5">
                        <label for="password" class="block text-xs font-semibold text-zinc-300">
                            Buat Kata Sandi <span class="text-white">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-zinc-500">
                                <i class="bi bi-lock text-xs"></i>
                            </div>
                            <input type="password" id="password" name="password" placeholder="Minimal 4 karakter" required
                                   class="w-full pl-9 pr-3 py-2.5 bg-zinc-950 border border-zinc-800 rounded-md text-white text-sm focus:bg-zinc-950 focus:border-white focus:ring-1 focus:ring-white outline-none transition duration-150 placeholder:text-zinc-600">
                        </div>
                    </div>

                    {{-- Submit Button --}}
                    <div class="pt-2">
                        <button type="submit" class="btn-ripple w-full py-3 px-4 bg-white hover:bg-zinc-200 text-black font-black rounded-md text-xs uppercase tracking-wider transition duration-150 cursor-pointer flex items-center justify-center gap-2">
                            <i class="bi bi-person-check-fill text-sm"></i>
                            <span>DAFTAR & BUKA MEMBER CARD</span>
                        </button>
                    </div>
                </form>

                {{-- Login Link --}}
                <div class="pt-3 border-t border-zinc-900 text-center">
                    <p class="text-xs text-zinc-400">
                        Sudah memiliki akun? 
                        <a href="{{ route('login') }}" class="font-bold text-white hover:text-zinc-300 transition ml-1 underline">Masuk di sini</a>
                    </p>
                </div>

            </div>
        </div>
    </main>

    {{-- Integrated Footer --}}
    @include('partials.footer')

</body>
</html>
