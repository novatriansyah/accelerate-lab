<?php

namespace Tests\Feature;

use App\Models\CompanyMilestone;
use App\Models\CoreValue;
use App\Models\HomepageStat;
use App\Models\JobPosting;
use App\Models\TeamMember;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class CompanyPagesRedesignTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function about_contact_and_careers_pages_render_without_em_dashes()
    {
        $this->seed(\Database\Seeders\DatabaseSeeder::class);

        $pages = [
            '/about' => ['about-hero-section', 'company-manifesto'],
            '/contact' => ['contact-hero-section', 'contact-form'],
            '/careers' => ['careers-hero-section', 'open-roles-section'],
        ];

        foreach ($pages as $route => $anchors) {
            $response = $this->get($route);
            $response->assertStatus(200, "Route {$route} failed with status " . $response->status());

            foreach ($anchors as $anchor) {
                $response->assertSee($anchor, false);
            }

            $content = $response->getContent();
            $this->assertStringNotContainsString('—', $content, "Found em-dash on {$route}");
            $this->assertStringNotContainsString('–', $content, "Found en-dash on {$route}");
        }
    }
}
