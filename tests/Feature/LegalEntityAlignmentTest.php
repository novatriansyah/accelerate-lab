<?php

namespace Tests\Feature;

use App\Models\SiteSetting;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class LegalEntityAlignmentTest extends TestCase
{
    use RefreshDatabase;

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
        $response->assertSee('"@type": "Organization"', false);
        $response->assertSee('"name": "Accelerate Lab"', false);
        $response->assertSee('"legalName": "PT Akselerasi Digital Mandiri"', false);
        $response->assertSee('"alternateName": [', false);
        $response->assertSee('"PT Akselerasi Digital Mandiri"', false);
    }

    #[Test]
    public function footer_contains_explicit_brand_ownership_and_legal_entity_statement(): void
    {
        SiteSetting::create([
            'key' => 'legal_name',
            'value' => 'PT Akselerasi Digital Mandiri',
            'group' => 'general',
            'is_display' => true,
        ]);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('PT Akselerasi Digital Mandiri');
        $response->assertSee('Accelerate Lab adalah merek dagang dan studio inovasi teknologi di bawah naungan PT Akselerasi Digital Mandiri.');
    }

    #[Test]
    public function about_page_displays_registered_legal_entity_card(): void
    {
        SiteSetting::create([
            'key' => 'legal_name',
            'value' => 'PT Akselerasi Digital Mandiri',
            'group' => 'general',
            'is_display' => true,
        ]);

        $response = $this->get('/about');

        $response->assertStatus(200);
        $response->assertSee('PT Akselerasi Digital Mandiri');
        $response->assertSee('Entitas Hukum Resmi');
    }

    #[Test]
    public function contact_page_displays_legal_entity_information_card(): void
    {
        SiteSetting::create([
            'key' => 'legal_name',
            'value' => 'PT Akselerasi Digital Mandiri',
            'group' => 'general',
            'is_display' => true,
        ]);

        $response = $this->get('/contact');

        $response->assertStatus(200);
        $response->assertSee('PT Akselerasi Digital Mandiri');
        $response->assertSee('Entitas Legal');
    }
}
