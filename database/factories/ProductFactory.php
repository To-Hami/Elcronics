<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{

    public function definition()
    {
        return [
            'title'=>$this->faker->word(50),
            'image'=>$this->faker->imageUrl(),
            'description'=>$this->faker->realText(2000),
            'price'=>$this->faker->randomFloat(2,20,100),
            'created_by'=>1,
            'updated_by'=>1,
            'created_at'=>now(),
            'updated_at'=>now(),
        ];
    }
}
