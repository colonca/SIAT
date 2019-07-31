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
        'antecedentes_familiares','periodo_id'
    ];

    public function scopeCedula($query,$cedula){
        if($cedula)
            return $query->where('cedula',$cedula);
    }

    public function scopePeriodo($query,$periodo){
        if($periodo)
            return $query->where('periodo_id',$periodo);
    }

    public function scopeFechastart($query,$fechaStart){
        if($fechaStart)
            return $query->where([
                ['created_at','>=',$fechaStart]
            ]);
    }

    public function scopeFechaend($query,$fehcaEnd){
        if($fehcaEnd)
            return $query->where([
                ['created_at','<=',$fehcaEnd]
            ]);
    }

    public function personal(){
        return $this->belongsTo(Personal::class,'cedula','cedula');
    }

    public function impresiones(){
        return $this->belongsToMany(ImpresionDiagnostica::class,'intervencion_diagnostica','intervencion_individual_id','impresion_diagnostica_id');
    }

    public function estudiante(){
        return $this->belongsTo(Estudiante::class,'estudiante_id','id');
    }

    public function seguimientos(){
        return $this->hasMany(Seguimineto::class,'intervencion_individual_id','id');
    }

    public function periodo(){
        return $this->belongsTo(Periodoacademico::class,'periodo_id','id');
    }

}
