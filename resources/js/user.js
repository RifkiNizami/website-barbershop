// User Member Lounge JavaScript

document.addEventListener('DOMContentLoaded', () => {
    // User Mobile Sidebar Toggle
    const sidebar = document.getElementById('userSidebar');
    const backdrop = document.getElementById('userSidebarBackdrop');
    const openBtn = document.getElementById('openUserSidebarBtn');
    const closeBtn = document.getElementById('closeUserSidebarBtn');

    function openSidebar() {
        if (sidebar && backdrop) {
            sidebar.classList.remove('-translate-x-full');
            backdrop.classList.remove('hidden');
        }
    }

    function closeSidebar() {
        if (sidebar && backdrop) {
            sidebar.classList.add('-translate-x-full');
            backdrop.classList.add('hidden');
        }
    }

    if (openBtn) openBtn.addEventListener('click', openSidebar);
    if (closeBtn) closeBtn.addEventListener('click', closeSidebar);
    if (backdrop) backdrop.addEventListener('click', closeSidebar);
});

// User Actions
window.confirmCancelBooking = function (bookingCode, formId) {
    if (confirm(`Apakah Anda yakin ingin membatalkan reservasi ${bookingCode}?`)) {
        const form = document.getElementById(formId);
        if (form) form.submit();
    }
};
