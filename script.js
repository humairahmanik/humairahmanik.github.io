// Toggle class active
const navbarNav = document.querySelector ('.navbar-nav');

// ketika menu di klik
document.querySelector('#align-justify').onclick = () => {
    navbarNav.classList.toggle('active');
};

// Klik di luar sidebar untuk menghilangkan nav
const align-justify = document.querySelector('#align-justify');

document.addEventListener('click', function(e) {
    if(!align-justify.contains(e.target) && !navbarNav.contains(e.target)) {
        navbarNav.classList.remove('active');
    }
});
