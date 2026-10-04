<!-- BOOKING APPOINTMENT MODAL -->
<div id="bookingModal" class="fixed inset-0 z-50 items-center justify-center bg-black/70 backdrop-blur-sm hidden p-4 opacity-0 transition-opacity duration-300">
    <div class="bg-white w-full max-w-md rounded-2xl shadow-2xl overflow-hidden transform scale-95 transition-transform duration-300" id="bookingModalContent">
        <!-- Modal Header -->
        <div class="bg-barber-black px-6 py-4 flex items-center justify-between text-white border-b border-gray-800">
            <div class="flex items-center gap-2">
                <i class="bi bi-scissors text-barber-red text-lg"></i>
                <h3 class="font-bold text-sm tracking-wider uppercase">Book An Appointment</h3>
            </div>
            <button onclick="closeBookingModal()" type="button" class="text-gray-400 hover:text-white text-xl leading-none cursor-pointer">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>

        @guest
        <!-- Guest Notice: Arahkan ke Login Terlebih Dahulu -->
        <div class="p-8 text-center space-y-4">
            <div class="w-16 h-16 rounded-2xl bg-red-50 text-barber-red flex items-center justify-center mx-auto border border-red-100 shadow-sm">
                <i class="bi bi-shield-lock-fill text-3xl"></i>
            </div>
            <div>
                <h4 class="text-xl font-bold text-gray-900">Login Terlebih Dahulu</h4>
                <p class="text-xs text-gray-600 mt-2 leading-relaxed">
                    Untuk melakukan reservasi jadwal potong rambut, silakan masuk ke akun Anda atau daftar sebagai member baru.
                </p>
            </div>
            <div class="pt-3 space-y-2.5">
                <a href="{{ route('login') }}" class="w-full py-3.5 bg-barber-red hover:bg-barber-darkred text-white text-xs font-bold uppercase tracking-wider rounded-xl shadow-md hover:shadow-red-600/30 transition-all duration-200 flex items-center justify-center gap-2">
                    <i class="bi bi-box-arrow-in-right text-base"></i> Masuk / Login Sekarang
                </a>
                <a href="{{ route('user.register') }}" class="w-full py-3 bg-gray-100 hover:bg-gray-200 text-gray-800 text-xs font-bold uppercase tracking-wider rounded-xl transition-all duration-200 block text-center">
                    Daftar Akun Baru
                </a>
            </div>
        </div>
        @else
        <!-- Modal Form untuk User yang Sudah Login -->
        <form onsubmit="handleBookingSubmit(event)" class="p-6 space-y-4 text-left">
            <div>
                <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1">Nama Lengkap</label>
                <input type="text" id="custName" required value="{{ auth()->user()->name }}" class="w-full text-xs px-3.5 py-2.5 border border-gray-300 rounded-xl focus:border-barber-red focus:ring-1 focus:ring-barber-red outline-none">
            </div>

            <div>
                <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1">Nomor WhatsApp</label>
                <input type="tel" id="custPhone" required value="{{ auth()->user()->phone ?? '' }}" placeholder="Contoh: 08123456789" class="w-full text-xs px-3.5 py-2.5 border border-gray-300 rounded-xl focus:border-barber-red focus:ring-1 focus:ring-barber-red outline-none">
            </div>

            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1">Layanan</label>
                    <select id="custService" class="w-full text-xs px-3 py-2.5 border border-gray-300 rounded-xl focus:border-barber-red focus:ring-1 focus:ring-barber-red outline-none bg-white">
                        <option value="Hair Cut">Hair Cut (Rp 25.000)</option>
                        <option value="Gentlemen Cut + Wash">Hair Cut + Wash (Rp 35.000)</option>
                        <option value="Beard Trim & Shave">Beard Trim & Shave (Rp 45.000)</option>
                        <option value="Hair Styling & Spa">Hair Styling & Spa (Rp 85.000)</option>
                        <option value="Royal Grooming Package">Royal Grooming Package (Rp 120.000)</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1">Barber</label>
                    <select id="custBarber" class="w-full text-xs px-3 py-2.5 border border-gray-300 rounded-xl focus:border-barber-red focus:ring-1 focus:ring-barber-red outline-none bg-white">
                        <option value="Bebas / Siapapun">Bebas / Siapapun</option>
                        <option value="Mas Gatot (Senior Barber)">Mas Gatot (Senior Barber)</option>
                        <option value="Farhan (Stylist)">Farhan (Stylist)</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1">Tanggal</label>
                    <input type="date" id="custDate" required value="{{ date('Y-m-d') }}" min="{{ date('Y-m-d') }}" class="w-full text-xs px-3 py-2 border border-gray-300 rounded-xl focus:border-barber-red focus:ring-1 focus:ring-barber-red outline-none bg-white">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1">Jam</label>
                    <select id="custTime" class="w-full text-xs px-3 py-2.5 border border-gray-300 rounded-xl focus:border-barber-red focus:ring-1 focus:ring-barber-red outline-none bg-white">
                        <option>10:00 WIB</option>
                        <option>11:00 WIB</option>
                        <option>13:00 WIB</option>
                        <option selected>14:00 WIB</option>
                        <option>15:00 WIB</option>
                        <option>16:00 WIB</option>
                        <option>17:00 WIB</option>
                        <option>19:00 WIB</option>
                        <option>20:00 WIB</option>
                    </select>
                </div>
            </div>

            <div class="pt-3">
                <button type="submit" class="w-full py-3 bg-barber-red hover:bg-barber-darkred text-white text-xs font-bold uppercase tracking-wider rounded-xl shadow hover:shadow-red-600/30 transition-all duration-200 flex items-center justify-center gap-2 cursor-pointer">
                    <i class="bi bi-whatsapp"></i> Konfirmasi Booking via WhatsApp
                </button>
            </div>
        </form>
        @endguest
    </div>
</div>