<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosHasLienzosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios_has_lienzos', function (Blueprint $table) {
              $table->unsignedInteger("idUsu");
              $table->unsignedInteger("idLie");
        });
          Schema::table("usuarios_has_lienzos",function($table) {
            $table->foreign("idUsu")->references("idUsu")->on("usuarios")->onDelete("cascade");
            $table->foreign("idLie")->references("idLie")->on("lienzos")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios_has_lienzos');
    }
}
