<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PortfolioSectionTest extends TestCase
{
    use RefreshDatabase;

    public function test_portfolio_section_renders_work_boxes(): void
    {
        $response = $this->get(route('home'));
        $response->assertStatus(200);

        // Verify work-box classes
        $response->assertSee('works-wrapper-1', false);
        $response->assertSee('work-box', false);
        $response->assertSee('image scale', false);
        $response->assertSee('meta', false);

        // Verify button
        $response->assertSee('View All Work');
    }
}
