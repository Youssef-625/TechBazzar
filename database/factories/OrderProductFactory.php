<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use function integerValue;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrderProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model=OrderProduct::class;
    public function definition(): array
    {
        $product=Product::inRandomOrder()->take(1)->get();
        return [
            'order_id' => Order::factory(),
            'product_id' => $product[0]->id,
            'quantity' => $this->faker->numberBetween(1, 3),
            'price_at_purchase' => $product[0]->price,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
