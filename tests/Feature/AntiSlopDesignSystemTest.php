<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Strict TDD test enforcing anti-slop design system principles and
 * an authentic, engineer-led boutique studio positioning.
 */
class AntiSlopDesignSystemTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_has_zero_ai_slop_badges_or_fake_terminals(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        // Rotating SVG badge & curve-circle cliché
        $response->assertDontSee('badge-spin', false);
        $response->assertDontSee('curve-circle', false);

        // Fake terminal window with mock cluster active status
        $response->assertDontSee('accelerate-engine://v2.4.0', false);
        $response->assertDontSee('CLUSTER ACTIVE', false);

        // Mock syntax code snippets on a commercial B2B sales page
        $response->assertDontSee('StandarProyek::terapkan', false);
        $response->assertDontSee('StandarMobile::terapkan', false);
        $response->assertDontSee('parameter_keandalan:', false);
    }

    public function test_homepage_highlights_senior_architect_direct_and_business_outcomes(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        // Honest, high-converting value propositions for enterprise B2B clients
        $response->assertSee('senior architects and systems engineers', false);
        $response->assertSee('Architectural Precision from Day One', false);
        $response->assertSee('100% Client Ownership', false);

        // FAQ section addressing buyer friction points
        $response->assertSee('Frequently Asked Questions', false);
    }

    public function test_floating_navbar_is_focused_on_conversion_without_careers_link(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        $content = $response->getContent();

        // The desktop capsule nav within #floating-island-navbar must NOT display the Careers / Karir link
        $this->assertStringContainsString('id="floating-island-navbar"', $content);
        
        // Match nav element inside floating-island-navbar
        preg_match('/<nav aria-label="Main navigation"[^>]*>(.*?)<\/nav>/s', $content, $matches);
        $this->assertNotEmpty($matches, 'Main navigation nav element must exist.');
        
        $navContent = $matches[1];
        $this->assertStringNotContainsString('careers', strtolower($navContent));
        $this->assertStringNotContainsString('karir', strtolower($navContent));
    }

    public function test_footer_omits_hiring_badge_and_fake_squad_claims(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        // No fake hiring badge or squad cosplay
        $response->assertDontSee('>HIRING<', false);
        $response->assertDontSee('senior engineering squad', false);
    }

    public function test_design_system_css_does_not_contain_magnetic_custom_cursor(): void
    {
        $css = file_get_contents(resource_path('css/design-system.css'));

        // Custom magnetic cursor is banned per taste-skill Section 9.A
        $this->assertStringNotContainsString('.cb-cursor', $css);
    }
}
