<?php

namespace Tests\Feature;

use App\Models\SiteSetting;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FooterCmsWiringTest extends TestCase
{
    use RefreshDatabase;

    public function test_footer_renders_dynamic_site_settings(): void
    {
        SiteSetting::create([
            'key' => 'contact_email',
            'value' => 'corporate@acceleratelab.id',
            'group' => 'contact',
            'is_display' => true,
        ]);

        SiteSetting::create([
            'key' => 'registered_city',
            'value' => 'Central Jakarta, Indonesia',
            'group' => 'general',
            'is_display' => true,
        ]);

        SiteSetting::create([
            'key' => 'linkedin_url',
            'value' => 'https://linkedin.com/company/accelerate-lab-official',
            'group' => 'social',
            'is_display' => true,
        ]);

        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('corporate@acceleratelab.id');
        $response->assertSee('Central Jakarta, Indonesia');
        $response->assertSee('https://linkedin.com/company/accelerate-lab-official');
        $response->assertDontSee('—', false);
        $response->assertDontSee('–', false);
    }
}
