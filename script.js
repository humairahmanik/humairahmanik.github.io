// Toggle class active
const navbarNav = document.querySelector ('.navbar-nav');

// ketika menu di klik
document.querySelector('#align-justify').onclick = () => {
    navbarNav.classList.toggle('active');
};

// script.js
document.addEventListener('DOMContentLoaded', function() {
    const fadeEls = document.querySelectorAll('.fade-in');
    function checkFadeIn() {
        fadeEls.forEach(el => {
            const rect = el.getBoundingClientRect();
            if(rect.top < window.innerHeight - 100) {
                el.classList.add('visible');
            }
        });
    }
    window.addEventListener('scroll', checkFadeIn);
    checkFadeIn();
});

document.querySelectorAll('.collection-card').forEach(card => {
    card.addEventListener('click', function() {
        card.style.transition = 'transform 0.7s cubic-bezier(.25,.8,.25,1)';
        card.style.transform = 'rotateY(360deg)';
        setTimeout(() => {
            card.style.transform = '';
        }, 700);
    });
});

// Klik di luar sidebar untuk menghilangkan nav
const align-justify = document.querySelector('#align-justify');

document.addEventListener('click', function(e) {
    if(!align-justify.contains(e.target) && !navbarNav.contains(e.target)) {
        navbarNav.classList.remove('active');
    }
});
