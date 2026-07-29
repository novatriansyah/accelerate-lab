# Production Readiness End-to-End Implementation Plan

> **For agentic workers:**
> **Goal:** Audit, fix, test, secure, polish UI/UX, and optimize the Accelerate Lab Laravel application for a 100% perfect production release.
> **Architecture:** Modern Laravel 11 application with Blade templates, Tailwind CSS, Vite asset pipeline, zero-downtime deployment, and comprehensive security headers.
> **Tech Stack:** PHP 8.3, Laravel 11, Tailwind CSS, Vite, SQLite/MySQL, GitHub Actions CI/CD.

## Global Constraints

- Preserve all existing routes, database schema, and public API contracts.
- Ensure 100% test pass rate with PHPUnit/Pest.
- Maintain responsive, accessible, dark-mode supported UI/UX with smooth micro-animations.
- Enforce strict security headers, CSRF protection, and path traversal defenses.

---

### Task 1: Security Hardening & Storage Route Defense

**Files:**
- Create: `app/Http/Middleware/SecurityHeadersMiddleware.php`
- Modify: `bootstrap/app.php`
- Modify: `routes/web.php:31-45`

**Interfaces:**
- Consumes: HTTP Requests
- Produces: Response headers (`X-Frame-Options`, `X-Content-Type-Options`, `Referrer-Policy`, `Permissions-Policy`, `Strict-Transport-Security`) and safe fallback storage handling.

- [ ] **Step 1: Create SecurityHeadersMiddleware**
  Create `app/Http/Middleware/SecurityHeadersMiddleware.php` to attach security headers to every web response.

- [ ] **Step 2: Register middleware in bootstrap/app.php**
  Add `SecurityHeadersMiddleware::class` to global web middleware stack in `bootstrap/app.php`.

- [ ] **Step 3: Fix storage fallback route in routes/web.php**
  Update `/storage/{path}` route to verify `$basePath` exists and `realpath($basePath)` is not `false` before checking `str_starts_with` to prevent runtime TypeError.

---

### Task 2: PHPUnit Test Modernization & Suite Expansion

**Files:**
- Modify: `tests/Feature/HomepageStatTest.php`
- Create: `tests/Feature/ContactFormTest.php`
- Create: `tests/Feature/PageRoutesTest.php`

**Interfaces:**
- Consumes: Application controllers & models
- Produces: Test assertions for HTTP 200 responses, form validation, throttle middleware, and stat rendering.

- [ ] **Step 1: Modernize HomepageStatTest.php attributes**
  Replace `@test` doc-comments with PHPUnit `#[Test]` attributes to eliminate PHPUnit 12 deprecation warnings.

- [ ] **Step 2: Create ContactFormTest.php**
  Write tests verifying:
  - Valid contact submission creates Lead and redirects with success message.
  - Honeypot `my_favorite_color` silently succeeds without creating database lead.
  - Form validation fails on invalid email or missing name/message.

- [ ] **Step 3: Create PageRoutesTest.php**
  Write tests verifying all static and dynamic pages (`/`, `/about`, `/services`, `/case-studies`, `/blog`, `/careers`, `/contact`, `/privacy-policy`, `/terms-of-service`, `/sitemap.xml`, `/robots.txt`) return HTTP 200.

---

### Task 3: UI/UX & Dynamic Page Polish

**Files:**
- Modify: `resources/views/frontend/pages/home.blade.php`
- Modify: `resources/views/frontend/pages/services.blade.php`
- Modify: `resources/views/frontend/pages/about.blade.php`
- Modify: `resources/views/frontend/pages/contact.blade.php`

**Interfaces:**
- Consumes: Blade view parameters & Tailwind CSS tokens
- Produces: Responsive UI, proper empty state fallbacks, glassmorphism card designs, dark mode contrast.

- [ ] **Step 1: Polish home.blade.php empty states**
  Ensure hero stats, capability stats, recent projects, and testimonials have elegant fallback states when database records are empty.

- [ ] **Step 2: Polish services.blade.php & tech stack marquee**
  Verify responsive layout, hover states, tech stack pill tags, and CTA section contrast.

- [ ] **Step 3: Polish contact.blade.php form UX**
  Add clear validation error messages, loading indicators on submission button, and success banner styling.

---

### Task 4: End-to-End Asset Compilation & System Verification

**Files:**
- Run asset build & test suite.

- [ ] **Step 1: Execute Vite asset build**
  Run `npm run build` and ensure zero errors.

- [ ] **Step 2: Execute PHP test suite**
  Run `php artisan test` and ensure all tests pass.

- [ ] **Step 3: Verify Git tracking**
  Verify `git status` shows clean tracking of `.agents/skills`, workflows, tests, middleware, and views.
