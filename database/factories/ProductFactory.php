<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->word(),
            'price'=>$this->faker->randomFloat(2, 1, 100),
            'category_id'=>$this->faker->randomNumber(1, true),
            'description'=>$this->faker->text(),
        ];
    }
}
