<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Periodoacademico;
use App\Http\Requests\PeriodoacademicoRequest;
use App\TipoPeriodo;

class PeriodoacademicoController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $periodos = Periodoacademico::all();
        return view('periodos_academicos.list')
                        ->with('periodos', $periodos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('periodos_academicos.create');
    }


    public function store(Request $request) {

        $periodo = new Periodoacademico($request->all());
        foreach ($periodo->attributesToArray() as $key => $value) {
            $periodo->$key = strtoupper($value);
        }
        $result = $periodo->save();
        if ($result) {
            flash("El período fue almacenado de forma exitosa!")->success();
            return redirect()->route('periodoa.index');
        } else {
            flash("El período no pudo ser almacenado. Error: " . $result)->error();
            return redirect()->route('periodoa.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $periodo = Periodoacademico::find($id);
        return view('periodos_academicos.edit')
                        ->with('periodo', $periodo);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $periodo = Periodoacademico::find($id);
        foreach ($periodo->attributesToArray() as $key => $value) {
            if (isset($request->$key)) {
                $periodo->$key = strtoupper($request->$key);
            }
        }
        $result = $periodo->save();
        if ($result) {
            flash("El período fue modificado de forma exitosa!")->success();
            return redirect()->route('periodoa.index');
        } else {
            flash("El período no pudo ser modificado. Error: " . $result)->error();
            return redirect()->route('periodoa.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $periodo = Periodoacademico::find($id);
        $result = $periodo->delete();

    }

}
