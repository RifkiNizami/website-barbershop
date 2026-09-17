<!DOCTYPE html>
<html lang="id" class="h-full bg-slate-950">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    {{-- Dynamic Title via Yield --}}
    <title>@yield('title', 'Member Lounge — Rusdi Barbershop')</title>
    
    {{-- Favicon --}}
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%23f59e0b'><path d='M9.64 7.64c.23-.5.36-1.05.36-1.64 0-2.21-1.79-4-4-4S2 3.79 2 6s1.79 4 4 4c.59 0 1.14-.13 1.64-.36L10 12l-2.36 2.36C7.14 14.13 6.59 14 6 14c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4c0-.59-.13-1.14-.36-1.64L12 14l7 7h3v-1L9.64 7.64zM6 8c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm0 12c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm6-7.5c-.28 0-.5-.22-.5-.5s.22-.5.5-.5.5.22.5.5-.22.5-.5.5zM19 3l-6 6 2 2 7-7V3h-3z'/></svg>">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- User / Member Specific CSS & External JS Assets --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Custom Styles Slot --}}
    @yield('styles')
</head>
<body class="h-full min-h-screen bg-slate-950 text-slate-100 font-sans antialiased selection:bg-amber-500 selection:text-gray-950">
    
    <div class="min-h-screen h-full flex bg-gradient-to-br from-slate-950 via-slate-900 to-black">
        
        {{-- 1. SIDEBAR MEMBER (Include Directive) --}}
        @include('user.partials.sidebar')

        {{-- 2. MAIN WRAPPER --}}
        <div class="flex-1 flex flex-col min-h-screen w-full lg:pl-64 transition-all duration-300">
            
            {{-- TOP NAVBAR MEMBER (Include Directive) --}}
            @include('user.partials.navbar')

            {{-- AREA KONTEN UTAMA (Yield Directive) --}}
            <main class="flex-1 p-4 sm:p-6 lg:p-8">
                <div class="max-w-7xl mx-auto">
                    
                    {{-- Alert Notifikasi (Include Directive) --}}
                    @include('user.partials.alerts')

                    {{-- Konten Halaman --}}
                    @yield('content')

                </div>
            </main>

            {{-- FOOTER MEMBER (Include Directive) --}}
            @include('user.partials.footer')

        </div>
    </div>

    {{-- Custom Scripts Slot --}}
    @yield('scripts')
</body>
</html>
