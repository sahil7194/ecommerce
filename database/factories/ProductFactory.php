<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        $cat = Category::inRandomOrder()->first();

        $vendor = Vendor::inRandomOrder()->first();

        return [
            "name"          => fake()->name(),
            "description"   => fake()->paragraph(5),
            "image"         => fake()->imageUrl($width = 640, $height = 480, $category = null, $randomize = true, $word = null, $gray = false, $format = 'png'),
            "price"         => fake()->numberBetween(0, 10000),
            "stock"         => fake()->numberBetween(0, 1000),
            "category_id"   =>  $cat->id,
            "vendor_id"     =>  $vendor->id

        ];
    }
}
