<?php

namespace App\Http\Controllers;

use App\Grupo_Usuario;
use App\Modulo;
use App\Pagina;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\Mod;

class Grupo_UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $grupos = Grupo_Usuario::orderBy('id','DESC')->get();
        $location = 'usuarios';
        return view('usuarios.grupos.index',compact('grupos','location'));
    }

    public function create()
    {
        $modulos = Modulo::orderBy('id','DESC')->get();
        $location = 'usuarios';
        return view('usuarios.grupos.create',compact('modulos','location'));
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'nombre' => 'required|string',
        ]);

        $grupo = Grupo_Usuario::create($request->all());
        $grupo->modulos()->attach($request->input('modulos'));

        return redirect()->route('grupos.edit',$grupo->id)
            ->with('info','Datos Guardados Correctamente');
    }


    public function show($id)
    {
        $grupo = Grupo_Usuario::find($id);
        $location = 'usuarios';
        return view('usuarios.grupos.show',compact('grupo','location'));
    }


    public function edit($id)
    {
        $grupo = Grupo_Usuario::find($id);
        $modulosSelecionados = $grupo->modulos()->get();
        $modulos = Modulo::all();
        $location = 'usuarios';
        return view('usuarios.grupos.edit',compact('grupo','modulos','modulosSelecionados','location'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nombre' => 'required|string',
        ]);

        $grupo = Grupo_Usuario::find($id);
        $grupo->fill($request->all());
        $grupo->modulos()->detach();
        $grupo->modulos()->sync($request->input('modulos'));

        return redirect()->route('grupos.edit',$grupo->id)
            ->with('info','Datos Guardados Correctamente');
    }


    public function destroy($id)
    {
        //
    }

    public function showPrivilegios(){
        $grupos = Grupo_Usuario::all();
        $paginas = Pagina::all();
        $location = 'usuarios';
        return view('usuarios.grupos.privilegios',compact('grupos','paginas','location'));
    }

    public function searhPaginas($id) {

        $grupo = Grupo_Usuario::find($id);
        $paginas = $grupo->paginas;

        return $paginas;

    }

    public function guardarPaginas(Request $request){

        $grupo = Grupo_Usuario::find($request->input('id'));
        $grupo->paginas()->detach();
        $grupo->paginas()->attach($request->input('paginas'));

        return response()->json([
            'paginas' => $grupo->paginas(),
            'status' => 'ok'
        ]);

    }

}
