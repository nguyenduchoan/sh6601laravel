<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'content'=>$this->faker->text(),
            'product_id'=>$this->faker->randomNumber(1,true),
            'user_id'=>$this->faker->randomNumber(1,true),
            'star'=>$this->faker->randomFloat(0, 1, 5),
        ];
    }
}
