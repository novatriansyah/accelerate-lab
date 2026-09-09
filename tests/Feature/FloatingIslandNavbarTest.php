<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FloatingIslandNavbarTest extends TestCase
{
    use RefreshDatabase;

    public function test_floating_island_navbar_renders_capsule_structure_and_routes(): void
    {
        $response = $this->get(route('home'));
        $response->assertStatus(200);

        // Verify floating capsule container
        $response->assertSee('id="floating-island-navbar"', false);
        $response->assertSee('rounded-full', false);
        $response->assertSee('fixed top-5 left-1/2 -translate-x-1/2', false);
        $response->assertSee('backdrop-blur', false);

        // Verify brand and navigation links
        $response->assertSee(route('home'));
        $response->assertSee(route('about'));
        $response->assertSee(route('services'));
        $response->assertSee(route('case-studies'));
        $response->assertSee(route('contact'));

        // Verify kinetic CTA button (.rr-btn)
        $response->assertSee('rr-btn', false);
        $response->assertSee('btn-wrap', false);
        $response->assertSee('text-one', false);
        $response->assertSee('text-two', false);
    }
}
