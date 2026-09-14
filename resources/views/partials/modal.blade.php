<!-- BOOKING APPOINTMENT MODAL -->
<div id="bookingModal" class="fixed inset-0 z-50 items-center justify-center bg-black/70 backdrop-blur-sm hidden p-4 opacity-0 transition-opacity duration-300">
    <div class="bg-white w-full max-w-md rounded-lg shadow-2xl overflow-hidden transform scale-95 transition-transform duration-300" id="bookingModalContent">
        <!-- Modal Header -->
        <div class="bg-barber-black px-6 py-4 flex items-center justify-between text-white border-b border-gray-800">
            <div class="flex items-center gap-2">
                <span class="w-2.5 h-2.5 rounded-full bg-barber-red"></span>
                <h3 class="font-bold text-sm tracking-wider uppercase">Book An Appointment</h3>
            </div>
            <button onclick="closeBookingModal()" type="button" class="text-gray-400 hover:text-white text-xl leading-none">&times;</button>
        </div>

        <!-- Modal Form -->
        <form onsubmit="handleBookingSubmit(event)" class="p-6 space-y-4 text-left">
            <div>
                <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1">Nama Lengkap</label>
                <input type="text" id="custName" required placeholder="Contoh: Budi Santoso" class="w-full text-xs px-3.5 py-2.5 border border-gray-300 rounded focus:border-barber-red focus:ring-1 focus:ring-barber-red outline-none">
            </div>

            <div>
                <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1">Nomor WhatsApp</label>
                <input type="tel" id="custPhone" required placeholder="Contoh: 08123456789" class="w-full text-xs px-3.5 py-2.5 border border-gray-300 rounded focus:border-barber-red focus:ring-1 focus:ring-barber-red outline-none">
            </div>

            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1">Layanan</label>
                    <select id="custService" class="w-full text-xs px-3 py-2.5 border border-gray-300 rounded focus:border-barber-red focus:ring-1 focus:ring-barber-red outline-none bg-white">
                        <option value="Hair Cut">Hair Cut (Rp 35.000)</option>
                        <option value="Hair Cut + Wash + Tonic">Hair Cut + Wash + Tonic (Rp 50.000)</option>
                        <option value="Gentlemen's Cut + Styling">Gentlemen's Cut (Rp 65.000)</option>
                        <option value="Hair Styling & Spa">Hair Styling & Spa</option>
                        <option value="Full Package">Full Package (Rp 120.000)</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1">Barber</label>
                    <select id="custBarber" class="w-full text-xs px-3 py-2.5 border border-gray-300 rounded focus:border-barber-red focus:ring-1 focus:ring-barber-red outline-none bg-white">
                        <option value="Bebas / Siapapun">Bebas / Siapapun</option>
                        <option value="Mas Rusdi (Senior Barber)">Mas Rusdi (Senior Barber)</option>
                        <option value="Mas Dedi (Stylist)">Mas Dedi (Stylist)</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1">Tanggal</label>
                    <input type="date" id="custDate" required class="w-full text-xs px-3 py-2 border border-gray-300 rounded focus:border-barber-red focus:ring-1 focus:ring-barber-red outline-none bg-white">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1">Jam</label>
                    <select id="custTime" class="w-full text-xs px-3 py-2.5 border border-gray-300 rounded focus:border-barber-red focus:ring-1 focus:ring-barber-red outline-none bg-white">
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
                <button type="submit" class="w-full py-3 bg-barber-red hover:bg-barber-darkred text-white text-xs font-bold uppercase tracking-wider rounded shadow hover:shadow-red-600/30 transition-all duration-200">
                    Konfirmasi Booking via WhatsApp
                </button>
            </div>
        </form>
    </div>
</div>

<!-- SCRIPT LOGIC -->
<script>
    // Set default date to today
    document.addEventListener('DOMContentLoaded', () => {
        const today = new Date().toISOString().split('T')[0];
        const dateInput = document.getElementById('custDate');
        if (dateInput) {
            dateInput.value = today;
            dateInput.min = today;
        }
    });

    // Mobile Menu Toggle
    const mobileBtn = document.getElementById('mobileMenuBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    mobileBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });

    // Close mobile menu on click
    document.querySelectorAll('.mobile-link').forEach(link => {
        link.addEventListener('click', () => {
            mobileMenu.classList.add('hidden');
        });
    });

    // Booking Modal functions
    const modal = document.getElementById('bookingModal');
    const modalContent = document.getElementById('bookingModalContent');

    function openBookingModal() {
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            modalContent.classList.remove('scale-95');
            modalContent.classList.add('scale-100');
        }, 10);
    }

    function closeBookingModal() {
        modal.classList.add('opacity-0');
        modalContent.classList.remove('scale-100');
        modalContent.classList.add('scale-95');
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }

    // Close on background click
    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            closeBookingModal();
        }
    });

    // Handle Booking Submit
    function handleBookingSubmit(e) {
        e.preventDefault();
        const name = document.getElementById('custName').value;
        const phone = document.getElementById('custPhone').value;
        const service = document.getElementById('custService').value;
        const barber = document.getElementById('custBarber').value;
        const date = document.getElementById('custDate').value;
        const time = document.getElementById('custTime').value;

        const text = `Halo Rusdi Barbershop, saya ingin konfirmasi booking:%0A%0A- Nama: ${name}%0A- No. HP: ${phone}%0A- Layanan: ${service}%0A- Barber: ${barber}%0A- Tanggal: ${date}%0A- Waktu: ${time}%0A%0ATerima kasih!`;
        
        // Redirect to WhatsApp with prefilled message
        const waUrl = `https://wa.me/6281234567890?text=${text}`;
        window.open(waUrl, '_blank');
        closeBookingModal();
    }
</script>