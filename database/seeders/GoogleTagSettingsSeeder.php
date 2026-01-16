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
        $settings = [
            [
                'key' => 'google_tag_head',
                'value' => "<!-- Google tag (gtag.js) -->
<script async src=\"https://www.googletagmanager.com/gtag/js?id=G-GYEYS89WC3\"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-GYEYS89WC3');
</script>",
                'group' => 'seo',
                'is_display' => true,
            ],
            [
                'key' => 'google_tag_body',
                'value' => '<!-- Google Tag Manager (Body) - Not needed for gtag.js -->',
                'group' => 'seo',
                'is_display' => true,
            ],
        ];

        foreach ($settings as $setting) {
            SiteSetting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
