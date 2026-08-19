# Comprehensive Strict Test-Driven Development (TDD) Alignment Plan

> **For agentic workers:**
> **Goal:** Align Accelerate Lab to strict Test-Driven Development (TDD) across backend logic, UI/UX components/pages, CI/CD deployment pipelines, and persistent workspace AI rules.
> **Architecture:** Laravel 12 / PHPUnit 11 with comprehensive unit/feature test suites + GitHub Actions test blocking gate in CI/CD workflows + Antigravity/Agent TDD rules.
> **Tech Stack:** PHP 8.3, Laravel 12, PHPUnit 11, Tailwind CSS v4, Blade, GitHub Actions.

## Global Constraints

- Complete 100% pass rate for all unit, feature, and UI/UX tests.
- All code changes must strictly follow Red -> Green -> Refactor.
- Zero breaking changes to existing routes, models, or design components.
- CI/CD deploy pipeline MUST block deployment if tests fail.

---

### Task 1: CI/CD Pipelines Alignment (Strict Automated Test Gates)

**Files:**
- Modify: `.github/workflows/deploy.yml`
- Modify: `.github/workflows/development.yml`

- [ ] **Step 1: Update deploy.yml**
  Add automated test runner step with in-memory SQLite and dev dependencies before running production asset build or rsync release.
- [ ] **Step 2: Update development.yml**
  Ensure CI runs on development branch pushes and PRs, executing `php artisan test`.

---

### Task 2: Workspace Rules & AI Agent Guardrails

**Files:**
- Create: `.agents/rules/strict-tdd.md`
- Create: `AGENTS.md`
- Create: `GEMINI.md`

- [ ] **Step 1: Create .agents/rules/strict-tdd.md**
  Codify strict Red -> Green -> Refactor lifecycle, unit/feature test requirements, and UI/UX testing rules (semantic HTML, a11y/ARIA, 100% inline SVG icon component `<x-app-icon>`, dark mode tokens).
- [ ] **Step 2: Create AGENTS.md & GEMINI.md**
  Link workspace rules, tech stack boundaries, and strict TDD mandate for all future AI agents and contributors.

---

### Task 3: Project Documentation Alignment

**Files:**
- Modify: `PRD.md`
- Modify: `README.md`

- [ ] **Step 1: Update PRD.md**
  Add Section 5.4 "Engineering & Quality Standards (Strict TDD Adoption)" with non-negotiable full-stack TDD standards and 100% CI pass requirement.
- [ ] **Step 2: Update README.md**
  Overhaul generic Laravel README with complete Accelerate Lab documentation, architecture, environment setup, database seeder, and TDD commands.

---

### Task 4: Comprehensive Test Suite Expansion (Practicing Strict TDD)

**Files:**
- Create: `tests/Unit/LeadTest.php`
- Create: `tests/Unit/ProjectTest.php`
- Create: `tests/Unit/LeadNotificationTest.php`
- Create: `tests/Feature/UiUxDesignSystemTest.php`

- [ ] **Step 1: Write and pass LeadTest.php**
  Test Lead model accessors (`title`, `description`), `LeadStatus` enum casting, and notes relationship.
- [ ] **Step 2: Write and pass ProjectTest.php**
  Test Project accessors (`plain_challenge`, `plain_solution`), array casts (`technology_tags`, `stats`, `gallery`), and boolean flags.
- [ ] **Step 3: Write and pass LeadNotificationTest.php**
  Test notification channels (`mail`, `whatsapp`) and mail delivery representation.
- [ ] **Step 4: Write and pass UiUxDesignSystemTest.php**
  Test semantic HTML (`<h1>` uniqueness, `<main>`, `<header>`, `<footer>`), `aria-label` and `alt` attributes, dark mode tokens, and inline SVG iconography across public views.
