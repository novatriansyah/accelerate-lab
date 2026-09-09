<?php

namespace Tests\Feature;

use App\Models\HomepageStat;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GlobalMotionEngineAuditTest extends TestCase
{
    use RefreshDatabase;

    public function test_company_and_research_pages_contain_motion_hooks(): void
    {
        HomepageStat::create([
            'value' => '99.9',
            'unit' => '%',
            'label' => 'Uptime Guarantee',
            'section' => 'hero',
            'sort_order' => 1,
        ]);

        $aboutResponse = $this->get('/about');
        $aboutResponse->assertStatus(200);
        $aboutResponse->assertSee('fade-anim', false);
        $aboutResponse->assertSee('t-counter', false);
        $aboutResponse->assertDontSee('—', false);
        $aboutResponse->assertDontSee('–', false);

        $careersResponse = $this->get('/careers');
        $careersResponse->assertStatus(200);
        $careersResponse->assertSee('fade-anim', false);
        $careersResponse->assertDontSee('—', false);
        $careersResponse->assertDontSee('–', false);

        $labResponse = $this->get('/the-lab');
        $labResponse->assertStatus(301);
        $labResponse->assertRedirect('/blog');
    }

    public function test_services_overview_and_blueprint_pages_contain_motion_hooks(): void
    {
        $services = [
            'web-application-development' => 'Web Application Development',
            'cloud-architecture' => 'Cloud Architecture & DevOps',
            'mobile-app-development' => 'Mobile App Development',
            'ui-ux-design' => 'UI/UX Product Design',
        ];

        foreach ($services as $slug => $title) {
            \App\Models\Service::create([
                'title' => $title,
                'slug' => $slug,
                'short_description' => 'Test description for ' . $title,
                'content' => '<p>Detailed content</p>',
                'has_custom_page' => true,
                'category' => 'development',
                'sort_order' => 1,
            ]);
        }

        $overviewResponse = $this->get('/services');
        $overviewResponse->assertStatus(200);
        $overviewResponse->assertSee('fade-anim', false);
        $overviewResponse->assertDontSee('—', false);
        $overviewResponse->assertDontSee('–', false);

        foreach (array_keys($services) as $slug) {
            $blueprintResponse = $this->get('/services/' . $slug);
            $blueprintResponse->assertStatus(200);
            $blueprintResponse->assertSee('fade-anim', false);
            $blueprintResponse->assertDontSee('—', false);
            $blueprintResponse->assertDontSee('–', false);
        }
    }

    public function test_portfolio_blog_and_footer_contain_motion_hooks(): void
    {
        $project = \App\Models\Project::create([
            'title' => 'Enterprise Cloud Migration Platform',
            'slug' => 'enterprise-cloud-migration',
            'client' => 'Global Logistics Inc',
            'industry' => 'Logistics & Supply Chain',
            'description' => 'Real-time telemetry and microservices architecture at enterprise scale.',
            'challenge' => '<p>Legacy monolith systems faced synchronization bottlenecks.</p>',
            'solution' => '<p>Engineered zero-downtime distributed cloud architecture.</p>',
            'technology_tags' => ['Kubernetes', 'Go', 'PostgreSQL'],
            'stats' => [
                ['value' => '99.99%', 'label' => 'Service Availability'],
                ['value' => '4.2x', 'label' => 'Throughput Scale'],
            ],
            'is_featured' => true,
        ]);

        $portfolioResponse = $this->get('/case-studies');
        $portfolioResponse->assertStatus(200);
        $portfolioResponse->assertSee('fade-anim', false);
        $portfolioResponse->assertDontSee('—', false);
        $portfolioResponse->assertDontSee('–', false);

        $detailResponse = $this->get('/case-studies/' . $project->slug);
        $detailResponse->assertStatus(200);
        $detailResponse->assertSee('fade-anim', false);
        $detailResponse->assertSee('t-counter', false);
        $detailResponse->assertDontSee('—', false);
        $detailResponse->assertDontSee('–', false);

        $category = \App\Models\Category::create([
            'name' => 'Architecture',
            'slug' => 'architecture',
        ]);

        $author = \App\Models\User::factory()->create([
            'name' => 'Nova Triansyah Azis',
        ]);

        $article = \App\Models\Article::create([
            'title' => 'Engineering High Concurrency Distributed Architectures',
            'slug' => 'engineering-high-concurrency-architectures',
            'content' => '<p>Practical benchmarks from our production engagements.</p>',
            'category_id' => $category->id,
            'user_id' => $author->id,
            'is_featured' => true,
            'published_at' => now(),
        ]);

        $blogResponse = $this->get('/blog');
        $blogResponse->assertStatus(200);
        $blogResponse->assertSee('fade-anim', false);
        $blogResponse->assertDontSee('—', false);
        $blogResponse->assertDontSee('–', false);

        $articleResponse = $this->get('/blog/' . $article->slug);
        $articleResponse->assertStatus(200);
        $articleResponse->assertSee('fade-anim', false);
        $articleResponse->assertDontSee('—', false);
        $articleResponse->assertDontSee('–', false);
    }
}
