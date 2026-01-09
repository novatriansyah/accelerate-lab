<?php

namespace Tests\Feature;

use App\Models\HomepageStat;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomepageStatTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function homepage_stats_are_displayed_on_home_page()
    {
        // Arrange: Create some stats
        HomepageStat::factory()->create([
            'section' => 'hero',
            'value' => '99.9',
            'unit' => '%',
            'label' => 'Uptime',
            'sort_order' => 1,
        ]);

        HomepageStat::factory()->create([
            'section' => 'capabilities',
            'value' => '50+',
            'unit' => '',
            'label' => 'Projects',
            'sort_order' => 1,
        ]);

        // Act: Visit home page
        $response = $this->get('/');

        // Assert: See the stats
        $response->assertStatus(200);
        $response->assertSee('99.9');
        $response->assertSee('Uptime');
        $response->assertSee('50+');
        $response->assertSee('Projects');
    }

    /** @test */
    public function homepage_uses_fallback_stats_when_no_stats_exist()
    {
        // Act: Visit home page without creating stats
        $response = $this->get('/');

        // Assert: See fallback stats
        $response->assertStatus(200);
        $response->assertSee('Uptime Guarantee'); // From fallback
        $response->assertSee('Client Retention'); // From fallback
    }
}
