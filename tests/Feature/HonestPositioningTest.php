<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Enforces honest positioning across all public-facing pages.
 *
 * Rules:
 * - No fabricated KPI percentages in hardcoded code snippet mockups
 * - No fake "Enterprise Deployments" fallback when no DB stats exist
 * - WhatsApp links must use wa.me format and appear in key conversion zones
 * - SLA badges on service cards must carry specific, deliverable language
 * - Service sidebar contact box must link to WhatsApp, not just /contact
 */
class HonestPositioningTest extends TestCase
{
    use RefreshDatabase;

    // -------------------------------------------------------------------------
    // 1. No fake KPI metrics in hardcoded code snippet mockups
    // -------------------------------------------------------------------------

    public function test_home_page_does_not_display_fabricated_conversion_percentages(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        // These are made-up KPIs that were hardcoded in the architecture switcher mockups
        $response->assertDontSee('+148%', false);
        $response->assertDontSee('+215%', false);
        $response->assertDontSee("'Peningkatan Konversi Penjualan' => '+148%'", false);
        $response->assertDontSee("'Peningkatan Transaksi Berulang' => '+215%'", false);
    }

    public function test_home_page_does_not_display_fabricated_satisfaction_rating(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        // Fake 4.9/5.0 rating was hardcoded with no source
        $response->assertDontSee('4.9 / 5.0', false);
        $response->assertDontSee("'Rating Kepuasan Pengguna' => '4.9 / 5.0'", false);
    }

    // -------------------------------------------------------------------------
    // 2. Fake fallback stats removed (when no DB records exist)
    // -------------------------------------------------------------------------

    public function test_home_hero_stats_do_not_show_fake_enterprise_deployments_when_empty(): void
    {
        // No HomepageStat records seeded — tests the @empty fallback
        $response = $this->get('/');
        $response->assertStatus(200);

        $response->assertDontSee('50+', false);
        $response->assertDontSee('Enterprise Deployments', false);
        $response->assertDontSee('Implementasi Enterprise', false);
    }

    public function test_about_page_stats_do_not_show_fake_enterprise_releases_when_empty(): void
    {
        // No about-page stats seeded — tests the @else fallback
        $response = $this->get('/about');
        $response->assertStatus(200);

        $response->assertDontSee('50+', false);
        $response->assertDontSee('Enterprise Releases', false);
        $response->assertDontSee('15m', false); // "Mean Response Time" placeholder
    }

    // -------------------------------------------------------------------------
    // 3. WhatsApp-first CTAs present in key conversion zones
    // -------------------------------------------------------------------------

    public function test_home_page_contains_whatsapp_cta(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        // wa.me link must appear — either direct or via consultation modal trigger
        $response->assertSee('wa.me', false);
    }

    public function test_contact_page_has_prominent_whatsapp_link(): void
    {
        $response = $this->get('/contact');
        $response->assertStatus(200);

        $response->assertSee('wa.me', false);
    }

    public function test_service_page_sidebar_has_whatsapp_link(): void
    {
        \App\Models\Service::create([
            'title'             => 'Web Application Development',
            'slug'              => 'web-application-development',
            'short_description' => 'Custom web applications built for performance.',
            'content'           => '<p>Full-stack web engineering.</p>',
            'category'          => 'development',
            'sort_order'        => 1,
        ]);

        $response = $this->get('/services/web-application-development');
        $response->assertStatus(200);

        $response->assertSee('wa.me', false);
    }

    public function test_footer_contains_whatsapp_link(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        // Footer CTA banner must include a WhatsApp link
        $response->assertSee('wa.me', false);
    }

    // -------------------------------------------------------------------------
    // 4. Service cards carry specific, real SLA commitment language
    // -------------------------------------------------------------------------

    public function test_services_page_cards_do_not_show_vague_enterprise_standard_badge(): void
    {
        \App\Models\Service::create([
            'title'             => 'Cloud Architecture & DevOps',
            'slug'              => 'cloud-architecture',
            'short_description' => 'Resilient cloud infrastructure.',
            'content'           => '<p>Cloud engineering.</p>',
            'category'          => 'development',
            'sort_order'        => 1,
        ]);

        $response = $this->get('/services');
        $response->assertStatus(200);

        // "ENTERPRISE GRADE" is still fine as a quality signal — but the vague
        // footer badge "Strict SLA Supported" with no specifics must be replaced
        $response->assertDontSee('Strict SLA Supported', false);
    }

    public function test_home_service_bento_cards_do_not_show_vague_enterprise_standard_badge(): void
    {
        \App\Models\Service::create([
            'title'             => 'Web Application Development',
            'slug'              => 'web-application-development',
            'short_description' => 'Custom high-performance web systems.',
            'content'           => '<p>Full-stack web engineering.</p>',
            'category'          => 'development',
            'sort_order'        => 1,
        ]);

        $response = $this->get('/');
        $response->assertStatus(200);

        // Vague unsubstantiated badge must be gone from bento cards
        $response->assertDontSee('Enterprise Standard', false);
    }

    // -------------------------------------------------------------------------
    // 5. Honest methodology signals present instead
    // -------------------------------------------------------------------------

    public function test_home_page_shows_honest_methodology_signals(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        // At least one of these honest, verifiable signals must appear
        $hasHonestSignal = str_contains($response->getContent(), 'NDA')
            || str_contains($response->getContent(), 'Test-Driven')
            || str_contains($response->getContent(), 'TDD')
            || str_contains($response->getContent(), 'Zero Tech Debt')
            || str_contains($response->getContent(), '100% Client Code Ownership')
            || str_contains($response->getContent(), 'Kepemilikan Kode');

        $this->assertTrue($hasHonestSignal, 'Home page must display at least one verifiable methodology signal.');
    }

    public function test_home_page_shows_legal_entity_name(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        // Legal entity is a real, verifiable trust signal
        $response->assertSee('PT Akselerasi Digital Mandiri', false);
    }
}
