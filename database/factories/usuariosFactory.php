<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class usuariosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "idUsu"=>$this->faker->unique()->numberBetween(1,10),
            "nomUsu"=>$this->faker->name(),
            "apeUsu"=>$this->faker->name(),
            "email"=>$this->faker->email(),
            "perfUsu"=>$this->faker->numberBetween(0,2),
            "password"=>Hash::make(12),
            "imagenUsu"=>$this->faker->sentence(),
            "created_at"=>$this->faker->date($format="Y-m-d",$max="now"),
            "updated_at"=>$this->faker->date($format="Y-m-d",$max="now"),
        ];
    }
}
