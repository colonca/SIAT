<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagina extends Model
{
    protected $fillable = [
        'nombre','descripcion'
    ];

    public function grupo_usuarios(){
        return $this->belongsToMany(Grupo_Usuario::class,'grupo_paginas','pagina_id','grupo_usuario_id');
    }
}
