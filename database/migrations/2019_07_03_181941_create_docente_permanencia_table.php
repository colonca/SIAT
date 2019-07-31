<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocentePermanenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docente_permanencia', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('cedula',12)->unique();
            $table->foreign('cedula')->references('cedula')->on('personal');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('docente_permanencia');
    }
}
