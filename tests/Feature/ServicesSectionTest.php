<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ServicesSectionTest extends TestCase
{
    use RefreshDatabase;

    public function test_services_section_renders_numbered_structure(): void
    {
        $response = $this->get(route('home'));
        $response->assertStatus(200);

        // Verify service list classes
        $response->assertSee('services-wrapper-1', false);
        $response->assertSee('service-box', false);

        // Verify numbered indices (01) to (04)
        $response->assertSee('(01)');
        $response->assertSee('(02)');
        $response->assertSee('(03)');
        $response->assertSee('(04)');

        // Verify service list sub-items
        $response->assertSee('service-list', false);
    }
}
