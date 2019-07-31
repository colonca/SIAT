<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntervencionIndividualTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intervencion_individual', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->date('fecha_nacimiento');
            $table->integer('edad')->unsigned();
            $table->string('direccion',60);
            $table->string('estado_civil');
            $table->string('procedencia');
            $table->enum('trabaja',['si','no']);
            $table->string('procedencia_recursos')->nullable();
            $table->string('tipo_familia');
            $table->enum('relacion_compañeros',['MALA','REGULAR','BUENA','EXCELENTE']);
            $table->enum('relacion_docente',['MALA','REGULAR','BUENA','EXCELENTE']);
            $table->integer('fecha_ingreso')->unsigned();
            $table->string('motivo_consulta');

            $table->string('cedula',12);
            $table->foreign('cedula')->references('cedula')->on('personal');
            $table->bigInteger('estudiante_id')->unsigned();
            $table->foreign('estudiante_id')->references('id')->on('estudiantes');

            $table->timestamps();
        });

        Schema::create('impresion_diagnostica', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('descripcion');
            $table->timestamps();
        });

        Schema::create('intervencion_diagnostica', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('intervencion_individual_id')->unsigned();
            $table->foreign('intervencion_individual_id')->references('id')->on('intervencion_individual');
            $table->bigInteger('impresion_diagnostica_id')->unsigned();
            $table->foreign('impresion_diagnostica_id')->references('id')->on('impresion_diagnostica');
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
        Schema::dropIfExists('intervencion_diagnostica');
        Schema::dropIfExists('impresion_diagnostica');
        Schema::dropIfExists('intervencion_individual');
    }
}
