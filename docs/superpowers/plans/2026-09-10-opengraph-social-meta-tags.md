# OpenGraph & Social Sharing Meta Tags Implementation Plan

> **For agentic workers:**
**Goal:** Implement full OpenGraph protocol and Twitter Card meta tags across all pages with a premium default dark-mode hero preview cover asset (`og-cover.png`) and per-page overrides for articles and projects.
**Architecture:** Monolithic Laravel 12 Blade layout extension (`frontend.components.layout`) resolving dynamic `$ogImage`, `$ogType`, `$title`, and `$description` with safe defaults, paired with custom image/type forwarding from `article.blade.php` and `project.blade.php`.
**Tech Stack:** Laravel 12, Blade components, PHPUnit 11 / Laravel Test Runner, Strict TDD.

## Global Constraints
- Framework: Laravel 12.x on PHP 8.2+
- Styling & Views: Tailwind CSS v4 with Blade layouts
- Mandatory Strict TDD: Red -> Green -> Refactor for every step
- Zero external CDN dependencies for meta or assets
- All test assertions must pass without regressions (`php artisan test`)

---

### Task 1: OpenGraph Default Cover Asset Provisioning

**Files:**
- Create: `public/images/og-cover.png`
- Test: `tests/Feature/OpenGraphAssetTest.php`

**Interfaces:**
- Produces: `public/images/og-cover.png` accessible via `asset('images/og-cover.png')`

- [ ] **Step 1: Write the failing test**

```php
<?php

namespace Tests\Feature;

use Tests\TestCase;

class OpenGraphAssetTest extends TestCase
{
    public function test_default_opengraph_cover_image_exists_and_is_valid_png(): void
    {
        $coverPath = public_path('images/og-cover.png');

        $this->assertFileExists($coverPath, 'Default OG cover image must exist in public/images/og-cover.png');
        $this->assertGreaterThan(10000, filesize($coverPath), 'OG cover image must be a non-trivial file');

        $imageInfo = getimagesize($coverPath);
        $this->assertNotFalse($imageInfo, 'File must be a valid image');
        $this->assertEquals(IMAGETYPE_PNG, $imageInfo[2], 'OG cover must be a PNG image');
    }
}
```

- [ ] **Step 2: Run test to verify it fails**

Run: `php artisan test --filter=OpenGraphAssetTest`
Expected: FAIL with "Failed asserting that file ... exists"

- [ ] **Step 3: Provision the default cover asset**

Copy `media_1789012053844.png` from the user's uploaded dark mode hero capture into `public/images/og-cover.png`.

- [ ] **Step 4: Run test to verify it passes**

Run: `php artisan test --filter=OpenGraphAssetTest`
Expected: PASS (1 test, 3 assertions)

- [ ] **Step 5: Commit**

```bash
git add tests/Feature/OpenGraphAssetTest.php public/images/og-cover.png
git commit -m "feat(seo): provision default opengraph cover image asset"
```

---

### Task 2: Layout OpenGraph & Twitter Card Meta Tags Engine

**Files:**
- Modify: `resources/views/frontend/components/layout.blade.php:8-13`
- Test: `tests/Feature/OpenGraphSocialMetaTest.php`

**Interfaces:**
- Consumes: `$ogImage`, `$ogType`, `$title`, `$description`, `$canonical`, `config('app.url')`
- Produces: `<meta property="og:*">` and `<meta name="twitter:*">` tags in `<head>`

- [ ] **Step 1: Write the failing test**

```php
<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OpenGraphSocialMetaTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_renders_complete_default_opengraph_and_twitter_tags(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        // OpenGraph protocol tags
        $response->assertSee('<meta property="og:site_name" content="Accelerate Lab">', false);
        $response->assertSee('<meta property="og:type" content="website">', false);
        $response->assertSee('<meta property="og:title" content="Accelerate Lab - Digital Innovation Agency">', false);
        $response->assertSee('<meta property="og:url" content="http://localhost">', false);
        $response->assertSee('<meta property="og:image" content="http://localhost/images/og-cover.png">', false);
        $response->assertSee('<meta property="og:image:width" content="1200">', false);
        $response->assertSee('<meta property="og:image:height" content="630">', false);
        $response->assertSee('<meta property="og:image:type" content="image/png">', false);

        // Twitter Card tags
        $response->assertSee('<meta name="twitter:card" content="summary_large_image">', false);
        $response->assertSee('<meta name="twitter:title" content="Accelerate Lab - Digital Innovation Agency">', false);
        $response->assertSee('<meta name="twitter:image" content="http://localhost/images/og-cover.png">', false);
    }
}
```

- [ ] **Step 2: Run test to verify it fails**

Run: `php artisan test --filter=OpenGraphSocialMetaTest`
Expected: FAIL with "Failed asserting that '<meta property="og:site_name" content="Accelerate Lab">' matches"

- [ ] **Step 3: Implement minimal meta tags engine in layout**

Update `resources/views/frontend/components/layout.blade.php`:
```blade
    @php
        $pageTitle = $title ?? 'Accelerate Lab - Digital Innovation Agency';
        $pageDescription = $description ?? 'Accelerate Lab is a premier digital innovation agency delivering bespoke software, high-performance cloud architectures, and user-centric design.';
        $pageCanonical = $canonical ?? (rtrim(config('app.url'), '/') . request()->getPathInfo());
        $pageOgType = $ogType ?? 'website';
        $pageOgImage = !empty($ogImage) ? $ogImage : asset('images/og-cover.png');
    @endphp

    <title>{{ $pageTitle }}</title>
    <meta name="description" content="{{ $pageDescription }}">
    <meta property="og:locale" content="{{ app()->getLocale() === 'id' ? 'id_ID' : 'en_US' }}">
    <link rel="canonical" href="{{ $pageCanonical }}">

    {{-- OpenGraph Protocol (Facebook, LinkedIn, WhatsApp) --}}
    <meta property="og:site_name" content="Accelerate Lab">
    <meta property="og:type" content="{{ $pageOgType }}">
    <meta property="og:title" content="{{ $pageTitle }}">
    <meta property="og:description" content="{{ $pageDescription }}">
    <meta property="og:url" content="{{ $pageCanonical }}">
    <meta property="og:image" content="{{ $pageOgImage }}">
    <meta property="og:image:secure_url" content="{{ $pageOgImage }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:type" content="image/png">

    {{-- Twitter Card Protocol (X / Twitter) --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $pageTitle }}">
    <meta name="twitter:description" content="{{ $pageDescription }}">
    <meta name="twitter:image" content="{{ $pageOgImage }}">
```

- [ ] **Step 4: Run test to verify it passes**

Run: `php artisan test --filter=OpenGraphSocialMetaTest`
Expected: PASS

- [ ] **Step 5: Commit**

```bash
git add resources/views/frontend/components/layout.blade.php tests/Feature/OpenGraphSocialMetaTest.php
git commit -m "feat(seo): add opengraph and twitter card meta engine to layout"
```

---

### Task 3: Dynamic Overrides for Articles and Case Studies

**Files:**
- Modify: `resources/views/frontend/pages/article.blade.php:1-5`
- Modify: `resources/views/frontend/pages/project.blade.php:1-5`
- Test: `tests/Feature/OpenGraphSocialMetaTest.php`

**Interfaces:**
- Passes: `$ogType = 'article'` and `$ogImage` from article and project models into `layout.blade.php`

- [ ] **Step 1: Write the failing test for dynamic overrides**

Add to `tests/Feature/OpenGraphSocialMetaTest.php`:
```php
    public function test_article_page_renders_article_og_type_and_custom_image(): void
    {
        $author = \App\Models\User::factory()->create();
        $category = \App\Models\Category::factory()->create();
        $article = \App\Models\Article::factory()->create([
            'title' => 'Building Fast Laravel Monoliths',
            'slug' => 'fast-laravel-monoliths',
            'image_path' => 'articles/cover-sample.jpg',
            'user_id' => $author->id,
            'category_id' => $category->id,
            'published_at' => now()->subHour(),
        ]);

        $response = $this->get("/blog/{$article->slug}");

        $response->assertStatus(200);
        $response->assertSee('<meta property="og:type" content="article">', false);
        $response->assertSee('Building Fast Laravel Monoliths', false);
        $response->assertSee('cover-sample.jpg', false);
    }

    public function test_project_page_renders_custom_og_image_when_available(): void
    {
        $project = \App\Models\Project::factory()->create([
            'title' => 'Telaah LegalTech Platform',
            'slug' => 'telaah-legaltech',
            'image_path' => 'projects/telaah-preview.jpg',
        ]);

        $response = $this->get("/case-studies/{$project->slug}");

        $response->assertStatus(200);
        $response->assertSee('Telaah LegalTech Platform', false);
        $response->assertSee('telaah-preview.jpg', false);
    }
```

- [ ] **Step 2: Run test to verify it fails**

Run: `php artisan test --filter=OpenGraphSocialMetaTest`
Expected: FAIL

- [ ] **Step 3: Update `article.blade.php` and `project.blade.php`**

Update `resources/views/frontend/pages/article.blade.php`:
```blade
@extends('frontend.components.layout', [
    'title' => ($article->title ?? 'Article') . ' - Accelerate Lab',
    'description' => \Illuminate\Support\Str::limit(strip_tags($article->content ?? ''), 160),
    'ogType' => 'article',
    'ogImage' => $article->image_path ? url(\Illuminate\Support\Facades\Storage::url($article->image_path)) : asset('images/og-cover.png'),
])
```

Update `resources/views/frontend/pages/project.blade.php`:
```blade
@extends('frontend.components.layout', [
    'title' => $title ?? ($project->title . ' - Case Study | Accelerate Lab'),
    'description' => $description ?? ($project->description ?? 'Case study by Accelerate Lab.'),
    'ogImage' => $project->image_path ? url(\Illuminate\Support\Facades\Storage::url($project->image_path)) : asset('images/og-cover.png'),
])
```

- [ ] **Step 4: Run test to verify it passes**

Run: `php artisan test --filter=OpenGraphSocialMetaTest`
Expected: PASS (3 tests, all assertions pass)

- [ ] **Step 5: Run complete test suite**

Run: `php artisan test`
Expected: PASS (111+ tests, 0 failures)

- [ ] **Step 6: Commit**

```bash
git add resources/views/frontend/pages/article.blade.php resources/views/frontend/pages/project.blade.php tests/Feature/OpenGraphSocialMetaTest.php
git commit -m "feat(seo): add dynamic opengraph image and type overrides for articles and projects"
```
