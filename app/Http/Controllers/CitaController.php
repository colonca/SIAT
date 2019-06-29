<?php

namespace App\Http\Controllers;

use App\Estudiante;
use App\Personal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CitaController extends Controller
{

    public function __construct()
    {

    }

    public function estudiante(Request $request){

        $usuario = $request->get('usuario');
        $contraseña = $request->get('contraseña');

        $estudiante  = Estudiante::where([['cedula',$usuario],['contraseña',$contraseña]])->first();

        if($estudiante!=null){
            session()->put('estudiante',$estudiante);

            $personal = Personal::where('tipo_usuario','psicologo')->get();

            $psicologos = [];

             foreach ($personal as $persona){

              $horarios = $persona->horarios()->where('dia',1)->get();

              if($horarios != null){
                  $psicologos[] = [
                      'nombre' => $persona->primer_nombre.' '.$persona->segundo_nombre.' '.$persona->primer_apellido.' '.$persona->segundo_apellido,
                      'horarios' => $horarios,
                  ];
              }


            }

            return view('citas.estudiante.agendar',compact('psicologos'));

        }else{

            return back()->with('error' , 'usuario y/o contraseña no válido');

        }

    }

    public function cita(){

        $psicologos = DB::table('personal')
            ->join('horario_personal', 'personal.id', '=', 'horario_personal.personal_id')
            ->join('horario', 'horario_personal.horario_id', '=', 'horario.id')
            ->select('personal.primer_nombre','personal.primer_apellido','horario.dia','horario.hora')
            ->where('tipo_usuario','psicologo')
            ->get();

        dd($psicologos);

        return view('citas.estudiante.agendar');
    }

    public function editNuevaContraseña()
    {
        return view('citas.estudiante.nuevaContraseña');
    }

    public function updateContrasena(Request $request)
    {
        $this->validate($request,[
            'password1' => 'required|string',
            'password2' =>'required|string'
        ]);

        $contraseña = $request->get('password1');
        $confirmacionContraseña = $request->get('password2');

        if($contraseña == $confirmacionContraseña){

            $usuario = $request->get('cedula');
            $estudiante = Estudiante::where('cedula',$usuario)->first();
            $estudiante->contraseña = $contraseña;
            $estudiante->save();

            return back()->with('info','Contraseña Cambiada Correctamente');

        }else{
            return back()->with('error','Las Contraseñas no coinciden');
        }

    }

}
