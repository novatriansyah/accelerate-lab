<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = array (
  0 => 
  array (
    'id' => 1,
    'key' => 'contact_address',
    'value' => 'Jalan Bintara 9 RT 005 RW 005 No 75',
    'group' => 'contact',
    'is_display' => 1,
    'created_at' => '2026-01-09 09:07:26',
    'updated_at' => '2026-01-09 09:31:15',
  ),
  1 => 
  array (
    'id' => 2,
    'key' => 'contact_email',
    'value' => 'nova@acceleratelab.id',
    'group' => 'contact',
    'is_display' => 1,
    'created_at' => '2026-01-09 09:07:26',
    'updated_at' => '2026-01-09 09:31:50',
  ),
  2 => 
  array (
    'id' => 3,
    'key' => 'contact_phone',
    'value' => '+62 877 2131 2985',
    'group' => 'contact',
    'is_display' => 1,
    'created_at' => '2026-01-09 09:07:26',
    'updated_at' => '2026-01-09 09:31:33',
  ),
  3 => 
  array (
    'id' => 4,
    'key' => 'contact_google_maps_link',
    'value' => 'https://maps.google.com/?q=Gang+Abeng',
    'group' => 'contact',
    'is_display' => 1,
    'created_at' => '2026-01-09 09:07:26',
    'updated_at' => '2026-01-09 09:32:27',
  ),
  4 => 
  array (
    'id' => 5,
    'key' => 'legal_name',
    'value' => 'PT Akselerasi Digital Mandiri',
    'group' => 'general',
    'is_display' => 1,
    'created_at' => '2026-01-09 09:28:05',
    'updated_at' => '2026-01-09 09:28:05',
  ),
  5 => 
  array (
    'id' => 6,
    'key' => 'registered_city',
    'value' => 'Greater Area Jakarta Raya, Indonesia',
    'group' => 'general',
    'is_display' => 1,
    'created_at' => '2026-01-09 09:28:43',
    'updated_at' => '2026-01-09 09:28:44',
  ),
  6 => 
  array (
    'id' => 7,
    'key' => 'linkedin_url',
    'value' => 'https://linkedin.com/company/accelerate-lab',
    'group' => 'social',
    'is_display' => 1,
    'created_at' => '2026-01-09 09:30:06',
    'updated_at' => '2026-01-09 09:30:52',
  ),
  7 => 
  array (
    'id' => 8,
    'key' => 'site_logo',
    'value' => 'images/logo.webp',
    'group' => 'general',
    'is_display' => 1,
    'created_at' => '2026-01-15 08:41:20',
    'updated_at' => '2026-01-15 15:47:01',
  ),
  8 => 
  array (
    'id' => 9,
    'key' => 'google_tag_id',
    'value' => 'G-GYEYS89WC3',
    'group' => 'seo',
    'is_display' => 1,
    'created_at' => '2026-01-16 16:57:11',
    'updated_at' => '2026-01-16 17:08:23',
  ),
);

        foreach ($settings as $s) {
            SiteSetting::updateOrCreate(
                ['key' => $s['key']],
                [
                    'value' => $s['value'],
                    'group' => $s['group'] ?? 'general',
                    'is_display' => $s['is_display'] ?? true,
                ]
            );
        }
    }
}
