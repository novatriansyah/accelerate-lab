# Commercial Alignment and Conversion Engine Implementation Plan

> **For agentic workers:**  
> **Goal:** Align the Accelerate Lab website to convert immediate cashflow opportunities (Starter Website Express for local businesses / outreach leads) without sacrificing high-ticket positioning (Custom Business Software & Operational Portals), featuring a 1-click Demo Showcase activation CTA, 100% professional Indonesian copy, a 2-tier offer ladder, and an objection-busting FAQ section.  
> **Architecture:** Clean monolithic Laravel 12 application with Tailwind CSS v4, Blade components, Alpine.js, and SQLite/MySQL database seeders.  
> **Tech Stack:** Laravel 12.x, PHP 8.3, Tailwind CSS v4, Alpine.js, PHPUnit 11.  

## Global Constraints

* Target audience: Indonesian SMEs, local businesses, and growing enterprises (*UKM dan Bisnis Berkembang*).
* Core promise: *"Dari Website Bisnis Berkelas hingga Sistem Operasional Kustom yang Mempercepat Pertumbuhan Usaha Anda"*.
* Zero em dash rule: The em dash character (`—`) and en dash (`–`) are 100% banned across all views, language dictionaries, and components. Use hyphens (`-`), colons, or bullet dots instead.
* Default locale is `id` (Indonesian) with professional, high-clarity business tone (no English / Indonesian mixed jargon).
* Strict TDD: Write failing test first, verify failure, implement minimal code, verify pass, commit.

---

### Task 1: Demo Showcase One-Click WhatsApp Activation CTA

**Files:**
* Modify: `resources/views/frontend/demos/showcase.blade.php:260-275`
* Test: `tests/Feature/DemoShowcaseCtaTest.php`

**Interfaces:**
* Consumes: `App\Models\Demo`, `$demo->title`, `$demo->client_name`, `$demo->slug`, `App\Models\SiteSetting`.
* Produces: A prominent WhatsApp activation button in the top toolbar of the demo showcase, allowing prospective clients viewing their prototype to claim and activate the site immediately with official domain setup.

- [ ] **Step 1: Write the failing test**

Create `tests/Feature/DemoShowcaseCtaTest.php`:
```php
<?php

namespace Tests\Feature;

use App\Models\Demo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class DemoShowcaseCtaTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function demo_showcase_renders_one_click_whatsapp_activation_button()
    {
        $demo = Demo::factory()->create([
            'title' => 'Katering Berkah Prototype',
            'client_name' => 'Katering Berkah',
            'slug' => 'katering-berkah',
            'is_active' => true,
            'passcode' => null,
        ]);

        $response = $this->get(route('demos.showcase', $demo->slug));

        $response->assertStatus(200);
        $response->assertSee('Klaim Website Ini');
        $response->assertSee('https://wa.me/', false);
        $response->assertSee('target="_blank"', false);
        $response->assertSee('rel="noopener noreferrer"', false);
    }

    #[Test]
    public function demo_showcase_whatsapp_cta_contains_prefilled_demo_context()
    {
        $demo = Demo::factory()->create([
            'title' => 'Rental Mobil Express',
            'client_name' => 'Rental Mobil Express',
            'slug' => 'rental-mobil-express',
            'is_active' => true,
            'passcode' => null,
        ]);

        $response = $this->get(route('demos.showcase', $demo->slug));

        $response->assertStatus(200);
        $response->assertSee(urlencode('Rental Mobil Express'), false);
    }
}
```

- [ ] **Step 2: Run test to verify it fails**

Run: `php artisan test --filter=DemoShowcaseCtaTest`  
Expected: FAIL because "Klaim Website Ini" button does not exist in `showcase.blade.php`.

- [ ] **Step 3: Implement WhatsApp CTA in showcase toolbar**

Modify `resources/views/frontend/demos/showcase.blade.php`:
In `.toolbar-right`, insert the activation button before the fullscreen button:
```blade
        <div class="toolbar-right">
            @php
                $waPhone = preg_replace('/[^0-9]/', '', \App\Models\SiteSetting::get('contact_whatsapp') ?: \App\Models\SiteSetting::get('contact_phone', '6287721312985'));
                $waMsg = 'Halo Accelerate Lab, saya tertarik mengaktifkan website demo ' . ($demo->client_name ?: $demo->title) . ' ini dengan domain resmi .com.';
            @endphp
            <a href="https://wa.me/{{ $waPhone }}?text={{ urlencode($waMsg) }}" target="_blank" rel="noopener noreferrer" class="btn-action bg-emerald-600 hover:bg-emerald-500 text-white font-bold border-none" id="btn-claim-demo" aria-label="Klaim dan Aktifkan Website Ini via WhatsApp">
                <span>Klaim Website Ini</span> ↗
            </a>
            <button class="btn-action" onclick="reloadFrame()" aria-label="Reload Preview">
                🔄 <span>Reload</span>
            </button>
            <a href="{{ route('demos.preview', $demo->slug) }}" target="_blank" class="btn-action btn-fullscreen" aria-label="Open Fullscreen in New Window">
                <span>Open Fullscreen</span> ↗
            </a>
        </div>
```

- [ ] **Step 4: Run test to verify it passes**

Run: `php artisan test --filter=DemoShowcaseCtaTest`  
Expected: PASS.

- [ ] **Step 5: Commit**

```bash
git add tests/Feature/DemoShowcaseCtaTest.php resources/views/frontend/demos/showcase.blade.php
git commit -m "feat(demos): add one-click whatsapp activation button to showcase toolbar"
```

---

### Task 2: Hero Section Repositioning, Trust Badges, & Language Standardization

**Files:**
* Modify: `resources/views/frontend/pages/home.blade.php`
* Modify: `resources/views/frontend/pages/about.blade.php`
* Test: `tests/Feature/CommercialRepositioningTest.php`

**Interfaces:**
* Consumes: Blade templates for home and about pages.
* Produces: Clean Indonesian copywriting, 3 trust badges under hero buttons, and elimination of untranslated English capability labels.

- [ ] **Step 1: Write the failing test**

Create `tests/Feature/CommercialRepositioningTest.php`:
```php
<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class CommercialRepositioningTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function home_page_renders_repositioned_hero_and_trust_badges()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Dari Website Bisnis Berkelas hingga Sistem Operasional Kustom');
        $response->assertSee('Konsultasi Langsung dengan Principal Architect');
        $response->assertSee('100% Source Code dan Database Hak Milik Anda');
        $response->assertSee('Resmi PT Akselerasi Digital Mandiri');
    }

    #[Test]
    public function home_page_does_not_contain_mixed_english_capability_labels()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        // Ensure english jargon is replaced with professional Indonesian
        $response->assertDontSee('Core Capabilities');
        $response->assertDontSee('Product Strategy');
        $response->assertSee('Solusi Unggulan Kami');
        $response->assertSee('Perancangan Solusi Digital');
    }

    #[Test]
    public function home_page_has_zero_em_dashes()
    {
        $response = $this->get('/');

        $content = $response->getContent();
        $this->assertStringNotContainsString('—', $content, 'Found em-dash on homepage');
        $this->assertStringNotContainsString('–', $content, 'Found en-dash on homepage');
    }
}
```

- [ ] **Step 2: Run test to verify it fails**

Run: `php artisan test --filter=CommercialRepositioningTest`  
Expected: FAIL due to missing new headline, trust badges, and presence of "Core Capabilities".

- [ ] **Step 3: Update `home.blade.php` and `about.blade.php`**

1. In `resources/views/frontend/pages/home.blade.php`:
   - Replace Hero heading with:
     `{{ __('Dari Website Bisnis Berkelas hingga Sistem Operasional Kustom yang Mempercepat Pertumbuhan Usaha Anda') }}`
   - Replace Hero paragraph with:
     `{{ __('Tinggalkan sistem manual yang kaku dan spreadsheet yang tercecer. Kami merancang website profil berkonversi tinggi dan portal bisnis modern yang rapi, cepat, dan menjadi aset milik Anda selamanya.') }}`
   - Add 3 trust badges below the CTA buttons:
     ```blade
     <div class="mt-8 flex flex-wrap items-center justify-center lg:justify-start gap-y-3 gap-x-6 text-xs font-semibold text-slate-600 dark:text-slate-300">
         <div class="flex items-center gap-1.5">
             <x-app-icon name="check_circle" class="w-4 h-4 text-emerald-500" />
             <span>{{ __('Konsultasi Langsung dengan Principal Architect') }}</span>
         </div>
         <div class="flex items-center gap-1.5">
             <x-app-icon name="check_circle" class="w-4 h-4 text-emerald-500" />
             <span>{{ __('100% Source Code dan Database Hak Milik Anda') }}</span>
         </div>
         <div class="flex items-center gap-1.5">
             <x-app-icon name="check_circle" class="w-4 h-4 text-emerald-500" />
             <span>{{ __('Resmi PT Akselerasi Digital Mandiri') }}</span>
         </div>
     </div>
     ```
   - Replace section heading `Core Capabilities` with `{{ __('Solusi Unggulan Kami') }}`.
   - Replace `Product Strategy` with `{{ __('Perancangan Solusi Digital') }}`.
   - Replace `Custom Development` with `{{ __('Pengembangan Web dan Aplikasi Kustom') }}`.
   - Replace `Learn more` with `{{ __('Pelajari Selengkapnya') }}`.

2. In `resources/views/frontend/pages/about.blade.php`:
   - Replace `Establishing Digital Excellence` with `{{ __('Standar Rekayasa Digital') }}`.
   - Replace `Architects of Digital Innovation` with `{{ __('Rekayasa Sistem dan Solusi Digital Berkinerja Tinggi') }}`.
   - Ensure zero em-dashes and en-dashes across all modified text.

- [ ] **Step 4: Run test to verify it passes**

Run: `php artisan test --filter=CommercialRepositioningTest`  
Expected: PASS.

- [ ] **Step 5: Commit**

```bash
git add tests/Feature/CommercialRepositioningTest.php resources/views/frontend/pages/home.blade.php resources/views/frontend/pages/about.blade.php
git commit -m "feat(branding): update hero positioning, add trust badges, and standardize indonesian copy"
```

---

### Task 3: The 2-Tier Offer Ladder Section (Fast Cash Starter vs Custom Core)

**Files:**
* Modify: `resources/views/frontend/pages/home.blade.php`
* Modify: `resources/views/frontend/pages/services.blade.php`
* Test: `tests/Feature/OfferLadderTest.php`

**Interfaces:**
* Consumes: Blade template layout, `<x-app-icon>`, route `/contact`.
* Produces: A clear, side-by-side or tiered Offer Ladder section that presents:
  1. Tier 1: Website Bisnis Express (Pondasi Cepat 24-48 Jam, Mobile-Ready, Google Maps SEO, Mulai Rp 1.500.000).
  2. Tier 2: Sistem Operasional dan Portal Kustom (Automasi Alur Kerja, Multi-Gudang, Invoicing, Kepemilikan Penuh, Mulai Rp 15.000.000).

- [ ] **Step 1: Write the failing test**

Create `tests/Feature/OfferLadderTest.php`:
```php
<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class OfferLadderTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function home_page_renders_two_tier_offer_ladder()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Pilihan Solusi Sesuai Kebutuhan Bisnis Anda');
        $response->assertSee('Website Bisnis Express');
        $response->assertSee('24-48 Jam');
        $response->assertSee('Rp 1.500.000');
        $response->assertSee('Portal Operasional dan Sistem Kustom');
        $response->assertSee('Konsultasi Kebutuhan');
    }

    #[Test]
    public function services_page_presents_starter_and_enterprise_tiers()
    {
        $response = $this->get('/services');

        $response->assertStatus(200);
        $response->assertSee('Website Bisnis Express');
        $response->assertSee('Sistem Operasional Kustom');
    }
}
```

- [ ] **Step 2: Run test to verify it fails**

Run: `php artisan test --filter=OfferLadderTest`  
Expected: FAIL because Offer Ladder section is not yet created.

- [ ] **Step 3: Implement Offer Ladder section in `home.blade.php` and `services.blade.php`**

1. In `resources/views/frontend/pages/home.blade.php`, add the Offer Ladder component section right before the Testimonials / Case Studies section.
2. Structure with two distinct, responsive cards:
   - **Card 1 (Starter - Fast Cash Entry):** Badge "Peluncuran Kilat", Title "Website Bisnis Express", Turnaround "Siap dalam 24-48 Jam", Starting Price "Mulai Rp 1.500.000", Key Features (Desain Responsif Mobile, Tombol WhatsApp Langsung, Setup Domain .com & Hosting, Optimasi Google Maps SEO). Direct WhatsApp CTA.
   - **Card 2 (Core - High Ticket):** Badge "Solusi Operasional", Title "Portal Operasional dan Sistem Kustom", Turnaround "2-6 Minggu", Scope "Investasi Terukur Sesuai Ruang Lingkup", Key Features (Database & Alur Kerja Terintegrasi, Sinkronisasi Multi-Cabang / Gudang, Invoicing Otomatis, 100% Hak Milik Source Code). Direct Consultation CTA.
3. Update `services.blade.php` to highlight both starter and operational system tiers.

- [ ] **Step 4: Run test to verify it passes**

Run: `php artisan test --filter=OfferLadderTest`  
Expected: PASS.

- [ ] **Step 5: Commit**

```bash
git add tests/Feature/OfferLadderTest.php resources/views/frontend/pages/home.blade.php resources/views/frontend/pages/services.blade.php
git commit -m "feat(services): add two-tier offer ladder for starter web express and custom portals"
```

---

### Task 4: High-Converting Objection-Busting FAQ Section

**Files:**
* Modify: `resources/views/frontend/pages/home.blade.php`
* Modify: `resources/views/frontend/pages/contact.blade.php`
* Test: `tests/Feature/FaqSectionTest.php`

**Interfaces:**
* Consumes: Alpine.js accordion state, standard Blade components.
* Produces: A sleek, interactive FAQ section resolving client doubts about hidden monthly fees, timelines, source code ownership, and legal guarantees.

- [ ] **Step 1: Write the failing test**

Create `tests/Feature/FaqSectionTest.php`:
```php
<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class FaqSectionTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function home_page_renders_objection_busting_faq_section()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Pertanyaan yang Sering Diajukan');
        $response->assertSee('Apakah ada biaya langganan bulanan tersembunyi?');
        $response->assertSee('Berapa lama waktu pengerjaannya?');
        $response->assertSee('Siapa yang memegang hak cipta source code dan database?');
        $response->assertSee('Apakah kerja sama dilengkapi kontrak dan legalitas resmi?');
    }

    #[Test]
    public function contact_page_contains_faq_reference()
    {
        $response = $this->get('/contact');

        $response->assertStatus(200);
        $response->assertSee('Pertanyaan Umum');
    }
}
```

- [ ] **Step 2: Run test to verify it fails**

Run: `php artisan test --filter=FaqSectionTest`  
Expected: FAIL because FAQ section does not exist.

- [ ] **Step 3: Implement FAQ accordion section**

1. In `resources/views/frontend/pages/home.blade.php`, add an interactive Alpine.js FAQ accordion before the final CTA banner:
   - Question 1: *"Apakah ada biaya langganan bulanan tersembunyi?"*
     Answer: *"Tidak ada. Kami bukan penyedia SaaS yang mengunci data Anda dengan biaya bulanan. Untuk paket express, domain dan hosting tahun pertama sudah termasuk. Untuk sistem kustom, Anda hanya membayar biaya perancangan dan implementasi awal tanpa biaya sewa wajib."*
   - Question 2: *"Berapa lama waktu pengerjaannya?"*
     Answer: *"Untuk Website Bisnis Express, pengerjaan selesai dalam 24-48 jam setelah materi disetujui. Untuk portal sistem operasional kustom, waktu pengerjaan berkisar antara 2 hingga 6 minggu dengan laporan progres berkala."*
   - Question 3: *"Siapa yang memegang hak cipta source code dan database?"*
     Answer: *"100% menjadi aset milik perusahaan Anda. Kami menyerahkan seluruh source code dan akses database secara penuh tanpa kunci vendor (vendor lock-in)."*
   - Question 4: *"Apakah kerja sama dilengkapi kontrak dan legalitas resmi?"*
     Answer: *"Ya, seluruh kerja sama bernaung di bawah entitas legal resmi PT Akselerasi Digital Mandiri dengan Surat Perjanjian Kerja Sama (SPK) dan Non-Disclosure Agreement (NDA) untuk melindungi kerahasiaan data bisnis Anda."*
2. In `resources/views/frontend/pages/contact.blade.php`, include matching quick FAQ highlights.

- [ ] **Step 4: Run test to verify it passes**

Run: `php artisan test --filter=FaqSectionTest`  
Expected: PASS.

- [ ] **Step 5: Commit**

```bash
git add tests/Feature/FaqSectionTest.php resources/views/frontend/pages/home.blade.php resources/views/frontend/pages/contact.blade.php
git commit -m "feat(faq): add objection-busting faq accordion addressing fees, timeline, ownership, and legality"
```

---

### Task 5: End-to-End Suite Verification, Asset Build, & Zero Em-Dash Audit

**Files:**
* Verification across all modified files.

- [ ] **Step 1: Run comprehensive PHPUnit test suite**

Run: `php artisan test`  
Expected: 100% PASS with zero errors or regressions.

- [ ] **Step 2: Run production asset build**

Run: `npm run build`  
Expected: Exit code 0, clean Vite 7 production bundle.

- [ ] **Step 3: Run Zero Em-Dash audit**

Run regex grep search for em-dash (`—`) and en-dash (`–`) across `resources/views/frontend`.  
Expected: 0 matches found in modified views.

- [ ] **Step 4: Final commit**

```bash
git commit --allow-empty -m "chore: verify test suite pass rate, clean asset compilation, and zero em-dash compliance"
```
