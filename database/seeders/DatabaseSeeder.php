<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database with production-matched baseline.
     */
    public function run(): void
    {
        if (User::where('email', 'nova@acceleratelab.id')->doesntExist()) {
            User::create([
                'name' => 'Nova Triansyah Azis',
                'email' => 'nova@acceleratelab.id',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ]);
        }

        $this->call([
            SiteSettingSeeder::class,
            HomepageStatSeeder::class,
            CategorySeeder::class,
            TechnologySeeder::class,
            ServiceSeeder::class,
            ProjectSeeder::class,
            TeamMemberSeeder::class,
            CompanyMilestoneSeeder::class,
            DemoSeeder::class,
        ]);
    }
}
