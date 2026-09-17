<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Barbershop</title>

    <!-- Include Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<!-- Ubah flex menjadi flex-col agar footer berada di bawah -->
<body class="bg-white min-h-screen flex flex-col">

    <!-- Kontainer utama form dibuat flex-1 agar mengisi sisa ruang (mendorong footer ke dasar) -->
    <main class="flex flex-1">

        <!-- Bagian Kiri: Gambar Background -->
        <div class="hidden md:block md:w-1/2 bg-cover bg-center" style="background-image: url('{{ asset('images/bg-login.jpg') }}');">
        </div>

        <!-- Bagian Kanan: Form Login -->
        <div class="w-full md:w-1/2 flex items-center justify-center p-8 lg:p-16">
            <div class="w-full max-w-md">

                <!-- Judul & Subjudul -->
                <div class="text-center mb-10">
                    <h1 class="text-3xl font-bold text-slate-800 mb-2">Brand</h1>
                    <p class="text-gray-500 text-lg">Welcome back!</p>
                </div>

                <!-- PESAN SUKSES LOGIN -->
                @if (session('success'))
                    <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg text-sm text-center font-bold">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- PESAN ERROR LOGIN -->
                @if ($errors->any())
                    <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg text-sm text-center font-bold">
                        Username atau password salah
                    </div>
                @endif

                <!-- Form -->
                <form action="{{ route('login.post') }}" method="POST">
                    <!-- Perbaikan tag CSRF -->
                    @csrf

                    <!-- Input Email -->
                    <div class="mb-6">
                        <label for="email" class="block text-sm font-bold text-slate-800 mb-2">Email Address</label>
                        <!-- Tambahkan value old('email') agar email tidak hilang saat salah input -->
                        <input type="email" id="email" name="email" value="{{ old('email') }}" class="w-full px-4 py-3 bg-gray-200 border-transparent rounded-lg focus:bg-white focus:border-slate-500 focus:ring-2 focus:ring-slate-500 focus:outline-none transition-colors" required>
                    </div>

                    <!-- Input Password & Link Lupa Password -->
                    <div class="mb-8">
                        <div class="flex justify-between items-center mb-2">
                            <label for="password" class="block text-sm font-bold text-slate-800">Password</label>
                            <a href="#" class="text-sm text-gray-500 hover:text-slate-800 transition-colors">Forget Password?</a>
                        </div>
                        <input type="password" id="password" name="password" class="w-full px-4 py-3 bg-gray-200 border-transparent rounded-lg focus:bg-white focus:border-slate-500 focus:ring-2 focus:ring-slate-500 focus:outline-none transition-colors" required>
                    </div>

                    <!-- Tombol Login -->
                    <button type="submit" class="w-full bg-[#363b4e] text-white font-bold py-3 px-4 rounded-lg hover:bg-slate-800 transition duration-300">
                        Login
                    </button>
                </form>

                <!-- Divider (Atau Daftar) -->
                <div class="flex items-center mt-8">
                    <hr class="flex-grow border-gray-200">
                    <span class="mx-4 text-xs font-semibold text-gray-400 uppercase tracking-widest hover:text-slate-600 cursor-pointer transition-colors">
                        <a href="/register">Or Sign Up</a>
                    </span>
                    <hr class="flex-grow border-gray-200">
                </div>

            </div>
        </div>
    </main>

    <!-- Include Footer di bagian paling bawah -->
    @include('partials.footer')

</body>
</html>
