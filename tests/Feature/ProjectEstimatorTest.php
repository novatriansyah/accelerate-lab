<?php

namespace Tests\Feature;

use App\Models\Lead;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ProjectEstimatorTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function contact_form_accepts_structured_scoping_wizard_payload()
    {
        $payload = [
            'name' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'phone' => '+6281234567890',
            'company' => 'PT Karya Digital',
            'service_interest' => 'Launch a New App Idea (MVP)',
            'project_stage' => 'Figma / Design mockups ready',
            'timeline' => 'Within 1 Month',
            'tech_preference' => 'Laravel & Full-Stack',
            'message' => 'Looking for MVP estimate.',
        ];

        $response = $this->post('/contact', $payload);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('leads', [
            'name' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'source' => 'Project Estimator Wizard',
        ]);

        $lead = Lead::where('email', 'budi@example.com')->first();
        $this->assertNotNull($lead);
        $this->assertStringContainsString('Launch a New App Idea (MVP)', $lead->message);
        $this->assertStringContainsString('Within 1 Month', $lead->message);
    }

    #[Test]
    public function contact_page_renders_interactive_project_estimator_component()
    {
        $response = $this->get('/contact');

        $response->assertStatus(200);
        $response->assertSee('projectEstimator', false);
        $response->assertSee('WhatsApp', false);
    }

    #[Test]
    public function project_estimator_presents_business_options_without_developer_framework_jargon()
    {
        $response = $this->get('/contact');
        $response->assertStatus(200);

        // Business scoping options
        $response->assertSee('Portal Operasional & Dashboard Manajemen');
        $response->assertSee('Sistem Inventori, Penjualan, & Penagihan');

        // Banned technical framework options in client wizard
        $response->assertDontSee('Laravel Monolith');
        $response->assertDontSee('Vue / Nuxt');
        $response->assertDontSee('Node / Python / Go');

        // Turnaround guidance
        $response->assertSee('Estimasi Waktu Pengerjaan');
    }
}
