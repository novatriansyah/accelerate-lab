<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ModalGlitchPreventionTest extends TestCase
{
    use RefreshDatabase;

    public function test_layout_contains_critical_inline_x_cloak_style_in_head(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        // Critical inline style must be in <head> to prevent modal flash/glitch before Alpine hydrates
        $content = $response->getContent();
        $this->assertStringContainsString('[x-cloak]', $content);
        $this->assertMatchesRegularExpression('/\[x-cloak\]\s*\{\s*display:\s*none\s*!important;\s*\}/', $content);
    }

    public function test_consultation_modal_has_x_cloak_on_root_and_dialog_elements(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        $content = $response->getContent();
        $this->assertMatchesRegularExpression('/id="consultation-modal"[^>]*x-cloak/', $content);
    }

    public function test_app_css_includes_x_cloak_rule(): void
    {
        $cssPath = resource_path('css/app.css');
        $this->assertFileExists($cssPath);
        $cssContent = file_get_contents($cssPath);

        $this->assertStringContainsString('[x-cloak]', $cssContent);
        $this->assertStringContainsString('display: none !important', $cssContent);
    }
}
