<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorarioTable extends Migration
{

    public function up()
    {
        Schema::create('horario', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('dia')->unsigned();
            $table->integer('hora')->unsigned();
        });

        Schema::create('horario_personal', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->bigInteger('horario_id')->unsigned();
            $table->bigInteger('personal_id')->unsigned();

            $table->foreign('horario_id')->references('id')->on('horario');
            $table->foreign('personal_id')->references('id')->on('personal');

        });

    }

    public function down()
    {
        Schema::dropIfExists('horario');
    }
}
