<?php

namespace Database\Seeders;

use App\Models\CoreValue;
use Illuminate\Database\Seeder;

class CoreValueSeeder extends Seeder
{
    /**
     * Run the database seeds for grounded core values.
     */
    public function run(): void
    {
        $values = [
            [
                'title' => 'Quality Over Hype',
                'description' => 'Clean code, fast loading speeds, and solid architecture, without unnecessary technical jargon or overcomplicated solutions.',
                'icon' => 'code',
                'sort_order' => 1,
            ],
            [
                'title' => 'Honest & Clear Communication',
                'description' => 'No corporate buzzwords or hidden fees. Realistic estimates and plain terms.',
                'icon' => 'chat',
                'sort_order' => 2,
            ],
            [
                'title' => '100% Client Ownership',
                'description' => 'Everything we build belongs to the client with zero vendor lock-in.',
                'icon' => 'shield-check',
                'sort_order' => 3,
            ],
            [
                'title' => 'Reliability & Care',
                'description' => 'Thorough testing, meeting deadlines, and dependable long-term support.',
                'icon' => 'heart-handshake',
                'sort_order' => 4,
            ],
        ];

        foreach ($values as $item) {
            CoreValue::updateOrCreate(
                ['title' => $item['title']],
                $item
            );
        }
    }
}
