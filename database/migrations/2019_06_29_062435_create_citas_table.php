<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitasTable extends Migration
{

    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->bigInteger('personal_id')->unsigned();
            $table->bigInteger('estudiante_id')->unsigned();
            $table->date('fecha');
            $table->integer('hora')->unsigned();
            $table->enum('estado',['ATENDIDO','PERDIDA','PENDIENTE','CANCELADA'])->default('PENDIENTE');

            $table->foreign('personal_id')->references('id')->on('personal');
            $table->foreign('estudiante_id')->references('id')->on('estudiantes');
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('citas');
    }
}
