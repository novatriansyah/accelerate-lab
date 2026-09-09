<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BentoGridTest extends TestCase
{
    use RefreshDatabase;

    public function test_bento_grid_renders_bento_layout(): void
    {
        $response = $this->get(route('home'));
        $response->assertStatus(200);

        // Verify bento grid classes
        $response->assertSee('grid grid-cols-12', false);
        $response->assertSee('lg:col-span-8', false);
        $response->assertSee('lg:col-span-4', false);
        $response->assertSee('rounded-[20px]', false);

        // Verify technical capability headings
        $response->assertSee('Architecture First');
        $response->assertSee('Reliable & Scalable Code');
    }
}
