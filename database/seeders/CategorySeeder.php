<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = array (
  0 => 
  array (
    'id' => 1,
    'name' => 'Engineering',
    'slug' => 'engineering',
    'color' => '#3b82f6',
    'created_at' => '2026-01-09 09:33:51',
    'updated_at' => '2026-01-09 09:33:51',
  ),
  1 => 
  array (
    'id' => 2,
    'name' => 'Design',
    'slug' => 'design',
    'color' => '#ec4899',
    'created_at' => '2026-01-09 09:34:15',
    'updated_at' => '2026-01-09 09:34:15',
  ),
  2 => 
  array (
    'id' => 3,
    'name' => 'Business',
    'slug' => 'business',
    'color' => '#10b981',
    'created_at' => '2026-01-09 09:34:30',
    'updated_at' => '2026-01-09 09:34:30',
  ),
  3 => 
  array (
    'id' => 4,
    'name' => 'News',
    'slug' => 'news',
    'color' => '#f59e0b',
    'created_at' => '2026-01-09 09:34:44',
    'updated_at' => '2026-01-09 09:34:44',
  ),
);

        foreach ($categories as $cat) {
            Category::updateOrCreate(
                ['slug' => $cat['slug']],
                [
                    'name' => $cat['name'],
                    'color' => $cat['color'],
                ]
            );
        }
    }
}
