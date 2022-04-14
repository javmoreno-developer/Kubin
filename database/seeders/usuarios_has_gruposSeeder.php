<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class usuarios_has_gruposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();
        for($i=0;$i<3;$i++) {
            DB::table("usuarios_has_grupos")->insert([
                "idUsu"=>$faker->numberBetween(1,10),
                "idGrup"=>$faker->numberBetween(1,10),
                "created_at"=>$faker->date($format="Y-m-d",$max="now"),
                "updated_at"=>$faker->date($format="Y-m-d",$max="now"),
            ]);
        }
    }
}
