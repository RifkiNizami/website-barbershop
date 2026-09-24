<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin — Rusdi Barbershop')</title>

    <!-- Fonts: Inter for UI, Space Mono for code/numbers -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">

    @vite(['resources/css/admin.css', 'resources/js/admin.js'])
    @yield('styles')
</head>
<body class="admin-body h-full" x-data="{ sidebarOpen: false }">
<div class="admin-shell">

    {{-- ─── SIDEBAR ─────────────────────────────────────────── --}}
    @include('admin.partials.sidebar')

    {{-- ─── MAIN AREA ────────────────────────────────────────── --}}
    <div class="admin-main" id="adminMain">

        {{-- TOPBAR --}}
        @include('admin.partials.navbar')

        {{-- PAGE CONTENT --}}
        <main class="admin-content">
            @include('admin.partials.alerts')
            @yield('content')
        </main>

        {{-- FOOTER --}}
        @include('admin.partials.footer')
    </div>
</div>

{{-- Mobile sidebar backdrop --}}
<div id="sidebarBackdrop" class="sidebar-backdrop hidden" onclick="closeSidebar()"></div>

@yield('scripts')
</body>
</html>