<?php

namespace Tests\Feature;

use App\Models\SiteSetting;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ButtonThemeAwarenessTest extends TestCase
{
    use RefreshDatabase;

    public function test_footer_action_banner_buttons_have_explicit_contrast_classes(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        $content = $response->getContent();

        // Ensure footer contains the dark CTA banner
        $this->assertStringContainsString('bento-card relative overflow-hidden bg-slate-900 text-white', $content);

        // Footer buttons inside dark banner must carry explicit contrast override classes
        // so that in light mode, .rr-btn-border text color (#0F172A) does not turn invisible
        $this->assertStringContainsString('!text-white', $content);
        $this->assertStringContainsString('!border-white', $content);
    }

    public function test_design_system_css_contains_outline_and_dark_surface_awareness(): void
    {
        $cssPath = resource_path('css/design-system.css');
        $this->assertFileExists($cssPath);

        $cssContent = file_get_contents($cssPath);

        // Must define .rr-btn-outline
        $this->assertStringContainsString('.rr-btn-outline', $cssContent);

        // Must define dark surface context rule ensuring white text in dark containers
        $this->assertTrue(
            str_contains($cssContent, 'bg-slate-900') || str_contains($cssContent, '.text-white'),
            'CSS must support dark surface context or explicit text-white for outline/border buttons.'
        );

        // Must ensure .rr-btn-primary with .text-white enforces white text
        $this->assertStringContainsString('.rr-btn-primary.text-white', $cssContent);
    }

    public function test_project_estimator_buttons_have_valid_variants_and_kinetic_text(): void
    {
        $rendered = (string) $this->withViewErrors([])->blade('<x-project-estimator />');

        // Estimator buttons must not be bare 'class="rr-btn"' without variant
        $this->assertStringNotContainsString('class="rr-btn">', $rendered);
        $this->assertStringNotContainsString('text-one', $rendered);
        $this->assertStringNotContainsString('text-two', $rendered);
        $this->assertStringContainsString('rr-btn rr-btn-primary', $rendered);
    }

    public function test_error_404_and_careers_buttons_use_styled_button_variants(): void
    {
        $notFoundResponse = $this->get('/non-existent-page-cluster-404');
        $notFoundResponse->assertStatus(404);
        $notFoundContent = $notFoundResponse->getContent();

        // 404 page must use styled rr-btn-primary and rr-btn-outline with padding
        $this->assertStringContainsString('rr-btn rr-btn-primary px-', $notFoundContent);
        $this->assertStringContainsString('rr-btn rr-btn-outline px-', $notFoundContent);

        $careersResponse = $this->get('/careers');
        $careersResponse->assertStatus(200);
        $careersContent = $careersResponse->getContent();

        $this->assertTrue(
            str_contains($careersContent, 'rr-btn rr-btn-primary') || str_contains($careersContent, 'rr-btn rr-btn-outline'),
            'Careers page buttons must use design system variants.'
        );
    }
}
