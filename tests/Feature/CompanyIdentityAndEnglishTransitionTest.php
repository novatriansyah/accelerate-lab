<?php

namespace Tests\Feature;

use App\Models\CoreValue;
use Database\Seeders\CoreValueSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class CompanyIdentityAndEnglishTransitionTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function default_locale_is_english_and_layout_renders_en_lang_attribute(): void
    {
        $this->assertEquals('en', config('app.locale'));

        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('lang="en"', false);
    }

    #[Test]
    public function about_page_renders_grounded_vision_mission_and_culture(): void
    {
        $response = $this->get('/about');
        $response->assertStatus(200);

        // Grounded Vision
        $response->assertSee('To be the most dependable digital engineering partner for growing businesses. We build software that works smoothly, looks great, and creates real value.', false);

        // Grounded Mission
        $response->assertSee('To deliver clean, fast, and secure digital products with honest timelines, clear communication, and complete ownership for our clients.', false);

        // Studio Culture
        $response->assertSee('Build it right the first time, be helpful rather than intimidating, and always keep commitments.', false);

        // Zero em-dash or en-dash
        $response->assertDontSee('—', false);
        $response->assertDontSee('–', false);
    }

    #[Test]
    public function about_page_displays_four_grounded_core_values_by_default(): void
    {
        // When DB table is empty
        $this->assertEquals(0, CoreValue::count());

        $response = $this->get('/about');
        $response->assertStatus(200);

        // 1. Quality Over Hype
        $response->assertSee('Quality Over Hype', false);
        $response->assertSee('Clean code, fast loading speeds, and solid architecture, without unnecessary technical jargon or overcomplicated solutions.', false);

        // 2. Honest & Clear Communication
        $response->assertSee('Honest &amp; Clear Communication', false);
        $response->assertSee('No corporate buzzwords or hidden fees. Realistic estimates and plain terms.', false);

        // 3. 100% Client Ownership
        $response->assertSee('100% Client Ownership', false);
        $response->assertSee('Everything we build belongs to the client with zero vendor lock-in.', false);

        // 4. Reliability & Care
        $response->assertSee('Reliability &amp; Care', false);
        $response->assertSee('Thorough testing, meeting deadlines, and dependable long-term support.', false);
    }

    #[Test]
    public function about_page_renders_dynamic_core_values_when_database_records_exist(): void
    {
        CoreValue::create([
            'title' => 'Custom Grounded Value',
            'description' => 'Dynamic database-driven engineering value proposition.',
            'sort_order' => 1,
        ]);

        $response = $this->get('/about');
        $response->assertStatus(200);
        $response->assertSee('Custom Grounded Value', false);
        $response->assertSee('Dynamic database-driven engineering value proposition.', false);
    }

    #[Test]
    public function core_value_seeder_populates_four_grounded_values(): void
    {
        $this->seed(CoreValueSeeder::class);

        $this->assertEquals(4, CoreValue::count());

        $this->assertDatabaseHas('core_values', [
            'title' => 'Quality Over Hype',
            'sort_order' => 1,
        ]);
        $this->assertDatabaseHas('core_values', [
            'title' => 'Honest & Clear Communication',
            'sort_order' => 2,
        ]);
        $this->assertDatabaseHas('core_values', [
            'title' => '100% Client Ownership',
            'sort_order' => 3,
        ]);
        $this->assertDatabaseHas('core_values', [
            'title' => 'Reliability & Care',
            'sort_order' => 4,
        ]);

        foreach (CoreValue::all() as $value) {
            $this->assertStringNotContainsString('—', $value->title);
            $this->assertStringNotContainsString('–', $value->title);
            $this->assertStringNotContainsString('—', $value->description);
            $this->assertStringNotContainsString('–', $value->description);
        }
    }

    #[Test]
    public function navbar_has_zero_language_switchers_or_id_en_toggles(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        // Zero language toggle links or labels
        $response->assertDontSee('/lang/id', false);
        $response->assertDontSee('/lang/en', false);
        $response->assertDontSee('>ID</a>', false);
        $response->assertDontSee('>EN</a>', false);
        $response->assertDontSee('Language:', false);
    }

    #[Test]
    public function frontend_views_contain_zero_current_locale_or_ternary_conditionals(): void
    {
        $viewFiles = [
            resource_path('views/frontend/pages/home.blade.php'),
            resource_path('views/frontend/pages/about.blade.php'),
            resource_path('views/frontend/pages/services.blade.php'),
            resource_path('views/frontend/pages/service.blade.php'),
            resource_path('views/frontend/pages/case-studies.blade.php'),
            resource_path('views/frontend/pages/project.blade.php'),
            resource_path('views/frontend/pages/contact.blade.php'),
            resource_path('views/frontend/pages/web-application-development.blade.php'),
            resource_path('views/frontend/pages/mobile-app-development.blade.php'),
            resource_path('views/frontend/pages/cloud-architecture.blade.php'),
            resource_path('views/frontend/pages/ui-ux-design.blade.php'),
            resource_path('views/frontend/components/trust-signals.blade.php'),
            resource_path('views/frontend/components/footer.blade.php'),
            resource_path('views/frontend/components/company-profile-download.blade.php'),
            resource_path('views/frontend/components/layout.blade.php'),
            resource_path('views/components/consultation-modal.blade.php'),
            resource_path('views/components/project-estimator.blade.php'),
        ];

        foreach ($viewFiles as $filePath) {
            $this->assertFileExists($filePath);
            $content = file_get_contents($filePath);

            $this->assertStringNotContainsString('$currentLocale', $content, "File {$filePath} contains residual \$currentLocale variable.");
            $this->assertStringNotContainsString("app()->getLocale() === 'id'", $content, "File {$filePath} contains residual dual-locale conditional.");
            $this->assertStringNotContainsString("\$locale === 'id'", $content, "File {$filePath} contains residual \$locale conditional.");
        }
    }

    #[Test]
    public function architecture_switcher_renders_in_professional_english_with_zero_em_dashes(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        // Architecture Switcher Headings & Details in Pure English
        $response->assertSee('High-Performance Web Platforms &amp; Business Automation', false);
        $response->assertSee('Fast Response Time &lt; 50ms', false);
        $response->assertSee('Enterprise Security Protection', false);
        $response->assertSee('Clean Architecture &amp; Complete Documentation', false);
        $response->assertSee('100% Repository Ownership', false);

        // Cloud Tab
        $response->assertSee('Resilient Cloud Infrastructure &amp; Operational Continuity', false);
        $response->assertSee('Automated Daily Backups &amp; Disaster Recovery', false);
        $response->assertSee('99.99% Service Uptime SLA', false);

        // Mobile Tab
        $response->assertSee('Responsive Mobile Applications for Customer Retention', false);
        $response->assertSee('Biometric Authentication Security', false);
        $response->assertSee('Dedicated Client App Store Ownership', false);

        // Zero em-dash and en-dash
        $response->assertDontSee('—', false);
        $response->assertDontSee('–', false);
    }
}

