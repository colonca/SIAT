<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocentePermanencia extends Model
{

    public $table = 'docente_permanencia';
    public $timestamps =false;

    protected $fillable = [
        'cedula'
    ];

    public function personal(){
        return $this->hasOne(Personal::class);
    }

}
