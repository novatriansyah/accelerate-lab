# Commercial Repositioning and UI/UX Overhaul Implementation Plan

> **For agentic workers:**  
> **Goal:** Reposition Accelerate Lab from a generic developer-facing agency into an authoritative, high-converting custom software engineering studio tailored for Indonesian SMEs and growing businesses, completely removing Odoo ERP, eliminating em dashes, and overhauling all UI/UX tells.  
> **Architecture:** Clean monolithic Laravel 12 application with Tailwind CSS v4, Blade components, Alpine.js, and SQLite/MySQL database seeders.  
> **Tech Stack:** Laravel 12.x, PHP 8.3, Tailwind CSS v4, Alpine.js, PHPUnit 11.  

## Global Constraints

* Target audience: Indonesian SMEs and Growing Businesses (*UKM dan Bisnis Lokal Berkembang*).
* Core promise: *"Solusi Kustom Sesuai Alur Kerja Unik Bisnis Anda"*.
* Technology-agnostic principle: Zero framework names or programming languages in marketing headlines.
* Complete removal of Odoo ERP across all files, seeders, routes, and views.
* Zero em dash rule: The em dash character (`—`) and en dash (`–`) are 100% banned across all views, database seeders, language dictionaries, and components.
* Default locale is `id` (Indonesian) with an instant `en` switcher available in the global header.
* Strict TDD: Write failing test first, verify failure, implement minimal code, verify pass, commit.

---

### Task 1: Database Seeders and Core Service Architecture (Removing Odoo ERP & Reframing Projects)

**Files:**
* Modify: `database/seeders/ServiceSeeder.php`
* Modify: `database/seeders/ProjectSeeder.php`
* Modify: `database/seeders/DemoSeeder.php`
* Modify: `database/seeders/DatabaseSeeder.php`
* Test: `tests/Feature/ProductionDataSeederTest.php`

**Interfaces:**
* Consumes: Existing seeder classes and Eloquent models (`Service`, `Project`, `Demo`, `SiteSetting`).
* Produces: Clean baseline data with exactly 4 custom services, reframed commercial projects without "pro-bono" labels or self-testimonials, and zero Odoo references.

- [ ] **Step 1: Write the failing test**

Update `tests/Feature/ProductionDataSeederTest.php`:
```php
<?php

namespace Tests\Feature;

use App\Models\Demo;
use App\Models\Project;
use App\Models\Service;
use App\Models\SiteSetting;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ProductionDataSeederTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function database_seeder_populates_clean_production_records_without_odoo()
    {
        $this->seed(DatabaseSeeder::class);

        // 1. Verify Odoo is completely absent
        $this->assertDatabaseMissing('services', [
            'slug' => 'odoo-erp-implementation',
        ]);
        $this->assertEquals(4, Service::count());

        // 2. Verify 4 Core Custom Services
        $this->assertDatabaseHas('services', ['slug' => 'web-application-development']);
        $this->assertDatabaseHas('services', ['slug' => 'mobile-app-development']);
        $this->assertDatabaseHas('services', ['slug' => 'ui-ux-design']);
        $this->assertDatabaseHas('services', ['slug' => 'cloud-architecture']);

        // 3. Verify Projects Reframed commercially (No pro-bono, no self-testimonials)
        $farmProject = Project::where('slug', 'livestock-management-system')->first();
        $this->assertNotNull($farmProject);
        $this->assertStringNotContainsStringIgnoringCase('pro-bono', $farmProject->description);
        $this->assertStringNotContainsStringIgnoringCase('pro bono', $farmProject->description);

        $telaah = Project::where('slug', 'telaah')->first();
        $this->assertNotNull($telaah);
        $this->assertEmpty($telaah->testimonials); // Self-testimonial removed

        // 4. Verify Zero Em Dashes in seeded content
        foreach (Service::all() as $service) {
            $this->assertStringNotContainsString('—', $service->title);
            $this->assertStringNotContainsString('—', $service->short_description);
            $this->assertStringNotContainsString('—', $service->headline);
        }
        foreach (Project::all() as $project) {
            $this->assertStringNotContainsString('—', $project->title);
            $this->assertStringNotContainsString('—', $project->description);
        }
    }
}
```

- [ ] **Step 2: Run test to verify it fails**

Run: `php artisan test --filter=ProductionDataSeederTest`  
Expected: FAIL because `odoo-erp-implementation` is currently present and Service::count() is 5.

- [ ] **Step 3: Update seeders to remove Odoo ERP and reframe projects**

Update `database/seeders/ServiceSeeder.php` to remove the Odoo ERP array entry (leaving exactly 4 core services).  
Update `database/seeders/ProjectSeeder.php` to:
* Remove "As a pro-bono project under Accelerate Lab, " from `livestock-management-system`.
* Set `'testimonials' => null` on `telaah` (clearing self-authored quote).
* Ensure zero em dashes (`—`) exist anywhere in strings.
Update `database/seeders/DemoSeeder.php` to remove em dashes from title and description.

- [ ] **Step 4: Run test to verify it passes**

Run: `php artisan test --filter=ProductionDataSeederTest`  
Expected: PASS (4 assertions).

- [ ] **Step 5: Commit**

```bash
git add database/seeders/ tests/Feature/ProductionDataSeederTest.php
git commit -m "refactor(seeders): remove odoo erp, reframe case studies commercially, eliminate em dashes"
```

---

### Task 2: Application Locale, Translation Dictionaries, and Header Navigation

**Files:**
* Modify: `config/app.php`
* Modify: `lang/id.json`
* Modify: `lang/en.json`
* Modify: `resources/views/frontend/components/header.blade.php`
* Test: `tests/Feature/LocalizationTest.php`

**Interfaces:**
* Consumes: Laravel localization middleware and session cookies (`accelerate_locale`).
* Produces: Indonesian-first default locale (`id`), accessible 44px mobile touch targets, and unified CTA buttons (`Konsultasi Proyek` / `Project Consultation`).

- [ ] **Step 1: Write the failing test**

Add test method to `tests/Feature/LocalizationTest.php`:
```php
#[Test]
public function default_application_locale_is_indonesian_and_header_has_accessible_touch_targets()
{
    $response = $this->get('/');
    $response->assertStatus(200);

    // Verify default page renders Indonesian commercial terms
    $response->assertSee('Konsultasi Proyek');
    $response->assertSee('Layanan');

    // Verify touch target class for mobile language switcher
    $response->assertSee('min-h-[44px]');
}
```

- [ ] **Step 2: Run test to verify it fails**

Run: `php artisan test --filter=LocalizationTest`  
Expected: FAIL because default CTA is still "Get an Estimate" or "Estimate Your Project" and touch target is not 44px.

- [ ] **Step 3: Implement locale defaults and header navigation fixes**

In `config/app.php`: set `'locale' => 'id'`.  
In `lang/id.json` and `lang/en.json`:
Add translations for `"Project Consultation"`, `"Konsultasi Proyek"`, `"Solusi Kustom Sesuai Alur Kerja Unik Bisnis Anda"`.  
In `resources/views/frontend/components/header.blade.php`:
* Replace `"Get an Estimate"` button with `{{ __('Project Consultation') }}`.
* Update mobile language switcher buttons to include `min-h-[44px] min-w-[44px] flex items-center justify-center`.
* Ensure zero em dashes in any header tooltip or link.

- [ ] **Step 4: Run test to verify it passes**

Run: `php artisan test --filter=LocalizationTest`  
Expected: PASS.

- [ ] **Step 5: Commit**

```bash
git add config/app.php lang/ resources/views/frontend/components/header.blade.php tests/Feature/LocalizationTest.php
git commit -m "feat(nav): set indonesian-first default locale, enlarge touch targets, unify consultation ctas"
```

---

### Task 3: Homepage Hero and Real-Time Business Dashboard Graphic

**Files:**
* Modify: `resources/views/frontend/pages/home.blade.php:21-158`
* Test: `tests/Feature/UiUxDesignSystemTest.php`
* Test: `tests/Feature/PerformanceCheckTest.php`

**Interfaces:**
* Consumes: App icon component `<x-app-icon>` and Tailwind CSS v4 styling tokens.
* Produces: High-converting hero section with interactive business metrics preview replacing the mock developer terminal.

- [ ] **Step 1: Write the failing test**

Add test to `tests/Feature/UiUxDesignSystemTest.php`:
```php
#[Test]
public function home_hero_renders_business_dashboard_graphic_without_code_terminal_tells()
{
    $response = $this->get('/');
    $response->assertStatus(200);

    // Banned AI Tells
    $response->assertDontSee('deploy.sh');
    $response->assertDontSee('git push origin production');
    $response->assertDontSee('Building optimizations...');

    // Required Business Dashboard Metrics
    $response->assertSee('Akurasi Inventori');
    $response->assertSee('Pesanan Terproses');
    $response->assertSee('Sistem Aktif 24/7');
}
```

- [ ] **Step 2: Run test to verify it fails**

Run: `php artisan test --filter=UiUxDesignSystemTest`  
Expected: FAIL because `deploy.sh` and `git push` are currently rendered on the home page.

- [ ] **Step 3: Overhaul home hero section**

In `resources/views/frontend/pages/home.blade.php`:
* Update status badge: `Tersedia untuk Proyek Baru Kuartal Ini`.
* Update H1:
  `Software Kustom yang Beradaptasi Penuh dengan Alur Kerja Bisnis Anda.`
* Update Subheadline:
  `Hentikan spreadsheet yang tercecer dan sistem kaku yang membatasi pertumbuhan. Kami merancang dan membangun portal manajemen, dashboard operasional, dan aplikasi bisnis kustom yang rapi, cepat, dan menjadi aset milik Anda selamanya.`
* Dual CTAs:
  * Primary: Direct WhatsApp trigger with pre-filled inquiry text (`Konsultasi Gratis via WhatsApp`).
  * Secondary: Button opening scoping modal (`Hitung Estimasi Kebutuhan`).
* Replace lines 81-156 (the mock terminal and generic velocity bars) with a clean, executive **Business Operations Dashboard Card**:
  * Live metrics ribbon: *Pesanan Terproses*, *Akurasi Inventori (99.8%)*, *Status Sinkronisasi Data*.
  * Audit activity feed: *Invoicing otomatis terkirim*, *Notifikasi stok menipis*, *Laporan bulanan siap unduh*.
  * Status badge: *Sistem Aman & Aktif 24/7*.
* Replace marquee tech stack logos (`AWS, LARAVEL, REACT`) with industry focus tags:
  `DISTRIBUTOR & GROSIR • LOGISTIK & PENGIRIMAN • MANUFAKTUR • RETAIL & KULINER • JASA PROFESIONAL • KESEHATAN • LEGAL TECH`.

- [ ] **Step 4: Run tests to verify they pass**

Run: `php artisan test --filter=UiUxDesignSystemTest`  
Run: `php artisan test --filter=PerformanceCheckTest`  
Expected: PASS.

- [ ] **Step 5: Commit**

```bash
git add resources/views/frontend/pages/home.blade.php tests/Feature/UiUxDesignSystemTest.php
git commit -m "feat(home): replace code terminal with business operations interface and commercial headline"
```

---

### Task 4: Homepage Bento Grid, "Tantangan Manual vs. Sistem Kustom", and Clean Process Flow

**Files:**
* Modify: `resources/views/frontend/pages/home.blade.php:187-310`
* Test: `tests/Feature/UiUxDesignSystemTest.php`

**Interfaces:**
* Consumes: Homepage core capability data.
* Produces: Cleaned bento grid without empty colored pills, anti-slop process flow without "Step 1/2/3/4" labels, and a high-impact spreadsheet comparison grid.

- [ ] **Step 1: Write the failing test**

Add test to `tests/Feature/UiUxDesignSystemTest.php`:
```php
#[Test]
public function home_renders_operational_comparison_and_meaningful_process_flow()
{
    $response = $this->get('/');
    $response->assertStatus(200);

    // Verifies spreadsheet comparison exists
    $response->assertSee('Tantangan Manual vs. Sistem Kustom');
    $response->assertSee('Spreadsheet Tercecer');
    $response->assertSee('Database Terpusat');

    // Verifies generic step labels are eliminated
    $response->assertDontSee('Step 1');
    $response->assertDontSee('Step 2');
    $response->assertDontSee('Step 3');
    $response->assertDontSee('Step 4');

    // Verifies fake TS code snippet is removed
    $response->assertDontSee('AccelerateLabController.ts');
    $response->assertDontSee('@accelerate-lab/core');
}
```

- [ ] **Step 2: Run test to verify it fails**

Run: `php artisan test --filter=UiUxDesignSystemTest`  
Expected: FAIL because "Step 1" and "AccelerateLabController.ts" are currently present.

- [ ] **Step 3: Implement comparison grid and clean process cards**

In `resources/views/frontend/pages/home.blade.php`:
* Add "Tantangan Manual vs. Sistem Kustom" comparison section.
* Remove the empty colored pills (`<div class="h-1.5 w-8 bg-primary rounded-full"></div>`).
* Replace "The Lab" code editor section (`AccelerateLabController.ts`) with a structured "Standar Rekayasa & Keamanan Data" section.
* Replace "Step 1: Discover / Step 2: Design / Step 3: Develop / Step 4: Deploy" with action-oriented headers:
  1. *Audit Alur Kerja & Pemetaan Masalah*
  2. *Prototipe Antarmuka yang Bisa Dicoba*
  3. *Pembangunan Sistem & Uji Ketahanan*
  4. *Migrasi Data & Pelatihan Karyawan*

- [ ] **Step 4: Run test to verify it passes**

Run: `php artisan test --filter=UiUxDesignSystemTest`  
Expected: PASS.

- [ ] **Step 5: Commit**

```bash
git add resources/views/frontend/pages/home.blade.php tests/Feature/UiUxDesignSystemTest.php
git commit -m "feat(home): add operational comparison grid, remove code snippets, and clean process flow"
```

---

### Task 5: Case Studies Page and SME Operational Blueprints

**Files:**
* Modify: `resources/views/frontend/pages/case-studies.blade.php`
* Test: `tests/Feature/ProjectTest.php`

**Interfaces:**
* Consumes: Verified `Project` models (`livestock-management-system`, `telaah`) and live demo link (`/demos/dmp-lawfirm`).
* Produces: Cleaned case studies view highlighting business ROI and 3 interactive SME operational blueprints.

- [ ] **Step 1: Write the failing test**

Add test to `tests/Feature/ProjectTest.php`:
```php
#[Test]
public function case_studies_page_highlights_business_roi_and_sme_blueprints()
{
    $this->seed(\Database\Seeders\DatabaseSeeder::class);

    $response = $this->get('/case-studies');
    $response->assertStatus(200);

    // Verifies business ROI metrics are highlighted
    $response->assertSee('Efisiensi Operasional');
    $response->assertSee('35%');

    // Verifies SME operational blueprints exist
    $response->assertSee('Blueprint Solusi Operasional');
    $response->assertSee('Inventori Multi-Gudang');
    $response->assertSee('Invoicing Otomatis');

    // Verifies prospective demo prototypes like DM&P are NOT leaked in public case studies
    $response->assertDontSee('/demos/dmp-lawfirm');
    $response->assertDontSee('DM&P Lawfirm Portal');
}
```

- [ ] **Step 2: Run test to verify it passes**

Run: `php artisan test --filter=ProjectTest`  
Expected: PASS because SME blueprints are present and unclosed prospect DM&P is excluded from public case studies.

- [ ] **Step 3: Implement case studies updates and blueprints section**

In `resources/views/frontend/pages/case-studies.blade.php`:
* Refine header text to emphasize measurable business outcomes.
* Feature verified projects dynamically with stats badges from database.
* Keep prototype demos isolated in the private demos system rather than public case studies.
* Add interactive tabbed "Blueprint Solusi Operasional UKM":
  1. *Inventori Multi-Gudang & Barcode*: Alur penerimaan, transfer antar-gudang, dan peringatan stok menipis.
  2. *Invoicing Otomatis & Pembayaran*: Tagihan terbit otomatis, integrasi QRIS/Virtual Account, dan rekonsiliasi instan.
  3. *Dashboard Monitoring Kinerja Cabang*: Omzet real-time, performa staf, dan analisa laba rugi kotor harian.

- [ ] **Step 4: Run test to verify it passes**

Run: `php artisan test --filter=ProjectTest`  
Expected: PASS.

- [ ] **Step 5: Commit**

```bash
git add resources/views/frontend/pages/case-studies.blade.php tests/Feature/ProjectTest.php
git commit -m "feat(case-studies): add live demo cards, verified roi highlights, and sme operational blueprints"
```

---

### Task 6: About Page Overhaul and Principal Architect Positioning

**Files:**
* Modify: `resources/views/frontend/pages/about.blade.php`
* Test: `tests/Feature/LocalizationScreensTest.php`

**Interfaces:**
* Consumes: `TeamMember` model (Nova Triansyah Azis) and `CompanyMilestone` model.
* Produces: Authentic engineer-led boutique studio presentation without stock office photography or fake avatars.

- [ ] **Step 1: Write the failing test**

Add test to `tests/Feature/LocalizationScreensTest.php`:
```php
#[Test]
public function about_page_presents_authentic_principal_architect_model_without_stock_assets()
{
    $this->seed(\Database\Seeders\DatabaseSeeder::class);

    $response = $this->get('/about');
    $response->assertStatus(200);

    // Banned stock assets
    $response->assertDontSee('about-team-office.jpg');
    $response->assertDontSee('lh3.googleusercontent.com/aida-public');

    // Required authentic presentation
    $response->assertSee('Nova Triansyah Azis');
    $response->assertSee('Principal Technology Architect');
    $response->assertSee('Komunikasi Langsung dengan Senior Architect');

    // Conversion CTAs
    $response->assertSee('Jadwalkan Diskusi Proyek');
    $response->assertDontSee('Join Our Team');
}
```

- [ ] **Step 2: Run test to verify it fails**

Run: `php artisan test --filter=LocalizationScreensTest`  
Expected: FAIL because `about-team-office.jpg` and `Join Our Team` are currently present.

- [ ] **Step 3: Overhaul about.blade.php**

In `resources/views/frontend/pages/about.blade.php`:
* Remove `about-team-office.jpg` and the Google AIDA avatar stack.
* Replace the hero CTA buttons with client-facing conversion triggers:
  * Primary: `Jadwalkan Diskusi Proyek` (`@click="$dispatch('open-consultation-modal')"`).
  * Secondary: `Pelajari Studi Kasus` (`href="/case-studies"`).
* Emphasize the **Engineer-Led Boutique Model**:
  * Direct communication with the senior architect building the platform.
  * No sales middleman and no unsupervised junior developer handoffs.
  * 100% full IP and source code ownership.
* Showcase Nova Triansyah Azis with verified LinkedIn link and 6+ years architectural experience.
* Ensure zero em dashes anywhere on the page.

- [ ] **Step 4: Run test to verify it passes**

Run: `php artisan test --filter=LocalizationScreensTest`  
Expected: PASS.

- [ ] **Step 5: Commit**

```bash
git add resources/views/frontend/pages/about.blade.php tests/Feature/LocalizationScreensTest.php
git commit -m "feat(about): eliminate stock imagery, position principal architect boutique model, and fix ctas"
```

---

### Task 7: Interactive Project Estimator Wizard Refinement

**Files:**
* Modify: `resources/views/components/project-estimator.blade.php`
* Test: `tests/Feature/ProjectEstimatorTest.php`

**Interfaces:**
* Consumes: Form submission route `route('contact.store')` and WhatsApp deep link generator.
* Produces: Business-friendly scoping options, elimination of technical framework confusion, and realistic turnaround guidance.

- [ ] **Step 1: Write the failing test**

Add test to `tests/Feature/ProjectEstimatorTest.php`:
```php
#[Test]
public function project_estimator_presents_business_options_without_developer_framework_jargon()
{
    $response = $this->get('/contact');
    $response->assertStatus(200);

    // Business scoping options
    $response->assertSee('Portal Operasional & Dashboard Manajemen');
    $response->assertSee('Sistem Inventori, Penjualan, & Penagihan');

    // Banned technical framework options in client wizard
    $response->assertDontSee('Laravel Monolith');
    $response->assertDontSee('Vue / Nuxt');
    $response->assertDontSee('Node / Python / Go');

    // Turnaround guidance
    $response->assertSee('Estimasi Waktu Pengerjaan');
}
```

- [ ] **Step 2: Run test to verify it fails**

Run: `php artisan test --filter=ProjectEstimatorTest`  
Expected: FAIL because "Laravel Monolith" and "Vue / Nuxt" are currently present in `project-estimator.blade.php`.

- [ ] **Step 3: Update project-estimator.blade.php**

In `resources/views/components/project-estimator.blade.php`:
* Update `$step1Options` with plain Indonesian business terminology:
  1. *Portal Operasional & Dashboard Manajemen*
  2. *Sistem Inventori, Penjualan, & Penagihan*
  3. *Portal Layanan Mandiri Pelanggan / Mitra*
  4. *Aplikasi Mobile Tim Lapangan*
  5. *Modernisasi Software Lama yang Lambat*
* Update `$step2Options` for operational readiness:
  1. *Masih menggunakan spreadsheet / catatan manual*
  2. *Alur kerja dan desain sudah siap dibangun*
  3. *Sistem lama berjalan tapi sering bermasalah*
* Replace `$techOptions` (framework names) with system deployment types:
  * *Cloud Web App*, *Mobile iOS & Android*, *Integrasi Database Lokal / On-Premise*.
* In Step 4, add a clear turnaround badge: `Target Waktu: 3-5 Minggu` alongside the instant WhatsApp dispatch and email submission buttons.

- [ ] **Step 4: Run test to verify it passes**

Run: `php artisan test --filter=ProjectEstimatorTest`  
Expected: PASS.

- [ ] **Step 5: Commit**

```bash
git add resources/views/components/project-estimator.blade.php tests/Feature/ProjectEstimatorTest.php
git commit -m "feat(estimator): replace framework jargon with business solutions and add turnaround guidance"
```

---

### Task 8: End-to-End Test Suite, Zero Em-Dash Verification, and Asset Compilation

**Files:**
* Modify: Any view or translation with detected styling or lint inconsistencies.
* Test: Full test suite (`php artisan test`).

**Interfaces:**
* Consumes: Full test runner and Vite asset pipeline.
* Produces: Clean production build with 100% test pass rate across all 96+ tests.

- [ ] **Step 1: Execute zero em-dash verification**

Run: `php artisan test --filter=PerformanceCheckTest`  
Expected: PASS (`test_no_em_dash_in_any_rendered_page_in_both_locales`).

- [ ] **Step 2: Compile frontend assets**

Run: `npm run build`  
Expected: Clean compilation of `public/build` assets without errors or missing imports.

- [ ] **Step 3: Execute complete test suite**

Run: `php artisan test`  
Expected: 100% passing tests (all 96+ tests pass).

- [ ] **Step 4: Commit**

```bash
git add .
git commit -m "chore: verify full test suite passes and compile production assets"
```
