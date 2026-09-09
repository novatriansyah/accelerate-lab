<?php

namespace Tests\Feature;

use App\Models\HomepageStat;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GlobalMotionEngineAuditTest extends TestCase
{
    use RefreshDatabase;

    public function test_company_and_research_pages_contain_motion_hooks(): void
    {
        HomepageStat::create([
            'value' => '99.9',
            'unit' => '%',
            'label' => 'Uptime Guarantee',
            'section' => 'hero',
            'sort_order' => 1,
        ]);

        $aboutResponse = $this->get('/about');
        $aboutResponse->assertStatus(200);
        $aboutResponse->assertSee('fade-anim', false);
        $aboutResponse->assertSee('t-counter', false);
        $aboutResponse->assertDontSee('—', false);
        $aboutResponse->assertDontSee('–', false);

        $careersResponse = $this->get('/careers');
        $careersResponse->assertStatus(200);
        $careersResponse->assertSee('fade-anim', false);
        $careersResponse->assertDontSee('—', false);
        $careersResponse->assertDontSee('–', false);

        $labResponse = $this->get('/the-lab');
        $labResponse->assertStatus(301);
        $labResponse->assertRedirect('/blog');
    }
}
