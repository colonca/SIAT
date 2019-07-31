<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactoEmergenciaTable extends Migration
{

    public function up()
    {
        Schema::create('contacto_emergencia', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre',100);
            $table->string('parentezco',25);
            $table->string('celular',12);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contacto_emergencia');
    }
}
