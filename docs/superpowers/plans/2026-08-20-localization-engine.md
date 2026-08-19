# Localization (i18n) Engine Implementation Plan

> **For agentic workers:**
> **Goal:** Implement seamless Indonesian (`id`) and English (`en`) localization with session persistence, language switcher UI, and natural business translations across the Project Scoping Wizard, Consultation Modal, and key public views under Strict TDD.
> **Architecture:** Laravel 12 translation engine (`lang/id.json`, `lang/en.json`) + `SetLocaleMiddleware` + `/lang/{locale}` switcher route + Blade `__()` helpers.
> **Tech Stack:** PHP 8.3, Laravel 12, Blade, Alpine.js, Tailwind CSS v4, PHPUnit 11.

## Global Constraints

- Must maintain 100% test pass rate on all unit, feature, and UI/UX test suites (`php artisan test`).
- Every single step must strictly follow Test-Driven Development (Red -> Green -> Refactor).
- 100% Inline SVG iconography via `<x-app-icon>` (zero external font stylesheets).
- No breaking changes to existing URLs, canonical tags, or Filament CMS routes.

---

### Task 1: Localization Middleware, Route & Session Persistence

**Files:**
- Create: `app/Http/Middleware/SetLocaleMiddleware.php`
- Modify: `bootstrap/app.php`
- Modify: `routes/web.php`
- Create: `tests/Feature/LocalizationTest.php`

**Interfaces:**
- Consumes: `GET /lang/{locale}`, Session `locale`, Cookie `accelerate_locale`.
- Produces: Dynamic application locale (`app()->getLocale()`) set to `id` or `en`.

- [ ] **Step 1: Write failing test in `tests/Feature/LocalizationTest.php`**

```php
<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class LocalizationTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function language_switch_route_updates_session_and_redirects_back()
    {
        $response = $this->get('/lang/id');
        $response->assertRedirect();
        $response->assertSessionHas('locale', 'id');

        $responseEn = $this->get('/lang/en');
        $responseEn->assertRedirect();
        $responseEn->assertSessionHas('locale', 'en');
    }

    #[Test]
    public function invalid_locale_is_safely_ignored()
    {
        $response = $this->get('/lang/invalid-lang');
        $response->assertRedirect();
        $this->assertEquals(config('app.fallback_locale', 'en'), app()->getLocale());
    }
}
```

- [ ] **Step 2: Run test to verify it fails**

Run: `php artisan test tests/Feature/LocalizationTest.php`
Expected: FAIL (Route `/lang/{locale}` not defined)

- [ ] **Step 3: Implement `SetLocaleMiddleware.php`, register in `bootstrap/app.php`, and add route in `routes/web.php`**

Create `app/Http/Middleware/SetLocaleMiddleware.php`:
```php
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class SetLocaleMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $locale = session('locale', $request->cookie('accelerate_locale', config('app.locale', 'en')));

        if (in_array($locale, ['id', 'en'])) {
            App::setLocale($locale);
        }

        return $next($request);
    }
}
```

Register in `bootstrap/app.php` and add route in `routes/web.php`:
```php
Route::get('/lang/{locale}', function (string $locale) {
    if (in_array($locale, ['id', 'en'])) {
        session(['locale' => $locale]);
        cookie()->queue('accelerate_locale', $locale, 60 * 24 * 365);
    }
    return redirect()->back();
})->name('lang.switch');
```

- [ ] **Step 4: Run test to verify it passes**

Run: `php artisan test tests/Feature/LocalizationTest.php`
Expected: PASS

- [ ] **Step 5: Commit**

```bash
git add app/Http/Middleware/SetLocaleMiddleware.php bootstrap/app.php routes/web.php tests/Feature/LocalizationTest.php
git commit -m "feat(i18n): add locale switcher route and SetLocaleMiddleware with session persistence"
```

---

### Task 2: Translation Dictionaries (`lang/id.json` & `lang/en.json`)

**Files:**
- Create: `lang/id.json`
- Create: `lang/en.json`
- Test: `tests/Feature/LocalizationTest.php`

**Interfaces:**
- Consumes: `__('String Key')`
- Produces: Natural, business-oriented translations in Bahasa Indonesia and English.

- [ ] **Step 1: Add translation assertions to `tests/Feature/LocalizationTest.php`**

```php
    #[Test]
    public function indonesian_translations_are_rendered_when_locale_is_id()
    {
        $response = $this->withSession(['locale' => 'id'])->get('/');
        $response->assertStatus(200);
        $response->assertSee('Estimasi Proyek', false);
        $response->assertSee('Konsultasi Gratis 15-Menit', false);
        $response->assertSee('100% Hak Milik Source Code', false);
    }
```

- [ ] **Step 2: Run test to verify it fails**

Run: `php artisan test tests/Feature/LocalizationTest.php`
Expected: FAIL (Translation keys not found)

- [ ] **Step 3: Create `lang/id.json` and `lang/en.json`**

Populate comprehensive dictionaries with clean keys.

- [ ] **Step 4: Run test to verify it passes**

Run: `php artisan test tests/Feature/LocalizationTest.php`
Expected: PASS

- [ ] **Step 5: Commit**

```bash
git add lang/id.json lang/en.json tests/Feature/LocalizationTest.php
git commit -m "feat(i18n): create comprehensive Indonesian and English translation dictionaries"
```

---

### Task 3: Dynamic View Localization & Language Switcher in Header

**Files:**
- Modify: `resources/views/frontend/components/header.blade.php`
- Modify: `resources/views/frontend/pages/home.blade.php`
- Modify: `resources/views/frontend/pages/contact.blade.php`
- Modify: `resources/views/components/project-estimator.blade.php`
- Modify: `resources/views/components/consultation-modal.blade.php`
- Test: `tests/Feature/LocalizationTest.php`
- Test: `tests/Feature/UiUxDesignSystemTest.php`

**Interfaces:**
- Consumes: Blade `__()` localization helpers and current locale `app()->getLocale()`.
- Produces: Responsive language switcher `[ 🇮🇩 ID | 🇬🇧 EN ]` with dynamic UI updates.

- [ ] **Step 1: Add language switcher test to `tests/Feature/LocalizationTest.php`**

```php
    #[Test]
    public function header_renders_language_switcher_with_active_indicator()
    {
        $response = $this->withSession(['locale' => 'id'])->get('/');
        $response->assertStatus(200);
        $response->assertSee('/lang/id', false);
        $response->assertSee('/lang/en', false);
    }
```

- [ ] **Step 2: Run test to verify it fails**

Run: `php artisan test tests/Feature/LocalizationTest.php`
Expected: FAIL

- [ ] **Step 3: Update `header.blade.php`, `home.blade.php`, `contact.blade.php`, `project-estimator.blade.php`, and `consultation-modal.blade.php`**

Integrate `__()` strings and the `[ ID | EN ]` toggle in navigation.

- [ ] **Step 4: Run test to verify it passes**

Run: `php artisan test tests/Feature/LocalizationTest.php`
Expected: PASS

- [ ] **Step 5: Run full test suite and build verification**

Run: `php artisan test`
Run: `npm.cmd run build`
Expected: ALL PASS

- [ ] **Step 6: Commit**

```bash
git add resources/views/ tests/Feature/
git commit -m "feat(i18n): add responsive language switcher and translate key conversion views"
```
