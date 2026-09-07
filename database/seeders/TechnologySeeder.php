<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    public function run(): void
    {
        $technologies = array (
  0 => 
  array (
    'id' => 1,
    'name' => 'Laravel',
    'icon' => NULL,
    'category' => 'Backend',
    'created_at' => '2026-01-02 21:36:33',
    'updated_at' => '2026-01-02 21:36:33',
  ),
  1 => 
  array (
    'id' => 2,
    'name' => 'React',
    'icon' => NULL,
    'category' => 'Frontend',
    'created_at' => '2026-01-02 21:36:33',
    'updated_at' => '2026-01-02 21:36:33',
  ),
  2 => 
  array (
    'id' => 3,
    'name' => 'Tailwind CSS',
    'icon' => NULL,
    'category' => 'Frontend',
    'created_at' => '2026-01-02 21:36:33',
    'updated_at' => '2026-01-02 21:36:33',
  ),
  3 => 
  array (
    'id' => 4,
    'name' => 'Docker',
    'icon' => NULL,
    'category' => 'DevOps',
    'created_at' => '2026-01-02 21:36:33',
    'updated_at' => '2026-01-02 21:36:33',
  ),
  4 => 
  array (
    'id' => 5,
    'name' => 'Figma',
    'icon' => NULL,
    'category' => 'Design',
    'created_at' => '2026-01-02 21:36:33',
    'updated_at' => '2026-01-02 21:36:33',
  ),
  5 => 
  array (
    'id' => 6,
    'name' => 'Echo',
    'icon' => NULL,
    'category' => 'Backend',
    'created_at' => '2026-06-30 14:13:12',
    'updated_at' => '2026-06-30 14:13:12',
  ),
  6 => 
  array (
    'id' => 7,
    'name' => 'Next.js',
    'icon' => NULL,
    'category' => 'Frontend',
    'created_at' => '2026-06-30 14:13:46',
    'updated_at' => '2026-06-30 14:13:46',
  ),
  7 => 
  array (
    'id' => 8,
    'name' => 'Supabase',
    'icon' => NULL,
    'category' => 'Tools',
    'created_at' => '2026-06-30 14:13:56',
    'updated_at' => '2026-06-30 14:13:56',
  ),
  8 => 
  array (
    'id' => 9,
    'name' => 'OpenRouter',
    'icon' => NULL,
    'category' => 'Tools',
    'created_at' => '2026-06-30 14:14:17',
    'updated_at' => '2026-06-30 14:14:17',
  ),
  9 => 
  array (
    'id' => 10,
    'name' => 'Vector',
    'icon' => NULL,
    'category' => 'DevOps',
    'created_at' => '2026-06-30 14:17:22',
    'updated_at' => '2026-06-30 14:18:36',
  ),
  10 => 
  array (
    'id' => 11,
    'name' => 'SumoPod',
    'icon' => NULL,
    'category' => 'DevOps',
    'created_at' => '2026-06-30 14:19:01',
    'updated_at' => '2026-06-30 14:19:01',
  ),
  11 => 
  array (
    'id' => 12,
    'name' => 'Kong Gateway',
    'icon' => NULL,
    'category' => 'Tools',
    'created_at' => '2026-06-30 14:19:12',
    'updated_at' => '2026-06-30 14:19:12',
  ),
  12 => 
  array (
    'id' => 13,
    'name' => 'iPaymu',
    'icon' => NULL,
    'category' => 'Tools',
    'created_at' => '2026-06-30 14:19:25',
    'updated_at' => '2026-06-30 14:19:25',
  ),
);

        foreach ($technologies as $tech) {
            Technology::updateOrCreate(
                ['id' => $tech['id']],
                [
                    'name' => $tech['name'],
                    'icon' => $tech['icon'],
                    'category' => $tech['category'],
                ]
            );
        }
    }
}
