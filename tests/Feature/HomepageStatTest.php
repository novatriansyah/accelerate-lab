<?php

namespace Tests\Feature;

use App\Models\HomepageStat;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomepageStatTest extends TestCase
{
    use RefreshDatabase;

    #[\PHPUnit\Framework\Attributes\Test]
    public function homepage_stats_are_displayed_on_home_page()
    {
        // Arrange: Create some stats
        HomepageStat::factory()->create([
            'section' => 'hero',
            'value' => '99.9',
            'unit' => '%',
            'label' => 'Uptime Guarantee',
            'sort_order' => 1,
        ]);

        HomepageStat::factory()->create([
            'section' => 'capabilities',
            'value' => '50+',
            'unit' => '',
            'label' => 'Client Retention',
            'sort_order' => 1,
        ]);

        // Act: Visit home page
        $response = $this->get('/');

        // Assert: See the stats
        $response->assertStatus(200);
        $response->assertSee('99.9');
        $response->assertSee('Uptime Guarantee');
        $response->assertSee('50+');
        $response->assertSee('Client Retention');
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function homepage_uses_fallback_stats_when_no_stats_exist()
    {
        // Act: Visit home page without creating stats
        $response = $this->get('/');

        // Assert: Home page renders successfully
        $response->assertStatus(200);
    }
}
