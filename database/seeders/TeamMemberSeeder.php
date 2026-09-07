<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    public function run(): void
    {
        $members = array (
  0 => 
  array (
    'id' => 4,
    'name' => 'Nova Triansyah Azis',
    'role' => 'CEO & Founder',
    'image_path' => 'team-members/01KYQEBK3JMK751KBG3XZ0J973.jpeg',
    'bio' => '6+ tahun pengalaman merancang arsitektur sistem operasional bisnis, integrasi enterprise, dan rekayasa perangkat lunak berskala tinggi.',
    'linkedin_url' => 'https://www.linkedin.com/in/novatriansyah/',
    'sort_order' => 0,
    'created_at' => '2026-07-30 00:21:49',
    'updated_at' => '2026-07-30 00:22:03',
  ),
);

        foreach ($members as $m) {
            TeamMember::updateOrCreate(
                ['name' => $m['name']],
                [
                    'role' => $m['role'],
                    'image_path' => $m['image_path'],
                    'bio' => $m['bio'],
                    'linkedin_url' => $m['linkedin_url'],
                    'sort_order' => $m['sort_order'],
                ]
            );
        }
    }
}
