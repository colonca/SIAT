<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GruposUsuariosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $location = 'usuarios';
         return view('usuarios.index',compact('location'));
    }
}
