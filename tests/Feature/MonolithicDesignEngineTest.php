<?php

namespace Tests\Feature;

use App\Models\HomepageStat;
use App\Models\Project;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MonolithicDesignEngineTest extends TestCase
{
    use RefreshDatabase;

    public function test_layout_pre_hydration_script_and_theme_engine(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee("localStorage.getItem('theme')", false);
        $response->assertSee('theme-toggle-btn');
    }

    public function test_floating_capsule_navbar_and_authentic_branding(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        
        $content = $response->getContent();
        $this->assertMatchesRegularExpression('/id="floating-island-navbar"/', $content);
        
        $response->assertSee('Accelerate', false);
        $response->assertSee('Lab', false);
        $response->assertSee('/&gt;', false);
        
        // Assert official legal entity in footer
        $response->assertSee('PT Akselerasi Digital Mandiri');
    }

    public function test_kinetic_button_sliding_architecture(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        
        $response->assertSee('rr-btn');
        $response->assertSee('btn-wrap');
        $response->assertSee('text-1');
        $response->assertSee('text-2');
    }

    public function test_homepage_renders_dynamic_cms_data_into_70_30_bento_cards(): void
    {
        Service::query()->delete();
        Project::query()->delete();
        HomepageStat::query()->delete();
        Testimonial::query()->delete();

        // 1. Dynamic Service
        $service = Service::create([
            'title' => 'Enterprise Cloud Fabric',
            'slug' => 'enterprise-cloud-fabric',
            'category' => 'development',
            'sort_order' => 1,
            'short_description' => 'Scalable multi-tenant cloud orchestration with zero latency.',
            'features' => [
                ['title' => 'Autoscaling Mesh'],
                ['title' => 'Zero-Downtime Rollout'],
            ],
        ]);

        // 2. Dynamic Stat
        $stat = HomepageStat::create([
            'value' => '99.99%',
            'unit' => 'SLA',
            'label' => 'Automated High-Availability',
            'section' => 'hero',
            'sort_order' => 1,
        ]);

        // 3. Dynamic Testimonial
        $testimonial = Testimonial::create([
            'client_name' => 'Budi Santoso',
            'client_role' => 'VP of Engineering',
            'client_company' => 'Akselerasi Finansial Corp',
            'quote' => 'Accelerate Lab redesigned our entire architecture seamlessly with zero production disruptions.',
            'is_active' => true,
            'sort_order' => 1,
        ]);

        // 4. Dynamic Project
        $project = Project::create([
            'title' => 'NextGen Core Banking Gateway',
            'slug' => 'nextgen-core-banking-gateway',
            'client' => 'BANK CENTRAL NUSANTARA',
            'description' => 'Real-time transaction settlement engine handling 10,000 TPS.',
            'sort_order' => 1,
        ]);

        $response = $this->get('/');
        $response->assertStatus(200);

        // Assert dynamic database records are present
        $response->assertSee('Enterprise Cloud Fabric');
        $response->assertSee('Autoscaling Mesh');
        $response->assertSee('99.99%');
        $response->assertSee('Automated High-Availability');
        $response->assertSee('Budi Santoso');
        $response->assertSee('NextGen Core Banking Gateway');
        $response->assertSee('BANK CENTRAL NUSANTARA');
    }
}
