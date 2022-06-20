<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePuntuacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puntuacions', function (Blueprint $table) {
            $table->id();
            $table->integer('posicion')->nullable();
            $table->integer('estado')->nullable();
            $table->string('torneo_nombre')->nullable();
            $table->BigInteger('torneo_id')->unsigned()->nullable();
            $table->BigInteger('equipo_id')->unsigned()->nullable();

            $table->foreign('torneo_id')->references('id')->on('torneos');
            $table->foreign('equipo_id')->references('id')->on('equipos');
            

            //nombre equipo debe ser equipo_id foreing key
            //nombre torneo debe ser torneo_id foeing key 
            //y ambos datos deben estar relacionados
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
        Schema::dropIfExists('puntuacions');
    }
}
