<?php

namespace App\Http\Controllers;

use App\Estudiante;
use App\ImpresionDiagnostica;
use App\IntervencionIndividual;
use App\Periodoacademico;
use App\Personal;
use App\User;
use App\Utiles\Procedimientos;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class IntervencionIndividualController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $personal = Personal::where('cedula', Auth::user()->cedula)->first();

        $intervenciones = IntervencionIndividual::where([
            ['cedula',Auth::user()->cedula]
        ])->get();

        return view('personal.psicologos.admin.intervencion',compact('intervenciones'));
    }


    public function create()
    {
        $periodo= Procedimientos::periodoDelAnhoActual();

        if($periodo){
            $impresiones = ImpresionDiagnostica::all();
            return view('personal.psicologos.admin.create',compact('impresiones'));
        }else{
            return back()->with('error','no se pueden crear nuevas historias clínica para la fecha actual, por favor verifique el limite del periodo actual');
        }
    }

    public function store(Request $request)
    {

        $currentIntervencion = IntervencionIndividual::where([
            ['estudiante_id',$request->get('estudiante_id')],
            ['periodo_id',Procedimientos::periodoDelAnhoActual()]
        ])->first();

        if($currentIntervencion){
            return response()->json([
                "status" => "error",
                "message" => "Historia Clinica ya Registrada"
            ]);
        }

        $time = strtotime($request->get('fecha_nacimiento'));
        $newformat = date('Y-m-d',$time);
        $intervencion = new IntervencionIndividual();
        $intervencion->fecha_nacimiento = $newformat;
        $intervencion->edad = $request->get('edad');
        $intervencion->direccion =  $request->get('direccion');
        $intervencion->estado_civil = $request->get('estado_Civil');
        $intervencion->procedencia = $request->get('procedencia');
        $intervencion->trabaja = $request->get('trabaja');
        $intervencion->procedencia_recursos =  $request->get('procedencia');
        $intervencion->tipo_familia =  $request->get('tipo_Familia');
        $intervencion->relacion_compañeros = $request->get('respuestac');
        $intervencion->relacion_docente = $request->get('respuesta');
        $intervencion->fecha_ingreso = $request->get('anio_ingreso');
        $intervencion->motivo_consulta = $request->get('motivo_Consulta');
        $personal = Personal::where('cedula', Auth::user()->cedula)->first();
        $intervencion->cedula = $personal->cedula;
        $intervencion->estudiante_id = $request->get('estudiante_id');
        $intervencion->plan_de_accion = $request->get('plan');
        $intervencion->antecedentes_personales = $request->get('antecedentesPersonales');
        $intervencion->antecedentes_familiares = $request->get('antecedentesfamiliares');
        $intervencion->periodo_id = Procedimientos::periodoDelAnhoActual();

        $intervencion->save();

        $intervencion->impresiones()->attach($request->get('impresion_Diagnostica'));

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function pdfIntervencionIndividual($id){

        $intervencion = IntervencionIndividual::find($id);

        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('personal.psicologos.admin.reportes.intervencion_individual',compact('intervencion'));

        return $pdf->stream();

    }
}
