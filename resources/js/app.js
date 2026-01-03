import './bootstrap';

function initTheme() {
    const themeToggleBtns = document.querySelectorAll('.theme-toggle-btn');

    // Check local storage or system preference
    if (localStorage.getItem('theme') === 'dark' ||
        (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }

    if (themeToggleBtns.length > 0) {
        themeToggleBtns.forEach(btn => {
            // Clone to remove old listeners
            const newBtn = btn.cloneNode(true);
            btn.parentNode.replaceChild(newBtn, btn);

            newBtn.addEventListener('click', () => {
                console.log('Theme toggle clicked');
                document.documentElement.classList.toggle('dark');

                if (document.documentElement.classList.contains('dark')) {
                    localStorage.setItem('theme', 'dark');
                } else {
                    localStorage.setItem('theme', 'light');
                }
            });
        });
    } else {
        console.warn('No theme toggle buttons found');
    }
}

// Initialize on DOMContentLoaded
document.addEventListener('DOMContentLoaded', initTheme);

// Expose to window for debugging
window.initTheme = initTheme;
