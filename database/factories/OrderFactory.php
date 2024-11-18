<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 100,
            'total_price' => 10,
            'status' => $this->faker->randomElement(['pending', 'shipped', 'completed']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
