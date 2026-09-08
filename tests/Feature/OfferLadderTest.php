<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class OfferLadderTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function home_page_renders_two_tier_offer_ladder()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Pilihan Solusi Sesuai Kebutuhan Bisnis Anda');
        $response->assertSee('Website Bisnis Express');
        $response->assertSee('24-48 Jam');
        $response->assertSee('Rp 1.500.000');
        $response->assertSee('Portal Operasional dan Sistem Kustom');
        $response->assertSee('Konsultasi Kebutuhan');
    }

    #[Test]
    public function services_page_presents_starter_and_enterprise_tiers()
    {
        $response = $this->get('/services');

        $response->assertStatus(200);
        $response->assertSee('Website Bisnis Express');
        $response->assertSee('Sistem Operasional Kustom');
    }
}
