<?php

namespace App\Http\Controllers;

use App\Grupo_Usuario;
use App\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{

    public function index()
    {
        $usuarios = User::all();
        return view('usuarios.list',compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
