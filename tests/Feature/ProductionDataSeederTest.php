<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\CompanyMilestone;
use App\Models\Demo;
use App\Models\HomepageStat;
use App\Models\Project;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\TeamMember;
use App\Models\Technology;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ProductionDataSeederTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function database_seeder_populates_all_production_records()
    {
        $this->seed(DatabaseSeeder::class);

        // 1. User
        $this->assertDatabaseHas('users', [
            'email' => 'nova@acceleratelab.id',
            'name' => 'Nova Triansyah Azis',
        ]);

        // 2. Site Settings
        $this->assertDatabaseHas('site_settings', [
            'key' => 'contact_address',
            'value' => 'Jalan Bintara 9 RT 005 RW 005 No 75',
        ]);
        $this->assertDatabaseHas('site_settings', [
            'key' => 'contact_phone',
            'value' => '+62 877 2131 2985',
        ]);
        $this->assertDatabaseHas('site_settings', [
            'key' => 'legal_name',
            'value' => 'PT Akselerasi Digital Mandiri',
        ]);
        $this->assertDatabaseHas('site_settings', [
            'key' => 'google_tag_id',
            'value' => 'G-GYEYS89WC3',
        ]);

        // 3. Homepage Stats
        $this->assertDatabaseHas('homepage_stats', [
            'section' => 'hero',
            'value' => '99.9',
            'unit' => '%',
            'label' => 'Uptime Guarantee',
        ]);
        $this->assertDatabaseHas('homepage_stats', [
            'section' => 'hero',
            'value' => '2-4',
            'unit' => 'Weeks',
            'label' => 'Deployment Speed',
        ]);
        $this->assertDatabaseHas('homepage_stats', [
            'section' => 'hero',
            'value' => '6+',
            'unit' => 'Years',
            'label' => 'Technical Experience',
        ]);
        $this->assertDatabaseHas('homepage_stats', [
            'section' => 'capabilities',
            'value' => '10',
            'unit' => '+',
            'label' => 'Tech Stack Proficiency',
        ]);

        // 4. Services (Exactly 4, Odoo ERP completely removed)
        $this->assertDatabaseMissing('services', [
            'slug' => 'odoo-erp-implementation',
        ]);
        $this->assertEquals(4, Service::count());
        $this->assertDatabaseHas('services', ['slug' => 'web-application-development']);
        $this->assertDatabaseHas('services', ['slug' => 'mobile-app-development']);
        $this->assertDatabaseHas('services', ['slug' => 'ui-ux-design']);
        $this->assertDatabaseHas('services', ['slug' => 'cloud-architecture']);

        // 5. Projects Reframed Commercially
        $this->assertDatabaseHas('projects', [
            'slug' => 'livestock-management-system',
            'client' => 'PT Sahabat Farm Indonesia',
            'industry' => 'Agriculture',
        ]);
        $this->assertDatabaseHas('projects', [
            'slug' => 'telaah',
            'client' => 'Internal Product',
            'industry' => 'Legal Tech & Artificial Intelligence',
        ]);
        $this->assertEquals(2, Project::count());

        $farmProject = Project::where('slug', 'livestock-management-system')->first();
        $this->assertNotNull($farmProject);
        $this->assertStringNotContainsStringIgnoringCase('pro-bono', $farmProject->description);
        $this->assertStringNotContainsStringIgnoringCase('pro bono', $farmProject->description);

        $telaah = Project::where('slug', 'telaah')->first();
        $this->assertNotNull($telaah);
        $this->assertEmpty($telaah->testimonials); // Self-authored testimonial removed

        // 6. Technologies
        $this->assertDatabaseHas('technologies', ['name' => 'Laravel']);
        $this->assertDatabaseHas('technologies', ['name' => 'Kong Gateway']);
        $this->assertDatabaseHas('technologies', ['name' => 'OpenRouter']);
        $this->assertEquals(13, Technology::count());

        // 7. Team Member
        $this->assertDatabaseHas('team_members', [
            'name' => 'Nova Triansyah Azis',
            'role' => 'CEO & Founder',
        ]);

        // 8. Company Milestone
        $this->assertDatabaseHas('company_milestones', [
            'year' => '2025',
            'title' => 'Founded',
        ]);

        // 9. Demo
        $this->assertDatabaseHas('demos', [
            'slug' => 'dmp-lawfirm',
            'client_name' => 'Dhoni Martien & Partners',
        ]);

        // 10. Strict Zero Em-Dash Rule in Seeded Content
        foreach (Service::all() as $service) {
            $this->assertStringNotContainsString('—', $service->title);
            $this->assertStringNotContainsString('—', (string)$service->short_description);
            $this->assertStringNotContainsString('—', (string)$service->headline);
        }
        foreach (Project::all() as $project) {
            $this->assertStringNotContainsString('—', $project->title);
            $this->assertStringNotContainsString('—', (string)$project->description);
        }
        foreach (Demo::all() as $demo) {
            $this->assertStringNotContainsString('—', $demo->title);
        }
    }
}
