<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    protected $fillable = [
        'nombre','descripcion'
    ];

    public function grupo_usuarios(){
        return $this->belongsToMany(Grupo_Usuario::class,'grupo_modulos','modulo_id','grupo_usuario_id');
    }

}
