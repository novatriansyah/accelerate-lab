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
    public function sitemap_xml_excludes_services_with_missing_custom_page_views()
    {
        // Service with custom page enabled, but view does not exist
        $serviceWithoutView = Service::factory()->create([
            'slug' => 'non-existent-custom-view-service-xyz',
            'has_custom_page' => true,
        ]);

        $response = $this->get('/sitemap.xml');

        $response->assertStatus(200);
        $response->assertDontSee($serviceWithoutView->slug);
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

    #[Test]
    public function every_url_in_sitemap_returns_http_200()
    {
        Article::factory()->create();
        Project::factory()->create();
        Service::factory()->create(['has_custom_page' => false]);

        $response = $this->get('/sitemap.xml');
        $response->assertStatus(200);

        $xml = simplexml_load_string($response->getContent());
        $urls = [];

        foreach ($xml->url as $urlElement) {
            $urls[] = (string) $urlElement->loc;
        }

        $this->assertNotEmpty($urls);

        foreach ($urls as $url) {
            $path = parse_url($url, PHP_URL_PATH);
            $pageResponse = $this->get($path);
            $pageResponse->assertStatus(200);
        }
    }
}
