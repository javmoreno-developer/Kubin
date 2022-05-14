<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosHasCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios_has_categorias', function (Blueprint $table) {
            $table->unsignedInteger("idUsu");
            $table->unsignedInteger("idCat");
        });
         Schema::table("usuarios_has_categorias",function($table) {
            $table->foreign("idUsu")->references("idUsu")->on("usuarios")->onDelete("cascade");
            $table->foreign("idCat")->references("idCat")->on("categorias")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios_has_categorias');
    }
}
