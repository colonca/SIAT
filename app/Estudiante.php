<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $primaryKey = 'cedula';
    protected $keyType = 'string';

    protected $fillable = [
        'cedula','nombres','programa','direccion','email','telefono','celular',
         'periodo_academico','periodo_cronologico','promedio_general','promedio_semestral','estado'
    ];

    public function scopeCedula($query,$cedula){
        if($cedula)
             return $query->where('cedula','LIKE',"%$cedula%");
    }

    public function scopePrograma($query,$programa){
        if($programa)
              return $query->where('programa','LIKE',"%$programa%");
    }

    public function scopeRiesgo($query,$riesgo){
        if($riesgo)
            return $query->where('estado','like',"%$riesgo%");
    }

    public function scopePromedio($query,$promedio){
        if($promedio)
            return $query->where('promedio_general','>=',$promedio);
    }

    public function scopeNombre($query,$nombre){
        if($nombre)
            return $query->where('nombres','LIKE',"%$nombre%");
    }

}
