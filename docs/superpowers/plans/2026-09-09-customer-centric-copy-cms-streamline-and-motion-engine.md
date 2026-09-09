# Customer-Centric Copywriting, Filament CMS Pruning, Copyright Sanitization, and Kinetic Motion Engine Implementation Plan

> **For agentic workers:**
**Goal:** Transform Accelerate Lab into a tech-agnostic, customer-centric digital agency platform by deleting unneeded Filament CMS resources, sanitizing all copyright mentions of external templates, rewriting copy into natural business-focused Indonesian and English, purging all narrow tech-stack mentions, and activating the full proprietary kinetic JS motion engine.
**Architecture:** Monolithic Laravel 12 + Tailwind CSS v4 + Alpine.js + GSAP ScrollTrigger + Filament v3.
**Tech Stack:** PHP 8.3, Laravel 12.x, Filament v3, Tailwind CSS v4, GSAP 3.12, ScrollTrigger, Proprietary Magnetic Cursor, Alpine.js.

---

## Global Constraints

1. **Copyright Sanitization (Zero Template Mentions):** Absolutely ZERO occurrences of `Redox` or `NextSaaS` (case-insensitive) across all views, CSS, JS, Blade comments, and PHP code. All concepts must be labeled with Accelerate Lab proprietary naming (e.g., Accelerate Studio Hero, Accelerate Bento Grid, Kinetic Capsule Navbar).
2. **Permanent CMS Deletion (Zero Bloat):** Do NOT merely hide resources. Permanently delete `TechnologyResource`, `DemoResource`, `CompanyMilestoneResource`, and `CoreValueResource` from `app/Filament/Resources/`. Retain only the 10 essential client-facing and business-generating resources.
3. **Tech-Agnostic and Zero Tech-Stack Mentions:** Zero specific framework, library, or language mentions on customer-facing pages (no Docker, Kubernetes, Laravel, Livewire, Alpine, Vue, React, Next.js, Flutter, SQLite, Python, Tailwind, etc.). All copy must focus on customer business outcomes (growth, efficiency, reliability, scalability, security, and ROI).
4. **Natural Indonesian Language:** When locale is `id`, 100% of visible content must be natural, human-written, professional Indonesian (not translated robot AI English). Zero awkward language mixing.
5. **Strict Writing Rule:** Absolute prohibition of em-dashes across all user-facing code, views, and responses. Use colons, commas, or parentheses instead.
6. **Proprietary Motion Fidelity:** Full kinetic motion engine (interactive magnetic cursor with Electric Teal `#00BFA5`, directional GSAP `.fade-anim` scroll reveals, dynamic number counters `.t-counter`, bento mouse spotlight tracker, and continuous infinite marquee).
7. **Strict TDD:** Red -> Green -> Refactor cycle. All tests must pass 100% with `php artisan test` / `php vendor/bin/phpunit`.

---

## Task Breakdown

### Task 1: Filament CMS Pruning & Navigation Restructuring

**Files:**
- Delete: `app/Filament/Resources/TechnologyResource.php`
- Delete: `app/Filament/Resources/TechnologyResource/`
- Delete: `app/Filament/Resources/DemoResource.php`
- Delete: `app/Filament/Resources/DemoResource/`
- Delete: `app/Filament/Resources/CompanyMilestoneResource.php`
- Delete: `app/Filament/Resources/CompanyMilestoneResource/`
- Delete: `app/Filament/Resources/CoreValueResource.php`
- Delete: `app/Filament/Resources/CoreValueResource/`
- Delete: `tests/Feature/Filament/DemoResourceTest.php`
- Modify: `app/Filament/Resources/LeadResource.php`
- Modify: `app/Filament/Resources/ServiceResource.php`
- Modify: `app/Filament/Resources/ProjectResource.php`
- Modify: `app/Filament/Resources/TestimonialResource.php`
- Modify: `app/Filament/Resources/ArticleResource.php`
- Modify: `app/Filament/Resources/CategoryResource.php`
- Modify: `app/Filament/Resources/SiteSettingResource.php`
- Modify: `app/Filament/Resources/TeamMemberResource.php`
- Modify: `app/Filament/Resources/HomepageStatResource.php`
- Modify: `app/Filament/Resources/JobPostingResource.php`
- Create: `tests/Feature/Filament/PrunedCmsNavigationTest.php`

**Interfaces:**
- Consumes: Filament v3 Resource classes and navigation group contracts.
- Produces: 10 remaining resources grouped cleanly into 4 business categories:
  - `Inbox & Calon Klien`: `LeadResource`
  - `Solusi & Portofolio`: `ServiceResource`, `ProjectResource`, `TestimonialResource`
  - `Wawasan & Publikasi`: `ArticleResource`, `CategoryResource`
  - `Pengaturan & Organisasi`: `SiteSettingResource`, `TeamMemberResource`, `HomepageStatResource`, `JobPostingResource`

- [ ] **Step 1: Write failing test verifying pruned CMS resources and navigation groups**

```php
<?php

namespace Tests\Feature\Filament;

use App\Filament\Resources\ArticleResource;
use App\Filament\Resources\CategoryResource;
use App\Filament\Resources\HomepageStatResource;
use App\Filament\Resources\JobPostingResource;
use App\Filament\Resources\LeadResource;
use App\Filament\Resources\ProjectResource;
use App\Filament\Resources\ServiceResource;
use App\Filament\Resources\SiteSettingResource;
use App\Filament\Resources\TeamMemberResource;
use App\Filament\Resources\TestimonialResource;
use Tests\TestCase;

class PrunedCmsNavigationTest extends TestCase
{
    public function test_pruned_resources_no_longer_exist_in_cms(): void
    {
        $this->assertFalse(class_exists('App\\Filament\\Resources\\TechnologyResource'));
        $this->assertFalse(class_exists('App\\Filament\\Resources\\DemoResource'));
        $this->assertFalse(class_exists('App\\Filament\\Resources\\CompanyMilestoneResource'));
        $this->assertFalse(class_exists('App\\Filament\\Resources\\CoreValueResource'));
    }

    public function test_essential_resources_are_configured_with_business_navigation_groups(): void
    {
        $this->assertTrue(class_exists(LeadResource::class));
        $this->assertTrue(class_exists(ServiceResource::class));
        $this->assertTrue(class_exists(ProjectResource::class));
        $this->assertTrue(class_exists(TestimonialResource::class));
        $this->assertTrue(class_exists(ArticleResource::class));
        $this->assertTrue(class_exists(CategoryResource::class));
        $this->assertTrue(class_exists(SiteSettingResource::class));
        $this->assertTrue(class_exists(TeamMemberResource::class));
        $this->assertTrue(class_exists(HomepageStatResource::class));
        $this->assertTrue(class_exists(JobPostingResource::class));

        $this->assertEquals('Inbox & Calon Klien', LeadResource::getNavigationGroup());
        $this->assertEquals('Solusi & Portofolio', ServiceResource::getNavigationGroup());
        $this->assertEquals('Solusi & Portofolio', ProjectResource::getNavigationGroup());
        $this->assertEquals('Solusi & Portofolio', TestimonialResource::getNavigationGroup());
        $this->assertEquals('Wawasan & Publikasi', ArticleResource::getNavigationGroup());
        $this->assertEquals('Wawasan & Publikasi', CategoryResource::getNavigationGroup());
        $this->assertEquals('Pengaturan & Organisasi', SiteSettingResource::getNavigationGroup());
        $this->assertEquals('Pengaturan & Organisasi', TeamMemberResource::getNavigationGroup());
        $this->assertEquals('Pengaturan & Organisasi', HomepageStatResource::getNavigationGroup());
        $this->assertEquals('Pengaturan & Organisasi', JobPostingResource::getNavigationGroup());
    }
}
```

- [ ] **Step 2: Run test to verify failure**

Run: `php artisan test --filter=PrunedCmsNavigationTest`
Expected: FAIL because deleted classes still exist and navigation groups have not been reassigned.

- [ ] **Step 3: Delete unneeded resources and assign clean navigation groups**

Delete:
- `app/Filament/Resources/TechnologyResource.php` and folder `app/Filament/Resources/TechnologyResource/`
- `app/Filament/Resources/DemoResource.php` and folder `app/Filament/Resources/DemoResource/`
- `app/Filament/Resources/CompanyMilestoneResource.php` and folder `app/Filament/Resources/CompanyMilestoneResource/`
- `app/Filament/Resources/CoreValueResource.php` and folder `app/Filament/Resources/CoreValueResource/`
- `tests/Feature/Filament/DemoResourceTest.php`

Update `protected static ?string $navigationGroup` across:
- `LeadResource.php` -> `'Inbox & Calon Klien'`
- `ServiceResource.php`, `ProjectResource.php`, `TestimonialResource.php` -> `'Solusi & Portofolio'`
- `ArticleResource.php`, `CategoryResource.php` -> `'Wawasan & Publikasi'`
- `SiteSettingResource.php`, `TeamMemberResource.php`, `HomepageStatResource.php`, `JobPostingResource.php` -> `'Pengaturan & Organisasi'`

- [ ] **Step 4: Run test to verify it passes**

Run: `php artisan test --filter=PrunedCmsNavigationTest`
Expected: PASS.

- [ ] **Step 5: Commit**

```bash
git add app/Filament/Resources tests/Feature/Filament
git commit -m "feat(cms): prune unnecessary resources and organize focused business navigation"
```

---

### Task 2: Copyright Sanitization (Purge all "Redox" and "NextSaaS" Mentions)

**Files:**
- Modify: `resources/css/design-system.css`
- Modify: `resources/views/frontend/components/header.blade.php`
- Modify: `resources/views/frontend/components/footer.blade.php`
- Modify: `resources/views/frontend/pages/home.blade.php`
- Modify: `resources/views/frontend/pages/about.blade.php`
- Modify: `resources/views/frontend/pages/case-studies.blade.php`
- Modify: `resources/views/frontend/pages/project.blade.php`
- Modify: `resources/views/frontend/pages/services.blade.php`
- Modify: `resources/views/frontend/pages/service.blade.php`
- Modify: `resources/views/frontend/pages/cloud-architecture.blade.php`
- Modify: `resources/views/frontend/pages/web-application-development.blade.php`
- Modify: `resources/views/frontend/pages/mobile-app-development.blade.php`
- Modify: `resources/views/frontend/pages/ui-ux-design.blade.php`
- Create: `tests/Feature/CopyrightSanitizationTest.php`

**Interfaces:**
- Consumes: Blade template comments, CSS headers, rendered view HTML.
- Produces: 100% sanitized views with Accelerate Lab proprietary naming and zero mentions of third-party template names.

- [ ] **Step 1: Write failing test asserting zero template references in source files and rendered HTML**

```php
<?php

namespace Tests\Feature;

use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\File;
use Tests\TestCase;

class CopyrightSanitizationTest extends TestCase
{
    use RefreshDatabase;

    public function test_no_mentions_of_external_templates_in_source_views_and_css(): void
    {
        $scanPaths = [
            resource_path('views'),
            resource_path('css'),
            resource_path('js'),
        ];

        foreach ($scanPaths as $path) {
            $files = File::allFiles($path);
            foreach ($files as $file) {
                $content = file_get_contents($file->getRealPath());
                $this->assertDoesNotMatchRegularExpression(
                    '/(redox|nextsaas)/i',
                    $content,
                    "External template reference found in source file: {$file->getRelativePathname()}"
                );
            }
        }
    }

    public function test_no_mentions_of_external_templates_in_rendered_http_responses(): void
    {
        // Seed blueprint services so routes do not 404
        $slugs = [
            'cloud-architecture',
            'web-application-development',
            'mobile-app-development',
            'ui-ux-design',
        ];

        foreach ($slugs as $slug) {
            Service::create([
                'title' => ucwords(str_replace('-', ' ', $slug)),
                'slug' => $slug,
                'category' => 'development',
                'has_custom_page' => true,
                'sort_order' => 1,
            ]);
        }

        $routes = [
            '/',
            '/about',
            '/services',
            '/services/cloud-architecture',
            '/services/web-application-development',
            '/services/mobile-app-development',
            '/services/ui-ux-design',
            '/case-studies',
            '/contact',
            '/careers',
            '/blog',
        ];

        foreach ($routes as $route) {
            $response = $this->get($route);
            $response->assertStatus(200);
            $response->assertDontSee('Redox', false);
            $response->assertDontSee('NextSaaS', false);
            $response->assertDontSee('redox', false);
            $response->assertDontSee('nextsaas', false);
        }
    }
}
```

- [ ] **Step 2: Run test to verify failure**

Run: `php artisan test --filter=CopyrightSanitizationTest`
Expected: FAIL because `redox` and `nextsaas` exist in Blade comments and CSS header comments across multiple files.

- [ ] **Step 3: Remove all template references from Blade comments and CSS**

Replace all comments containing `Redox` and `NextSaaS` in `resources/css/design-system.css`, `resources/views/frontend/components/header.blade.php`, `footer.blade.php`, and all `resources/views/frontend/pages/*.blade.php` with Accelerate Lab studio naming (e.g., `Accelerate Studio Hero`, `Dynamic Bento Matrix`, `Kinetic Architecture Stepper`).

- [ ] **Step 4: Run test to verify it passes**

Run: `php artisan test --filter=CopyrightSanitizationTest`
Expected: PASS.

- [ ] **Step 5: Commit**

```bash
git add resources/views resources/css tests/Feature/CopyrightSanitizationTest.php
git commit -m "chore(copyright): purge all external template references and establish proprietary naming"
```

---

### Task 3: Implement Accelerate Lab Kinetic JS Motion Engine

**Files:**
- Create: `resources/js/magnetic-cursor.js`
- Modify: `resources/js/app.js`
- Modify: `resources/css/design-system.css`
- Modify: `resources/views/frontend/components/layout.blade.php`
- Create: `tests/Feature/KineticMotionEngineTest.php`

**Interfaces:**
- Consumes: GSAP 3.12, ScrollTrigger, DOM elements with `.fade-anim`, `.t-counter`, `data-cursor-text`, and `.rr-btn`.
- Produces: Smooth interactive magnetic cursor (pointer fine only), directional GSAP scroll reveals, viewport number ticker, and bento mouse spotlight.

- [ ] **Step 1: Write failing test asserting motion engine markup in layout**

```php
<?php

namespace Tests\Feature;

use Tests\TestCase;

class KineticMotionEngineTest extends TestCase
{
    public function test_layout_contains_magnetic_cursor_and_motion_hooks(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('cb-cursor', false);
        $response->assertSee('cb-cursor-text', false);
    }
}
```

- [ ] **Step 2: Run test to verify failure**

Run: `php artisan test --filter=KineticMotionEngineTest`
Expected: FAIL because `cb-cursor` markup is not yet in `layout.blade.php`.

- [ ] **Step 3: Implement `magnetic-cursor.js`, motion engine in `app.js`, and layout elements**

1. Create `resources/js/magnetic-cursor.js`:
```js
export function initMagneticCursor() {
    if (typeof window === 'undefined') return;
    if (!window.matchMedia('(pointer: fine)').matches) return;

    const cursor = document.querySelector('.cb-cursor');
    const cursorText = document.querySelector('.cb-cursor-text');
    if (!cursor) return;

    let mouseX = -100;
    let mouseY = -100;
    let cursorX = -100;
    let cursorY = -100;

    window.addEventListener('mousemove', (e) => {
        mouseX = e.clientX;
        mouseY = e.clientY;
    });

    function render() {
        cursorX += (mouseX - cursorX) * 0.18;
        cursorY += (mouseY - cursorY) * 0.18;
        cursor.style.transform = `translate3d(${cursorX}px, ${cursorY}px, 0)`;
        requestAnimationFrame(render);
    }
    requestAnimationFrame(render);

    document.querySelectorAll('a, button, .rr-btn, [data-cursor-stick]').forEach((el) => {
        el.addEventListener('mouseenter', () => cursor.classList.add('-active'));
        el.addEventListener('mouseleave', () => cursor.classList.remove('-active'));
    });

    document.querySelectorAll('[data-cursor-text]').forEach((el) => {
        el.addEventListener('mouseenter', () => {
            cursor.classList.add('-text');
            if (cursorText) cursorText.textContent = el.getAttribute('data-cursor-text') || '';
        });
        el.addEventListener('mouseleave', () => {
            cursor.classList.remove('-text');
            if (cursorText) cursorText.textContent = '';
        });
    });
}
```

2. Update `resources/js/app.js` to register GSAP scroll reveals, number counters, bento spotlights, and cursor initialization.
3. Add cursor and spotlight styles to `resources/css/design-system.css`.
4. Inject cursor markup at the top of `<body>` in `resources/views/frontend/components/layout.blade.php`:
```html
<div class="cb-cursor" aria-hidden="true">
    <div class="cb-cursor-text"></div>
</div>
```

- [ ] **Step 4: Run test to verify it passes**

Run: `php artisan test --filter=KineticMotionEngineTest`
Expected: PASS.

- [ ] **Step 5: Run Vite build**

Run: `cmd /c "npm run build"`
Expected: Build successfully created in `public/build/`.

- [ ] **Step 6: Commit**

```bash
git add resources/js resources/css resources/views/frontend/components/layout.blade.php tests/Feature/KineticMotionEngineTest.php
git commit -m "feat(motion): integrate accelerate lab magnetic cursor and kinetic motion engine"
```

---

### Task 4: Customer-Centric Copywriting & Tech-Stack Purge (Homepage & Global Shell)

**Files:**
- Modify: `resources/views/frontend/pages/home.blade.php`
- Modify: `resources/views/frontend/components/header.blade.php`
- Modify: `resources/views/frontend/components/footer.blade.php`
- Create: `tests/Feature/CustomerCentricHomepageCopyTest.php`

**Interfaces:**
- Consumes: Blade templates for homepage and global navigation/footer.
- Produces: Tech-agnostic, outcome-focused messaging centered on growth, operational efficiency, and enterprise reliability.

- [ ] **Step 1: Write failing test verifying zero tech stack mentions and business copy**

```php
<?php

namespace Tests\Feature;

use Tests\TestCase;

class CustomerCentricHomepageCopyTest extends TestCase
{
    public function test_homepage_has_zero_tech_stack_mentions(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        $forbidden = [
            'Alpine.js',
            'Livewire',
            'Docker',
            'Kubernetes',
            'Laravel',
            'React Native',
            'Flutter',
            'Vue',
            'Next.js',
        ];

        foreach ($forbidden as $tech) {
            $response->assertDontSee($tech, false);
        }

        $response->assertSee('Pertumbuhan', false);
        $response->assertSee('Efisiensi', false);
        $response->assertSee('PT Akselerasi Digital Mandiri', false);
    }
}
```

- [ ] **Step 2: Run test to verify failure**

Run: `php artisan test --filter=CustomerCentricHomepageCopyTest`
Expected: FAIL because developer jargon (Docker, Kubernetes, Alpine.js) is currently present in mockup previews and capabilities.

- [ ] **Step 3: Update `home.blade.php`, `header.blade.php`, and `footer.blade.php` with business copy**

1. Hero Section:
   - ID: "Mitra Inovasi Digital untuk Akselerasi Pertumbuhan & Efisiensi Bisnis."
   - EN: "Strategic Digital Innovation Partner for Business Growth and Enterprise Scalability."
2. Capabilities & Bento Grid:
   - Replace framework badges with business pillars:
     - Pertumbuhan Omzet: Solusi konversi transaksi dan retensi pelanggan digital.
     - Efisiensi Operasional: Otomasi alur kerja internal menghemat ribuan jam kerja manual.
     - Ketahanan & Keamanan: Arsitektur enterprise zero-downtime siap jutaan transaksi.
3. Apply motion attributes (`.fade-anim`, `data-direction="bottom"`, `.t-counter`).

- [ ] **Step 4: Run test to verify it passes**

Run: `php artisan test --filter=CustomerCentricHomepageCopyTest`
Expected: PASS.

- [ ] **Step 5: Commit**

```bash
git add resources/views/frontend/pages/home.blade.php resources/views/frontend/components tests/Feature/CustomerCentricHomepageCopyTest.php
git commit -m "feat(copy): overhaul homepage and shell to tech-agnostic customer-centric narrative"
```

---

### Task 5: Customer-Centric Copywriting for Services & 4 Blueprint Hubs

**Files:**
- Modify: `resources/views/frontend/pages/services.blade.php`
- Modify: `resources/views/frontend/pages/service.blade.php`
- Modify: `resources/views/frontend/pages/cloud-architecture.blade.php`
- Modify: `resources/views/frontend/pages/web-application-development.blade.php`
- Modify: `resources/views/frontend/pages/mobile-app-development.blade.php`
- Modify: `resources/views/frontend/pages/ui-ux-design.blade.php`
- Create: `tests/Feature/CustomerCentricServicesCopyTest.php`

**Interfaces:**
- Consumes: 4 Blueprint dedicated views and generic service page.
- Produces: Pure business problem-solving copy with zero tech jargon across all service offerings.

- [ ] **Step 1: Write failing test verifying services are tech-agnostic**

```php
<?php

namespace Tests\Feature;

use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CustomerCentricServicesCopyTest extends TestCase
{
    use RefreshDatabase;

    public function test_services_and_blueprint_pages_are_tech_agnostic(): void
    {
        $slugs = [
            'cloud-architecture',
            'web-application-development',
            'mobile-app-development',
            'ui-ux-design',
        ];

        foreach ($slugs as $slug) {
            Service::create([
                'title' => ucwords(str_replace('-', ' ', $slug)),
                'slug' => $slug,
                'category' => 'development',
                'has_custom_page' => true,
                'sort_order' => 1,
            ]);
        }

        $routes = [
            '/services',
            '/services/cloud-architecture',
            '/services/web-application-development',
            '/services/mobile-app-development',
            '/services/ui-ux-design',
        ];

        $forbidden = [
            'Kubernetes',
            'Docker',
            'Next.js',
            'React Native',
            'Flutter',
            'Tailwind',
            'Laravel',
        ];

        foreach ($routes as $route) {
            $response = $this->get($route);
            $response->assertStatus(200);
            foreach ($forbidden as $tech) {
                $response->assertDontSee($tech, false);
            }
        }
    }
}
```

- [ ] **Step 2: Run test to verify failure**

Run: `php artisan test --filter=CustomerCentricServicesCopyTest`
Expected: FAIL because current service titles and headers mention Laravel, Next.js, Kubernetes, Docker, and Flutter.

- [ ] **Step 3: Update `services.blade.php` and the 4 blueprint views with business copy**

Reposition services:
1. `cloud-architecture`: Keandalan Komputasi & Ketahanan Bisnis Enterprise.
2. `web-application-development`: Platform Web Terintegrasi & Otomasi Alur Kerja.
3. `mobile-app-development`: Aplikasi Mobile Pelanggan & Optimalisasi Konversi.
4. `ui-ux-design`: Riset Produk & Desain Berorientasi Konversi Pengguna.

- [ ] **Step 4: Run test to verify it passes**

Run: `php artisan test --filter=CustomerCentricServicesCopyTest`
Expected: PASS.

- [ ] **Step 5: Commit**

```bash
git add resources/views/frontend/pages/services* resources/views/frontend/pages/cloud* resources/views/frontend/pages/web* resources/views/frontend/pages/mobile* resources/views/frontend/pages/ui* tests/Feature/CustomerCentricServicesCopyTest.php
git commit -m "feat(copy): transform services and blueprint hubs into tech-agnostic business solutions"
```

---

### Task 6: Customer-Centric Copywriting for Company, Portfolio, and Lab Pages

**Files:**
- Modify: `resources/views/frontend/pages/case-studies.blade.php`
- Modify: `resources/views/frontend/pages/project.blade.php`
- Modify: `resources/views/frontend/pages/about.blade.php`
- Modify: `resources/views/frontend/pages/contact.blade.php`
- Modify: `resources/views/frontend/pages/careers.blade.php`
- Modify: `resources/views/frontend/pages/the-lab.blade.php`
- Modify: `resources/views/frontend/pages/blog.blade.php`
- Modify: `resources/views/frontend/pages/article.blade.php`
- Create: `tests/Feature/CustomerCentricCompanyPagesCopyTest.php`

**Interfaces:**
- Consumes: Company, portfolio, article, and contact Blade views.
- Produces: Trust-building narrative focused on client success stories, verified legal ownership, and executive advisory.

- [ ] **Step 1: Write failing test verifying business focus across company pages**

```php
<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CustomerCentricCompanyPagesCopyTest extends TestCase
{
    use RefreshDatabase;

    public function test_company_pages_are_free_of_tech_stack_jargon(): void
    {
        $routes = ['/about', '/case-studies', '/contact', '/careers', '/blog'];
        $forbidden = ['Laravel', 'Vue.js', 'Alpine.js', 'Livewire', 'Kubernetes', 'Docker'];

        foreach ($routes as $route) {
            $response = $this->get($route);
            $response->assertStatus(200);
            foreach ($forbidden as $tech) {
                $response->assertDontSee($tech, false);
            }
        }
    }
}
```

- [ ] **Step 2: Run test to verify failure**

Run: `php artisan test --filter=CustomerCentricCompanyPagesCopyTest`
Expected: FAIL because tech stack tags and framework jargon exist on about and careers pages.

- [ ] **Step 3: Update company views with natural, human, customer-centric copy**

1. `about.blade.php`: Emphasize leadership, strategic digital capability, and legal credibility under PT Akselerasi Digital Mandiri.
2. `case-studies.blade.php` & `project.blade.php`: Structure around Client Business Challenge -> Strategic Solution -> Tangible ROI Metric.
3. `contact.blade.php`: Strategic digital consultation intake.
4. `the-lab.blade.php`: Experimental digital prototypes driving client market advantages.

- [ ] **Step 4: Run test to verify it passes**

Run: `php artisan test --filter=CustomerCentricCompanyPagesCopyTest`
Expected: PASS.

- [ ] **Step 5: Commit**

```bash
git add resources/views/frontend/pages/about.blade.php resources/views/frontend/pages/case* resources/views/frontend/pages/project.blade.php resources/views/frontend/pages/contact.blade.php resources/views/frontend/pages/careers.blade.php resources/views/frontend/pages/the-lab.blade.php resources/views/frontend/pages/blog.blade.php resources/views/frontend/pages/article.blade.php tests/Feature/CustomerCentricCompanyPagesCopyTest.php
git commit -m "feat(copy): overhaul company, portfolio, and lab pages to client ROI narrative"
```

---

### Task 7: Master Quality Gate, Production Build & Git Synchronization

**Files:**
- Modify: `tests/Feature/MonolithicDesignEngineTest.php`
- Modify: `public/build/*`

- [ ] **Step 1: Run complete PHPUnit test suite**

Run: `php artisan test`
Expected: 100% PASS with 0 errors, 0 failures.

- [ ] **Step 2: Compile production Vite assets**

Run: `cmd /c "npm run build"`
Expected: Clean build with 0 errors.

- [ ] **Step 3: Synchronize Git Branches**

```bash
git add .
git commit -m "chore(release): complete customer-centric transformation, copyright sanitization, and motion engine"
git checkout master
git merge development --ff-only
git push origin development master
git checkout development
```

---

## Verification Plan

### Automated Tests
1. `php artisan test --filter=PrunedCmsNavigationTest` (Verifikasi pembersihan total 4 resource CMS & grouping 10 resource tersisa)
2. `php artisan test --filter=CopyrightSanitizationTest` (Verifikasi pemindaian file source & rute: 0 penyebutan Redox / NextSaaS)
3. `php artisan test --filter=KineticMotionEngineTest` (Verifikasi kursor magnetik & hooks animasi GSAP)
4. `php artisan test --filter=CustomerCentricHomepageCopyTest` (Verifikasi 0 tech stack di homepage)
5. `php artisan test --filter=CustomerCentricServicesCopyTest` (Verifikasi 0 tech stack di rute & blueprint layanan)
6. `php artisan test --filter=CustomerCentricCompanyPagesCopyTest` (Verifikasi bahasa bisnis di seluruh halaman perusahaan)
7. `php artisan test` (100% pass seluruh test suite repositori)
8. `cmd /c "npm run build"` (0 build errors pada bundle produksi Vite)
