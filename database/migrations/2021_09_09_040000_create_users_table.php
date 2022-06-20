<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->integer('numero_telefono')->nullable();
            $table->string('nacionalidad')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->timestamp('ban_date')->nullable();

            $table->integer('edad')->nullable();
            $table->string('rut')->unique()->nullable();
            $table->string('direccion')->nullable();
            $table->integer('direccion_numero')->nullable();
            $table->string('direccion_opcional')->nullable();
            $table->binary('foto')->nullable();
            $table->integer('calificacion')->nullable();
            $table->string('clave_antigua')->nullable();
            $table->string('ubicacion')->nullable();
            $table->integer('rol');
            $table->integer('estado');
            $table->string('ban_time')->nullable();
            $table->string('motivo')->nullable();


            $table->string('comuna')->nullable();
            $table->string('region')->nullable();
            //$table->integer('deporte_id')->unsigned()->nullable();

            //$table->foreign('direccion_id')->references('id')->on('direcciones');
            //$table->foreign('deporte_id')->references('id')->on('deportes');

            //La tabla usuario tiene la tabla tipo_deportes,
            //yo creo que la tabla que debe estar asociada
            //a usuario es deporte, no tipo_deportes como está en el diagrama.

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
