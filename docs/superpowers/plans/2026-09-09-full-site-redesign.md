# Full Website Redesign (70% Accelerate + 30% DesignEngine) Implementation Plan

> **For agentic workers:**  
> **Goal:** Completely eliminate "AI slop" across the entire Accelerate Lab web application by adopting human-designed agency architecture from `Accelerate` (70% visual soul, typography, editorial layouts) and `DesignEngine` (30% technical bento grids, architecture diagrams, retainer tables), covering ALL public routes and the 404 error page.  
> **Architecture:** Monolithic Laravel 12 application with Tailwind CSS v4, Blade components, Alpine.js, GSAP 3 + ScrollTrigger via Vite, and strict SQLite in-memory automated tests.  
> **Tech Stack:** Laravel 12.x, PHP 8.3, Tailwind CSS v4, Alpine.js 3.x, GSAP 3.x with ScrollTrigger, Vite 7, PHPUnit 11.  

## Global Constraints

* **Strict TDD:** Red $\rightarrow$ Green $\rightarrow$ Refactor is mandatory for every task. Write the failing test first, verify failure, implement minimal code, verify pass, and commit.
* **Zero Em-Dash Rule:** The em-dash character (`—`) and en-dash (`–`) are 100% prohibited across all Blade templates, language dictionaries, and components. Use hyphens (`-`), colons (`:`), or dots instead.
* **Palette Alignment:** Primary Accent is Teal `#00BFA5` / `#009688`, Canvas Dark is `#0F172A`, Surface Dark is `#1E293B`, Canvas Light is `#F8FAFC`, Surface Light is `#FFFFFF`.
* **Icons:** 100% inline SVG via `<x-app-icon>` (no icon fonts or unverified SVGs).
* **Accessibility & SEO:** All `<img>` tags must include explicit, descriptive `alt` attributes. Keep heading hierarchy semantic (`h1` $\rightarrow$ `h2` $\rightarrow$ `h3`).
* **Bilingual Support:** All user-facing strings must use Laravel localization `{{ __('...') }}` with translations present in `lang/id.json` and `lang/en.json`.
* **Preserve Required Assertions:** Maintain existing business trust anchors:
  - `Dari Website Bisnis Berkelas hingga Sistem Operasional Kustom`
  - `Konsultasi Langsung dengan Principal Architect`
  - `100% Source Code dan Database Hak Milik Anda`
  - `Resmi PT Akselerasi Digital Mandiri`
  - `$heroStats` dynamic database rendering
  - `hero-cta-primary` (WhatsApp) and `hero-cta-secondary` (Estimator / Contact)
  - Consultation modal triggers (`consultation-modal`, `15-Min` in EN)

---

### Task 1: Global Foundation & Asset Pipeline (GSAP + Header & Footer)

**Files:**
* Modify: `package.json`
* Modify: `resources/js/app.js`
* Modify: `resources/views/frontend/components/header.blade.php`
* Modify: `resources/views/frontend/components/footer.blade.php`
* Create: `tests/Feature/GlobalLayoutRedesignTest.php`

**Interfaces:**
* Consumes: Vite bundle, Alpine.js theme store, Tailwind v4 theme colors.
* Produces: Global layout shell with smooth GSAP entrance animations, accessible mobile navigation, and unified Accelerate-inspired header and footer.

- [ ] **Step 1: Write the failing test**

Create `tests/Feature/GlobalLayoutRedesignTest.php`:
```php
<?php

namespace Tests\Feature;

use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class GlobalLayoutRedesignTest extends TestCase
{
    #[Test]
    public function global_layout_includes_gsap_and_Accelerate_shell_elements()
    {
        $appJs = file_get_contents(resource_path('js/app.js'));
        $this->assertStringContainsString('gsap', $appJs);
        $this->assertStringContainsString('ScrollTrigger', $appJs);

        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('<header', false);
        $response->assertSee('<footer', false);
        $response->assertSee('theme-toggle-btn', false);

        // Assert zero em-dashes across the layout
        $content = $response->getContent();
        $this->assertStringNotContainsString('—', $content);
        $this->assertStringNotContainsString('–', $content);
    }
}
```

- [ ] **Step 2: Run test to verify it fails**

Run: `php artisan test --filter=GlobalLayoutRedesignTest`  
Expected: FAIL with assertion string contains "gsap".

- [ ] **Step 3: Install GSAP and update Header & Footer**

1. Install GSAP:
```bash
npm install gsap
```
2. Update `resources/js/app.js` to register GSAP and ScrollTrigger.
3. Update `resources/views/frontend/components/header.blade.php` and `footer.blade.php` to match Accelerate agency navigation (clean glassmorphism backdrop, bold brand typography, fast mobile drawer with Alpine.js).

- [ ] **Step 4: Run test to verify it passes**

Run: `php artisan test --filter=GlobalLayoutRedesignTest`  
Expected: PASS

- [ ] **Step 5: Verify build & commit**

```bash
npm run build
git add package.json package-lock.json resources/js/app.js resources/views/frontend/components/header.blade.php resources/views/frontend/components/footer.blade.php tests/Feature/GlobalLayoutRedesignTest.php
git commit -m "feat(layout): integrate gsap animations and Accelerate navigation shell"
```

---

### Task 2: Homepage Overhaul (70% Accelerate + 30% DesignEngine)

**Files:**
* Modify: `resources/views/frontend/pages/home.blade.php`
* Modify: `lang/id.json` and `lang/en.json`
* Create: `tests/Feature/HomepageFullRedesignTest.php`

**Interfaces:**
* Consumes: `$heroStats`, `$featuredProjects`, `$settings`.
* Produces: High-converting, anti-slop homepage featuring:
  1. Accelerate Editorial Hero + Availability Badge + Dual CTAs + Trust Anchors.
  2. Pure CSS Client/Partner Marquee.
  3. DesignEngine Sticky Services Showcase ("Kapabilitas Utama" with stacked cards).
  4. DesignEngine 4-card Technical Bento Grid ("Mengapa Accelerate Lab?").
  5. Accelerate Featured Portfolio Grid.
  6. DesignEngine 3-Step Engineering Flow & Retainer Scope Matrix.
  7. Accelerate High-Impact Closing CTA.

- [ ] **Step 1: Write the failing test**

Create `tests/Feature/HomepageFullRedesignTest.php`:
```php
<?php

namespace Tests\Feature;

use App\Models\HomepageStat;
use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class HomepageFullRedesignTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function homepage_renders_all_curated_Accelerate_and_DesignEngine_sections()
    {
        HomepageStat::factory()->create([
            'section' => 'hero',
            'value' => '99.9',
            'unit' => '%',
            'label' => 'Uptime Guarantee',
            'sort_order' => 1,
        ]);

        Project::factory()->create([
            'title' => 'Core Banking Portal',
            'client' => 'Bank Mandiri Mitra',
            'is_featured' => true,
        ]);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Dari Website Bisnis Berkelas hingga Sistem Operasional Kustom');
        $response->assertSee('trusted-partners-marquee', false);
        $response->assertSee('Kapabilitas Utama');
        $response->assertSee('Mengapa Accelerate Lab?');
        $response->assertSee('Core Banking Portal');
        $response->assertSee('process-step-indicator', false);
        $response->assertSee('retainer-scope-matrix', false);
        $response->assertSee('closing-cta-section', false);

        // Check zero em-dashes
        $content = $response->getContent();
        $this->assertStringNotContainsString('—', $content);
        $this->assertStringNotContainsString('–', $content);
    }
}
```

- [ ] **Step 2: Run test to verify it fails**

Run: `php artisan test --filter=HomepageFullRedesignTest`  
Expected: FAIL.

- [ ] **Step 3: Implement curated sections in `home.blade.php`**

Re-architect `resources/views/frontend/pages/home.blade.php` with all 7 curated sections, ensuring strict Teal `#00BFA5` and Slate-900 `#0F172A` styling, zero em-dashes, and verified translation keys in `lang/id.json` and `lang/en.json`.

- [ ] **Step 4: Run test to verify it passes**

Run: `php artisan test --filter=HomepageFullRedesignTest`  
Expected: PASS

- [ ] **Step 5: Commit**

```bash
git add resources/views/frontend/pages/home.blade.php lang/id.json lang/en.json tests/Feature/HomepageFullRedesignTest.php
git commit -m "feat(home): complete 70/30 redesign of homepage"
```

---

### Task 3: Accelerate High-Impact 404 Error Page

**Files:**
* Modify: `resources/views/errors/404.blade.php`
* Create: `tests/Feature/Custom404RedesignTest.php`

**Interfaces:**
* Consumes: Base frontend layout, route helpers (`route('home')`, `route('services')`, `route('contact')`).
* Produces: Accelerate-inspired dramatic 404 page (`Accelerate/dark/404.html`) featuring large bold typography, clean terminal-like error badge, and direct breadcrumb-style return actions.

- [ ] **Step 1: Write the failing test**

Create `tests/Feature/Custom404RedesignTest.php`:
```php
<?php

namespace Tests\Feature;

use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class Custom404RedesignTest extends TestCase
{
    #[Test]
    public function custom_404_page_renders_Accelerate_typography_and_navigation()
    {
        $response = $this->get('/non-existent-route-for-testing-404');

        $response->assertStatus(404);
        $response->assertSee('404');
        $response->assertSee('Accelerate-error-container', false);
        $response->assertSee(route('home'), false);
        $response->assertSee(route('services'), false);
        $response->assertSee(route('contact'), false);

        // Verify zero em-dashes
        $content = $response->getContent();
        $this->assertStringNotContainsString('—', $content);
        $this->assertStringNotContainsString('–', $content);
    }
}
```

- [ ] **Step 2: Run test to verify it fails**

Run: `php artisan test --filter=Custom404RedesignTest`  
Expected: FAIL with `Accelerate-error-container` not found.

- [ ] **Step 3: Implement Accelerate 404 Page in `resources/views/errors/404.blade.php`**

Transform `resources/views/errors/404.blade.php` into an architectural Accelerate layout:
* Container `id="Accelerate-error-container"`.
* Kinetic huge "404" headline in `text-8xl lg:text-[12rem] font-black text-slate-100 dark:text-slate-900 tracking-tighter`.
* Status badge: "Error 404 : Resource Not Found".
* Action pills: "Kembali ke Beranda", "Eksplorasi Layanan", "Hubungi Tim".

- [ ] **Step 4: Run test to verify it passes**

Run: `php artisan test --filter=Custom404RedesignTest`  
Expected: PASS

- [ ] **Step 5: Commit**

```bash
git add resources/views/errors/404.blade.php tests/Feature/Custom404RedesignTest.php
git commit -m "feat(errors): redesign 404 page with bold Accelerate typography"
```

---

### Task 4: Services Directory & Specialized Technical Service Detail Pages

**Files:**
* Modify: `resources/views/frontend/pages/services.blade.php`
* Modify: `resources/views/frontend/pages/web-application-development.blade.php`
* Modify: `resources/views/frontend/pages/cloud-architecture.blade.php`
* Modify: `resources/views/frontend/pages/mobile-app-development.blade.php`
* Modify: `resources/views/frontend/pages/ui-ux-design.blade.php`
* Create: `tests/Feature/ServicesPagesRedesignTest.php`

**Interfaces:**
* Consumes: Service models, capability metadata, technology icons.
* Produces: Editorial service directory and deep-dive technical service pages based on `DesignEngine/app-development/app-development-services.html` and `Accelerate/dark/service-details.html`, featuring architecture diagrams, tech stack pills, and deliverables breakdown.

- [ ] **Step 1: Write the failing test**

Create `tests/Feature/ServicesPagesRedesignTest.php`:
```php
<?php

namespace Tests\Feature;

use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class ServicesPagesRedesignTest extends TestCase
{
    #[Test]
    public function all_service_pages_render_technical_breakdowns_without_em_dashes()
    {
        $routes = [
            '/services',
            '/services/web-application-development',
            '/services/cloud-architecture',
            '/services/mobile-app-development',
            '/services/ui-ux-design',
        ];

        foreach ($routes as $route) {
            $response = $this->get($route);
            $response->assertStatus(200);
            $response->assertSee('service-hero-section', false);

            $content = $response->getContent();
            $this->assertStringNotContainsString('—', $content, "Found em-dash on {$route}");
            $this->assertStringNotContainsString('–', $content, "Found en-dash on {$route}");
        }
    }
}
```

- [ ] **Step 2: Run test to verify it fails**

Run: `php artisan test --filter=ServicesPagesRedesignTest`  
Expected: FAIL with `service-hero-section` missing on routes.

- [ ] **Step 3: Redesign Services directory and 4 detail pages**

* Update `services.blade.php` with a high-end capability matrix.
* Update `web-application-development.blade.php`, `cloud-architecture.blade.php`, `mobile-app-development.blade.php`, and `ui-ux-design.blade.php` with `service-hero-section`, technical deliverables breakdown, tech stack badges (Laravel 12, MySQL, PostgreSQL, Tailwind v4, Redis, AWS/Docker), and clear next-step CTA.
* Replace generic AI text with concrete engineering scope.

- [ ] **Step 4: Run test to verify it passes**

Run: `php artisan test --filter=ServicesPagesRedesignTest`  
Expected: PASS

- [ ] **Step 5: Commit**

```bash
git add resources/views/frontend/pages/services.blade.php resources/views/frontend/pages/*.blade.php tests/Feature/ServicesPagesRedesignTest.php
git commit -m "feat(services): upgrade services directory and 4 technical detail pages"
```

---

### Task 5: Case Studies Directory & Engineering Project Deep-Dive

**Files:**
* Modify: `resources/views/frontend/pages/case-studies.blade.php`
* Modify: `resources/views/frontend/pages/project.blade.php`
* Create: `tests/Feature/CaseStudiesRedesignTest.php`

**Interfaces:**
* Consumes: Database models `App\Models\Project`, tags, client data, and image attachments.
* Produces: Engineering post-mortem style case study layouts inspired by `Accelerate/dark/portfolio-details.html` and `DesignEngine/app-development/app-development-case-study.html` featuring:
  1. Business context and initial bottlenecks.
  2. Technical architecture decisions (why this stack).
  3. Measured outcomes (latencies, load capacity, revenue impact).

- [ ] **Step 1: Write the failing test**

Create `tests/Feature/CaseStudiesRedesignTest.php`:
```php
<?php

namespace Tests\Feature;

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class CaseStudiesRedesignTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function case_studies_and_single_project_render_engineering_post_mortem()
    {
        $project = Project::factory()->create([
            'title' => 'Supply Chain ERP Migration',
            'slug' => 'supply-chain-erp-migration',
            'client' => 'PT Distribusi Logistik',
            'category' => 'Web Application',
        ]);

        $indexResponse = $this->get('/case-studies');
        $indexResponse->assertStatus(200);
        $indexResponse->assertSee('case-studies-grid', false);

        $detailResponse = $this->get('/case-studies/' . $project->slug);
        $detailResponse->assertStatus(200);
        $detailResponse->assertSee('project-architecture-overview', false);

        $content = $detailResponse->getContent();
        $this->assertStringNotContainsString('—', $content);
        $this->assertStringNotContainsString('–', $content);
    }
}
```

- [ ] **Step 2: Run test to verify it fails**

Run: `php artisan test --filter=CaseStudiesRedesignTest`  
Expected: FAIL.

- [ ] **Step 3: Redesign `case-studies.blade.php` and `project.blade.php`**

Apply Accelerate portfolio filtering & grid layout in `case-studies.blade.php` (`id="case-studies-grid"`).
In `project.blade.php`, implement the structured engineering showcase (`id="project-architecture-overview"`), including metric stat counters, architecture diagram slots, challenge vs solution comparison, and client testimonial quote.

- [ ] **Step 4: Run test to verify it passes**

Run: `php artisan test --filter=CaseStudiesRedesignTest`  
Expected: PASS

- [ ] **Step 5: Commit**

```bash
git add resources/views/frontend/pages/case-studies.blade.php resources/views/frontend/pages/project.blade.php tests/Feature/CaseStudiesRedesignTest.php
git commit -m "feat(case-studies): elevate case studies and project details to engineering post-mortem"
```

---

### Task 6: The Lab (R&D & Engineering Sandbox Showcase)

**Files:**
* Modify: `resources/views/frontend/pages/the-lab.blade.php`
* Create: `tests/Feature/TheLabRedesignTest.php`

**Interfaces:**
* Consumes: Open-source repositories, internal tool prototypes, experimental benchmarks.
* Produces: DesignEngine-inspired sandbox & tool directory (`DesignEngine/app-development/index.html`), positioning Accelerate Lab as a deep tech laboratory rather than a conventional agency.

- [ ] **Step 1: Write the failing test**

Create `tests/Feature/TheLabRedesignTest.php`:
```php
<?php

namespace Tests\Feature;

use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class TheLabRedesignTest extends TestCase
{
    #[Test]
    public function the_lab_renders_interactive_tools_and_benchmarks()
    {
        $response = $this->get('/the-lab');

        $response->assertStatus(200);
        $response->assertSee('lab-experiments-grid', false);
        $response->assertSee('The Lab');

        $content = $response->getContent();
        $this->assertStringNotContainsString('—', $content);
        $this->assertStringNotContainsString('–', $content);
    }
}
```

- [ ] **Step 2: Run test to verify it fails**

Run: `php artisan test --filter=TheLabRedesignTest`  
Expected: FAIL with `lab-experiments-grid` not found.

- [ ] **Step 3: Redesign `the-lab.blade.php`**

Structure `the-lab.blade.php` with:
* Container `id="lab-experiments-grid"`.
* Micro-tools showcase: Laravel Query Inspector, Core Web Vitals Calculator, Tailwind v4 Palette Generator.
* Technical experiment cards with interactive state indicators ("Experimental", "Stable", "Open Source").

- [ ] **Step 4: Run test to verify it passes**

Run: `php artisan test --filter=TheLabRedesignTest`  
Expected: PASS

- [ ] **Step 5: Commit**

```bash
git add resources/views/frontend/pages/the-lab.blade.php tests/Feature/TheLabRedesignTest.php
git commit -m "feat(lab): redesign the-lab page with technical experiment cards"
```

---

### Task 7: Company, Contact & Careers (About, Contact, Careers)

**Files:**
* Modify: `resources/views/frontend/pages/about.blade.php`
* Modify: `resources/views/frontend/pages/contact.blade.php`
* Modify: `resources/views/frontend/pages/careers.blade.php`
* Create: `tests/Feature/CompanyPagesRedesignTest.php`

**Interfaces:**
* Consumes: Company values, engineering principles, official PT legal data, contact settings.
* Produces: Clean Accelerate-style About, Contact, and Careers pages (`Accelerate/dark/about.html`, `Accelerate/dark/contact.html`).

- [ ] **Step 1: Write the failing test**

Create `tests/Feature/CompanyPagesRedesignTest.php`:
```php
<?php

namespace Tests\Feature;

use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class CompanyPagesRedesignTest extends TestCase
{
    #[Test]
    public function company_pages_render_Accelerate_layouts_and_legal_anchors()
    {
        $aboutResponse = $this->get('/about');
        $aboutResponse->assertStatus(200);
        $aboutResponse->assertSee('PT Akselerasi Digital Mandiri');
        $aboutResponse->assertSee('about-principles-grid', false);

        $contactResponse = $this->get('/contact');
        $contactResponse->assertStatus(200);
        $contactResponse->assertSee('contact-direct-channels', false);

        $careersResponse = $this->get('/careers');
        $careersResponse->assertStatus(200);
        $careersResponse->assertSee('careers-openings-grid', false);
    }
}
```

- [ ] **Step 2: Run test to verify it fails**

Run: `php artisan test --filter=CompanyPagesRedesignTest`  
Expected: FAIL.

- [ ] **Step 3: Redesign About, Contact, and Careers views**

* In `about.blade.php`, implement the engineering manifesto, leadership bio, and legal credibility (`id="about-principles-grid"`).
* In `contact.blade.php`, implement direct WhatsApp, email, and 15-minute consultation booking channels (`id="contact-direct-channels"`).
* In `careers.blade.php`, implement open engineering roles and hiring standards (`id="careers-openings-grid"`).

- [ ] **Step 4: Run test to verify it passes**

Run: `php artisan test --filter=CompanyPagesRedesignTest`  
Expected: PASS

- [ ] **Step 5: Commit**

```bash
git add resources/views/frontend/pages/about.blade.php resources/views/frontend/pages/contact.blade.php resources/views/frontend/pages/careers.blade.php tests/Feature/CompanyPagesRedesignTest.php
git commit -m "feat(company): redesign about, contact, and careers pages"
```

---

### Task 8: Blog, Article Editorial Showcase & Full Quality Gate

**Files:**
* Modify: `resources/views/frontend/pages/blog.blade.php`
* Modify: `resources/views/frontend/pages/article.blade.php`
* Create: `tests/Feature/FullSiteQualityGateTest.php`

**Interfaces:**
* Consumes: Entire frontend routing table and database models.
* Produces:
  1. Editorial tech publication layout for Blog and Single Article (`Accelerate/dark/blog.html`, `Accelerate/dark/blog-details.html`).
  2. 100% test pass rate across the entire repository test suite.
  3. Production asset compilation with zero errors.

- [ ] **Step 1: Write the failing test**

Create `tests/Feature/FullSiteQualityGateTest.php`:
```php
<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class FullSiteQualityGateTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function full_site_routes_render_cleanly_with_zero_missing_alts_and_zero_em_dashes()
    {
        $user = User::factory()->create();
        $category = Category::factory()->create();
        $article = Article::factory()->create([
            'user_id' => $user->id,
            'category_id' => $category->id,
            'slug' => 'scaling-laravel-monolith-enterprise',
            'published_at' => now()->subDay(),
        ]);

        $routes = [
            '/',
            '/services',
            '/services/web-application-development',
            '/services/cloud-architecture',
            '/services/mobile-app-development',
            '/services/ui-ux-design',
            '/case-studies',
            '/the-lab',
            '/about',
            '/contact',
            '/careers',
            '/blog',
            '/blog/' . $article->slug,
            '/privacy-policy',
            '/terms-of-service',
        ];

        foreach ($routes as $route) {
            $response = $this->get($route);
            $response->assertStatus(200, "Route {$route} failed with status " . $response->status());

            $content = $response->getContent();
            $this->assertStringNotContainsString('—', $content, "Found em-dash on {$route}");
            $this->assertStringNotContainsString('–', $content, "Found en-dash on {$route}");

            preg_match_all('/<img\b(?![^>]*\balt=)[^>]*>/i', $content, $missingAlt);
            $this->assertEmpty($missingAlt[0], "Route {$route} contains images without alt tags: " . implode(', ', $missingAlt[0]));
        }
    }
}
```

- [ ] **Step 2: Run test to verify it fails**

Run: `php artisan test --filter=FullSiteQualityGateTest`  
Expected: FAIL.

- [ ] **Step 3: Redesign `blog.blade.php` and `article.blade.php`**

* In `blog.blade.php`, apply Accelerate editorial publication layout (featured engineering essay at top, grid of deep technical articles below).
* In `article.blade.php`, format the reading experience with crisp typography, code block syntax styling, table of contents, and author bio.

- [ ] **Step 4: Run full automated test suite**

Run:
```bash
php artisan test
```
Expected: 100% tests PASS across the entire repository.

- [ ] **Step 5: Run production asset build**

Run:
```bash
npm run build
```
Expected: Build succeeds with zero errors.

- [ ] **Step 6: Final Commit**

```bash
git add resources/views/frontend/pages/blog.blade.php resources/views/frontend/pages/article.blade.php tests/Feature/FullSiteQualityGateTest.php
git commit -m "feat(full-site): complete comprehensive redesign of all public pages and verified quality gate"
```
