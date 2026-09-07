<?php

namespace Database\Seeders;

use App\Models\CompanyMilestone;
use Illuminate\Database\Seeder;

class CompanyMilestoneSeeder extends Seeder
{
    public function run(): void
    {
        $milestones = array (
  0 => 
  array (
    'id' => 1,
    'year' => 2025,
    'title' => 'Founded',
    'description' => 'Started with solo, focused on Laravel development.',
    'icon' => 'rocket_launch',
    'sort_order' => 1,
    'created_at' => '2026-01-09 09:35:20',
    'updated_at' => '2026-01-09 09:35:20',
  ),
);

        foreach ($milestones as $ms) {
            CompanyMilestone::updateOrCreate(
                ['year' => $ms['year'], 'title' => $ms['title']],
                [
                    'description' => $ms['description'],
                    'icon' => $ms['icon'],
                    'sort_order' => $ms['sort_order'],
                ]
            );
        }
    }
}
