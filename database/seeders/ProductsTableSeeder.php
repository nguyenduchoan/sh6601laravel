<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for ($i = 1; $i <= 10; $i++) {
            DB::table('products')->insert([
                'name' => $faker->sentence(4),
                'price' => $faker->randomFloat(2, 10, 200),
                'sale_price' => $faker->randomElement([0, 10, 20, 30]),
                'image' => $faker->imageUrl(),
                'category_id' => $faker->numberBetween(1, 10),
                'status' => $faker->randomElement([0, 1]),
                'content' => $faker->paragraphs(3, true),
            ]);
        }
    }
}
