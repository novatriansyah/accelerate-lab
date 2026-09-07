<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Category;
use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class UiUxDesignSystemTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function public_pages_have_single_h1_heading()
    {
        $routes = ['/', '/about', '/services', '/case-studies', '/contact', '/blog', '/careers', '/privacy-policy', '/terms-of-service'];

        foreach ($routes as $route) {
            $response = $this->get($route);
            $response->assertStatus(200);

            $content = $response->getContent();
            preg_match_all('/<h1\b[^>]*>/i', $content, $matches);

            $this->assertCount(1, $matches[0], "Route {$route} does not have exactly one <h1> heading.");
        }
    }

    #[Test]
    public function public_pages_contain_semantic_html_landmarks()
    {
        $routes = ['/', '/about', '/services', '/case-studies', '/contact', '/blog', '/careers'];

        foreach ($routes as $route) {
            $response = $this->get($route);
            $response->assertStatus(200);

            $response->assertSee('<header', false);
            $response->assertSee('<main', false);
            $response->assertSee('<footer', false);
        }
    }

    #[Test]
    public function base_layout_includes_dark_mode_theme_support()
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        $content = $response->getContent();
        $this->assertStringContainsString('theme', strtolower($content));
        $this->assertStringContainsString('dark', strtolower($content));
    }

    #[Test]
    public function images_on_rendered_pages_have_alt_attributes()
    {
        $user = User::factory()->create();
        $category = Category::factory()->create();
        Article::factory()->create([
            'user_id' => $user->id,
            'category_id' => $category->id,
            'published_at' => now()->subDay(),
        ]);
        Project::factory()->create();

        $routes = ['/', '/blog', '/case-studies', '/about'];

        foreach ($routes as $route) {
            $response = $this->get($route);
            $response->assertStatus(200);

            $content = $response->getContent();
            preg_match_all('/<img\b(?![^>]*\balt=)[^>]*>/i', $content, $matches);

            $this->assertEmpty($matches[0], "Route {$route} contains <img> tags without alt attribute: " . implode(', ', $matches[0]));
        }
    }

    #[Test]
    public function home_and_header_include_plain_english_consultation_triggers()
    {
        $response = $this->withSession(['locale' => 'en'])->get('/');
        $response->assertStatus(200);
        $response->assertSee('consultation-modal', false);
        $response->assertSee('15-Min', false);
    }

    #[Test]
    public function plain_english_enterprise_guarantees_are_rendered()
    {
        $response = $this->withSession(['locale' => 'en'])->get('/');
        $response->assertStatus(200);
        $response->assertSee('100% Full IP Ownership', false);
        $response->assertSee('Tested for High Reliability', false);
    }

    #[Test]
    public function case_study_and_service_pages_render_contextual_scoping_ctas()
    {
        $project = Project::factory()->create([
            'title' => 'Fintech Core',
            'slug' => 'fintech-core',
        ]);
        $response = $this->withSession(['locale' => 'en'])->get('/case-studies/' . $project->slug);
        $response->assertStatus(200);
        $response->assertSee('Estimate', false);
        $response->assertSee('15-Min', false);

        $servicesResponse = $this->withSession(['locale' => 'en'])->get('/services');
        $servicesResponse->assertStatus(200);
        $servicesResponse->assertSee('Estimate Your Project', false);
    }

    #[Test]
    public function home_hero_renders_business_dashboard_graphic_without_code_terminal_tells()
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        // Banned AI Tells
        $response->assertDontSee('deploy.sh');
        $response->assertDontSee('git push origin production');
        $response->assertDontSee('Building optimizations...');

        // Required Business Dashboard Metrics
        $response->assertSee('Akurasi Inventori');
        $response->assertSee('Pesanan Terproses');
        $response->assertSee('Sistem Aktif 24/7');
    }

    #[Test]
    public function home_renders_operational_comparison_and_meaningful_process_flow()
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        // Verifies spreadsheet comparison exists
        $response->assertSee('Tantangan Manual vs. Sistem Kustom');
        $response->assertSee('Spreadsheet Tercecer');
        $response->assertSee('Database Terpusat');

        // Verifies generic step labels are eliminated
        $response->assertDontSee('Step 1');
        $response->assertDontSee('Step 2');
        $response->assertDontSee('Step 3');
        $response->assertDontSee('Step 4');

        // Verifies fake TS code snippet is removed
        $response->assertDontSee('AccelerateLabController.ts');
        $response->assertDontSee('@accelerate-lab/core');
    }
}
