<?php

namespace App\Http\Controllers\Auth;

use App\Grupo_Usuario;
use App\Http\Controllers\Controller;
use function foo\func;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {

    public function __construct(){
    }

    public function ShowLoginForm(){
        return view('login.login');
    }

    public function login(){

        $credentials = $this->validate(request(),[
            $this->username() => 'required|string',
            'password'  => 'required|string'
        ]);

        if(Auth::attempt($credentials)){

            $user = Auth::user();
            $grupo = Grupo_Usuario::find($user->grupo_usuario_id);

            $grupo->modulos->each(function($item){
                session()->put(strtoupper($item->nombre),strtoupper($item->nombre));
            });

            $grupo->paginas->each(function($item){
                session()->put(strtoupper($item->nombre),strtoupper($item->nombre));
            });



            if($grupo->nombre == 'admin'){
                return  redirect()->route('dashboard');
            }else if($grupo->nombre == "psicologo"){
                return  redirect()->route('dashboard_psicologo');
            }


        }

        return back()->withErrors([$this->username() => 'Estas credenciales no coinciden con nuestros registros']);

    }

    public function username(){
          return 'cedula';
    }

    public function logout(){
        Auth::logout();
        session()->flush();
        return redirect('/');
    }

}