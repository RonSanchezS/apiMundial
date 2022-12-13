<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partidos', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('equipo1_id')->unsigned();
            $table->BigInteger('equipo2_id')->unsigned();
            $table->BigInteger('grupo_id')->unsigned();
            $table->foreign('equipo1_id')->references('id')->on('equipos');
            $table->foreign('equipo2_id')->references('id')->on('equipos');
            $table->foreign('grupo_id')->references('id')->on('grupos');
            $table->String('fecha');
            $table->String('horaInicio');
            $table->String('horaFin');
            $table->Integer('estado');
            $table->Integer('golesEquipo1');
            $table->Integer('golesEquipo2');
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
        Schema::dropIfExists('partido');
    }
};
