import './bootstrap';
import Alpine from 'alpinejs';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import { initMagneticCursor } from './magnetic-cursor';

gsap.registerPlugin(ScrollTrigger);

window.Alpine = Alpine;
window.gsap = gsap;
window.ScrollTrigger = ScrollTrigger;

Alpine.start();

// --------------------------------------------------------------------------
// Theme Toggle Logic
// --------------------------------------------------------------------------
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

// --------------------------------------------------------------------------
// Accelerate Lab Kinetic Motion Engine
// --------------------------------------------------------------------------
function initMotionEngine() {
    if (typeof window === 'undefined') return;

    // 1. Directional Scroll Reveals (.fade-anim)
    const fadeElements = document.querySelectorAll('.fade-anim, [data-reveal]');
    fadeElements.forEach((el) => {
        const direction = el.getAttribute('data-direction') || 'bottom';
        const delay = parseFloat(el.getAttribute('data-delay') || '0');
        const offset = parseFloat(el.getAttribute('data-offset') || '35');

        let x = 0;
        let y = 0;
        if (direction === 'bottom') y = offset;
        else if (direction === 'top') y = -offset;
        else if (direction === 'left') x = -offset;
        else if (direction === 'right') x = offset;

        gsap.fromTo(el, 
            { opacity: 0, x, y },
            {
                opacity: 1,
                x: 0,
                y: 0,
                duration: 0.85,
                delay: delay,
                ease: 'power3.out',
                scrollTrigger: {
                    trigger: el,
                    start: 'top 88%',
                    toggleActions: 'play none none none',
                },
            }
        );
    });

    // 2. Dynamic Number Counter (.t-counter)
    const counters = document.querySelectorAll('.t-counter');
    counters.forEach((counter) => {
        const rawText = counter.textContent.trim();
        const match = rawText.match(/(\d+(?:\.\d+)?)/);
        if (!match) return;

        const targetValue = parseFloat(match[1]);
        const prefix = rawText.slice(0, match.index);
        const suffix = rawText.slice(match.index + match[1].length);

        const counterObj = { val: 0 };
        ScrollTrigger.create({
            trigger: counter,
            start: 'top 90%',
            onEnter: () => {
                gsap.to(counterObj, {
                    val: targetValue,
                    duration: 1.6,
                    ease: 'power2.out',
                    onUpdate: () => {
                        const formatted = targetValue % 1 === 0 ? Math.round(counterObj.val) : counterObj.val.toFixed(1);
                        counter.textContent = `${prefix}${formatted}${suffix}`;
                    },
                });
            },
            once: true,
        });
    });

    // 3. Bento Mouse Spotlight Tracker
    const bentoCards = document.querySelectorAll('.bento-card, .spotlight-card');
    bentoCards.forEach((card) => {
        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            card.style.setProperty('--mouse-x', `${x}px`);
            card.style.setProperty('--mouse-y', `${y}px`);
        });
    });
}

document.addEventListener('DOMContentLoaded', () => {
    initTheme();
    initMagneticCursor();
    initMotionEngine();
});
