/**
 * Accelerate Lab Magnetic Cursor Engine
 * Precision pointer-only cursor with Electric Teal accent and text expansions
 */
export function initMagneticCursor() {
    if (typeof window === 'undefined') return;
    if (!window.matchMedia('(pointer: fine)').matches) return;

    const cursor = document.querySelector('.cb-cursor');
    const cursorText = document.querySelector('.cb-cursor-text');
    if (!cursor) return;

    let mouseX = -100;
    let mouseY = -100;
    let cursorX = -100;
    let cursorY = -100;
    let isVisible = false;

    window.addEventListener('mousemove', (e) => {
        mouseX = e.clientX;
        mouseY = e.clientY;
        if (!isVisible) {
            cursor.classList.add('-visible');
            isVisible = true;
        }
    });

    document.addEventListener('mouseleave', () => {
        cursor.classList.remove('-visible');
        isVisible = false;
    });

    function render() {
        cursorX += (mouseX - cursorX) * 0.2;
        cursorY += (mouseY - cursorY) * 0.2;
        cursor.style.transform = `translate3d(${cursorX}px, ${cursorY}px, 0)`;
        requestAnimationFrame(render);
    }
    requestAnimationFrame(render);

    // Magnetic stickiness and expand on interactive elements
    function attachListeners() {
        document.querySelectorAll('a, button, .rr-btn, [data-cursor-stick]').forEach((el) => {
            el.addEventListener('mouseenter', () => cursor.classList.add('-active'));
            el.addEventListener('mouseleave', () => cursor.classList.remove('-active'));
        });

        document.querySelectorAll('[data-cursor-text]').forEach((el) => {
            el.addEventListener('mouseenter', () => {
                cursor.classList.add('-text');
                if (cursorText) {
                    cursorText.textContent = el.getAttribute('data-cursor-text') || '';
                }
            });
            el.addEventListener('mouseleave', () => {
                cursor.classList.remove('-text');
                if (cursorText) {
                    cursorText.textContent = '';
                }
            });
        });
    }

    attachListeners();

    // Re-attach listeners for dynamically rendered nodes
    const observer = new MutationObserver(() => {
        attachListeners();
    });
    observer.observe(document.body, { childList: true, subtree: true });
}
