<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $keyType = 'string';

    protected $fillable = [
        'cedula','nombres','programa','direccion','email','telefono','celular','periodo_id',
         'periodo_academico','periodo_cronologico','promedio_general','promedio_semestral','estado','contraseña'
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

    public function scopePeriodo($query,$periodo){
        if($periodo)
            return $query->where('periodo_id',$periodo);
    }


    public function periodo(){
        return $this->belongsTo(Periodoacademico::class,'periodo_id');
    }

}
