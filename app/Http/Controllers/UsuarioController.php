<?php

namespace App\Http\Controllers;

use App\Grupo_Usuario;
use App\Personal;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $usuarios = User::all();
        $location = 'usuarios';
        return view('usuarios.list',compact('usuarios','location'));
    }

    public function create()
    {
        $roles= Grupo_Usuario::all();
        $location = 'usuarios';
        return view('usuarios.create',compact('roles','location'));
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

    public function cambiarPasswordShow()
    {
        $location = 'contrasenia';
       return view('usuarios.perfil.cambiarPassword',compact('location'));
    }

    //actualiza la contraseña pidiendo la actual
    public function updatePassword(Request $request){

    if (Hash::check($request->get('pass0'), Auth::user()->getAuthPassword())){

         if($request->get('pass2')==$request->get('pass1')){

          $usuario = User::find(Auth::user()->cedula);
          $usuario->password = Hash::make($request->get('pass2'));
          $usuario->save();

          return back()->with('info','Exito, contraseña cambiada correctamente');

         }else{
             return back()->with('error','Las contraseñas ingresada no coinciden.');
         }

     }else{
        return back()->with('error','La contraseña actual ingresada no es correcta.');
     }

    }

    //actualiza la contraseña sin pedir la contraseña actual
    public function updatePassword2(Request $request){

       if($request->get('pass1')==$request->get('pass2')){
           $usuario = User::find($request->get('identificacion2'));
           $usuario->password = Hash::make($request->get('pass2'));
           $usuario->save();

           return response()->json([
               'status' => 'ok',
               'info'=>'contraseña cambiada correctamente'
           ]);


       }else{
           return response()->json([
               'status' => 'error',
               'info'=>'las contraseñas ingresadas no coinciden'
           ]);
       }
    }

    public function edit($id)
    {
        $usuario =  User::find($id);
        $roles= Grupo_Usuario::all();
        $location = 'usuarios';
        return view('usuarios.edit',compact('roles','usuario','location'));
    }

    public function updateUser(Request $request, $id)
    {
        $user =  User::find($id);

        $user->fill($request->all());

        $user->save();

        $roles = Grupo_Usuario::all();

        return redirect()->route('users')
               ->with('info','Usuario Actualizado Correctamente');

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
        $location = 'usuarios';
        return view('usuarios.perfil.perfil',compact('personal','location'));
    }

    public function operaciones(Request $request){

        $user =  User::find($request->get('id'));

        if($user){
            $roles = Grupo_Usuario::all();
            $location = 'usuarios';
            return view('usuarios.operaciones',compact('user','roles','location'));
        }else{
          return back()->with('error','El usuario consultado no se encuentra registrado!');
        }

    }

}
