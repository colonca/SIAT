<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    public $timestamps = false;
    protected  $table = 'horario';

    protected $fillable =  [
        'dia','hora'
    ];

    public function peronal(){
        return $this->belongsToMany(Personal::class,'horario_personal','horario_id','personal_id');
    }

}
