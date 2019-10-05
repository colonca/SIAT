<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePsicologoTable extends Migration
{

    public function up()
    {
        Schema::create('psicologo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cedula',12)->unique();
            $table->foreign('cedula')->references('cedula')->on('personal');
        });
    }

    public function down()
    {
        Schema::dropIfExists('psicologo');
    }
}
