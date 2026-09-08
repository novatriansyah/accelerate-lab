<?php

namespace Tests\Unit;

use App\Models\SiteSetting;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class SiteSettingTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function get_returns_setting_value_by_key(): void
    {
        SiteSetting::create([
            'key' => 'contact_whatsapp',
            'value' => '628123456789',
            'group' => 'contact',
            'is_display' => true,
        ]);

        $this->assertSame('628123456789', SiteSetting::get('contact_whatsapp'));
    }

    #[Test]
    public function get_returns_default_when_key_does_not_exist(): void
    {
        $this->assertSame('6287721312985', SiteSetting::get('non_existent_key', '6287721312985'));
        $this->assertNull(SiteSetting::get('another_missing_key'));
    }

    #[Test]
    public function get_returns_collection_when_called_without_arguments(): void
    {
        SiteSetting::create([
            'key' => 'site_title',
            'value' => 'Accelerate Lab',
            'group' => 'general',
            'is_display' => true,
        ]);

        $result = SiteSetting::get();

        $this->assertInstanceOf(Collection::class, $result);
        $this->assertCount(1, $result);
    }

    #[Test]
    public function get_returns_collection_with_specific_columns_when_array_provided(): void
    {
        SiteSetting::create([
            'key' => 'site_title',
            'value' => 'Accelerate Lab',
            'group' => 'general',
            'is_display' => true,
        ]);

        $result = SiteSetting::get(['id', 'key']);

        $this->assertInstanceOf(Collection::class, $result);
        $this->assertArrayHasKey('key', $result->first()->getAttributes());
        $this->assertArrayNotHasKey('value', $result->first()->getAttributes());
    }
}
