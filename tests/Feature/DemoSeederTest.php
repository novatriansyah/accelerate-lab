<?php

namespace Tests\Feature;

use App\Models\Demo;
use Database\Seeders\DemoSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class DemoSeederTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function demo_seeder_populates_dmp_advocates_record()
    {
        $this->seed(DemoSeeder::class);

        $this->assertDatabaseHas('demos', [
            'slug' => 'dmp-advocates',
            'title' => 'DM&P Advocates - Corporate & Commercial Law Firm',
            'client_name' => 'Dhoni Martien & Partners',
            'is_active' => 1,
        ]);

        $demo = Demo::where('slug', 'dmp-advocates')->first();
        $this->assertNotNull($demo);
        $this->assertStringContainsString('DM&P Advocates', $demo->html_content);
        $this->assertStringContainsString('Dhoni Martien, S.H., LL.M.', $demo->html_content);
        $this->assertStringContainsString('SCBD Office', $demo->html_content);
    }
}
