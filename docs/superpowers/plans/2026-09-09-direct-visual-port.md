# Direct Visual Port: Accelerate (70%) + DesignEngine (30%) Implementation Plan

> **For agentic workers:** 
**Goal:** Direct visual port of authentic HTML markup, CSS classes, typography, and interactive components from Accelerate (`references/Accelerate/dark/index.html`) and DesignEngine (`references/DesignEngine/app-development/index.html`) into the Accelerate Lab Laravel 12 application.
**Architecture:** Monolithic Laravel Blade architecture augmented by a bespoke `resources/css/Accelerate.css` design engine for complex animations (.rr-btn kinetic hover, spinning circle badge, service lists) combined with Tailwind CSS v4 and DesignEngine floating capsule navigation.
**Tech Stack:** Laravel 12.x, Blade components, Tailwind CSS v4 (@tailwindcss/vite), Alpine.js, PHPUnit 11.

## Global Constraints

- **Strict TDD:** Red -> Green -> Refactor cycle enforced for every task. Tests written and verified failing before any implementation.
- **Visual Authenticity:** Direct replication of exact reference markup and CSS rules; absolutely NO generic Tailwind card approximations.
- **Color Mapping:** Primary Teal `#00BFA5` / `#009688` replaces Accelerate orange `#FF6A3A`. Canvas Dark `#0F172A`, Surface Dark `#1E293B`, Borders `rgba(255, 255, 255, 0.1)`.
- **Typography:** Instrument Sans / Plus Jakarta Sans display hierarchy, `clamp()` fluid headings, uppercase mono accents.
- **Zero Em-Dashes:** Never use `—` or `–` in any code, view, or test; use standard hyphens (`-`) or colons (`:`).
- **Icons:** 100% inline SVG via `<x-app-icon>` (no external font stylesheets or FontAwesome CDN).
- **Images:** 100% valid images with descriptive `alt` text.

---

## File Structure & Responsibilities

| File Path | Responsibility |
|---|---|
| `resources/css/Accelerate.css` | Authentic Accelerate CSS: `.rr-btn` double-text kinetic slide, `.circle-text` 8s rotation keyframe, `.work-box` scale, `.service-box` 3-column layout. |
| `resources/css/app.css` | Tailwind v4 entrypoint importing `Accelerate.css` and custom design tokens. |
| `resources/views/frontend/components/header.blade.php` | DesignEngine floating capsule navbar (`max-w-[1140px] rounded-full bg-slate-900/85 backdrop-blur-xl`). |
| `resources/views/frontend/pages/home.blade.php` | Assembled homepage: Accelerate Hero + DesignEngine Bento Grid + Accelerate Services List + Accelerate Featured Works. |
| `tests/Feature/AccelerateDesignEngineTest.php` | TDD suite verifying Accelerate CSS compilation, button classes, and keyframe animations. |
| `tests/Feature/FloatingIslandNavbarTest.php` | TDD suite verifying DesignEngine floating capsule header markup and navigation items. |
| `tests/Feature/AccelerateHeroSectionTest.php` | TDD suite verifying Accelerate rotating badge, display typography, and metric counters. |
| `tests/Feature/DesignEngineBentoGridTest.php` | TDD suite verifying 12-column bento asymmetrical layout (8-col + 4-col). |
| `tests/Feature/AccelerateServicesSectionTest.php` | TDD suite verifying numbered service list `(01)` to `(04)` with hover thumbnail layout. |
| `tests/Feature/AcceleratePortfolioSectionTest.php` | TDD suite verifying `.work-box` project grid with metadata tags and `.scale` thumbnail. |

---

## Tasks

### Task 1: Core Design Engine & CSS Port (`Accelerate.css`)

**Files:**
- Create: `resources/css/Accelerate.css`
- Modify: `resources/css/app.css`
- Test: `tests/Feature/AccelerateDesignEngineTest.php`

**Interfaces:**
- Consumes: Tailwind v4 build pipeline via `@tailwindcss/vite`
- Produces: Global utility classes `.rr-btn`, `.btn-wrap`, `.text-one`, `.text-two`, `.circle-text`, `.works-wrapper-1`, `.service-box`

- [ ] **Step 1: Write the failing test**

```php
<?php

namespace Tests\Feature;

use Tests\TestCase;

class AccelerateDesignEngineTest extends TestCase
{
    public function test_Accelerate_css_file_exists_and_contains_authentic_classes(): void
    {
        $cssPath = resource_path('css/Accelerate.css');
        $this->assertFileExists($cssPath);

        $cssContent = file_get_contents($cssPath);
        $this->assertStringContainsString('.rr-btn', $cssContent);
        $this->assertStringContainsString('.btn-wrap', $cssContent);
        $this->assertStringContainsString('.text-one', $cssContent);
        $this->assertStringContainsString('.text-two', $cssContent);
        $this->assertStringContainsString('.circle-text', $cssContent);
        $this->assertStringContainsString('@keyframes textRotation', $cssContent);
        $this->assertStringContainsString('.works-wrapper-1', $cssContent);
        $this->assertStringContainsString('.service-box', $cssContent);
        $this->assertStringContainsString('#00BFA5', $cssContent);
    }

    public function test_app_css_imports_Accelerate_css(): void
    {
        $appCss = file_get_contents(resource_path('css/app.css'));
        $this->assertStringContainsString('@import "./Accelerate.css";', $appCss);
    }
}
```

- [ ] **Step 2: Run test to verify it fails**

Run: `php artisan test --filter=AccelerateDesignEngineTest`
Expected: FAIL with "File resources/css/Accelerate.css does not exist"

- [ ] **Step 3: Write minimal implementation**

Create `resources/css/Accelerate.css`:
```css
/* Accelerate Lab - Accelerate Authentic Design Engine */
:root {
  --primary: #00BFA5;
  --primary-hover: #009688;
  --dark-canvas: #0F172A;
  --dark-surface: #1E293B;
  --dark-border: rgba(255, 255, 255, 0.1);
  --light-border: rgba(15, 23, 42, 0.1);
}

/* ==========================================================================
   1. Kinetic Double-Text Sliding Button (.rr-btn)
   ========================================================================== */
.rr-btn {
  justify-content: center;
  position: relative;
  overflow: hidden;
  z-index: 5;
  padding: 16px 32px;
  background-color: var(--primary);
  color: #0F172A;
  border: 1px solid var(--primary);
  border-radius: 9999px;
  font-style: normal;
  font-weight: 600;
  font-size: 15px;
  line-height: 1;
  display: inline-flex;
  align-items: center;
  text-transform: capitalize;
  letter-spacing: -0.01em;
  cursor: pointer;
  transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.rr-btn::before {
  content: "";
  position: absolute;
  width: 100%;
  height: 0;
  bottom: 0;
  left: 0;
  background-color: #FFFFFF;
  transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
  z-index: 0;
}

.rr-btn:hover::before,
.rr-btn:focus::before {
  height: 100%;
}

.rr-btn .btn-wrap {
  z-index: 1;
  overflow: hidden;
  position: relative;
  display: inline-block;
}

.rr-btn .btn-wrap .text-one,
.rr-btn .btn-wrap .text-two {
  display: flex;
  align-items: center;
  gap: 8px;
  transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1), color 0.4s ease;
}

.rr-btn .btn-wrap .text-one {
  position: relative;
  display: block;
  color: #0F172A;
}

.rr-btn .btn-wrap .text-two {
  position: absolute;
  top: 100%;
  left: 0;
  display: block;
  color: #0F172A;
}

.rr-btn:hover .btn-wrap .text-one,
.rr-btn:focus .btn-wrap .text-one {
  transform: translateY(-150%);
}

.rr-btn:hover .btn-wrap .text-two,
.rr-btn:focus .btn-wrap .text-two {
  transform: translateY(-100%);
  color: #0F172A;
}

.rr-btn.btn-border {
  background-color: transparent;
  color: #F8FAFC;
  border: 1px solid var(--dark-border);
}

.rr-btn.btn-border::before {
  background-color: var(--primary);
}

.rr-btn.btn-border:hover .btn-wrap .text-two {
  color: #0F172A;
}

/* ==========================================================================
   2. Rotating Circle Text Badge (.circle-text)
   ========================================================================== */
.circle-text-wrapper {
  display: inline-block;
  position: relative;
}

.circle-text {
  width: 130px;
  height: 130px;
  position: relative;
  border-radius: 9999px;
  background: transparent;
  display: flex;
  align-items: center;
  justify-content: center;
}

.circle-text .text {
  width: 100%;
  height: 100%;
  position: absolute;
  top: 0;
  left: 0;
  animation: textRotation 10s linear infinite;
  transform-origin: center center;
}

@keyframes textRotation {
  to {
    transform: rotate(360deg);
  }
}

.circle-text .icon {
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  color: var(--primary);
}

/* ==========================================================================
   3. Featured Works Grid (.works-wrapper-1, .work-box)
   ========================================================================== */
.works-wrapper-1 {
  display: grid;
  grid-template-columns: repeat(1, 1fr);
  gap: 32px;
}

@media (min-width: 768px) {
  .works-wrapper-1 {
    grid-template-columns: repeat(2, 1fr);
  }
}

.work-box .thumb {
  position: relative;
  overflow: hidden;
  border-radius: 20px;
  background-color: var(--dark-surface);
  border: 1px solid var(--dark-border);
}

.work-box .thumb .image.scale {
  overflow: hidden;
  border-radius: 20px;
  transition: transform 0.6s cubic-bezier(0.25, 1, 0.5, 1);
}

.work-box .thumb .image.scale img {
  width: 100%;
  height: auto;
  aspect-ratio: 16 / 10;
  object-fit: cover;
  transition: transform 0.8s cubic-bezier(0.25, 1, 0.5, 1);
}

.work-box:hover .thumb .image.scale img {
  transform: scale(1.05);
}

.work-box .content {
  margin-top: 16px;
}

.work-box .title {
  font-size: 22px;
  font-weight: 600;
  line-height: 1.3;
  letter-spacing: -0.02em;
}

.work-box .meta {
  display: flex;
  gap: 10px;
  align-items: center;
  margin-top: 6px;
}

.work-box .meta span {
  font-size: 13px;
  font-weight: 500;
  color: #94A3B8;
  display: flex;
  align-items: center;
}

.work-box .meta span:not(:first-child)::before {
  content: "";
  width: 4px;
  height: 4px;
  background-color: var(--primary);
  display: inline-block;
  border-radius: 50%;
  margin-right: 8px;
}

/* ==========================================================================
   4. Complex Proficiency Services List (.services-wrapper-1, .service-box)
   ========================================================================== */
.services-wrapper-1 .service-box {
  border-top: 1px solid var(--dark-border);
  padding-top: 36px;
  padding-bottom: 36px;
  display: grid;
  gap: 24px;
  grid-template-columns: 80px 1fr auto;
  align-items: flex-start;
  transition: background-color 0.3s ease;
}

@media (max-width: 768px) {
  .services-wrapper-1 .service-box {
    grid-template-columns: 1fr;
    gap: 16px;
  }
}

.services-wrapper-1 .service-box .count .number {
  font-size: 28px;
  font-weight: 600;
  line-height: 1;
  color: var(--primary);
  font-family: ui-monospace, monospace;
}

.services-wrapper-1 .service-box .content .title {
  font-size: 28px;
  font-weight: 600;
  line-height: 1.2;
  color: #F8FAFC;
  letter-spacing: -0.02em;
}

.services-wrapper-1 .service-box .service-list {
  margin-top: 14px;
  display: flex;
  flex-wrap: wrap;
  gap: 8px 16px;
}

.services-wrapper-1 .service-box .service-list li {
  font-size: 15px;
  font-weight: 400;
  color: #94A3B8;
}

.services-wrapper-1 .service-box .thumb {
  position: relative;
  overflow: hidden;
  border-radius: 12px;
  width: 220px;
  height: 130px;
}

@media (max-width: 1024px) {
  .services-wrapper-1 .service-box .thumb {
    display: none;
  }
}

.services-wrapper-1 .service-box .thumb img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.5s ease;
}

.services-wrapper-1 .service-box:hover .thumb img {
  transform: scale(1.08);
}
```

Prepend `@import "./Accelerate.css";` to `resources/css/app.css`.

- [ ] **Step 4: Run test to verify it passes**

Run: `php artisan test --filter=AccelerateDesignEngineTest`
Expected: PASS (2 tests, 10 assertions)

- [ ] **Step 5: Commit**

```bash
git add resources/css/Accelerate.css resources/css/app.css tests/Feature/AccelerateDesignEngineTest.php
git commit -m "feat(css): implement authentic Accelerate design engine and button system"
```

---

### Task 2: DesignEngine Floating Island Capsule Navbar (`header.blade.php`)

**Files:**
- Modify: `resources/views/frontend/components/header.blade.php`
- Test: `tests/Feature/FloatingIslandNavbarTest.php`

**Interfaces:**
- Consumes: App routes (`route('home')`, `route('about')`, `route('services.index')`, `route('portfolio.index')`, `route('contact')`), `<x-app-icon>` component
- Produces: Centered capsule header (`#floating-island-navbar`) across all pages

- [ ] **Step 1: Write the failing test**

```php
<?php

namespace Tests\Feature;

use Tests\TestCase;

class FloatingIslandNavbarTest extends TestCase
{
    public function test_floating_island_navbar_renders_capsule_structure_and_routes(): void
    {
        $response = $this->get(route('home'));
        $response->assertStatus(200);

        // Verify floating capsule container
        $response->assertSee('id="floating-island-navbar"', false);
        $response->assertSee('rounded-full', false);
        $response->assertSee('fixed top-5 left-1/2 -translate-x-1/2', false);
        $response->assertSee('backdrop-blur', false);

        // Verify brand and navigation links
        $response->assertSee(route('home'));
        $response->assertSee(route('about'));
        $response->assertSee(route('services.index'));
        $response->assertSee(route('portfolio.index'));
        $response->assertSee(route('contact'));

        // Verify kinetic CTA button (.rr-btn)
        $response->assertSee('rr-btn', false);
        $response->assertSee('btn-wrap', false);
    }
}
```

- [ ] **Step 2: Run test to verify it fails**

Run: `php artisan test --filter=FloatingIslandNavbarTest`
Expected: FAIL with missing `#floating-island-navbar` or capsule classes

- [ ] **Step 3: Write minimal implementation**

Update `resources/views/frontend/components/header.blade.php` with genuine DesignEngine floating capsule container and Accelerate `.rr-btn` CTA:

```blade
<header class="relative z-50">
    <div id="floating-island-navbar"
         class="fixed top-5 left-1/2 -translate-x-1/2 z-50 mx-auto flex w-[92%] max-w-[1140px] items-center justify-between rounded-full bg-slate-900/85 backdrop-blur-xl border border-white/10 px-4 sm:px-6 py-2.5 shadow-2xl transition-all duration-300">
        
        {{-- Logo --}}
        <a href="{{ route('home') }}" class="flex items-center gap-3 group">
            <span class="size-10 rounded-full bg-teal-500/10 border border-teal-500/20 flex items-center justify-center text-teal-400 group-hover:scale-105 transition-transform">
                <x-app-icon name="brand-rocket" class="size-5" />
            </span>
            <span class="font-bold tracking-tight text-lg text-white font-instrumentsans">
                Accelerate<span class="text-teal-400">Lab</span>
            </span>
        </a>

        {{-- Desktop Navigation --}}
        <nav class="hidden md:flex items-center gap-1">
            <a href="{{ route('home') }}"
               class="px-4 py-2 rounded-full text-sm font-medium transition-all {{ request()->routeIs('home') ? 'bg-white/10 text-white' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                {{ __('navigation.home') }}
            </a>
            <a href="{{ route('about') }}"
               class="px-4 py-2 rounded-full text-sm font-medium transition-all {{ request()->routeIs('about') ? 'bg-white/10 text-white' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                {{ __('navigation.about') }}
            </a>
            <a href="{{ route('services.index') }}"
               class="px-4 py-2 rounded-full text-sm font-medium transition-all {{ request()->routeIs('services.*') ? 'bg-white/10 text-white' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                {{ __('navigation.services') }}
            </a>
            <a href="{{ route('portfolio.index') }}"
               class="px-4 py-2 rounded-full text-sm font-medium transition-all {{ request()->routeIs('portfolio.*') ? 'bg-white/10 text-white' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                {{ __('navigation.portfolio') }}
            </a>
            <a href="{{ route('contact') }}"
               class="px-4 py-2 rounded-full text-sm font-medium transition-all {{ request()->routeIs('contact') ? 'bg-white/10 text-white' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                {{ __('navigation.contact') }}
            </a>
        </nav>

        {{-- Right Actions: Locale Toggle & Kinetic CTA --}}
        <div class="flex items-center gap-3">
            {{-- Language Switcher --}}
            <a href="{{ route('locale.switch', app()->getLocale() === 'id' ? 'en' : 'id') }}"
               class="text-xs uppercase font-mono tracking-wider px-2.5 py-1 rounded-full border border-white/10 text-slate-300 hover:text-teal-400 hover:border-teal-500/30 transition-all">
                {{ app()->getLocale() === 'id' ? 'EN' : 'ID' }}
            </a>

            {{-- Kinetic .rr-btn --}}
            <a href="{{ route('contact') }}" class="rr-btn hidden sm:inline-flex text-xs !py-2.5 !px-5">
                <span class="btn-wrap">
                    <span class="text-one">{{ __('navigation.contact') }}</span>
                    <span class="text-two">{{ __('navigation.contact') }}</span>
                </span>
            </a>
        </div>
    </div>
</header>
```

- [ ] **Step 4: Run test to verify it passes**

Run: `php artisan test --filter=FloatingIslandNavbarTest`
Expected: PASS

- [ ] **Step 5: Commit**

```bash
git add resources/views/frontend/components/header.blade.php tests/Feature/FloatingIslandNavbarTest.php
git commit -m "feat(header): port authentic DesignEngine floating capsule navbar"
```

---

### Task 3: Accelerate Hero Section with Rotating Circle Badge (`home.blade.php`)

**Files:**
- Modify: `resources/views/frontend/pages/home.blade.php`
- Test: `tests/Feature/AccelerateHeroSectionTest.php`

**Interfaces:**
- Consumes: `.circle-text`, `@keyframes textRotation`, `.rr-btn`, `<x-app-icon>`
- Produces: Hero section with spinning circular SVG text badge, large display title, and metric statistics

- [ ] **Step 1: Write the failing test**

```php
<?php

namespace Tests\Feature;

use Tests\TestCase;

class AccelerateHeroSectionTest extends TestCase
{
    public function test_hero_section_renders_Accelerate_structures(): void
    {
        $response = $this->get(route('home'));
        $response->assertStatus(200);

        // Verify authentic Accelerate hero classes
        $response->assertSee('hero-area', false);
        $response->assertSee('circle-text-wrapper', false);
        $response->assertSee('circle-text', false);

        // Verify SVG text rotation structure
        $response->assertSee('viewBox="0 0 100 100"', false);
        $response->assertSee('textPath', false);

        // Verify metrics counters
        $response->assertSee('98%');
        $response->assertSee('120+');
    }
}
```

- [ ] **Step 2: Run test to verify it fails**

Run: `php artisan test --filter=AccelerateHeroSectionTest`
Expected: FAIL with missing `circle-text-wrapper` or `textPath`

- [ ] **Step 3: Write minimal implementation**

Port the Accelerate lines 213–270 into `resources/views/frontend/pages/home.blade.php`:

```blade
{{-- Hero Area (Authentic Accelerate) --}}
<section class="hero-area pt-36 pb-20 md:pt-44 md:pb-28 relative overflow-hidden">
    <div class="max-w-[1240px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="hero-area-inner">
            <div class="hero-content">
                {{-- Rotating Circle Badge --}}
                <div class="award-wrapper mb-8">
                    <div class="circle-text-wrapper">
                        <div class="circle-text">
                            <svg class="text" viewBox="0 0 100 100" width="130" height="130">
                                <path id="circlePath" d="M 50, 50 m -37, 0 a 37,37 0 1,1 74,0 a 37,37 0 1,1 -74,0" fill="none" />
                                <text font-size="10" font-weight="600" letter-spacing="2" fill="#00BFA5">
                                    <textPath href="#circlePath" startOffset="0%">
                                        ACCELERATE LAB * INNOVATION & CODE *
                                    </textPath>
                                </text>
                            </svg>
                            <div class="icon">
                                <x-app-icon name="brand-rocket" class="size-7 text-teal-400" />
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Hero Headline --}}
                <div class="section-header max-w-4xl">
                    <h1 class="text-4xl sm:text-6xl lg:text-7xl font-bold tracking-tight text-white leading-[1.08] font-instrumentsans">
                        Accelerate your brand with 
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-teal-300 via-teal-400 to-emerald-400">precision engineering</span>
                        and high-impact design.
                    </h1>
                </div>

                {{-- Metrics & Intro Content --}}
                <div class="section-content mt-12 grid grid-cols-1 md:grid-cols-12 gap-8 items-end">
                    <div class="md:col-span-6 flex items-center gap-10">
                        <div class="feature-box">
                            <span class="block text-4xl sm:text-5xl font-bold text-white font-mono">98%</span>
                            <p class="text-xs sm:text-sm text-slate-400 mt-1 uppercase tracking-wider">Client satisfaction rate</p>
                        </div>
                        <div class="h-12 w-px bg-white/10"></div>
                        <div class="feature-box">
                            <span class="block text-4xl sm:text-5xl font-bold text-teal-400 font-mono">120+</span>
                            <p class="text-xs sm:text-sm text-slate-400 mt-1 uppercase tracking-wider">Digital products shipped</p>
                        </div>
                    </div>

                    <div class="md:col-span-6 flex flex-col sm:flex-row items-start sm:items-center justify-end gap-5">
                        <p class="text-slate-400 text-sm sm:text-base max-w-md">
                            We architect high-performance web applications, enterprise software, and conversion-optimized digital systems for ambitious teams.
                        </p>
                        <a href="{{ route('contact') }}" class="rr-btn shrink-0">
                            <span class="btn-wrap">
                                <span class="text-one">Start a Project</span>
                                <span class="text-two">Start a Project</span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
```

- [ ] **Step 4: Run test to verify it passes**

Run: `php artisan test --filter=AccelerateHeroSectionTest`
Expected: PASS

- [ ] **Step 5: Commit**

```bash
git add resources/views/frontend/pages/home.blade.php tests/Feature/AccelerateHeroSectionTest.php
git commit -m "feat(hero): port authentic Accelerate hero with rotating circular badge"
```

---

### Task 4: DesignEngine Technical Bento Grid Section (`home.blade.php`)

**Files:**
- Modify: `resources/views/frontend/pages/home.blade.php`
- Test: `tests/Feature/DesignEngineBentoGridTest.php`

**Interfaces:**
- Consumes: 12-column grid layout with 8-col hero card and 4-col feature cards
- Produces: Asymmetrical bento grid highlighting core technical capabilities

- [ ] **Step 1: Write the failing test**

```php
<?php

namespace Tests\Feature;

use Tests\TestCase;

class DesignEngineBentoGridTest extends TestCase
{
    public function test_bento_grid_renders_authentic_DesignEngine_layout(): void
    {
        $response = $this->get(route('home'));
        $response->assertStatus(200);

        // Verify DesignEngine bento grid classes
        $response->assertSee('grid grid-cols-12', false);
        $response->assertSee('lg:col-span-8', false);
        $response->assertSee('lg:col-span-4', false);
        $response->assertSee('rounded-[20px]', false);

        // Verify technical capability headings
        $response->assertSee('Architecture First');
        $response->assertSee('Reliable & Scalable Code');
    }
}
```

- [ ] **Step 2: Run test to verify it fails**

Run: `php artisan test --filter=DesignEngineBentoGridTest`
Expected: FAIL with missing 12-column bento classes

- [ ] **Step 3: Write minimal implementation**

Port the DesignEngine Bento section (lines 2480–2580) into `resources/views/frontend/pages/home.blade.php`:

```blade
{{-- DesignEngine Technical Bento Grid Section --}}
<section class="py-20 bg-slate-900/50 border-y border-white/5 relative">
    <div class="max-w-[1240px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-14">
            <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-mono uppercase tracking-widest bg-teal-500/10 text-teal-400 border border-teal-500/20 mb-4">
                Why Accelerate Lab
            </span>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-white font-instrumentsans max-w-2xl">
                More than developers: your long-term technology partners
            </h2>
        </div>

        <div class="grid grid-cols-12 gap-6 items-stretch">
            {{-- Bento Card 1: 8-col Hero Highlight --}}
            <div class="col-span-12 lg:col-span-8 relative overflow-hidden rounded-[20px] bg-gradient-to-br from-slate-800/80 to-slate-900/90 border border-white/10 p-8 sm:p-12 flex flex-col justify-between">
                <div class="absolute -right-16 -top-16 w-80 h-80 rounded-full bg-teal-500/10 blur-3xl pointer-events-none"></div>
                <div class="relative z-10 max-w-xl">
                    <h3 class="text-2xl sm:text-3xl font-bold text-white font-instrumentsans mb-4">
                        Architecture-first approach tailored for mission-critical platforms
                    </h3>
                    <p class="text-slate-400 text-sm sm:text-base leading-relaxed mb-8">
                        We design software solutions built on resilient modular foundations. Clean boundaries, comprehensive automated tests, and scalable deployment pipelines mean zero tech debt.
                    </p>
                </div>
                <div class="relative z-10">
                    <a href="{{ route('services.index') }}" class="rr-btn btn-border">
                        <span class="btn-wrap">
                            <span class="text-one">Explore Capabilities</span>
                            <span class="text-two">Explore Capabilities</span>
                        </span>
                    </a>
                </div>
            </div>

            {{-- Bento Card 2: 4-col Metric Card --}}
            <div class="col-span-12 md:col-span-6 lg:col-span-4 rounded-[20px] bg-slate-800/50 border border-white/10 p-8 flex flex-col justify-between">
                <div>
                    <span class="size-12 rounded-xl bg-teal-500/10 border border-teal-500/20 flex items-center justify-center text-teal-400 mb-6">
                        <x-app-icon name="brand-rocket" class="size-6" />
                    </span>
                    <h3 class="text-xl font-bold text-white mb-2">Reliable & Scalable Code</h3>
                    <p class="text-slate-400 text-sm leading-relaxed">
                        Every system is engineered to handle 10x traffic spikes with sub-100ms response latencies.
                    </p>
                </div>
                <div class="mt-8 pt-6 border-t border-white/10 flex items-center justify-between">
                    <span class="text-xs font-mono text-slate-400">Zero Regression Rate</span>
                    <span class="text-xs font-mono text-teal-400 font-bold">100% CI Verified</span>
                </div>
            </div>

            {{-- Bento Card 3: 4-col Security Card --}}
            <div class="col-span-12 md:col-span-6 lg:col-span-4 rounded-[20px] bg-slate-800/50 border border-white/10 p-8 flex flex-col justify-between">
                <div>
                    <span class="size-12 rounded-xl bg-teal-500/10 border border-teal-500/20 flex items-center justify-center text-teal-400 mb-6">
                        <x-app-icon name="arrow-right" class="size-6" />
                    </span>
                    <h3 class="text-xl font-bold text-white mb-2">Hardened Security by Design</h3>
                    <p class="text-slate-400 text-sm leading-relaxed">
                        End-to-end encryption, strict role-based access control, and automated vulnerability scanning built-in.
                    </p>
                </div>
                <div class="mt-8 pt-6 border-t border-white/10 flex items-center justify-between">
                    <span class="text-xs font-mono text-slate-400">Security Audit</span>
                    <span class="text-xs font-mono text-teal-400 font-bold">Passed</span>
                </div>
            </div>

            {{-- Bento Card 4: 8-col Stacking Card --}}
            <div class="col-span-12 lg:col-span-8 rounded-[20px] bg-slate-800/50 border border-white/10 p-8 sm:p-10 flex flex-col sm:flex-row items-center justify-between gap-8">
                <div class="space-y-2 max-w-md">
                    <h3 class="text-2xl font-bold text-white font-instrumentsans">Rapid Time to Market</h3>
                    <p class="text-slate-400 text-sm leading-relaxed">
                        Iterative sprints delivering production-ready releases every 2 weeks without compromising stability.
                    </p>
                </div>
                <div class="flex items-center gap-4">
                    <div class="text-center px-4 py-3 rounded-xl bg-slate-900 border border-white/10">
                        <span class="block text-2xl font-bold text-teal-400 font-mono">14d</span>
                        <span class="text-[11px] text-slate-400 uppercase">Avg Sprint</span>
                    </div>
                    <div class="text-center px-4 py-3 rounded-xl bg-slate-900 border border-white/10">
                        <span class="block text-2xl font-bold text-white font-mono">99.9%</span>
                        <span class="text-[11px] text-slate-400 uppercase">Uptime SLA</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
```

- [ ] **Step 4: Run test to verify it passes**

Run: `php artisan test --filter=DesignEngineBentoGridTest`
Expected: PASS

- [ ] **Step 5: Commit**

```bash
git add resources/views/frontend/pages/home.blade.php tests/Feature/DesignEngineBentoGridTest.php
git commit -m "feat(bento): implement authentic DesignEngine 12-col bento grid section"
```

---

### Task 5: Accelerate Numbered Service List Section (`home.blade.php`)

**Files:**
- Modify: `resources/views/frontend/pages/home.blade.php`
- Test: `tests/Feature/AccelerateServicesSectionTest.php`

**Interfaces:**
- Consumes: `.services-wrapper-1`, `.service-box`, `.count > .number`, `.service-list`
- Produces: Authentic Accelerate 3-column service list with numbered indices `(01)` through `(04)`

- [ ] **Step 1: Write the failing test**

```php
<?php

namespace Tests\Feature;

use Tests\TestCase;

class AccelerateServicesSectionTest extends TestCase
{
    public function test_services_section_renders_authentic_Accelerate_numbered_structure(): void
    {
        $response = $this->get(route('home'));
        $response->assertStatus(200);

        // Verify authentic Accelerate service list classes
        $response->assertSee('services-wrapper-1', false);
        $response->assertSee('service-box', false);

        // Verify numbered indices (01) to (04)
        $response->assertSee('(01)');
        $response->assertSee('(02)');
        $response->assertSee('(03)');
        $response->assertSee('(04)');

        // Verify service list sub-items
        $response->assertSee('service-list', false);
    }
}
```

- [ ] **Step 2: Run test to verify it fails**

Run: `php artisan test --filter=AccelerateServicesSectionTest`
Expected: FAIL with missing `services-wrapper-1` or `(01)`

- [ ] **Step 3: Write minimal implementation**

Port Accelerate lines 500–580 into `resources/views/frontend/pages/home.blade.php`:

```blade
{{-- Accelerate Numbered Service List Section --}}
<section class="service-area py-24 relative">
    <div class="max-w-[1240px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="section-header mb-16 flex flex-col md:flex-row md:items-end justify-between gap-6">
            <div>
                <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-mono uppercase tracking-widest bg-teal-500/10 text-teal-400 border border-teal-500/20 mb-4">
                    Core Capabilities
                </span>
                <h2 class="text-4xl sm:text-5xl font-bold tracking-tight text-white font-instrumentsans">
                    Complex Proficiency
                </h2>
            </div>
            <p class="text-slate-400 text-sm sm:text-base max-w-md">
                End-to-end technical execution across modern web platforms, mobile architecture, cloud infrastructure, and product strategy.
            </p>
        </div>

        <div class="services-wrapper-box">
            <div class="services-wrapper-1">
                {{-- Service 01 --}}
                <div class="service-box">
                    <div class="count">
                        <span class="number">(01)</span>
                    </div>
                    <div class="content">
                        <h3 class="title">
                            <a href="{{ route('services.index') }}" class="hover:text-teal-400 transition-colors">
                                Full-Stack Web Development
                            </a>
                        </h3>
                        <ul class="service-list">
                            <li><a href="{{ route('services.index') }}" class="hover:text-white transition-colors">Laravel 12 Architecture</a></li>
                            <li><a href="{{ route('services.index') }}" class="hover:text-white transition-colors">React & Vue SPAs</a></li>
                            <li><a href="{{ route('services.index') }}" class="hover:text-white transition-colors">High-Throughput REST & GraphQL APIs</a></li>
                            <li><a href="{{ route('services.index') }}" class="hover:text-white transition-colors">Database Optimization</a></li>
                        </ul>
                    </div>
                    <div class="thumb">
                        <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=600&auto=format&fit=crop&q=80" alt="Full-Stack Web Development">
                    </div>
                </div>

                {{-- Service 02 --}}
                <div class="service-box">
                    <div class="count">
                        <span class="number">(02)</span>
                    </div>
                    <div class="content">
                        <h3 class="title">
                            <a href="{{ route('services.index') }}" class="hover:text-teal-400 transition-colors">
                                Mobile Application Engineering
                            </a>
                        </h3>
                        <ul class="service-list">
                            <li><a href="{{ route('services.index') }}" class="hover:text-white transition-colors">Flutter Cross-Platform</a></li>
                            <li><a href="{{ route('services.index') }}" class="hover:text-white transition-colors">React Native Apps</a></li>
                            <li><a href="{{ route('services.index') }}" class="hover:text-white transition-colors">Offline-First Synchronization</a></li>
                            <li><a href="{{ route('services.index') }}" class="hover:text-white transition-colors">App Store Deployment</a></li>
                        </ul>
                    </div>
                    <div class="thumb">
                        <img src="https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?w=600&auto=format&fit=crop&q=80" alt="Mobile Application Engineering">
                    </div>
                </div>

                {{-- Service 03 --}}
                <div class="service-box">
                    <div class="count">
                        <span class="number">(03)</span>
                    </div>
                    <div class="content">
                        <h3 class="title">
                            <a href="{{ route('services.index') }}" class="hover:text-teal-400 transition-colors">
                                Product Design & UI/UX Systems
                            </a>
                        </h3>
                        <ul class="service-list">
                            <li><a href="{{ route('services.index') }}" class="hover:text-white transition-colors">Design Systems & Tokens</a></li>
                            <li><a href="{{ route('services.index') }}" class="hover:text-white transition-colors">Interactive Prototyping</a></li>
                            <li><a href="{{ route('services.index') }}" class="hover:text-white transition-colors">Usability Testing</a></li>
                            <li><a href="{{ route('services.index') }}" class="hover:text-white transition-colors">Conversion Rate Optimization</a></li>
                        </ul>
                    </div>
                    <div class="thumb">
                        <img src="https://images.unsplash.com/photo-1507238691740-187a5b1d37b8?w=600&auto=format&fit=crop&q=80" alt="Product Design & UI/UX Systems">
                    </div>
                </div>

                {{-- Service 04 --}}
                <div class="service-box">
                    <div class="count">
                        <span class="number">(04)</span>
                    </div>
                    <div class="content">
                        <h3 class="title">
                            <a href="{{ route('services.index') }}" class="hover:text-teal-400 transition-colors">
                                Cloud Architecture & DevOps
                            </a>
                        </h3>
                        <ul class="service-list">
                            <li><a href="{{ route('services.index') }}" class="hover:text-white transition-colors">Docker & Kubernetes</a></li>
                            <li><a href="{{ route('services.index') }}" class="hover:text-white transition-colors">CI/CD Automation Pipelines</a></li>
                            <li><a href="{{ route('services.index') }}" class="hover:text-white transition-colors">AWS & GCP Infrastructure</a></li>
                            <li><a href="{{ route('services.index') }}" class="hover:text-white transition-colors">Zero-Downtime Deployments</a></li>
                        </ul>
                    </div>
                    <div class="thumb">
                        <img src="https://images.unsplash.com/photo-1451187580459-43490279c0fa?w=600&auto=format&fit=crop&q=80" alt="Cloud Architecture & DevOps">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
```

- [ ] **Step 4: Run test to verify it passes**

Run: `php artisan test --filter=AccelerateServicesSectionTest`
Expected: PASS

- [ ] **Step 5: Commit**

```bash
git add resources/views/frontend/pages/home.blade.php tests/Feature/AccelerateServicesSectionTest.php
git commit -m "feat(services): implement authentic Accelerate numbered service list section"
```

---

### Task 6: Accelerate Featured Work Grid Section (`home.blade.php`)

**Files:**
- Modify: `resources/views/frontend/pages/home.blade.php`
- Test: `tests/Feature/AcceleratePortfolioSectionTest.php`

**Interfaces:**
- Consumes: `.works-wrapper-1`, `.work-box`, `.thumb > .image.scale`, `.meta`
- Produces: Authentic Accelerate 2-column portfolio grid with hover zoom and tag pills

- [ ] **Step 1: Write the failing test**

```php
<?php

namespace Tests\Feature;

use Tests\TestCase;

class AcceleratePortfolioSectionTest extends TestCase
{
    public function test_portfolio_section_renders_authentic_Accelerate_work_boxes(): void
    {
        $response = $this->get(route('home'));
        $response->assertStatus(200);

        // Verify authentic Accelerate work-box classes
        $response->assertSee('works-wrapper-1', false);
        $response->assertSee('work-box', false);
        $response->assertSee('image scale', false);
        $response->assertSee('meta', false);

        // Verify button
        $response->assertSee('View All Work');
    }
}
```

- [ ] **Step 2: Run test to verify it fails**

Run: `php artisan test --filter=AcceleratePortfolioSectionTest`
Expected: FAIL with missing `works-wrapper-1` or `work-box`

- [ ] **Step 3: Write minimal implementation**

Port Accelerate lines 370–480 into `resources/views/frontend/pages/home.blade.php`:

```blade
{{-- Accelerate Featured Work Grid Section --}}
<section class="work-area py-24 border-t border-white/5 relative">
    <div class="max-w-[1240px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="section-header mb-14 flex items-end justify-between">
            <div>
                <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-mono uppercase tracking-widest bg-teal-500/10 text-teal-400 border border-teal-500/20 mb-4">
                    Case Studies
                </span>
                <h2 class="text-4xl sm:text-5xl font-bold tracking-tight text-white font-instrumentsans">
                    Featured Work
                </h2>
            </div>
            <div class="hidden sm:block">
                <span class="text-2xl font-mono text-slate-500">(04)</span>
            </div>
        </div>

        <div class="works-wrapper-box">
            <div class="works-wrapper-1">
                {{-- Work Box 1 --}}
                <div class="work-box group">
                    <div class="thumb">
                        <div class="image scale">
                            <a href="{{ route('portfolio.index') }}">
                                <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800&auto=format&fit=crop&q=80" alt="Fintech Intelligence Engine">
                            </a>
                        </div>
                    </div>
                    <div class="content">
                        <h3 class="title">
                            <a href="{{ route('portfolio.index') }}" class="text-white hover:text-teal-400 transition-colors">
                                Fintech Intelligence Engine
                            </a>
                        </h3>
                        <div class="meta">
                            <span class="tag">Laravel & Vue</span>
                            <span class="date">2025</span>
                        </div>
                    </div>
                </div>

                {{-- Work Box 2 --}}
                <div class="work-box group">
                    <div class="thumb">
                        <div class="image scale">
                            <a href="{{ route('portfolio.index') }}">
                                <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=800&auto=format&fit=crop&q=80" alt="Telehealth Analytics Portal">
                            </a>
                        </div>
                    </div>
                    <div class="content">
                        <h3 class="title">
                            <a href="{{ route('portfolio.index') }}" class="text-white hover:text-teal-400 transition-colors">
                                Telehealth Analytics Portal
                            </a>
                        </h3>
                        <div class="meta">
                            <span class="tag">Healthcare</span>
                            <span class="date">2025</span>
                        </div>
                    </div>
                </div>

                {{-- Work Box 3 --}}
                <div class="work-box group">
                    <div class="thumb">
                        <div class="image scale">
                            <a href="{{ route('portfolio.index') }}">
                                <img src="https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?w=800&auto=format&fit=crop&q=80" alt="Cybersecurity Threat Map">
                            </a>
                        </div>
                    </div>
                    <div class="content">
                        <h3 class="title">
                            <a href="{{ route('portfolio.index') }}" class="text-white hover:text-teal-400 transition-colors">
                                Cybersecurity Threat Map
                            </a>
                        </h3>
                        <div class="meta">
                            <span class="tag">Real-Time Data</span>
                            <span class="date">2025</span>
                        </div>
                    </div>
                </div>

                {{-- Work Box 4 --}}
                <div class="work-box group">
                    <div class="thumb">
                        <div class="image scale">
                            <a href="{{ route('portfolio.index') }}">
                                <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?w=800&auto=format&fit=crop&q=80" alt="Enterprise Logistics Suite">
                            </a>
                        </div>
                    </div>
                    <div class="content">
                        <h3 class="title">
                            <a href="{{ route('portfolio.index') }}" class="text-white hover:text-teal-400 transition-colors">
                                Enterprise Logistics Suite
                            </a>
                        </h3>
                        <div class="meta">
                            <span class="tag">Cloud Architecture</span>
                            <span class="date">2025</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-14 text-center">
            <a href="{{ route('portfolio.index') }}" class="rr-btn btn-border">
                <span class="btn-wrap">
                    <span class="text-one">View All Work</span>
                    <span class="text-two">View All Work</span>
                </span>
            </a>
        </div>
    </div>
</section>
```

- [ ] **Step 4: Run test to verify it passes**

Run: `php artisan test --filter=AcceleratePortfolioSectionTest`
Expected: PASS

- [ ] **Step 5: Commit**

```bash
git add resources/views/frontend/pages/home.blade.php tests/Feature/AcceleratePortfolioSectionTest.php
git commit -m "feat(portfolio): port authentic Accelerate featured work grid section"
```

---

### Task 7: Full Suite Verification & Asset Build

**Files:**
- Modify: `resources/views/frontend/layouts/app.blade.php` (verify global canvas styling and font imports)
- Test: Full PHPUnit test suite

**Interfaces:**
- Consumes: All views, components, and CSS files
- Produces: Clean asset build and 100% passing test suite

- [ ] **Step 1: Run complete test suite**

Run: `php artisan test`
Expected: All tests pass with 0 failures and 0 deprecations.

- [ ] **Step 2: Run production asset build**

Run: `npm run build`
Expected: Vite build succeeds with `manifest.json` and compiled assets.

- [ ] **Step 3: Clear all Laravel caches**

Run: `php artisan optimize:clear`
Expected: Cache cleared successfully.

- [ ] **Step 4: Commit**

```bash
git add .
git commit -m "chore(release): complete authentic Accelerate and DesignEngine visual port"
```
