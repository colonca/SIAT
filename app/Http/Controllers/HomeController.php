<?php

namespace App\Http\Controllers;

use App\Cita;
use App\Estudiante;
use App\IntervencionIndividual;
use App\Personal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function indexPsicologo(){

        $fechaFFase = date('Y-m-d');
        $dia = strftime('%d',strtotime($fechaFFase));
        $mes = strftime('%m',strtotime($fechaFFase));
        $personal = Personal::where('cedula',Auth::user()->cedula)->first();
        $itervencionesMes = 0;
        $citas = Cita::where('personal_id',$personal->id)->get();
        $intervenciones = IntervencionIndividual::where('cedula',$personal->cedula)->get();
        foreach ($intervenciones as $intervencion) {
            $mesCita =  $mes = strftime('%m',strtotime($intervencion->created_at));
            if($mesCita == $mes){
                $itervencionesMes++;
            }
        }
        $mesActual = 0;
        $diaActual = 0;
        $citasPerdidas = 0;
        foreach ($citas as $cita){
            $diaCita = strftime('%d',strtotime($cita->fecha));
            $mesCita =  $mes = strftime('%m',strtotime($cita->fecha));
            if($diaCita == $dia){
                $diaActual++;
            }
            if($mesCita == $mes && $cita->estado == 'PERDIDA'){
                $mesActual++;
            }
            if($cita->estado == 'PERDIDA'){
                $citasPerdidas++;
            }
        }

        return view('usuarios.rol_usuarios.psicologos.index',compact('diaActual','citasPerdidas','mesActual','itervencionesMes'));
    }


    public function index()
    {
        $estudiantes = Estudiante::orderBy('id','ASC')
        ->where('estado','LIKE','%super alto%')->count();

        $intervenciones = IntervencionIndividual::all()->count();

        return view('welcome',compact('estudiantes','intervenciones'));
    }

}
