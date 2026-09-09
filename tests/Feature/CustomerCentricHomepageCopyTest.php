<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CustomerCentricHomepageCopyTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_has_zero_tech_stack_mentions(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        $forbidden = [
            'Alpine.js',
            'Livewire',
            'Docker',
            'Kubernetes',
            'Laravel',
            'React Native',
            'Flutter',
            'Vue',
            'Next.js',
        ];

        foreach ($forbidden as $tech) {
            $response->assertDontSee($tech, false);
        }

        $response->assertSee('Pertumbuhan', false);
        $response->assertSee('Efisiensi', false);
        $response->assertSee('PT Akselerasi Digital Mandiri', false);
    }
}
