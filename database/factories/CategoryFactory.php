<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */


    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word(),
            'status' => $this->faker->randomElement([0,1]),
        ];
    }


}
