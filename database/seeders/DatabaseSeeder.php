<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            HomepageStatSeeder::class,
        ]);

        if (\App\Models\User::count() === 0) {
            User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]);
        }
        
        $settings = [
            ['key' => 'contact_address', 'value' => '123 Innovation Blvd, Tech City, TC 90210', 'group' => 'contact'],
            ['key' => 'contact_email', 'value' => 'hello@acceleratelab.io', 'group' => 'contact'],
            ['key' => 'contact_phone', 'value' => '+1 (555) 019-2834', 'group' => 'contact'],
            ['key' => 'contact_google_maps_link', 'value' => 'https://maps.google.com/?q=Tech+City', 'group' => 'contact'],
        ];

        foreach ($settings as $setting) {
            \App\Models\SiteSetting::firstOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
