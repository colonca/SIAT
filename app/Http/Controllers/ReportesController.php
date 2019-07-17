<?php

namespace App\Http\Controllers;

use App\Estudiante;
use App\Periodoacademico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportesController extends Controller
{
     public function __construct(){
         $this->middleware('auth');
     }

     public function reporteIntervencionIndividual(){
           
        return view('reportes.intervencion_individual.index');

     }

     public function reporte_Estudiante(){

         $periodos = Periodoacademico::all();

         $datos = [];
         $totales = [];

         $riegoBajototal = 0;
         $riegoMediototal = 0;
         $riesgoAltototal = 0;
         $riegoSuperAltototal = 0;
         $riegoSuperBajototal = 0;
         foreach ($periodos as $periodo){
             $riegoBajo = 0;
             $riegoMedio = 0;
             $riesgoAlto = 0;
             $riegoSuperAlto = 0;
             $riegoSuperBajo = 0;
            foreach ($periodo->estudiantes as $estudiante){
                switch (substr($estudiante->estado,3)){
                    case 'Riesgo Bajo':
                        $riegoBajo++;
                        $riegoBajototal++;
                        break;
                    case 'Alto':
                        $riesgoAlto++;
                        $riesgoAltototal++;
                        break;
                    case 'Riesgo Medio':
                        $riegoMedio++;
                        $riegoMediototal++;
                        break;
                    case 'Riesgo super alto':
                        $riegoSuperAlto++;
                        $riegoSuperAltototal++;
                        break;
                    case 'Riesgo super bajo':
                        $riegoSuperBajo++;
                        $riegoSuperBajototal++;
                        break;
                }
            }
            $datos[] = [
                    'periodo' => $periodo->anio.'-'.$periodo->periodo,
                    'Riesgo Bajo' => $riegoBajo,
                    'Alto'=>$riesgoAlto,
                    'Riesgo Medio'=>$riegoMedio,
                    'Riesgo super alto'=>$riegoSuperAlto,
                    'Riesgo super Bajo' => $riegoSuperBajo
            ];

            $totales = [$riegoSuperAltototal,$riesgoAltototal,$riegoMediototal,$riegoBajototal,$riegoSuperBajototal];

         }

         $programas= DB::table('estudiantes')
             ->select('programa')
             ->distinct()->get();

         $estudiantes = Estudiante::all();

         $riegoBajototalPrograma = 0;
         $riegoMediototalPrograma = 0;
         $riesgoAltototalPrograma = 0;
         $riegoSuperAltototalPrograma = 0;
         $riegoSuperBajototalPrograma = 0;

         foreach ($programas as $programa){
             $riegoBajo = 0;
             $riegoMedio = 0;
             $riesgoAlto = 0;
             $riegoSuperAlto = 0;
             $riegoSuperBajo = 0;

           foreach ($estudiantes as $estudiante){

                if($estudiante->programa == $programa->programa){
                    switch (substr($estudiante->estado,3)){
                        case 'Riesgo Bajo':
                            $riegoBajo++;
                            break;
                        case 'Alto':
                            $riesgoAlto++;
                            break;
                        case 'Riesgo Medio':
                            $riegoMedio++;
                            break;
                        case 'Riesgo super alto':
                            $riegoSuperAlto++;
                            break;
                        case 'Riesgo super bajo':
                            $riegoSuperBajo++;
                            break;
                    }
                }
           }
             $datosPrograma[] = [
                 'programa' => $programa->programa,
                 'Riesgo Bajo' => $riegoBajo,
                 'Alto'=>$riesgoAlto,
                 'Riesgo Medio'=>$riegoMedio,
                 'Riesgo super alto'=>$riegoSuperAlto,
                 'Riesgo super Bajo' => $riegoSuperBajo
             ];

         }

        return view('reportes.Estudiante.index',compact('datos','totales','periodos','datosPrograma'));
     }

     public function getDatos(){

         $periodos = Periodoacademico::all();
         $json = [];

         foreach ($periodos as $periodo){
             $riegoBajo = 0;
             $riegoMedio = 0;
             $riesgoAlto = 0;
             $riegoSuperAlto = 0;
             $riegoSuperBajo = 0;
             foreach ($periodo->estudiantes as $estudiante){
                 switch (substr($estudiante->estado,3)){
                     case 'Riesgo Bajo':
                         $riegoBajo++;
                         break;
                     case 'Alto':
                         $riesgoAlto++;
                         break;
                     case 'Riesgo Medio':
                         $riegoMedio++;
                         break;
                     case 'Riesgo super alto':
                         $riegoSuperAlto++;
                         break;
                     case 'Riesgo super bajo':
                         $riegoSuperBajo++;
                         break;
                 }
             }

             $riesgoBajoArray[] = $riegoBajo;
             $riesgoAltoArray[] = $riesgoAlto;
             $riegoMedioArray[] = $riegoMedio;
             $riegoSuperAltoArray[] = $riegoSuperAlto;
             $riegoSuperBajoArray[] = $riegoSuperBajo;
             $json[] = $periodo->anio.'-'.$periodo->periodo;
         }

         return response()->json([
             'periodos' => $json,
             'riegoBajo' => $riesgoBajoArray,
             'riesgoAlto' => $riesgoAltoArray,
             'riesgoMedio' => $riegoMedioArray,
             'riesgoSuperAlto' => $riegoSuperAltoArray,
             'riesgoSuperBajo' => $riegoSuperBajoArray
         ]);
     }


}
