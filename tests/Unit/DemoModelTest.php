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
}

