<?php

namespace Database\Factories;

use App\Models\Demo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DemoFactory extends Factory
{
    protected $model = Demo::class;

    public function definition(): array
    {
        $title = $this->faker->company() . ' Portal';
        return [
            'title' => $title,
            'slug' => Str::slug($title) . '-' . $this->faker->unique()->numberBetween(100, 999),
            'client_name' => $this->faker->company(),
            'client_logo' => null,
            'thumbnail' => null,
            'industry' => $this->faker->randomElement(['Fintech', 'Legal', 'Healthcare', 'E-Commerce']),
            'description' => $this->faker->sentence(),
            'html_content' => '<!DOCTYPE html><html><head><title>' . $title . '</title></head><body><h1>' . $title . '</h1><p>Demo content</p></body></html>',
            'assets' => null,
            'access_passcode' => null,
            'default_device' => 'desktop',
            'is_active' => true,
        ];

    }

    public function inactive(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_active' => false,
        ]);
    }

    public function protected(string $passcode = 'secret123'): static
    {
        return $this->state(fn (array $attributes) => [
            'access_passcode' => $passcode,
        ]);
    }
}
