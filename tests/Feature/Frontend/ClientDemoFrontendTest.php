<?php

namespace Tests\Feature\Frontend;

use App\Models\Demo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ClientDemoFrontendTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function showcase_mode_renders_presentation_frame_and_device_switcher()
    {
        $demo = Demo::factory()->create([
            'title' => 'DM&P Advocates',
            'client_name' => 'Dhoni Martien & Partners',
            'slug' => 'dmp-advocates',
            'html_content' => '<!DOCTYPE html><html><body><h1 id="brand">DM&P Law</h1></body></html>',
        ]);

        $response = $this->get('/demos/' . $demo->slug);

        $response->assertStatus(200);
        $response->assertSee('DM&P Advocates');
        $response->assertSee('Dhoni Martien & Partners');
        $response->assertSee('Desktop');
        $response->assertSee('Tablet');
        $response->assertSee('Mobile');
        $response->assertSee('Open Fullscreen');
        $response->assertSee(route('demos.preview', $demo->slug));
    }

    #[Test]
    public function preview_mode_returns_isolated_html_content_with_correct_content_type()
    {
        $html = '<!DOCTYPE html><html><head><title>Isolated Client Page</title></head><body><h2>Direct Preview Content</h2></body></html>';
        $demo = Demo::factory()->create([
            'slug' => 'direct-preview-demo',
            'html_content' => $html,
        ]);

        $response = $this->get('/demos/' . $demo->slug . '/preview');

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'text/html; charset=UTF-8');
        $response->assertSee('Direct Preview Content');
        $response->assertDontSee('Accelerate Lab'); // Style & layout isolation guarantee
    }

    #[Test]
    public function inactive_demo_returns_404_on_showcase_and_preview()
    {
        $demo = Demo::factory()->inactive()->create([
            'slug' => 'hidden-demo',
        ]);

        $this->get('/demos/' . $demo->slug)->assertStatus(404);
        $this->get('/demos/' . $demo->slug . '/preview')->assertStatus(404);
    }

    #[Test]
    public function protected_demo_prompts_for_passcode_and_unlocks_upon_valid_submission()
    {
        $demo = Demo::factory()->protected('secret2026')->create([
            'slug' => 'confidential-demo',
            'html_content' => '<h1>Confidential Mandate</h1>',
        ]);

        // Accessing without unlock shows passcode form
        $response = $this->get('/demos/' . $demo->slug);
        $response->assertStatus(200);
        $response->assertSee('Protected Client Demo');

        // Accessing preview directly redirects or blocks without session
        $previewResponse = $this->get('/demos/' . $demo->slug . '/preview');
        $previewResponse->assertRedirect('/demos/' . $demo->slug);

        // Submit invalid passcode
        $failPost = $this->post('/demos/' . $demo->slug . '/verify', [
            'passcode' => 'wrongpass',
        ]);
        $failPost->assertSessionHasErrors('passcode');

        // Submit valid passcode
        $validPost = $this->post('/demos/' . $demo->slug . '/verify', [
            'passcode' => 'secret2026',
        ]);
        $validPost->assertRedirect('/demos/' . $demo->slug);

        // Now accessible
        $this->get('/demos/' . $demo->slug)->assertSee('Open Fullscreen');
        $this->get('/demos/' . $demo->slug . '/preview')->assertSee('Confidential Mandate');
    }

    #[Test]
    public function showcase_renders_client_logo_and_opengraph_meta_tags()
    {
        $demo = Demo::factory()->create([
            'title' => 'Nexus Enterprise',
            'client_name' => 'Nexus Global Inc.',
            'slug' => 'nexus-enterprise',
            'client_logo' => 'demos/logos/nexus-logo.png',
            'thumbnail' => 'demos/thumbnails/nexus-og.jpg',
            'description' => 'Flagship enterprise dashboard for Nexus.',
        ]);

        $response = $this->get('/demos/' . $demo->slug);

        $response->assertStatus(200);
        $response->assertSee(asset('storage/demos/logos/nexus-logo.png'));
        $response->assertSee(asset('storage/demos/thumbnails/nexus-og.jpg'));
        $response->assertSee('og:image', false);
        $response->assertSee('twitter:image', false);
    }

    #[Test]
    public function passcode_view_renders_client_logo_when_present()
    {
        $demo = Demo::factory()->protected('secret2026')->create([
            'slug' => 'protected-branded-demo',
            'client_logo' => 'demos/logos/brand.png',
        ]);

        $response = $this->get('/demos/' . $demo->slug);

        $response->assertStatus(200);
        $response->assertSee(asset('storage/demos/logos/brand.png'));
    }

    #[Test]
    public function preview_mode_renders_processed_html_with_injected_placeholders()
    {
        $demo = Demo::factory()->create([
            'slug' => 'preview-dynamic-demo',
            'client_name' => 'FFH Advocates',
            'client_logo' => 'demos/logos/ffh-custom.png',
            'html_content' => '<!DOCTYPE html><html><body><img id="logo" src="{{CLIENT_LOGO}}"><h1>{{CLIENT_NAME}}</h1></body></html>',
        ]);

        $response = $this->get('/demos/' . $demo->slug . '/preview');

        $response->assertStatus(200);
        $response->assertSee(asset('storage/demos/logos/ffh-custom.png'));
        $response->assertSee('FFH Advocates');
        $response->assertDontSee('{{CLIENT_LOGO}}');
        $response->assertDontSee('{{CLIENT_NAME}}');
    }
}

