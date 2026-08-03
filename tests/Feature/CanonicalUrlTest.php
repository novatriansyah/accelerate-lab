<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class CanonicalUrlTest extends TestCase
{
    use RefreshDatabase;
    #[Test]
    public function page_renders_canonical_url_without_query_params_by_default()
    {
        $response = $this->get('/services?query_param_leak=123');

        $response->assertStatus(200);
        $response->assertSee('<link rel="canonical" href="' . url('/services') . '">', false);
    }
}
