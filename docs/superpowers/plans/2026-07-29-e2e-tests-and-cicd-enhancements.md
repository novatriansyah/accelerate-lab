# E2E Test Suite & CI/CD Optimization Implementation Plan

> **For agentic workers:**
> **Goal:** Create complete E2E test coverage across all domain models/controllers and optimize development & master CI/CD pipelines to perfection.
> **Architecture:** Laravel 11 PHPUnit test suite with Model Factories + GitHub Actions with Composer & NPM caching, atomic release deployment, and error handling.
> **Tech Stack:** PHP 8.3, Laravel 11, PHPUnit 11, GitHub Actions, Hostinger SSH/rsync.

## Global Constraints

- Complete 100% pass rate for all unit and feature tests.
- Zero breaking changes to existing model relationships or routes.
- Full coverage for Blog, Projects, Services, Careers, About, Sitemap, and Robots endpoints.
- Optimize CI/CD build speeds using GitHub Actions caching.

---

### Task 1: Model Factories Creation

**Files:**
- Create: `database/factories/ArticleFactory.php`
- Create: `database/factories/CategoryFactory.php`
- Create: `database/factories/JobPostingFactory.php`
- Create: `database/factories/ProjectFactory.php`
- Create: `database/factories/ServiceFactory.php`

**Interfaces:**
- Consumes: Eloquent Models (`Article`, `Category`, `JobPosting`, `Project`, `Service`, `User`)
- Produces: Database factory definitions for testing.

- [ ] **Step 1: Create CategoryFactory & ArticleFactory**
  Define factory attributes for Category and Article (slug, title, content, published_at, is_featured).

- [ ] **Step 2: Create JobPostingFactory & ServiceFactory**
  Define factory attributes for JobPosting (is_active) and Service (slug, has_custom_page).

- [ ] **Step 3: Create ProjectFactory**
  Define factory attributes for Project (slug, title, industry, is_featured, technology_tags, stats).

---

### Task 2: Comprehensive E2E Feature Test Suite

**Files:**
- Create: `tests/Feature/ArticleTest.php`
- Create: `tests/Feature/ProjectTest.php`
- Create: `tests/Feature/ServiceTest.php`
- Create: `tests/Feature/CareerTest.php`
- Create: `tests/Feature/SitemapAndRobotsTest.php`

**Interfaces:**
- Consumes: Factories & HTTP Controllers
- Produces: PHPUnit feature tests asserting HTTP status, view rendering, filtering, and XML structure.

- [ ] **Step 1: Create ArticleTest.php**
  Test blog index listing, featured article fallback, draft/future article 404 protection, and article detail view.

- [ ] **Step 2: Create ProjectTest.php**
  Test case studies list, industry filter query params, featured project display, and project detail view.

- [ ] **Step 3: Create ServiceTest.php**
  Test services overview, technology stack aggregation, generic service detail view, and custom service blade view routing.

- [ ] **Step 4: Create CareerTest.php**
  Test active vs inactive job posting filtering on careers page.

- [ ] **Step 5: Create SitemapAndRobotsTest.php**
  Test `/sitemap.xml` returns valid XML containing dynamic project/article URLs, and `/robots.txt` returns text plain output.

---

### Task 3: Development CI/CD Pipeline Perfection

**Files:**
- Modify: `.github/workflows/development.yml`

**Interfaces:**
- Consumes: GitHub Actions environment
- Produces: High-speed, robust CI workflow with Composer & NPM caching, lint/build verification, and test execution.

- [ ] **Step 1: Enhance development.yml**
  Add `cache: 'composer'` to setup-php and `cache: 'npm'` to setup-node. Ensure Vite build and PHP test steps execute cleanly.

---

### Task 4: Master Zero-Downtime Deployment Pipeline Perfection

**Files:**
- Modify: `.github/workflows/deploy.yml`

**Interfaces:**
- Consumes: GitHub Actions secrets & Hostinger SSH
- Produces: Atomic release switching, strict `set -e` error handling, asset caching, permissions, and 5-release retention limit.

- [ ] **Step 1: Enhance deploy.yml**
  Add dependency caching, strict bash error flags (`set -e`), atomic symlink creation, and release cleanup.
