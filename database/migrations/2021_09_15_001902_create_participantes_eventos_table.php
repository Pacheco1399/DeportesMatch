<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantesEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participantes_eventos', function (Blueprint $table) {

            $table->integer('participantesTotales')->nullable();
            $table->integer('capacidadParticipantes')->nullable();
            $table->BigInteger('usuario_id')->unsigned();
            $table->BigInteger('evento_id')->unsigned();

            $table->foreign('usuario_id')->references('id')->on('users');
            $table->foreign('evento_id')->references('id')->on('eventos');

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
        Schema::dropIfExists('participantes_eventos');
    }
}
