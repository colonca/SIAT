<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seguimineto extends Model
{

    protected $fillable = [
        'fecha',
        'descripcion',
        'intervencion_individual_id'
    ];

    public function intervencion(){
        return $this->belongsTo(IntervencionIndividual::class,'intervencion_individual_id','id');
    }
}
