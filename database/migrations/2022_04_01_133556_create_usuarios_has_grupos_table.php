<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosHasGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios_has_grupos', function (Blueprint $table) {
            $table->unsignedInteger("idUsu");
            $table->unsignedInteger("idGrup");
            $table->timestamps();
        });
        Schema::table("usuarios_has_grupos",function($table) {
            $table->foreign("idUsu")->references("idUsu")->on("usuarios")->onDelete("cascade");
            $table->foreign("idGrup")->references("idGrup")->on("grupos")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios_has_grupos');
    }
}
