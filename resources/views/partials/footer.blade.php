<!-- FOOTER SECTION -->
<footer class="bg-gray-950 text-gray-400 pt-20 pb-8 border-t border-gray-800">
    <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 lg:gap-8 mb-16">
        
        <!-- Col 1: Brand Info -->
        <div class="space-y-5">
            <a href="{{ url('/') }}" class="flex items-center gap-2 text-white font-black tracking-widest text-xl uppercase">
                <span class="p-2 bg-barber-red rounded text-white flex items-center justify-center shadow-lg">
                    <i class="bi bi-scissors text-lg"></i>
                </span>
                <span>RUSDI BARBER</span>
            </a>
            <p class="text-sm text-gray-400 leading-relaxed pr-4">
                Barbershop pilihan pria modern yang mengutamakan kualitas potongan, pelayanan ramah, dan kenyamanan maksimal.
            </p>
            <div class="flex items-center gap-4 text-white pt-2">
                <a href="#" class="w-10 h-10 rounded-full bg-gray-900 border border-gray-800 flex items-center justify-center hover:bg-barber-red hover:border-barber-red transition-all duration-300">
                    <i class="bi bi-instagram"></i>
                </a>
                <a href="#" class="w-10 h-10 rounded-full bg-gray-900 border border-gray-800 flex items-center justify-center hover:bg-barber-red hover:border-barber-red transition-all duration-300">
                    <i class="bi bi-facebook"></i>
                </a>
                <a href="#" class="w-10 h-10 rounded-full bg-gray-900 border border-gray-800 flex items-center justify-center hover:bg-barber-red hover:border-barber-red transition-all duration-300">
                    <i class="bi bi-whatsapp text-lg"></i>
                </a>
            </div>
        </div>

        <!-- Col 2: Jam Operasional -->
        <div class="space-y-5">
            <h4 class="text-white text-sm font-bold uppercase tracking-wider relative inline-block">
                Jam Operasional
                <span class="absolute -bottom-2 left-0 w-1/2 h-0.5 bg-barber-red"></span>
            </h4>
            <ul class="text-sm space-y-3 text-gray-400 mt-6">
                <li class="flex justify-between border-b border-gray-800 pb-2"><span>Senin - Jumat:</span> <span class="text-white font-medium">10.00 - 21.00</span></li>
                <li class="flex justify-between border-b border-gray-800 pb-2"><span>Sabtu - Minggu:</span> <span class="text-white font-medium">09.00 - 22.00</span></li>
                <li class="pt-2 text-emerald-400 font-semibold flex items-center gap-2">
                    <i class="bi bi-check-circle-fill"></i> Buka Setiap Hari
                </li>
            </ul>
        </div>

        <!-- Col 3: Alamat & Kontak -->
        <div class="space-y-5">
            <h4 class="text-white text-sm font-bold uppercase tracking-wider relative inline-block">
                Lokasi Outlet
                <span class="absolute -bottom-2 left-0 w-1/2 h-0.5 bg-barber-red"></span>
            </h4>
            <div class="space-y-4 mt-6 text-sm text-gray-400">
                <div class="flex items-start gap-3">
                    <i class="bi bi-geo-alt-fill text-barber-red mt-1 text-lg"></i> 
                    <p class="leading-relaxed">Jl. Gentlemen Grooming No. 88, Jakarta Selatan, 12345</p>
                </div>
                <div class="flex items-center gap-3">
                    <i class="bi bi-telephone-fill text-barber-red text-lg"></i> 
                    <p>+62 812-3456-7890</p>
                </div>
            </div>
        </div>

        <!-- Col 4: Member Portal -->
        <div class="space-y-5">
            <h4 class="text-white text-sm font-bold uppercase tracking-wider relative inline-block">
                Member Club
                <span class="absolute -bottom-2 left-0 w-1/2 h-0.5 bg-barber-red"></span>
            </h4>
            <p class="text-sm text-gray-400 leading-relaxed mt-6">
                Daftar member VIP untuk mengumpulkan stempel dan klaim potongan rambut gratis di kunjungan ke-10!
            </p>
            <a href="{{ route('user.login') }}" class="inline-flex items-center justify-center w-full gap-2 px-6 py-3 bg-amber-500 hover:bg-amber-400 text-gray-950 font-bold text-sm uppercase tracking-wider rounded-xl transition-colors shadow-lg">
                <i class="bi bi-person-fill"></i> Portal Member
            </a>
        </div>

    </div>

    <!-- Copyright -->
    <div class="max-w-6xl mx-auto px-6 pt-8 border-t border-gray-900 text-center flex flex-col md:flex-row justify-between items-center gap-4">
        <p class="text-xs text-gray-500">
            &copy; {{ date('Y') }} Rusdi Barbershop. All Rights Reserved.
        </p>
        <div class="flex gap-4 text-xs text-gray-500">
            <a href="#" class="hover:text-white transition-colors">Privacy Policy</a>
            <a href="#" class="hover:text-white transition-colors">Terms of Service</a>
        </div>
    </div>
</footer>