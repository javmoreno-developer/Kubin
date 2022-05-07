<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class gruposFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "idGrup"=>$this->faker->unique()->numberBetween(1,10),
            "nomGrup"=>$this->faker->word(),
            "created_at"=>$this->faker->date($format="Y-m-d",$max="now"),
            "updated_at"=>$this->faker->date($format="Y-m-d",$max="now"),
        ];
    }
}
