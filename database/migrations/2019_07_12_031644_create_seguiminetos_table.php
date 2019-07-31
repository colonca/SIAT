<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeguiminetosTable extends Migration
{

    public function up()
    {
        Schema::create('seguiminetos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('descripcion');
            $table->date('fecha');
            $table->bigInteger('intervencion_individual_id')->unsigned();
            $table->foreign('intervencion_individual_id')->references('id')->on('intervencion_individual');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('seguiminetos');
    }
}
