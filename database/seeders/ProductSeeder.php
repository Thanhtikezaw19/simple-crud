<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            Product::create([
                'name' => $faker->sentence,
                'price' => $faker->randomFloat(2, 0.01, 100), // Generates a random float between 0.01 and 10 with 2 decimal places
                'details' => $faker->paragraph,
                'is_published' => $faker->boolean,
            ]);
        }
    }
}
