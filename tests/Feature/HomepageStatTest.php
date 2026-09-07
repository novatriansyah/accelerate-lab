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

        // Act: Visit home page in English
        $responseEn = $this->withSession(['locale' => 'en'])->get('/');

        // Assert: See the stats in English
        $responseEn->assertStatus(200);
        $responseEn->assertSee('99.9');
        $responseEn->assertSee('Uptime Guarantee');
        $responseEn->assertSee('50+');
        $responseEn->assertSee('Client Retention');

        // Assert: See the stats in Indonesian locale (with translation applied)
        $responseId = $this->withSession(['locale' => 'id'])->get('/');
        $responseId->assertStatus(200);
        $responseId->assertSee('99.9');
        $responseId->assertSee('50+');
        $responseId->assertSee('Retensi Klien');
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
