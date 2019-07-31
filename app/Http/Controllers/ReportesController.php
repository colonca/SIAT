<?php

namespace App\Http\Controllers;

use App\Estudiante;
use App\ImpresionDiagnostica;
use App\IntervencionIndividual;
use App\Periodoacademico;
use App\Personal;
use App\Seguimineto;
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

     public function reporteIntervencionIndividualGeneral(Request $request){

       $talleristas = Personal::where('tipo_usuario','psicologo')->get();
       $periodos = Periodoacademico::all();

       $intervenciones = IntervencionIndividual::orderBy('periodo_id','ASC')
                         ->cedula($request->get('tallerista'))
                         ->periodo($request->get('periodo'))
                         ->get();


      return view('reportes.intervencion_individual.reporte_General',compact('intervenciones','talleristas','periodos'));

    }

     public function reporteImpresionDiagnostica(Request $request){

     $periodos = Periodoacademico::all();
     $programas= DB::table('estudiantes')
         ->select('programa')
         ->distinct()->get();

     if($request->exists('programa') and $request->exists('periodo')){

         $impresionesDiagnosticas = ImpresionDiagnostica::whereHas('intervenciones',function($query) use($request){
             $query->whereHas('estudiante',function ($query) use($request){
                 $query->where('programa',$request->get('programa'));
             })->periodo($request->get('periodo'));
         })->get();


     }else{
         $impresionesDiagnosticas = ImpresionDiagnostica::all();
     }

      return view('reportes.intervencion_individual.r_impresion_Diagnostica',compact('periodos','programas','impresionesDiagnosticas'));
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

     public function reporte_periodo($programa,$periodo){

         if($programa){
             $impresionesDiagnosticas = ImpresionDiagnostica::whereHas('intervenciones',function($query) use($periodo,$programa){
                 $query->whereHas('estudiante',function ($query) use($programa){
                     $query->where('programa',$programa);
                 })->periodo($periodo);
             })->get();
         }else{
             $impresionesDiagnosticas = ImpresionDiagnostica::periodo($periodo)
             ->get();
         }

         if(count($impresionesDiagnosticas)>0){
             foreach ($impresionesDiagnosticas as $impresion){

                 $datos[] = [
                     'impresion' => $impresion->descripcion,
                     'cantidad' => $impresion->intervenciones->count()
                 ];

                 $datosGrafica[] = $impresion->intervenciones->count();
                 $datosTitle[] = $impresion->descripcion;
             }
             return response()->json([
                 'status' => 'ok',
                 'datos' => $datos,
                 'grafica'=>$datosGrafica,
                 'title' => $datosTitle
             ]);
         }

     }

}
