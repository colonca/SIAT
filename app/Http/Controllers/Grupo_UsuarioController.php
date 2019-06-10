<?php

namespace App\Http\Controllers;

use App\Grupo_Usuario;
use App\Modulo;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\Mod;

class Grupo_UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grupos = Grupo_Usuario::orderBy('id','DESC')->get();
        return view('usuarios.grupos.index',compact('grupos'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modulos = Modulo::orderBy('id','DESC')->get();

        return view('usuarios.grupos.create',compact('modulos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nombre' => 'required|string',
        ]);

        $grupo = Grupo_Usuario::create($request->all());
        $grupo->modulos()->attach($request->input('modulos'));

        return redirect()->route('grupos.create')
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
        $grupo = Grupo_Usuario::find($id);
        return view('usuarios.grupos.show',compact('grupo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grupo = Grupo_Usuario::find($id);
        $modulosSelecionados = $grupo->modulos()->get();
        $modulos = Grupo_Usuario::all();

        return view('usuarios.grupos.edit',compact('grupo','modulos','modulosSelecionados'));
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
