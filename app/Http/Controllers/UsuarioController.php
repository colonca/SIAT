<?php

namespace App\Http\Controllers;

use App\Grupo_Usuario;
use App\Personal;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $usuarios = User::all();
        return view('usuarios.list',compact('usuarios'));
    }

    public function create()
    {
        $roles= Grupo_Usuario::all();
        return view('usuarios.create',compact('roles'));
    }


    public function store(Request $request)
    {

        $usuarioQuery = User::where([
            ['cedula', $request->get('cedula')]
        ])->orWhere('email',$request->get('email'))->first();

        if($usuarioQuery){
            return redirect()->route('usuarios.create')
                ->with('error','Ya se encuentran registros con estos Datos');
        }

        $user = new User();
        $user->cedula = $request->get('cedula');
        $user->nombre = $request->get('nombres');
        $user->email = $request->get('email');
        $user->grupo_usuario_id = $request->get('role');
        $user->password = bcrypt($request->get('cedula'));

        $user->save();

        return redirect()->route('usuarios.create')
            ->with('info','Datos Guardados Correctamente');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $usuario =  User::find($id);
        $roles= Grupo_Usuario::all();
        return view('usuarios.edit',compact('roles','usuario'));
    }


    public function update(Request $request, $id)
    {
        $usuario =  User::find($id);

        $usuario->fill($request->all());

        $usuario->save();

        return redirect()->route('usuarios.edit',$usuario->cedula)
            ->with('info','Datos Guardados Correctamente');
    }

    public function destroy($id)
    {
        $usuario =  User::find($id);
        $usuario->delete();
    }

    public function profile()
    {
        $personal = Personal::where('cedula',Auth::user()->cedula)->first();

        return view('usuarios.perfil.perfil',compact('personal'));
    }

}
