<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Strict TDD test enforcing horizontal scroll prevention and
 * preventing phantom horizontal overflow bugs on landing page.
 */
class HorizontalScrollPreventionTest extends TestCase
{
    use RefreshDatabase;

    public function test_layout_prevents_horizontal_overflow_via_body_classes_and_css(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        // Body must explicitly include overflow-x-clip (or overflow-x-hidden)
        $content = $response->getContent();
        $this->assertMatchesRegularExpression('/<body[^>]*class="[^"]*overflow-x-clip[^"]*"/', $content, 'Body tag must contain overflow-x-clip class to prevent horizontal scrollbars.');

        // app.css must declare overflow-x: clip on html and body
        $appCss = file_get_contents(resource_path('css/app.css'));
        $this->assertStringContainsString('overflow-x: clip;', $appCss, 'app.css must enforce overflow-x: clip on html/body.');
    }

    public function test_magnetic_cursor_dom_element_is_hidden_and_does_not_displace_document_flow(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        $content = $response->getContent();

        // Must still satisfy KineticMotionEngineTest hooks
        $response->assertSee('cb-cursor', false);
        $response->assertSee('cb-cursor-text', false);

        // But cb-cursor must carry the hidden class so it does not render as an unstyled static block element that causes overflow when translated
        $this->assertMatchesRegularExpression('/<div class="[^"]*cb-cursor[^"]*hidden[^"]*"/', $content, 'cb-cursor must contain the hidden class to prevent horizontal overflow in layout flow.');
    }

    public function test_magnetic_cursor_js_engine_guards_against_hidden_or_unrendered_cursor(): void
    {
        $js = file_get_contents(resource_path('js/magnetic-cursor.js'));

        // magnetic-cursor.js must safely check whether cursor is hidden before attaching event listeners or starting render loop
        $this->assertStringContainsString('cursor.classList.contains(\'hidden\')', $js, 'magnetic-cursor.js must guard against hidden cursor element.');
    }
}
