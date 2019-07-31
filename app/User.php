<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'cedula';

    protected $fillable = [
        'cedula', 'email', 'password','grupo_usuario_id','nombre'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){
        return $this->belongsTo(Grupo_Usuario::class, 'grupo_usuario_id','id');
    }
}
