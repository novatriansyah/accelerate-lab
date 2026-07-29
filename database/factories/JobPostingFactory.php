<?php

namespace Database\Factories;

use App\Models\JobPosting;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class JobPostingFactory extends Factory
{
    protected $model = JobPosting::class;

    public function definition(): array
    {
        $title = $this->faker->jobTitle();

        return [
            'title' => $title,
            'slug' => Str::slug($title . '-' . Str::random(4)),
            'department' => 'Engineering',
            'location' => 'Remote / Jakarta',
            'type' => 'Full-time',
            'description' => $this->faker->paragraph(),
            'is_active' => true,
        ];
    }

    public function inactive(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_active' => false,
        ]);
    }
}
