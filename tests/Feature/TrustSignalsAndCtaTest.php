<?php

namespace Tests\Feature;

use App\Models\SiteSetting;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TrustSignalsAndCtaTest extends TestCase
{
    use RefreshDatabase;

    public function test_trust_signals_strip_is_displayed_on_homepage(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        // Verifiable trust signals strip
        $response->assertSee('PT Akselerasi Digital Mandiri', false);
        $this->assertTrue(
            str_contains($response->getContent(), 'UU PDP') || str_contains($response->getContent(), 'PDP Law'),
            'Homepage must display PDP Law compliance signal.'
        );
        $this->assertTrue(
            str_contains($response->getContent(), 'NDA') || str_contains($response->getContent(), 'Non-Disclosure'),
            'Homepage must display NDA signal.'
        );
        $this->assertTrue(
            str_contains($response->getContent(), '100%') || str_contains($response->getContent(), 'Kode Klien'),
            'Homepage must display code ownership signal.'
        );
    }

    public function test_trust_signals_strip_is_displayed_on_about_page(): void
    {
        $response = $this->get('/about');
        $response->assertStatus(200);

        $this->assertTrue(
            str_contains($response->getContent(), 'UU PDP') || str_contains($response->getContent(), 'PDP Law'),
            'About page must display PDP Law compliance signal.'
        );
        $this->assertTrue(
            str_contains($response->getContent(), 'PT Akselerasi Digital Mandiri'),
            'About page must display legal entity name.'
        );
    }

    public function test_footer_cta_banner_includes_direct_whatsapp_button(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        // Footer action banner must contain direct WhatsApp action button
        $response->assertSee('Chat WhatsApp', false);
    }

    public function test_company_profile_download_component_hidden_when_setting_empty(): void
    {
        SiteSetting::where('key', 'company_profile_pdf_url')->delete();

        $response = $this->get('/about');
        $response->assertStatus(200);

        $response->assertDontSee('Unduh Company Profile', false);
        $response->assertDontSee('Download Company Profile', false);
    }

    public function test_company_profile_download_component_visible_when_setting_present(): void
    {
        SiteSetting::updateOrCreate(
            ['key' => 'company_profile_pdf_url'],
            ['value' => 'https://acceleratelab.id/docs/company-profile.pdf', 'type' => 'text']
        );

        $response = $this->get('/about');
        $response->assertStatus(200);

        $response->assertSee('https://acceleratelab.id/docs/company-profile.pdf', false);
        $this->assertTrue(
            str_contains($response->getContent(), 'Company Profile') || str_contains($response->getContent(), 'Profil Perusahaan'),
            'About page must render Company Profile download CTA when setting is present.'
        );
    }

    public function test_contact_page_has_whatsapp_quick_action_card(): void
    {
        $response = $this->get('/contact');
        $response->assertStatus(200);

        // Contact page quick action card for rapid WhatsApp inquiry
        $response->assertSee('WhatsApp Hotline', false);
    }
}
