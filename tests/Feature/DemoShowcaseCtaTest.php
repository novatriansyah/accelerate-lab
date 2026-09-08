<?php

namespace Tests\Feature;

use App\Models\Demo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class DemoShowcaseCtaTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function demo_showcase_renders_one_click_whatsapp_activation_button()
    {
        $demo = Demo::factory()->create([
            'title' => 'Katering Berkah Prototype',
            'client_name' => 'Katering Berkah',
            'slug' => 'katering-berkah',
            'is_active' => true,
            'access_passcode' => null,
        ]);

        $response = $this->get(route('demos.showcase', $demo->slug));

        $response->assertStatus(200);
        $response->assertSee('Klaim Website Ini');
        $response->assertSee('https://wa.me/', false);
        $response->assertSee('target="_blank"', false);
        $response->assertSee('rel="noopener noreferrer"', false);
    }

    #[Test]
    public function demo_showcase_whatsapp_cta_contains_prefilled_demo_context()
    {
        $demo = Demo::factory()->create([
            'title' => 'Rental Mobil Express',
            'client_name' => 'Rental Mobil Express',
            'slug' => 'rental-mobil-express',
            'is_active' => true,
            'access_passcode' => null,
        ]);

        $response = $this->get(route('demos.showcase', $demo->slug));

        $response->assertStatus(200);
        $response->assertSee(urlencode('Rental Mobil Express'), false);
    }
}
