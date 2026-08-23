<?php

namespace Tests\Feature;

use App\Models\Demo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class SeoDemoExclusionTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function robots_txt_disallows_demos_directory(): void
    {
        $response = $this->get('/robots.txt');

        $response->assertStatus(200);
        $response->assertSee("Disallow: /demos\n", false);
    }

    #[Test]
    public function demo_passcode_page_contains_noindex_nofollow_meta(): void
    {
        $demo = Demo::factory()->create([
            'slug' => 'protected-client-demo',
            'access_passcode' => 'secret123',
            'is_active' => true,
        ]);

        $response = $this->get("/demos/{$demo->slug}");

        $response->assertStatus(200);
        $response->assertSee('<meta name="robots" content="noindex, nofollow">', false);
    }

    #[Test]
    public function demo_showcase_page_contains_noindex_nofollow_meta(): void
    {
        $demo = Demo::factory()->create([
            'slug' => 'open-client-demo',
            'access_passcode' => null,
            'is_active' => true,
        ]);

        $response = $this->get("/demos/{$demo->slug}");

        $response->assertStatus(200);
        $response->assertSee('<meta name="robots" content="noindex, nofollow">', false);
    }

    #[Test]
    public function sitemap_xml_does_not_contain_demo_urls(): void
    {
        Demo::factory()->create([
            'slug' => 'secret-demo-prototype-xyz',
            'is_active' => true,
        ]);

        $response = $this->get('/sitemap.xml');

        $response->assertStatus(200);
        $response->assertDontSee('secret-demo-prototype-xyz');
        $response->assertDontSee('/demos/');
    }
}
