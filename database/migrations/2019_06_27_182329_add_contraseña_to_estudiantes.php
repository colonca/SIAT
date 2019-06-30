<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddContraseñaToEstudiantes extends Migration
{

    public function up()
    {
        Schema::table('estudiantes', function (Blueprint $table) {
            $table->string('contraseña');
        });
    }

    public function down()
    {
        Schema::table('estudiantes', function (Blueprint $table) {
            $table->dropColumn();
        });
    }

}
