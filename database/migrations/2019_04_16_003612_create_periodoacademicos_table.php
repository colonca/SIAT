<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeriodoacademicosTable extends Migration {

    public function up() {
        Schema::create('periodoacademicos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fechainicio');
            $table->date('fechafin');
            $table->string('anio', 4);
            $table->string('periodo', 2)->nullable();
            $table->date('fechainicioclases');
            $table->date('fechafinclases');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('periodoacademicos');
    }
}
