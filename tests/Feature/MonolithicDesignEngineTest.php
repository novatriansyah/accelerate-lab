<?php

namespace Tests\Feature;

use App\Models\CompanyMilestone;
use App\Models\CoreValue;
use App\Models\HomepageStat;
use App\Models\JobPosting;
use App\Models\Project;
use App\Models\Service;
use App\Models\TeamMember;
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
}
