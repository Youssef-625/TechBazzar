<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\User;
use Illuminate\Database\Seeder;
use Random\RandomException;
use function fake;
use function rand;
use function random_int;


class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        User::all()->each(function ($user) {
            $cart = Cart::factory()->create(['user_id' => $user->id]);
            CartItem::factory(fake()->randomElement([1,1,2,1,3,1,4,1]))->create([
                'cart_id' => $cart->id,
            ]);
        });
    }
}
