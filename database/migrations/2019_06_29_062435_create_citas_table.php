<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->bigInteger('personal_id')->unsigned();
            $table->string('estudiante_id');
            $table->date('fecha');
            $table->integer('hora')->unsigned();
            $table->enum('estado',['ATENDIDO','PERDIDA','PENDIENTE'])->default('PENDIENTE');

            $table->foreign('personal_id')->references('id')->on('personal');
            $table->foreign('estudiante_id')->references('cedula')->on('estudiantes');
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
        Schema::dropIfExists('citas');
    }
}
