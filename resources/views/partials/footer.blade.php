<!-- FOOTER SECTION -->
<footer class="bg-barber-black text-gray-400 py-16 border-t border-gray-800">
    <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-10">
        
        <!-- Col 1: Brand Info -->
        <div class="space-y-4">
            <a href="{{ url('/') }}" class="flex items-center gap-2 text-white font-black tracking-widest text-lg uppercase">
                <span class="p-1 bg-barber-red rounded text-white flex items-center justify-center">
                    <i class="bi bi-scissors text-base"></i>
                </span>
                <span>RUSDI BARBER</span>
            </a>
            <p class="text-xs text-gray-400 leading-relaxed">
                Barbershop pilihan pria modern yang mengutamakan kualitas potongan, pelayanan ramah, dan kenyamanan maksimal.
            </p>
            <div class="flex items-center gap-3 text-white text-sm">
                <a href="#" class="w-8 h-8 rounded-full bg-gray-800 flex items-center justify-center hover:bg-barber-red transition">
                    <i class="bi bi-instagram"></i>
                </a>
                <a href="#" class="w-8 h-8 rounded-full bg-gray-800 flex items-center justify-center hover:bg-barber-red transition">
                    <i class="bi bi-facebook"></i>
                </a>
                <a href="#" class="w-8 h-8 rounded-full bg-gray-800 flex items-center justify-center hover:bg-barber-red transition">
                    <i class="bi bi-whatsapp"></i>
                </a>
            </div>
        </div>

        <!-- Col 2: Jam Operasional -->
        <div class="space-y-3">
            <h4 class="text-white text-xs font-bold uppercase tracking-wider">Jam Operasional</h4>
            <ul class="text-xs space-y-2 text-gray-400">
                <li class="flex justify-between"><span>Senin - Jumat:</span> <span class="text-white">10.00 - 21.00</span></li>
                <li class="flex justify-between"><span>Sabtu - Minggu:</span> <span class="text-white">09.00 - 22.00</span></li>
                <li class="pt-2 text-emerald-400 font-semibold flex items-center gap-1">
                    <i class="bi bi-check-circle-fill"></i> Buka Setiap Hari
                </li>
            </ul>
        </div>

        <!-- Col 3: Alamat & Kontak -->
        <div class="space-y-3">
            <h4 class="text-white text-xs font-bold uppercase tracking-wider">Lokasi Outlet</h4>
            <p class="text-xs text-gray-400 leading-relaxed">
                <i class="bi bi-geo-alt-fill text-barber-red mr-1"></i> Jl. Gentlemen Grooming No. 88, Jakarta Selatan
            </p>
            <p class="text-xs text-gray-400">
                <i class="bi bi-telephone-fill text-barber-red mr-1"></i> +62 812-3456-7890
            </p>
        </div>

        <!-- Col 4: Member Portal -->
        <div class="space-y-3">
            <h4 class="text-white text-xs font-bold uppercase tracking-wider">Member Club</h4>
            <p class="text-xs text-gray-400 leading-relaxed">
                Daftar member VIP untuk kumpulkan stempel dan klaim potong rambut gratis!
            </p>
            <a href="{{ route('user.login') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-amber-500 hover:bg-amber-400 text-gray-950 font-bold text-xs uppercase tracking-wider rounded-xl transition shadow">
                <i class="bi bi-person-fill"></i> Login Member
            </a>
        </div>

    </div>

    <div class="max-w-6xl mx-auto px-6 mt-12 pt-6 border-t border-gray-800/80 text-center text-xs text-gray-500">
        &copy; {{ date('Y') }} Rusdi Barbershop. All Rights Reserved.
    </div>
</footer>