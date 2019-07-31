<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto_Emergencias extends Model
{
    protected $table = 'contacto_emergencia';
    public $timestamps = false;

    protected  $fillable = [
        'nombre','parentezco','celular'
    ];

    public function personal(){
        return $this->hasOne(Personal::class,$this->table,'id');
    }

}
