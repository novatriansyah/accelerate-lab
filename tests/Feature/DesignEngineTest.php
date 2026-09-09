<?php

namespace Tests\Feature;

use Tests\TestCase;

class DesignEngineTest extends TestCase
{
    public function test_design_engine_css_file_exists_and_contains_authentic_classes(): void
    {
        $cssPath = resource_path('css/design-engine.css');
        $this->assertFileExists($cssPath);

        $cssContent = file_get_contents($cssPath);
        $this->assertStringContainsString('.rr-btn', $cssContent);
        $this->assertStringContainsString('.btn-wrap', $cssContent);
        $this->assertStringContainsString('.text-one', $cssContent);
        $this->assertStringContainsString('.text-two', $cssContent);
        $this->assertStringContainsString('.circle-text', $cssContent);
        $this->assertStringContainsString('@keyframes textRotation', $cssContent);
        $this->assertStringContainsString('.works-wrapper-1', $cssContent);
        $this->assertStringContainsString('.service-box', $cssContent);
        $this->assertStringContainsString('#00BFA5', $cssContent);
    }

    public function test_app_css_imports_design_engine_css(): void
    {
        $appCss = file_get_contents(resource_path('css/app.css'));
        $this->assertStringContainsString('@import "./design-engine.css";', $appCss);
    }
}
