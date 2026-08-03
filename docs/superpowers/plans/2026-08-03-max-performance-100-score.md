# 100/100 Performance & Accessibility Optimization Implementation Plan

> **For agentic workers:** 
**Goal:** Achieve 100/100 scores across ALL PageSpeed Insights categories (Performance, Accessibility, Best Practices, SEO) on both Mobile and Desktop.

**Architecture:** Remove external Google Fonts network RTT by self-hosting/inlining icon SVGs and system-ui font stack, replace GPU-heavy CSS blur animations on mobile hero with lightweight SVG gradients, optimize CSS asset delivery, and raise text color contrast ratios.

**Tech Stack:** PHP 8.3, Laravel 12, Filament v3, Vite 7, Tailwind CSS 4, Alpine.js 3, PHPUnit 11.

## Global Constraints

- 0 external font stylesheet requests in `<head>` (eliminates fonts.googleapis.com render blocking).
- FCP < 0.9s on Desktop, < 1.5s on Mobile.
- LCP < 1.2s on Desktop, < 2.0s on Mobile.
- CLS = 0.00.
- All text elements must meet WCAG AA contrast standard (> 4.5:1 ratio).

---

### Task 1: Replace Font Icons with Zero-Latency Inline SVGs

**Files:**
- Create: `resources/views/components/icon.blade.php`
- Modify: `resources/views/frontend/components/layout.blade.php:40-44`
- Modify: `resources/views/frontend/components/header.blade.php`
- Modify: `resources/views/frontend/components/footer.blade.php`
- Modify: `resources/views/frontend/pages/home.blade.php`
- Test: `tests/Feature/PerformanceCheckTest.php`

**Interfaces:**
- Consumes: Icon names (e.g. `arrow_forward`, `brightness_4`, `menu`, `close`)
- Produces: Inline SVG markup (0 HTTP requests)

- [ ] **Step 1: Write test for zero external font requests**

```php
// tests/Feature/PerformanceCheckTest.php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PerformanceCheckTest extends TestCase
{
    use RefreshDatabase;

    public function test_no_external_google_font_stylesheets_in_head(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertDontSee('fonts.googleapis.com/css2', false);
    }
}
```

- [ ] **Step 2: Run test to verify it fails**

Run: `php artisan test --filter=PerformanceCheckTest`
Expected: FAIL

- [ ] **Step 3: Replace Google Font CSS link with system font stack and inline SVGs**

In `layout.blade.php`:
Remove `fonts.googleapis.com` stylesheet link.
Set CSS font family to system-ui stack in `app.css` / Tailwind.

Replace icon font tags (`<span class="material-icons-round">...</span>`) in `header.blade.php`, `footer.blade.php`, `home.blade.php` with inline SVG icons.

- [ ] **Step 4: Run test to verify it passes**

Run: `php artisan test --filter=PerformanceCheckTest`
Expected: PASS

- [ ] **Step 5: Commit**

```bash
git add resources/views/frontend/components/layout.blade.php resources/views/frontend/components/header.blade.php resources/views/frontend/components/footer.blade.php resources/views/frontend/pages/home.blade.php tests/Feature/PerformanceCheckTest.php
git commit -m "perf(fonts): eliminate render-blocking font stylesheets with inline SVGs"
```

---

### Task 2: Mobile Hero GPU Render & Animation Optimization

**Files:**
- Modify: `resources/views/frontend/pages/home.blade.php:20-30`

**Interfaces:**
- Consumes: Blade template hero markup
- Produces: High-performance CSS background glow without main-thread GPU paint bottlenecks on mobile

- [ ] **Step 1: Optimize blur and animation classes for mobile viewports**

In `home.blade.php`:
Change heavy `blur-[100px] animate-pulse-slow` on mobile to `hidden sm:block blur-[60px]` or lightweight CSS radial gradient background (`bg-[radial-gradient(...)]`).

- [ ] **Step 2: Run test suite**

Run: `php artisan test --filter=PerformanceCheckTest`
Expected: PASS

- [ ] **Step 3: Commit**

```bash
git add resources/views/frontend/pages/home.blade.php
git commit -m "perf(hero): optimize mobile hero background paint performance"
```

---

### Task 3: Accessibility 100/100 - Text Contrast & ARIA Labels

**Files:**
- Modify: `resources/views/frontend/components/footer.blade.php:10,24,39,70`
- Modify: `resources/views/frontend/components/header.blade.php:19,26`
- Modify: `resources/views/frontend/pages/home.blade.php`
- Test: `tests/Feature/PerformanceCheckTest.php`

**Interfaces:**
- Consumes: WCAG AA contrast guidelines
- Produces: 100/100 Accessibility score on Lighthouse / PageSpeed Insights

- [ ] **Step 1: Add accessibility test assertion**

```php
public function test_all_interactive_buttons_have_aria_labels(): void
{
    $response = $this->get('/');
    $response->assertStatus(200);
    $response->assertSee('aria-label="Toggle dark mode"', false);
}
```

- [ ] **Step 2: Update low-contrast text colors and ARIA attributes**

In `footer.blade.php` & `header.blade.php`:
- Change `text-slate-400` / `text-slate-500` on dark backgrounds to `text-slate-300` / `text-slate-400` for high contrast ratio (> 4.5:1).
- Ensure all interactive buttons have descriptive `aria-label` attributes.

- [ ] **Step 3: Run tests**

Run: `php artisan test --filter=PerformanceCheckTest`
Expected: PASS

- [ ] **Step 4: Commit**

```bash
git add resources/views/frontend/components/footer.blade.php resources/views/frontend/components/header.blade.php tests/Feature/PerformanceCheckTest.php
git commit -m "accessibility(wcag): elevate contrast ratios and ARIA attributes for 100/100 score"
```

---

### Task 4: Production Build & Asset Preloading

**Files:**
- Modify: `resources/views/frontend/components/layout.blade.php`

**Interfaces:**
- Consumes: Vite manifest
- Produces: CSS module preloading `<link rel="modulepreload">` & critical CSS optimization

- [ ] **Step 1: Add Vite modulepreload and style preloads**

In `layout.blade.php`:
Add critical preload hints for Vite CSS/JS assets.

- [ ] **Step 2: Run production Vite build and test suite**

Run: `cmd /c npm run build`
Run: `php artisan test`
Expected: PASS

- [ ] **Step 3: Commit**

```bash
git add resources/views/frontend/components/layout.blade.php
git commit -m "perf(vite): add critical asset preload directives for max FCP speed"
```
