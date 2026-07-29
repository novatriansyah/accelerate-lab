<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class PageRoutesTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function public_pages_return_successful_response()
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
            '/sitemap.xml',
            '/robots.txt',
        ];

        foreach ($routes as $route) {
            $response = $this->get($route);
            $response->assertStatus(200);
        }
    }

    #[Test]
    public function security_headers_are_present_on_responses()
    {
        $response = $this->get('/');

        $response->assertHeader('X-Frame-Options', 'SAMEORIGIN');
        $response->assertHeader('X-Content-Type-Options', 'nosniff');
        $response->assertHeader('Referrer-Policy', 'strict-origin-when-cross-origin');
    }
}
