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

    // Desktop Toggle
    const themeToggleBtn = document.getElementById('theme-toggle');
    if (themeToggleBtn) {
        // Clone to remove existing listeners
        const newBtn = themeToggleBtn.cloneNode(true);
        themeToggleBtn.parentNode.replaceChild(newBtn, themeToggleBtn);
        newBtn.addEventListener('click', toggleTheme);
    }

    // Mobile Toggle
    const mobileThemeToggleBtn = document.getElementById('mobile-theme-toggle');
    if (mobileThemeToggleBtn) {
         const newMobileBtn = mobileThemeToggleBtn.cloneNode(true);
         mobileThemeToggleBtn.parentNode.replaceChild(newMobileBtn, mobileThemeToggleBtn);
         newMobileBtn.addEventListener('click', toggleTheme);
    }

    // Mobile Menu
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    if (mobileMenuBtn && mobileMenu) {
         const newMenuBtn = mobileMenuBtn.cloneNode(true);
         mobileMenuBtn.parentNode.replaceChild(newMenuBtn, mobileMenuBtn);

         newMenuBtn.addEventListener('click', () => {
             mobileMenu.classList.toggle('hidden');
         });
    }
}

// Initialize on DOMContentLoaded
document.addEventListener('DOMContentLoaded', initTheme);

// Expose to window for debugging
window.initTheme = initTheme;
