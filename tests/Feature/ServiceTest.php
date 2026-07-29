<?php

namespace Tests\Feature;

use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ServiceTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function services_index_displays_all_services()
    {
        $service1 = Service::factory()->create([
            'title' => 'Custom Web Engineering',
            'category' => 'development',
        ]);

        $service2 = Service::factory()->create([
            'title' => 'Product Architecture',
            'category' => 'strategy',
        ]);

        $response = $this->get('/services');

        $response->assertStatus(200);
        $response->assertSee('Custom Web Engineering');
        $response->assertSee('Product Architecture');
    }

    #[Test]
    public function generic_service_detail_page_renders_successfully()
    {
        $service = Service::factory()->create([
            'title' => 'API Integrations',
            'has_custom_page' => false,
        ]);

        $response = $this->get('/services/' . $service->slug);

        $response->assertStatus(200);
        $response->assertSee('API Integrations');
    }

    #[Test]
    public function custom_service_page_loads_custom_blade_view()
    {
        $service = Service::factory()->create([
            'title' => 'Web Application Development',
            'slug' => 'web-application-development',
            'has_custom_page' => true,
        ]);

        $response = $this->get('/services/' . $service->slug);

        $response->assertStatus(200);
    }
}
