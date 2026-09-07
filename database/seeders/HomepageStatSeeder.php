<?php

namespace Database\Seeders;

use App\Models\HomepageStat;
use Illuminate\Database\Seeder;

class HomepageStatSeeder extends Seeder
{
    public function run(): void
    {
        HomepageStat::truncate();

        $stats = array (
  0 => 
  array (
    'id' => 1,
    'value' => 99.9,
    'unit' => '%',
    'label' => 'Uptime Guarantee',
    'section' => 'hero',
    'sort_order' => 0,
    'created_at' => '2026-01-09 09:15:31',
    'updated_at' => '2026-01-09 09:15:31',
  ),
  1 => 
  array (
    'id' => 2,
    'value' => '2-4',
    'unit' => 'Weeks',
    'label' => 'Deployment Speed',
    'section' => 'hero',
    'sort_order' => 1,
    'created_at' => '2026-01-09 09:15:31',
    'updated_at' => '2026-01-09 22:34:36',
  ),
  2 => 
  array (
    'id' => 3,
    'value' => '6+',
    'unit' => 'Years',
    'label' => 'Technical Experience',
    'section' => 'hero',
    'sort_order' => 2,
    'created_at' => '2026-01-09 09:15:31',
    'updated_at' => '2026-01-09 22:36:21',
  ),
  3 => 
  array (
    'id' => 4,
    'value' => 10,
    'unit' => '+',
    'label' => 'Tech Stack Proficiency',
    'section' => 'capabilities',
    'sort_order' => 0,
    'created_at' => '2026-01-09 09:15:31',
    'updated_at' => '2026-01-09 22:35:25',
  ),
  4 => 
  array (
    'id' => 5,
    'value' => 100,
    'unit' => '%',
    'label' => 'Code Quality',
    'section' => 'capabilities',
    'sort_order' => 1,
    'created_at' => '2026-01-09 09:15:31',
    'updated_at' => '2026-01-09 22:36:44',
  ),
  5 => 
  array (
    'id' => 6,
    'value' => '<24',
    'unit' => 'hrs',
    'label' => 'Support Response',
    'section' => 'capabilities',
    'sort_order' => 2,
    'created_at' => '2026-01-09 09:15:31',
    'updated_at' => '2026-01-09 22:37:07',
  ),
  6 => 
  array (
    'id' => 7,
    'value' => 99.9,
    'unit' => '%',
    'label' => 'Uptime Guarantee',
    'section' => 'about',
    'sort_order' => 1,
    'created_at' => '2026-01-10 04:13:46',
    'updated_at' => '2026-01-10 04:13:46',
  ),
  7 => 
  array (
    'id' => 8,
    'value' => '<24',
    'unit' => 'hrs',
    'label' => 'Support Response',
    'section' => 'about',
    'sort_order' => 2,
    'created_at' => '2026-01-10 04:14:42',
    'updated_at' => '2026-01-10 04:14:42',
  ),
  8 => 
  array (
    'id' => 9,
    'value' => '6+',
    'unit' => 'yr',
    'label' => 'Technical Experience',
    'section' => 'about',
    'sort_order' => 3,
    'created_at' => '2026-01-10 04:15:00',
    'updated_at' => '2026-01-10 04:15:00',
  ),
  9 => 
  array (
    'id' => 10,
    'value' => '2-4',
    'unit' => 'Weeks',
    'label' => 'Deployment Speed',
    'section' => 'about',
    'sort_order' => 4,
    'created_at' => '2026-01-10 04:15:32',
    'updated_at' => '2026-01-10 04:15:32',
  ),
);

        foreach ($stats as $st) {
            HomepageStat::create([
                'value' => $st['value'],
                'unit' => $st['unit'],
                'label' => $st['label'],
                'section' => $st['section'],
                'sort_order' => $st['sort_order'],
            ]);
        }
    }
}
