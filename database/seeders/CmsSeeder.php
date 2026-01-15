<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\JobPosting;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\Technology;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Create a Default User (if not exists)
        $admin = User::firstOrCreate(
            ['email' => 'admin@acceleratelab.io'],
            [
                'name' => 'Admin User',
                'password' => bcrypt('password'), // Helper for dev
                'email_verified_at' => now(),
            ]
        );

        // 2. Categories
        $categories = [
            ['name' => 'Engineering', 'color' => '#3b82f6'],
            ['name' => 'Design', 'color' => '#ec4899'],
            ['name' => 'Business', 'color' => '#10b981'],
            ['name' => 'News', 'color' => '#f59e0b'],
        ];

        foreach ($categories as $cat) {
            Category::firstOrCreate(
                ['slug' => Str::slug($cat['name'])],
                ['name' => $cat['name'], 'color' => $cat['color']]
            );
        }

        // 3. Articles (Sample Content)
        $engineering = Category::where('slug', 'engineering')->first();

        Article::firstOrCreate(
            ['slug' => 'future-of-laravel'],
            [
                'title' => 'The Future of Laravel: What to Expect in Version 12',
                'content' => '<p>Laravel continues to push the boundaries of PHP development...</p><p>With native support for more asynchronous features and a streamlined directory structure, building monoliths has never been faster.</p>',
                'user_id' => $admin->id,
                'category_id' => $engineering->id,
                'published_at' => now()->subDays(2),
                'is_featured' => true,
            ]
        );

        Article::firstOrCreate(
            ['slug' => 'tailwind-v4-deep-dive'],
            [
                'title' => 'Tailwind CSS v4: A Deep Dive',
                'content' => '<p>The new engine changes everything. Zero runtime overhead and instant compilation...</p>',
                'user_id' => $admin->id,
                'category_id' => $engineering->id,
                'published_at' => now()->subDays(5),
                'is_featured' => false,
            ]
        );

        // 4. Services
        $services = [
            [
                'title' => 'Web Application Development',
                'icon' => 'code',
                'sort_order' => 1,
                'short_description' => 'Scalable, secure, and high-performance web solutions.',
                'content' => '<p>We build robust web applications using Laravel, React, and Vue.js...</p>',
            ],
            [
                'title' => 'Mobile App Development',
                'icon' => 'smartphone',
                'sort_order' => 2,
                'short_description' => 'Native and cross-platform mobile experiences.',
                'content' => '<p>From Flutter to React Native, we deliver smooth mobile experiences...</p>',
            ],
            [
                'title' => 'UI/UX Design',
                'icon' => 'brush',
                'sort_order' => 3,
                'short_description' => 'User-centric design that converts.',
                'content' => '<p>Our design process involves deep user research and iterative prototyping...</p>',
            ],
            [
                'title' => 'Cloud Architecture',
                'icon' => 'cloud',
                'sort_order' => 4,
                'short_description' => 'Infrastructure as Code and DevOps automation.',
                'content' => '<p>We leverage AWS and Google Cloud to ensure your app scales effortlessly...</p>',
            ],
        ];

        foreach ($services as $service) {
            Service::firstOrCreate(
                ['slug' => Str::slug($service['title'])],
                $service
            );
        }

        // 5. Job Postings
        JobPosting::firstOrCreate(
            ['slug' => 'senior-full-stack-engineer'],
            [
                'title' => 'Senior Full Stack Engineer',
                'department' => 'Engineering',
                'location' => 'Remote (GMT+7)',
                'type' => 'Full-time',
                'description' => '<p>We are looking for a Laravel & React expert...</p>',
                'is_active' => true,
            ]
        );

        JobPosting::firstOrCreate(
            ['slug' => 'product-designer'],
            [
                'title' => 'Product Designer',
                'department' => 'Design',
                'location' => 'Jakarta, ID',
                'type' => 'Full-time',
                'description' => '<p>Help us craft beautiful interfaces...</p>',
                'is_active' => true,
            ]
        );

        // 6. Site Settings
        $settings = [
            ['key' => 'legal_name', 'value' => 'PT Akselerasi Digital Mandiri', 'group' => 'general'],
            ['key' => 'registered_city', 'value' => 'Jakarta, Indonesia', 'group' => 'general'],
            ['key' => 'reg_number', 'value' => 'Reg No: 2025-AL-ID', 'group' => 'general'],
            ['key' => 'contact_email', 'value' => 'hello@acceleratelab.io', 'group' => 'contact'],
            ['key' => 'linkedin_url', 'value' => 'https://linkedin.com/company/accelerate-lab', 'group' => 'social'],
            ['key' => 'site_logo', 'value' => 'images/logo.webp', 'group' => 'general'],
        ];

        foreach ($settings as $setting) {
            SiteSetting::firstOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }

        // 7. Technologies
        $technologies = [
            ['name' => 'Laravel', 'category' => 'Backend'],
            ['name' => 'React', 'category' => 'Frontend'],
            ['name' => 'Tailwind CSS', 'category' => 'Frontend'],
            ['name' => 'Docker', 'category' => 'DevOps'],
            ['name' => 'Figma', 'category' => 'Design'],
        ];

        foreach ($technologies as $tech) {
            Technology::firstOrCreate(
                ['name' => $tech['name']],
                $tech
            );
        }
    }
}
