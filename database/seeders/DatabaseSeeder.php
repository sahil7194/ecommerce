<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Category;
use App\Models\Country;
use App\Models\Product;
use App\Models\State;
use App\Models\User;
use App\Models\Vendor;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Vendor::factory(10)->create();
        Category::factory(10)->create();
        Country::factory(10)->create();
        State::factory(100)->create();
        Address::factory(20)->create();
        Product::factory(50)->create();
    }
}
