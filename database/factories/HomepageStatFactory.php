<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HomepageStat>
 */
class HomepageStatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'value' => $this->faker->numberBetween(1, 100),
            'unit' => '%',
            'label' => $this->faker->word(),
            'section' => $this->faker->randomElement(['hero', 'capabilities']),
            'sort_order' => $this->faker->numberBetween(0, 10),
        ];
    }
}
