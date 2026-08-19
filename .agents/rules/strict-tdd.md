# Strict Test-Driven Development (TDD) Rule

## Non-Negotiable Core Principle
Every modification in this repository—whether adding a new backend feature, modifying a Blade view, adjusting Tailwind styling, creating an API endpoint, or fixing a bug—**MUST strictly follow the Test-Driven Development (TDD) Red-Green-Refactor cycle**.

```
    ┌────────────────┐
    │  1. RED PHASE  │ ── Write failing test first & verify failure
    └───────┬────────┘
            │
            ▼
    ┌────────────────┐
    │ 2. GREEN PHASE │ ── Write minimal code to pass the test
    └───────┬────────┘
            │
            ▼
    ┌────────────────┐
    │3. REFACTOR PH. │ ── Clean, optimize, PSR-12, while keeping green
    └────────────────┘
```

---

## 1. Full-Stack TDD Scope

### A. Backend Development (PHP / Laravel)
- **Unit Tests (`tests/Unit/`):**
  - Models: Test accessors, mutators, enum casting, fillables, query scopes, and relationships.
  - Form Requests: Test validation rules, authorization logic, and custom error messages.
  - Notifications & Mails: Test channel delivery (`mail`, `whatsapp`), content generation, and recipient targeting.
  - Services / Actions: Test business calculations, API integrations, and sanitization functions in isolation.
- **Feature Tests (`tests/Feature/`):**
  - Routes & Controllers: Test HTTP status codes (200, 302, 404), redirects, session flash data, and database mutations (`assertDatabaseHas`, `assertDatabaseMissing`).
  - Security & Middleware: Test honeypot spam protection, Cloudflare Turnstile fallbacks, and security response headers.
  - SEO & Feeds: Verify XML sitemap generation (`/sitemap.xml`), robots.txt (`/robots.txt`), and canonical URL generation.

### B. Frontend & UI/UX Development (Blade, Tailwind CSS v4, Alpine.js)
TDD is strictly applied to UI/UX engineering:
- **Semantic HTML Contracts:**
  - Every page view test must verify a single unique `<h1>` tag hierarchy, plus `<main>`, `<header>`, and `<footer>` elements.
- **Accessibility (a11y) & ARIA:**
  - All interactive buttons and icon togglers must have explicit `aria-label` attributes (e.g. `aria-label="Toggle dark mode"`).
  - All images must carry meaningful `alt` attributes or `alt=""` for decorative assets.
- **Iconography & Performance:**
  - External font stylesheets (`fonts.googleapis.com/css2`, `fonts.googleapis.com/icon`) are strictly forbidden in `<head>`.
  - Raw unrendered font spans (`material-icons`, `material-symbols-outlined`) are prohibited in templates.
  - All icons must render as inline SVGs via the `<x-app-icon>` component.
- **Theme & Design System Tokens:**
  - Verify presence of dark mode classes (`dark:...`) and theme toggle scripts/attributes.
- **Interactive State Contracts:**
  - Test Alpine.js attribute bindings (`x-data`, `x-show`, `@click`, `x-cloak`) within rendered views.

---

## 2. The 3-Step Execution Protocol

1. **Step 1: Write the Failing Test (RED)**
   - Before editing any controller, model, Blade template, or stylesheet, write the corresponding test asserting the expected behavior or defect reproduction.
   - Run `php artisan test --filter=<TestName>` or `./vendor/bin/phpunit --filter=<TestName>`.
   - **Confirm the test fails** for the exact reason expected.

2. **Step 2: Implement Minimal Solution (GREEN)**
   - Write only the production code required to satisfy the failing test.
   - Run the test again and verify that it passes.

3. **Step 3: Refactor & Polish (REFACTOR)**
   - Clean up code structure, enforce PSR-12 formatting, improve performance and CSS elegance.
   - Run the entire test suite (`php artisan test`) to ensure zero regressions across the codebase.

---

## 3. Verification & CI/CD Guardrails
- **100% Pass Rate Requirement:** Pull requests and deployments will fail automatically if any test fails.
- Never commit untested code.
- Never bypass test failures by commenting out or weakening assertions.
