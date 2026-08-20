# Client Demo CMS & Dual-Mode Presentation System — Design Spec

**Date:** 2026-08-20  
**Status:** Approved  
**Author:** Accelerate Lab Team  

---

## 1. Overview & Objectives

Accelerate Lab requires a dynamic, CMS-driven client demo platform built into the monolithic Laravel 12 application. This allows agency leadership to rapidly create, manage, and present bespoke interactive client prototypes (starting with **DM&P Advocates**) with complete styling isolation and interactive presentation tooling.

### Key Objectives:
- **Filament CMS Integration:** Dedicated `Client Demos` resource (`DemoResource`) to create, update, and manage prototypes with dynamic HTML storage, passcode gating, and quick actions.
- **Dual-Mode Presentation:**
  - **Mode 1 (Showcase Frame — `/demos/{slug}`):** Interactive presentation frame equipped with an Accelerate Lab branded toolbar, client badge, smooth responsive device switcher (**Desktop / Tablet 768px / Mobile 375px**), and fullscreen launcher.
  - **Mode 2 (Pure Standalone — `/demos/{slug}/preview` or `/fullscreen`):** 100% isolated rendering of the client's bespoke HTML/CSS/JS without any master layout, Tailwind CSS, or Vite script leakage.
- **Initial Seed Data:** Out-of-the-box seeding with the complete **DM&P Advocates** corporate law firm prototype.
- **Strict TDD Compliance:** Red-Green-Refactor test coverage across database migrations, models, Filament admin resource, and frontend dual-mode routes.

---

## 2. Architecture & Database Schema

### 2.1 Database Table: `demos`
```php
Schema::create('demos', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->string('slug')->unique();
    $table->string('client_name')->nullable();
    $table->string('industry')->nullable();
    $table->text('description')->nullable();
    $table->longText('html_content');
    $table->string('access_passcode')->nullable();
    $table->string('default_device')->default('desktop'); // desktop, tablet, mobile
    $table->boolean('is_active')->default(true);
    $table->timestamps();
});
```

### 2.2 Model: `App\Models\Demo`
- Fillable: `title`, `slug`, `client_name`, `industry`, `description`, `html_content`, `access_passcode`, `default_device`, `is_active`.
- Casts: `is_active` => `'boolean'`.
- Scopes: `scopeActive($query)`.

### 2.3 Filament Admin: `App\Filament\Resources\DemoResource`
- **Form Schema:**
  - Section 1: General Info (`title`, `slug`, `client_name`, `industry`, `is_active`, `access_passcode`, `default_device`).
  - Section 2: Prototype Source (`html_content` with full CodeEditor / LongText).
- **Table Columns & Actions:**
  - Columns: `title`, `client_name`, `slug`, `is_active`, `created_at`.
  - Actions: Edit, Delete, and direct Action links:
    - *"Open Showcase"* $\rightarrow$ `/demos/{slug}`
    - *"Open Fullscreen"* $\rightarrow$ `/demos/{slug}/preview`

---

## 3. Frontend Routing & Dual-Mode Views

### 3.1 Routes (`routes/web.php`)
```php
Route::get('/demos/{demo:slug}', [DemoController::class, 'showcase'])->name('demos.showcase');
Route::get('/demos/{demo:slug}/preview', [DemoController::class, 'preview'])->name('demos.preview');
Route::post('/demos/{demo:slug}/verify', [DemoController::class, 'verifyPasscode'])->name('demos.verify');
```

### 3.2 View 1: Showcase Frame (`resources/views/frontend/demos/showcase.blade.php`)
- Ultra-clean, modern dark/light Accelerate Lab presentation bar:
  - Agency Logo & Back Link to Accelerate Lab (`/case-studies` or `/`).
  - Client Tag: `{{ $demo->title }} — {{ $demo->client_name }}`.
  - Interactive Device Switcher pills:
    - 🖥️ **Desktop** (100% width)
    - 📱 **Tablet** (768px centered container with realistic shadow/border)
    - 📱 **Mobile** (375px centered container)
  - 🔄 Reload frame button.
  - ↗️ **"Open Fullscreen"** link pointing to `demos.preview`.
- Embedded sandboxed `<iframe>` pointing to route `demos.preview`.

### 3.3 View 2: Pure Preview (`resources/views/frontend/demos/preview.blade.php` / Direct Controller Response)
- Streams raw `$demo->html_content` directly as `text/html`.
- 100% zero interference from application styles.

---

## 4. Strict TDD & Verification Plan

### Test Suite: `tests/Feature/Frontend/ClientDemoTest.php`
1. `test_demo_can_be_stored_in_database()`
2. `test_showcase_mode_loads_with_device_switcher_and_client_metadata()`
3. `test_preview_mode_renders_pure_isolated_html_content()`
4. `test_inactive_demo_returns_404_or_redirect()`
5. `test_passcode_protected_demo_requires_passcode_verification()`
6. `test_dmp_advocates_is_properly_seeded_and_functional()`
