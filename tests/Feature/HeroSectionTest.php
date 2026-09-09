<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HeroSectionTest extends TestCase
{
    use RefreshDatabase;

    public function test_hero_section_renders_hero_structures(): void
    {
        $response = $this->get(route('home'));
        $response->assertStatus(200);

        // Verify hero classes and brand emblem
        $response->assertSee('hero-area', false);
        $response->assertSee('Accelerate', false);
        $response->assertSee('Lab', false);
        $response->assertSee('/&gt;', false);
        $response->assertSee('Engineering Studio', false);

        // Verify metrics counters
        $response->assertSee('98%');
        $response->assertSee('120+');
    }
}
