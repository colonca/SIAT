<?php

namespace App\Http\Controllers;

use App\Contacto_Emergencias;
use App\Grupo_Usuario;
use App\Horario;
use App\Personal;
use App\Psicologo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PsicologoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $psicologos = Personal::where('tipo_usuario','psicologo')->get();
        return view('personal.psicologos.index',compact('psicologos'));
    }

    public function create()
    {
        return view('personal.psicologos.create');
    }


    public function store(Request $request)
    {

        $horarios = [];
        $disponibilidad = explode(',',$request->input('disponibilidad'));

        foreach ($disponibilidad as $disponible){

            if(strlen ($disponible) == 3){
                $hora = substr($disponible,0,2) + 7;
                $dia =  substr($disponible,2,3);

            }else {
                $hora = substr($disponible,0,1) + 7;
                $dia =  substr($disponible,1,2);
            }


            $id_horario = DB::table('horario')->where([
                ['dia', '=', $dia],
                ['hora', '=', $hora],
            ])->get()->pluck('id')->first();

           $horarios[] = $id_horario;

        }

        $persona = Personal::where('cedula',$request->input('cedula'));

        if($persona->count() == 0){

            $contacto = new Contacto_Emergencias();
            $contacto->nombre = $request->input('nombre');
            $contacto->parentezco = $request->input('paretezco');
            $contacto->celular =  $request->input('celular_parentezco');
            $contacto->save();

            $persona = new Personal();
            $persona->cedula = $request->input('cedula');
            $persona->primer_nombre = $request->input('primer_nombre');
            $persona->segundo_nombre = $request->input('segundo_nombre');
            $persona->primer_apellido = $request->input('primer_apellido');
            $persona->segundo_apellido = $request->input('segundo_apellido');
            $date = date_create($request->input('fecha_nacimiento'));
            $persona->fecha_nacimiento = date_format($date, 'Y-m-d H:i:s');
            $persona->direccion = $request->input('direccion');
            $persona->email = $request->input('email');
            $persona->email_institucional = $request->input('email_institucional');
            $persona->telefono = $request->input('telefono');
            $persona->celular = $request->input('celular');
            $persona->tipo_usuario = 'psicologo';
            $persona->contacto_emergencia_id = $contacto->id;
            $persona->save();

            $psicologo = new Psicologo();
            $psicologo->cedula = $persona->cedula;
            $psicologo->save();

            $persona->horarios()->attach($horarios);

            $role = Grupo_Usuario::where('nombre','psicologo')->first();

            if($role != null){

                $usuario = new User();
                $usuario->cedula = $persona->cedula;
                $usuario->email = $persona->email;
                $usuario->password = bcrypt($persona->cedula);
                $usuario->nombre =  $persona->primer_nombre . ' '.$persona->primer_apellido;
                $usuario->grupo_usuario_id = $role->id;

                $usuario->save();

            }

            return response()->json([
                'status' => 'ok'
            ]);

        }else {
            return response()->json([
                'status' => 'fail',
                'message' => 'este usuario ya se encuentra registrado en nuestra base de datos'
            ]);
        }

    }


    public function show($id)
    {
        $personal = Personal::find($id);

        return view('personal.psicologos.show',compact('personal'));
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $persona = Personal::find($id);
        $persona->horarios()->detach();
        $psicologo = Psicologo::where('cedula',$persona->cedula)->get()->first();
        $psicologo->delete();
        $usuario =  User::where('cedula',$persona->cedula)->get()->first();
        $usuario->delete();
        $persona->delete();
    }

    public function horarios($id){

        $persona =  Personal::find($id);
        $horarios = $persona->horarios;

       return json_encode($horarios);

    }
}
