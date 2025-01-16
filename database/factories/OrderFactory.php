<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
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
        $user       =  User::inRandomOrder()->first();

        $address = Address::inRandomOrder()->first();

        return [
            "status" => fake()->randomElements([
                "Pending",
                "Processing",
                "Shipped",
                "Delivered",
                "Cancelled"
            ]),
            "total_amount" => fake()->numberBetween(100, 100000),
            "instructions" => fake()->paragraph(5),
            "address_id"   => $user->id,
            "user_id"      => $address->id
        ];
    }
}
