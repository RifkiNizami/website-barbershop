// JavaScript Landing Page & Public Interactive Features
document.addEventListener('DOMContentLoaded', () => {
    // 1. Landing Page Booking Date Default
    const today = new Date().toISOString().split('T')[0];
    const dateInput = document.getElementById('custDate');
    if (dateInput) {
        dateInput.value = today;
        dateInput.min = today;
    }

    // 2. Sliding Pill Navigation (Desktop & Tablet)
    const slidingNav = document.getElementById('slidingNav');
    const pillIndicator = document.getElementById('slidingPillIndicator');
    const navItems = document.querySelectorAll('.nav-pill-item');
    const mobileLinks = document.querySelectorAll('.mobile-nav-link');
    let currentActiveTarget = 'home';
    let isHovering = false;

    function movePillTo(element, animate = true) {
        if (!element || !pillIndicator || !slidingNav) return;

        const navRect = slidingNav.getBoundingClientRect();
        const itemRect = element.getBoundingClientRect();

        const left = itemRect.left - navRect.left;
        const top = itemRect.top - navRect.top;
        const width = itemRect.width;
        const height = itemRect.height;

        if (!animate) {
            pillIndicator.style.transition = 'none';
        } else {
            pillIndicator.style.transition = 'left 320ms cubic-bezier(0.25, 1, 0.5, 1), width 320ms cubic-bezier(0.25, 1, 0.5, 1), top 320ms cubic-bezier(0.25, 1, 0.5, 1), height 320ms cubic-bezier(0.25, 1, 0.5, 1), opacity 200ms ease';
        }

        pillIndicator.style.left = `${left}px`;
        pillIndicator.style.top = `${top}px`;
        pillIndicator.style.width = `${width}px`;
        pillIndicator.style.height = `${height}px`;
        pillIndicator.style.opacity = '1';

        if (!animate) {
            pillIndicator.offsetHeight; // force reflow
            pillIndicator.style.transition = '';
        }
    }

    function setActivePill(target, animate = true) {
        currentActiveTarget = target;
        let activeEl = null;

        navItems.forEach(item => {
            const itemTarget = item.getAttribute('data-target');
            if (itemTarget === target) {
                activeEl = item;
                item.classList.add('active-pill');
                item.classList.add('text-white');
                item.classList.remove('text-zinc-400');
            } else {
                item.classList.remove('active-pill');
                if (!isHovering) {
                    item.classList.remove('text-white');
                    item.classList.add('text-zinc-400');
                }
            }
        });

        // Update mobile links style too
        mobileLinks.forEach(link => {
            const linkTarget = link.getAttribute('data-target');
            if (linkTarget === target) {
                link.classList.add('text-white', 'bg-barber-red/20', 'border-barber-red/30', 'font-bold');
                link.classList.remove('text-zinc-400', 'font-medium', 'hover:bg-white/5');
            } else {
                link.classList.remove('text-white', 'bg-barber-red/20', 'border-barber-red/30', 'font-bold');
                link.classList.add('text-zinc-400', 'font-medium', 'hover:bg-white/5');
            }
        });

        if (activeEl && !isHovering) {
            movePillTo(activeEl, animate);
        }
    }

    if (slidingNav && pillIndicator && navItems.length > 0) {
        // Position pill upon initial page load
        const initPill = () => {
            const initialHash = window.location.hash.replace('#', '') || 'home';
            const matched = Array.from(navItems).find(i => i.getAttribute('data-target') === initialHash);
            setActivePill(matched ? initialHash : 'home', false);
        };
        setTimeout(initPill, 60);
        window.addEventListener('load', initPill);

        // Hover events for sliding morphing pill container
        navItems.forEach(item => {
            item.addEventListener('mouseenter', () => {
                isHovering = true;
                movePillTo(item, true);
                navItems.forEach(el => {
                    if (el === item) {
                        el.classList.add('text-white');
                        el.classList.remove('text-zinc-400');
                    } else if (!el.classList.contains('active-pill')) {
                        el.classList.remove('text-white');
                        el.classList.add('text-zinc-400');
                    }
                });
            });

            item.addEventListener('click', () => {
                const target = item.getAttribute('data-target');
                if (target) {
                    setActivePill(target, true);
                }
            });
        });

        slidingNav.addEventListener('mouseleave', () => {
            isHovering = false;
            const currentActiveEl = document.querySelector(`.nav-pill-item[data-target="${currentActiveTarget}"]`);
            if (currentActiveEl) {
                movePillTo(currentActiveEl, true);
            }
            navItems.forEach(el => {
                if (el.classList.contains('active-pill')) {
                    el.classList.add('text-white');
                    el.classList.remove('text-zinc-400');
                } else {
                    el.classList.remove('text-white');
                    el.classList.add('text-zinc-400');
                }
            });
        });

        window.addEventListener('resize', () => {
            const currentActiveEl = document.querySelector(`.nav-pill-item[data-target="${currentActiveTarget}"]`);
            if (currentActiveEl) {
                movePillTo(currentActiveEl, false);
            }
        });
    }

    // ScrollSpy to update active pill dynamically when scrolling
    const trackedSections = ['home', 'about', 'pricing', 'katalog', 'testimoni'];
    let scrollDebounce;
    window.addEventListener('scroll', () => {
        if (isHovering) return;

        clearTimeout(scrollDebounce);
        scrollDebounce = setTimeout(() => {
            const scrollPos = window.scrollY;
            const windowHeight = window.innerHeight;
            const docHeight = document.documentElement.scrollHeight;

            if (scrollPos < 120) {
                if (currentActiveTarget !== 'home') setActivePill('home', true);
                return;
            }

            if (scrollPos + windowHeight >= docHeight - 80) {
                if (currentActiveTarget !== 'testimoni') setActivePill('testimoni', true);
                return;
            }

            let foundSection = null;
            for (const id of trackedSections) {
                const el = document.getElementById(id);
                if (el) {
                    const rect = el.getBoundingClientRect();
                    if (rect.top <= windowHeight * 0.45 && rect.bottom >= windowHeight * 0.25) {
                        foundSection = id;
                    }
                }
            }

            if (foundSection && foundSection !== currentActiveTarget) {
                setActivePill(foundSection, true);
            }
        }, 30);
    }, { passive: true });

    // 3. Mobile Menu Toggle
    const mobileBtn = document.getElementById('mobileMenuBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    const mobileIcon = document.getElementById('mobileMenuIcon');
    if (mobileBtn && mobileMenu) {
        mobileBtn.addEventListener('click', () => {
            const isClosed = mobileMenu.classList.contains('hidden');
            if (isClosed) {
                mobileMenu.classList.remove('hidden');
                if (mobileIcon) {
                    mobileIcon.classList.remove('bi-list');
                    mobileIcon.classList.add('bi-x-lg');
                }
            } else {
                mobileMenu.classList.add('hidden');
                if (mobileIcon) {
                    mobileIcon.classList.remove('bi-x-lg');
                    mobileIcon.classList.add('bi-list');
                }
            }
        });

        document.querySelectorAll('.mobile-nav-link').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
                if (mobileIcon) {
                    mobileIcon.classList.remove('bi-x-lg');
                    mobileIcon.classList.add('bi-list');
                }
                const target = link.getAttribute('data-target');
                if (target) {
                    setActivePill(target, true);
                }
            });
        });
    }

    // 4. Sticky Glass Navbar Logic
    const header = document.getElementById('main-header');
    if (header) {
        const handleScroll = () => {
            if (window.scrollY > 40) {
                header.classList.add('glass-nav', 'py-2.5');
                header.classList.remove('py-3.5', 'sm:py-4', 'bg-transparent', 'border-transparent');
            } else {
                header.classList.remove('glass-nav', 'py-2.5');
                header.classList.add('py-3.5', 'sm:py-4', 'bg-transparent', 'border-transparent');
            }
        };
        window.addEventListener('scroll', handleScroll, { passive: true });
        handleScroll();
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