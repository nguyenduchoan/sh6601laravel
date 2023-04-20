<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'Electronics', 'description' => 'Electronic devices and accessories'],
            ['name' => 'Clothing', 'description' => 'Clothing and apparel'],
            ['name' => 'Home & Garden', 'description' => 'Furniture, home decor and gardening'],
            ['name' => 'Beauty & Health', 'description' => 'Personal care products and wellness'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
