import './bootstrap';

function toggleTheme() {
    document.documentElement.classList.toggle('dark');
    if (document.documentElement.classList.contains('dark')) {
        localStorage.setItem('theme', 'dark');
    } else {
        localStorage.setItem('theme', 'light');
    }
}

function initTheme() {
    // Check local storage or system preference
    if (localStorage.getItem('theme') === 'dark' ||
        (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }
}

// Event Delegation for robustness
document.addEventListener('click', (e) => {
    // Theme Toggles (Desktop & Mobile)
    if (e.target.closest('#theme-toggle') || e.target.closest('#mobile-theme-toggle')) {
        toggleTheme();
    }

    // Mobile Menu Toggle
    const menuBtn = e.target.closest('#mobile-menu-btn');
    if (menuBtn) {
        const mobileMenu = document.getElementById('mobile-menu');
        if (mobileMenu) {
            mobileMenu.classList.toggle('hidden');
        }
    }
});

// Initialize theme on load
document.addEventListener('DOMContentLoaded', initTheme);

// Expose to window for debugging if needed
window.initTheme = initTheme;
