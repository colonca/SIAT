<?php


namespace App\Utiles;


class Procedimientos
{

    public static function periodoDelAnhoActual(){

        $fecha = date('Y-m-d');
        $mes = strftime('%m',strtotime($fecha));
        $anho = strftime('%Y',strtotime($fecha));

        return $mes <= 7 ? $anho.'-1' : $anho.'-2';

    }

}