# Option A: Technical SEO & PageSpeed Optimization Implementation Plan

> **For agentic workers:** 
**Goal:** Fix Google Search Console coverage issues (canonical duplicates, 404s, redirects) and boost PageSpeed Insights Core Web Vitals (FCP, LCP, CLS, TBT).

**Architecture:** Enforce strict canonical domain normalization using `config('app.url')`, fix JSON-LD `@context` Blade escaping, optimize Google Fonts loading & bundle Alpine.js via Vite, add explicit width/height dimensions for CLS, and add LCP preloading.

**Tech Stack:** Laravel 11, Blade, Vite, Tailwind CSS, Alpine.js, PHPUnit.

## Global Constraints

- APP_URL in `config/app.url` is single source of truth for canonical links.
- No broken internal links in Blade views.
- All JSON-LD output must be valid Schema.org.
- Zero external CDN render-blocking scripts in `<head>`.

---

### Task 1: Strict Canonical Domain Normalization

**Files:**
- Modify: `resources/views/frontend/components/layout.blade.php:15`
- Modify: `app/Http/Controllers/Frontend/SitemapController.php:16-56`
- Create: `tests/Feature/CanonicalSeoTest.php`

**Interfaces:**
- Consumes: `config('app.url')`
- Produces: Normalized canonical `<link rel="canonical" href="...">`

- [ ] **Step 1: Write failing test for Canonical SEO tags**

```php
// tests/Feature/CanonicalSeoTest.php
namespace Tests\Feature;

use Tests\TestCase;

class CanonicalSeoTest extends TestCase
{
    public function test_canonical_url_uses_configured_app_url(): void
    {
        config(['app.url' => 'https://www.acceleratelab.id']);

        $response = $this->get('/about');

        $response::assertStatus(200);
        $response->assertSee('<link rel="canonical" href="https://www.acceleratelab.id/about">', false);
    }
}
```

- [ ] **Step 2: Run test to verify it fails**

Run: `php artisan test --filter=CanonicalSeoTest`
Expected: FAIL (because canonical tag currently outputs `url()->current()`)

- [ ] **Step 3: Update layout.blade.php & SitemapController.php**

In `layout.blade.php`:
```blade
<link rel="canonical" href="{{ $canonical ?? (config('app.url') . request()->getPathInfo()) }}">
```

In `SitemapController.php`:
Ensure `Url::create()` uses fully-qualified URLs prepended with `config('app.url')`.

- [ ] **Step 4: Run test to verify it passes**

Run: `php artisan test --filter=CanonicalSeoTest`
Expected: PASS

- [ ] **Step 5: Commit**

```bash
git add tests/Feature/CanonicalSeoTest.php resources/views/frontend/components/layout.blade.php app/Http/Controllers/Frontend/SitemapController.php
git commit -m "fix(seo): enforce strict app.url canonical domain normalization"
```

---

### Task 2: Fix JSON-LD Schema Escaping & Validation

**Files:**
- Modify: `resources/views/frontend/components/layout.blade.php:63-82`
- Modify: `resources/views/frontend/pages/home.blade.php:3-18`
- Modify: `tests/Feature/CanonicalSeoTest.php`

**Interfaces:**
- Consumes: Blade template compilation
- Produces: Valid `@context` JSON-LD output

- [ ] **Step 1: Add JSON-LD test method**

```php
public function test_json_ld_schema_has_valid_context(): void
{
    $response = $this->get('/');
    $response->assertStatus(200);
    $response->assertSee('"@context": "https://schema.org"', false);
    $response->assertDontSee('"@@context"', false);
}
```

- [ ] **Step 2: Run test to verify failure**

Run: `php artisan test --filter=CanonicalSeoTest::test_json_ld_schema_has_valid_context`
Expected: FAIL if `@@context` is present in rendered output.

- [ ] **Step 3: Fix Blade template JSON-LD syntax**

Replace `"@@context"` with `"@context"` or `"{!! '@context' !!}"` to prevent double-at Blade directive confusion.

- [ ] **Step 4: Run test to verify it passes**

Run: `php artisan test --filter=CanonicalSeoTest`
Expected: PASS

- [ ] **Step 5: Commit**

```bash
git add resources/views/frontend/components/layout.blade.php resources/views/frontend/pages/home.blade.php tests/Feature/CanonicalSeoTest.php
git commit -m "fix(seo): correct JSON-LD context syntax for search engines"
```

---

### Task 3: Bundle Alpine.js & Consolidate Google Fonts

**Files:**
- Modify: `package.json`
- Modify: `resources/js/app.js`
- Modify: `resources/views/frontend/components/layout.blade.php:40-60`
- Test: `tests/Feature/CanonicalSeoTest.php`

**Interfaces:**
- Consumes: Vite assets pipeline
- Produces: Bundled AlpineJS & single consolidated font link request

- [ ] **Step 1: Install Alpine.js via npm and import in resources/js/app.js**

```javascript
// resources/js/app.js
import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();
```

- [ ] **Step 2: Remove CDN script & consolidate fonts in layout.blade.php**

Remove `https://cdn.jsdelivr.net/npm/alpinejs...` script tag.
Consolidate font request:
```html
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500&family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&display=swap" />
```

- [ ] **Step 3: Run npm build to test Vite compilation**

Run: `npm run build`
Expected: Build succeeds with bundled Alpine.js.

- [ ] **Step 4: Add asset test method and verify**

```php
public function test_layout_does_not_contain_cdn_alpine(): void
{
    $response = $this->get('/');
    $response->assertDontSee('cdn.jsdelivr.net/npm/alpinejs', false);
}
```
Run: `php artisan test --filter=CanonicalSeoTest`
Expected: PASS

- [ ] **Step 5: Commit**

```bash
git add package.json package-lock.json resources/js/app.js resources/views/frontend/components/layout.blade.php tests/Feature/CanonicalSeoTest.php
git commit -m "perf(assets): bundle Alpine.js via Vite and consolidate Google Fonts"
```

---

### Task 4: Image Dimensions (CLS) & Hero Preload (LCP)

**Files:**
- Modify: `resources/views/frontend/components/header.blade.php`
- Modify: `resources/views/frontend/components/footer.blade.php`
- Modify: `resources/views/frontend/pages/home.blade.php`

**Interfaces:**
- Consumes: Blade template image tags
- Produces: `width`, `height`, `loading="lazy"`, and `fetchpriority="high"` attributes on img/svg tags.

- [ ] **Step 1: Write test for image dimensions and lazy loading**

```php
public function test_header_logo_has_explicit_dimensions(): void
{
    $response = $this->get('/');
    $response->assertSee('width=', false);
    $response->assertSee('height=', false);
}
```

- [ ] **Step 2: Add explicit width/height and LCP preloading**

Add `width` and `height` to logo images & SVGs in `header.blade.php` and `footer.blade.php`.
Add `loading="lazy"` to below-fold section images and `decoding="async"`.

- [ ] **Step 3: Run tests**

Run: `php artisan test --filter=CanonicalSeoTest`
Expected: PASS

- [ ] **Step 4: Commit**

```bash
git add resources/views/frontend/components/header.blade.php resources/views/frontend/components/footer.blade.php resources/views/frontend/pages/home.blade.php tests/Feature/CanonicalSeoTest.php
git commit -m "perf(cwv): set image dimensions for CLS and lazy loading"
```

---

### Task 5: Audit Internal Routes & Legacy Redirects

**Files:**
- Modify: `routes/web.php`
- Test: `tests/Feature/RouteAuditTest.php`

**Interfaces:**
- Consumes: HTTP Routes
- Produces: Clean routes with zero broken internal links or unhandled 404s.

- [ ] **Step 1: Write RouteAuditTest for standard pages**

```php
namespace Tests\Feature;

use Tests\TestCase;

class RouteAuditTest extends TestCase
{
    public function test_all_public_pages_return_200(): void
    {
        $routes = ['/', '/about', '/services', '/case-studies', '/blog', '/careers', '/contact', '/privacy-policy', '/terms-of-service'];
        foreach ($routes as $route) {
            $this->get($route)->assertStatus(200);
        }
    }

    public function test_legacy_lab_route_redirects(): void
    {
        $this->get('/the-lab')->assertRedirect('/blog');
    }
}
```

- [ ] **Step 2: Run test**

Run: `php artisan test --filter=RouteAuditTest`
Expected: PASS

- [ ] **Step 3: Commit**

```bash
git add tests/Feature/RouteAuditTest.php
git commit -m "test(routes): add automated test coverage for public routes and redirects"
```
