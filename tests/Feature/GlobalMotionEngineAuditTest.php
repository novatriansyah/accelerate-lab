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

    public function test_services_overview_and_blueprint_pages_contain_motion_hooks(): void
    {
        $services = [
            'web-application-development' => 'Web Application Development',
            'cloud-architecture' => 'Cloud Architecture & DevOps',
            'mobile-app-development' => 'Mobile App Development',
            'ui-ux-design' => 'UI/UX Product Design',
        ];

        foreach ($services as $slug => $title) {
            \App\Models\Service::create([
                'title' => $title,
                'slug' => $slug,
                'short_description' => 'Test description for ' . $title,
                'content' => '<p>Detailed content</p>',
                'has_custom_page' => true,
                'category' => 'development',
                'sort_order' => 1,
            ]);
        }

        $overviewResponse = $this->get('/services');
        $overviewResponse->assertStatus(200);
        $overviewResponse->assertSee('fade-anim', false);
        $overviewResponse->assertDontSee('—', false);
        $overviewResponse->assertDontSee('–', false);

        foreach (array_keys($services) as $slug) {
            $blueprintResponse = $this->get('/services/' . $slug);
            $blueprintResponse->assertStatus(200);
            $blueprintResponse->assertSee('fade-anim', false);
            $blueprintResponse->assertDontSee('—', false);
            $blueprintResponse->assertDontSee('–', false);
        }
    }
}
