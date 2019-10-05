<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo_Usuario extends Model
{
    protected $table = 'grupo_usuarios';

    protected $fillable = [
        'nombre','descripcion'
    ];

    public function users(){
        return $this->hasMany(User::class,'grupo_usuario_id','id');
    }

    public function modulos(){
        return $this->belongsToMany(Modulo::class,'grupo_modulos','grupo_usuario_id','modulo_id');
    }


    public function paginas(){
        return $this->belongsToMany(Pagina::class,'grupo_paginas','grupo_usuario_id','pagina_id');
    }

}
