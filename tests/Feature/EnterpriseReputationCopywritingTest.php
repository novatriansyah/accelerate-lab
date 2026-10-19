<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EnterpriseReputationCopywritingTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_hero_and_bento_proclaim_team_excellence_without_defensive_phrasing(): void
    {
        $response = $this->withSession(['locale' => 'id'])->get('/');
        $response->assertStatus(200);

        // Positive enterprise value propositions
        $response->assertSee('tim insinyur senior dan arsitek sistem terbaik kami', false);
        $response->assertSee('Presisi Rekayasa Sejak Hari Pertama', false);
        $response->assertSee('Konsultasi Solusi Tim Teknis', false);

        // Defensive phrases must be eliminated
        $response->assertDontSee('Tanpa Perantara Sales', false);
        $response->assertDontSee('tanpa perantara sales', false);
    }

    public function test_homepage_english_locale_reflects_team_collective_authority(): void
    {
        $response = $this->withSession(['locale' => 'en'])->get('/');
        $response->assertStatus(200);

        // English enterprise phrasing
        $response->assertSee('dedicated team of senior architects and systems engineers', false);
        $response->assertSee('Architectural Precision from Day One', false);
        $response->assertSee('Consult with Engineering Team', false);

        // Defensive English phrasing must be eliminated
        $response->assertDontSee('zero sales intermediaries', false);
        $response->assertDontSee('Direct Architect Access', false);
    }

    public function test_homepage_faq_and_footer_project_collective_authority(): void
    {
        $response = $this->withSession(['locale' => 'id'])->get('/');
        $response->assertStatus(200);

        // FAQ 1 should highlight best engineering team with strict standards
        $response->assertSee('tim rekayasa terbaik yang kami miliki', false);
        $response->assertSee('Diskusikan kebutuhan bisnis Anda bersama tim rekayasa teknologi kami', false);

        // Ensure no mention of junior lepasan or sales intermediaries
        $response->assertDontSee('junior lepasan', false);
        $response->assertDontSee('handoffs to junior interns', false);
    }

    public function test_consultation_modal_and_trust_signals_use_enterprise_framing(): void
    {
        $response = $this->withSession(['locale' => 'id'])->get('/');
        $response->assertStatus(200);

        // Trust Signals Strip
        $response->assertSee('Dukungan Teknis Berdedikasi', false);
        $response->assertSee('SLA Respons Terjamin', false);

        // Consultation Modal copy
        $response->assertSee('Sesi eksplorasi teknis dan bisnis selama 15 menit', false);
        $response->assertSee('Konsultasi Teknis Mendalam', false);

        // Elimination of negative priming
        $response->assertDontSee('Tanpa tekanan sales', false);
        $response->assertDontSee('Bukan account manager', false);
        $response->assertDontSee('No aggressive sales pitches', false);
        $response->assertDontSee('No junior account managers', false);
    }

    public function test_contact_page_uses_collaborative_engineering_copy(): void
    {
        $response = $this->withSession(['locale' => 'id'])->get('/contact');
        $response->assertStatus(200);

        $response->assertSee('Konsultasi Solusi bersama Tim Teknis', false);
    }
}
