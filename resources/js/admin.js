// ── Admin Panel JS ──────────────────────────────────────────
const adminSidebar  = () => document.getElementById('adminSidebar');
const sidebarBD     = () => document.getElementById('sidebarBackdrop');

window.openSidebar = function () {
    const s = adminSidebar(); const b = sidebarBD();
    if (s) s.classList.remove('is-hidden');
    if (b) b.classList.remove('hidden');
    document.body.style.overflow = 'hidden';
};

window.closeSidebar = function () {
    const s = adminSidebar(); const b = sidebarBD();
    if (s) s.classList.add('is-hidden');
    if (b) b.classList.add('hidden');
    document.body.style.overflow = '';
};

document.addEventListener('DOMContentLoaded', () => {
    // On mobile: sidebar starts hidden
    if (window.innerWidth < 1024) {
        const s = adminSidebar();
        if (s) s.classList.add('is-hidden');
    }

    // Auto-dismiss flash alerts after 4s
    const flash = document.getElementById('flashAlert');
    if (flash) {
        setTimeout(() => {
            flash.style.transition = 'opacity .4s';
            flash.style.opacity = '0';
            setTimeout(() => flash.remove(), 420);
        }, 4000);
    }
});
