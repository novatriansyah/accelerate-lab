<?php

namespace Tests\Feature;

use App\Models\JobPosting;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class CareerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function careers_page_displays_only_active_job_postings()
    {
        $activeJob = JobPosting::factory()->create([
            'title' => 'Senior Laravel Architect',
            'is_active' => true,
        ]);

        $inactiveJob = JobPosting::factory()->inactive()->create([
            'title' => 'Deprecated Role',
        ]);

        $response = $this->get('/careers');

        $response->assertStatus(200);
        $response->assertSee('Senior Laravel Architect');
        $response->assertDontSee('Deprecated Role');
    }
}
