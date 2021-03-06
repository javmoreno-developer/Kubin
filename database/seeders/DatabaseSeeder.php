<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         //\App\Models\usuarios::factory(10)->create();
         //\App\Models\lienzos::factory(10)->create();
         //\App\Models\categorias::factory(10)->create();
         //\App\Models\grupos::factory(10)->create();
        $this->call([
            //usuarios_has_gruposSeeder::class,
            //usuarios_has_lienzosSeeder::class,
           //lienzos_has_categoriasSeeder::class,
           usuarios_has_categoriasSeeder::class,
        ]);
    }
}
