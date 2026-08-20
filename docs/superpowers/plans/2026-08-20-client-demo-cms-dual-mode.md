# Client Demo CMS & Dual-Mode Presentation System Implementation Plan

> **For agentic workers:** 
**Goal:** Build a dynamic, CMS-driven client demo prototype system in Accelerate Lab with Filament v3 management, dual-mode presentation (Showcase frame with responsive device switcher + Pure isolated fullscreen preview), passcode protection, and initial DM&P Advocates prototype seed.

**Architecture:** A dedicated `demos` table and `Demo` Eloquent model manage client prototypes. An admin resource `DemoResource` in Filament v3 enables creating, editing, and managing HTML prototypes. Public routing through `DemoController` provides `/demos/{demo:slug}` (Showcase presentation viewer with responsive viewport switching) and `/demos/{demo:slug}/preview` (100% style-isolated direct HTML render).

**Tech Stack:** Laravel 12, PHP 8.3, Blade, Tailwind CSS v4, Filament v3, SQLite (in-memory test runner) / MySQL (production).

## Global Constraints

- Follow Strict Test-Driven Development (TDD): Red $\rightarrow$ Green $\rightarrow$ Refactor for all tasks.
- Style isolation is paramount: `/demos/{demo:slug}/preview` must NOT load Accelerate Lab's global Tailwind CSS or layout assets, rendering the stored client HTML in absolute purity.
- All public showcase controls and buttons must have semantic markup and `aria-label` attributes.
- No dummy or broken images: initial DM&P Advocates prototype must render clean embedded SVG/badges for logos.
- All tests must pass: `php artisan test` must maintain a 100% pass rate.

---

### Task 1: Migration, `Demo` Model, and Model Factory

**Files:**
- Create: `database/migrations/2026_08_20_000001_create_demos_table.php`
- Create: `app/Models/Demo.php`
- Create: `database/factories/DemoFactory.php`
- Test: `tests/Unit/DemoModelTest.php`

**Interfaces:**
- Consumes: Eloquent Model & Factory base classes.
- Produces: `App\Models\Demo` with fields `title`, `slug`, `client_name`, `industry`, `description`, `html_content`, `access_passcode`, `default_device`, `is_active`, and scopes `scopeActive($query)`.

- [ ] **Step 1: Write the failing unit test**

Create `tests/Unit/DemoModelTest.php`:
```php
<?php

namespace Tests\Unit;

use App\Models\Demo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class DemoModelTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function demo_model_has_fillable_attributes_and_casts()
    {
        $demo = Demo::create([
            'title' => 'DM&P Advocates',
            'slug' => 'dmp-advocates',
            'client_name' => 'Dhoni Martien & Partners',
            'industry' => 'Corporate Law',
            'description' => 'Tier-1 Indonesian corporate law firm prototype.',
            'html_content' => '<!DOCTYPE html><html><body><h1>DM&P Advocates</h1></body></html>',
            'access_passcode' => 'client2026',
            'default_device' => 'desktop',
            'is_active' => true,
        ]);

        $this->assertDatabaseHas('demos', [
            'slug' => 'dmp-advocates',
            'title' => 'DM&P Advocates',
            'is_active' => 1,
        ]);

        $this->assertTrue($demo->is_active);
        $this->assertTrue($demo->isPasscodeProtected());
        $this->assertTrue($demo->verifyPasscode('client2026'));
        $this->assertFalse($demo->verifyPasscode('wrong-pass'));
    }

    #[Test]
    public function demo_scope_active_filters_inactive_records()
    {
        Demo::create([
            'title' => 'Active Demo',
            'slug' => 'active-demo',
            'html_content' => '<p>Active</p>',
            'is_active' => true,
        ]);

        Demo::create([
            'title' => 'Inactive Demo',
            'slug' => 'inactive-demo',
            'html_content' => '<p>Inactive</p>',
            'is_active' => false,
        ]);

        $this->assertCount(1, Demo::active()->get());
        $this->assertEquals('active-demo', Demo::active()->first()->slug);
    }
}
```

- [ ] **Step 2: Run test to verify it fails**

Run: `php artisan test --filter=DemoModelTest`  
Expected: FAIL (Class `App\Models\Demo` not found or table doesn't exist).

- [ ] **Step 3: Write migration, model, and factory**

Create migration `database/migrations/2026_08_20_000001_create_demos_table.php`:
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('demos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('client_name')->nullable();
            $table->string('industry')->nullable();
            $table->text('description')->nullable();
            $table->longText('html_content');
            $table->string('access_passcode')->nullable();
            $table->string('default_device')->default('desktop');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('demos');
    }
};
```

Create `app/Models/Demo.php`:
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'client_name',
        'industry',
        'description',
        'html_content',
        'access_passcode',
        'default_device',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    public function isPasscodeProtected(): bool
    {
        return !empty($this->access_passcode);
    }

    public function verifyPasscode(?string $passcode): bool
    {
        if (!$this->isPasscodeProtected()) {
            return true;
        }

        return !empty($passcode) && hash_equals((string) $this->access_passcode, (string) $passcode);
    }
}
```

Create `database/factories/DemoFactory.php`:
```php
<?php

namespace Database\Factories;

use App\Models\Demo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DemoFactory extends Factory
{
    protected $model = Demo::class;

    public function definition(): array
    {
        $title = $this->faker->company() . ' Portal';
        return [
            'title' => $title,
            'slug' => Str::slug($title) . '-' . $this->faker->unique()->numberBetween(100, 999),
            'client_name' => $this->faker->company(),
            'industry' => $this->faker->randomElement(['Fintech', 'Legal', 'Healthcare', 'E-Commerce']),
            'description' => $this->faker->sentence(),
            'html_content' => '<!DOCTYPE html><html><head><title>' . $title . '</title></head><body><h1>' . $title . '</h1><p>Demo content</p></body></html>',
            'access_passcode' => null,
            'default_device' => 'desktop',
            'is_active' => true,
        ];
    }

    public function inactive(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_active' => false,
        ]);
    }

    public function protected(string $passcode = 'secret123'): static
    {
        return $this->state(fn (array $attributes) => [
            'access_passcode' => $passcode,
        ]);
    }
}
```

- [ ] **Step 4: Run test to verify it passes**

Run: `php artisan test --filter=DemoModelTest`  
Expected: PASS.

- [ ] **Step 5: Commit**

```bash
git add database/migrations/2026_08_20_000001_create_demos_table.php app/Models/Demo.php database/factories/DemoFactory.php tests/Unit/DemoModelTest.php
git commit -m "feat(demos): add demos table migration, model, factory and unit tests"
```

---

### Task 2: Frontend `DemoController`, Dual-Mode Routes, and Views

**Files:**
- Create: `app/Http/Controllers/Frontend/DemoController.php`
- Modify: `routes/web.php`
- Create: `resources/views/frontend/demos/showcase.blade.php`
- Create: `resources/views/frontend/demos/passcode.blade.php`
- Test: `tests/Feature/Frontend/ClientDemoFrontendTest.php`

**Interfaces:**
- Consumes: `App\Models\Demo`.
- Produces:
  - `GET /demos/{demo:slug}` $\rightarrow$ Showcase presentation wrapper with responsive device switcher.
  - `GET /demos/{demo:slug}/preview` $\rightarrow$ 100% isolated raw HTML preview.
  - `POST /demos/{demo:slug}/verify` $\rightarrow$ Passcode validation and session unlock.

- [ ] **Step 1: Write the failing feature test**

Create `tests/Feature/Frontend/ClientDemoFrontendTest.php`:
```php
<?php

namespace Tests\Feature\Frontend;

use App\Models\Demo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ClientDemoFrontendTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function showcase_mode_renders_presentation_frame_and_device_switcher()
    {
        $demo = Demo::factory()->create([
            'title' => 'DM&P Advocates',
            'client_name' => 'Dhoni Martien & Partners',
            'slug' => 'dmp-advocates',
            'html_content' => '<!DOCTYPE html><html><body><h1 id="brand">DM&P Law</h1></body></html>',
        ]);

        $response = $this->get('/demos/' . $demo->slug);

        $response->assertStatus(200);
        $response->assertSee('DM&P Advocates');
        $response->assertSee('Dhoni Martien & Partners');
        $response->assertSee('Desktop');
        $response->assertSee('Tablet');
        $response->assertSee('Mobile');
        $response->assertSee('Open Fullscreen');
        $response->assertSee(route('demos.preview', $demo->slug));
    }

    #[Test]
    public function preview_mode_returns_isolated_html_content_with_correct_content_type()
    {
        $html = '<!DOCTYPE html><html><head><title>Isolated Client Page</title></head><body><h2>Direct Preview Content</h2></body></html>';
        $demo = Demo::factory()->create([
            'slug' => 'direct-preview-demo',
            'html_content' => $html,
        ]);

        $response = $this->get('/demos/' . $demo->slug . '/preview');

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'text/html; charset=UTF-8');
        $response->assertSee('Direct Preview Content');
        $response->assertDontSee('Accelerate Lab'); // Style & layout isolation guarantee
    }

    #[Test]
    public function inactive_demo_returns_404_on_showcase_and_preview()
    {
        $demo = Demo::factory()->inactive()->create([
            'slug' => 'hidden-demo',
        ]);

        $this->get('/demos/' . $demo->slug)->assertStatus(404);
        $this->get('/demos/' . $demo->slug . '/preview')->assertStatus(404);
    }

    #[Test]
    public function protected_demo_prompts_for_passcode_and_unlocks_upon_valid_submission()
    {
        $demo = Demo::factory()->protected('secret2026')->create([
            'slug' => 'confidential-demo',
            'html_content' => '<h1>Confidential Mandate</h1>',
        ]);

        // Accessing without unlock shows passcode form
        $response = $this->get('/demos/' . $demo->slug);
        $response->assertStatus(200);
        $response->assertSee('Protected Client Demo');

        // Accessing preview directly redirects or blocks without session
        $previewResponse = $this->get('/demos/' . $demo->slug . '/preview');
        $previewResponse->assertRedirect('/demos/' . $demo->slug);

        // Submit invalid passcode
        $failPost = $this->post('/demos/' . $demo->slug . '/verify', [
            'passcode' => 'wrongpass',
        ]);
        $failPost->assertSessionHasErrors('passcode');

        // Submit valid passcode
        $validPost = $this->post('/demos/' . $demo->slug . '/verify', [
            'passcode' => 'secret2026',
        ]);
        $validPost->assertRedirect('/demos/' . $demo->slug);

        // Now accessible
        $this->get('/demos/' . $demo->slug)->assertSee('Open Fullscreen');
        $this->get('/demos/' . $demo->slug . '/preview')->assertSee('Confidential Mandate');
    }
}
```

- [ ] **Step 2: Run test to verify it fails**

Run: `php artisan test --filter=ClientDemoFrontendTest`  
Expected: FAIL (Controller and routes not defined).

- [ ] **Step 3: Implement Controller, Routes, and Views**

Create `app/Http/Controllers/Frontend/DemoController.php`:
```php
<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Demo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DemoController extends Controller
{
    protected function isUnlocked(Demo $demo, Request $request): bool
    {
        if (!$demo->isPasscodeProtected()) {
            return true;
        }

        return $request->session()->get('demo_unlocked_' . $demo->id) === true;
    }

    public function showcase(string $slug, Request $request)
    {
        $demo = Demo::where('slug', $slug)->where('is_active', true)->firstOrFail();

        if (!$this->isUnlocked($demo, $request)) {
            return view('frontend.demos.passcode', compact('demo'));
        }

        return view('frontend.demos.showcase', compact('demo'));
    }

    public function preview(string $slug, Request $request)
    {
        $demo = Demo::where('slug', $slug)->where('is_active', true)->firstOrFail();

        if (!$this->isUnlocked($demo, $request)) {
            return redirect()->route('demos.showcase', $demo->slug);
        }

        return response($demo->html_content, 200, [
            'Content-Type' => 'text/html; charset=UTF-8',
        ]);
    }

    public function verifyPasscode(string $slug, Request $request)
    {
        $demo = Demo::where('slug', $slug)->where('is_active', true)->firstOrFail();

        $request->validate([
            'passcode' => ['required', 'string'],
        ]);

        if (!$demo->verifyPasscode($request->input('passcode'))) {
            return back()->withErrors(['passcode' => __('Invalid access passcode. Please try again.')]);
        }

        $request->session()->put('demo_unlocked_' . $demo->id, true);

        return redirect()->route('demos.showcase', $demo->slug);
    }
}
```

Modify `routes/web.php` to register demo routes:
```php
// Client Demo Prototype Routes (Dual Mode)
Route::get('/demos/{slug}', [App\Http\Controllers\Frontend\DemoController::class, 'showcase'])->name('demos.showcase');
Route::get('/demos/{slug}/preview', [App\Http\Controllers\Frontend\DemoController::class, 'preview'])->name('demos.preview');
Route::post('/demos/{slug}/verify', [App\Http\Controllers\Frontend\DemoController::class, 'verifyPasscode'])->name('demos.verify');
```

Create `resources/views/frontend/demos/showcase.blade.php`:
```blade
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-slate-950">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $demo->title }} — Prototype Showcase | Accelerate Lab</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Inter', sans-serif; background-color: #090d16; color: #f1f5f9; height: 100vh; display: flex; flex-direction: column; overflow: hidden; }
        
        .toolbar {
            height: 64px;
            background: rgba(15, 23, 42, 0.95);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            z-index: 50;
            flex-shrink: 0;
        }

        .toolbar-left {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .agency-brand {
            display: flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            color: #ffffff;
            font-weight: 700;
            font-size: 14px;
            letter-spacing: -0.01em;
            padding-right: 16px;
            border-right: 1px solid rgba(255, 255, 255, 0.1);
        }

        .agency-brand span.dot {
            width: 8px;
            height: 8px;
            background: #38bdf8;
            border-radius: 50%;
            box-shadow: 0 0 10px #38bdf8;
        }

        .demo-meta {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .demo-title {
            font-size: 13.5px;
            font-weight: 600;
            color: #f8fafc;
        }

        .demo-client-badge {
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            background: rgba(56, 189, 248, 0.1);
            color: #38bdf8;
            border: 1px solid rgba(56, 189, 248, 0.25);
            padding: 2px 8px;
            border-radius: 4px;
        }

        .device-switcher {
            display: flex;
            align-items: center;
            background: rgba(0, 0, 0, 0.4);
            padding: 4px;
            border-radius: 8px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            gap: 4px;
        }

        .device-btn {
            background: transparent;
            border: none;
            color: #94a3b8;
            padding: 6px 14px;
            border-radius: 6px;
            font-size: 12.5px;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: 200ms all ease;
        }

        .device-btn:hover {
            color: #ffffff;
            background: rgba(255, 255, 255, 0.05);
        }

        .device-btn.active {
            background: #0284c7;
            color: #ffffff;
            box-shadow: 0 2px 8px rgba(2, 132, 199, 0.4);
        }

        .toolbar-right {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .btn-action {
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.12);
            color: #f1f5f9;
            padding: 7px 14px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            text-decoration: none;
            transition: 200ms all;
        }

        .btn-action:hover {
            background: rgba(255, 255, 255, 0.12);
            border-color: rgba(255, 255, 255, 0.25);
            color: #ffffff;
        }

        .btn-fullscreen {
            background: #38bdf8;
            color: #090d16;
            border: none;
        }

        .btn-fullscreen:hover {
            background: #7dd3fc;
            color: #090d16;
        }

        .preview-viewport {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #040711;
            overflow: hidden;
            position: relative;
            padding: 16px 0;
        }

        .frame-wrapper {
            height: 100%;
            width: 100%;
            transition: width 350ms cubic-bezier(0.4, 0, 0.2, 1), box-shadow 350ms ease;
            position: relative;
            display: flex;
            justify-content: center;
        }

        .frame-wrapper.mode-desktop {
            width: 100%;
            padding: 0;
        }

        .frame-wrapper.mode-tablet {
            width: 768px;
            border-radius: 12px;
            box-shadow: 0 25px 60px -15px rgba(0, 0, 0, 0.8), 0 0 0 1px rgba(255, 255, 255, 0.1);
            overflow: hidden;
        }

        .frame-wrapper.mode-mobile {
            width: 390px;
            border-radius: 20px;
            box-shadow: 0 25px 60px -15px rgba(0, 0, 0, 0.8), 0 0 0 2px rgba(255, 255, 255, 0.15);
            overflow: hidden;
        }

        iframe#demo-frame {
            width: 100%;
            height: 100%;
            border: none;
            background: #ffffff;
        }

        @media (max-width: 768px) {
            .device-switcher { display: none; }
            .agency-brand { border-right: none; }
        }
    </style>
</head>
<body>

    <header class="toolbar">
        <div class="toolbar-left">
            <a href="/" class="agency-brand" aria-label="Accelerate Lab Homepage">
                <span class="dot"></span>
                <span>Accelerate Lab</span>
            </a>
            <div class="demo-meta">
                <span class="demo-title">{{ $demo->title }}</span>
                @if($demo->client_name)
                    <span class="demo-client-badge">{{ $demo->client_name }}</span>
                @endif
            </div>
        </div>

        <div class="device-switcher" role="group" aria-label="Device Viewport Switcher">
            <button class="device-btn active" id="btn-desktop" onclick="setDevice('desktop')" aria-label="Desktop View">
                🖥️ <span>Desktop</span>
            </button>
            <button class="device-btn" id="btn-tablet" onclick="setDevice('tablet')" aria-label="Tablet View">
                📱 <span>Tablet</span>
            </button>
            <button class="device-btn" id="btn-mobile" onclick="setDevice('mobile')" aria-label="Mobile View">
                📱 <span>Mobile</span>
            </button>
        </div>

        <div class="toolbar-right">
            <button class="btn-action" onclick="reloadFrame()" aria-label="Reload Preview">
                🔄 <span>Reload</span>
            </button>
            <a href="{{ route('demos.preview', $demo->slug) }}" target="_blank" class="btn-action btn-fullscreen" aria-label="Open Fullscreen in New Window">
                <span>Open Fullscreen</span> ↗
            </a>
        </div>
    </header>

    <main class="preview-viewport">
        <div class="frame-wrapper mode-desktop" id="frame-wrapper">
            <iframe id="demo-frame" src="{{ route('demos.preview', $demo->slug) }}" title="{{ $demo->title }} Preview"></iframe>
        </div>
    </main>

    <script>
        function setDevice(mode) {
            const wrapper = document.getElementById('frame-wrapper');
            document.querySelectorAll('.device-btn').forEach(btn => btn.classList.remove('active'));
            
            wrapper.className = 'frame-wrapper mode-' + mode;
            document.getElementById('btn-' + mode).classList.add('active');
        }

        function reloadFrame() {
            const frame = document.getElementById('demo-frame');
            frame.src = frame.src;
        }

        // Initialize default device
        @if($demo->default_device && in_array($demo->default_device, ['desktop', 'tablet', 'mobile']))
            setDevice('{{ $demo->default_device }}');
        @endif
    </script>
</body>
</html>
```

Create `resources/views/frontend/demos/passcode.blade.php`:
```blade
<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-950">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Protected Client Demo — {{ $demo->title }} | Accelerate Lab</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Inter', sans-serif; background: #090d16; color: #f8fafc; display: flex; align-items: center; justify-content: center; min-height: 100vh; padding: 20px; }
        .card { background: #0f172a; border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 12px; padding: 36px; max-width: 420px; width: 100%; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5); }
        .icon { width: 48px; height: 48px; background: rgba(56, 189, 248, 0.1); border: 1px solid rgba(56, 189, 248, 0.25); border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 22px; margin-bottom: 20px; color: #38bdf8; }
        h1 { font-size: 20px; font-weight: 700; margin-bottom: 8px; }
        p { font-size: 13.5px; color: #94a3b8; line-height: 1.5; margin-bottom: 24px; }
        .form-group { margin-bottom: 20px; }
        label { display: block; font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; color: #cbd5e1; margin-bottom: 8px; }
        input[type="password"] { width: 100%; background: #040711; border: 1px solid rgba(255, 255, 255, 0.15); border-radius: 6px; padding: 12px 14px; color: #ffffff; font-size: 14px; outline: none; transition: 200ms border-color; }
        input[type="password"]:focus { border-color: #38bdf8; }
        .btn-submit { width: 100%; background: #0284c7; color: #ffffff; border: none; padding: 12px; border-radius: 6px; font-weight: 600; font-size: 14px; cursor: pointer; transition: 200ms background; }
        .btn-submit:hover { background: #0369a1; }
        .error-box { background: rgba(239, 68, 68, 0.1); border: 1px solid rgba(239, 68, 68, 0.25); color: #f87171; font-size: 12.5px; padding: 10px 14px; border-radius: 6px; margin-bottom: 18px; }
    </style>
</head>
<body>
    <div class="card">
        <div class="icon">🔒</div>
        <h1>Protected Client Demo</h1>
        <p>This prototype for <strong>{{ $demo->title }}</strong> is confidential. Please enter the passcode provided by Accelerate Lab to view.</p>

        @if($errors->has('passcode'))
            <div class="error-box">
                {{ $errors->first('passcode') }}
            </div>
        @endif

        <form method="POST" action="{{ route('demos.verify', $demo->slug) }}">
            @csrf
            <div class="form-group">
                <label for="passcode">Access Passcode</label>
                <input type="password" id="passcode" name="passcode" placeholder="Enter access passcode" required autofocus>
            </div>
            <button type="submit" class="btn-submit">Unlock Client Demo →</button>
        </form>
    </div>
</body>
</html>
```

- [ ] **Step 4: Run test to verify it passes**

Run: `php artisan test --filter=ClientDemoFrontendTest`  
Expected: PASS.

- [ ] **Step 5: Commit**

```bash
git add app/Http/Controllers/Frontend/DemoController.php routes/web.php resources/views/frontend/demos/ tests/Feature/Frontend/ClientDemoFrontendTest.php
git commit -m "feat(demos): implement frontend demo controller, dual-mode views, and passcode protection"
```

---

### Task 3: Filament CMS `DemoResource`

**Files:**
- Create: `app/Filament/Resources/DemoResource.php`
- Create: `app/Filament/Resources/DemoResource/Pages/ListDemos.php`
- Create: `app/Filament/Resources/DemoResource/Pages/CreateDemo.php`
- Create: `app/Filament/Resources/DemoResource/Pages/EditDemo.php`
- Test: `tests/Feature/Filament/DemoResourceTest.php`

**Interfaces:**
- Consumes: `App\Models\Demo`, Filament Form & Table components.
- Produces: Filament Admin panel management pages under "Client Demos".

- [ ] **Step 1: Write the failing feature test**

Create `tests/Feature/Filament/DemoResourceTest.php`:
```php
<?php

namespace Tests\Feature\Filament;

use App\Filament\Resources\DemoResource;
use App\Models\Demo;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class DemoResourceTest extends TestCase
{
    use RefreshDatabase;

    protected User $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = User::factory()->create();
    }

    #[Test]
    public function demo_resource_list_page_can_be_rendered()
    {
        $demo = Demo::factory()->create([
            'title' => 'Sample Legal Demo',
        ]);

        $this->actingAs($this->admin)
            ->get(DemoResource::getUrl('index'))
            ->assertStatus(200)
            ->assertSee('Sample Legal Demo');
    }

    #[Test]
    public function demo_resource_can_create_new_record()
    {
        $this->actingAs($this->admin);

        Livewire::test(DemoResource\Pages\CreateDemo::class)
            ->fillForm([
                'title' => 'New Enterprise Portal',
                'slug' => 'new-enterprise-portal',
                'client_name' => 'Mega Corp',
                'industry' => 'Enterprise',
                'html_content' => '<!DOCTYPE html><html><body><h1>Mega Corp</h1></body></html>',
                'is_active' => true,
                'default_device' => 'desktop',
            ])
            ->call('create')
            ->assertHasNoFormErrors();

        $this->assertDatabaseHas('demos', [
            'slug' => 'new-enterprise-portal',
            'client_name' => 'Mega Corp',
        ]);
    }
}
```

- [ ] **Step 2: Run test to verify it fails**

Run: `php artisan test --filter=DemoResourceTest`  
Expected: FAIL (`App\Filament\Resources\DemoResource` not found).

- [ ] **Step 3: Implement Filament Resource & Pages**

Create `app/Filament/Resources/DemoResource.php`:
```php
<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DemoResource\Pages;
use App\Models\Demo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class DemoResource extends Resource
{
    protected static ?string $model = Demo::class;

    protected static ?string $navigationIcon = 'heroicon-o-presentation-chart-line';

    protected static ?string $navigationGroup = 'Showcase & Demos';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Demo Information')
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),

                                Forms\Components\TextInput::make('slug')
                                    ->required()
                                    ->unique(Demo::class, 'slug', ignoreRecord: true),

                                Forms\Components\TextInput::make('client_name')
                                    ->label('Client Name')
                                    ->placeholder('e.g. Dhoni Martien & Partners'),

                                Forms\Components\TextInput::make('industry')
                                    ->placeholder('e.g. Corporate Law, Fintech'),

                                Forms\Components\Textarea::make('description')
                                    ->columnSpanFull(),
                            ])
                            ->columns(2),

                        Forms\Components\Section::make('HTML / CSS / JS Prototype Source')
                            ->schema([
                                Forms\Components\Textarea::make('html_content')
                                    ->label('Complete HTML Source Code')
                                    ->rows(20)
                                    ->required()
                                    ->columnSpanFull()
                                    ->helperText('Paste the complete standalone HTML including <head>, <style>, and <script>. It will render completely isolated.'),
                            ]),
                    ])
                    ->columnSpan(['lg' => 2]),

                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Access & Settings')
                            ->schema([
                                Forms\Components\Toggle::make('is_active')
                                    ->label('Active Demo')
                                    ->default(true)
                                    ->helperText('Inactive demos return 404.'),

                                Forms\Components\TextInput::make('access_passcode')
                                    ->label('Access Passcode (Optional)')
                                    ->placeholder('Leave empty for public access')
                                    ->password()
                                    ->revealable(),

                                Forms\Components\Select::make('default_device')
                                    ->options([
                                        'desktop' => 'Desktop (100%)',
                                        'tablet' => 'Tablet (768px)',
                                        'mobile' => 'Mobile (390px)',
                                    ])
                                    ->default('desktop')
                                    ->required(),
                            ]),
                    ])
                    ->columnSpan(['lg' => 1]),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('client_name')
                    ->searchable(),

                Tables\Columns\TextColumn::make('industry')
                    ->badge(),

                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Active'),

                Tables\Columns\TextColumn::make('default_device')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'desktop' => 'info',
                        'tablet' => 'warning',
                        'mobile' => 'success',
                        default => 'gray',
                    }),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Active Status'),
            ])
            ->actions([
                Tables\Actions\Action::make('showcase')
                    ->label('Showcase')
                    ->icon('heroicon-o-device-phone-mobile')
                    ->url(fn (Demo $record): string => route('demos.showcase', $record->slug))
                    ->openUrlInNewTab(),

                Tables\Actions\Action::make('preview')
                    ->label('Fullscreen')
                    ->icon('heroicon-o-arrow-top-right-on-square')
                    ->color('success')
                    ->url(fn (Demo $record): string => route('demos.preview', $record->slug))
                    ->openUrlInNewTab(),

                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDemos::route('/'),
            'create' => Pages\CreateDemo::route('/create'),
            'edit' => Pages\EditDemo::route('/{record}/edit'),
        ];
    }
}
```

Create `app/Filament/Resources/DemoResource/Pages/ListDemos.php`:
```php
<?php

namespace App\Filament\Resources\DemoResource\Pages;

use App\Filament\Resources\DemoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDemos extends ListRecords
{
    protected static string $resource = DemoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
```

Create `app/Filament/Resources/DemoResource/Pages/CreateDemo.php`:
```php
<?php

namespace App\Filament\Resources\DemoResource\Pages;

use App\Filament\Resources\DemoResource;
use Filament\Resources\Pages\CreateRecord;

class CreateDemo extends CreateRecord
{
    protected static string $resource = DemoResource::class;
}
```

Create `app/Filament/Resources/DemoResource/Pages/EditDemo.php`:
```php
<?php

namespace App\Filament\Resources\DemoResource\Pages;

use App\Filament\Resources\DemoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDemo extends EditRecord
{
    protected static string $resource = DemoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
```

- [ ] **Step 4: Run test to verify it passes**

Run: `php artisan test --filter=DemoResourceTest`  
Expected: PASS.

- [ ] **Step 5: Commit**

```bash
git add app/Filament/Resources/DemoResource.php app/Filament/Resources/DemoResource/ tests/Feature/Filament/DemoResourceTest.php
git commit -m "feat(filament): add DemoResource for managing client demo prototypes"
```

---

### Task 4: Database Seeder for Initial Client Prototype (DM&P Advocates)

**Files:**
- Create: `database/seeders/DemoSeeder.php`
- Modify: `database/seeders/DatabaseSeeder.php`
- Test: `tests/Feature/DemoSeederTest.php`

**Interfaces:**
- Consumes: `App\Models\Demo`, initial raw HTML snippet.
- Produces: Populated database with `dmp-advocates` demo prototype.

- [ ] **Step 1: Write the failing test**

Create `tests/Feature/DemoSeederTest.php`:
```php
<?php

namespace Tests\Feature;

use App\Models\Demo;
use Database\Seeders\DemoSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class DemoSeederTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function demo_seeder_populates_dmp_advocates_record()
    {
        $this->seed(DemoSeeder::class);

        $this->assertDatabaseHas('demos', [
            'slug' => 'dmp-advocates',
            'title' => 'DM&P Advocates',
            'client_name' => 'Dhoni Martien & Partners',
            'is_active' => 1,
        ]);

        $demo = Demo::where('slug', 'dmp-advocates')->first();
        $this->assertStringContainsString('DM&P Advocates — Corporate & Commercial Law Firm', $demo->html_content);
        $this->assertStringContainsString('Dhoni Martien, S.H., LL.M.', $demo->html_content);
    }
}
```

- [ ] **Step 2: Run test to verify it fails**

Run: `php artisan test --filter=DemoSeederTest`  
Expected: FAIL (`DemoSeeder` not found).

- [ ] **Step 3: Create DemoSeeder with the exact DM&P Advocates HTML content**

Create `database/seeders/DemoSeeder.php`:
```php
<?php

namespace Database\Seeders;

use App\Models\Demo;
use Illuminate\Database\Seeder;

class DemoSeeder extends Seeder
{
    public function run(): void
    {
        $htmlContent = <<<'HTML'
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DM&P Advocates — Corporate & Commercial Law Firm (SSEK & Makarim Tier-1 Standard)</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400;1,600&family=Playfair+Display:ital,wght@0,600;1,400;1,600&display=swap" rel="stylesheet">
  <style>
    :root {
      --color-bg: #f7fbff;
      --color-surface: #ffffff;
      --color-blue: #2f4e9b;
      --color-lblue: #58b0e3;
      --color-dblue: #223a76;
      --color-navy-dark: #17284d;
      --color-gold: #b89745;
      --color-gold-light: #fcf9f2;
      --color-black: #57595f;
      --color-dark: #22262f;
      --color-muted: #8a9ba8;
      --color-border: #e5edf5;
      --color-border-subtle: rgba(87, 89, 95, 0.15);
      --font-main: 'Montserrat', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
      --font-serif: 'Playfair Display', Georgia, serif;
    }

    * { box-sizing: border-box; margin: 0; padding: 0; }
    body { background: var(--color-bg); font-family: var(--font-main); font-weight: 400; font-size: 15px; line-height: 1.7em; color: var(--color-black); -webkit-font-smoothing: antialiased; overflow-x: hidden; }
    a { color: var(--color-blue); text-decoration: none; transition: 250ms color ease; }
    a:hover { color: var(--color-dblue); }
    .container { max-width: 1440px; margin: 0 auto; padding: 0 40px; }

    .top-bar { background: var(--color-bg); border-bottom: 1px solid var(--color-border); font-size: 12.5px; color: var(--color-black); padding: 8px 0; letter-spacing: 0.05em; }
    .top-bar-inner { display: flex; justify-content: space-between; align-items: center; }
    .top-bar-left span { margin-right: 24px; }
    .top-bar-left strong { color: var(--color-dblue); }
    .top-bar-right { display: flex; align-items: center; gap: 16px; }
    .lang-switcher { display: flex; align-items: center; gap: 6px; font-weight: 600; }
    .lang-btn { padding: 2px 6px; cursor: pointer; border-radius: 3px; font-size: 11.5px; color: var(--color-muted); }
    .lang-btn.active { color: var(--color-dblue); background: rgba(34, 58, 118, 0.08); }

    header.main-header { background: var(--color-surface); border-bottom: 1px solid var(--color-border); position: sticky; top: 0; z-index: 1000; transition: 300ms box-shadow; }
    .header-wrapper { display: flex; align-items: center; justify-content: space-between; height: 80px; }
    .logo-link { display: flex; align-items: center; gap: 12px; text-decoration: none; }
    .logo-icon-svg { width: 44px; height: 44px; background: var(--color-dblue); border-radius: 4px; display: flex; align-items: center; justify-content: center; color: #fff; font-weight: 800; font-size: 18px; border: 1px solid var(--color-gold); }
    .logo-text-box { display: flex; flex-direction: column; }
    .logo-title { font-size: 22px; font-weight: 800; letter-spacing: -0.02em; color: var(--color-dblue); line-height: 1.1; }
    .logo-title span.gold { color: var(--color-gold); }
    .logo-subtitle { font-size: 10.5px; font-weight: 600; letter-spacing: 0.18em; text-transform: uppercase; color: var(--color-muted); margin-top: 2px; }

    nav.main-nav { display: flex; align-items: center; gap: 28px; }
    .nav-item { font-size: 12.5px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.12em; color: var(--color-dblue); opacity: 0.75; padding: 8px 0; position: relative; cursor: pointer; transition: 200ms opacity, 200ms color; }
    .nav-item:hover, .nav-item.active { opacity: 1; color: var(--color-dblue); }
    .nav-item.active::after { content: ''; position: absolute; bottom: 0; left: 0; width: 100%; height: 2px; background: var(--color-gold); }

    .btn-cta { background: var(--color-dblue); color: #ffffff !important; font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.12em; padding: 12px 24px; border-radius: 4px; display: inline-flex; align-items: center; gap: 8px; transition: 250ms background, 250ms transform; cursor: pointer; border: none; }
    .btn-cta:hover { background: var(--color-blue); transform: translateY(-1px); }
    .btn-secondary { background: transparent; color: var(--color-dblue) !important; border: 1px solid var(--color-dblue); font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.12em; padding: 12px 24px; border-radius: 4px; display: inline-flex; align-items: center; gap: 8px; transition: 250ms all; cursor: pointer; }
    .btn-secondary:hover { background: rgba(34, 58, 118, 0.05); border-color: var(--color-blue); }

    .view-section { display: none; }
    .view-section.active-view { display: block; animation: fadeIn 350ms ease forwards; }
    @keyframes fadeIn { from { opacity: 0; transform: translateY(6px); } to { opacity: 1; transform: translateY(0); } }

    .hero-section { background: linear-gradient(180deg, #f7fbff 0%, #edf4fc 100%); padding: 90px 0 70px; border-bottom: 1px solid var(--color-border); position: relative; }
    .hero-grid { display: grid; grid-template-columns: 1.15fr 0.85fr; gap: 60px; align-items: center; }
    .hero-tag { display: inline-flex; align-items: center; gap: 8px; background: var(--color-gold-light); border: 1px solid rgba(184, 151, 69, 0.35); color: var(--color-gold); font-size: 11.5px; font-weight: 700; letter-spacing: 0.18em; text-transform: uppercase; padding: 6px 14px; border-radius: 3px; margin-bottom: 24px; }
    .hero-title { font-size: 46px; font-weight: 800; line-height: 1.25; letter-spacing: -0.02em; color: var(--color-dblue); margin-bottom: 22px; }
    .hero-title span.accent { color: var(--color-blue); }
    .hero-desc { font-size: 16px; line-height: 1.75em; color: var(--color-black); margin-bottom: 34px; max-width: 620px; }
    .hero-actions { display: flex; gap: 16px; align-items: center; margin-bottom: 44px; }
    .hero-stats { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; border-top: 1px solid var(--color-border); padding-top: 28px; }
    .stat-item h4 { font-size: 30px; font-weight: 800; color: var(--color-dblue); line-height: 1; margin-bottom: 6px; }
    .stat-item h4 span.gold { color: var(--color-gold); }
    .stat-item p { font-size: 12.5px; color: var(--color-muted); line-height: 1.4; text-transform: uppercase; letter-spacing: 0.05em; font-weight: 600; margin: 0; }

    .hero-quote-card { background: var(--color-surface); border: 1px solid var(--color-border); border-left: 4px solid var(--color-gold); padding: 40px; border-radius: 4px; box-shadow: 0 12px 36px rgba(34, 58, 118, 0.06); }
    .hero-quote-text { font-family: var(--font-serif); font-size: 19px; line-height: 1.65; color: var(--color-navy-dark); font-style: italic; margin-bottom: 24px; }
    .hero-quote-author { display: flex; align-items: center; gap: 16px; }
    .author-avatar { width: 54px; height: 54px; border-radius: 50%; background: var(--color-dblue); color: #fff; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 18px; }
    .author-info h5 { font-size: 15px; font-weight: 700; color: var(--color-dblue); margin-bottom: 2px; }
    .author-info p { font-size: 12.5px; color: var(--color-gold); font-weight: 600; margin: 0; }

    .accolades-strip { background: var(--color-surface); border-bottom: 1px solid var(--color-border); padding: 30px 0; }
    .accolades-grid { display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 24px; }
    .accolade-item { display: flex; align-items: center; gap: 12px; }
    .accolade-badge { background: var(--color-gold-light); border: 1px solid rgba(184, 151, 69, 0.4); color: var(--color-gold); font-weight: 800; font-size: 11px; padding: 4px 8px; border-radius: 3px; }
    .accolade-text strong { display: block; font-size: 13.5px; font-weight: 700; color: var(--color-dblue); }
    .accolade-text span { font-size: 11.5px; color: var(--color-muted); }

    .section-header { text-align: center; max-width: 760px; margin: 0 auto 54px; }
    .section-tag { font-size: 11.5px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.18em; color: var(--color-gold); margin-bottom: 10px; display: block; }
    .section-title { font-size: 34px; font-weight: 800; color: var(--color-dblue); line-height: 1.3; margin-bottom: 16px; }
    .section-subtitle { font-size: 15.5px; color: var(--color-black); line-height: 1.7; }

    .practices-section { padding: 85px 0; background: var(--color-bg); }
    .practices-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 28px; }
    .practice-card { background: var(--color-surface); border: 1px solid var(--color-border); padding: 34px; border-radius: 4px; transition: 250ms all ease; display: flex; flex-direction: column; justify-content: space-between; }
    .practice-card:hover { transform: translateY(-4px); box-shadow: 0 12px 30px rgba(34, 58, 118, 0.08); border-color: rgba(34, 58, 118, 0.3); }
    .practice-icon-box { width: 44px; height: 44px; background: rgba(34, 58, 118, 0.06); border-radius: 4px; display: flex; align-items: center; justify-content: center; font-size: 20px; margin-bottom: 20px; }
    .practice-card h4 { font-size: 18px; font-weight: 700; color: var(--color-dblue); margin-bottom: 12px; }
    .practice-card p { font-size: 14px; color: var(--color-black); line-height: 1.65; margin-bottom: 22px; flex-grow: 1; }
    .practice-card-link { font-size: 12.5px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em; color: var(--color-gold); display: inline-flex; align-items: center; gap: 6px; }
    .practice-card-link:hover { color: var(--color-dblue); }

    .lawyers-section { padding: 85px 0; background: var(--color-surface); border-top: 1px solid var(--color-border); }
    .filter-bar { display: flex; justify-content: center; gap: 12px; margin-bottom: 44px; flex-wrap: wrap; }
    .filter-pill { background: var(--color-bg); border: 1px solid var(--color-border); color: var(--color-black); font-size: 12.5px; font-weight: 600; padding: 8px 18px; border-radius: 30px; cursor: pointer; transition: 200ms all; }
    .filter-pill:hover, .filter-pill.active { background: var(--color-dblue); color: #ffffff; border-color: var(--color-dblue); }
    .lawyers-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 28px; }
    .lawyer-card { background: var(--color-bg); border: 1px solid var(--color-border); border-radius: 4px; overflow: hidden; transition: 250ms all; cursor: pointer; }
    .lawyer-card:hover { transform: translateY(-4px); box-shadow: 0 14px 32px rgba(34, 58, 118, 0.08); border-color: rgba(34, 58, 118, 0.3); }
    .lawyer-photo-placeholder { height: 260px; background: #e2eaf2; display: flex; flex-direction: column; align-items: center; justify-content: center; position: relative; }
    .lawyer-photo-placeholder span.badge-rank { position: absolute; top: 14px; right: 14px; background: var(--color-dblue); color: #ffffff; font-size: 10px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em; padding: 4px 10px; border-radius: 3px; }
    .lawyer-card-body { padding: 24px; }
    .lawyer-card-body h4 { font-size: 16.5px; font-weight: 700; color: var(--color-dblue); margin-bottom: 4px; }
    .lawyer-card-body .role { font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em; color: var(--color-gold); margin-bottom: 12px; display: block; }
    .lawyer-card-body .specs { font-size: 13px; color: var(--color-black); line-height: 1.5; margin-bottom: 16px; }
    .lawyer-card-body .email-link { font-size: 12px; color: var(--color-blue); font-weight: 600; display: block; }

    .insights-section { padding: 85px 0; background: var(--color-bg); border-top: 1px solid var(--color-border); }
    .insights-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 28px; }
    .insight-card { background: var(--color-surface); border: 1px solid var(--color-border); border-radius: 4px; padding: 30px; display: flex; flex-direction: column; justify-content: space-between; transition: 250ms all; }
    .insight-card:hover { transform: translateY(-3px); box-shadow: 0 10px 25px rgba(34, 58, 118, 0.06); }
    .insight-meta { display: flex; justify-content: space-between; font-size: 11.5px; color: var(--color-muted); font-weight: 600; margin-bottom: 14px; text-transform: uppercase; letter-spacing: 0.05em; }
    .insight-meta span.cat { color: var(--color-blue); font-weight: 700; }
    .insight-card h4 { font-size: 17px; font-weight: 700; color: var(--color-dblue); line-height: 1.4; margin-bottom: 12px; }
    .insight-card p { font-size: 13.5px; color: var(--color-black); line-height: 1.6; margin-bottom: 20px; flex-grow: 1; }

    .contact-section { padding: 85px 0; background: var(--color-surface); border-top: 1px solid var(--color-border); }
    .contact-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 50px; align-items: start; }
    .contact-info-box h3 { font-size: 26px; font-weight: 800; color: var(--color-dblue); margin-bottom: 18px; }
    .contact-info-box p { font-size: 14.5px; color: var(--color-black); margin-bottom: 28px; }
    .hq-card { background: var(--color-bg); border: 1px solid var(--color-border); border-left: 3px solid var(--color-gold); padding: 24px; border-radius: 4px; margin-bottom: 24px; }
    .hq-card h5 { font-size: 14.5px; font-weight: 700; color: var(--color-dblue); margin-bottom: 8px; }
    .hq-card p { font-size: 13px; color: var(--color-black); line-height: 1.6; margin-bottom: 0; }
    .form-box { background: var(--color-bg); border: 1px solid var(--color-border); padding: 36px; border-radius: 4px; }
    .form-group { margin-bottom: 18px; }
    .form-group label { display: block; font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em; color: var(--color-dblue); margin-bottom: 6px; }
    .form-control { width: 100%; padding: 12px 14px; font-family: var(--font-main); font-size: 13.5px; border: 1px solid var(--color-border); border-radius: 3px; background: #ffffff; color: var(--color-dark); outline: none; transition: 200ms border-color; }
    .form-control:focus { border-color: var(--color-blue); }

    footer.main-footer { background: var(--color-dblue); color: #ffffff; padding: 70px 0 30px; }
    .footer-grid { display: grid; grid-template-columns: 1.4fr 1fr 1fr 1fr; gap: 40px; margin-bottom: 50px; border-bottom: 1px solid rgba(255, 255, 255, 0.15); padding-bottom: 40px; }
    .footer-col h5 { font-size: 13px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.15em; color: var(--color-gold); margin-bottom: 20px; }
    .footer-col p { font-size: 13px; color: rgba(255, 255, 255, 0.75); line-height: 1.7; }
    .footer-col ul { list-style: none; }
    .footer-col ul li { margin-bottom: 10px; }
    .footer-col ul li a { color: rgba(255, 255, 255, 0.8); font-size: 13px; transition: 200ms color; }
    .footer-col ul li a:hover { color: #ffffff; }
    .footer-bottom { display: flex; justify-content: space-between; align-items: center; font-size: 12px; color: rgba(255, 255, 255, 0.6); }
    .footer-bottom strong { color: #ffffff; }

    @media (max-width: 992px) {
      .hero-grid, .contact-grid { grid-template-columns: 1fr; }
      .practices-grid, .insights-grid, .lawyers-grid, .footer-grid { grid-template-columns: 1fr 1fr; }
      nav.main-nav { display: none; }
    }
    @media (max-width: 600px) {
      .practices-grid, .insights-grid, .lawyers-grid, .footer-grid { grid-template-columns: 1fr; }
      .hero-title { font-size: 32px; }
      .container { padding: 0 20px; }
    }
  </style>
</head>
<body>
  <div class="top-bar">
    <div class="container">
      <div class="top-bar-inner">
        <div class="top-bar-left">
          <span>📍 <strong>SCBD Office:</strong> Pacific Century Place Level 17, SCBD Jakarta</span>
          <span>📞 <strong>Tel:</strong> +62 21 5088 8899</span>
        </div>
        <div class="top-bar-right">
          <div class="lang-switcher">
            <span class="lang-btn active" id="btn-en" onclick="setLang('EN')">EN</span>
            <span>|</span>
            <span class="lang-btn" id="btn-id" onclick="setLang('ID')">ID</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <header class="main-header">
    <div class="container">
      <div class="header-wrapper">
        <a href="javascript:void(0)" class="logo-link" onclick="switchTab('home')">
          <div class="logo-icon-svg">DM&P</div>
          <div class="logo-text-box">
            <div class="logo-title">DM<span class="gold">&</span>P Advocates</div>
            <div class="logo-subtitle">Dhoni Martien & Partners</div>
          </div>
        </a>
        <nav class="main-nav">
          <div class="nav-item active" id="nav-home" onclick="switchTab('home')">Home</div>
          <div class="nav-item" id="nav-practices" onclick="switchTab('practices')">Practice Areas</div>
          <div class="nav-item" id="nav-lawyers" onclick="switchTab('lawyers')">Our Lawyers</div>
          <div class="nav-item" id="nav-insights" onclick="switchTab('insights')">Insights</div>
          <div class="nav-item" id="nav-rankings" onclick="switchTab('rankings')">Rankings</div>
          <div class="nav-item" id="nav-contact" onclick="switchTab('contact')">Contact</div>
        </nav>
        <div>
          <button class="btn-cta" onclick="switchTab('contact')">Schedule Consultation</button>
        </div>
      </div>
    </div>
  </header>

  <main id="view-home" class="view-section active-view">
    <section class="hero-section">
      <div class="container">
        <div class="hero-grid">
          <div class="hero-content">
            <div class="hero-tag">⚖️ Premier Indonesian Law Firm</div>
            <h1 class="hero-title">Trusted Legal Counsel for Indonesia's <span class="accent">Complex Commercial Mandates.</span></h1>
            <p class="hero-desc">DM&P Advocates provides decisive cross-border M&A advisory, contentious dispute resolution, and regulatory compliance for global multinationals and market leaders.</p>
            <div class="hero-actions">
              <button class="btn-cta" onclick="switchTab('practices')">View Practice Areas →</button>
              <button class="btn-secondary" onclick="switchTab('lawyers')">Meet Our Partners</button>
            </div>
            <div class="hero-stats">
              <div class="stat-item">
                <h4>25<span class="gold">+</span></h4>
                <p>Years Combined Partner Record</p>
              </div>
              <div class="stat-item">
                <h4>$4.2<span class="gold">B+</span></h4>
                <p>Transactions Advised</p>
              </div>
              <div class="stat-item">
                <h4>98<span class="gold">%</span></h4>
                <p>Dispute Resolution Mandate Win</p>
              </div>
            </div>
          </div>
          <div class="hero-sidebar">
            <div class="hero-quote-card">
              <div class="hero-quote-text">
                "In navigating Indonesia's dynamic legal landscape, commercial pragmatism and uncompromising integrity are the cornerstones of successful enterprise execution."
              </div>
              <div class="hero-quote-author">
                <div class="author-avatar">DM</div>
                <div class="author-info">
                  <h5>Dhoni Martien, S.H., LL.M.</h5>
                  <p>Managing Partner | DM&P Advocates</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="accolades-strip">
      <div class="container">
        <div class="accolades-grid">
          <div class="accolade-item">
            <div class="accolade-badge">TIER 1</div>
            <div class="accolade-text">
              <strong>The Legal 500 Asia Pacific</strong>
              <span>Corporate and M&A / Commercial Disputes</span>
            </div>
          </div>
          <div class="accolade-item">
            <div class="accolade-badge">LEADING</div>
            <div class="accolade-text">
              <strong>Chambers and Partners</strong>
              <span>Banking & Project Finance Advisory</span>
            </div>
          </div>
          <div class="accolade-item">
            <div class="accolade-badge">OUTSTANDING</div>
            <div class="accolade-text">
              <strong>Asialaw Profiles</strong>
              <span>Energy, Mining & Infrastructure</span>
            </div>
          </div>
          <div class="accolade-item">
            <div class="accolade-badge">FINALIST</div>
            <div class="accolade-text">
              <strong>ALB Indonesia Law Awards</strong>
              <span>Corporate Law Firm of the Year</span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="practices-section">
      <div class="container">
        <div class="section-header">
          <span class="section-tag">Areas of Expertise</span>
          <h2 class="section-title">Comprehensive Legal Advisory for Enterprise Scale</h2>
          <p class="section-subtitle">We advise multinational corporations, financial institutions, and government agencies across critical economic sectors in Indonesia.</p>
        </div>
        <div class="practices-grid">
          <div class="practice-card">
            <div class="practice-icon-box">🤝</div>
            <h4>Corporate & Cross-Border M&A</h4>
            <p>High-stakes equity acquisitions, joint ventures, BKPM direct investment, and KPPU antitrust notifications.</p>
            <a href="javascript:void(0)" class="practice-card-link" onclick="switchTab('practices')">Explore Scope →</a>
          </div>
          <div class="practice-card">
            <div class="practice-icon-box">⚖️</div>
            <h4>Commercial Litigation & BANI</h4>
            <p>Complex business disputes, bankruptcy (PKPU), and international arbitration under BANI, SIAC, and ICC rules.</p>
            <a href="javascript:void(0)" class="practice-card-link" onclick="switchTab('practices')">Explore Scope →</a>
          </div>
          <div class="practice-card">
            <div class="practice-icon-box">🏦</div>
            <h4>Banking, Finance & Fintech</h4>
            <p>Syndicated credit facilities, project bond issuances, and regulatory licensing under OJK and Bank Indonesia.</p>
            <a href="javascript:void(0)" class="practice-card-link" onclick="switchTab('practices')">Explore Scope →</a>
          </div>
          <div class="practice-card">
            <div class="practice-icon-box">⚡</div>
            <h4>Energy, Mining & Infrastructure</h4>
            <p>Mining IUP concession acquisitions, renewable energy solar/hydro PPAs, and PLN utility regulatory compliance.</p>
            <a href="javascript:void(0)" class="practice-card-link" onclick="switchTab('practices')">Explore Scope →</a>
          </div>
          <div class="practice-card">
            <div class="practice-icon-box">🔐</div>
            <h4>TMT & Data Privacy (UU PDP)</h4>
            <p>Digital platform compliance, enterprise data privacy audit under UU PDP, and intellectual property enforcement.</p>
            <a href="javascript:void(0)" class="practice-card-link" onclick="switchTab('practices')">Explore Scope →</a>
          </div>
          <div class="practice-card">
            <div class="practice-icon-box">👔</div>
            <h4>Employment & Industrial Relations</h4>
            <p>Executive severance, collective labor agreements (PKB), and dispute representation at Pengadilan Hubungan Industrial.</p>
            <a href="javascript:void(0)" class="practice-card-link" onclick="switchTab('practices')">Explore Scope →</a>
          </div>
        </div>
      </div>
    </section>

    <section class="insights-section">
      <div class="container">
        <div class="section-header">
          <span class="section-tag">Legal Intelligence</span>
          <h2 class="section-title">Authoritative Legal Alerts & Bulletins</h2>
          <p class="section-subtitle">Actionable analysis on Indonesian regulatory reforms authored directly by DM&P partners.</p>
        </div>
        <div class="insights-grid">
          <div class="insight-card">
            <div>
              <div class="insight-meta">
                <span class="cat">DATA PRIVACY</span>
                <span>AUG 2026 • 5 MIN READ</span>
              </div>
              <h4>Mandatory Compliance Audit Under Indonesia's PDP Law Enforcement</h4>
              <p>Critical steps for corporate data controllers regarding cross-border transfer mechanisms and mandatory Data Protection Officer (DPO) appointments.</p>
            </div>
            <a href="javascript:void(0)" class="practice-card-link" onclick="switchTab('insights')">Read Legal Alert →</a>
          </div>
          <div class="insight-card">
            <div>
              <div class="insight-meta">
                <span class="cat">ANTITRUST</span>
                <span>JUL 2026 • 4 MIN READ</span>
              </div>
              <h4>KPPU's Stricter Digital Merger Thresholds & Post-Closing Notifications</h4>
              <p>Key takeaways on asset calculation rules and penalty mitigations for multi-tier international acquisitions in Indonesia.</p>
            </div>
            <a href="javascript:void(0)" class="practice-card-link" onclick="switchTab('insights')">Read Legal Alert →</a>
          </div>
          <div class="insight-card">
            <div>
              <div class="insight-meta">
                <span class="cat">ENERGY IPP</span>
                <span>JUN 2026 • 6 MIN READ</span>
              </div>
              <h4>Commercial Structures for Solar & Hydro Power Purchase Agreements (PPA)</h4>
              <p>Analysis of Ministry of Energy & Mineral Resources tariffs, bankability clauses, and PLN grid off-take obligations.</p>
            </div>
            <a href="javascript:void(0)" class="practice-card-link" onclick="switchTab('insights')">Read Legal Alert →</a>
          </div>
        </div>
      </div>
    </section>
  </main>

  <main id="view-practices" class="view-section">
    <section class="hero-section" style="padding: 60px 0 40px;">
      <div class="container">
        <span class="hero-tag">Practice Directory</span>
        <h1 class="hero-title" style="font-size: 38px; margin-bottom: 12px;">Full Spectrum Corporate Legal Capabilities</h1>
        <p class="hero-desc">Explore 12 specialized practice groups dedicated to serving institutional clients with commercial rigor and precision.</p>
      </div>
    </section>
    <section class="practices-section">
      <div class="container">
        <div class="practices-grid">
          <div class="practice-card"><div class="practice-icon-box">01</div><h4>Corporate & M&A</h4><p>High-stakes acquisitions, joint ventures, and PT PMA investments.</p></div>
          <div class="practice-card"><div class="practice-icon-box">02</div><h4>Banking & Finance</h4><p>Syndicated facilities and OJK/BI fintech compliance.</p></div>
          <div class="practice-card"><div class="practice-icon-box">03</div><h4>Commercial Litigation</h4><p>Court representation and trial defense across Indonesia.</p></div>
          <div class="practice-card"><div class="practice-icon-box">04</div><h4>Arbitration & ADR</h4><p>Dispute resolution under BANI, SIAC, and ICC tribunals.</p></div>
          <div class="practice-card"><div class="practice-icon-box">05</div><h4>Insolvency & PKPU</h4><p>Debt restructuring and bankruptcy proceedings.</p></div>
          <div class="practice-card"><div class="practice-icon-box">06</div><h4>Foreign Direct Investment</h4><p>Positive Investment List and OSS-RBA licensing.</p></div>
        </div>
      </div>
    </section>
  </main>

  <main id="view-lawyers" class="view-section">
    <section class="hero-section" style="padding: 60px 0 40px;">
      <div class="container">
        <span class="hero-tag">Attorneys & Counsel</span>
        <h1 class="hero-title" style="font-size: 38px; margin-bottom: 12px;">Distinguished Advocates & Sector Leaders</h1>
        <p class="hero-desc">Meet our partners and senior counsel with licensed bar admissions.</p>
      </div>
    </section>
    <section class="lawyers-section">
      <div class="container">
        <div class="filter-bar">
          <div class="filter-pill active" onclick="filterLawyers('all', this)">All Ranks</div>
          <div class="filter-pill" onclick="filterLawyers('managing', this)">Managing Partner</div>
          <div class="filter-pill" onclick="filterLawyers('partner', this)">Partners</div>
        </div>
        <div class="lawyers-grid">
          <div class="lawyer-card" data-rank="managing" onclick="switchTab('contact')">
            <div class="lawyer-photo-placeholder">
              <span style="font-size: 38px; color: var(--color-dblue);">⚖️</span>
              <span class="badge-rank">Managing Partner</span>
            </div>
            <div class="lawyer-card-body">
              <h4>Dhoni Martien, S.H., LL.M.</h4>
              <span class="role">Managing Partner</span>
              <p class="specs">Cross-Border M&A, Commercial Litigation, Arbitration (BANI & SIAC)</p>
              <span class="email-link">dhoni@dmp-advocates.com</span>
            </div>
          </div>
          <div class="lawyer-card" data-rank="partner" onclick="switchTab('contact')">
            <div class="lawyer-photo-placeholder">
              <span style="font-size: 38px; color: var(--color-dblue);">👔</span>
              <span class="badge-rank">Partner</span>
            </div>
            <div class="lawyer-card-body">
              <h4>Ahmad Prasetyo, S.H., M.Kn.</h4>
              <span class="role">Partner</span>
              <p class="specs">Banking, Project Finance, Syndicated Facilities, Fintech OJK</p>
              <span class="email-link">ahmad@dmp-advocates.com</span>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <main id="view-insights" class="view-section">
    <section class="hero-section" style="padding: 60px 0 40px;">
      <div class="container">
        <span class="hero-tag">Insights & Research</span>
        <h1 class="hero-title" style="font-size: 38px; margin-bottom: 12px;">Indonesian Legal & Regulatory Intelligence</h1>
      </div>
    </section>
  </main>

  <main id="view-rankings" class="view-section">
    <section class="hero-section" style="padding: 60px 0 40px;">
      <div class="container">
        <span class="hero-tag">Directory Accolades</span>
        <h1 class="hero-title" style="font-size: 38px; margin-bottom: 12px;">Global Recognition & Industry Rankings</h1>
      </div>
    </section>
  </main>

  <main id="view-contact" class="view-section">
    <section class="hero-section" style="padding: 60px 0 40px;">
      <div class="container">
        <span class="hero-tag">Direct Intake</span>
        <h1 class="hero-title" style="font-size: 38px; margin-bottom: 12px;">Contact DM&P Advocates</h1>
        <p class="hero-desc">Pacific Century Place Level 17, SCBD Jakarta Selatan</p>
      </div>
    </section>
  </main>

  <footer class="main-footer">
    <div class="container">
      <div class="footer-grid">
        <div class="footer-col">
          <div class="logo-title" style="color: #ffffff; margin-bottom: 6px;">DM<span class="gold">&</span>P Advocates</div>
          <div class="logo-subtitle" style="color: rgba(255, 255, 255, 0.6); margin-bottom: 18px;">Dhoni Martien & Partners</div>
          <p>Premier Indonesian corporate and commercial law firm.</p>
        </div>
        <div class="footer-col">
          <h5>Core Practices</h5>
          <ul>
            <li><a href="javascript:void(0)" onclick="switchTab('practices')">Corporate & M&A</a></li>
            <li><a href="javascript:void(0)" onclick="switchTab('practices')">Commercial Litigation</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h5>Quick Links</h5>
          <ul>
            <li><a href="javascript:void(0)" onclick="switchTab('home')">Home</a></li>
            <li><a href="javascript:void(0)" onclick="switchTab('lawyers')">Our Lawyers</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h5>SCBD Headquarters</h5>
          <p>Pacific Century Place Level 17, SCBD Jakarta<br><strong>Tel:</strong> +62 21 5088 8899</p>
        </div>
      </div>
      <div class="footer-bottom">
        <div>© 2026 <strong>DM&P Advocates</strong>. All rights reserved.</div>
        <div>Engineered by <strong>Accelerate Lab</strong></div>
      </div>
    </div>
  </footer>

  <script>
    function switchTab(tabId) {
      document.querySelectorAll('.view-section').forEach(el => el.classList.remove('active-view'));
      document.querySelectorAll('.nav-item').forEach(el => el.classList.remove('active'));
      const targetView = document.getElementById('view-' + tabId);
      if (targetView) targetView.classList.add('active-view');
      const targetNav = document.getElementById('nav-' + tabId);
      if (targetNav) targetNav.classList.add('active');
      window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function filterLawyers(rank, btn) {
      document.querySelectorAll('.filter-pill').forEach(el => el.classList.remove('active'));
      btn.classList.add('active');
      document.querySelectorAll('.lawyer-card').forEach(card => {
        if (rank === 'all' || card.getAttribute('data-rank') === rank) {
          card.style.display = 'block';
        } else {
          card.style.display = 'none';
        }
      });
    }

    function setLang(lang) {
      document.getElementById('btn-en').classList.toggle('active', lang === 'EN');
      document.getElementById('btn-id').classList.toggle('active', lang === 'ID');
    }
  </script>
</body>
</html>
HTML;

        Demo::updateOrCreate(
            ['slug' => 'dmp-advocates'],
            [
                'title' => 'DM&P Advocates — Corporate & Commercial Law Firm',
                'client_name' => 'Dhoni Martien & Partners',
                'industry' => 'Corporate & Commercial Law',
                'description' => 'Bespoke high-stakes corporate law firm prototype based on SSEK & Makarim Tier-1 standards.',
                'html_content' => $htmlContent,
                'access_passcode' => null,
                'default_device' => 'desktop',
                'is_active' => true,
            ]
        );
    }
}
```

Modify `database/seeders/DatabaseSeeder.php` to call `DemoSeeder::class`.

- [ ] **Step 4: Run test to verify it passes**

Run: `php artisan test --filter=DemoSeederTest`  
Expected: PASS.

- [ ] **Step 5: Commit**

```bash
git add database/seeders/DemoSeeder.php database/seeders/DatabaseSeeder.php tests/Feature/DemoSeederTest.php
git commit -m "feat(seeders): add DemoSeeder for DM&P Advocates initial prototype"
```

---

### Task 5: Full Regression Testing & Verification

**Files:**
- Test: All unit & feature tests in suite (`tests/`)

- [ ] **Step 1: Run complete test suite**

Run: `php artisan test`  
Expected: PASS (All tests pass with 0 failures).

- [ ] **Step 2: Verify asset build cleanliness**

Run: `npm run build`  
Expected: Clean build without errors.
