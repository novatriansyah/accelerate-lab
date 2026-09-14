<?php

namespace Tests\Feature;

use App\Models\SiteSetting;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DynamicCmsSettingsCoverageTest extends TestCase
{
    use RefreshDatabase;

    public function test_legal_name_in_privacy_and_terms_is_dynamic_from_cms(): void
    {
        SiteSetting::updateOrCreate(
            ['key' => 'legal_name'],
            ['value' => 'PT Solusi Dinamis Nusantara', 'group' => 'general', 'is_display' => true]
        );

        $privacy = $this->get('/privacy-policy');
        $privacy->assertStatus(200);
        $privacy->assertSee('PT Solusi Dinamis Nusantara');
        $privacy->assertDontSee('PT Akselerasi Digital Mandiri');

        $terms = $this->get('/terms-of-service');
        $terms->assertStatus(200);
        $terms->assertSee('PT Solusi Dinamis Nusantara');
        $terms->assertDontSee('PT Akselerasi Digital Mandiri');

        $about = $this->get('/about');
        $about->assertStatus(200);
        $about->assertSee('PT Solusi Dinamis Nusantara');
        $about->assertDontSee('PT Akselerasi Digital Mandiri');
    }

    public function test_contact_details_in_privacy_and_terms_are_dynamic_from_cms(): void
    {
        SiteSetting::updateOrCreate(
            ['key' => 'contact_email'],
            ['value' => 'custom-legal@acceleratelab.id', 'group' => 'contact', 'is_display' => true]
        );
        SiteSetting::updateOrCreate(
            ['key' => 'contact_whatsapp'],
            ['value' => '+62 899-1111-2222', 'group' => 'contact', 'is_display' => true]
        );
        SiteSetting::updateOrCreate(
            ['key' => 'registered_city'],
            ['value' => 'Surabaya, Indonesia', 'group' => 'general', 'is_display' => true]
        );

        $privacy = $this->get('/privacy-policy');
        $privacy->assertStatus(200);
        $privacy->assertSee('custom-legal@acceleratelab.id');
        $privacy->assertSee('+62 899-1111-2222');
        $privacy->assertSee('Surabaya, Indonesia');
        $privacy->assertDontSee('+62 821-2559-0020');

        $terms = $this->get('/terms-of-service');
        $terms->assertStatus(200);
        $terms->assertSee('custom-legal@acceleratelab.id');
        $terms->assertSee('+62 899-1111-2222');
        $terms->assertSee('Surabaya, Indonesia');
        $terms->assertDontSee('+62 821-2559-0020');
    }

    public function test_consultation_modal_and_estimator_use_dynamic_phone_from_cms(): void
    {
        SiteSetting::updateOrCreate(
            ['key' => 'contact_whatsapp'],
            ['value' => '+62 811-9988-7766', 'group' => 'contact', 'is_display' => true]
        );

        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('6281199887766');
    }

    public function test_careers_email_is_dynamic_from_cms(): void
    {
        SiteSetting::updateOrCreate(
            ['key' => 'careers_email'],
            ['value' => 'talent@acceleratelab.id', 'group' => 'contact', 'is_display' => true]
        );

        $response = $this->get('/careers');
        $response->assertStatus(200);
        $response->assertSee('talent@acceleratelab.id');
    }
}
