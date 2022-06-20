<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsuarioTipoUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_tipo_usuario', function (Blueprint $table) {

           
            $table->BigInteger('usuario_id')->unsigned()->nullable();
            $table->BigInteger('tipo_usuario_id')->unsigned();

            $table->foreign('usuario_id')->references('id')->on('users');
            $table->foreign('tipo_usuario_id')->references('id')->on('tipo_usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
