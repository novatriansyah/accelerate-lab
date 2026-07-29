<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Project;
use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class SitemapAndRobotsTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function sitemap_xml_renders_valid_xml_containing_dynamic_urls()
    {
        $article = Article::factory()->create();
        $project = Project::factory()->create();
        $service = Service::factory()->create();

        $response = $this->get('/sitemap.xml');

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'text/xml; charset=utf-8');
        $response->assertSee('<urlset', false);
        $response->assertSee($article->slug);
        $response->assertSee($project->slug);
        $response->assertSee($service->slug);
    }

    #[Test]
    public function robots_txt_returns_text_plain_content()
    {
        $response = $this->get('/robots.txt');

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'text/plain; charset=utf-8');
        $response->assertSee('User-agent: *');
        $response->assertSee('Sitemap:');
    }
}
