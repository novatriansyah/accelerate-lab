<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class Custom404RedesignTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function custom_404_page_renders_redox_typography_and_navigation()
    {
        $response = $this->get('/non-existent-route-for-testing-404');

        $response->assertStatus(404);
        $response->assertSee('404');
        $response->assertSee('redox-error-container', false);
        $response->assertSee(route('home'), false);
        $response->assertSee(route('services'), false);
        $response->assertSee(route('contact'), false);
        $response->assertSee('Halaman Tidak Ditemukan');
        $response->assertSee('Kembali ke Beranda');

        // Verify zero em-dashes
        $content = $response->getContent();
        $this->assertStringNotContainsString('—', $content, 'Found em-dash in 404 page');
        $this->assertStringNotContainsString('–', $content, 'Found en-dash in 404 page');
    }
}
