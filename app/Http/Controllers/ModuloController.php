<?php

namespace App\Http\Controllers;

use App\Modulo;
use Illuminate\Http\Request;

class ModuloController extends Controller
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
        $modulos = Modulo::orderBy('id','DESC')->get();
        $location = 'usaurios';
        return view('usuarios.modulos.index',compact('modulos','location'));

    }

    public function create()
    {
        $location = 'usaurios';
        return view('usuarios.modulos.create',compact('location'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nombre' => 'required|string',
            'descripcion' =>'required|string'
        ]);

        Modulo::create($request->all());

        return redirect()->route('modulos.create')
            ->with('info','Datos Guardados Correctamente');

    }

    public function show($id)
    {
        $modulo = Modulo::find($id);
        $location = 'usaurios';
        return view('usuarios.modulos.show',compact('modulo','usuarios'));
    }

    public function edit($id)
    {
        $modulo = Modulo::find($id);
        $location = 'usaurios';
        return view('usuarios.modulos.edit',compact('modulo','usuarios'));
    }

    public function update(Request $request, $id)
    {
        $modulo = Modulo::find($id);

        $this->validate($request,[
            'nombre' => 'required|string',
            'descripcion' =>'required|string'
        ]);

        $modulo->fill($request->all())->save();

        return redirect()->route('modulos.edit',$id)
            ->with('info','Datos Guardados Correctamente');
    }


    public function destroy($id)
    {
        Modulo::find($id)->delete();
    }
}
