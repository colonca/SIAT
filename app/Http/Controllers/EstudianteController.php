<?php

namespace App\Http\Controllers;

use App\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
    {
        $riesgo = $request->get('riesgo');
        $programa = $request->get('programa');
        $cedula = $request->get('cedula');
        $promedio = $request->get('promedio');
        $nombre = $request->get('nombre');

        $estudiantes = Estudiante::orderBy('programa', 'ASC')
            ->cedula($cedula)
            ->riesgo($riesgo)
            ->programa($programa)
            ->promedio($promedio)
            ->nombre($nombre)
            ->paginate(8);

        $estudiantes->withPath("estudiantes?riesgo=$riesgo&programa=$programa&cedula=$cedula");

        return view('estudiantes.index', compact('estudiantes'));

    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
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
