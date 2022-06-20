<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeporteTipoDeporte extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deporte_tipo_deporte', function (Blueprint $table) {

            $table->integer('deporte_id')->unsigned();
            $table->integer('tipo_deporte_id')->unsigned();

            $table->foreign('deporte_id')->references('id')->on('deportes');
            $table->foreign('tipo_deporte_id')->references('id')->on('tipo_deportes');
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
