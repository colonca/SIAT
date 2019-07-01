<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected  $table = 'personal';


    protected  $fillable =  [
        'cedula','primer_nombre','segundo_nombre',
        'primer_apellido','segundo_apellido','fecha_nacimiento',
        'direccion','email','email_institucional',
        'telefono','celular','tipo_usuario','contacto_emergencia_id'
    ];

    public function contacto(){
        return $this->belongsTo(Contacto_Emergencias::class,'contacto_emergencia_id');
    }

    public function psicologo(){
        return $this->belongsTo(Psicologo::class);
    }

    public function horarios(){
        return $this->belongsToMany(Horario::class,'horario_personal','personal_id','horario_id');
    }

    public function citas(){
        return $this->hasMany(Cita::class,'personal_id');
    }

}
