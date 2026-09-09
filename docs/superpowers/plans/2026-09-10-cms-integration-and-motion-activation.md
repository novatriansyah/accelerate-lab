# CMS Integration & Motion Engine Activation Implementation Plan

> **For agentic workers:**
**Goal:** Connect hardcoded landing and contact page elements to existing CMS models (Project image_path, Service dropdowns, SiteSetting contact info, Article insights) and activate the GSAP kinetic motion engine across frontend views.
**Architecture:** Monolithic Laravel 12 Blade views consuming Eloquent models via PageController and SiteSetting cached helper, with GSAP ScrollTrigger and Alpine.js frontend interaction layers.
**Tech Stack:** Laravel 12, PHP 8.3, Blade, Tailwind CSS v4, Alpine.js, GSAP 3.12, Filament v3, PHPUnit 11.

## Global Constraints
- Absolute zero em-dashes (`—` or `–`) across all views, tests, plans, and commit messages.
- Strict Test-Driven Development (TDD): Write failing test first, verify failure, implement minimal code, verify pass, commit.
- Do NOT create new CMS resources or tables; strictly utilize existing resources: `ProjectResource`, `ServiceResource`, `SiteSettingResource`, `ArticleResource`, and `HomepageStatResource`.
- Maintain 100% PHPUnit test pass rate throughout.

---

### File Structure Map

```text
app/
├── Http/
│   └── Controllers/
│       └── Frontend/
│           └── PageController.php             # Add services and articles to home() and contact()
└── Models/
    └── Project.php                            # Add getImageAttribute accessor for image_path compatibility

resources/
└── views/
    ├── frontend/
    │   ├── components/
    │   │   └── footer.blade.php               # Connect email, address, legal entity, and LinkedIn to SiteSetting
    │   └── pages/
    │       ├── home.blade.php                 # Fix project image_path, wire .fade-anim and .t-counter, add Article showcase
    │       └── contact.blade.php              # Connect contact card to SiteSetting, wire dynamic Service dropdown

tests/
└── Feature/
    ├── LandingPageCmsProjectWiringTest.php    # Verify project image and tags on homepage
    ├── ContactPageCmsWiringTest.php           # Verify contact page SiteSetting wiring and dynamic Service dropdown
    ├── FooterCmsWiringTest.php                # Verify footer SiteSetting dynamic wiring
    ├── LandingPageArticleShowcaseTest.php     # Verify dynamic Article showcase on homepage
    └── LandingPageMotionActivationTest.php    # Verify .fade-anim and .t-counter hooks on homepage and contact
```

---

### Task 1: Fix Project Image Path & Wire Project Capabilities on Landing Page

**Files:**
- Modify: `app/Models/Project.php:40-56`
- Modify: `resources/views/frontend/pages/home.blade.php:375-420`
- Test: `tests/Feature/LandingPageCmsProjectWiringTest.php`

**Interfaces:**
- Consumes: `App\Models\Project` (`image_path`, `client`, `industry`, `title`, `description`, `slug`).
- Produces: Robust `getImageAttribute()` accessor and verified `image_path` rendering in homepage project cards.

- [ ] **Step 1: Write failing test verifying project image and metadata rendering on homepage**

```php
<?php

namespace Tests\Feature;

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LandingPageCmsProjectWiringTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_renders_project_image_and_metadata_from_cms(): void
    {
        $project = Project::create([
            'title' => 'Alpha Logistics Core',
            'slug' => 'alpha-logistics-core',
            'client' => 'PT Alpha Nusantara',
            'industry' => 'Supply Chain',
            'description' => 'Real-time fleet tracking and automated dispatch engine.',
            'image_path' => 'projects/alpha-preview.webp',
            'sort_order' => 1,
        ]);

        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Alpha Logistics Core');
        $response->assertSee('PT Alpha Nusantara');
        $response->assertSee('projects/alpha-preview.webp');
        $response->assertDontSee('—', false);
        $response->assertDontSee('–', false);
    }
}
```

- [ ] **Step 2: Run test to verify failure**

Run: `php artisan test --filter=LandingPageCmsProjectWiringTest`
Expected: FAIL because `home.blade.php` checks `$project->image` instead of `$project->image_path`.

- [ ] **Step 3: Update `app/Models/Project.php` and `resources/views/frontend/pages/home.blade.php`**

In `app/Models/Project.php`:
```php
    public function getImageAttribute(): ?string
    {
        return $this->image_path;
    }
```

In `resources/views/frontend/pages/home.blade.php`:
Update project card image check around line 380:
```blade
                        @php
                            $projectImage = $project->image_path ?? $project->image;
                        @endphp
                        @if(!empty($projectImage))
                            <img src="{{ asset('storage/' . $projectImage) }}"
                                 alt="{{ $project->title }}"
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-slate-900 to-slate-950 text-slate-600 font-mono text-sm">
                                [Accelerate Lab System Blueprint]
                            </div>
                        @endif
```

- [ ] **Step 4: Run test to verify it passes**

Run: `php artisan test --filter=LandingPageCmsProjectWiringTest`
Expected: PASS with 5 assertions.

- [ ] **Step 5: Commit**

```bash
git add app/Models/Project.php resources/views/frontend/pages/home.blade.php tests/Feature/LandingPageCmsProjectWiringTest.php
git commit -m "fix(portfolio): wire project image_path and accessor to landing page cards"
```

---

### Task 2: Connect Contact Page to Existing CMS Data (`ServiceResource` & `SiteSettingResource`)

**Files:**
- Modify: `app/Http/Controllers/Frontend/PageController.php:114-121`
- Modify: `resources/views/frontend/pages/contact.blade.php:35-95,165-180`
- Test: `tests/Feature/ContactPageCmsWiringTest.php`

**Interfaces:**
- Consumes: `App\Models\Service` and `App\Models\SiteSetting`.
- Produces: Dynamically populated Primary Interest dropdown and CMS-driven contact info on `/contact`.

- [ ] **Step 1: Write failing test for contact page CMS wiring**

```php
<?php

namespace Tests\Feature;

use App\Models\Service;
use App\Models\SiteSetting;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactPageCmsWiringTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_page_renders_cms_settings_and_dynamic_services(): void
    {
        SiteSetting::create([
            'key' => 'contact_email',
            'value' => 'inquiry@acceleratelab.id',
            'group' => 'contact',
            'is_display' => true,
        ]);

        SiteSetting::create([
            'key' => 'contact_phone',
            'value' => '+62 899-1122-3344',
            'group' => 'contact',
            'is_display' => true,
        ]);

        SiteSetting::create([
            'key' => 'registered_city',
            'value' => 'Jakarta Special Capital Region, Indonesia',
            'group' => 'general',
            'is_display' => true,
        ]);

        Service::create([
            'title' => 'Enterprise Cloud Architecture',
            'slug' => 'enterprise-cloud-architecture',
            'category' => 'development',
            'sort_order' => 1,
        ]);

        $response = $this->get('/contact');
        $response->assertStatus(200);
        $response->assertSee('inquiry@acceleratelab.id');
        $response->assertSee('+62 899-1122-3344');
        $response->assertSee('Jakarta Special Capital Region, Indonesia');
        $response->assertSee('Enterprise Cloud Architecture');
        $response->assertDontSee('—', false);
        $response->assertDontSee('–', false);
    }
}
```

- [ ] **Step 2: Run test to verify failure**

Run: `php artisan test --filter=ContactPageCmsWiringTest`
Expected: FAIL because `/contact` still renders hardcoded `hello@acceleratelab.id`, hardcoded phone, and static option list.

- [ ] **Step 3: Update `PageController.php` and `contact.blade.php`**

In `app/Http/Controllers/Frontend/PageController.php`:
```php
    public function contact()
    {
        $services = Service::orderBy('sort_order')->get();

        return view('frontend.pages.contact', [
            'title' => 'Contact Us - Accelerate Lab',
            'description' => 'Get in touch with Accelerate Lab. Start a project, request a consultation, or ask about our custom software development and cloud services.',
            'services' => $services,
        ]);
    }
```

In `resources/views/frontend/pages/contact.blade.php`:
Update the contact information panel:
```blade
@php
    $contactEmail = \App\Models\SiteSetting::get('contact_email', 'hello@acceleratelab.id');
    $contactPhone = \App\Models\SiteSetting::get('contact_whatsapp', \App\Models\SiteSetting::get('contact_phone', '+62 821-2559-0020'));
    $cleanPhone = preg_replace('/[^0-9]/', '', $contactPhone);
    $studioLocation = \App\Models\SiteSetting::get('registered_city', \App\Models\SiteSetting::get('contact_address', 'Jakarta & Bandung, Indonesia'));
    $legalName = \App\Models\SiteSetting::get('legal_name', 'PT Akselerasi Digital Mandiri');
@endphp
```
Use `$contactEmail`, `$contactPhone`, `$cleanPhone`, `$studioLocation`, and `$legalName` in the cards.
Update the `service_interest` dropdown:
```blade
<select id="service_interest" name="service_interest" class="...">
    @if(isset($services) && $services->isNotEmpty())
        @foreach($services as $srv)
            <option value="{{ $srv->title }}" {{ old('service_interest') == $srv->title ? 'selected' : '' }}>
                {{ $srv->title }}
            </option>
        @endforeach
    @else
        <option value="Custom Web Applications">Custom Web Applications</option>
        <option value="Mobile App Development">Mobile App Development</option>
        <option value="Cloud Architecture & DevOps">Cloud Architecture & DevOps</option>
        <option value="UI/UX Product Design">UI/UX Product Design</option>
    @endif
    <option value="Enterprise Modernization">Enterprise Modernization</option>
</select>
```

- [ ] **Step 4: Run test to verify it passes**

Run: `php artisan test --filter=ContactPageCmsWiringTest`
Expected: PASS with 6 assertions.

- [ ] **Step 5: Commit**

```bash
git add app/Http/Controllers/Frontend/PageController.php resources/views/frontend/pages/contact.blade.php tests/Feature/ContactPageCmsWiringTest.php
git commit -m "feat(contact): wire dynamic services dropdown and site settings contact info"
```

---

### Task 3: Connect Shell & Footer to `SiteSettingResource`

**Files:**
- Modify: `resources/views/frontend/components/footer.blade.php:30-130`
- Test: `tests/Feature/FooterCmsWiringTest.php`

**Interfaces:**
- Consumes: `App\Models\SiteSetting` cached values (`contact_email`, `registered_city`, `linkedin_url`, `legal_name`).
- Produces: Dynamic footer contact anchors and legal identity.

- [ ] **Step 1: Write failing test for footer CMS wiring**

```php
<?php

namespace Tests\Feature;

use App\Models\SiteSetting;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FooterCmsWiringTest extends TestCase
{
    use RefreshDatabase;

    public function test_footer_renders_dynamic_site_settings(): void
    {
        SiteSetting::create([
            'key' => 'contact_email',
            'value' => 'corporate@acceleratelab.id',
            'group' => 'contact',
            'is_display' => true,
        ]);

        SiteSetting::create([
            'key' => 'registered_city',
            'value' => 'Central Jakarta, Indonesia',
            'group' => 'general',
            'is_display' => true,
        ]);

        SiteSetting::create([
            'key' => 'linkedin_url',
            'value' => 'https://linkedin.com/company/accelerate-lab-official',
            'group' => 'social',
            'is_display' => true,
        ]);

        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('corporate@acceleratelab.id');
        $response->assertSee('Central Jakarta, Indonesia');
        $response->assertSee('https://linkedin.com/company/accelerate-lab-official');
        $response->assertDontSee('—', false);
        $response->assertDontSee('–', false);
    }
}
```

- [ ] **Step 2: Run test to verify failure**

Run: `php artisan test --filter=FooterCmsWiringTest`
Expected: FAIL because footer still has hardcoded email, location, and linkedin URL.

- [ ] **Step 3: Update `resources/views/frontend/components/footer.blade.php`**

In `footer.blade.php`:
```blade
@php
    $currentLocale = app()->getLocale();
    $footerServices = \App\Models\Service::orderBy('sort_order')->take(6)->get();
    $footerEmail = \App\Models\SiteSetting::get('contact_email', 'hello@acceleratelab.id');
    $footerCity = \App\Models\SiteSetting::get('registered_city', \App\Models\SiteSetting::get('contact_address', 'South Jakarta & Tangerang, Indonesia'));
    $footerLinkedin = \App\Models\SiteSetting::get('linkedin_url', 'https://linkedin.com');
    $legalName = \App\Models\SiteSetting::get('legal_name', 'PT Akselerasi Digital Mandiri');
@endphp
```
Replace the hardcoded occurrences in the footer CTA button, location text, and social link href with these variables.

- [ ] **Step 4: Run test to verify it passes**

Run: `php artisan test --filter=FooterCmsWiringTest`
Expected: PASS with 5 assertions.

- [ ] **Step 5: Commit**

```bash
git add resources/views/frontend/components/footer.blade.php tests/Feature/FooterCmsWiringTest.php
git commit -m "feat(footer): wire dynamic site settings for email, city, and linkedin"
```

---

### Task 4: Showcase Latest Insights (`ArticleResource`) on Landing Page

**Files:**
- Modify: `app/Http/Controllers/Frontend/PageController.php:17-35`
- Modify: `resources/views/frontend/pages/home.blade.php:420-474`
- Test: `tests/Feature/LandingPageArticleShowcaseTest.php`

**Interfaces:**
- Consumes: `App\Models\Article` (`title`, `slug`, `image_path`, `published_at`, `category_id`, `user_id`).
- Produces: Elegant bento card showcase for the 3 latest published insights on the homepage.

- [ ] **Step 1: Write failing test for homepage article showcase**

```php
<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LandingPageArticleShowcaseTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_renders_latest_published_articles(): void
    {
        $user = User::factory()->create(['name' => 'Nova Triansyah Azis']);
        $category = Category::create(['name' => 'Architecture Strategy', 'slug' => 'architecture-strategy']);

        Article::create([
            'title' => 'Modern Monolithic Scalability Insights',
            'slug' => 'modern-monolithic-scalability-insights',
            'content' => '<p>Practical benchmarks for high throughput systems.</p>',
            'published_at' => now()->subDay(),
            'user_id' => $user->id,
            'category_id' => $category->id,
            'is_featured' => true,
        ]);

        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Modern Monolithic Scalability Insights');
        $response->assertSee('Architecture Strategy');
        $response->assertDontSee('—', false);
        $response->assertDontSee('–', false);
    }
}
```

- [ ] **Step 2: Run test to verify failure**

Run: `php artisan test --filter=LandingPageArticleShowcaseTest`
Expected: FAIL because `home()` in `PageController.php` does not fetch articles and `home.blade.php` has no article showcase.

- [ ] **Step 3: Update `PageController.php` and `home.blade.php`**

In `app/Http/Controllers/Frontend/PageController.php`:
```php
use App\Models\Article;
...
    public function home()
    {
        $recentProjects = Project::latest()->take(4)->get();
        $services = Service::orderBy('sort_order')->take(4)->get();

        $heroStats = HomepageStat::where('section', 'hero')->orderBy('sort_order')->take(3)->get();
        $capabilityStats = HomepageStat::where('section', 'capabilities')->orderBy('sort_order')->take(3)->get();
        $testimonials = Testimonial::active()->orderBy('sort_order')->take(3)->get();
        $latestArticles = Article::with(['category', 'author'])
            ->where('published_at', '<=', now())
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('frontend.pages.home', [
            'title' => 'Accelerate Lab - Digital Innovation Agency',
            'description' => 'Accelerate Lab is a full-service digital innovation agency offering custom software, cloud solutions, and strategic design.',
            'recentProjects' => $recentProjects,
            'services' => $services,
            'heroStats' => $heroStats,
            'capabilityStats' => $capabilityStats,
            'testimonials' => $testimonials,
            'latestArticles' => $latestArticles,
        ]);
    }
```

In `resources/views/frontend/pages/home.blade.php`:
Add the Latest Insights section before testimonials or before the closing tag, with check `@if(isset($latestArticles) && $latestArticles->isNotEmpty())`:
```blade
{{-- ========================================================================
     LATEST INSIGHTS & DISPATCHES (Accelerate Technical Papers Matrix)
     ======================================================================== --}}
@if(isset($latestArticles) && $latestArticles->isNotEmpty())
<section class="py-20 border-t border-slate-200/80 dark:border-white/5 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
            <div>
                <span class="text-xs font-mono font-semibold tracking-wider text-[#00BFA5] uppercase">
                    03 // {{ $currentLocale === 'id' ? 'WAWASAN & RISET' : 'LATEST INSIGHTS' }}
                </span>
                <h2 class="font-instrumentsans text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-slate-900 dark:text-white mt-2">
                    {{ $currentLocale === 'id' ? 'Catatan Rekayasa & Praktik Terbaik' : 'Engineering Notes & Architectural Field Notes' }}
                </h2>
            </div>
            <a href="{{ route('blog') }}" class="rr-btn rr-btn-border px-5 py-2.5 text-xs font-medium self-start md:self-auto">
                <span class="btn-wrap">
                    <span class="text-1">{{ $currentLocale === 'id' ? 'Lihat Semua Artikel' : 'View All Insights' }}</span>
                    <span class="text-2">{{ $currentLocale === 'id' ? 'Jelajahi Wawasan' : 'Explore Articles' }}</span>
                </span>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($latestArticles as $art)
                <div class="bento-card p-6 sm:p-7 bg-white/80 dark:bg-slate-900/60 backdrop-blur-xl border border-slate-200/80 dark:border-white/10 shadow-lg flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-2 mb-3 text-xs font-mono">
                            @if($art->category)
                                <span class="px-2.5 py-1 rounded-md bg-[#00BFA5]/10 text-[#00BFA5] font-semibold">
                                    {{ $art->category->name }}
                                </span>
                            @endif
                            <span class="text-slate-400">
                                {{ $art->published_at ? $art->published_at->format('M d, Y') : '' }}
                            </span>
                        </div>
                        <h3 class="font-instrumentsans text-xl font-bold text-slate-900 dark:text-white mb-2 hover:text-[#00BFA5] transition-colors">
                            <a href="{{ route('article', $art->slug) }}">
                                {{ $art->title }}
                            </a>
                        </h3>
                        <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed mb-6 line-clamp-2">
                            {{ \Illuminate\Support\Str::limit(strip_tags($art->content), 100) }}
                        </p>
                    </div>
                    <div class="pt-4 border-t border-slate-100 dark:border-white/5">
                        <a href="{{ route('article', $art->slug) }}" class="inline-flex items-center gap-2 text-xs font-mono font-bold text-[#00BFA5] hover:underline">
                            <span>{{ $currentLocale === 'id' ? 'Baca Artikel' : 'Read Paper' }}</span>
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
```

- [ ] **Step 4: Run test to verify it passes**

Run: `php artisan test --filter=LandingPageArticleShowcaseTest`
Expected: PASS with 4 assertions.

- [ ] **Step 5: Commit**

```bash
git add app/Http/Controllers/Frontend/PageController.php resources/views/frontend/pages/home.blade.php tests/Feature/LandingPageArticleShowcaseTest.php
git commit -m "feat(home): showcase latest articles from CMS on landing page"
```

---

### Task 5: Activate Kinetic Motion Engine (`.fade-anim` & `.t-counter`) on Landing & Contact Pages

**Files:**
- Modify: `resources/views/frontend/pages/home.blade.php:14-135,175-220,355-375`
- Modify: `resources/views/frontend/pages/contact.blade.php:30-100`
- Test: `tests/Feature/LandingPageMotionActivationTest.php`

**Interfaces:**
- Consumes: GSAP ScrollTrigger engine hooks in `resources/js/app.js` (`.fade-anim`, `data-direction`, `.t-counter`).
- Produces: Verified motion markup on landing page and contact page DOM elements.

- [ ] **Step 1: Write failing test verifying motion attributes present in HTML output**

```php
<?php

namespace Tests\Feature;

use App\Models\HomepageStat;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LandingPageMotionActivationTest extends TestCase
{
    use RefreshDatabase;

    public function test_landing_page_contains_motion_engine_hooks(): void
    {
        HomepageStat::create([
            'value' => '99.9',
            'unit' => '%',
            'label' => 'Uptime Guarantee',
            'section' => 'hero',
            'sort_order' => 1,
        ]);

        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('fade-anim', false);
        $response->assertSee('data-direction', false);
        $response->assertSee('t-counter', false);

        $contactResponse = $this->get('/contact');
        $contactResponse->assertStatus(200);
        $contactResponse->assertSee('fade-anim', false);
    }
}
```

- [ ] **Step 2: Run test to verify failure**

Run: `php artisan test --filter=LandingPageMotionActivationTest`
Expected: FAIL because `fade-anim` and `t-counter` are currently not attached to `home.blade.php` and `contact.blade.php`.

- [ ] **Step 3: Attach `.fade-anim` and `.t-counter` to key sections**

In `resources/views/frontend/pages/home.blade.php`:
1. Attach `.fade-anim` with `data-direction="bottom"` to:
   - Hero text container: `class="flex flex-col items-center text-center max-w-4xl mx-auto fade-anim" data-direction="bottom"`
   - Capabilities section title & bento cards.
   - Switcher section title & panel.
   - Case studies section title & project cards.
2. Attach `.t-counter` to metric numbers in hero stats:
   ```blade
   <span class="t-counter">{{ $stat->value }}</span>
   ```
   and fallback metrics:
   ```blade
   <span class="font-instrumentsans text-3xl sm:text-4xl font-bold text-slate-900 dark:text-white t-counter">99.9%</span>
   ```
3. In `resources/views/frontend/pages/contact.blade.php`:
   - Attach `fade-anim` with `data-direction="left"` to the contact info column and `data-direction="right"` to the form column.

- [ ] **Step 4: Run test to verify it passes**

Run: `php artisan test --filter=LandingPageMotionActivationTest`
Expected: PASS with 6 assertions.

- [ ] **Step 5: Commit**

```bash
git add resources/views/frontend/pages/home.blade.php resources/views/frontend/pages/contact.blade.php tests/Feature/LandingPageMotionActivationTest.php
git commit -m "feat(motion): activate fade-anim directional reveals and t-counter tickers"
```

---

### Task 6: Master Quality Gate, Production Build & Git Synchronization

**Files:**
- Run: Complete test suite
- Compile: Production assets
- Sync: Git master & development

- [ ] **Step 1: Run complete PHPUnit test suite**

Run: `php artisan test`
Expected: 100% PASS with 0 failures, 0 errors.

- [ ] **Step 2: Compile production Vite assets**

Run: `cmd /c "npm run build"`
Expected: Clean build with 0 errors.

- [ ] **Step 3: Git Branch Synchronization**

```bash
git add .
git commit -m "chore(release): connect existing cms resources and activate kinetic motion engine"
git checkout master
git merge development --ff-only
git push origin development master
git checkout development
```
