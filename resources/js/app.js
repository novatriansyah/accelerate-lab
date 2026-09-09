import './bootstrap';
import Alpine from 'alpinejs';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

window.Alpine = Alpine;
window.gsap = gsap;
window.ScrollTrigger = ScrollTrigger;

Alpine.start();

function initTheme() {
    const themeToggleBtns = document.querySelectorAll('.theme-toggle-btn');

    if (localStorage.getItem('theme') === 'dark' ||
        (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }

    themeToggleBtns.forEach(btn => {
        const newBtn = btn.cloneNode(true);
        btn.parentNode.replaceChild(newBtn, btn);

        newBtn.addEventListener('click', () => {
            document.documentElement.classList.toggle('dark');

            if (document.documentElement.classList.contains('dark')) {
                localStorage.setItem('theme', 'dark');
            } else {
                localStorage.setItem('theme', 'light');
            }
        });
    });
}

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
