<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class KineticMotionEngineTest extends TestCase
{
    use RefreshDatabase;
    public function test_layout_contains_magnetic_cursor_and_motion_hooks(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('cb-cursor', false);
        $response->assertSee('cb-cursor-text', false);
    }
}
