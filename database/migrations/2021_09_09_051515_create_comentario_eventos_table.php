<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComentarioEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentario_eventos', function (Blueprint $table) {
            $table->id();
            $table->string('comentario');
            $table->integer('valoracion');
            $table->BigInteger('usuario_id')->unsigned()->nullable();
            $table->BigInteger('evento_id')->unsigned()->nullable();

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
        Schema::dropIfExists('comentario_eventos');
    }
}
