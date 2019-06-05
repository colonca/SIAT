<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
            return  redirect()->route('dashboard');
        }

        return back()->withErrors([$this->username() => 'Estas credenciales no coinciden con nuestros registros']);

    }

    public function username(){
          return 'cedula';
    }


}