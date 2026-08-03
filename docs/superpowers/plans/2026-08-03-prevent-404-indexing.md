# Prevent 404 URL Indexing & Custom Error 404 Implementation Plan

> **For agentic workers:** 
> **Goal:** Prevent non-existent (404) URLs from leaking into `sitemap.xml` and search engine indexes, clean canonical URL tags, build a custom branded 404 error page, and establish automated 200 OK verification tests for all sitemap URLs.
>
> **Architecture:** Filter `Service` model custom view existence in `SitemapController`, sanitize `<link rel="canonical">` in `<x-layout>`, create a premium branded `resources/views/errors/404.blade.php` view using `<x-layout>`, and add PHPUnit feature tests to verify sitemap link integrity and custom 404 page rendering.
>
> **Tech Stack:** PHP 8.2+, Laravel 12.x, Filament 3.2, Spatie Laravel Sitemap 7.3, PHPUnit 11.5, Tailwind CSS, Blade components.

## Global Constraints

- Must maintain PHPUnit test suite passing 100%.
- Must adhere to Laravel 12 conventions and PHP 8.2 static typing.
- Must not break existing valid sitemap links for active services, projects, or blog posts.
- Custom 404 view must render within the app layout (`<x-layout>`) matching Accelerate Lab design standards.

---

### Task 1: Filter Custom Service Pages in SitemapController

**Files:**
- Modify: `app/Http/Controllers/Frontend/SitemapController.php:30-37`
- Test: `tests/Feature/SitemapAndRobotsTest.php`

**Interfaces:**
- Consumes: `Service` model (`has_custom_page`, `slug`, `updated_at`), `view()->exists()`
- Produces: Sanitized service entries in `/sitemap.xml`

- [ ] **Step 1: Write failing test in `tests/Feature/SitemapAndRobotsTest.php`**

```php
    #[Test]
    public function sitemap_xml_excludes_services_with_missing_custom_page_views()
    {
        // Service with custom page enabled, but view does not exist
        $serviceWithoutView = Service::factory()->create([
            'slug' => 'non-existent-custom-view-service-xyz',
            'has_custom_page' => true,
        ]);

        $response = $this->get('/sitemap.xml');

        $response->assertStatus(200);
        $response->assertDontSee($serviceWithoutView->slug);
    }
```

- [ ] **Step 2: Run test to verify it fails**

Run: `vendor/bin/phpunit --filter=sitemap_xml_excludes_services_with_missing_custom_page_views`
Expected: FAIL (SitemapController adds all services without checking if the view exists)

- [ ] **Step 3: Write minimal implementation in `app/Http/Controllers/Frontend/SitemapController.php`**

```php
        // Services
        Service::all()->each(function (Service $service) use ($sitemap, $baseUrl) {
            if ($service->has_custom_page) {
                $cleanSlug = preg_replace('/[^a-z0-9\-]/', '', strtolower($service->slug));
                if (! view()->exists("frontend.pages.{$cleanSlug}")) {
                    return;
                }
            }

            $sitemap->add(
                Url::create("{$baseUrl}/services/{$service->slug}")
                    ->setPriority(0.7)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                    ->setLastModificationDate($service->updated_at)
            );
        });
```

- [ ] **Step 4: Run test to verify it passes**

Run: `vendor/bin/phpunit --filter=sitemap_xml_excludes_services_with_missing_custom_page_views`
Expected: PASS

- [ ] **Step 5: Commit**

```bash
git add app/Http/Controllers/Frontend/SitemapController.php tests/Feature/SitemapAndRobotsTest.php
git commit -m "fix(seo): exclude custom services with missing views from sitemap"
```

---

### Task 2: Standardize Canonical Meta Tag in Layout Blade Component

**Files:**
- Modify: `resources/views/frontend/components/layout.blade.php:15-30`
- Test: `tests/Feature/CanonicalUrlTest.php`

**Interfaces:**
- Consumes: `$canonical` parameter or fallback `url()->current()`
- Produces: Clean `<link rel="canonical">` tag without query parameter leaks

- [ ] **Step 1: Write failing test in `tests/Feature/CanonicalUrlTest.php`**

```php
<?php

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class CanonicalUrlTest extends TestCase
{
    #[Test]
    public function page_renders_canonical_url_without_query_params_by_default()
    {
        $response = $this->get('/services?query_param_leak=123');

        $response->assertStatus(200);
        $response->assertSee('<link rel="canonical" href="' . url('/services') . '">', false);
    }
}
```

- [ ] **Step 2: Run test to verify it fails**

Run: `vendor/bin/phpunit --filter=CanonicalUrlTest`
Expected: FAIL (layout uses custom path logic instead of standard `url()->current()`)

- [ ] **Step 3: Write minimal implementation in `resources/views/frontend/components/layout.blade.php`**

```blade
    <link rel="canonical" href="{{ $canonical ?? url()->current() }}">
    <meta property="og:url" content="{{ $canonical ?? url()->current() }}">
    <meta property="twitter:url" content="{{ $canonical ?? url()->current() }}">
```

- [ ] **Step 4: Run test to verify it passes**

Run: `vendor/bin/phpunit --filter=CanonicalUrlTest`
Expected: PASS

- [ ] **Step 5: Commit**

```bash
git add resources/views/frontend/components/layout.blade.php tests/Feature/CanonicalUrlTest.php
git commit -m "fix(seo): clean canonical meta tags to prevent query parameter leaks"
```

---

### Task 3: Create Custom Branded 404 Error View

**Files:**
- Create: `resources/views/errors/404.blade.php`
- Test: `tests/Feature/Custom404PageTest.php`

**Interfaces:**
- Consumes: `<x-layout>`, Accelerate Lab Tailwind design components
- Produces: Branded 404 Page returning 404 HTTP status code

- [ ] **Step 1: Write failing test in `tests/Feature/Custom404PageTest.php`**

```php
<?php

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class Custom404PageTest extends TestCase
{
    #[Test]
    public function non_existent_url_renders_custom_branded_404_view()
    {
        $response = $this->get('/this-route-definitely-does-not-exist-xyz');

        $response->assertStatus(404);
        $response->assertSee('404');
        $response->assertSee('Page Not Found');
        $response->assertSee('Back to Home');
    }
}
```

- [ ] **Step 2: Run test to verify it fails**

Run: `vendor/bin/phpunit --filter=Custom404PageTest`
Expected: FAIL (No custom 404 Blade view exists)

- [ ] **Step 3: Create `resources/views/errors/404.blade.php` view**

```blade
<x-layout 
    title="404 - Page Not Found | Accelerate Lab" 
    description="The page you are looking for does not exist or has been moved. Explore Accelerate Lab services, case studies, or return home."
>
    <div class="relative min-h-[70vh] flex items-center justify-center py-20 px-4 sm:px-6 lg:px-8 overflow-hidden bg-slate-950">
        <!-- Background Glow Effects -->
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-primary-500/10 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute top-1/3 left-1/3 w-64 h-64 bg-cyan-500/10 rounded-full blur-2xl pointer-events-none"></div>

        <div class="relative z-10 max-w-2xl w-full text-center">
            <!-- 404 Badge / Code -->
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary-500/10 border border-primary-500/20 text-primary-400 text-sm font-semibold tracking-wide uppercase mb-6">
                <span class="w-2 h-2 rounded-full bg-primary-400 animate-ping"></span>
                Error Code 404
            </div>

            <h1 class="text-7xl sm:text-9xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-white via-slate-200 to-slate-400 tracking-tight mb-4">
                404
            </h1>

            <h2 class="text-2xl sm:text-3xl font-bold text-white mb-4">
                Page Not Found
            </h2>

            <p class="text-slate-400 text-lg mb-8 max-w-lg mx-auto">
                Oops! The page you were looking for doesn't exist, has been moved, or is temporarily unavailable.
            </p>

            <!-- Navigation Actions -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('home') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 rounded-xl bg-gradient-to-r from-primary-600 to-cyan-600 text-white font-medium hover:from-primary-500 hover:to-cyan-500 transition-all duration-200 shadow-lg shadow-primary-500/20">
                    Back to Home
                </a>
                <a href="{{ route('services') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 rounded-xl bg-slate-900 border border-slate-800 text-slate-300 font-medium hover:bg-slate-800 hover:text-white transition-all duration-200">
                    Explore Services
                </a>
                <a href="{{ route('contact') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 rounded-xl bg-slate-900 border border-slate-800 text-slate-300 font-medium hover:bg-slate-800 hover:text-white transition-all duration-200">
                    Contact Us
                </a>
            </div>
        </div>
    </div>
</x-layout>
```

- [ ] **Step 4: Run test to verify it passes**

Run: `vendor/bin/phpunit --filter=Custom404PageTest`
Expected: PASS

- [ ] **Step 5: Commit**

```bash
git add resources/views/errors/404.blade.php tests/Feature/Custom404PageTest.php
git commit -m "feat(ui): add custom branded 404 error page"
```

---

### Task 4: Comprehensive Sitemap 200 OK Crawl Verification Test

**Files:**
- Modify: `tests/Feature/SitemapAndRobotsTest.php`

**Interfaces:**
- Consumes: `/sitemap.xml` route response, simplexml_load_string
- Produces: Automated HTTP status validation for every URL listed in the sitemap

- [ ] **Step 1: Write the test in `tests/Feature/SitemapAndRobotsTest.php`**

```php
    #[Test]
    public function every_url_in_sitemap_returns_http_200()
    {
        Article::factory()->create();
        Project::factory()->create();
        Service::factory()->create(['has_custom_page' => false]);

        $response = $this->get('/sitemap.xml');
        $response->assertStatus(200);

        $xml = simplexml_load_string($response->getContent());
        $urls = [];

        foreach ($xml->url as $urlElement) {
            $urls[] = (string) $urlElement->loc;
        }

        $this->assertNotEmpty($urls);

        foreach ($urls as $url) {
            $path = parse_url($url, PHP_URL_PATH);
            $pageResponse = $this->get($path);
            $pageResponse->assertStatus(200);
        }
    }
```

- [ ] **Step 2: Run test to verify it passes**

Run: `vendor/bin/phpunit --filter=every_url_in_sitemap_returns_http_200`
Expected: PASS

- [ ] **Step 3: Run full test suite**

Run: `vendor/bin/phpunit`
Expected: ALL PASS

- [ ] **Step 4: Commit**

```bash
git add tests/Feature/SitemapAndRobotsTest.php
git commit -m "test(seo): add automated HTTP 200 status verification for all sitemap URLs"
```
