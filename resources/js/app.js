import './bootstrap';
import Alpine from 'alpinejs';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

window.Alpine = Alpine;
window.gsap = gsap;
window.ScrollTrigger = ScrollTrigger;

Alpine.start();

window.toggleTheme = function() {
    const isDark = document.documentElement.classList.toggle('dark');
    try {
        localStorage.setItem('theme', isDark ? 'dark' : 'light');
    } catch (e) {}
    window.dispatchEvent(new CustomEvent('theme-changed', { detail: { theme: isDark ? 'dark' : 'light' } }));
};

function initTheme() {
    try {
        if (localStorage.getItem('theme') === 'dark' ||
            (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    } catch (e) {}
}

document.addEventListener('click', (e) => {
    const btn = e.target.closest('.theme-toggle-btn');
    if (btn) {
        window.toggleTheme();
    }
});

function initScrollAnimations() {
    if (typeof window === 'undefined') return;

    // Subtle entrance animation for elements with data-reveal
    const revealElements = document.querySelectorAll('[data-reveal]');
    if (revealElements.length > 0 && window.gsap) {
        window.gsap.fromTo(revealElements, 
            { opacity: 0, y: 30 },
            { 
                opacity: 1, 
                y: 0, 
                duration: 0.8, 
                stagger: 0.15, 
                ease: 'power2.out',
                scrollTrigger: {
                    trigger: revealElements[0],
                    start: 'top 85%',
                }
            }
        );
    }
}

document.addEventListener('DOMContentLoaded', () => {
    initTheme();
    initScrollAnimations();
});
