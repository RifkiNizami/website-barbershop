<!-- ======================================================== -->
<!-- 4. GALERI FOTO KATALOG GAYA RAMBUT (LOOKBOOK HIGHLIGHTS) -->
<!-- ======================================================== -->
<section id="katalog" class="py-24 bg-zinc-950 text-white relative overflow-hidden border-t border-zinc-900 scroll-mt-16">
    <div id="gallery" class="absolute -top-20"></div>

    <!-- Ambient Glow Elements -->
    <div class="absolute top-1/4 -left-32 w-96 h-96 bg-barber-red/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-1/4 -right-32 w-96 h-96 bg-red-600/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-6xl mx-auto px-6 relative z-10">

        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto mb-12 reveal">
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full text-xs font-bold tracking-widest uppercase bg-barber-red/20 text-barber-red border border-barber-red/40 mb-3">
                <i class="bi bi-camera-fill"></i> Lookbook & Hairstyle Highlights
            </div>
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-black tracking-tight uppercase text-white mb-4">
                Katalog Foto Gaya Rambut
            </h2>
            <p class="text-sm md:text-base text-zinc-400 leading-relaxed mb-6">
                Beberapa potongan rambut terfavorit pria modern karya kapster kami. Klik <strong class="text-white">"Pilih Gaya"</strong> untuk mengisi formulir pemesanan, atau jelajahi galeri lengkap untuk koleksi gaya lainnya.
            </p>
            <a href="{{ route('gallery') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full text-xs font-bold uppercase tracking-wider bg-white/10 hover:bg-white hover:text-zinc-950 text-white border border-white/20 transition-all shadow-sm">
                <span>Buka Galeri Foto Lengkap (9+ Model)</span>
                <i class="bi bi-arrow-up-right"></i>
            </a>
        </div>

        <!-- Curated Highlight Photo Cards Grid (Top 4 Styles) -->
        <div id="catalogGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">

            <!-- 1. French Crop -->
            <div class="catalog-item catalog-card group flex flex-col bg-zinc-900 rounded-2xl border border-zinc-800 overflow-hidden shadow-lg hover:border-barber-red/50 reveal" data-category="crop">
                <div class="relative h-64 overflow-hidden bg-black cursor-pointer" onclick="openCatalogLightbox('{{ asset('images/style-crop.jpg') }}', 'Textured French Crop', 'FRENCH CROP', 'Poni tumpul horizontal dengan tekstur acak alami di bagian atas. Memberikan kesan muda, berani, dan sangat mudah diatur tanpa perlu pomade berlebih.')">
                    <img src="{{ asset('images/style-crop.jpg') }}" alt="Textured French Crop" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-black/20"></div>
                    <span class="absolute top-3 left-3 px-2.5 py-1 rounded-md text-[10px] font-extrabold uppercase tracking-wider bg-barber-red text-white shadow">
                        🔥 Trending
                    </span>
                    <div class="absolute bottom-3 right-3 text-xs text-white/90 bg-black/60 backdrop-blur-xs px-2.5 py-1 rounded-md font-mono">
                        40 Mnt &bull; Rp 55K
                    </div>
                </div>
                <div class="p-5 flex-1 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between gap-2 mb-1">
                            <h3 class="font-extrabold text-base text-white">Textured French Crop</h3>
                            <span class="text-[10px] uppercase font-bold text-zinc-400 bg-zinc-800 px-2 py-0.5 rounded">Crop</span>
                        </div>
                        <p class="text-xs text-zinc-400 leading-relaxed mb-4">
                            Poni tumpul horizontal dengan tekstur acak di bagian atas. Kesan fresh dan low-maintenance.
                        </p>
                        <div class="text-[11px] text-zinc-400 mb-4 flex items-center gap-1.5">
                            <i class="bi bi-person-badge text-barber-red"></i> Rekomendasi: <span class="text-zinc-200 font-semibold">Farhan (Fade Stylist)</span>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-2 pt-2 border-t border-zinc-800">
                        <button type="button" onclick="openCatalogLightbox('{{ asset('images/style-crop.jpg') }}', 'Textured French Crop', 'FRENCH CROP', 'Poni tumpul horizontal dengan tekstur acak alami di bagian atas. Memberikan kesan muda, berani, dan sangat mudah diatur tanpa perlu pomade berlebih.')" class="py-2 px-3 rounded-xl border border-zinc-700 bg-zinc-800 hover:bg-zinc-700 text-zinc-300 text-xs font-bold transition flex items-center justify-center gap-1 cursor-pointer">
                            <i class="bi bi-zoom-in"></i> Zoom
                        </button>
                        <button type="button" onclick="selectCatalogStyle('Textured French Crop', 'French Crop', '{{ asset('images/style-crop.jpg') }}', 'Rp 55.000', '40 Menit', 'Poni tumpul horizontal dengan tekstur acak di bagian atas. Kesan fresh dan low-maintenance.', 'Farhan', 'Gentleman Haircut & Styling')" class="py-2 px-3 rounded-xl bg-barber-red hover:bg-barber-darkred text-white text-xs font-bold transition flex items-center justify-center gap-1 shadow cursor-pointer">
                            <i class="bi bi-check2"></i> Pilih Gaya
                        </button>
                    </div>
                </div>
            </div>

            <!-- 2. Low Skin Taper Fade -->
            <div class="catalog-item catalog-card group flex flex-col bg-zinc-900 rounded-2xl border border-zinc-800 overflow-hidden shadow-lg hover:border-barber-red/50 reveal delay-100" data-category="fade">
                <div class="relative h-64 overflow-hidden bg-black cursor-pointer" onclick="openCatalogLightbox('{{ asset('images/style-fade.jpg') }}', 'Low Skin Taper Fade', 'FADE & TAPER', 'Gradasi halus dari kulit licin di samping dan belakang yang berpadu presisi ke rambut bagian atas. Pilihan utama untuk tampilan rapi dan maskulin.')">
                    <img src="{{ asset('images/style-fade.jpg') }}" alt="Low Skin Taper Fade" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-black/20"></div>
                    <span class="absolute top-3 left-3 px-2.5 py-1 rounded-md text-[10px] font-extrabold uppercase tracking-wider bg-zinc-800 text-amber-400 border border-amber-500/30 shadow">
                        ⚡ Clean Fade
                    </span>
                    <div class="absolute bottom-3 right-3 text-xs text-white/90 bg-black/60 backdrop-blur-xs px-2.5 py-1 rounded-md font-mono">
                        40 Mnt &bull; Rp 50K
                    </div>
                </div>
                <div class="p-5 flex-1 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between gap-2 mb-1">
                            <h3 class="font-extrabold text-base text-white">Low Skin Taper Fade</h3>
                            <span class="text-[10px] uppercase font-bold text-zinc-400 bg-zinc-800 px-2 py-0.5 rounded">Fade</span>
                        </div>
                        <p class="text-xs text-zinc-400 leading-relaxed mb-4">
                            Gradasi kulit samping presisi tinggi yang halus. Paling digemari untuk gaya harian kerja dan kuliah.
                        </p>
                        <div class="text-[11px] text-zinc-400 mb-4 flex items-center gap-1.5">
                            <i class="bi bi-person-badge text-barber-red"></i> Rekomendasi: <span class="text-zinc-200 font-semibold">Rusdi (Master Barber)</span>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-2 pt-2 border-t border-zinc-800">
                        <button type="button" onclick="openCatalogLightbox('{{ asset('images/style-fade.jpg') }}', 'Low Skin Taper Fade', 'FADE & TAPER', 'Gradasi halus dari kulit licin di samping dan belakang yang berpadu presisi ke rambut bagian atas. Pilihan utama untuk tampilan rapi dan maskulin.')" class="py-2 px-3 rounded-xl border border-zinc-700 bg-zinc-800 hover:bg-zinc-700 text-zinc-300 text-xs font-bold transition flex items-center justify-center gap-1 cursor-pointer">
                            <i class="bi bi-zoom-in"></i> Zoom
                        </button>
                        <button type="button" onclick="selectCatalogStyle('Low Skin Taper Fade', 'Fade & Taper', '{{ asset('images/style-fade.jpg') }}', 'Rp 50.000', '40 Menit', 'Gradasi kulit samping presisi tinggi yang halus. Paling digemari untuk gaya harian kerja dan kuliah.', 'Rusdi', 'Undercut & Taper Fade Precision')" class="py-2 px-3 rounded-xl bg-barber-red hover:bg-barber-darkred text-white text-xs font-bold transition flex items-center justify-center gap-1 shadow cursor-pointer">
                            <i class="bi bi-check2"></i> Pilih Gaya
                        </button>
                    </div>
                </div>
            </div>

            <!-- 3. Classic Pompadour Slick -->
            <div class="catalog-item catalog-card group flex flex-col bg-zinc-900 rounded-2xl border border-zinc-800 overflow-hidden shadow-lg hover:border-barber-red/50 reveal delay-200" data-category="classic">
                <div class="relative h-64 overflow-hidden bg-black cursor-pointer" onclick="openCatalogLightbox('{{ asset('images/service-haircut.jpg') }}', 'Classic Gentleman Pompadour', 'CLASSIC', 'Volume rambut atas disisir ke belakang dengan kilau pomade klasik. Gaya abadi yang selalu memberikan impresi berkelas.')">
                    <img src="{{ asset('images/service-haircut.jpg') }}" alt="Classic Pompadour" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-black/20"></div>
                    <span class="absolute top-3 left-3 px-2.5 py-1 rounded-md text-[10px] font-extrabold uppercase tracking-wider bg-zinc-800 text-zinc-200 border border-zinc-700 shadow">
                        💼 Formal
                    </span>
                    <div class="absolute bottom-3 right-3 text-xs text-white/90 bg-black/60 backdrop-blur-xs px-2.5 py-1 rounded-md font-mono">
                        45 Mnt &bull; Rp 65K
                    </div>
                </div>
                <div class="p-5 flex-1 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between gap-2 mb-1">
                            <h3 class="font-extrabold text-base text-white">Classic Pompadour</h3>
                            <span class="text-[10px] uppercase font-bold text-zinc-400 bg-zinc-800 px-2 py-0.5 rounded">Classic</span>
                        </div>
                        <p class="text-xs text-zinc-400 leading-relaxed mb-4">
                            Gaya rambut klimis bervolume disisir ke belakang. Elegan, rapi, dan mencerminkan wibawa sejati.
                        </p>
                        <div class="text-[11px] text-zinc-400 mb-4 flex items-center gap-1.5">
                            <i class="bi bi-person-badge text-barber-red"></i> Rekomendasi: <span class="text-zinc-200 font-semibold">Budi (Classic Style)</span>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-2 pt-2 border-t border-zinc-800">
                        <button type="button" onclick="openCatalogLightbox('{{ asset('images/service-haircut.jpg') }}', 'Classic Gentleman Pompadour', 'CLASSIC', 'Volume rambut atas disisir ke belakang dengan kilau pomade klasik. Gaya abadi yang selalu memberikan impresi berkelas.')" class="py-2 px-3 rounded-xl border border-zinc-700 bg-zinc-800 hover:bg-zinc-700 text-zinc-300 text-xs font-bold transition flex items-center justify-center gap-1 cursor-pointer">
                            <i class="bi bi-zoom-in"></i> Zoom
                        </button>
                        <button type="button" onclick="selectCatalogStyle('Classic Pompadour', 'Classic Style', '{{ asset('images/service-haircut.jpg') }}', 'Rp 65.000', '45 Menit', 'Gaya rambut klimis bervolume disisir ke belakang. Elegan, rapi, dan mencerminkan wibawa sejati.', 'Budi', 'Gentleman Haircut & Styling')" class="py-2 px-3 rounded-xl bg-barber-red hover:bg-barber-darkred text-white text-xs font-bold transition flex items-center justify-center gap-1 shadow cursor-pointer">
                            <i class="bi bi-check2"></i> Pilih Gaya
                        </button>
                    </div>
                </div>
            </div>

            <!-- 4. Beard Sculpting & Razor Fade -->
            <div class="catalog-item catalog-card group flex flex-col bg-zinc-900 rounded-2xl border border-zinc-800 overflow-hidden shadow-lg hover:border-barber-red/50 reveal delay-300" data-category="beard">
                <div class="relative h-64 overflow-hidden bg-black cursor-pointer" onclick="openCatalogLightbox('{{ asset('images/style-beard.jpg') }}', 'Beard Trim & Hot Shave', 'BEARD & SHAVE', 'Kombinasi potongan samping bersih dengan pembentukan garis brewok dan kumis simetris menggunakan handuk hangat & pisau steril.')">
                    <img src="{{ asset('images/style-beard.jpg') }}" alt="Beard Trim & Side Fade" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-black/20"></div>
                    <span class="absolute top-3 left-3 px-2.5 py-1 rounded-md text-[10px] font-extrabold uppercase tracking-wider bg-amber-500 text-zinc-950 font-black shadow">
                        👑 Gentleman
                    </span>
                    <div class="absolute bottom-3 right-3 text-xs text-white/90 bg-black/60 backdrop-blur-xs px-2.5 py-1 rounded-md font-mono">
                        30 Mnt &bull; Rp 45K
                    </div>
                </div>
                <div class="p-5 flex-1 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between gap-2 mb-1">
                            <h3 class="font-extrabold text-base text-white">Beard Sculpt & Shave</h3>
                            <span class="text-[10px] uppercase font-bold text-zinc-400 bg-zinc-800 px-2 py-0.5 rounded">Beard</span>
                        </div>
                        <p class="text-xs text-zinc-400 leading-relaxed mb-4">
                            Merapikan garis kumis dan brewok simetris dengan hot towel spa dan krim cukur eksklusif.
                        </p>
                        <div class="text-[11px] text-zinc-400 mb-4 flex items-center gap-1.5">
                            <i class="bi bi-person-badge text-barber-red"></i> Rekomendasi: <span class="text-zinc-200 font-semibold">Agung (Beard Specialist)</span>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-2 pt-2 border-t border-zinc-800">
                        <button type="button" onclick="openCatalogLightbox('{{ asset('images/style-beard.jpg') }}', 'Beard Trim & Hot Shave', 'BEARD & SHAVE', 'Kombinasi potongan samping bersih dengan pembentukan garis brewok dan kumis simetris menggunakan handuk hangat & pisau steril.')" class="py-2 px-3 rounded-xl border border-zinc-700 bg-zinc-800 hover:bg-zinc-700 text-zinc-300 text-xs font-bold transition flex items-center justify-center gap-1 cursor-pointer">
                            <i class="bi bi-zoom-in"></i> Zoom
                        </button>
                        <button type="button" onclick="selectCatalogStyle('Beard Sculpt & Hot Shave', 'Beard & Shave', '{{ asset('images/style-beard.jpg') }}', 'Rp 45.000', '30 Menit', 'Merapikan garis kumis dan brewok simetris dengan hot towel spa dan krim cukur eksklusif.', 'Agung', 'Beard Trim & Hot Towel Shave')" class="py-2 px-3 rounded-xl bg-barber-red hover:bg-barber-darkred text-white text-xs font-bold transition flex items-center justify-center gap-1 shadow cursor-pointer">
                            <i class="bi bi-check2"></i> Pilih Gaya
                        </button>
                    </div>
                </div>
            </div>

        </div>

        <!-- Call to Action leading to Full Gallery & Quick Booking Form -->
        <div class="mt-8 mb-4 flex flex-col sm:flex-row items-center justify-center gap-4 text-center reveal">
            <a href="{{ route('gallery') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2.5 px-8 py-3.5 rounded-full text-xs font-bold uppercase tracking-wider bg-white hover:bg-zinc-200 text-zinc-950 transition-all duration-300 shadow-xl shadow-white/10 hover:-translate-y-0.5 group">
                <span>Lihat Semua Portofolio Foto (9+ Model)</span>
                <i class="bi bi-arrow-right group-hover:translate-x-1 transition-transform"></i>
            </a>
            <a href="#form-katalog" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-full text-xs font-bold uppercase tracking-wider bg-zinc-900 hover:bg-zinc-800 text-zinc-300 border border-zinc-800 transition-all">
                <span>Formulir Reservasi Model</span>
                <i class="bi bi-arrow-down"></i>
            </a>
        </div>

    </div>

    {{-- LIGHTBOX MODAL FULLSCREEN UNTUK ZOOM FOTO KATALOG --}}
    <div id="catalogLightboxModal" class="fixed inset-0 z-50 items-center justify-center bg-black/85 backdrop-blur-md hidden p-4 opacity-0 transition-opacity duration-300 flex">
        <div class="bg-zinc-900 border border-zinc-800 w-full max-w-2xl rounded-3xl overflow-hidden shadow-2xl relative text-left">
            <button type="button" onclick="closeCatalogLightbox()" class="absolute top-4 right-4 z-10 w-9 h-9 rounded-full bg-black/70 hover:bg-black text-zinc-300 hover:text-white flex items-center justify-center transition cursor-pointer">
                <i class="bi bi-x-lg text-sm"></i>
            </button>
            <div class="relative max-h-[70vh] overflow-hidden bg-black flex items-center justify-center">
                <img id="lightboxImg" src="" alt="Pratinjau Foto" class="max-w-full max-h-[70vh] object-contain">
            </div>
            <div class="p-6 bg-zinc-900 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 border-t border-zinc-800">
                <div>
                    <span id="lightboxTag" class="text-[10px] uppercase font-bold text-barber-red bg-barber-red/10 border border-barber-red/30 px-2.5 py-0.5 rounded-full inline-block mb-1">
                        KATALOG GAYA
                    </span>
                    <h4 id="lightboxTitle" class="text-xl font-black text-white">Judul Gaya</h4>
                    <p id="lightboxDesc" class="text-xs text-zinc-400 mt-1 max-w-md">Deskripsi potongan rambut.</p>
                </div>
                <button type="button" onclick="closeCatalogLightbox(); document.getElementById('form-katalog')?.scrollIntoView({behavior:'smooth'});" class="px-5 py-2.5 bg-barber-red hover:bg-barber-darkred text-white text-xs font-bold uppercase tracking-wider rounded-xl shadow transition shrink-0 cursor-pointer">
                    Pilih Gaya Ini &darr;
                </button>
            </div>
        </div>
    </div>
</section>
