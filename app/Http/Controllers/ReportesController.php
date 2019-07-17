<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportesController extends Controller
{
     public function __construct(){
         $this->middleware('auth');
     }

     public function reporteIntervencionIndividual(){
           
        return view('reportes.intervencion_individual.index');

     }

     public function reporteIntervencionIndividualGeneral(){
           
      return view('reportes.intervencion_individual.reporte_General');

   }

   public function reporteImpresionDiagnostica(){
           
      return view('reportes.intervencion_individual.r_impresion_Diagnostica');

   }

     
     public function reporte_Estudiante(){
           
        return view('reportes.Estudiante.index');

     }


}
