// JavaScript Landing Page & Public Interactive Features
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

    // 3. Sticky Navbar Logic
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

    // 4. Scroll Reveal Animation using IntersectionObserver
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

    // 5. Button Ripple Effects
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

// Modal Booking Mandiri Publik
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

// ── INTERACTIVE PHOTO CATALOG & FORM FUNCTIONS ─────────────────────

window.filterCatalog = function (category, btnElement) {
    document.querySelectorAll('.filter-btn').forEach(btn => btn.classList.remove('active'));
    if (btnElement) btnElement.classList.add('active');

    const items = document.querySelectorAll('.catalog-item');
    items.forEach(item => {
        const itemCat = item.getAttribute('data-category');
        if (category === 'all' || itemCat === category) {
            item.style.display = 'flex';
            setTimeout(() => {
                item.style.opacity = '1';
                item.style.transform = 'scale(1)';
            }, 10);
        } else {
            item.style.opacity = '0';
            item.style.transform = 'scale(0.95)';
            setTimeout(() => {
                item.style.display = 'none';
            }, 200);
        }
    });
};

window.selectCatalogStyle = function (name, category, imgUrl, price, duration, desc, barber, serviceName) {
    const previewImg = document.getElementById('selectedStyleImg');
    const previewName = document.getElementById('selectedStyleName');
    const previewTag = document.getElementById('selectedStyleTag');
    const previewDesc = document.getElementById('selectedStyleDesc');
    const previewMeta = document.getElementById('selectedStyleMeta');
    const inputModel = document.getElementById('formModelRambut');
    const selectLayanan = document.getElementById('formLayanan');
    const selectBarber = document.getElementById('formBarber');

    if (previewImg) previewImg.src = imgUrl;
    if (previewName) previewName.innerText = name;
    if (previewTag) previewTag.innerText = category.toUpperCase();
    if (previewDesc) previewDesc.innerText = desc;
    if (previewMeta) previewMeta.innerHTML = `<span class="inline-flex items-center gap-1 text-xs text-amber-400 font-semibold"><i class="bi bi-clock-fill"></i> ${duration}</span> &bull; <span class="text-xs text-emerald-400 font-bold">${price}</span>`;
    if (inputModel) inputModel.value = name;

    if (selectLayanan && serviceName) {
        for (let i = 0; i < selectLayanan.options.length; i++) {
            if (selectLayanan.options[i].text.toLowerCase().includes(serviceName.toLowerCase()) || 
                selectLayanan.options[i].value.toLowerCase().includes(serviceName.toLowerCase())) {
                selectLayanan.selectedIndex = i;
                break;
            }
        }
    }
    if (selectBarber && barber) {
        for (let i = 0; i < selectBarber.options.length; i++) {
            if (selectBarber.options[i].text.toLowerCase().includes(barber.toLowerCase()) || 
                selectBarber.options[i].value.toLowerCase().includes(barber.toLowerCase())) {
                selectBarber.selectedIndex = i;
                break;
            }
        }
    }

    document.querySelectorAll('.catalog-card').forEach(card => card.classList.remove('catalog-active'));
    if (window.event && window.event.currentTarget) {
        const card = window.event.currentTarget.closest('.catalog-card');
        if (card) card.classList.add('catalog-active');
    }

    const formSection = document.getElementById('form-katalog');
    if (formSection) {
        formSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
        formSection.classList.add('preview-pulse');
        setTimeout(() => formSection.classList.remove('preview-pulse'), 1500);
    }
};

window.previewCustomReferencePhoto = function (input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function (e) {
            const previewBox = document.getElementById('customRefPreviewBox');
            const previewImg = document.getElementById('customRefImg');
            if (previewBox && previewImg) {
                previewImg.src = e.target.result;
                previewBox.classList.remove('hidden');
            }
        };
        reader.readAsDataURL(input.files[0]);
    }
};

window.clearCustomReferencePhoto = function () {
    const fileInput = document.getElementById('foto_referensi');
    const previewBox = document.getElementById('customRefPreviewBox');
    if (fileInput) fileInput.value = '';
    if (previewBox) previewBox.classList.add('hidden');
};

window.openCatalogLightbox = function (imgUrl, title, tag, desc) {
    const modal = document.getElementById('catalogLightboxModal');
    const modalImg = document.getElementById('lightboxImg');
    const modalTitle = document.getElementById('lightboxTitle');
    const modalTag = document.getElementById('lightboxTag');
    const modalDesc = document.getElementById('lightboxDesc');

    if (modal && modalImg) {
        modalImg.src = imgUrl;
        if (modalTitle) modalTitle.innerText = title;
        if (modalTag) modalTag.innerText = tag;
        if (modalDesc) modalDesc.innerText = desc;

        modal.classList.remove('hidden');
        setTimeout(() => modal.classList.remove('opacity-0'), 10);
        document.body.style.overflow = 'hidden';
    }
};

window.closeCatalogLightbox = function () {
    const modal = document.getElementById('catalogLightboxModal');
    if (modal) {
        modal.classList.add('opacity-0');
        setTimeout(() => {
            modal.classList.add('hidden');
            document.body.style.overflow = '';
        }, 250);
    }
};

window.submitCatalogWhatsApp = function () {
    const name = document.getElementById('formCustName')?.value || '';
    const phone = document.getElementById('formCustPhone')?.value || '';
    const model = document.getElementById('formModelRambut')?.value || 'Pilihan Katalog';
    const service = document.getElementById('formLayanan')?.value || '';
    const barber = document.getElementById('formBarber')?.value || 'Bebas / Rekomendasi';
    const date = document.getElementById('formTanggal')?.value || '';
    const time = document.getElementById('formJam')?.value || '';
    const note = document.getElementById('formCatatan')?.value || '-';

    if (!name || !phone) {
        alert('Mohon isi Nama Lengkap dan Nomor WhatsApp Anda terlebih dahulu.');
        document.getElementById('formCustName')?.focus();
        return;
    }

    const message = `Halo Black Crown Barbershop! Saya ingin reservasi cukur dari *Katalog Foto*:%0A%0A` +
        `✂️ *Model Rambut:* ${model}%0A` +
        `👤 *Nama:* ${name}%0A` +
        `📱 *No. WhatsApp:* ${phone}%0A` +
        `💈 *Layanan:* ${service}%0A` +
        `✂️ *Barber:* ${barber}%0A` +
        `📅 *Tanggal:* ${date}%0A` +
        `⏰ *Jam:* ${time}%0A` +
        `📝 *Catatan:* ${note}%0A%0A` +
        `Mohon konfirmasi ketersediaan jadwal. Terima kasih!`;

    const waUrl = `https://wa.me/6281234567890?text=${message}`;
    window.open(waUrl, '_blank');
};