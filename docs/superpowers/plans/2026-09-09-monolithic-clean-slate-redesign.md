# Monolithic Clean-Slate Redesign Implementation Plan

> **For agentic workers:**  
**Goal:** Completely rebuild all public Blade templates and CSS styles from scratch using a 70% Redox + 30% NextSaaS design system aligned to the Accelerate Lab Electric Teal brand palette, 100% dynamic CMS data integration, and zero legacy tokens.  
**Architecture:** Native Blade Component Architecture with Tailwind CSS v4, custom kinetic motion engine, Alpine.js interactive widgets, and pre-hydration theme management.  
**Tech Stack:** Laravel 12.x, Blade, Tailwind CSS v4 (@tailwindcss/vite), Alpine.js, PHPUnit 11.

---

## Global Constraints

- **Strict TDD:** Red -> Green -> Refactor cycle for every task.
- **Zero Legacy Tokens:** Absolute prohibition of legacy template colors (`#d0e7e4`, `#0b1615`, `#4e9790`, `#2d4544`, `#0d1817`, `text-slate-dark`, `border-border-dark`, etc.).
- **Authentic Brand:** Primary brand accent is Accelerate Lab Electric Teal (`#00BFA5`). Logo mark is `Accelerate` + `<span class="text-[#00BFA5] font-mono">/&gt;</span>` + `Lab`.
- **Database Schema Fidelity:** Direct mapping to actual database columns (`services` table has NO `is_active` column).
- **Theme Awareness:** Flawless dark mode (`#090D16`) and light mode (`#F8FAFC`/`#FFFFFF`) contrast adhering to WCAG 2.2 AA.

---

### Task 1: Clean-Slate Design Engine & Style Foundation

**Files:**
- Create: `resources/css/design-system.css`
- Modify: `resources/css/app.css`
- Test: `tests/Feature/MonolithicDesignEngineTest.php`

**Interfaces:**
- Produces: CSS utility tokens for `.rr-btn`, `.badge-spin`, `.dark`, and Accelerate Lab color variables.

- [ ] **Step 1: Write the failing test**
Create `tests/Feature/MonolithicDesignEngineTest.php` testing the presence of design system classes and pre-hydration tokens.

```php
<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MonolithicDesignEngineTest extends TestCase
{
    use RefreshDatabase;

    public function test_layout_pre_hydration_script_and_theme_engine(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee("localStorage.getItem('theme')", false);
        $response->assertSee('theme-toggle-btn');
    }
}
```

- [ ] **Step 2: Run test to verify failure**
Run: `php vendor/bin/phpunit tests/Feature/MonolithicDesignEngineTest.php --filter=test_layout_pre_hydration_script_and_theme_engine`

- [ ] **Step 3: Write minimal implementation**
Implement `resources/css/design-system.css` with clean kinetic button CSS and Accelerate Lab teal palette, and import it into `resources/css/app.css`.

- [ ] **Step 4: Run test to verify pass**
Run: `php vendor/bin/phpunit tests/Feature/MonolithicDesignEngineTest.php --filter=test_layout_pre_hydration_script_and_theme_engine`
Expected: PASS

- [ ] **Step 5: Commit**
`git add resources/css/ tests/Feature/MonolithicDesignEngineTest.php`
`git commit -m "feat(design-system): implement clean-slate 70/30 kinetic engine foundation"`

---

### Task 2: Global Shell Reconstruction (`layout`, `header`, `footer`)

**Files:**
- Modify: `resources/views/frontend/components/layout.blade.php`
- Modify: `resources/views/frontend/components/header.blade.php`
- Modify: `resources/views/frontend/components/footer.blade.php`
- Test: `tests/Feature/MonolithicDesignEngineTest.php`

**Interfaces:**
- Consumes: Design system CSS tokens from Task 1.
- Produces: Global shell with floating island capsule navbar, anti-flash `<head>`, dynamic footer, and modal slots.

- [ ] **Step 1: Write the failing test**
Add test asserting floating capsule navbar with `rounded-full`, official `Accelerate/>Lab` branding, and footer legal entity `PT Akselerasi Digital Mandiri`.

- [ ] **Step 2: Run test to verify failure**
Run: `php vendor/bin/phpunit tests/Feature/MonolithicDesignEngineTest.php --filter=test_floating_capsule_navbar_and_authentic_branding`

- [ ] **Step 3: Write minimal implementation**
Rewrite `layout.blade.php`, `header.blade.php`, and `footer.blade.php` from scratch with 70% Redox capsule structure and 30% NextSaaS clean containers.

- [ ] **Step 4: Run test to verify pass**
Run: `php vendor/bin/phpunit tests/Feature/MonolithicDesignEngineTest.php --filter=test_floating_capsule_navbar_and_authentic_branding`
Expected: PASS

- [ ] **Step 5: Commit**
`git add resources/views/frontend/components/ tests/Feature/MonolithicDesignEngineTest.php`
`git commit -m "feat(shell): reconstruct global layout, floating capsule navbar and footer"`

---

### Task 3: Reconstructing Homepage (`home.blade.php`) & Dynamic CMS Integration

**Files:**
- Modify: `resources/views/frontend/pages/home.blade.php`
- Modify: `app/Http/Controllers/Frontend/PageController.php`
- Test: `tests/Feature/MonolithicDesignEngineTest.php`

**Interfaces:**
- Consumes: `Project`, `Service`, `HomepageStat`, `Testimonial` models.
- Produces: 70/30 Homepage with Hero, Floating Metrics Bar, Bento Capabilities, Architecture Switcher, Selected Work, and Testimonials.

- [ ] **Step 1: Write the failing test**
Add test asserting dynamic database records render inside homepage bento cards and hero metrics bar.

- [ ] **Step 2: Run test to verify failure**
Run: `php vendor/bin/phpunit tests/Feature/MonolithicDesignEngineTest.php --filter=test_homepage_renders_dynamic_cms_data_into_70_30_bento_cards`

- [ ] **Step 3: Write minimal implementation**
Rewrite `home.blade.php` from scratch with 70% Redox hero display, NextSaaS bento capabilities grid, and interactive architecture switcher.

- [ ] **Step 4: Run test to verify pass**
Run: `php vendor/bin/phpunit tests/Feature/MonolithicDesignEngineTest.php --filter=test_homepage_renders_dynamic_cms_data_into_70_30_bento_cards`
Expected: PASS

- [ ] **Step 5: Commit**
`git add resources/views/frontend/pages/home.blade.php app/Http/Controllers/Frontend/PageController.php tests/Feature/MonolithicDesignEngineTest.php`
`git commit -m "feat(homepage): reconstruct 70/30 dynamic homepage with bento grid and metrics"`

---

### Task 4: Reconstructing Services Overview & Dedicated Service Sub-pages

**Files:**
- Modify: `resources/views/frontend/pages/services.blade.php`
- Modify: `resources/views/frontend/pages/service.blade.php`
- Modify: `resources/views/frontend/pages/cloud-architecture.blade.php`
- Modify: `resources/views/frontend/pages/mobile-app-development.blade.php`
- Modify: `resources/views/frontend/pages/ui-ux-design.blade.php`
- Modify: `resources/views/frontend/pages/web-application-development.blade.php`
- Test: `tests/Feature/MonolithicDesignEngineTest.php`

**Interfaces:**
- Consumes: `$services`, `$techStack`, dedicated service models.
- Produces: Service overview with Alpine category tabs, process stepper, and NextSaaS blueprint dedicated service pages.

- [ ] **Step 1: Write the failing test**
Add test asserting `/services` and custom service URLs render with HTTP 200 and NextSaaS blueprint sections.

- [ ] **Step 2: Run test to verify failure**
Run: `php vendor/bin/phpunit tests/Feature/MonolithicDesignEngineTest.php --filter=test_services_overview_and_dedicated_service_pages_render_blueprint`

- [ ] **Step 3: Write minimal implementation**
Rewrite `services.blade.php`, `service.blade.php`, and the 4 dedicated sub-pages from scratch.

- [ ] **Step 4: Run test to verify pass**
Run: `php vendor/bin/phpunit tests/Feature/MonolithicDesignEngineTest.php --filter=test_services_overview_and_dedicated_service_pages_render_blueprint`
Expected: PASS

- [ ] **Step 5: Commit**
`git add resources/views/frontend/pages/service* resources/views/frontend/pages/cloud* resources/views/frontend/pages/mobile* resources/views/frontend/pages/ui* resources/views/frontend/pages/web* tests/Feature/MonolithicDesignEngineTest.php`
`git commit -m "feat(services): reconstruct service overview and dedicated blueprint subpages"`

---

### Task 5: Reconstructing Case Studies & Project Detail

**Files:**
- Modify: `resources/views/frontend/pages/case-studies.blade.php`
- Modify: `resources/views/frontend/pages/project.blade.php`
- Test: `tests/Feature/MonolithicDesignEngineTest.php`

**Interfaces:**
- Consumes: `Project` model with categories.
- Produces: Redox-inspired asymmetric portfolio grid and NextSaaS challenge/solution project detail page.

- [ ] **Step 1: Write the failing test**
Add test asserting `/case-studies` and `/case-studies/{slug}` render case studies and project metrics.

- [ ] **Step 2: Run test to verify failure**
Run: `php vendor/bin/phpunit tests/Feature/MonolithicDesignEngineTest.php --filter=test_case_studies_and_project_detail_render`

- [ ] **Step 3: Write minimal implementation**
Rewrite `case-studies.blade.php` and `project.blade.php` from scratch.

- [ ] **Step 4: Run test to verify pass**
Run: `php vendor/bin/phpunit tests/Feature/MonolithicDesignEngineTest.php --filter=test_case_studies_and_project_detail_render`
Expected: PASS

- [ ] **Step 5: Commit**
`git add resources/views/frontend/pages/case-studies.blade.php resources/views/frontend/pages/project.blade.php tests/Feature/MonolithicDesignEngineTest.php`
`git commit -m "feat(portfolio): reconstruct case studies portfolio and project detail"`

---

### Task 6: Reconstructing About Us, Careers, Contact Us & 404

**Files:**
- Modify: `resources/views/frontend/pages/about.blade.php`
- Modify: `resources/views/frontend/pages/careers.blade.php`
- Modify: `resources/views/frontend/pages/contact.blade.php`
- Modify: `resources/views/errors/404.blade.php`
- Test: `tests/Feature/MonolithicDesignEngineTest.php`

**Interfaces:**
- Consumes: `TeamMember`, `CompanyMilestone`, `CoreValue`, `JobPosting`.
- Produces: About page with Nova Triansyah Azis leadership card, Careers page with job vacancy board, Contact split page, and high-impact 404.

- [ ] **Step 1: Write the failing test**
Add test asserting team members, milestones, careers vacancies, contact form, and 404 render properly.

- [ ] **Step 2: Run test to verify failure**
Run: `php vendor/bin/phpunit tests/Feature/MonolithicDesignEngineTest.php --filter=test_about_careers_contact_and_404_render`

- [ ] **Step 3: Write minimal implementation**
Rewrite `about.blade.php`, `careers.blade.php`, `contact.blade.php`, and `errors/404.blade.php` from scratch.

- [ ] **Step 4: Run test to verify pass**
Run: `php vendor/bin/phpunit tests/Feature/MonolithicDesignEngineTest.php --filter=test_about_careers_contact_and_404_render`
Expected: PASS

- [ ] **Step 5: Commit**
`git add resources/views/frontend/pages/about.blade.php resources/views/frontend/pages/careers.blade.php resources/views/frontend/pages/contact.blade.php resources/views/errors/404.blade.php tests/Feature/MonolithicDesignEngineTest.php`
`git commit -m "feat(pages): reconstruct about, careers, contact and 404 pages"`

---

### Task 7: Full-Site Strict Negative Assertion & Vite Production Build

**Files:**
- Modify: `tests/Feature/MonolithicDesignEngineTest.php`
- Assets: `npm run build`

**Interfaces:**
- Validates: Total absence of 17 legacy template tokens across all 15 routes, zero unhandled errors, and clean asset bundle.

- [ ] **Step 1: Add negative assertions across all public routes**
Add `test_strict_zero_legacy_tokens_and_perfect_theme_awareness` checking all routes.

- [ ] **Step 2: Run test to verify pass**
Run: `php vendor/bin/phpunit tests/Feature/MonolithicDesignEngineTest.php`
Expected: PASS (All assertions pass)

- [ ] **Step 3: Compile production assets**
Run: `npm run build`
Expected: SUCCESS with zero CSS errors

- [ ] **Step 4: Run complete application test suite**
Run: `php vendor/bin/phpunit`
Expected: 100% PASS

- [ ] **Step 5: Commit and synchronize branches**
`git add .`
`git commit -m "chore(release): complete 70/30 monolithic clean-slate redesign across entire application"`
