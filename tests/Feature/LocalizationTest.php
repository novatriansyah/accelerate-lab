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
        $this->assertEquals(config('app.fallback_locale', 'en'), app()->getLocale());
    }

    #[Test]
    public function indonesian_translations_are_rendered_when_locale_is_id()
    {
        $response = $this->withSession(['locale' => 'id'])->get('/');
        $response->assertStatus(200);
        $response->assertSee('Estimasi Proyek', false);
        $response->assertSee('Konsultasi Gratis 15-Menit', false);
        $response->assertSee('100% Hak Milik Source Code', false);
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
        $response->assertSee('Kalkulator Estimasi Interaktif', false);
        $response->assertSee('Ide Aplikasi Baru (MVP)', false);
        $response->assertSee('Portal Pelanggan', false);
        $response->assertSee('Kirim via WhatsApp', false);
    }
}
