<?php

namespace App\Http\Controllers;

use App\Estudiante;
use App\Periodoacademico;
use App\Utiles\Procedimientos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstudianteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
    {
        $riesgo = $request->get('riesgo');
        $programa = $request->get('programa');
        $cedula = $request->get('cedula');
        $promedio = $request->get('promedio');
        $nombre = $request->get('nombre');
        $periodo = $request->get('periodo');

        $estudiantes = Estudiante::orderBy('programa', 'ASC')
            ->cedula($cedula)
            ->riesgo($riesgo)
            ->programa($programa)
            ->promedio($promedio)
            ->periodo($periodo)
            ->nombre($nombre)
            ->paginate(4);

        $programas= DB::table('estudiantes')
            ->select('programa')
            ->distinct()->get();

        $periodos = Periodoacademico::all();

        $estudiantes->withPath("estudiantes?riesgo=$riesgo&programa=$programa&cedula=$cedula&periodo=$periodo&nombre=$nombre");

        $location = 'estudiante';

        return view('estudiantes.index', compact('estudiantes','periodos','programas','location'));

    }

    public function consultarEstudiante($id){

        $periodo = Procedimientos::periodoDelAnhoActual();

        if($periodo==null){
            return response()->json([
                'status' => 'error',
                'message' => 'inscripción fuera de fecha'
            ]);
        }

        $fechaFFase = date('Y-m-d');

        $estudiante  =  Estudiante::where([
            ['cedula',$id],
            ['periodo_id',$periodo]
        ])->first();

        if($estudiante==null){
            return response()->json([
                'status' => 'error',
                'message' => 'el estudiante no se encuentra registrado en el periodo actual, verifique que se hayan cargado los datos del estudiante'
            ]);
        }

        return json_encode($estudiante);
    }


    public function create()
    {
       $periodos = Periodoacademico::all();

        $programas= DB::table('estudiantes')
            ->select('programa')
            ->distinct()->get();

        $location = 'estudiante';

        return view('estudiantes.create',compact('periodos','programas','location'));
    }

    public function save(Request $request)
    {

        $queryEstudiante = Estudiante::where([
            ['cedula',$request->get('cedula')],
            ['periodo_id',$request->get('periodo')]
        ])->first();

        if($queryEstudiante){
            return redirect()->route('estudiantes.create')
                ->with('error','El estudiante ya se encuentra registrado para el periodo actual');
        }

        $estudiante =  new Estudiante();
        $estudiante->cedula = $request->get('cedula');
        $estudiante->nombres = $request->get('nombres');
        $estudiante->programa = $request->get('programa');
        $estudiante->direccion = $request->get('direccion');
        $estudiante->telefono = $request->get('telefono');
        $estudiante->celular = $request->get('celular');
        $estudiante->email =  $request->get('email');
        $estudiante->periodo_academico = $request->get('periodo_academico');
        $estudiante->periodo_cronologico = $request->get('periodo_cronologico');
        $estudiante->promedio_general = $request->get('promedio_general');
        $estudiante->promedio_semestral = $request->get('promedio_semestral');
        $estudiante->contraseña = bcrypt($request->get('cedula'));
        $estudiante->periodo_id = $request->get('periodo');
        $estudiante->estado=$request->get('riesgo');
        $estudiante->save();

        return redirect()->route('estudiantes.create')
        ->with('info','Datos Guardados Correctamente');

    }

    public function show($id)
    {
        $estudiante = Estudiante::find($id);
        $location = 'estudiante';
        return view('estudiantes.show',compact('estudiante','location'));
    }

    public function edit($id)
    {
        $estudiante = Estudiante::find($id);

        $periodos =Periodoacademico::all();

        $programas= DB::table('estudiantes')
            ->select('programa')
            ->distinct()->get();
        $location = 'estudiante';
        return view('estudiantes.edit',compact('estudiante','periodos','programas','location'));
    }

    public function update(Request $request, $id)
    {
        $estudiante = Estudiante::find($id);
        $estudiante->fill($request->all());
        $estudiante->save();

        return back()->withInput()->with('info','estudiante actualizado correctamente');
    }

    public function destroy($id)
    {
        //
    }

}
