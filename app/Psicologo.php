<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Psicologo extends Model
{
    public $timestamps =false;
    protected $table = 'psicologo';

    protected $fillable = [
        'cedula'
    ];

    public function personal(){
        return $this->hasOne(Personal::class);
    }

}
