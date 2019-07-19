<?php


namespace App\Utiles;


use App\Periodoacademico;

class Procedimientos
{

    public static function periodoDelAnhoActual(){

        $fechaFFase = date('Y-m-d');

        $periodo = Periodoacademico::where([
            ['fechainicioclases','<=',$fechaFFase],
            ['fechafinclases','>=',$fechaFFase]
        ])->first();

        return $periodo->id;

    }

}