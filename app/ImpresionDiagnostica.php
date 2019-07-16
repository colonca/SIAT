<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImpresionDiagnostica extends Model
{
    protected $table = 'impresion_diagnostica';

    protected $fillable = [
        'descripcion'
    ];

    public function intervenciones(){
        return $this->belongsToMany(IntervencionIndividual::class,'intervencion_diagnostica','impresion_diagnostica_id','intervencion_individual_id');
    }
}
