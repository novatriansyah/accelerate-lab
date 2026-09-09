<?php

namespace Tests\Feature;

use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\File;
use Tests\TestCase;

class CopyrightSanitizationTest extends TestCase
{
    use RefreshDatabase;

    public function test_no_mentions_of_external_templates_in_source_views_and_css(): void
    {
        $scanPaths = [
            resource_path('views'),
            resource_path('css'),
            resource_path('js'),
        ];

        foreach ($scanPaths as $path) {
            $files = File::allFiles($path);
            foreach ($files as $file) {
                $content = file_get_contents($file->getRealPath());
                $this->assertDoesNotMatchRegularExpression(
                    '/(redox|nextsaas)/i',
                    $content,
                    "External template reference found in source file: {$file->getRelativePathname()}"
                );
            }
        }
    }

    public function test_no_mentions_of_external_templates_in_rendered_http_responses(): void
    {
        // Seed blueprint services so routes do not 404
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
            '/',
            '/about',
            '/services',
            '/services/cloud-architecture',
            '/services/web-application-development',
            '/services/mobile-app-development',
            '/services/ui-ux-design',
            '/case-studies',
            '/contact',
            '/careers',
            '/blog',
        ];

        foreach ($routes as $route) {
            $response = $this->get($route);
            $response->assertStatus(200);
            $response->assertDontSee('Redox', false);
            $response->assertDontSee('NextSaaS', false);
            $response->assertDontSee('redox', false);
            $response->assertDontSee('nextsaas', false);
        }
    }
}
