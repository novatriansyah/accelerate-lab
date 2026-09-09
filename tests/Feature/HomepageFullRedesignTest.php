<?php

namespace Tests\Feature;

use App\Models\HomepageStat;
use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class HomepageFullRedesignTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function homepage_renders_all_curated_sections()
    {
        HomepageStat::factory()->create([
            'section' => 'hero',
            'value' => '99.9',
            'unit' => '%',
            'label' => 'Uptime Guarantee',
            'sort_order' => 1,
        ]);

        Project::factory()->create([
            'title' => 'Core Banking Portal',
            'client' => 'Bank Mandiri Mitra',
            'is_featured' => true,
        ]);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Dari Website Bisnis Berkelas hingga Sistem Operasional Kustom');
        $response->assertSee('Konsultasi Langsung dengan Principal Architect');
        $response->assertSee('100% Source Code dan Database Hak Milik Anda');
        $response->assertSee('Resmi PT Akselerasi Digital Mandiri');
        $response->assertSee('id="hero-cta-primary"', false);
        $response->assertSee('id="hero-cta-secondary"', false);
        $response->assertSee('trusted-partners-marquee', false);
        $response->assertSee('Kapabilitas Utama');
        $response->assertSee('Mengapa Accelerate Lab?');
        $response->assertSee('Core Banking Portal');
        $response->assertSee('process-step-indicator', false);
        $response->assertSee('retainer-scope-matrix', false);
        $response->assertSee('closing-cta-section', false);

        // Check zero em-dashes across content
        $content = $response->getContent();
        $this->assertStringNotContainsString('—', $content, 'Found em-dash in homepage');
        $this->assertStringNotContainsString('–', $content, 'Found en-dash in homepage');
    }
}
