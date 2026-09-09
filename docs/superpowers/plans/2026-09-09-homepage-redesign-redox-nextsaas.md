# Homepage Redesign (70% Redox + 30% NextSaaS) Implementation Plan

> **For agentic workers:**  
> **Goal:** Transform Accelerate Lab's homepage from generic "AI slop" into a tier-1 modern digital agency experience by curating proven UI/UX structures from `redox` (70% visual soul & layout rhythm) and `nextsaas` (30% technical bento grids & engineering proof), fully harmonized to Accelerate Lab's Teal `#00BFA5` and Slate-900 `#0F172A` brand palette.  
> **Architecture:** Clean monolithic Laravel 12 application with Tailwind CSS v4, Blade components, Alpine.js, GSAP + ScrollTrigger, and strict SQLite in-memory automated tests.  
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

---

### Task 1: GSAP & ScrollTrigger Setup in Asset Pipeline

**Files:**
* Modify: `package.json`
* Modify: `resources/js/app.js`
* Create: `tests/Feature/AssetPipelineTest.php`

**Interfaces:**
* Consumes: Node packages via `npm`, Vite compilation pipeline.
* Produces: Global `window.gsap` and `window.ScrollTrigger` registration with safe DOMContentLoaded initialization for smooth reveals and sticky scrolling.

- [ ] **Step 1: Write the failing test**

Create `tests/Feature/AssetPipelineTest.php`:
```php
<?php

namespace Tests\Feature;

use Tests\TestCase;

class AssetPipelineTest extends TestCase
{
    #[\PHPUnit\Framework\Attributes\Test]
    public function app_js_contains_gsap_and_scrolltrigger_registration()
    {
        $appJsPath = resource_path('js/app.js');
        $this->assertFileExists($appJsPath);

        $content = file_get_contents($appJsPath);
        $this->assertStringContainsString('gsap', $content);
        $this->assertStringContainsString('ScrollTrigger', $content);
    }
}
```

- [ ] **Step 2: Run test to verify it fails**

Run: `php artisan test --filter=AssetPipelineTest`  
Expected: FAIL with assertion string contains "gsap".

- [ ] **Step 3: Install GSAP and update `resources/js/app.js`**

Run:
```bash
npm install gsap
```

Update `resources/js/app.js`:
```javascript
import './bootstrap';
import Alpine from 'alpinejs';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

window.Alpine = Alpine;
window.gsap = gsap;
window.ScrollTrigger = ScrollTrigger;

Alpine.start();

function initTheme() {
    const themeToggleBtns = document.querySelectorAll('.theme-toggle-btn');

    if (localStorage.getItem('theme') === 'dark' ||
        (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }

    themeToggleBtns.forEach(btn => {
        const newBtn = btn.cloneNode(true);
        btn.parentNode.replaceChild(newBtn, btn);

        newBtn.addEventListener('click', () => {
            document.documentElement.classList.toggle('dark');

            if (document.documentElement.classList.contains('dark')) {
                localStorage.setItem('theme', 'dark');
            } else {
                localStorage.setItem('theme', 'light');
            }
        });
    });
}

function initScrollAnimations() {
    if (typeof window === 'undefined') return;

    // Subtle entrance animation for elements with data-reveal
    const revealElements = document.querySelectorAll('[data-reveal]');
    if (revealElements.length > 0 && window.gsap) {
        window.gsap.fromTo(revealElements, 
            { opacity: 0, y: 30 },
            { 
                opacity: 1, 
                y: 0, 
                duration: 0.8, 
                stagger: 0.15, 
                ease: 'power2.out',
                scrollTrigger: {
                    trigger: revealElements[0],
                    start: 'top 85%',
                }
            }
        );
    }
}

document.addEventListener('DOMContentLoaded', () => {
    initTheme();
    initScrollAnimations();
});
```

- [ ] **Step 4: Run test to verify it passes**

Run: `php artisan test --filter=AssetPipelineTest`  
Expected: PASS

- [ ] **Step 5: Verify asset build & commit**

Run:
```bash
npm run build
git add package.json package-lock.json resources/js/app.js tests/Feature/AssetPipelineTest.php
git commit -m "feat(assets): install and register gsap with scrolltrigger"
```

---

### Task 2: Redox-Inspired High-Impact Hero Section

**Files:**
* Modify: `resources/views/frontend/pages/home.blade.php:21-120`
* Create: `tests/Feature/HomepageHeroRedesignTest.php`

**Interfaces:**
* Consumes: `$heroStats` (database collection), `$settings` (contact whatsapp/phone), translations from `lang/`.
* Produces: Tier-1 digital agency hero layout inspired by `redox/dark/digital-agency.html` with dark/light editorial typography, active availability badge, dual CTA, and principal architect trust anchors.

- [ ] **Step 1: Write the failing test**

Create `tests/Feature/HomepageHeroRedesignTest.php`:
```php
<?php

namespace Tests\Feature;

use App\Models\HomepageStat;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class HomepageHeroRedesignTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function redesigned_hero_renders_editorial_structure_and_anchors()
    {
        HomepageStat::factory()->create([
            'section' => 'hero',
            'value' => '99.9',
            'unit' => '%',
            'label' => 'Uptime Guarantee',
            'sort_order' => 1,
        ]);

        $response = $this->get('/');

        $response->assertStatus(200);
        // Required commercial headlines and anchors
        $response->assertSee('Dari Website Bisnis Berkelas hingga Sistem Operasional Kustom');
        $response->assertSee('Konsultasi Langsung dengan Principal Architect');
        $response->assertSee('100% Source Code dan Database Hak Milik Anda');
        $response->assertSee('Resmi PT Akselerasi Digital Mandiri');
        $response->assertSee('id="hero-cta-primary"', false);
        $response->assertSee('id="hero-cta-secondary"', false);
        $response->assertSee('99.9');
        $response->assertSee('%');

        // Verify no em-dashes or en-dashes exist
        $content = $response->getContent();
        $this->assertStringNotContainsString('—', $content);
        $this->assertStringNotContainsString('–', $content);
    }
}
```

- [ ] **Step 2: Run test to verify it fails or passes current assertions**

Run: `php artisan test --filter=HomepageHeroRedesignTest`

- [ ] **Step 3: Implement minimal Redox-inspired Hero in `resources/views/frontend/pages/home.blade.php`**

Replace lines 21-120 in `resources/views/frontend/pages/home.blade.php` with the enhanced layout featuring:
1. Editorial typography headline with subtle gradient highlight on primary keywords.
2. Clean status pill: "Tersedia untuk Proyek Baru Kuartal Ini" with animated pulse indicator.
3. Dual high-contrast buttons (`#hero-cta-primary` WhatsApp and `#hero-cta-secondary` Estimator).
4. Three distinct trust anchors rendered with `<x-app-icon name="check_circle" />`.
5. Redox-style technical preview card on the right column (interactive system metrics, real response times, and clean terminal/dashboard snippet rather than vague floating shapes).
6. `$heroStats` rendered cleanly in a border-separated metric bar.

- [ ] **Step 4: Run test to verify it passes**

Run: `php artisan test --filter=HomepageHeroRedesignTest`  
Expected: PASS

- [ ] **Step 5: Commit**

```bash
git add resources/views/frontend/pages/home.blade.php tests/Feature/HomepageHeroRedesignTest.php
git commit -m "feat(home): elevate hero section with redox editorial layout"
```

---

### Task 3: Redox Clean Client & Partner Proof Marquee

**Files:**
* Modify: `resources/views/frontend/pages/home.blade.php`
* Create: `tests/Feature/HomepageMarqueeTest.php`

**Interfaces:**
* Consumes: CSS `@keyframes marquee` in `tailwind.config.js`.
* Produces: Clean, continuous client/partner proof strip with zero bloated jQuery scripts.

- [ ] **Step 1: Write the failing test**

Create `tests/Feature/HomepageMarqueeTest.php`:
```php
<?php

namespace Tests\Feature;

use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class HomepageMarqueeTest extends TestCase
{
    #[Test]
    public function homepage_renders_accessible_partner_marquee()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('trusted-partners-marquee', false);

        // Assert all images in marquee have alt attributes
        $content = $response->getContent();
        preg_match('/<div[^>]*id="trusted-partners-marquee"[^>]*>(.*?)<\/div>/s', $content, $matches);
        $this->assertNotEmpty($matches);
        
        preg_match_all('/<img\b(?![^>]*\balt=)[^>]*>/i', $matches[1], $missingAlt);
        $this->assertEmpty($missingAlt[0]);
    }
}
```

- [ ] **Step 2: Run test to verify it fails**

Run: `php artisan test --filter=HomepageMarqueeTest`  
Expected: FAIL with `trusted-partners-marquee` not found.

- [ ] **Step 3: Implement Redox-style Marquee in `home.blade.php`**

Add the `#trusted-partners-marquee` section immediately below the hero with pure Tailwind v4 `animate-marquee` and smooth opacity mask on left and right edges.

- [ ] **Step 4: Run test to verify it passes**

Run: `php artisan test --filter=HomepageMarqueeTest`  
Expected: PASS

- [ ] **Step 5: Commit**

```bash
git add resources/views/frontend/pages/home.blade.php tests/Feature/HomepageMarqueeTest.php
git commit -m "feat(home): add accessible pure-css partner proof marquee"
```

---

### Task 4: NextSaaS App-Dev Sticky Services & Architecture Bento Grid

**Files:**
* Modify: `resources/views/frontend/pages/home.blade.php`
* Modify: `lang/id.json` and `lang/en.json`
* Create: `tests/Feature/HomepageServicesBentoTest.php`

**Interfaces:**
* Consumes: Services from `App\Models\Service` or curated core offerings (Web Applications, Cloud Architecture, UI/UX Design, MVP/Internal Systems).
* Produces:
  1. Sticky left-column header ("Kapabilitas Utama" / "Core Capabilities") with right-column stacked service cards (inspired by `nextsaas/app-development/index.html:2325-2405`).
  2. 4-card Engineering Bento Grid ("Mengapa Accelerate Lab?" / *Strategy First, Scalable Code, Full-Cycle Testing, Transparent Communication* inspired by `nextsaas/app-development/index.html:2500-2650`).

- [ ] **Step 1: Write the failing test**

Create `tests/Feature/HomepageServicesBentoTest.php`:
```php
<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class HomepageServicesBentoTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function homepage_renders_sticky_services_and_tech_bento_grid()
    {
        // In Indonesian locale
        $responseId = $this->withSession(['locale' => 'id'])->get('/');
        $responseId->assertStatus(200);
        $responseId->assertSee('Kapabilitas Utama');
        $responseId->assertSee('Mengapa Accelerate Lab?');
        $responseId->assertSee('Arsitektur Skalabel');
        $responseId->assertSee('Pengujian Menyeluruh');

        // In English locale
        $responseEn = $this->withSession(['locale' => 'en'])->get('/');
        $responseEn->assertStatus(200);
        $responseEn->assertSee('Core Capabilities');
        $responseEn->assertSee('Why Choose Accelerate Lab?');
        $responseEn->assertSee('Scalable Architecture');
        $responseEn->assertSee('Full-Cycle Testing');
    }
}
```

- [ ] **Step 2: Run test to verify it fails**

Run: `php artisan test --filter=HomepageServicesBentoTest`  
Expected: FAIL with string "Arsitektur Skalabel" not found.

- [ ] **Step 3: Implement Sticky Services & Bento Grid in `home.blade.php` and add translation keys**

Update `resources/views/frontend/pages/home.blade.php` with:
* Sticky layout: `lg:sticky lg:top-28` for the title and subtitle on the left; stacked feature cards on the right.
* Bento Grid section with 4 cards:
  - Card 1: *Strategy First* (Bisnis dan Arsitektur Sejalan)
  - Card 2: *Scalable Architecture* (Laravel 12 monolith berkinerja tinggi, database teroptimasi)
  - Card 3: *Full-Cycle Testing* (Strict TDD, pencegahan bug sebelum production)
  - Card 4: *Transparent Communication* (Demo mingguan, repositori dan database 100% milik Anda)
* Update `lang/id.json` and `lang/en.json` with the corresponding translation pairs. Ensure zero em-dashes.

- [ ] **Step 4: Run test to verify it passes**

Run: `php artisan test --filter=HomepageServicesBentoTest`  
Expected: PASS

- [ ] **Step 5: Commit**

```bash
git add resources/views/frontend/pages/home.blade.php lang/id.json lang/en.json tests/Feature/HomepageServicesBentoTest.php
git commit -m "feat(home): implement nextsaas sticky services and technical bento grid"
```

---

### Task 5: Redox Agency Showcase for Featured Case Studies

**Files:**
* Modify: `resources/views/frontend/pages/home.blade.php`
* Create: `tests/Feature/HomepageShowcaseTest.php`

**Interfaces:**
* Consumes: `$featuredProjects` from controller (`App\Models\Project`).
* Produces: Redox-inspired portfolio showcase cards (`redox/dark/agency-portfolio.html`) featuring project category badges, measurable business impact metrics, and responsive image previews with zero missing `alt` attributes.

- [ ] **Step 1: Write the failing test**

Create `tests/Feature/HomepageShowcaseTest.php`:
```php
<?php

namespace Tests\Feature;

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class HomepageShowcaseTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function homepage_renders_redox_style_featured_case_studies()
    {
        $project = Project::factory()->create([
            'title' => 'Enterprise Logistics Portal',
            'client' => 'PT Logistik Prima',
            'category' => 'Web Application',
            'is_featured' => true,
        ]);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Enterprise Logistics Portal');
        $response->assertSee('PT Logistik Prima');
        $response->assertSee('featured-showcase-grid', false);
    }
}
```

- [ ] **Step 2: Run test to verify it fails**

Run: `php artisan test --filter=HomepageShowcaseTest`  
Expected: FAIL with `featured-showcase-grid` not found.

- [ ] **Step 3: Implement Redox Showcase Grid in `home.blade.php`**

Style the featured case studies section with container `id="featured-showcase-grid"`, subtle border glows on hover, tag pills, client name, and link to case study detail or live system demo.

- [ ] **Step 4: Run test to verify it passes**

Run: `php artisan test --filter=HomepageShowcaseTest`  
Expected: PASS

- [ ] **Step 5: Commit**

```bash
git add resources/views/frontend/pages/home.blade.php tests/Feature/HomepageShowcaseTest.php
git commit -m "feat(home): adapt redox portfolio showcase for featured case studies"
```

---

### Task 6: NextSaaS 3-Step Engineering Process & Retainer Comparison Matrix

**Files:**
* Modify: `resources/views/frontend/pages/home.blade.php`
* Modify: `lang/id.json` and `lang/en.json`
* Create: `tests/Feature/HomepageProcessRetainerTest.php`

**Interfaces:**
* Consumes: Accelerate Lab commercial offerings (Express Starter, Custom Enterprise, Dedicated Monthly Retainer).
* Produces:
  1. 3-Step Engineering Process with progress indicator bars (`01 Discovery & Audit`, `02 Architecture & Strict TDD`, `03 Launch & SLA Retainer`).
  2. Clear comparison matrix table (inspired by `nextsaas/app-development/app-development-pricing.html`) detailing what is included in project-based development vs monthly retainer partnerships.

- [ ] **Step 1: Write the failing test**

Create `tests/Feature/HomepageProcessRetainerTest.php`:
```php
<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class HomepageProcessRetainerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function homepage_renders_three_step_process_and_retainer_scope()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('process-step-indicator', false);
        $response->assertSee('retainer-scope-matrix', false);

        // Assert zero em-dashes across content
        $content = $response->getContent();
        $this->assertStringNotContainsString('—', $content);
        $this->assertStringNotContainsString('–', $content);
    }
}
```

- [ ] **Step 2: Run test to verify it fails**

Run: `php artisan test --filter=HomepageProcessRetainerTest`  
Expected: FAIL with `process-step-indicator` not found.

- [ ] **Step 3: Implement 3-Step Process & Retainer Scope Matrix in `home.blade.php`**

* Add the numbered step flow with horizontal progress indicators (`01`, `02`, `03`) using `process-step-indicator`.
* Add the retainer matrix table with `retainer-scope-matrix` comparing one-time build vs ongoing retainer (SEO, Core Web Vitals maintenance, security updates, feature enhancements).
* Add all labels in `lang/id.json` and `lang/en.json` without any em-dashes.

- [ ] **Step 4: Run test to verify it passes**

Run: `php artisan test --filter=HomepageProcessRetainerTest`  
Expected: PASS

- [ ] **Step 5: Commit**

```bash
git add resources/views/frontend/pages/home.blade.php lang/id.json lang/en.json tests/Feature/HomepageProcessRetainerTest.php
git commit -m "feat(home): add 3-step engineering flow and retainer scope matrix"
```

---

### Task 7: Redox High-Impact Closing CTA & Quality Verification

**Files:**
* Modify: `resources/views/frontend/pages/home.blade.php`
* Create: `tests/Feature/HomepageQualityGateTest.php`

**Interfaces:**
* Consumes: Full homepage markup, WhatsApp link helper, Contact modal trigger.
* Produces: High-contrast closing CTA section, 100% test suite pass rate, and successful production asset compilation.

- [ ] **Step 1: Write the failing test**

Create `tests/Feature/HomepageQualityGateTest.php`:
```php
<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class HomepageQualityGateTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function homepage_passes_all_structural_and_accessibility_requirements()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('<header', false);
        $response->assertSee('<main', false);
        $response->assertSee('<footer', false);
        $response->assertSee('closing-cta-section', false);

        // Verify zero images without alt tags
        $content = $response->getContent();
        preg_match_all('/<img\b(?![^>]*\balt=)[^>]*>/i', $content, $missingAlt);
        $this->assertEmpty($missingAlt[0], 'Found images without alt attribute on home page');

        // Verify zero em-dashes or en-dashes
        $this->assertStringNotContainsString('—', $content);
        $this->assertStringNotContainsString('–', $content);
    }
}
```

- [ ] **Step 2: Run test to verify it fails**

Run: `php artisan test --filter=HomepageQualityGateTest`  
Expected: FAIL with `closing-cta-section` not found.

- [ ] **Step 3: Implement closing CTA in `home.blade.php`**

Add the high-contrast closing CTA block with container `id="closing-cta-section"`, direct WhatsApp consultation button, and 15-minute consultation modal trigger.

- [ ] **Step 4: Run full automated test suite**

Run:
```bash
php artisan test
```
Expected: All tests PASS.

- [ ] **Step 5: Run production asset build**

Run:
```bash
npm run build
```
Expected: Build succeeds with zero errors.

- [ ] **Step 6: Final Commit**

```bash
git add resources/views/frontend/pages/home.blade.php tests/Feature/HomepageQualityGateTest.php
git commit -m "feat(home): complete 70/30 redesign with verified tests and production build"
```
