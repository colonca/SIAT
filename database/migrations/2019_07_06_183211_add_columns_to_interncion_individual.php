<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToInterncionIndividual extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('intervencion_individual', function (Blueprint $table) {
            $table->string('antecedentes_personales')->nullable();
            $table->string('antecedentes_familiares')->nullable();
            $table->string('plan_de_accion');
            $table->string('tipo_de_familia_desc');
            $table->bigInteger('periodo_id')->unsigned();
            $table->foreign('periodo_id')->references('id')->on('periodoacademicos')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('interncion_individual', function (Blueprint $table) {
            $table->dropColumn('antecedentes_personales');
            $table->dropColumn('antecedentes_familiares');
            $table->dropColumn('plan_de_accion');
            $table->dropColumn('tipo_de_familia_desc');
            $table->dropColumn('periodo_id');
        });
    }
}
