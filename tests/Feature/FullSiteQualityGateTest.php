<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Category;
use App\Models\Project;
use App\Models\Service;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class FullSiteQualityGateTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function full_site_public_routes_satisfy_strict_quality_gate()
    {
        $this->seed(\Database\Seeders\DatabaseSeeder::class);

        // Ensure seeded article exists
        $article = Article::first();
        if (! $article) {
            $author = User::factory()->create();
            $category = Category::factory()->create(['name' => 'Architecture']);
            $article = Article::factory()->create([
                'title' => 'Building NextGen Web Platforms',
                'slug' => 'building-nextgen-web-platforms',
                'category_id' => $category->id,
                'user_id' => $author->id,
                'published_at' => now(),
            ]);
        }

        // Ensure seeded custom service exists
        $service = Service::where('has_custom_page', true)->first() ?? Service::first();

        // Ensure seeded project exists
        $project = Project::first() ?? Project::factory()->create([
            'title' => 'Enterprise Cloud System',
            'slug' => 'enterprise-cloud-system',
        ]);

        $routes = [
            '/',
            '/about',
            '/services',
            '/services/' . $service->slug,
            '/case-studies',
            '/case-studies/' . $project->slug,
            '/blog',
            '/blog/' . $article->slug,
            '/careers',
            '/contact',
            '/privacy-policy',
            '/terms-of-service',
        ];

        foreach ($routes as $route) {
            $response = $this->get($route);
            $response->assertStatus(200, "Route {$route} failed with status " . $response->status());

            $html = $response->getContent();

            // Zero Em-Dash / En-Dash Rule
            $this->assertStringNotContainsString('—', $html, "Violation: Found em-dash on {$route}");
            $this->assertStringNotContainsString('–', $html, "Violation: Found en-dash on {$route}");

            // Image Accessibility: Every <img> must have an alt attribute
            if (preg_match_all('/<img\s+[^>]*>/i', $html, $matches)) {
                foreach ($matches[0] as $imgTag) {
                    $this->assertMatchesRegularExpression(
                        '/alt="[^"]*"/i',
                        $imgTag,
                        "Accessibility Violation: <img> tag lacks alt attribute on {$route}: {$imgTag}"
                    );
                }
            }
        }
    }

    #[Test]
    public function blog_and_article_pages_contain_required_editorial_sections()
    {
        $author = User::factory()->create();
        $category = Category::factory()->create(['name' => 'Engineering']);
        $article = Article::factory()->create([
            'title' => 'Designing Resilient Distributed Systems',
            'slug' => 'designing-resilient-systems',
            'category_id' => $category->id,
            'user_id' => $author->id,
            'published_at' => now(),
        ]);

        $blogResponse = $this->get('/blog');
        $blogResponse->assertStatus(200);
        $blogResponse->assertSee('blog-hero-section', false);
        $blogResponse->assertSee('articles-grid', false);

        $articleResponse = $this->get('/blog/' . $article->slug);
        $articleResponse->assertStatus(200);
        $articleResponse->assertSee('article-header', false);
        $articleResponse->assertSee('article-content-body', false);
    }
}
