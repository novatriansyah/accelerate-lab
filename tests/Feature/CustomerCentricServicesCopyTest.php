<?php

namespace Tests\Feature;

use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CustomerCentricServicesCopyTest extends TestCase
{
    use RefreshDatabase;

    public function test_services_and_blueprint_pages_are_tech_agnostic(): void
    {
        $slugs = [
            'cloud-architecture',
            'web-application-development',
            'mobile-app-development',
            'ui-ux-design',
        ];

        foreach ($slugs as $slug) {
            Service::create([
                'title' => ucwords(str_replace('-', ' ', $slug)),
                'slug' => $slug,
                'category' => 'development',
                'has_custom_page' => true,
                'sort_order' => 1,
            ]);
        }

        $routes = [
            '/services',
            '/services/cloud-architecture',
            '/services/web-application-development',
            '/services/mobile-app-development',
            '/services/ui-ux-design',
        ];

        $forbidden = [
            'Kubernetes',
            'Docker',
            'Next.js',
            'React Native',
            'Flutter',
            'Tailwind',
            'Laravel',
        ];

        foreach ($routes as $route) {
            $response = $this->get($route);
            $response->assertStatus(200);
            foreach ($forbidden as $tech) {
                $response->assertDontSee($tech, false);
            }
        }
    }
}
