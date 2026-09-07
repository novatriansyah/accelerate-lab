# Commercial Repositioning and UI/UX Overhaul Design Specification

**Document:** `docs/superpowers/specs/2026-09-07-commercial-and-uiux-overhaul-design.md`  
**Date:** 2026-09-07  
**Status:** Approved by User  
**Target:** Accelerate Lab (`accelerate-lab`)  

---

## 1. Executive Summary & Problem Diagnosis

Accelerate Lab possesses clean monolithic Laravel 12 architecture, Tailwind CSS v4 styling, and comprehensive automated test coverage. However, the website has failed to attract paying clients due to four fundamental commercial and UI/UX barriers discovered during production audit:

1. **Credibility & Social Proof Void**: The production database contains zero testimonials and only two projects. One was explicitly labeled as a "pro-bono project" and the other as an "internal product" with a self-authored testimonial.
2. **Developer-to-Developer Communication**: The hero visual displays a mock `deploy.sh` terminal and code snippets that alienate non-technical business decision-makers.
3. **Offer Disconnect**: The website previously advertised generic agency buzzwords ("Velocity", "Resilient Digital Assets") while omitting practical operational solutions.
4. **UI/UX Anti-Patterns**: The presence of generic step labels ("Step 1 / Step 2 / Step 3"), dead visual decorations (empty colored pills), AI stock photography of foreign corporate offices, and mobile touch targets below accessibility standards.

---

## 2. Hard Constraints & Business Rules

* **Target Audience**: Indonesian SMEs and Growing Businesses (*UKM dan Bisnis Lokal Berkembang*) requiring custom internal platforms, operational dashboards, inventory management, and digital workflow automation.
* **Core Value Proposition**: *"Solusi Kustom Sesuai Alur Kerja Unik Bisnis Anda"* (Software that adapts 100% to how the client's business operates, eliminating chaotic spreadsheets without rigid off-the-shelf software limitations).
* **Technology-Agnostic Principle**: Do not list programming languages or tech stacks in marketing headlines or value propositions. Emphasize business outcomes, system stability, and cost-efficiency.
* **Complete Removal of Odoo ERP**: Odoo ERP is completely eliminated from all service models, seeders, views, and routes. Accelerate Lab is positioned purely as a custom software engineering studio.
* **Zero Em Dash Rule**: The em dash character (`—`) and en dash (`–`) are 100% prohibited across all views, database seeders, language dictionaries, and components. Sentences must use commas, periods, or standard hyphens (`-`).
* **Default Locale**: Bahasa Indonesia (`id`) is the default locale across the entire application, with a high-contrast English (`en`) switcher always available in the header.
* **Strict TDD Compliance**: Every backend modification, view transformation, or route adjustment must be preceded by a failing automated test (Red -> Green -> Refactor).

---

## 3. Detailed Component Specifications

### 3.1 Database & Core Service Architecture

#### Seeder Cleanup & Standardization
* **`ServiceSeeder.php`**:
  * Remove `odoo-erp-implementation` permanently.
  * Maintain exactly four core custom engineering services:
    1. `web-application-development`: Portal Bisnis Kustom & Dashboard Operasional.
    2. `mobile-app-development`: Aplikasi Mobile Tim Lapangan & Operasional Bisnis.
    3. `ui-ux-design`: Perancangan Antarmuka Sistem Kerja yang Intuitif.
    4. `cloud-architecture`: Migrasi & Sentralisasi Data Bisnis ke Server Cloud Modern.
* **`ProjectSeeder.php`**:
  * Reframe `Livestock Management System` (`PT Sahabat Farm Indonesia`): Remove all mentions of "pro-bono". Highlight verified business outcomes (+35% efisiensi alur kerja operasional, -20% pemborosan stok).
  * Reframe `Telaah`: Remove self-authored quotes. Position as an automated regulatory compliance engine (<30 detik kecepatan audit, kapasitas file 100 MB, enkripsi AES-256).
* **`SiteSettingSeeder.php`**:
  * Ensure live verified contact details are seeded: `Jalan Bintara 9 RT 005 RW 005 No 75`, `+62 877 2131 2985`, `nova@acceleratelab.id`, and `PT Akselerasi Digital Mandiri`.

---

### 3.2 Header & Global Navigation (`header.blade.php`)

* **Consistent Call-to-Action**:
  * Replace conflicting labels (*"Get an Estimate"* vs *"Estimate Your Project"*) with a unified primary button:
    * Indonesian: `Konsultasi Proyek`
    * English: `Project Consultation`
* **Mobile Touch Target Standards**:
  * Enlarge the language toggle button (`ID | EN`) to meet the minimum 44x44px touch target standard on mobile viewports.
* **Navigation Links**:
  * Clean scannable hierarchy: `Layanan` (`/services`), `Studi Kasus` (`/case-studies`), `Tentang Kami` (`/about`), `Kontak` (`/contact`).

---

### 3.3 Homepage Transformation (`home.blade.php`)

#### Hero Section
* **Status Badge**: `Tersedia untuk Proyek Baru Kuartal Ini` (with pulsing indicator).
* **Headline**:
  * Indonesian: `Software Kustom yang Beradaptasi Penuh dengan Alur Kerja Bisnis Anda.`
  * English: `Custom Software Engineered Specifically for Your Business Workflow.`
* **Subheadline**:
  * Indonesian: `Hentikan spreadsheet yang tercecer dan sistem kaku yang membatasi pertumbuhan. Kami merancang dan membangun portal manajemen, dashboard operasional, dan aplikasi bisnis kustom yang rapi, cepat, dan menjadi aset milik Anda selamanya.`
* **Calls to Action**:
  * Primary: `Konsultasi Gratis via WhatsApp` (direct wa.me trigger with structured pre-filled text).
  * Secondary: `Hitung Estimasi Kebutuhan` (smooth scroll to project estimator wizard).

#### Hero Graphic: Business Operations Interface
* Replace the mock `deploy.sh` terminal with an interactive, clean SVG/Alpine business dashboard preview:
  * Metric Card 1: *Pesanan Terproses Real-time*.
  * Metric Card 2: *Akurasi Stok & Inventori (99.8%)*.
  * Metric Card 3: *Notifikasi Otomatis & Laporan Bulanan*.
  * Live status badge: *Sistem Aman & Aktif 24/7*.

#### "Tantangan Manual vs. Sistem Kustom" Comparison Grid
* Direct two-column comparison exposing operational leakages:
  * **Cara Lama (Manual & Spreadsheet)**: Data tercecer di grup chat, stok sering tidak cocok, butuh berjam-jam membuat laporan rekapitulasi.
  * **Dengan Sistem Kustom Accelerate Lab**: Satu database terpusat, validasi otomatis anti-bocor, laporan performa tersedia instan dalam satu klik.

#### Core Capabilities Grid
* Eliminate generic "The Lab" code snippet (`AccelerateLabController.ts`).
* Replace empty decorative colored pills with purposeful business capabilities cards:
  1. Portal Manajemen & Dashboard Operasional Internal.
  2. Aplikasi Web & Sistem Layanan Pelanggan.
  3. Aplikasi Mobile Operasional Lapangan.
  4. Sentralisasi & Migrasi Data dari Excel.

---

### 3.4 Case Studies & Operational Blueprints (`case-studies.blade.php`)

* **Filter Bar Normalization**:
  * Replace the expansive industry filter bar with a cohesive project grid that presents both live deployments prominently.
* **Interactive DM&P Lawfirm Demo Showcase**:
  * Feature an interactive preview card directing to `/demos/dmp-lawfirm` with passcode guidance for prospective clients to test a real enterprise portal interface.
* **SME Operational Blueprints Section**:
  * Interactive tabbed blueprints showcasing common implementation workflows:
    * Blueprint A: *Sistem Inventori Multi-Gudang & Barcode*.
    * Blueprint B: *Portal Penagihan & Invoicing Otomatis (Integrasi QRIS/VA)*.
    * Blueprint C: *Dashboard Manajemen & Monitoring Kinerja Cabang*.

---

### 3.5 About Page Repositioning (`about.blade.php`)

* **Authentic Studio Narrative**:
  * Remove stock photography of the 15-person foreign corporate office and Google AIDA avatar stack.
  * Establish the **Engineer-Led Boutique Model**:
    * Direct access to Nova Triansyah Azis (Founder & Principal Architect, 6+ years experience).
    * No sales intermediaries, no unsupervised junior developer handoffs, and 100% full source code ownership.
* **Hero Conversion Actions**:
  * Replace the inappropriate *"Join Our Team"* and self-referencing *"View Our Story"* buttons with high-intent client actions:
    * Primary: `Jadwalkan Diskusi Proyek` (triggers direct consultation modal / WhatsApp).
    * Secondary: `Pelajari Studi Kasus` (navigates to `/case-studies`).

---

### 3.6 Interactive Project Estimator (`project-estimator.blade.php`)

* **Step 1 (Tujuan Proyek)**: Plain business options:
  1. Portal Operasional & Dashboard Manajemen Kustom.
  2. Sistem Inventori, Penjualan, & Penagihan Terpusat.
  3. Portal Layanan Mandiri untuk Pelanggan / Mitra.
  4. Aplikasi Mobile Operasional Lapangan.
  5. Modernisasi / Perbaikan Software yang Sudah Ada.
* **Step 2 (Kondisi Saat Ini)**:
  1. Masih menggunakan spreadsheet / catatan manual.
  2. Desain atau alur kerja sudah ada, siap dibangun.
  3. Software lama berjalan tapi lambat / banyak kendala.
* **Step 3 (Target Waktu & Preferensi)**:
  * Remove intimidating framework options (Laravel vs React vs Go).
  * Replace with architecture requirements: *Web Cloud, Aplikasi Mobile, Integrasi Database Lokal*.
* **Step 4 (Ringkasan & Transparansi)**:
  * Display a clear, realistic turnaround estimate (e.g. *Target Pengerjaan: 3-5 Minggu*) before offering the direct WhatsApp dispatch or email scope.

---

## 4. Quality Assurance & Strict TDD Verification Plan

1. **Automated Test Suite Expansion**:
   * Update `ProductionDataSeederTest` to verify that Odoo ERP is absent and all 4 core services are seeded.
   * Verify `PerformanceCheckTest` ensures zero em dashes across all public routes in both `id` and `en` locales.
   * Verify `LocalizationScreensTest` validates Indonesian-first default text rendering across all pages.
   * Verify `UiUxDesignSystemTest` validates heading hierarchy, semantic landmarks, and image alt attributes.
2. **Build & Lint Verification**:
   * Execute `npm run build` to ensure Tailwind CSS v4 compiles without errors.
   * Execute `php artisan test` to maintain a 100% pass rate across all 96+ automated tests.
