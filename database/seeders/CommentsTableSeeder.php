<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class CommentsTableSeeder extends Seeder
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
            DB::table('comments')->insert([
                'customer_id' => $faker->numberBetween(1, 10),
                'product_id' => $faker->numberBetween(1, 10),
                'content' => $faker->paragraphs(1, true),
                'status' => $faker->randomElement([0, 1]),
            ]);
        }
    }
}
