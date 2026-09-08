<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Category;
use App\Models\JobPosting;
use App\Models\Project;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class SeoStructuredDataTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function article_page_renders_blog_posting_and_breadcrumb_schema(): void
    {
        $author = User::factory()->create(['name' => 'Nova Triansyah Azis']);
        $category = Category::factory()->create(['name' => 'Engineering']);
        $article = Article::factory()->create([
            'title' => 'Scaling Laravel with Octane and Swoole',
            'slug' => 'scaling-laravel-octane',
            'user_id' => $author->id,
            'category_id' => $category->id,
            'published_at' => now()->subDay(),
        ]);

        $response = $this->get("/blog/{$article->slug}");

        $response->assertStatus(200);
        $response->assertSee('"@type": "BlogPosting"', false);
        $response->assertSee('"headline": "Scaling Laravel with Octane and Swoole"', false);
        $response->assertSee('"@type": "BreadcrumbList"', false);
        $response->assertSee('"item": "http://localhost/blog"', false);
    }

    #[Test]
    public function generic_service_page_renders_service_and_breadcrumb_schema(): void
    {
        $service = Service::factory()->create([
            'title' => 'Enterprise DevOps Consulting',
            'slug' => 'devops-consulting',
            'has_custom_page' => false,
            'short_description' => 'Reliable CI/CD pipelines and infrastructure as code.',
        ]);

        $response = $this->get("/services/{$service->slug}");

        $response->assertStatus(200);
        $response->assertSee('"@type": "Service"', false);
        $response->assertSee('"name": "Enterprise DevOps Consulting"', false);
        $response->assertSee('"@type": "BreadcrumbList"', false);
        $response->assertSee('"item": "http://localhost/services"', false);
    }

    #[Test]
    public function custom_service_page_renders_service_and_breadcrumb_schema(): void
    {
        $service = Service::factory()->create([
            'title' => 'Cloud Architecture',
            'slug' => 'cloud-architecture',
            'has_custom_page' => true,
            'short_description' => 'Scalable and secure cloud systems.',
        ]);

        $response = $this->get("/services/{$service->slug}");

        $response->assertStatus(200);
        $response->assertSee('"@type": "Service"', false);
        $response->assertSee('"@type": "BreadcrumbList"', false);
    }

    #[Test]
    public function project_case_study_page_renders_creative_work_and_breadcrumb_schema(): void
    {
        $project = Project::factory()->create([
            'title' => 'Fintech Realtime Trading Portal',
            'slug' => 'fintech-trading-portal',
            'description' => 'High-throughput algorithmic trading engine and dashboard.',
        ]);

        $response = $this->get("/case-studies/{$project->slug}");

        $response->assertStatus(200);
        $response->assertSee('"@type": "CreativeWork"', false);
        $response->assertSee('"name": "Fintech Realtime Trading Portal"', false);
        $response->assertSee('"@type": "BreadcrumbList"', false);
        $response->assertSee('"item": "http://localhost/case-studies"', false);
    }

    #[Test]
    public function careers_page_renders_job_posting_schema_when_active_jobs_exist(): void
    {
        JobPosting::factory()->create([
            'title' => 'Senior Backend Engineer',
            'department' => 'Engineering',
            'location' => 'Remote, Indonesia',
            'type' => 'Full-time',
            'description' => 'Build high-performance microservices and cloud infrastructure.',
            'is_active' => true,
        ]);

        $response = $this->get('/careers');

        $response->assertStatus(200);
        $response->assertSee('"@type": "JobPosting"', false);
        $response->assertSee('"title": "Senior Backend Engineer"', false);
    }

    #[Test]
    public function layout_renders_google_site_verification_when_setting_is_configured(): void
    {
        SiteSetting::create([
            'key' => 'google_site_verification',
            'value' => 'google-verification-token-abc123xyz',
            'group' => 'seo',
            'is_display' => true,
        ]);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('<meta name="google-site-verification" content="google-verification-token-abc123xyz">', false);
    }

    #[Test]
    public function organization_schema_includes_social_links_when_configured(): void
    {
        SiteSetting::create([
            'key' => 'linkedin_url',
            'value' => 'https://linkedin.com/company/accelerate-lab',
            'group' => 'social',
            'is_display' => true,
        ]);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('"sameAs": [', false);
        $response->assertSee('"https://linkedin.com/company/accelerate-lab"', false);
    }

    #[Test]
    public function organization_schema_includes_legal_name_and_alternate_names(): void
    {
        SiteSetting::create([
            'key' => 'legal_name',
            'value' => 'PT Akselerasi Digital Mandiri',
            'group' => 'general',
            'is_display' => true,
        ]);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('"legalName": "PT Akselerasi Digital Mandiri"', false);
        $response->assertSee('"alternateName": [', false);
        $response->assertSee('"PT Akselerasi Digital Mandiri"', false);
    }
}
