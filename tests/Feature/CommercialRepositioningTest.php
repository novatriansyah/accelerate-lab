<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class CommercialRepositioningTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function home_page_renders_repositioned_hero_and_trust_badges()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Dari Website Bisnis Berkelas hingga Sistem Operasional Kustom');
        $response->assertSee('Konsultasi Langsung dengan Principal Architect');
        $response->assertSee('100% Source Code dan Database Hak Milik Anda');
        $response->assertSee('Resmi PT Akselerasi Digital Mandiri');
    }

    #[Test]
    public function home_page_does_not_contain_mixed_english_capability_labels()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertDontSee('Core Capabilities');
        $response->assertDontSee('Product Strategy');
        $response->assertSee('Kapabilitas Utama');
        $response->assertSee('Strategi Produk');
    }

    #[Test]
    public function home_page_has_zero_em_dashes()
    {
        $response = $this->get('/');

        $content = $response->getContent();
        $this->assertStringNotContainsString('—', $content, 'Found em-dash on homepage');
        $this->assertStringNotContainsString('–', $content, 'Found en-dash on homepage');
    }
}
