<?php

namespace Tests\Feature;

use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ServicesPagesRedesignTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function all_service_pages_render_technical_breakdowns_without_em_dashes()
    {
        $customServices = [
            ['title' => 'Web Application Development', 'slug' => 'web-application-development'],
            ['title' => 'Cloud Architecture & Optimization', 'slug' => 'cloud-architecture'],
            ['title' => 'Mobile App Development', 'slug' => 'mobile-app-development'],
            ['title' => 'UI/UX Design & Conversion Systems', 'slug' => 'ui-ux-design'],
        ];

        foreach ($customServices as $s) {
            Service::factory()->create([
                'title' => $s['title'],
                'slug' => $s['slug'],
                'has_custom_page' => true,
                'category' => 'development',
            ]);
        }

        $routes = [
            '/services',
            '/services/web-application-development',
            '/services/cloud-architecture',
            '/services/mobile-app-development',
            '/services/ui-ux-design',
        ];

        foreach ($routes as $route) {
            $response = $this->get($route);
            $response->assertStatus(200, "Route {$route} failed with status " . $response->status());
            $response->assertSee('service-hero-section', false);

            $content = $response->getContent();
            $this->assertStringNotContainsString('—', $content, "Found em-dash on {$route}");
            $this->assertStringNotContainsString('–', $content, "Found en-dash on {$route}");
        }
    }
}
