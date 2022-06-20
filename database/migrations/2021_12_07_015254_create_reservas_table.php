<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('fecha');
            $table->dateTime('start');
            $table->dateTime('end');
            //$table->integer('cancha');
            $table->BigInteger('cancha_id')->unsigned()->nullable();
            $table->BigInteger('complejo_id')->unsigned()->nullable();
            $table->BigInteger('evento_id')->unsigned()->nullable();

            $table->foreign('evento_id')->references('id')->on('eventos');
            $table->foreign('complejo_id')->references('id')->on('complejos_deportivos');
            $table->foreign('cancha_id')->references('id')->on('canchas');

 
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
        Schema::dropIfExists('reservas');
    }
}
