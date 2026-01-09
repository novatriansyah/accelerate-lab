/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'selector',
    theme: {
        extend: {
            colors: {
                primary: "#00BFA5", // Teal accent from description
                "primary-dark": "#009688",
                "background-light": "#F8FAFC", // Slate-50/100ish
                "background-dark": "#0F172A", // Slate-900
                "surface-light": "#FFFFFF",
                "surface-dark": "#1E293B",
                "text-light": "#334155", // Slate-700
                "text-dark": "#E2E8F0", // Slate-200

                // Project Identity Colors (Jules)
                "lab-bg": "#020617", // Slate-950
                "lab-neon": "#06b6d4", // Cyan-500
                "lab-accent": "#2563eb", // Blue-600
                // Added based on usage in views
                "text-main": "#334155", // Slate-700
                "text-secondary": "#64748B", // Slate-500
                "text-muted": "#94A3B8", // Slate-400
                "border-light": "#E2E8F0", // Slate-200
                "border-medium": "#CBD5E1", // Slate-300
            },
            fontFamily: {
                sans: ['Inter', 'sans-serif'],
                mono: ['JetBrains Mono', 'monospace'],
            },
            borderRadius: {
                DEFAULT: "0.5rem",
            },
            animation: {
                'marquee': 'marquee 25s linear infinite',
                'float': 'float 6s ease-in-out infinite',
                'float-delayed': 'float 6s ease-in-out 3s infinite',
                'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                'spin-slow': 'spin 15s linear infinite',
                'fade-in-up': 'fadeInUp 0.8s ease-out forwards',
            },
            keyframes: {
                marquee: {
                    '0%': { transform: 'translateX(0%)' },
                    '100%': { transform: 'translateX(-100%)' },
                },
                float: {
                    '0%, 100%': { transform: 'translateY(0)' },
                    '50%': { transform: 'translateY(-20px)' },
                },
                fadeInUp: {
                    '0%': { opacity: '0', transform: 'translateY(20px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                }
            }
        },
    },
}
