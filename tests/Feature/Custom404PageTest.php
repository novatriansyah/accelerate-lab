<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class Custom404PageTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function non_existent_url_renders_custom_branded_404_view()
    {
        $response = $this->get('/this-route-definitely-does-not-exist-xyz');

        $response->assertStatus(404);
        $response->assertSee('404');
        $response->assertSee('Page Not Found');
        $response->assertSee('Back to Home');
    }
}
