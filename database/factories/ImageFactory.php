<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $number = str_pad($this->faker->numberBetween(1, 30), 2, '0', STR_PAD_LEFT);
        return [
            'image'=>'p-'.$number.'.jpg',
            'product_id'=>$this->faker->numberBetween(1, 30),
        ];
    }
}
