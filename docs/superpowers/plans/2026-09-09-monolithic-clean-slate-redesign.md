# Monolithic Clean-Slate Redesign Implementation Plan (Strict Delete & Scratch Rebuild)

> **For agentic workers:**  
**Goal:** Delete ALL legacy frontend Blade views and legacy CSS assets first. Then reconstruct the entire site from scratch using a 70% Redox Creative Agency + 30% NextSaaS design system aligned to the Accelerate Lab Electric Teal (`#00BFA5`) palette, 100% dynamic CMS data integration, and zero legacy tokens.  
**Architecture:** Native Blade Component Architecture with Tailwind CSS v4, custom kinetic motion engine, Alpine.js interactive widgets, and pre-hydration theme management.  
**Tech Stack:** Laravel 12.x, Blade, Tailwind CSS v4 (@tailwindcss/vite), Alpine.js, PHPUnit 11.

---

## Global Constraints

- **Strict Delete First:** No patching/modifying legacy Blade templates. All files in `resources/views/frontend/pages/`, `resources/views/frontend/components/`, `resources/views/errors/404.blade.php`, and `resources/css/design-engine.css` are deleted prior to reconstruction.
- **Strict TDD:** Red -> Green -> Refactor cycle for every newly built component.
- **Zero Legacy Tokens:** Absolute prohibition of legacy template colors (`#d0e7e4`, `#0b1615`, `#4e9790`, `text-slate-dark`, `border-border-dark`, etc.).
- **Authentic Brand:** Primary brand accent is Accelerate Lab Electric Teal (`#00BFA5`). Logo mark is `Accelerate` + `<span class="text-[#00BFA5] font-mono">/&gt;</span>` + `Lab`.
- **Database Schema Fidelity:** Direct mapping to actual database columns (`services` table has NO `is_active` column).
- **Theme Awareness:** Flawless dark mode (`#090D16`) and light mode (`#F8FAFC`/`#FFFFFF`) contrast adhering to WCAG 2.2 AA.

---

### Task 0: Complete Deletion of Legacy Blades and Legacy Styles

**Files:**
- Delete: `resources/css/design-engine.css`
- Delete: All files in `resources/views/frontend/components/` (`layout.blade.php`, `header.blade.php`, `footer.blade.php`, `whatsapp-button.blade.php`)
- Delete: All files in `resources/views/frontend/pages/` (`home.blade.php`, `about.blade.php`, `services.blade.php`, `cloud-architecture.blade.php`, `mobile-app-development.blade.php`, `ui-ux-design.blade.php`, `web-application-development.blade.php`, `service.blade.php`, `case-studies.blade.php`, `project.blade.php`, `careers.blade.php`, `contact.blade.php`, `the-lab.blade.php`, `privacy-policy.blade.php`, `terms-of-service.blade.php`, `blog.blade.php`, `article.blade.php`)
- Delete: `resources/views/errors/404.blade.php`
- Modify: `resources/css/app.css` (clean slate reset)

- [ ] **Step 1: Execute complete deletion of all legacy frontend blade views and old CSS**
- [ ] **Step 2: Commit clean slate purge**
`git commit -m "chore(purge): delete all legacy blade views and styles for fresh scratch rebuild"`

---

### Task 1: Clean-Slate Design Engine & Style Foundation

**Files:**
- Create: `resources/css/design-system.css`
- Modify: `resources/css/app.css`
- Create: `tests/Feature/MonolithicDesignEngineTest.php`

**Interfaces:**
- Produces: CSS utility tokens for `.rr-btn`, `.badge-spin`, `.dark`, and Accelerate Lab color variables.

- [ ] **Step 1: Write the failing test**
Create `tests/Feature/MonolithicDesignEngineTest.php` testing layout pre-hydration script, `.rr-btn`, and CSS tokens.
- [ ] **Step 2: Run test to verify failure**
Run: `php vendor/bin/phpunit tests/Feature/MonolithicDesignEngineTest.php --filter=test_layout_pre_hydration_script_and_theme_engine`
- [ ] **Step 3: Write minimal implementation**
Implement `resources/css/design-system.css` with clean kinetic button CSS and Accelerate Lab teal palette, and import it into `resources/css/app.css`.
- [ ] **Step 4: Run test to verify pass**
Run: `php vendor/bin/phpunit tests/Feature/MonolithicDesignEngineTest.php --filter=test_layout_pre_hydration_script_and_theme_engine`
- [ ] **Step 5: Commit**
`git add resources/css/ tests/Feature/MonolithicDesignEngineTest.php`
`git commit -m "feat(design-system): implement clean-slate 70/30 kinetic engine foundation"`

---

### Task 2: Global Shell Scratch Rebuild (`layout`, `header`, `footer`)

**Files:**
- Create: `resources/views/frontend/components/layout.blade.php`
- Create: `resources/views/frontend/components/header.blade.php`
- Create: `resources/views/frontend/components/footer.blade.php`
- Create: `resources/views/frontend/components/whatsapp-button.blade.php`
- Test: `tests/Feature/MonolithicDesignEngineTest.php`

**Interfaces:**
- Consumes: Design system CSS tokens from Task 1.
- Produces: Fresh global shell with floating island capsule navbar, anti-flash `<head>`, dynamic footer, and modal slots.

- [ ] **Step 1: Write the failing test**
Add test asserting floating capsule navbar with `rounded-full`, official `Accelerate/>Lab` branding, and footer legal entity `PT Akselerasi Digital Mandiri`.
- [ ] **Step 2: Run test to verify failure**
- [ ] **Step 3: Write minimal implementation**
Build `layout.blade.php`, `header.blade.php`, and `footer.blade.php` from scratch.
- [ ] **Step 4: Run test to verify pass**
- [ ] **Step 5: Commit**
`git add resources/views/frontend/components/ tests/Feature/MonolithicDesignEngineTest.php`
`git commit -m "feat(shell): build fresh global layout, floating capsule navbar and footer from scratch"`

---

### Task 3: Homepage Scratch Rebuild (`home.blade.php`) & Dynamic CMS Integration

**Files:**
- Create: `resources/views/frontend/pages/home.blade.php`
- Test: `tests/Feature/MonolithicDesignEngineTest.php`

**Interfaces:**
- Consumes: `Project`, `Service`, `HomepageStat`, `Testimonial` models.
- Produces: 70/30 Homepage built from scratch with Hero, Floating Metrics Bar, Bento Capabilities, Architecture Switcher, Selected Work, and Testimonials.

- [ ] **Step 1: Write the failing test**
Add test asserting dynamic database records render inside homepage bento cards and hero metrics bar.
- [ ] **Step 2: Run test to verify failure**
- [ ] **Step 3: Write minimal implementation**
Build `home.blade.php` from scratch.
- [ ] **Step 4: Run test to verify pass**
- [ ] **Step 5: Commit**
`git add resources/views/frontend/pages/home.blade.php tests/Feature/MonolithicDesignEngineTest.php`
`git commit -m "feat(homepage): build fresh 70/30 dynamic homepage from scratch"`

---

### Task 4: Services Overview & Dedicated Service Sub-pages Scratch Rebuild

**Files:**
- Create: `resources/views/frontend/pages/services.blade.php`
- Create: `resources/views/frontend/pages/service.blade.php`
- Create: `resources/views/frontend/pages/cloud-architecture.blade.php`
- Create: `resources/views/frontend/pages/mobile-app-development.blade.php`
- Create: `resources/views/frontend/pages/ui-ux-design.blade.php`
- Create: `resources/views/frontend/pages/web-application-development.blade.php`
- Test: `tests/Feature/MonolithicDesignEngineTest.php`

**Interfaces:**
- Consumes: `$services`, `$techStack`, dedicated service models.
- Produces: Service overview with Alpine category tabs, process stepper, and NextSaaS blueprint dedicated service pages built from scratch.

- [ ] **Step 1: Write the failing test**
Add test asserting `/services` and custom service URLs render with HTTP 200 and NextSaaS blueprint sections.
- [ ] **Step 2: Run test to verify failure**
- [ ] **Step 3: Write minimal implementation**
Build `services.blade.php`, `service.blade.php`, and the 4 dedicated sub-pages from scratch.
- [ ] **Step 4: Run test to verify pass**
- [ ] **Step 5: Commit**
`git add resources/views/frontend/pages/service* resources/views/frontend/pages/cloud* resources/views/frontend/pages/mobile* resources/views/frontend/pages/ui* resources/views/frontend/pages/web* tests/Feature/MonolithicDesignEngineTest.php`
`git commit -m "feat(services): build fresh services overview and blueprint subpages from scratch"`

---

### Task 5: Case Studies & Project Detail Scratch Rebuild

**Files:**
- Create: `resources/views/frontend/pages/case-studies.blade.php`
- Create: `resources/views/frontend/pages/project.blade.php`
- Test: `tests/Feature/MonolithicDesignEngineTest.php`

**Interfaces:**
- Consumes: `Project` model with categories.
- Produces: Redox-inspired asymmetric portfolio grid and NextSaaS challenge/solution project detail page built from scratch.

- [ ] **Step 1: Write the failing test**
Add test asserting `/case-studies` and `/case-studies/{slug}` render case studies and project metrics.
- [ ] **Step 2: Run test to verify failure**
- [ ] **Step 3: Write minimal implementation**
Build `case-studies.blade.php` and `project.blade.php` from scratch.
- [ ] **Step 4: Run test to verify pass**
- [ ] **Step 5: Commit**
`git add resources/views/frontend/pages/case-studies.blade.php resources/views/frontend/pages/project.blade.php tests/Feature/MonolithicDesignEngineTest.php`
`git commit -m "feat(portfolio): build fresh case studies portfolio and project detail from scratch"`

---

### Task 6: About Us, Careers, Contact Us, 404 & Supporting Pages Scratch Rebuild

**Files:**
- Create: `resources/views/frontend/pages/about.blade.php`
- Create: `resources/views/frontend/pages/careers.blade.php`
- Create: `resources/views/frontend/pages/contact.blade.php`
- Create: `resources/views/errors/404.blade.php`
- Create: `resources/views/frontend/pages/the-lab.blade.php`
- Create: `resources/views/frontend/pages/privacy-policy.blade.php`
- Create: `resources/views/frontend/pages/terms-of-service.blade.php`
- Create: `resources/views/frontend/pages/blog.blade.php`
- Create: `resources/views/frontend/pages/article.blade.php`
- Test: `tests/Feature/MonolithicDesignEngineTest.php`

**Interfaces:**
- Consumes: `TeamMember`, `CompanyMilestone`, `CoreValue`, `JobPosting`, `Article`.
- Produces: Clean-slate pages built from scratch.

- [ ] **Step 1: Write the failing test**
- [ ] **Step 2: Run test to verify failure**
- [ ] **Step 3: Write minimal implementation**
Build all supporting pages from scratch.
- [ ] **Step 4: Run test to verify pass**
- [ ] **Step 5: Commit**
`git add resources/views/frontend/pages/ resources/views/errors/ tests/Feature/MonolithicDesignEngineTest.php`
`git commit -m "feat(pages): build fresh about, careers, contact, the-lab, legal, blog and 404 from scratch"`

---

### Task 7: Full-Site Strict Negative Assertion & Vite Production Build

**Files:**
- Modify: `tests/Feature/MonolithicDesignEngineTest.php`
- Assets: `npm run build`

- [ ] **Step 1: Run complete negative assertions across all public routes**
- [ ] **Step 2: Compile production assets with Vite (`npm run build`)**
- [ ] **Step 3: Run full application test suite (`php vendor/bin/phpunit`)**
- [ ] **Step 4: Commit and push both branches (`development` and `master`)**
