<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntegrantesEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('integrantes_equipos', function (Blueprint $table) {

            $table->BigInteger('usuario_id')->unsigned();
            $table->BigInteger('equipo_id')->unsigned();
            $table->integer('fundador');

            $table->foreign('usuario_id')->references('id')->on('users');
            $table->foreign('equipo_id')->references('id')->on('equipos');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('integrantes_equipos');
    }
}
