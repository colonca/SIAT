<?php

namespace App\Http\Controllers;

use App\Estudiante;
use Illuminate\Http\Request;

class CitaController extends Controller
{

    public function __construct()
    {

    }

    public function estudiante($cedula){
        $estudiante  = Estudiante::where('cedula',$cedula)->first();
        return json_encode($estudiante);
    }

}
