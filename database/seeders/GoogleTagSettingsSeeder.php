<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class GoogleTagSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $googleTagId = env('GOOGLE_TAG_ID');

        if ($googleTagId) {
            SiteSetting::updateOrCreate(
                ['key' => 'google_tag_id'],
                [
                    'key' => 'google_tag_id',
                    'value' => $googleTagId,
                    'group' => 'seo',
                    'is_display' => true,
                ]
            );
        }

        // Remove obsolete settings
        SiteSetting::whereIn('key', ['google_tag_head', 'google_tag_body'])->delete();
    }
}
