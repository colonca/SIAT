<?php

namespace App\Http\Controllers;

use App\Pagina;
use Illuminate\Http\Request;

class PaginaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $paginas  = Pagina::orderBy('id','DESC')->get();
        $location = 'usaurios';
        return view('usuarios.paginas.index',compact('paginas','location'));
    }

    public function create()
    {
        $location = 'usaurios';
        return view('usuarios.paginas.create',compact('location'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nombre' => 'required|string',
            'descripcion' =>'required|string'
        ]);

        Pagina::create($request->all());

        return redirect()->route('paginas.create')
            ->with('info','Datos Guardados Correctamente');

    }

    public function show($id)
    {
        $pagina = Pagina::find($id);
        $location = 'usaurios';
        return view('usuarios.paginas.show',compact('pagina','location'));
    }

    public function edit($id)
    {
        $pagina = Pagina::find($id);
        $location = 'usaurios';
        return view('usuarios.paginas.edit',compact('pagina','location'));
    }

    public function update(Request $request, $id)
    {
        $pagina = Pagina::find($id);

        $this->validate($request,[
            'nombre' => 'required|string',
            'descripcion' =>'required|string'
        ]);

        $pagina->fill($request->all())->save();

        return redirect()->route('paginas.edit',$id)
            ->with('info','Datos Guardados Correctamente');
    }


    public function destroy($id)
    {
        Pagina::find($id)->delete();
    }
}
