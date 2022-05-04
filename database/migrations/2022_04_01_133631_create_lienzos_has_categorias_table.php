<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLienzosHasCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lienzos_has_categorias', function (Blueprint $table) {
            $table->unsignedInteger("idLie");
            $table->unsignedInteger("idCat");
        });
        Schema::table("lienzos_has_categorias",function($table) {
            $table->foreign("idLie")->references("idLie")->on("lienzos")->onDelete("cascade");
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
        Schema::dropIfExists('lienzos_has_categorias');
    }
}
