<?php

namespace Tests\Unit;

use App\Models\Demo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class DemoModelTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function demo_model_has_fillable_attributes_and_casts()
    {
        $demo = Demo::create([
            'title' => 'DM&P Advocates',
            'slug' => 'dmp-advocates',
            'client_name' => 'Dhoni Martien & Partners',
            'industry' => 'Corporate Law',
            'description' => 'Tier-1 Indonesian corporate law firm prototype.',
            'html_content' => '<!DOCTYPE html><html><body><h1>DM&P Advocates</h1></body></html>',
            'access_passcode' => 'client2026',
            'default_device' => 'desktop',
            'is_active' => true,
        ]);

        $this->assertDatabaseHas('demos', [
            'slug' => 'dmp-advocates',
            'title' => 'DM&P Advocates',
            'is_active' => 1,
        ]);

        $this->assertTrue($demo->is_active);
        $this->assertTrue($demo->isPasscodeProtected());
        $this->assertTrue($demo->verifyPasscode('client2026'));
        $this->assertFalse($demo->verifyPasscode('wrong-pass'));
    }

    #[Test]
    public function demo_scope_active_filters_inactive_records()
    {
        Demo::create([
            'title' => 'Active Demo',
            'slug' => 'active-demo',
            'html_content' => '<p>Active</p>',
            'is_active' => true,
        ]);

        Demo::create([
            'title' => 'Inactive Demo',
            'slug' => 'inactive-demo',
            'html_content' => '<p>Inactive</p>',
            'is_active' => false,
        ]);

        $this->assertCount(1, Demo::active()->get());
        $this->assertEquals('active-demo', Demo::active()->first()->slug);
    }

    #[Test]
    public function demo_model_supports_branding_and_assets_attributes()
    {
        $demo = Demo::create([
            'title' => 'Branded Demo',
            'slug' => 'branded-demo',
            'html_content' => '<p>Branded</p>',
            'client_logo' => 'demos/logos/client.png',
            'thumbnail' => 'demos/thumbnails/mockup.jpg',
            'assets' => [
                'demos/assets/banner.webp',
                'demos/assets/chart.svg',
            ],
            'is_active' => true,
        ]);

        $this->assertDatabaseHas('demos', [
            'slug' => 'branded-demo',
            'client_logo' => 'demos/logos/client.png',
            'thumbnail' => 'demos/thumbnails/mockup.jpg',
        ]);

        $this->assertIsArray($demo->assets);
        $this->assertCount(2, $demo->assets);
        $this->assertEquals('demos/assets/banner.webp', $demo->assets[0]);
    }

    #[Test]
    public function demo_model_replaces_placeholders_in_html_content()
    {
        $rawHtml = '<div><img src="{{CLIENT_LOGO}}" alt="{{CLIENT_NAME}}"><h1>{{TITLE}}</h1><meta cover="{{CLIENT_THUMBNAIL}}"></div>';
        $demo = Demo::create([
            'title' => 'Law Office Showcase',
            'slug' => 'law-office',
            'client_name' => 'FFH & Partner',
            'client_logo' => 'demos/logos/ffh-logo.webp',
            'thumbnail' => 'demos/thumbnails/ffh-cover.webp',
            'html_content' => $rawHtml,
            'is_active' => true,
        ]);

        $processed = $demo->getProcessedHtmlContent();

        $this->assertStringContainsString(asset('storage/demos/logos/ffh-logo.webp'), $processed);
        $this->assertStringContainsString('FFH &amp; Partner', $processed);
        $this->assertStringContainsString('Law Office Showcase', $processed);
        $this->assertStringContainsString(asset('storage/demos/thumbnails/ffh-cover.webp'), $processed);
        $this->assertStringNotContainsString('{{CLIENT_LOGO}}', $processed);
        $this->assertStringNotContainsString('{{CLIENT_NAME}}', $processed);
    }

    #[Test]
    public function demo_model_handles_empty_placeholders_gracefully()
    {
        $rawHtml = '<div><img src="{{CLIENT_LOGO}}" alt="{{CLIENT_NAME}}"></div>';
        $demo = Demo::create([
            'title' => 'Empty Branding Demo',
            'slug' => 'empty-branding',
            'client_name' => null,
            'client_logo' => null,
            'html_content' => $rawHtml,
            'is_active' => true,
        ]);

        $processed = $demo->getProcessedHtmlContent();

        $this->assertStringNotContainsString('{{CLIENT_LOGO}}', $processed);
        $this->assertStringNotContainsString('{{CLIENT_NAME}}', $processed);
        $this->assertEquals('<div><img src="" alt=""></div>', $processed);
    }
}

