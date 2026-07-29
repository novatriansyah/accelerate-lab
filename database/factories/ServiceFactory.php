<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ServiceFactory extends Factory
{
    protected $model = Service::class;

    public function definition(): array
    {
        $title = $this->faker->unique()->words(2, true);

        return [
            'title' => ucfirst($title),
            'slug' => Str::slug($title),
            'short_description' => $this->faker->sentence(),
            'icon' => 'code',
            'category' => 'development',
            'technologies' => [
                ['name' => 'Laravel', 'icon' => 'laravel'],
                ['name' => 'React', 'icon' => 'react'],
            ],
            'content' => $this->faker->paragraphs(2, true),
            'has_custom_page' => false,
            'meta_title' => null,
            'sort_order' => 1,
        ];
    }
}
