<?php

namespace Tests\Feature;

use App\Models\Service;
use App\Models\SiteSetting;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactPageCmsWiringTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_page_renders_cms_settings_and_dynamic_services(): void
    {
        SiteSetting::create([
            'key' => 'contact_email',
            'value' => 'inquiry@acceleratelab.id',
            'group' => 'contact',
            'is_display' => true,
        ]);

        SiteSetting::create([
            'key' => 'contact_phone',
            'value' => '+62 899-1122-3344',
            'group' => 'contact',
            'is_display' => true,
        ]);

        SiteSetting::create([
            'key' => 'registered_city',
            'value' => 'Jakarta Special Capital Region, Indonesia',
            'group' => 'general',
            'is_display' => true,
        ]);

        Service::create([
            'title' => 'Enterprise Cloud Architecture',
            'slug' => 'enterprise-cloud-architecture',
            'category' => 'development',
            'sort_order' => 1,
        ]);

        $response = $this->get('/contact');
        $response->assertStatus(200);
        $response->assertSee('inquiry@acceleratelab.id');
        $response->assertSee('+62 899-1122-3344');
        $response->assertSee('Jakarta Special Capital Region, Indonesia');
        $response->assertSee('Enterprise Cloud Architecture');
        $response->assertDontSee('—', false);
        $response->assertDontSee('–', false);
    }
}
