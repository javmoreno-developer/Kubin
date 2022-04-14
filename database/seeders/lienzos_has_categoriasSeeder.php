<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class lienzos_has_categoriasSeeder extends Seeder
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
            DB::table("lienzos_has_categorias")->insert([
                "idLie"=>$faker->numberBetween(1,10),
                "idCat"=>$faker->numberBetween(1,10),
                "created_at"=>$faker->date($format="Y-m-d",$max="now"),
                "updated_at"=>$faker->date($format="Y-m-d",$max="now"),
            ]);
        }
    }
}
