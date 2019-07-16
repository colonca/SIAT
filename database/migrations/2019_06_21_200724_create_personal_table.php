<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalTable extends Migration
{

    public function up()
    {

        Schema::create('personal', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('cedula',12)->unique();
            $table->string('primer_nombre',30);
            $table->string('segundo_nombre',30)->nullable();
            $table->string('primer_apellido',30);
            $table->string('segundo_apellido',30)->nullable();
            $table->date('fecha_nacimiento');
            $table->string('direccion',50);
            $table->string('email')->unique();
            $table->string('email_institucional')->unique();
            $table->string('telefono',11);
            $table->string('celular',11);
            $table->string('tipo_usuario');

            $table->bigInteger('contacto_emergencia_id')->unsigned();
            $table->foreign('contacto_emergencia_id')->references('id')->on('contacto_emergencia');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal');
    }
}
