document.addEventListener('DOMContentLoaded', () => {
    
    // 1. Logika Toggle Visibilitas Kata Sandi
    const toggleBtn = document.getElementById('togglePasswordBtn');
    const passwordInput = document.getElementById('password');
    const toggleIcon = document.getElementById('toggleIcon');

    if (toggleBtn && passwordInput && toggleIcon) {
        toggleBtn.addEventListener('click', () => {
            const currentType = passwordInput.getAttribute('type');
            const newType = currentType === 'password' ? 'text' : 'password';
            
            passwordInput.setAttribute('type', newType);
            
            // Animasi transisi ikon
            toggleIcon.style.transform = 'scale(0.5)';
            toggleIcon.style.opacity = '0';
            
            setTimeout(() => {
                if (newType === 'text') {
                    toggleIcon.classList.remove('bi-eye');
                    toggleIcon.classList.add('bi-eye-slash');
                } else {
                    toggleIcon.classList.remove('bi-eye-slash');
                    toggleIcon.classList.add('bi-eye');
                }
                toggleIcon.style.transform = 'scale(1)';
                toggleIcon.style.opacity = '1';
            }, 150); // Sesuaikan dengan durasi CSS transition bawaan Tailwind
        });
    }

    // 2. Logika Efek Ripple pada Tombol
    const buttons = document.querySelectorAll('.btn-ripple');
    
    buttons.forEach(button => {
        button.addEventListener('click', function (e) {
            // Menghitung koordinat klik relatif terhadap tombol
            const rect = this.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            // Membuat elemen span untuk efek ripple
            const ripple = document.createElement('span');
            ripple.classList.add('ripple');
            ripple.style.left = `${x}px`;
            ripple.style.top = `${y}px`;
            
            this.appendChild(ripple);
            
            // Menghapus elemen span setelah animasi selesai agar DOM tidak menumpuk
            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });
});