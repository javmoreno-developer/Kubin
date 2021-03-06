<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class lienzosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "idLie"=>$this->faker->unique()->numberBetween(1,10),
            "pathLie"=>$this->faker->word(),
            "nomLie"=>$this->faker->word(),
            "grupLie"=> $this->faker->numberBetween(1,10),
            "created_at"=>$this->faker->date($format="Y-m-d",$max="now"),
            "updated_at"=>$this->faker->date($format="Y-m-d",$max="now"),
        ];
    }
}
