<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Black Crown - Admin Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/admin.js'])
</head>
<body class="bg-slate-900 text-slate-100 font-sans antialiased">
    <div class="min-h-screen flex flex-col md:flex-row">
        <!-- Sidebar -->
        @include('admin.partials.sidebar')

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
            <!-- Navbar -->
            @include('admin.partials.navbar')

            <!-- Alerts -->
            @include('admin.partials.alerts')

            <!-- Dynamic Content -->
            <main class="flex-1 overflow-y-auto p-4 md:p-6 bg-slate-950">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>