<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Category;
use App\Models\JobPosting;
use App\Models\Project;
use App\Models\Service;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ThemeAndFullSitePortingTest extends TestCase
{
    use RefreshDatabase;

    public function test_layout_contains_theme_pre_hydration_script_and_toggle(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        // Pre-hydration anti-flash script in head
        $response->assertSee("localStorage.getItem('theme')", false);
        $response->assertSee('theme-toggle-btn');
    }

    public function test_header_renders_authentic_accelerate_lab_brand_logo(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        // Ensure authentic branding Accelerate/>Lab exists
        $response->assertSee('Accelerate', false);
        $response->assertSee('Lab', false);
        $response->assertSee('/&gt;', false);
        $content = $response->getContent();
        $this->assertMatchesRegularExpression('/id="floating-island-navbar"/', $content);
    }

    public function test_homepage_renders_dynamic_services_from_database(): void
    {
        Service::query()->delete();

        $serviceA = Service::create([
            'title' => 'Custom Enterprise ERP Suite',
            'slug' => 'custom-enterprise-erp-suite',
            'category' => 'development',
            'sort_order' => 1,
            'is_active' => true,
            'features' => [
                ['title' => 'Automated Ledger Sync'],
                ['title' => 'Warehouse Realtime Tracking'],
            ],
            'short_description' => 'Tailored ERP system for medium-to-large business operations.',
        ]);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Custom Enterprise ERP Suite');
        $response->assertSee('Automated Ledger Sync');
        $response->assertSee('Warehouse Realtime Tracking');
    }

    public function test_all_major_internal_pages_render_design_engine_kinetic_buttons(): void
    {
        $routes = [
            '/',
            '/services',
            '/case-studies',
            '/about',
            '/contact',
            '/careers',
            '/blog',
        ];

        foreach ($routes as $route) {
            $response = $this->get($route);
            $response->assertStatus(200);
            $content = $response->getContent();
            // Assert rr-btn exists inside <main
            $this->assertStringContainsString('rr-btn', $content);
        }
    }

    private function ensureCustomServicesExist(): void
    {
        $customPages = [
            ['title' => 'Cloud Architecture', 'slug' => 'cloud-architecture', 'category' => 'development', 'has_custom_page' => true],
            ['title' => 'Mobile App Development', 'slug' => 'mobile-app-development', 'category' => 'development', 'has_custom_page' => true],
            ['title' => 'UI/UX Design', 'slug' => 'ui-ux-design', 'category' => 'strategy', 'has_custom_page' => true],
            ['title' => 'Web Application Development', 'slug' => 'web-application-development', 'category' => 'development', 'has_custom_page' => true],
            ['title' => 'General DevOps Service', 'slug' => 'general-devops', 'category' => 'development', 'has_custom_page' => false],
        ];

        foreach ($customPages as $data) {
            Service::firstOrCreate(
                ['slug' => $data['slug']],
                [
                    'title' => $data['title'],
                    'category' => $data['category'],
                    'has_custom_page' => $data['has_custom_page'],
                    'is_active' => true,
                    'short_description' => 'Professional engineering service by Accelerate Lab.',
                    'content' => '<p>High performance digital development and architecture.</p>',
                    'features' => [['title' => 'Continuous Integration', 'icon' => 'check_circle']],
                    'process' => [['title' => 'Discovery', 'description' => 'Scoping and KPI definition']],
                ]
            );
        }
    }

    public function test_internal_pages_main_section_has_kinetic_buttons_and_theme_awareness(): void
    {
        $this->ensureCustomServicesExist();

        $routes = [
            '/services',
            '/case-studies',
            '/about',
            '/careers',
            '/services/cloud-architecture',
            '/services/mobile-app-development',
            '/services/ui-ux-design',
            '/services/web-application-development',
            '/services/general-devops',
        ];

        foreach ($routes as $route) {
            $response = $this->get($route);
            $response->assertStatus(200);
            $content = $response->getContent();

            // Extract main content
            if (preg_match('/<main[^>]*>(.*?)<\/main>/s', $content, $matches)) {
                $mainHtml = $matches[1];
                $this->assertStringContainsString('rr-btn', $mainHtml, "Page {$route} main section must contain rr-btn kinetic buttons");
            } else {
                // If section-based layout
                $this->assertStringContainsString('rr-btn', $content, "Page {$route} must contain rr-btn kinetic buttons");
            }
        }
    }

    public function test_views_have_no_awkward_legacy_colors_or_classes(): void
    {
        $this->ensureCustomServicesExist();

        $project = Project::firstOrCreate(
            ['slug' => 'sample-fintech-solution'],
            [
                'title' => 'Sample Fintech Solution',
                'description' => 'Scalable financial platform.',
                'industry' => 'Fintech',
                'challenge' => '<p>High concurrency transaction bottleneck.</p>',
                'solution' => '<p>Microservice architecture with event sourcing.</p>',
                'technology_tags' => ['Laravel', 'PostgreSQL', 'Redis'],
                'stats' => [['value' => '99.99%', 'label' => 'Uptime']],
                'is_featured' => true,
            ]
        );

        $routes = [
            '/',
            '/services',
            '/case-studies',
            '/case-studies/' . $project->slug,
            '/about',
            '/contact',
            '/careers',
            '/blog',
            '/services/cloud-architecture',
            '/services/mobile-app-development',
            '/services/ui-ux-design',
            '/services/web-application-development',
            '/services/general-devops',
            '/privacy-policy',
            '/terms-of-service',
        ];

        $awkwardStrings = [
            '#d0e7e4',
            '#0b1615',
            '#4e9790',
            '#2d4544',
            '#0d1817',
            'text-slate-dark',
            'text-slate-medium',
            'text-text-header',
            'text-text-main',
            'text-text-secondary',
            'border-border-light',
            'border-border-dark',
            'bg-background-light',
            'bg-background-dark',
            'bg-surface-light',
            'bg-surface-dark',
            'dark:bg-surface-dark',
        ];

        foreach ($routes as $route) {
            $response = $this->get($route);
            $response->assertStatus(200);
            $content = $response->getContent();

            foreach ($awkwardStrings as $awkward) {
                $this->assertStringNotContainsString($awkward, $content, "Page {$route} must not contain awkward legacy string '{$awkward}'");
            }
        }
    }

    public function test_404_page_is_theme_aware_and_has_kinetic_buttons(): void
    {
        $response = $this->get('/a-page-that-definitely-does-not-exist');
        $response->assertStatus(404);
        $content = $response->getContent();

        $this->assertStringContainsString('rr-btn', $content);

        $awkwardStrings = [
            'bg-background-light',
            'bg-background-dark',
            'bg-surface-light',
            'bg-surface-dark',
        ];

        foreach ($awkwardStrings as $awkward) {
            $this->assertStringNotContainsString($awkward, $content, "404 page must not contain '{$awkward}'");
        }
    }
}

