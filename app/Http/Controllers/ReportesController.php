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

     
     public function reporte_Estudiante(){
           
        return view('reportes.Estudiante.index');

     }


}
