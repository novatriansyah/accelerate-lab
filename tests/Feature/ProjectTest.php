<?php

namespace Tests\Feature;

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function case_studies_index_displays_featured_and_regular_projects()
    {
        $featured = Project::factory()->featured()->create([
            'title' => 'Featured Platform',
            'industry' => 'Fintech',
        ]);

        $project = Project::factory()->create([
            'title' => 'Standard SaaS Portal',
            'industry' => 'Healthcare',
        ]);

        $response = $this->get('/case-studies');

        $response->assertStatus(200);
        $response->assertSee('Featured Platform');
        $response->assertSee('Standard SaaS Portal');
        $response->assertSee('Fintech');
        $response->assertSee('Healthcare');
    }

    #[Test]
    public function case_studies_can_be_filtered_by_industry()
    {
        Project::factory()->create([
            'title' => 'Fintech App',
            'industry' => 'Fintech',
        ]);

        Project::factory()->create([
            'title' => 'Health App',
            'industry' => 'Healthcare',
        ]);

        $response = $this->get('/case-studies?industry=Fintech');

        $response->assertStatus(200);
        $response->assertSee('Fintech App');
        $response->assertDontSee('Health App');
    }

    #[Test]
    public function project_detail_page_displays_project_info()
    {
        $project = Project::factory()->create([
            'title' => 'Enterprise Payment Engine',
        ]);

        $response = $this->get('/case-studies/' . $project->slug);

        $response->assertStatus(200);
        $response->assertSee('Enterprise Payment Engine');
    }

    #[Test]
    public function case_studies_page_highlights_business_roi_and_sme_blueprints()
    {
        $this->seed(\Database\Seeders\DatabaseSeeder::class);

        $response = $this->get('/case-studies');
        $response->assertStatus(200);

        // Verifies business ROI metrics are highlighted
        $response->assertSee('Efisiensi Operasional');
        $response->assertSee('35%');

        // Verifies SME operational blueprints exist
        $response->assertSee('Blueprint Solusi Operasional');
        $response->assertSee('Inventori Multi-Gudang');
        $response->assertSee('Invoicing Otomatis');

        // Verifies DM&P Lawfirm interactive demo preview card exists
        $response->assertSee('/demos/dmp-lawfirm');
    }
}
