<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Barbershop</title>
    <!-- Gunakan ini untuk testing, atau @vite('resources/css/app.css') di Laravel -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<!-- 1. Body diubah menjadi flex-col agar bersusun atas-bawah -->
<body class="bg-white min-h-screen flex flex-col">

    <!-- 2. Bagian Utama (Main) dibungkus flex-grow agar mengisi sisa tinggi layar -->
    <main class="flex-grow flex w-full">

        <!-- Bagian Kiri: Gambar (Hidden di mobile, 50% di desktop) -->
        <!-- Pastikan gambar Anda benar-benar ada di folder public/images/bg-login.jpg -->
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

                <!-- Pesan Berhasil (Jika ada dari backend) -->
                <!-- Letakkan notifikasi berhasil di sini jika Anda pakai session -->

                <!-- Form -->
                <form action="/login" method="POST">
                    @csrf

                    <!-- Input Email -->
                    <div class="mb-6">
                        <label for="email" class="block text-sm font-bold text-slate-800 mb-2">Email Address</label>
                        <input type="email" id="email" name="email" class="w-full px-4 py-3 bg-gray-200 border-transparent rounded-lg focus:bg-white focus:border-slate-500 focus:ring-2 focus:ring-slate-500 focus:outline-none transition-colors" required>
                    </div>

                    <!-- Input Password -->
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

    @include('partials.footer')

</body>
</html>
