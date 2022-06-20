<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->id();
            $table->string('nombreEquipo');
            $table->string('descripcion')->nullable();
            $table->integer('miembros');
            $table->integer('capacidad');
            $table->integer('privacidad');
            $table->integer('borrado_equipo')->nullable();
            $table->binary('foto')->nullable();

            $table->integer('deporte_id')->unsigned();
            
            $table->BigInteger('usuario_id')->unsigned()->nullable();
            $table->foreign('usuario_id')->references('id')->on('users');
            
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
        Schema::dropIfExists('equipos');
    }
}
