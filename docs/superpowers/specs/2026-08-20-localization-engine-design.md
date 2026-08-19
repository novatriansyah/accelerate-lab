# Localization (i18n) Engine Design Specification

## 1. Executive Summary & Objective
Implement a high-performance, seamless **Dual-Language Localization Engine (🇮🇩 Bahasa Indonesia / 🇬🇧 English)** across Accelerate Lab. The system allows visitors to switch effortlessly between Indonesian and English, with automatic session persistence, natural business-oriented copywriting (not robotic literal translations), and dynamic localization of the Project Scoping Wizard, Consultation Modal, Navigation, and Trust Guarantees.

---

## 2. Core Architecture

### 2.1 Locale Middleware & Session Persistence (`SetLocaleMiddleware`)
- **Supported Locales:** `['id', 'en']` (Default fallback: `en`, or `id` when requested).
- **Persistence:** Stored in session `locale` and cookie `accelerate_locale`.
- **Switch Route:** `GET /lang/{locale}` validates the locale, sets session/cookie, and redirects back to the previous URL (`redirect()->back()`).

### 2.2 Translation Dictionaries (`lang/id.json` & `lang/en.json`)
- Centralized key-value translation strings covering:
  - Navigation & Headers (`Services`, `Case Studies`, `About`, `Blog`, `Careers`, `Contact Us`, `Get an Estimate`, `15-Min Free Call`).
  - Hero & Value Propositions (`Launch & Scale with Velocity`, subheadings, statistics).
  - Enterprise Trust Guarantees (`100% Full IP Ownership`, `Direct Architect Oversight`, `Tested for High Reliability`, `Transparent Milestone Pricing`).
  - Project Scoping Wizard & Consultation Modal steps, options, and pre-filled WhatsApp templates.
  - Footer and Call-To-Action banners.

### 2.3 UI Language Switcher Component
- Rendered in `<x-header>` desktop navigation and mobile drawer.
- Shows current active locale with toggle buttons for `ID` and `EN`.
- Accessible with ARIA labels (`aria-label="Switch language to Indonesian"`, `aria-label="Switch language to English"`).

---

## 3. Strict TDD Verification Strategy
- **Feature Tests:**
  - `tests/Feature/LocalizationTest.php`:
    - Tests `GET /lang/id` sets session and redirects back.
    - Tests `GET /lang/en` sets session and redirects back.
    - Tests invalid locale returns back with default locale.
    - Tests translated strings are rendered on the homepage, contact page, and scoping wizard when locale is set to `id`.
    - Tests translated strings are rendered when locale is set to `en`.
- **UI/UX Design System Tests:**
  - `tests/Feature/UiUxDesignSystemTest.php`: Ensures language switcher is present, accessible, and has semantic landmarks.
