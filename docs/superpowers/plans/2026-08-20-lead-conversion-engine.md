# Lead Generation & Conversion Engine Implementation Plan

> **For agentic workers:**
> **Goal:** Transform Accelerate Lab's public web presence into an active Inbound Lead Generation Engine with an interactive multi-step project scoping wizard, pre-filled WhatsApp deep-linking, 1-click consultation scheduler, and jargon-free technology-agnostic trust guarantees.
> **Architecture:** Laravel 12 / PHPUnit 11 + Alpine.js interactive component (`<x-project-estimator>`) + Tailwind CSS v4 design tokens + direct WhatsApp/mail dispatch.
> **Tech Stack:** PHP 8.3, Laravel 12, Blade, Alpine.js, Tailwind CSS v4, PHPUnit 11.

## Global Constraints

- Must maintain 100% test pass rate on all unit, feature, and UI/UX test suites (`php artisan test`).
- Every single step must strictly follow Test-Driven Development (Red -> Green -> Refactor).
- 100% Plain Business Language on default views with optional technical stack preference for CTOs/tech leads.
- 100% Inline SVG iconography via `<x-app-icon>` (zero external font stylesheets).
- Zero breaking changes to existing Filament resources or `/contact` routes.

---

### Task 1: Backend Scoping Payload & Form Request Hardening

**Files:**
- Create: `tests/Feature/ProjectEstimatorTest.php`
- Modify: `app/Http/Requests/StoreContactRequest.php`
- Modify: `app/Http/Controllers/Frontend/ContactController.php`

**Interfaces:**
- Consumes: HTTP POST `/contact`, `StoreContactRequest` validation rules.
- Produces: Sanitized `Lead` database records capturing `service_interest`, `project_stage`, `timeline`, `tech_preference`, and `message`.

- [ ] **Step 1: Write the failing feature test in `tests/Feature/ProjectEstimatorTest.php`**

```php
<?php

namespace Tests\Feature;

use App\Models\Lead;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ProjectEstimatorTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function contact_form_accepts_structured_scoping_wizard_payload()
    {
        $payload = [
            'name' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'phone' => '+6281234567890',
            'company' => 'PT Karya Digital',
            'service_interest' => 'Launch a New App Idea (MVP)',
            'project_stage' => 'Figma / Design mockups ready',
            'timeline' => 'Within 1 Month',
            'tech_preference' => 'Laravel & Full-Stack',
            'message' => 'Looking for MVP estimate.',
        ];

        $response = $this->post('/contact', $payload);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('leads', [
            'name' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'source' => 'Project Estimator Wizard',
        ]);

        $lead = Lead::where('email', 'budi@example.com')->first();
        $this->assertStringContainsString('Launch a New App Idea (MVP)', $lead->message);
        $this->assertStringContainsString('Within 1 Month', $lead->message);
    }
}
```

- [ ] **Step 2: Run test to verify it fails**

Run: `php artisan test tests/Feature/ProjectEstimatorTest.php`
Expected: FAIL (Lead source does not match or fields unhandled)

- [ ] **Step 3: Update `app/Http/Requests/StoreContactRequest.php` & `app/Http/Controllers/Frontend/ContactController.php`**

In `StoreContactRequest.php`:
```php
        return [
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:30',
            'company' => 'nullable|string|max:255',
            'message' => 'nullable|string|max:5000',
            'service_interest' => 'nullable|string|max:255',
            'project_stage' => 'nullable|string|max:255',
            'timeline' => 'nullable|string|max:255',
            'tech_preference' => 'nullable|string|max:255',
            'my_favorite_color' => 'nullable|string',
            'cf-turnstile-response' => [
                config('services.turnstile.secret_key') ? 'required' : 'nullable',
                function ($attribute, $value, $fail) {
                    $secret = config('services.turnstile.secret_key');
                    if (empty($secret)) {
                        return;
                    }
                    try {
                        $response = \Illuminate\Support\Facades\Http::asForm()->timeout(5)->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
                            'secret' => $secret,
                            'response' => $value,
                            'remoteip' => request()->ip(),
                        ]);
                        if (!$response->successful() || !$response->json('success')) {
                            $fail('The CAPTCHA verification failed. Please try again.');
                        }
                    } catch (\Throwable $e) {
                        \Illuminate\Support\Facades\Log::warning('Turnstile verification network failure: ' . $e->getMessage());
                    }
                }
            ],
        ];
```

In `ContactController.php`:
```php
        $validated = $request->validated();

        $scopingSummary = [];
        if (!empty($validated['service_interest'])) $scopingSummary[] = "Interest: " . $validated['service_interest'];
        if (!empty($validated['project_stage'])) $scopingSummary[] = "Stage: " . $validated['project_stage'];
        if (!empty($validated['timeline'])) $scopingSummary[] = "Timeline: " . $validated['timeline'];
        if (!empty($validated['tech_preference'])) $scopingSummary[] = "Tech Pref: " . $validated['tech_preference'];

        $formattedMessage = implode("\n", array_filter([
            implode(" | ", $scopingSummary),
            $validated['message'] ?? null,
        ]));

        $lead = Lead::create([
            'name' => $validated['name'],
            'email' => $validated['email'] ?? 'no-email-provided@acceleratelab.id',
            'company' => $validated['company'] ?? null,
            'phone' => $validated['phone'] ?? null,
            'message' => $formattedMessage ?: 'Scoping inquiry received from website.',
            'status' => 'new',
            'source' => !empty($scopingSummary) ? 'Project Estimator Wizard' : 'Web Form',
        ]);
```

- [ ] **Step 4: Run test to verify it passes**

Run: `php artisan test tests/Feature/ProjectEstimatorTest.php`
Expected: PASS

- [ ] **Step 5: Commit**

```bash
git add tests/Feature/ProjectEstimatorTest.php app/Http/Requests/StoreContactRequest.php app/Http/Controllers/Frontend/ContactController.php
git commit -m "feat(leads): support structured project scoping wizard payload and lead source tracking"
```

---

### Task 2: Interactive Project Scoping Wizard Blade Component

**Files:**
- Create: `resources/views/components/project-estimator.blade.php`
- Modify: `resources/views/frontend/pages/contact.blade.php`
- Test: `tests/Feature/ProjectEstimatorTest.php`

**Interfaces:**
- Consumes: `<x-project-estimator />`, Alpine.js `x-data="projectEstimator()"`
- Produces: Interactive 4-step wizard with pre-filled WhatsApp deep-link generation and email POST submission.

- [ ] **Step 1: Write failing component test in `tests/Feature/ProjectEstimatorTest.php`**

```php
    #[Test]
    public function contact_page_renders_interactive_project_estimator_component()
    {
        $response = $this->get('/contact');

        $response->assertStatus(200);
        $response->assertSee('projectEstimator', false);
        $response->assertSee('Launch a New App Idea', false);
        $response->assertSee('Web Platform', false);
        $response->assertSee('Mobile App', false);
        $response->assertSee('Send via WhatsApp', false);
    }
```

- [ ] **Step 2: Run test to verify it fails**

Run: `php artisan test tests/Feature/ProjectEstimatorTest.php`
Expected: FAIL (Component not yet created)

- [ ] **Step 3: Create `resources/views/components/project-estimator.blade.php` and embed in `contact.blade.php`**

Create `<x-project-estimator>` with 4 interactive steps, visual pill selectors, dynamic WhatsApp message compiler, and standard form fallback. Embed on `resources/views/frontend/pages/contact.blade.php`.

- [ ] **Step 4: Run test to verify it passes**

Run: `php artisan test tests/Feature/ProjectEstimatorTest.php`
Expected: PASS

- [ ] **Step 5: Commit**

```bash
git add resources/views/components/project-estimator.blade.php resources/views/frontend/pages/contact.blade.php tests/Feature/ProjectEstimatorTest.php
git commit -m "feat(ui): add interactive project scoping wizard with instant WhatsApp generator"
```

---

### Task 3: 1-Click Consultation Scheduler & Tech-Agnostic Trust Guarantees

**Files:**
- Create: `resources/views/components/consultation-modal.blade.php`
- Modify: `resources/views/frontend/pages/home.blade.php`
- Modify: `resources/views/frontend/components/header.blade.php`
- Test: `tests/Feature/UiUxDesignSystemTest.php`

**Interfaces:**
- Consumes: `<x-consultation-modal />`, site settings WhatsApp/Email
- Produces: Friendly 15-minute consultation modal + plain-English value propositions.

- [ ] **Step 1: Write failing UI/UX test in `tests/Feature/UiUxDesignSystemTest.php`**

```php
    #[Test]
    public function home_and_header_include_plain_english_consultation_triggers()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('consultation-modal', false);
        $response->assertSee('15-Min', false);
    }
```

- [ ] **Step 2: Run test to verify it fails**

Run: `php artisan test --filter=home_and_header_include_plain_english_consultation_triggers`
Expected: FAIL

- [ ] **Step 3: Implement `consultation-modal.blade.php`, update `header.blade.php` and `home.blade.php`**

Add the friendly 15-min consultation booking trigger and update the value proposition copy to be plain-English and tech-agnostic.

- [ ] **Step 4: Run test to verify it passes**

Run: `php artisan test --filter=home_and_header_include_plain_english_consultation_triggers`
Expected: PASS

- [ ] **Step 5: Commit**

```bash
git add resources/views/components/consultation-modal.blade.php resources/views/frontend/pages/home.blade.php resources/views/frontend/components/header.blade.php tests/Feature/UiUxDesignSystemTest.php
git commit -m "feat(ui): add 1-click consultation scheduler and tech-agnostic trust signals"
```

---

### Task 4: Contextual Case Study & Service CTAs

**Files:**
- Modify: `resources/views/frontend/pages/project.blade.php`
- Modify: `resources/views/frontend/pages/services.blade.php`
- Test: `tests/Feature/UiUxDesignSystemTest.php`

**Interfaces:**
- Consumes: Case Study & Service views
- Produces: High-converting contextual lead banners guiding visitors to the Scoping Wizard.

- [ ] **Step 1: Write failing test in `tests/Feature/UiUxDesignSystemTest.php`**

```php
    #[Test]
    public function case_study_and_service_pages_render_contextual_scoping_ctas()
    {
        $project = \App\Models\Project::factory()->create(['title' => 'Fintech Core']);
        $response = $this->get('/case-studies/' . $project->slug);
        $response->assertStatus(200);
        $response->assertSee('Get an Estimate', false);
    }
```

- [ ] **Step 2: Run test to verify it fails**

Run: `php artisan test --filter=case_study_and_service_pages_render_contextual_scoping_ctas`
Expected: FAIL

- [ ] **Step 3: Update `project.blade.php` and `services.blade.php`**

Add high-intent contextual estimation banners.

- [ ] **Step 4: Run test to verify it passes**

Run: `php artisan test --filter=case_study_and_service_pages_render_contextual_scoping_ctas`
Expected: PASS

- [ ] **Step 5: Full test suite verification**

Run: `php artisan test`
Expected: ALL PASS

- [ ] **Step 6: Commit**

```bash
git add resources/views/frontend/pages/project.blade.php resources/views/frontend/pages/services.blade.php tests/Feature/UiUxDesignSystemTest.php
git commit -m "feat(ui): add contextual estimation banners to case study and service pages"
```
