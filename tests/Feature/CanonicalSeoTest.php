<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CanonicalSeoTest extends TestCase
{
    use RefreshDatabase;

    public function test_canonical_url_uses_configured_app_url(): void
    {
        config(['app.url' => 'https://www.acceleratelab.id']);

        $response = $this->get('/about');

        $response->assertStatus(200);
        $response->assertSee('<link rel="canonical" href="https://www.acceleratelab.id/about">', false);
    }

    public function test_json_ld_schema_has_valid_context(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('"@context": "https://schema.org"', false);
        $response->assertDontSee('"@@context"', false);
    }

    public function test_layout_does_not_contain_cdn_alpine(): void
    {
        $response = $this->get('/');

        $response->assertDontSee('cdn.jsdelivr.net/npm/alpinejs', false);
    }

    public function test_html_lang_and_og_locale_reflect_active_locale(): void
    {
        $idResponse = $this->withSession(['locale' => 'id'])->get('/');
        $idResponse->assertStatus(200);
        $idResponse->assertSee('<html lang="id">', false);
        $idResponse->assertSee('<meta property="og:locale" content="id_ID">', false);

        $enResponse = $this->withSession(['locale' => 'en'])->get('/');
        $enResponse->assertStatus(200);
        $enResponse->assertSee('<html lang="en">', false);
        $enResponse->assertSee('<meta property="og:locale" content="en_US">', false);
    }
}
