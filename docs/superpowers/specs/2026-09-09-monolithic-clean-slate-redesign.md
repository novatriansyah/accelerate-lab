# Accelerate Lab Monolithic Clean-Slate Redesign Specification

**Date:** 2026-09-09  
**Status:** Approved  
**Blend:** 70% Redox (Creative Agency) + 30% NextSaaS (Software & App Platform)  
**Brand Accent:** Accelerate Lab Electric Teal (`#00BFA5` / `#00D5B5`)

---

## 1. Executive Summary

This specification defines the complete, clean-slate reconstruction of the Accelerate Lab digital agency website. All legacy Blade layouts, outdated CSS tokens, and legacy animation classes will be completely removed and replaced with a cohesive 70/30 design system:
- **70% Redox (Creative Agency Dark):** High-impact typographic hierarchy, cinematic dark void canvas (`#090D16`), floating island capsule navigation, double-text vertical kinetic buttons (`.rr-btn`), and an authentic circular rotating brand emblem.
- **30% NextSaaS (Modular Software Platform):** Asymmetric Bento Grid layout containers (`rounded-3xl`), interactive tabbed architecture switchers (Alpine.js), micro-UI preview widgets, and floating metric stat capsules.
- **Brand Palette:** Customized directly around the official Accelerate Lab identity (Electric Teal `#00BFA5`, with pure `#FFFFFF` dark text, `#0F172A` light text, and WCAG 2.2 AA contrast compliance in both modes).
- **Strict Data Integration:** 100% dynamic integration with existing Laravel Eloquent models (`Service`, `Project`, `HomepageStat`, `Testimonial`, `TeamMember`, `CompanyMilestone`, `CoreValue`, `JobPosting`). Zero hardcoded mockup data.
- **Strict TDD:** Complete reset of automated feature tests in `tests/Feature/MonolithicDesignEngineTest.php`.

---

## 2. Design System & Design Tokens

### Color Palettes
* **Primary Brand Accent:**
  - `primary`: `#00BFA5` (Electric Teal)
  - `primary-hover`: `#00D5B5`
  - `primary-active`: `#009688`
  - `primary-glow`: `rgba(0, 191, 165, 0.15)`
  - Gradient: `from-[#00BFA5] to-[#00E5C0]`
* **Dark Mode (70% Redox Creative Agency Void):**
  - Canvas: `#090D16`
  - Cards & Bento Surfaces: `#0F172A` and `rgba(15, 23, 42, 0.7)` with `backdrop-blur-xl`
  - Hairline Borders: `border-white/10`
  - Primary Typography: `#FFFFFF`
  - Secondary / Muted: `#94A3B8` (Slate 400)
* **Light Mode (Clean Precision Studio):**
  - Canvas: `#F8FAFC`
  - Cards & Bento Surfaces: `#FFFFFF` with `shadow-slate-900/5`
  - Hairline Borders: `border-slate-200/80`
  - Primary Typography: `#0F172A` (Slate 900)
  - Secondary / Muted: `#475569` (Slate 600)

### Typography
* **Headings:** Instrument Sans (`font-instrumentsans`), `tracking-tight`.
* **Body / UI:** Plus Jakarta Sans (`font-sans`).
* **Monospace / Code:** System Monospace (`font-mono`) for index counters (`01`, `02`) and brand syntax (`/<Lab`).

### Kinetic Motion Engine
* **Double-Text Slide Button (`.rr-btn`):** Two layers of text vertically stacked inside an overflow-hidden wrapper; on hover, layer 1 translates upward `-50%` while layer 2 glides in seamlessly with `cubic-bezier(0.16, 1, 0.3, 1)`.
* **Rotating Brand Emblem (`.badge-spin`):** 20-second continuous linear rotation without CPU strain.

---

## 3. Global Shell & Page Architectures

### Global Shell
- `resources/views/frontend/components/layout.blade.php`: Pre-hydration anti-flash script in `<head>`, ambient gradient glow, `<x-header>`, `<main>`, `<x-footer>`, `<x-consultation-modal>`, `<x-whatsapp-button>`.
- `resources/views/frontend/components/header.blade.php`: Floating capsule navbar (`rounded-full`, backdrop blur, official `Accelerate/>Lab` logo, navigation links, theme toggle, language selector, kinetic CTA, Alpine mobile drawer).
- `resources/views/frontend/components/footer.blade.php`: Bold CTA headline banner, 4-column dynamic grid (legal entity, dynamic services loop, company links, newsletter/socials), bottom operational status bar.

### Pages to Reconstruct
1. **Homepage (`home.blade.php`):** Hero, Floating Metrics Bar, Bento Capabilities (dynamic `$services`), Architecture Switcher (NextSaaS), Selected Work (dynamic `$recentProjects`), Testimonials (dynamic `$testimonials`), Action Banner.
2. **Services Overview (`services.blade.php`):** Header, Alpine tab filter, dynamic comprehensive service list with benefits checklist, aggregated `$techStack` grid, 5-step process stepper.
3. **Dedicated Service Pages:** `cloud-architecture.blade.php`, `mobile-app-development.blade.php`, `ui-ux-design.blade.php`, `web-application-development.blade.php`, and `service.blade.php` (blueprint bento layout with dynamic `$service->features` and `$service->technologies`).
4. **Case Studies & Detail:** `case-studies.blade.php` (filterable masonry portfolio from `$projects`) and `project.blade.php` (client metadata, challenge/solution comparison cards, KPI results).
5. **About Us (`about.blade.php`):** Philosophy statement, dynamic `$teamMembers` grid (featuring Nova Triansyah Azis), dynamic `$milestones` timeline, dynamic `$coreValues` bento cards.
6. **Careers (`careers.blade.php`):** Culture bento cards, dynamic `$jobs` board with department filters and empty state.
7. **Contact (`contact.blade.php`):** Split layout (direct agency credentials + interactive NextSaaS consultation form with CSRF protection).
8. **Error 404 (`errors/404.blade.php`):** High-impact terminal layout with return home button.

---

## 4. CMS Database Schema Alignment

All controllers and views strictly adhere to production database schemas:
- `Service::orderBy('sort_order')->get()` (No `is_active` column on `services`!).
- `Project::latest()->get()`.
- `HomepageStat::where('section', $section)->orderBy('sort_order')->get()`.
- `Testimonial::active()->orderBy('sort_order')->get()`.
- `JobPosting::where('is_active', true)->latest()->get()`.
- `TeamMember::orderBy('sort_order')->get()`.
- `CompanyMilestone::orderBy('sort_order')->get()`.
- `CoreValue::orderBy('sort_order')->get()`.

---

## 5. Strict TDD Strategy

New comprehensive test suite: `tests/Feature/MonolithicDesignEngineTest.php` covering:
1. Anti-flash theme engine & pre-hydration.
2. Floating capsule navbar & brand integrity.
3. Kinetic button structure across all pages.
4. Dynamic CMS data rendering on homepage.
5. Services matrix & dedicated pages rendering.
6. Internal pages dynamic records rendering (About, Careers, Contact).
7. Strict negative assertions ensuring zero legacy tokens and 100% theme awareness.
