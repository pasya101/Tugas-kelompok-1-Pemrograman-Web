// ===== ANNOUNCEMENT BAR + NAVBAR =====
const announcementBar = document.getElementById('announcementBar');
const navbar = document.getElementById('mainNav');

function updateNavbarPosition() {
    if (!navbar) return;
    const barH = announcementBar ? announcementBar.offsetHeight : 0;
    if (window.scrollY > barH) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
}

window.addEventListener('scroll', updateNavbarPosition, { passive: true });
updateNavbarPosition();

// ===== BACK TO TOP =====
const backToTop = document.getElementById('backToTop');
window.addEventListener('scroll', () => {
    if (backToTop) backToTop.classList.toggle('visible', window.scrollY > 400);
}, { passive: true });

if (backToTop) {
    backToTop.addEventListener('click', e => {
        e.preventDefault();
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
}

// ===== PRODUK CARD – ensure overlay works on touch =====
document.querySelectorAll('.produk-card').forEach(card => {
    card.addEventListener('touchstart', () => card.classList.add('touched'));
    card.addEventListener('touchend', () => setTimeout(() => card.classList.remove('touched'), 500));
});
