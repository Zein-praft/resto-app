<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->word(),
            'description' => fake()->sentence(),
            'price' => fake()->numberBetween(1000, 100000),
            'category_id' => fake()->numberBetween(1, 3),
            'img' => fake()->imageUrl(),
            'is_active' => fake()->boolean(80), // 80% chance of being active
        ];
    }
}
