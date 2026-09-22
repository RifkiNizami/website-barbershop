<!-- FOOTER SECTION — Black & White Monochromatic Barbershop Footer -->
<footer class="bg-black text-zinc-400 pt-10 pb-6 border-t border-zinc-900">
    <div class="max-w-6xl mx-auto px-6">
        
        {{-- Main Footer Content (3 Columns) --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 lg:gap-12 pb-8">
            
            {{-- Col 1: Brand & Socials --}}
            <div class="space-y-3">
                <a href="{{ url('/') }}" class="inline-flex items-center gap-2 text-white font-extrabold tracking-wider text-lg uppercase">
                    <span class="w-7 h-7 rounded-md bg-white text-black flex items-center justify-center text-sm font-black shadow-sm">
                        <i class="bi bi-scissors"></i>
                    </span>
                    <span>Black Crown BARBER</span>
                </a>
                <p class="text-xs text-zinc-400 leading-relaxed pr-2">
                    Barbershop pilihan pria modern dengan mengutamakan kualitas potongan, pelayanan ramah, dan kenyamanan maksimal.
                </p>
                {{-- Black & White social icon buttons --}}
                <div class="flex items-center gap-2.5 pt-1">
                    <a href="#" aria-label="Instagram" class="w-8 h-8 rounded-full bg-zinc-900 border border-zinc-800 flex items-center justify-center text-zinc-400 hover:text-black hover:bg-white hover:border-white transition-all text-xs">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="#" aria-label="Facebook" class="w-8 h-8 rounded-full bg-zinc-900 border border-zinc-800 flex items-center justify-center text-zinc-400 hover:text-black hover:bg-white hover:border-white transition-all text-xs">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="#" aria-label="WhatsApp" class="w-8 h-8 rounded-full bg-zinc-900 border border-zinc-800 flex items-center justify-center text-zinc-400 hover:text-black hover:bg-white hover:border-white transition-all text-xs">
                        <i class="bi bi-whatsapp"></i>
                    </a>
                </div>
            </div>

            {{-- Col 2: Jam Operasional --}}
            <div class="space-y-2.5">
                <h4 class="text-white text-xs font-bold uppercase tracking-wider">
                    Jam Operasional
                </h4>
                <div class="text-xs space-y-1.5 text-zinc-400">
                    <div class="flex justify-between items-center max-w-xs">
                        <span>Senin – Jumat</span>
                        <span class="text-white font-medium font-mono">10.00 – 21.00</span>
                    </div>
                    <div class="flex justify-between items-center max-w-xs">
                        <span>Sabtu – Minggu</span>
                        <span class="text-white font-medium font-mono">09.00 – 22.00</span>
                    </div>
                    <p class="text-[11px] text-zinc-300 font-medium pt-1 flex items-center gap-1.5">
                        <i class="bi bi-check2-circle text-white"></i> Buka Setiap Hari
                    </p>
                </div>
            </div>

            {{-- Col 3: Lokasi, Kontak & Member Link --}}
            <div class="space-y-2.5">
                <h4 class="text-white text-xs font-bold uppercase tracking-wider">
                    Lokasi & Kontak
                </h4>
                <div class="text-xs space-y-2 text-zinc-400">
                    <div class="flex items-start gap-2">
                        <i class="bi bi-geo-alt text-white mt-0.5 text-xs shrink-0"></i>
                        <span>Jl. Gentleman Grooming No. 88, Jakarta Selatan, 12345</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="bi bi-telephone text-white text-xs shrink-0"></i>
                        <span class="font-mono text-zinc-300">+62 812-3456-7890</span>
                    </div>
                    <div class="pt-1">
                        <a href="{{ route('login') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-white hover:text-zinc-300 transition-colors">
                            <span>Member Area</span>
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

        </div>

        {{-- Thin Horizontal Divider --}}
        <div class="border-t border-zinc-900 pt-5 pb-2 flex flex-col sm:flex-row justify-between items-center gap-3 text-xs text-zinc-500">
            <p>&copy; {{ date('Y') }} Black Crown Barbershop. All rights reserved.</p>
            <div class="flex gap-4 text-xs">
                <a href="#" class="hover:text-zinc-300 transition-colors">Privacy Policy</a>
                <span>·</span>
                <a href="#" class="hover:text-zinc-300 transition-colors">Terms of Service</a>
            </div>
        </div>

    </div>
</footer>