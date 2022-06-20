<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosTorneosDeportesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos_torneos_deportes', function (Blueprint $table) {
            $table->BigInteger('torneos_id')->unsigned();
            $table->integer('deportes_id')->unsigned();
            $table->BigInteger('eventos_id')->unsigned();

            $table->BigInteger('usuario_id')->unsigned()->nullable();
            $table->foreign('usuario_id')->references('id')->on('users');

            $table->foreign('torneos_id')->references('id')->on('torneos');
            $table->foreign('deportes_id')->references('id')->on('deportes');
            $table->foreign('eventos_id')->references('id')->on('eventos');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventos_torneos_deportes');
    }
}
