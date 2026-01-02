import './bootstrap';

function initTheme() {
    const themeToggleBtn = document.getElementById('theme-toggle');

    // Check local storage or system preference
    if (localStorage.getItem('theme') === 'dark' ||
        (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }

    if (themeToggleBtn) {
        // Remove existing listener to avoid duplicates if re-initialized
        const newBtn = themeToggleBtn.cloneNode(true);
        themeToggleBtn.parentNode.replaceChild(newBtn, themeToggleBtn);

        newBtn.addEventListener('click', () => {
            console.log('Theme toggle clicked');
            document.documentElement.classList.toggle('dark');

            if (document.documentElement.classList.contains('dark')) {
                localStorage.setItem('theme', 'dark');
            } else {
                localStorage.setItem('theme', 'light');
            }
        });
    } else {
        console.warn('Theme toggle button not found');
    }
}

// Initialize on DOMContentLoaded
document.addEventListener('DOMContentLoaded', initTheme);

// Expose to window for debugging
window.initTheme = initTheme;
