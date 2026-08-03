<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RouteAuditTest extends TestCase
{
    use RefreshDatabase;

    public function test_all_public_pages_return_200(): void
    {
        $routes = [
            '/',
            '/about',
            '/services',
            '/case-studies',
            '/blog',
            '/careers',
            '/contact',
            '/privacy-policy',
            '/terms-of-service',
            '/robots.txt',
            '/sitemap.xml',
        ];

        foreach ($routes as $route) {
            $response = $this->get($route);
            $response->assertStatus(200);
        }
    }

    public function test_legacy_lab_route_redirects_to_blog(): void
    {
        $response = $this->get('/the-lab');
        $response->assertRedirect('/blog');
    }
}
