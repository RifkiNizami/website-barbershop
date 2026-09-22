<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login — Black Crown</title>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- Vite Assets (Pastikan login.css dan login.js terdaftar di vite.config.js atau gunakan app.css/app.js) --}}
    @vite(['resources/css/app.css', 'resources/css/login.css', 'resources/js/app.js', 'resources/js/login.js'])
</head>
<body class="bg-black text-zinc-100 min-h-screen flex flex-col antialiased selection:bg-white selection:text-black">

    <main class="min-h-screen w-full flex flex-col md:flex-row bg-black overflow-hidden">

        {{-- LEFT SIDE (50% Width) — BRAND EXPERIENCE --}}
        <div class="hidden md:flex md:w-1/2 relative min-h-screen bg-black overflow-hidden border-r border-zinc-900">
            <img src="{{ asset('images/bg-login.jpg') }}" alt="Rusdi Barbershop Lounge" class="absolute inset-0 w-full h-full object-cover object-center filter grayscale contrast-125 brightness-[0.5] kenburns-bg">

            <div class="absolute inset-0 bg-linear-to-t from-black via-black/70 to-black/30"></div>
            <div class="absolute inset-0 bg-linear-to-r from-black/60 via-transparent to-black"></div>

            <div class="relative z-10 flex flex-col justify-between p-12 lg:p-20 w-full h-full">

                <div class="space-y-4 opacity-0 animate-fade-up delay-1">
                    <a href="{{ url('/') }}" class="inline-flex items-center gap-3 text-white font-extrabold text-2xl tracking-wider uppercase group">
                        <span class="w-12 h-12 rounded-xl bg-white text-black flex items-center justify-center text-xl font-black shadow-lg group-hover:scale-105 transition-transform duration-300">
                            <i class="bi bi-scissors"></i>
                        </span>
                        <span class="group-hover:text-zinc-300 transition-colors">BLACK CROWN</span>
                    </a>
                    <div>
                        <span class="inline-block px-3.5 py-1.5 rounded-md bg-white/10 backdrop-blur-md border border-white/20 text-white text-[11px] font-black tracking-widest uppercase">
                            Premium Grooming Lounge
                        </span>
                    </div>
                </div>

                <div class="space-y-6 max-w-xl my-auto py-10 opacity-0 animate-fade-up delay-2">
                    <h2 class="text-4xl lg:text-5xl font-extrabold text-white leading-tight tracking-tight">
                        Pengalaman Cukur Klasik dengan Sentuhan Modern.
                    </h2>
                    <p class="text-zinc-300 text-lg leading-relaxed">
                        Masuk untuk mengelola reservasi potong rambut, melihat status poin stempel VIP, dan menikmati pelayanan eksklusif dari barber master kami.
                    </p>
                </div>

                <div class="pt-8 border-t border-zinc-800/80 opacity-0 animate-fade-up delay-3">
                    <div class="flex items-center gap-8 text-sm font-semibold text-zinc-300">
                        <div class="flex items-center gap-2.5">
                            <i class="bi bi-calendar2-check-fill text-white text-lg"></i>
                            <span>Booking Online</span>
                        </div>
                        <div class="flex items-center gap-2.5">
                            <i class="bi bi-star-fill text-white text-lg"></i>
                            <span>Stempel VIP</span>
                        </div>
                        <div class="flex items-center gap-2.5">
                            <i class="bi bi-person-badge-fill text-white text-lg"></i>
                            <span>Barber Master</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- RIGHT SIDE (50% Width) — PROMINENT FORM AREA --}}
        <div class="w-full md:w-1/2 min-h-screen flex items-center justify-center p-6 sm:p-12 lg:p-16 bg-black relative">

            {{-- Decorative Gradient Blob --}}
            <div class="absolute top-0 right-0 w-125 h-125 bg-white/5 rounded-full blur-[120px] pointer-events-none"></div>

            <div class="w-full max-w-md lg:max-w-lg space-y-8 relative z-10 bg-zinc-950/50 sm:bg-transparent backdrop-blur-2xl sm:backdrop-blur-none p-8 sm:p-0 rounded-3xl border border-zinc-900/50 sm:border-none shadow-2xl sm:shadow-none">

                <div class="space-y-3 opacity-0 animate-fade-up delay-1">
                    <div class="inline-flex items-center gap-2 text-white font-bold text-xs uppercase tracking-widest px-3 py-1.5 rounded-md bg-zinc-900 border border-zinc-800 shadow-sm">
                        <i class="bi bi-box-arrow-in-right text-sm"></i>
                        <span>Login Portal</span>
                    </div>
                    <h1 class="text-3xl lg:text-4xl font-extrabold text-white tracking-tight">Selamat Datang</h1>
                    <p class="text-sm text-zinc-400 leading-relaxed">Masukkan kredensial akun Anda untuk mengakses sistem dan reservasi.</p>
                </div>

                @if (session('success'))
                    <div class="p-4 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 text-sm flex items-center gap-3 shadow-md animate-fade-up">
                        <i class="bi bi-check-circle-fill text-lg shrink-0"></i>
                        <span class="font-medium">{{ session('success') }}</span>
                    </div>
                @endif

                @if (session('error') || $errors->any())
                    <div class="p-4 rounded-xl bg-red-500/10 border border-red-500/20 text-red-400 text-sm space-y-2 shadow-md animate-fade-up">
                        @if(session('error'))
                            <div class="flex items-center gap-3">
                                <i class="bi bi-exclamation-triangle-fill text-lg shrink-0"></i>
                                <span class="font-medium">{{ session('error') }}</span>
                            </div>
                        @endif
                        @foreach ($errors->all() as $err)
                            <div class="flex items-center gap-3">
                                <i class="bi bi-x-circle-fill text-lg shrink-0"></i>
                                <span class="font-medium">{{ $err }}</span>
                            </div>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('login.post') }}" method="POST" class="space-y-6 opacity-0 animate-fade-up delay-2">
                    @csrf

                    <div class="space-y-2.5">
                        <label for="email" class="block text-xs font-bold uppercase tracking-wider text-zinc-400">
                            Alamat Email <span class="text-white">*</span>
                        </label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-zinc-500 group-focus-within:text-white transition-colors duration-300">
                                <i class="bi bi-envelope text-lg"></i>
                            </div>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com" required
                                   class="w-full pl-12 pr-4 py-3.5 bg-zinc-900/50 border border-zinc-800 rounded-xl text-white text-base focus:bg-zinc-900 focus:border-white focus:ring-4 focus:ring-white/10 transition-all duration-300 outline-none placeholder:text-zinc-600 shadow-inner">
                        </div>
                    </div>

                    <div class="space-y-2.5">
                        <div class="flex items-center justify-between">
                            <label for="password" class="block text-xs font-bold uppercase tracking-wider text-zinc-400">
                                Kata Sandi <span class="text-white">*</span>
                            </label>
                            <a href="#" class="text-xs text-zinc-400 hover:text-white transition-colors duration-300 underline underline-offset-4 font-medium">Lupa kata sandi?</a>
                        </div>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-zinc-500 group-focus-within:text-white transition-colors duration-300">
                                <i class="bi bi-lock text-lg"></i>
                            </div>
                            <input type="password" id="password" name="password" placeholder="••••••••" required
                                   class="w-full pl-12 pr-12 py-3.5 bg-zinc-900/50 border border-zinc-800 rounded-xl text-white text-base focus:bg-zinc-900 focus:border-white focus:ring-4 focus:ring-white/10 transition-all duration-300 outline-none placeholder:text-zinc-600 shadow-inner">
                            <button type="button" id="togglePasswordBtn" class="absolute inset-y-0 right-0 pr-4 flex items-center text-zinc-500 hover:text-white transition-colors duration-300 cursor-pointer focus:outline-none">
                                <i class="bi bi-eye text-lg" id="toggleIcon"></i>
                            </button>
                        </div>
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="btn-ripple w-full py-4 px-6 bg-white hover:bg-zinc-200 text-black font-black rounded-xl text-sm uppercase tracking-widest transition-all duration-300 transform hover:-translate-y-0.5 active:translate-y-0 flex items-center justify-center gap-3 shadow-[0_0_20px_rgba(255,255,255,0.15)] hover:shadow-[0_0_30px_rgba(255,255,255,0.3)] cursor-pointer">
                            <span>Masuk Ke Akun</span>
                            <i class="bi bi-arrow-right text-lg"></i>
                        </button>
                    </div>
                </form>

                <div class="relative flex items-center py-4 opacity-0 animate-fade-up delay-3">
                    <div class="grow border-t border-zinc-900"></div>
                    <span class="shrink mx-4 text-xs text-zinc-600 uppercase tracking-widest font-bold">Atau</span>
                    <div class="grow border-t border-zinc-900"></div>
                </div>

                <div class="opacity-0 animate-fade-up delay-4">
                    <a href="{{ route('user.register') }}" class="btn-ripple btn-ripple-dark w-full py-3.5 px-6 bg-transparent hover:bg-zinc-900 text-zinc-300 hover:text-white border border-zinc-800 hover:border-zinc-600 font-bold rounded-xl text-xs uppercase tracking-wider transition-all duration-300 flex items-center justify-center gap-2 cursor-pointer">
                        <i class="bi bi-person-plus text-base"></i>
                        <span>Daftar Member Baru</span>
                    </a>
                </div>

            </div>
        </div>

    </main>

    @include('partials.footer')

</body>
</html>
