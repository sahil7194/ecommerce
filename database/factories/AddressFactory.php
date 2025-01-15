<?php

namespace Database\Factories;

use App\Models\State;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $state = State::inRandomOrder()->first();

        return [
            "street"        => fake()->streetName(),
            "city"          => fake()->city(),
            "state_id"      => $state->id,
            "country_id"    => $state->country_id,
            "type"          => fake()->randomElement(["home","work"])
        ];
    }
}
