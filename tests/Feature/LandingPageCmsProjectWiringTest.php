<?php

namespace Tests\Feature;

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LandingPageCmsProjectWiringTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_renders_project_image_and_metadata_from_cms(): void
    {
        $project = Project::create([
            'title' => 'Alpha Logistics Core',
            'slug' => 'alpha-logistics-core',
            'client' => 'PT Alpha Nusantara',
            'industry' => 'Supply Chain',
            'description' => 'Real-time fleet tracking and automated dispatch engine.',
            'image_path' => 'projects/alpha-preview.webp',
            'sort_order' => 1,
        ]);

        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Alpha Logistics Core');
        $response->assertSee('PT Alpha Nusantara');
        $response->assertSee('projects/alpha-preview.webp');
        $response->assertDontSee('—', false);
        $response->assertDontSee('–', false);
    }
}
