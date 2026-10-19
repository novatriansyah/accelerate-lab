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
}
