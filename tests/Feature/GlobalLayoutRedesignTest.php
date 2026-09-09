<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class GlobalLayoutRedesignTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function global_layout_includes_gsap_and_redox_shell_elements()
    {
        $appJsPath = resource_path('js/app.js');
        $this->assertFileExists($appJsPath);

        $appJs = file_get_contents($appJsPath);
        $this->assertStringContainsString('gsap', $appJs);
        $this->assertStringContainsString('ScrollTrigger', $appJs);

        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('<header', false);
        $response->assertSee('<footer', false);
        $response->assertSee('theme-toggle-btn', false);

        // Assert zero em-dashes across the layout
        $content = $response->getContent();
        $this->assertStringNotContainsString('—', $content, 'Found em-dash in layout');
        $this->assertStringNotContainsString('–', $content, 'Found en-dash in layout');
    }
}
