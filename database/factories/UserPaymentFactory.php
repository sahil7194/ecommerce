<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserPayment>
 */
class UserPaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $order = Order::inRandomOrder()->first();

        return [
            "order_id"  => $order->id,
            "user_id"   => $order->user->id,
            "amount"    => $order->total_amount,
            "mode"      => fake()->randomElement(['credit-card','debit-card','upi']),
            "status"    => fake()->randomElement([ 'pending', 'completed','failed',   'cancelled',  'refunded' ]),
        ];
    }
}
