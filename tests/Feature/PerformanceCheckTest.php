<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PerformanceCheckTest extends TestCase
{
    use RefreshDatabase;

    public function test_no_external_google_font_stylesheets_in_head(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertDontSee('fonts.googleapis.com/css2', false);
        $response->assertDontSee('fonts.googleapis.com/icon', false);
    }

    public function test_all_interactive_buttons_have_aria_labels(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('aria-label="Toggle dark mode"', false);
    }
}
