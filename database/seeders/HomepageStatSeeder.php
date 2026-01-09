<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HomepageStat;

class HomepageStatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing stats to correct any duplicates if re-run
        HomepageStat::truncate();

        // Hero Section Stats
        HomepageStat::create([
            'section' => 'hero',
            'value' => '99.9',
            'unit' => '%',
            'label' => 'Uptime Guarantee',
            'sort_order' => 0,
        ]);
        
        HomepageStat::create([
            'section' => 'hero',
            'value' => '50',
            'unit' => '+',
            'label' => 'Enterprise Apps',
            'sort_order' => 1,
        ]);

        HomepageStat::create([
            'section' => 'hero',
            'value' => '4',
            'unit' => 'yr',
            'label' => 'Avg Engagement',
            'sort_order' => 2,
        ]);

        // Capabilities Section Stats
        HomepageStat::create([
            'section' => 'capabilities',
            'value' => '98',
            'unit' => '%',
            'label' => 'Client Retention',
            'sort_order' => 0,
        ]);

        HomepageStat::create([
            'section' => 'capabilities',
            'value' => '50',
            'unit' => '+',
            'label' => 'Enterprise Apps',
            'sort_order' => 1,
        ]);

        HomepageStat::create([
            'section' => 'capabilities',
            'value' => '4',
            'unit' => 'yr',
            'label' => 'Avg Engagement',
            'sort_order' => 2,
        ]);
    }
}
