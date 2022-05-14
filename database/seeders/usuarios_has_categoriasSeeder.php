<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class usuarios_has_categoriasSeeder extends Seeder
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
            DB::table("usuarios_has_categorias")->insert([
                "idUsu"=>$faker->numberBetween(1,10),
                "idCat"=>$faker->numberBetween(1,10),
            ]);
        }
    }
}
