# AI AGENT INSTRUCTIONS

## 1. PROJECT IDENTITY & ROLES
* **Company:** PT Akselerasi Digital Mandiri
* **Brand Name:** Accelerate Lab
* **Tagline:** "Engineering Velocity."
* **Legal Status:** PT Perorangan (Indonesian Individual Limited Liability Company).
* **Founder/Architect:** Nova Triansyah Azis.

## 2. PROJECT VIBE
* **Theme:** Clean, Professional, Modern Tech Agency. Light-mode-first with dark mode support.
* **Key Imagery:** Subtle gradients, glassmorphism cards, Material Symbols icons, code-themed decorative elements.
* **Philosophy:** "Enterprise Quality at Startup Speed."

## 3. TECH STACK (STRICT)
* **Framework:** Laravel 12 (Monolith).
* **Frontend:** Blade Templates + Tailwind CSS v4 + Alpine.js (CDN).
* **Build Tool:** Vite 7 with `@tailwindcss/vite` plugin.
* **Styling:** Utility-first Tailwind CSS.
* **Admin Panel:** Filament v3.
* **Database:** MySQL.
* **PHP Version:** 8.2+ (platform pinned to 8.3).
* **Icons:** Google Material Symbols Outlined + Material Icons Round.

## 4. DESIGN SYSTEM (TAILWIND CONFIG)
Custom tokens defined in `tailwind.config.js` and used throughout Blade views:

### Colors
* **Primary:** Teal (`#00BFA5`) -> Class: `text-primary` / `bg-primary`
* **Primary Dark:** (`#009688`) -> Class: `bg-primary-dark` (hover states)
* **Background Light:** Slate-50 (`#F8FAFC`) -> Class: `bg-background-light`
* **Background Dark:** Slate-900 (`#0F172A`) -> Class: `dark:bg-background-dark`
* **Surface Light:** White (`#FFFFFF`) -> Class: `bg-surface-light`
* **Surface Dark:** Slate-800 (`#1E293B`) -> Class: `dark:bg-surface-dark`
* **Text Main:** Slate-700 (`#334155`) -> Class: `text-text-main`
* **Text Secondary:** Slate-500 (`#64748B`) -> Class: `text-text-secondary`
* **Text Muted:** Slate-400 (`#94A3B8`) -> Class: `text-text-muted`
* **Border Light:** Slate-200 (`#E2E8F0`) -> Class: `border-border-light`
* **Border Medium:** Slate-300 (`#CBD5E1`) -> Class: `border-border-medium`

### Fonts
* Body: 'Inter' (sans-serif) via Google Fonts.
* Code/Mono: 'JetBrains Mono' (monospace) via Google Fonts.

### Dark Mode
* Strategy: `darkMode: 'selector'` (class-based toggle via JS in `app.js`).
* Default: **Light mode**. User preference stored in `localStorage`.

## 5. CODING RULES (THE "SPEED MONOLITH" STANDARD)
* **Architecture:** Keep it Flat. Avoid over-engineering. No Microservices.
* **Routing:** Use `web.php`. Keep logic in Controllers, not closures.
* **Blade:**
    * Use `@extends('frontend.components.layout')` for page layouts.
    * Shared components live in `resources/views/frontend/components/`.
    * Pages live in `resources/views/frontend/pages/`.
    * Do not write custom CSS in `<style>` tags unless absolutely necessary.
* **Code Quality:**
    * Strict typing in PHP methods.
    * Use Eloquent Resources for API responses (if any).
    * Comments only for complex logic (Explain *Why*, not *What*).
* **Global Data:** Site settings and services are shared to all views via `AppServiceProvider::boot()`.

## 6. CONTENT RULES
* **No Fake Teams:** Do not suggest creating a "Team" section with fictional people. This is a single-founder company.
* **No Fake Stats:** Do not hardcode fabricated metrics (e.g., "50+ Enterprise Apps"). Use CMS-driven data or omit.
* **No Fake Clients:** Do not create fictional client logos or names.
* **CMS-First:** All dynamic content (services, projects, blog, stats) should come from the Filament admin panel.
* **Fallbacks:** Blade views may include static fallback content for when DB is empty, but fallbacks must be clearly generic, not misleading.

## 7. FORBIDDEN
* **No CSS Frameworks:** Do not use Bootstrap or vanilla CSS files.
* **No JS Frameworks:** Do not suggest React or Vue for simple pages.
* **No Aramaho Framework.**
