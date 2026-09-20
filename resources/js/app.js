// JavaScript existing & animasi baru untuk Rusdi Barbershop
document.addEventListener('DOMContentLoaded', () => {
    // 1. Landing Page Booking Date Default
    const today = new Date().toISOString().split('T')[0];
    const dateInput = document.getElementById('custDate');
    if (dateInput) {
        dateInput.value = today;
        dateInput.min = today;
    }

    // 2. Mobile Menu Toggle (Landing Page)
    const mobileBtn = document.getElementById('mobileMenuBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    if (mobileBtn && mobileMenu) {
        mobileBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        document.querySelectorAll('.mobile-link').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
            });
        });
    }

    // 3. Admin Mobile Sidebar Toggle
    const adminSidebar = document.getElementById('adminSidebar');
    const adminBackdrop = document.getElementById('sidebarBackdrop');
    const openAdminBtn = document.getElementById('openSidebarBtn');
    const closeAdminBtn = document.getElementById('closeSidebarBtn');

    if (openAdminBtn && adminSidebar) {
        openAdminBtn.addEventListener('click', () => {
            adminSidebar.classList.remove('-translate-x-full');
            if (adminBackdrop) adminBackdrop.classList.remove('hidden');
        });
    }

    if (closeAdminBtn && adminSidebar) {
        closeAdminBtn.addEventListener('click', () => {
            adminSidebar.classList.add('-translate-x-full');
            if (adminBackdrop) adminBackdrop.classList.add('hidden');
        });
    }

    if (adminBackdrop && adminSidebar) {
        adminBackdrop.addEventListener('click', () => {
            adminSidebar.classList.add('-translate-x-full');
            adminBackdrop.classList.add('hidden');
        });
    }

    // 4. User / Member Mobile Sidebar Toggle
    const userSidebar = document.getElementById('userSidebar');
    const userBackdrop = document.getElementById('userSidebarBackdrop');
    const openUserBtn = document.getElementById('openUserSidebarBtn');
    const closeUserBtn = document.getElementById('closeUserSidebarBtn');

    if (openUserBtn && userSidebar) {
        openUserBtn.addEventListener('click', () => {
            userSidebar.classList.remove('-translate-x-full');
            if (userBackdrop) userBackdrop.classList.remove('hidden');
        });
    }

    if (closeUserBtn && userSidebar) {
        closeUserBtn.addEventListener('click', () => {
            userSidebar.classList.add('-translate-x-full');
            if (userBackdrop) userBackdrop.classList.add('hidden');
        });
    }

    if (userBackdrop && userSidebar) {
        userBackdrop.addEventListener('click', () => {
            userSidebar.classList.add('-translate-x-full');
            userBackdrop.classList.add('hidden');
        });
    }

    // 5. Sticky Navbar Logic
    const header = document.getElementById('main-header');
    if (header) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                header.classList.add('glass-nav', 'py-2');
                header.classList.remove('py-4', 'bg-transparent');
            } else {
                header.classList.remove('glass-nav', 'py-2');
                header.classList.add('py-4', 'bg-transparent');
            }
        });
    }

    // 6. Scroll Reveal Animation using IntersectionObserver
    const reveals = document.querySelectorAll('.reveal');
    const revealOptions = {
        threshold: 0.15,
        rootMargin: "0px 0px -50px 0px"
    };

    const revealOnScroll = new IntersectionObserver(function(entries, observer) {
        entries.forEach(entry => {
            if (!entry.isIntersecting) {
                return;
            } else {
                entry.target.classList.add('active');
                observer.unobserve(entry.target);
            }
        });
    }, revealOptions);

    reveals.forEach(reveal => {
        revealOnScroll.observe(reveal);
    });

    /* --- ANIMASI JAVASCRIPT BARU UNTUK Halaman LOGIN --- */

    // 7. Staggered Entrance Animation untuk elemen form login
    const animateElements = document.querySelectorAll('.js-animate-in');
    animateElements.forEach((el, index) => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(16px)';
        el.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
        
        setTimeout(() => {
            el.style.opacity = '1';
            el.style.transform = 'translateY(0)';
        }, 100 + index * 80);
    });

    // 8. Ripple Effect pada Tombol Utama
    const buttons = document.querySelectorAll('.btn-ripple');
    buttons.forEach(btn => {
        btn.addEventListener('click', function(e) {
            const circle = document.createElement('span');
            const diameter = Math.max(btn.clientWidth, btn.clientHeight);
            const radius = diameter / 2;
            const rect = btn.getBoundingClientRect();

            circle.style.width = circle.style.height = `${diameter}px`;
            circle.style.left = `${e.clientX - rect.left - radius}px`;
            circle.style.top = `${e.clientY - rect.top - radius}px`;
            circle.classList.add('ripple-circle');

            const existingRipple = btn.querySelector('.ripple-circle');
            if (existingRipple) existingRipple.remove();

            btn.appendChild(circle);
        });
    });
});

// Global Interactive Functions for Auth Pages

window.togglePassword = function () {
    const input = document.getElementById('password');
    const icon = document.getElementById('toggleIcon');
    if (!input || !icon) return;

    icon.style.transform = 'scale(0.8) rotate(90deg)';
    icon.style.transition = 'transform 0.2s ease';

    setTimeout(() => {
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('bi-eye');
            icon.classList.add('bi-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.remove('bi-eye-slash');
            icon.classList.add('bi-eye');
        }
        icon.style.transform = 'scale(1) rotate(0deg)';
    }, 150);
};

window.fillCredentials = function (email, pass) {
    const emailInput = document.getElementById('email');
    const passInput = document.getElementById('password');

    if (emailInput && passInput) {
        emailInput.value = email;
        passInput.value = pass;

        // Flash animation effect pada input
        [emailInput, passInput].forEach(el => {
            el.classList.add('ring-2', 'ring-white', 'border-white');
            setTimeout(() => {
                el.classList.remove('ring-2', 'ring-white', 'border-white');
            }, 600);
        });
    }
};

window.openBookingModal = function () {
    const modal = document.getElementById('bookingModal');
    const modalContent = document.getElementById('bookingModalContent');
    if (modal && modalContent) {
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            modalContent.classList.remove('scale-95');
            modalContent.classList.add('scale-100');
        }, 10);
    }
};

window.closeBookingModal = function () {
    const modal = document.getElementById('bookingModal');
    const modalContent = document.getElementById('bookingModalContent');
    if (modal && modalContent) {
        modal.classList.add('opacity-0');
        modalContent.classList.remove('scale-100');
        modalContent.classList.add('scale-95');
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }
};

window.handleBookingSubmit = function (e) {
    e.preventDefault();
    const name = document.getElementById('custName')?.value || '';
    const phone = document.getElementById('custPhone')?.value || '';
    const service = document.getElementById('custService')?.value || '';
    const barber = document.getElementById('custBarber')?.value || '';
    const date = document.getElementById('custDate')?.value || '';
    const time = document.getElementById('custTime')?.value || '';

    const text = `Halo Rusdi Barbershop, saya ingin konfirmasi booking:%0A%0A- Nama: ${name}%0A- No. HP: ${phone}%0A- Layanan: ${service}%0A- Barber: ${barber}%0A- Tanggal: ${date}%0A- Waktu: ${time}%0A%0ATerima kasih!`;
    const waUrl = `https://wa.me/6281234567890?text=${text}`;
    window.open(waUrl, '_blank');
    window.closeBookingModal();
};

window.confirmAdminDelete = function (itemName, deleteFormId) {
    if (confirm(`Apakah Anda yakin ingin menghapus "${itemName}"? Tindakan ini tidak dapat dibatalkan.`)) {
        const form = document.getElementById(deleteFormId);
        if (form) form.submit();
    }
};