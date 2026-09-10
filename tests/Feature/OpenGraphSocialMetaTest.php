<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OpenGraphSocialMetaTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_renders_complete_default_opengraph_and_twitter_tags(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        // OpenGraph protocol tags
        $response->assertSee('<meta property="og:site_name" content="Accelerate Lab">', false);
        $response->assertSee('<meta property="og:type" content="website">', false);
        $response->assertSee('<meta property="og:title" content="Accelerate Lab - Digital Innovation Agency">', false);
        $response->assertSee('<meta property="og:url" content="http://localhost">', false);
        $response->assertSee('<meta property="og:image" content="http://localhost/images/og-cover.png">', false);
        $response->assertSee('<meta property="og:image:secure_url" content="http://localhost/images/og-cover.png">', false);
        $response->assertSee('<meta property="og:image:width" content="1200">', false);
        $response->assertSee('<meta property="og:image:height" content="630">', false);
        $response->assertSee('<meta property="og:image:type" content="image/png">', false);

        // Twitter Card tags
        $response->assertSee('<meta name="twitter:card" content="summary_large_image">', false);
        $response->assertSee('<meta name="twitter:title" content="Accelerate Lab - Digital Innovation Agency">', false);
        $response->assertSee('<meta name="twitter:image" content="http://localhost/images/og-cover.png">', false);
    }
}
