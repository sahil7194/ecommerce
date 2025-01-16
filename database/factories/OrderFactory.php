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

        $status = [
                "Pending",
                "Processing",
                "Shipped",
                "Delivered",
                "Cancelled"];

        return [
            "status"       => fake()->randomElement($status),
            "total_amount" => fake()->numberBetween(100,10000),
            "instructions" => fake()->paragraph(4),
            "address_id"   => $address->id,
            "user_id"      => $user->id

        ];
    }
}
