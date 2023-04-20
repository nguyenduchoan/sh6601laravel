<?php

namespace Database\Seeders;

use App\Models\Category;
use Database\Factories\ProductFactory;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::all();

        $products = ProductFactory::factory()->count(20)->create();
    }
}
