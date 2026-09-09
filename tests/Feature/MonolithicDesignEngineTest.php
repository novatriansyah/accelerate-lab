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

    public function test_services_overview_and_dedicated_service_pages_render_blueprint(): void
    {
        $cloudService = Service::create([
            'title' => 'Cloud Architecture',
            'slug' => 'cloud-architecture',
            'category' => 'development',
            'has_custom_page' => true,
            'sort_order' => 1,
            'short_description' => 'Enterprise cloud architecture and Kubernetes orchestration.',
            'features' => [['title' => 'Zero-Downtime Migration']],
            'technologies' => [['name' => 'AWS'], ['name' => 'Docker']],
            'process' => [['title' => 'Infrastructure Audit', 'description' => 'Comprehensive review']],
        ]);

        $genericService = Service::create([
            'title' => 'Cybersecurity Strategy',
            'slug' => 'cybersecurity-strategy',
            'category' => 'strategy',
            'has_custom_page' => false,
            'sort_order' => 2,
            'short_description' => 'Offensive defense security strategy.',
            'content' => '<p>Zero-trust perimeter architecture.</p>',
            'benefits' => [['benefit' => 'SOC2 Compliance']],
            'technologies' => [['name' => 'HashiCorp Vault']],
        ]);

        // 1. Test Services Overview
        $overviewResponse = $this->get('/services');
        $overviewResponse->assertStatus(200);
        $overviewResponse->assertSee('Cloud Architecture');
        $overviewResponse->assertSee('Cybersecurity Strategy');
        $overviewResponse->assertSee('rr-btn');

        // 2. Test Custom Dedicated Page
        $customResponse = $this->get('/services/cloud-architecture');
        $customResponse->assertStatus(200);
        $customResponse->assertSee('Cloud Architecture');
        $customResponse->assertSee('Zero-Downtime Migration');
        $customResponse->assertSee('rr-btn');

        // 3. Test Generic Service Page
        $genericResponse = $this->get('/services/cybersecurity-strategy');
        $genericResponse->assertStatus(200);
        $genericResponse->assertSee('Cybersecurity Strategy');
        $genericResponse->assertSee('Zero-trust perimeter architecture.', false);
    }

    public function test_case_studies_and_project_detail_render(): void
    {
        $project = Project::create([
            'title' => 'Autonomous Logistics Dispatcher',
            'slug' => 'autonomous-logistics-dispatcher',
            'client' => 'PT LOGISTIK GLOBAL',
            'industry' => 'Supply Chain',
            'description' => 'Real-time telemetry and route dispatch engine.',
            'challenge' => '<p>Route computation was taking over 4 minutes.</p>',
            'solution' => '<p>Parallelized genetic pathfinding in Rust microservice.</p>',
            'technology_tags' => ['Laravel', 'Rust', 'PostgreSQL'],
            'stats' => [
                ['value' => '94%', 'label' => 'Latency Reduction'],
            ],
            'is_featured' => true,
            'sort_order' => 1,
        ]);

        // 1. Overview
        $listResponse = $this->get('/case-studies');
        $listResponse->assertStatus(200);
        $listResponse->assertSee('Autonomous Logistics Dispatcher');
        $listResponse->assertSee('PT LOGISTIK GLOBAL');
        $listResponse->assertSee('rr-btn');

        // 2. Detail
        $detailResponse = $this->get('/case-studies/autonomous-logistics-dispatcher');
        $detailResponse->assertStatus(200);
        $detailResponse->assertSee('Autonomous Logistics Dispatcher');
        $detailResponse->assertSee('PT LOGISTIK GLOBAL');
        $detailResponse->assertSee('Route computation was taking over 4 minutes.', false);
        $detailResponse->assertSee('94%');
        $detailResponse->assertSee('Latency Reduction');
    }

    public function test_about_careers_contact_and_supporting_pages_render(): void
    {
        // 1. About Page Data
        \App\Models\TeamMember::create([
            'name' => 'Nova Triansyah Azis',
            'role' => 'Founder & Chief Architect',
            'bio' => 'Engineering distributed systems and high-throughput monoliths.',
            'sort_order' => 1,
        ]);

        \App\Models\CompanyMilestone::create([
            'year' => '2024',
            'title' => 'Accelerate Lab Founded',
            'description' => 'Established with a mission of uncompromising software craftsmanship.',
            'sort_order' => 1,
        ]);

        \App\Models\CoreValue::create([
            'title' => 'Extreme Engineering Rigor',
            'description' => 'We reject quick hacks and build durable, observable software.',
            'sort_order' => 1,
        ]);

        \App\Models\HomepageStat::create([
            'value' => '15+',
            'unit' => 'Specialists',
            'label' => 'Engineers & Architects',
            'section' => 'about',
            'sort_order' => 1,
        ]);

        $aboutResponse = $this->get('/about');
        $aboutResponse->assertStatus(200);
        $aboutResponse->assertSee('Nova Triansyah Azis');
        $aboutResponse->assertSee('Founder & Chief Architect');
        $aboutResponse->assertSee('Accelerate Lab Founded');
        $aboutResponse->assertSee('Extreme Engineering Rigor');
        $aboutResponse->assertSee('15+');
        $aboutResponse->assertSee('rr-btn');

        // 2. Careers Page Data
        \App\Models\JobPosting::create([
            'title' => 'Senior Distributed Systems Engineer',
            'slug' => 'senior-distributed-systems-engineer',
            'department' => 'Engineering',
            'location' => 'Remote, Indonesia',
            'type' => 'Full-time',
            'description' => 'Architect high-throughput Laravel micro-monoliths.',
            'is_active' => true,
        ]);

        $careersResponse = $this->get('/careers');
        $careersResponse->assertStatus(200);
        $careersResponse->assertSee('Senior Distributed Systems Engineer');
        $careersResponse->assertSee('Remote, Indonesia');
        $careersResponse->assertSee('rr-btn');

        // 3. Contact Page
        $contactResponse = $this->get('/contact');
        $contactResponse->assertStatus(200);
        $contactResponse->assertSee('name="name"', false);
        $contactResponse->assertSee('name="email"', false);
        $contactResponse->assertSee('PT Akselerasi Digital Mandiri');
        $contactResponse->assertSee('rr-btn');

        // 4. Legal Pages
        $privacyResponse = $this->get('/privacy-policy');
        $privacyResponse->assertStatus(200);
        $privacyResponse->assertSee('Privacy Policy');
        $privacyResponse->assertSee('PT Akselerasi Digital Mandiri');

        $termsResponse = $this->get('/terms-of-service');
        $termsResponse->assertStatus(200);
        $termsResponse->assertSee('Terms of Service');
        $termsResponse->assertSee('PT Akselerasi Digital Mandiri');

        // 5. Blog & Article
        $category = \App\Models\Category::create([
            'name' => 'Architecture',
            'slug' => 'architecture',
        ]);

        $author = \App\Models\User::factory()->create([
            'name' => 'Nova Triansyah Azis',
        ]);

        $article = \App\Models\Article::create([
            'title' => 'The Resurgence of the Majestic Monolith',
            'slug' => 'resurgence-of-majestic-monolith',
            'content' => '<p>Why monolithic architecture wins for fast-paced modern engineering teams.</p>',
            'category_id' => $category->id,
            'user_id' => $author->id,
            'is_featured' => true,
            'published_at' => now()->subDay(),
        ]);

        $blogResponse = $this->get('/blog');
        $blogResponse->assertStatus(200);
        $blogResponse->assertSee('The Resurgence of the Majestic Monolith');
        $blogResponse->assertSee('Architecture');
        $blogResponse->assertSee('rr-btn');

        $articleResponse = $this->get('/blog/resurgence-of-majestic-monolith');
        $articleResponse->assertStatus(200);
        $articleResponse->assertSee('The Resurgence of the Majestic Monolith');
        $articleResponse->assertSee('Why monolithic architecture wins for fast-paced modern engineering teams.', false);

        // 6. 404 Error Page
        $notFoundResponse = $this->get('/non-existent-route-404-check');
        $notFoundResponse->assertStatus(404);
        $notFoundResponse->assertSee('404');
        $notFoundResponse->assertSee('rr-btn');
    }

    public function test_strict_zero_legacy_tokens_and_perfect_theme_awareness(): void
    {
        // Seed required models for all routes
        $service = \App\Models\Service::create([
            'title' => 'Cloud Architecture',
            'slug' => 'cloud-architecture',
            'category' => 'development',
            'has_custom_page' => true,
            'sort_order' => 1,
        ]);

        $project = \App\Models\Project::create([
            'title' => 'Core Banking Engine',
            'slug' => 'core-banking-engine',
            'client' => 'BANK CENTRAL',
            'description' => 'Real-time high throughput core banking system.',
            'sort_order' => 1,
        ]);

        $category = \App\Models\Category::create([
            'name' => 'Systems',
            'slug' => 'systems',
        ]);

        $author = \App\Models\User::factory()->create();

        $article = \App\Models\Article::create([
            'title' => 'Monolithic Resurgence',
            'slug' => 'monolithic-resurgence',
            'content' => '<p>Deep dive.</p>',
            'category_id' => $category->id,
            'user_id' => $author->id,
            'published_at' => now()->subDay(),
        ]);

        $routes = [
            '/',
            '/about',
            '/services',
            '/services/cloud-architecture',
            '/case-studies',
            '/case-studies/core-banking-engine',
            '/careers',
            '/contact',
            '/privacy-policy',
            '/terms-of-service',
            '/blog',
            '/blog/monolithic-resurgence',
        ];

        $legacyTokens = [
            '#d0e7e4',
            '#0b1615',
            '#4e9790',
            'text-slate-dark',
            'border-border-dark',
            'bg-bg-dark',
            'accent-teal-legacy',
        ];

        foreach ($routes as $url) {
            $response = $this->get($url);
            $response->assertStatus(200);

            $content = $response->getContent();

            // Assert absolute zero legacy tokens across all pages
            foreach ($legacyTokens as $token) {
                $this->assertStringNotContainsString(
                    $token,
                    $content,
                    "Legacy token [{$token}] found in rendered response for [{$url}]."
                );
            }

            // Assert authentic branding
            $response->assertSee('Accelerate', false);
            $response->assertSee('/&gt;', false);
            $response->assertSee('Lab', false);

            // Assert theme-aware navbar & footer entity
            $response->assertSee('id="floating-island-navbar"', false);
            $response->assertSee('theme-toggle-btn');
            $response->assertSee('PT Akselerasi Digital Mandiri');
        }
    }
}


