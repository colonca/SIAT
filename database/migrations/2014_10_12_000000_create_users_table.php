<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{

    public function up()
    {
        Schema::create('grupo_usuarios',function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('descripcion');

            $table->timestamps();
        });

        Schema::create('paginas',function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('descripcion');

            $table->timestamps();
        });

        Schema::create('modulos',function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('descripcion');

            $table->timestamps();
        });

        Schema::create('grupo_paginas',function (Blueprint $table){

            $table->bigInteger('pagina_id')->unsigned();
            $table->bigInteger('grupo_usuario_id')->unsigned();

            $table->foreign('pagina_id')->references('id')->on('paginas');
            $table->foreign('grupo_usuario_id')->references('id')->on('grupo_usuarios');

            $table->timestamps();

        });

        Schema::create('grupo_modulos',function (Blueprint $table){
            $table->bigInteger('modulo_id')->unsigned();
            $table->bigInteger('grupo_usuario_id')->unsigned();

            $table->foreign('modulo_id')->references('id')->on('modulos');
            $table->foreign('grupo_usuario_id')->references('id')->on('grupo_usuarios');

            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cedula')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->bigInteger('grupo_usuario_id')->unsigned();
            $table->foreign('grupo_usuario_id')->references('id')->on('grupo_usuarios');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
