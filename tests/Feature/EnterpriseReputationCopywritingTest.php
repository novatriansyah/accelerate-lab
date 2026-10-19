<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EnterpriseReputationCopywritingTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_hero_and_bento_proclaim_team_excellence_without_defensive_phrasing(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        // Positive enterprise value propositions
        $response->assertSee('dedicated team of senior architects and systems engineers', false);
        $response->assertSee('Architectural Precision from Day One', false);
        $response->assertSee('Consult with Engineering Team', false);

        // Defensive phrases must be eliminated
        $response->assertDontSee('Tanpa Perantara Sales', false);
        $response->assertDontSee('zero sales intermediaries', false);
        $response->assertDontSee('Direct Architect Access', false);
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
        $response = $this->get('/');
        $response->assertStatus(200);

        // FAQ 1 should highlight best engineering team with strict standards
        $response->assertSee('Your project is engineered by our premier technical team', false);
        $response->assertSee('Partner with our dedicated engineering team today', false);

        // Ensure no mention of junior interns or sales intermediaries
        $response->assertDontSee('junior lepasan', false);
        $response->assertDontSee('handoffs to junior interns', false);
    }

    public function test_consultation_modal_and_trust_signals_use_enterprise_framing(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        // Trust Signals Strip
        $response->assertSee('Dedicated Engineering Support', false);
        $response->assertSee('Guaranteed Response &lt; 2 Hours', false);

        // Consultation Modal copy
        $response->assertSee('15-minute technical and strategic discovery session', false);
        $response->assertSee('Direct Technical Alignment', false);

        // Elimination of negative priming
        $response->assertDontSee('Tanpa tekanan sales', false);
        $response->assertDontSee('Bukan account manager', false);
        $response->assertDontSee('No aggressive sales pitches', false);
        $response->assertDontSee('No junior account managers', false);
    }

    public function test_contact_page_uses_collaborative_engineering_copy(): void
    {
        $response = $this->get('/contact');
        $response->assertStatus(200);

        $response->assertSee('Direct Consultation with Technical Lead', false);
    }
}
