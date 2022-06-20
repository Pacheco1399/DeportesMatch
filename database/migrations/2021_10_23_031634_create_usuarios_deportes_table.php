<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosDeportesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios_deportes', function (Blueprint $table) {

            //$table->id();

            $table->string('nombre')->nullable();
            $table->integer('deporte_id')->unsigned();
            
            $table->BigInteger('usuario_id')->unsigned();
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
        Schema::dropIfExists('usuarios_deportes');
    }
}
