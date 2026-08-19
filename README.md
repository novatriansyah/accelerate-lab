# Accelerate Lab — Engineering Velocity

Accelerate Lab is a modern digital technology agency delivering high-performance, enterprise-grade digital products at startup velocity. Operating under the tagline **"Engineering Velocity,"** the agency utilizes a clean, scalable monolithic architecture built with Laravel 12, Tailwind CSS v4, Filament v3, and Alpine.js.

---

## 🚀 Tech Stack

- **Backend Framework:** Laravel 12.x (PHP 8.3+)
- **Frontend & Templating:** Blade components, Alpine.js, Tailwind CSS v4
- **Asset Bundler:** Vite 7 with `@tailwindcss/vite`
- **CMS & Admin Panel:** Filament v3
- **Iconography:** 100% Inline SVG via `<x-app-icon>` (0 blocking font stylesheets)
- **Testing Framework:** PHPUnit 11 with Laravel Testing Suite
- **CI/CD:** GitHub Actions (Automated Test Gates & Zero-Downtime Hostinger Deployment)

---

## 🧪 Strict Test-Driven Development (TDD) Standard

This repository enforces **Strict Test-Driven Development (TDD)** across all backend logic, API endpoints, database models, and **frontend UI/UX engineering**.

Every feature, enhancement, or bug fix must follow the 3-step cycle:
1. **RED:** Write a failing unit, feature, or UI/UX test first. Confirm the test fails.
2. **GREEN:** Write the minimal implementation code to make the test pass.
3. **REFACTOR:** Polish, clean, and optimize while maintaining 100% test pass rate.

### Full-Stack TDD Guidelines:
- **Backend Models & Logic:** Test accessors, enum casts, notification delivery channels, mailers, and query scopes.
- **Frontend & UI/UX:** Test semantic HTML (`<h1>` hierarchy, `<main>`, `<header>`, `<footer>`), accessibility (`aria-label`, image `alt`), dark mode tokens, and inline SVG iconography.
- **CI/CD Quality Gate:** All pull requests and deployments to production are automatically blocked if any test fails.

---

## 🛠️ Local Development Setup

### 1. Prerequisites
- PHP 8.3+ with `pdo_mysql`, `pdo_sqlite`, `mbstring`, `xml`, `ctype`, `iconv`, `curl` extensions
- Composer 2.x
- Node.js 20+ & NPM

### 2. Installation
```bash
# Clone the repository
git clone https://github.com/novatriansyah/accelerate-lab.git
cd accelerate-lab

# Install PHP dependencies
composer install

# Install Node dependencies
npm install

# Setup environment
cp .env.example .env
php artisan key:generate

# Run database migrations and seeders
php artisan migrate --seed

# Create storage symlink
php artisan storage:link
```

### 3. Running the Application
```bash
# Terminal 1: Run Vite dev server
npm run dev

# Terminal 2: Run Laravel local server
php artisan serve
```

---

## 🧪 Running Automated Tests

Run the complete test suite:
```bash
php artisan test
```

Run specific test suites:
```bash
# Run unit tests
php artisan test --testsuite=Unit

# Run feature & UI/UX tests
php artisan test --testsuite=Feature

# Run a specific test class or method
php artisan test --filter=UiUxDesignSystemTest
php artisan test --filter=ContactFormTest
```

---

## 🚢 CI/CD & Deployment

- **Development Pipeline (`.github/workflows/development.yml`):** Runs automated test suite and asset builds on all pushes and pull requests to `development` and `master`.
- **Production Pipeline (`.github/workflows/deploy.yml`):** Enforces automated test verification as a strict deployment gate prior to building production assets and performing atomic, zero-downtime SSH/rsync releases to Hostinger.

---

## 📄 License

Proprietary — PT Akselerasi Digital Mandiri. All rights reserved.
