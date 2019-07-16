<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IntervencionIndividual extends Model
{

    protected $table = 'intervencion_individual';

    protected $fillable = [
        'fecha_nacimiento','edad','direccion','estado_civil',
        'procedencia','trabaja','procedencia_recursos','tipo_familia',
        'relacion_compañeros','relacion_docente','fecha_ingreso','motivo_consulta',
        'cedula','estudiante_id','plan_de_accion','tipo_de_familia_desc','antecedentes_personales',
        'antecedentes_familiares','periodo'
    ];

    public function impresiones(){
        return $this->belongsToMany(ImpresionDiagnostica::class,'intervencion_diagnostica','intervencion_individual_id','impresion_diagnostica_id');
    }

    public function estudiante(){
        return $this->belongsTo(Estudiante::class,'estudiante_id','id');
    }

    public function seguimientos(){
        return $this->hasMany(Seguimineto::class,'intervencion_individual_id','id');
    }

}
