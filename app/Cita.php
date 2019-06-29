<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{

    protected $fillable = [
        'personal_id','fecha','hora','estado','estudiante_id'
    ];

    public function personal(){
        return $this->belongsTo(Personal::class);
    }

}
