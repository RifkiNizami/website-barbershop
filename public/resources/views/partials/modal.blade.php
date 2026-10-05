<!-- BOOKING APPOINTMENT MODAL (VANILLA HTML/CSS) -->
<div id="bookingModal" class="modal-overlay">
    <div id="bookingModalContent" class="modal-card">
        
        <!-- Modal Header -->
        <div class="modal-header">
            <div class="modal-title">
                <i class="bi bi-scissors"></i>
                <h3>Book An Appointment</h3>
            </div>
            <button onclick="closeBookingModal()" type="button" class="modal-close-btn" aria-label="Tutup Modal">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>

        @guest
        <!-- Guest Notice: Arahkan ke Login Terlebih Dahulu -->
        <div class="guest-notice">
            <div class="guest-icon-box">
                <i class="bi bi-shield-lock-fill"></i>
            </div>
            <div class="guest-text">
                <h4 class="guest-title">Login Terlebih Dahulu</h4>
                <p class="guest-desc">
                    Untuk melakukan reservasi jadwal potong rambut, silakan masuk ke akun Anda atau daftar sebagai member baru.
                </p>
            </div>
            <div class="guest-actions">
                <a href="{{ route('login') }}" class="btn-primary">
                    <i class="bi bi-box-arrow-in-right"></i> Masuk / Login Sekarang
                </a>
                <a href="{{ route('user.register') }}" class="btn-secondary">
                    Daftar Akun Baru
                </a>
            </div>
        </div>
        @else
        <!-- Form Booking untuk User yang Sudah Login -->
        <form onsubmit="handleBookingSubmit(event)" class="booking-form">
            <div class="form-group">
                <label for="custName" class="form-label">Nama Lengkap</label>
                <input type="text" id="custName" required value="{{ auth()->user()->name }}" class="form-input">
            </div>

            <div class="form-group">
                <label for="custPhone" class="form-label">Nomor WhatsApp</label>
                <input type="tel" id="custPhone" required value="{{ auth()->user()->phone ?? '' }}" placeholder="Contoh: 08123456789" class="form-input">
            </div>

            <!-- Baris 2 Kolom: Layanan & Barber -->
            <div class="form-grid">
                <div class="form-group">
                    <label for="custService" class="form-label">Layanan</label>
                    <select id="custService" class="form-select">
                        <option value="Hair Cut">Hair Cut (Rp 25.000)</option>
                        <option value="Gentlemen Cut + Wash">Hair Cut + Wash (Rp 35.000)</option>
                        <option value="Beard Trim & Shave">Beard Trim & Shave (Rp 45.000)</option>
                        <option value="Hair Styling & Spa">Hair Styling & Spa (Rp 85.000)</option>
                        <option value="Royal Grooming Package">Royal Grooming Package (Rp 120.000)</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="custBarber" class="form-label">Barber</label>
                    <select id="custBarber" class="form-select">
                        <option value="Bebas / Siapapun">Bebas / Siapapun</option>
                        <option value="Mas Gatot (Senior Barber)">Mas Gatot (Senior Barber)</option>
                        <option value="Farhan (Stylist)">Farhan (Stylist)</option>
                    </select>
                </div>
            </div>

            <!-- Baris 2 Kolom: Tanggal & Jam -->
            <div class="form-grid">
                <div class="form-group">
                    <label for="custDate" class="form-label">Tanggal</label>
                    <input type="date" id="custDate" required value="{{ date('Y-m-d') }}" min="{{ date('Y-m-d') }}" class="form-input">
                </div>

                <div class="form-group">
                    <label for="custTime" class="form-label">Jam</label>
                    <select id="custTime" class="form-select">
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

            <div class="form-submit-wrapper">
                <button type="submit" class="btn-primary">
                    <i class="bi bi-whatsapp"></i> Konfirmasi Booking via WhatsApp
                </button>
            </div>
        </form>
        @endguest
    </div>
</div>