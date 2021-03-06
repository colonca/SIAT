<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudiantesTable extends Migration
{

    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('cedula', 16);
            $table->string('nombres',100);
            $table->string('programa',65);
            $table->string('direccion',100)->nullable();
            $table->string('email',60)->nullable();
            $table->string('telefono',25)->nullable();
            $table->string('celular',20)->nullable();
            $table->integer('periodo_academico')->nullable();
            $table->integer('periodo_cronologico')->nullable();
            $table->float('promedio_general')->nullable();
            $table->float('promedio_semestral')->nullable();
            $table->string('estado',20)->nullable();
            $table->bigInteger('periodo_id')->unsigned();
            $table->foreign('periodo_id')->references('id')->on('periodoacademicos')->onDelete('CASCADE');
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
        Schema::dropIfExists('estudiantes');
    }
}
