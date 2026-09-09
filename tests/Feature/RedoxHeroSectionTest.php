<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RedoxHeroSectionTest extends TestCase
{
    use RefreshDatabase;

    public function test_hero_section_renders_redox_structures(): void
    {
        $response = $this->get(route('home'));
        $response->assertStatus(200);

        // Verify authentic Redox hero classes
        $response->assertSee('hero-area', false);
        $response->assertSee('circle-text-wrapper', false);
        $response->assertSee('circle-text', false);

        // Verify SVG text rotation structure
        $response->assertSee('viewBox="0 0 100 100"', false);
        $response->assertSee('textPath', false);

        // Verify metrics counters
        $response->assertSee('98%');
        $response->assertSee('120+');
    }
}
