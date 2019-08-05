<?php


namespace App\Utiles;


use App\Periodoacademico;

class Procedimientos
{

    public static function periodoDelAnhoActual(){

        $fechaFFase = date('Y-m-d');

        $periodo = Periodoacademico::where([
            ['fechainicio','<=',$fechaFFase],
            ['fechafin','>=',$fechaFFase]
        ])->first();

        return $periodo ? $periodo->id : null;

    }

}
