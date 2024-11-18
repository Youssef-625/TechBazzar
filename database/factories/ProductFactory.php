<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use function fake;
use function Laravel\Prompts\select;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => 3,
            'type' => fake()->randomElement(['apple', 'samsung', 'lenovo']),
            'name' => fake()->word(),
            'price' => fake()->numberBetween(3000, 10000),
            'status' => fake()->randomElement(['featured', 'onSale', null]),
            'stock' => fake()->numberBetween(1, 20),
            'description' => fake()->paragraph,
            'imageUrl' => '/images/pc.webp',
        ];
    }
}
