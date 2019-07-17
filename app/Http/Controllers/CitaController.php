<?php

namespace App\Http\Controllers;

use App\Cita;
use App\Estudiante;
use App\Personal;
use App\Utiles\Festivos;
use App\Utiles\Procedimientos;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CitaController extends Controller
{

    public function __construct()
    {

    }

    public function estudiante(Request $request){

        $usuario = $request->get('usuario');
        $contraseña = $request->get('contraseña');

        $estudiante  = Estudiante::where([
            ['cedula',$usuario],
            ['contraseña',$contraseña],
            ['periodo',Procedimientos::periodoDelAnhoActual()]
        ])->first();

        if($estudiante!=null){

            session()->put('estudiante',$estudiante);

            $personal = Personal::where('tipo_usuario','psicologo')->get();

            $psicologos = [];

            foreach ($personal as $persona){

                date_default_timezone_set('America/Bogota');
                setlocale(LC_TIME,"es_CO");;
                $fechaFFase = date('Y-m-d');
                $nuevafecha = date('Y-m-d',strtotime ( '+1 day' , strtotime ($fechaFFase )));
                $dia = strftime('%u',strtotime($nuevafecha));
                $mes = strftime('%m',strtotime($nuevafecha));

                $horarios = $persona->horarios()->orderBy('hora')->where('dia',$dia)->get();

                $horarios = $horarios->filter(function ($horario) use ($persona,$nuevafecha){

                    $count = Cita::where([
                        ['personal_id',$persona->id],
                        ['fecha',strftime('%Y-%m-%d',strtotime($nuevafecha))],
                        ['hora',$horario->hora]
                    ])->count();

                    return $count < 4;

                });

                $festivo = new Festivos();
                $festivo->festivos();
                if($horarios->count() != 0 and !$festivo->esFestivo($dia ,$mes)){

                    $psicologos[] = [
                        'id' => $persona->id,
                        'nombre' => $persona->primer_nombre.' '.$persona->segundo_nombre.' '.$persona->primer_apellido.' '.$persona->segundo_apellido,
                        'horarios' =>  $horarios
                    ];
                }

            }

            return view('citas.estudiante.agendar',compact('psicologos'));

        }else{

            return back()->with('error' , 'usuario y/o contraseña no válido');

        }

    }

    public function cita(){

        $personal = Personal::where('tipo_usuario','psicologo')->get();

        $psicologos = [];

        foreach ($personal as $persona){

            date_default_timezone_set('America/Bogota');
            setlocale(LC_TIME,"es_CO");;
            $fechaFFase = date('Y-m-d');
            $nuevafecha = date('Y-m-d',strtotime ( '+1 day' , strtotime ($fechaFFase )));
            $dia = strftime('%u',strtotime($nuevafecha));
            $mes = strftime('%m',strtotime($nuevafecha));

            $horarios = $persona->horarios()->orderBy('hora')->where('dia',$dia)->get();

            $horarios = $horarios->filter(function ($horario) use ($persona,$nuevafecha){

                $count = Cita::where([
                    ['personal_id',$persona->id],
                    ['fecha',strftime('%Y-%m-%d',strtotime($nuevafecha))],
                    ['hora',$horario->hora]
                ])->count();

                return $count < 4;

            });

            $festivo = new Festivos();
            $festivo->festivos();
            if($horarios->count() != 0 and !$festivo->esFestivo($dia ,$mes)){

                $psicologos[] = [
                    'id' => $persona->id,
                    'nombre' => $persona->primer_nombre.' '.$persona->segundo_nombre.' '.$persona->primer_apellido.' '.$persona->segundo_apellido,
                    'horarios' =>  $horarios
                ];
            }

        }

        return view('citas.estudiante.agendar',compact('psicologos'));
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
            $estudiante = Estudiante::where([['cedula',$usuario],['periodo',Procedimientos::periodoDelAnhoActual()]])->first();
            $estudiante->contraseña = $contraseña;
            $estudiante->save();

            return back()->with('info','Contraseña Cambiada Correctamente');

        }else{
            return back()->with('error','Las Contraseñas no coinciden');
        }

    }

    public function agendar(Request $request){

        //validaciones

       $cita = new Cita();
       $cita->personal_id = $request->get('personal_id');
       $cita->estudiante_id = session()->get('estudiante')->id;
       $cita->fecha =  $request->get('fecha');
       $cita->hora = $request->get('hora');

       $queryCita = Cita::where([
                     ['estudiante_id',$cita->estudiante_id],
                     ['fecha',$cita->fecha],
                     ['estado','=','PENDIENTE']
                   ])->first();

       if($queryCita == null){

           $cita->save();
           return response()->json([
               'status' => 'ok'
           ]);

       }else{
           return response()->json([
               'status' => 'error',
               'message' => 'Usted ya ha Agendado una Cita Anteriormente para este dia'
           ]);
       }

    }

    public function historialCitas()
    {
        $estudiantes = Estudiante::where('cedula', session('estudiante')->cedula)->get();

        foreach ($estudiantes as $estudiante){
           $citasEstudiante[] = (Cita::where('estudiante_id',$estudiante->id)->orderBy('fecha')->get());
        }

        return view('citas.estudiante.list',compact('citasEstudiante'));
    }

    public function citasAgnedadas()
    {

       $personal =  Personal::where('cedula',Auth::user()->cedula)->first();

       $citas = Cita::where([
           ['personal_id',$personal->id],
       ])->get();

       $event = [];

       foreach ($citas as $cita){

           $color = '';

           switch ($cita->estado){
               case 'PENDIENTE':
                                   $color = '#1299DA';
                                   break;
               case 'ATENDIDO':
                                   $color = '#257e4a';
                                   break;
               case 'PERDIDA':
                                   $color = '#E91E63';
                                   break;
               case 'CANCELADA':
                                   $color = '#FF0404';
                                   break;
           }

           $fecha =  $cita->fecha.'T';
           $fecha .=strlen($cita->hora) == 2 ? $cita->hora.':00':'0'.$cita->hora.':00';
           $event[] = [
               'title'=> $cita->estudiante->nombres,
               'start' =>$fecha,
               'color' => $color
           ];
       }


       return response()->json($event);

    }

    public function cancelarCita (Request $request){
        $cita = Cita::find($request->get('id'));
        $cita->estado = 'CANCELADA';
        $cita->save();
    }

}
