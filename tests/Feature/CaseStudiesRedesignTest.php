<?php

namespace Tests\Feature;

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class CaseStudiesRedesignTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function case_studies_index_renders_curated_grid_without_em_dashes()
    {
        Project::factory()->featured()->create([
            'title' => 'Core Banking Modernization',
            'industry' => 'Fintech',
        ]);

        Project::factory()->create([
            'title' => 'Supply Chain Telemetry',
            'industry' => 'Logistics',
        ]);

        $response = $this->get('/case-studies');

        $response->assertStatus(200);
        $response->assertSee('case-studies-header', false);
        $response->assertSee('case-studies-grid', false);

        $content = $response->getContent();
        $this->assertStringNotContainsString('—', $content, 'Found em-dash on /case-studies');
        $this->assertStringNotContainsString('–', $content, 'Found en-dash on /case-studies');
    }

    #[Test]
    public function project_deep_dive_renders_architecture_overview_without_em_dashes()
    {
        $project = Project::factory()->create([
            'title' => 'Scalable IoT Ingestion Pipeline',
            'slug' => 'scalable-iot-pipeline',
            'industry' => 'IoT',
            'challenge' => 'Handling 500k packets per second with sub-second latency.',
            'solution' => 'Engineered event-driven microservices on top of Kafka and Redis.',
        ]);

        $response = $this->get('/case-studies/' . $project->slug);

        $response->assertStatus(200);
        $response->assertSee('project-hero-section', false);
        $response->assertSee('project-architecture-overview', false);

        $content = $response->getContent();
        $this->assertStringNotContainsString('—', $content, "Found em-dash on /case-studies/{$project->slug}");
        $this->assertStringNotContainsString('–', $content, "Found en-dash on /case-studies/{$project->slug}");
    }
}
