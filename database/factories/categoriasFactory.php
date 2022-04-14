<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class categoriasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "idCat"=>$this->faker->unique()->numberBetween(1,10),
            "nomCat"=>$this->faker->word(),
            "descCat"=>$this->faker->sentence(),
        ];
    }
}
