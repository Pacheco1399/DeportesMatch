<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {

            $table->id();
            $table->string('nombreEvento');
            $table->date('fechaEvento');
            $table->time('horaEvento');
            $table->string('ubicacionEvento');
            $table->integer('estado')->nullable();
            $table->integer('participantesTotales');

            $table->integer('deporte_id')->unsigned()->nullable();
            $table->BigInteger('usuario_id')->unsigned()->nullable();
            $table->BigInteger('complejo_id')->unsigned()->nullable();

            $table->foreign('usuario_id')->references('id')->on('users');
            $table->foreign('deporte_id')->references('id')->on('deportes');
            $table->foreign('complejo_id')->references('id')->on('complejos_deportivos');

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
        Schema::dropIfExists('eventos');
    }
}
