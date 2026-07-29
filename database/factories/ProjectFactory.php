<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProjectFactory extends Factory
{
    protected $model = Project::class;

    public function definition(): array
    {
        $title = $this->faker->unique()->words(3, true);

        return [
            'title' => ucfirst($title),
            'slug' => Str::slug($title),
            'client' => $this->faker->company(),
            'industry' => $this->faker->randomElement(['Fintech', 'Healthcare', 'E-commerce', 'SaaS']),
            'description' => $this->faker->paragraph(),
            'challenge' => $this->faker->paragraph(),
            'solution' => $this->faker->paragraph(),
            'image_path' => null,
            'technology_tags' => ['Laravel', 'Vue.js', 'AWS'],
            'stats' => [
                ['value' => '300%', 'label' => 'Growth'],
                ['value' => '99.9%', 'label' => 'Uptime'],
            ],
            'is_featured' => false,
        ];
    }

    public function featured(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_featured' => true,
        ]);
    }
}
