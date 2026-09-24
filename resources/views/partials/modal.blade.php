<!-- BOOKING APPOINTMENT MODAL -->
<div id="bookingModal" class="fixed inset-0 z-50 items-center justify-center bg-black/70 backdrop-blur-sm hidden p-4 opacity-0 transition-opacity duration-300">
    <div class="bg-white w-full max-w-md rounded-2xl shadow-2xl overflow-hidden transform scale-95 transition-transform duration-300" id="bookingModalContent">
        <!-- Modal Header -->
        <div class="bg-barber-black px-6 py-4 flex items-center justify-between text-white border-b border-gray-800">
            <div class="flex items-center gap-2">
                <i class="bi bi-scissors text-barber-red text-lg"></i>
                <h3 class="font-bold text-sm tracking-wider uppercase">Book An Appointment</h3>
            </div>
            <button onclick="closeBookingModal()" type="button" class="text-gray-400 hover:text-white text-xl leading-none">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>

        <!-- Modal Form -->
        <form onsubmit="handleBookingSubmit(event)" class="p-6 space-y-4 text-left">
            <div>
                <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1">Nama Lengkap</label>
                <input type="text" id="custName" required placeholder="Contoh: Budi Santoso" class="w-full text-xs px-3.5 py-2.5 border border-gray-300 rounded-xl focus:border-barber-red focus:ring-1 focus:ring-barber-red outline-none">
            </div>

            <div>
                <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1">Nomor WhatsApp</label>
                <input type="tel" id="custPhone" required placeholder="Contoh: 08123456789" class="w-full text-xs px-3.5 py-2.5 border border-gray-300 rounded-xl focus:border-barber-red focus:ring-1 focus:ring-barber-red outline-none">
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
                    <input type="date" id="custDate" required class="w-full text-xs px-3 py-2 border border-gray-300 rounded-xl focus:border-barber-red focus:ring-1 focus:ring-barber-red outline-none bg-white">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1">Jam</label>
                    <select id="custTime" class="w-full text-xs px-3 py-2.5 border border-gray-300 rounded-xl focus:border-barber-red focus:ring-1 focus:ring-barber-red outline-none bg-white">
                        <option>10:00 WIB</option>
                        <option>11:00 WIB</option>
                        <option>13:00 WIB</option>
                        <option>14:00 WIB</option>
                        <option>15:00 WIB</option>
                        <option>16:00 WIB</option>
                        <option>17:00 WIB</option>
                        <option>19:00 WIB</option>
                        <option>20:00 WIB</option>
                    </select>
                </div>
            </div>

            <div class="pt-3">
                <button type="submit" class="w-full py-3 bg-barber-red hover:bg-barber-darkred text-white text-xs font-bold uppercase tracking-wider rounded-xl shadow hover:shadow-red-600/30 transition-all duration-200 flex items-center justify-center gap-2">
                    <i class="bi bi-whatsapp"></i> Konfirmasi Booking via WhatsApp
                </button>
            </div>
        </form>
    </div>
</div>