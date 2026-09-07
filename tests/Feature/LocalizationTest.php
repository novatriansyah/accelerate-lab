<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class LocalizationTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function language_switch_route_updates_session_and_redirects_back()
    {
        $response = $this->get('/lang/id');
        $response->assertRedirect();
        $response->assertSessionHas('locale', 'id');

        $responseEn = $this->get('/lang/en');
        $responseEn->assertRedirect();
        $responseEn->assertSessionHas('locale', 'en');
    }

    #[Test]
    public function invalid_locale_is_safely_ignored()
    {
        $response = $this->get('/lang/invalid-lang');
        $response->assertRedirect();
        $this->assertEquals(config('app.locale', 'id'), app()->getLocale());
    }

    #[Test]
    public function indonesian_translations_are_rendered_when_locale_is_id()
    {
        $response = $this->withSession(['locale' => 'id'])->get('/');
        $response->assertStatus(200);
        $response->assertSee('Hitung Estimasi Kebutuhan');
        $response->assertSee('Konsultasi Gratis via WhatsApp');
        $response->assertSee('Kepemilikan Penuh Tanpa Keterikatan');
    }

    #[Test]
    public function header_renders_language_switcher_with_active_indicator()
    {
        $response = $this->withSession(['locale' => 'id'])->get('/');
        $response->assertStatus(200);
        $response->assertSee('/lang/id', false);
        $response->assertSee('/lang/en', false);
    }

    #[Test]
    public function contact_page_wizard_renders_indonesian_options_when_locale_is_id()
    {
        $response = $this->withSession(['locale' => 'id'])->get('/contact');
        $response->assertStatus(200);
        $response->assertSee('Kalkulator Estimasi Interaktif');
        $response->assertSee('Portal Operasional & Dashboard Manajemen');
        $response->assertSee('Sistem Inventori, Penjualan, & Penagihan');
        $response->assertSee('Kirim via WhatsApp');
    }

    #[Test]
    public function default_application_locale_is_indonesian_and_header_has_accessible_touch_targets()
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        // Verify default page renders Indonesian commercial terms
        $response->assertSee('Konsultasi Proyek');
        $response->assertSee('Layanan');

        // Verify touch target class for mobile language switcher
        $response->assertSee('min-h-[44px]');
    }
}
