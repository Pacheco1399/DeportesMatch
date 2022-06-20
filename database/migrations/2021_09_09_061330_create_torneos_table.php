<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTorneosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('torneos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('direccion_torneo');
            $table->integer('torneo_borrado')->nullable();
            $table->date('fecha');
            $table->time('hora');
            $table->integer('cantidad_equipos');
            $table->integer('inscritos')->nullable();
            $table->integer('tipo_torneo');
            $table->BigInteger('usuario_id')->unsigned()->nullable();

            $table->BigInteger('equipo_id')->unsigned()->nullable();
            $table->integer('deporte_id')->unsigned()->nullable();

            $table->foreign('equipo_id')->references('id')->on('equipos');
            $table->foreign('deporte_id')->references('id')->on('deportes');
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
        Schema::dropIfExists('torneos');
    }
}
