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


}
