<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodoacademico extends Model {

    protected $fillable = [
        'id', 'fechainicio', 'fechafin', 'anio', 'periodo', 'fechainicioclases', 'fechafinclases', 'created_at', 'updated_at'
    ];

    protected $hidden = [
            //
    ];

    public function estudiantes(){
        return $this->hasMany(Estudiante::class,'periodo_id','id');
    }

    public function intervencionesIndividuales(){
        return $this->hasMany(IntervencionIndividual::class,'periodo_id','id');
    }

}
