<?php

namespace Tests\Feature;

use App\Models\HomepageStat;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LandingPageMotionActivationTest extends TestCase
{
    use RefreshDatabase;

    public function test_landing_page_contains_motion_engine_hooks(): void
    {
        HomepageStat::create([
            'value' => '99.9',
            'unit' => '%',
            'label' => 'Uptime Guarantee',
            'section' => 'hero',
            'sort_order' => 1,
        ]);

        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('fade-anim', false);
        $response->assertSee('data-direction', false);
        $response->assertSee('t-counter', false);

        $contactResponse = $this->get('/contact');
        $contactResponse->assertStatus(200);
        $contactResponse->assertSee('fade-anim', false);
    }
}
