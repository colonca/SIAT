<?php

namespace App\Http\Controllers;

use App\IntervencionIndividual;
use App\Seguimineto;
use Illuminate\Http\Request;

class SeguimientoController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        $this->validate($request,[
           'fecha' => 'required',
            'descripcion'=>'required'
        ]);

        $intervencion = IntervencionIndividual::find($request->get('intervencion_id'));

        if($intervencion->seguimientos->count() < 4){
            $seguimiento = new Seguimineto();
            $seguimiento->descripcion = $request->get('descripcion');
            $seguimiento->fecha =  $request->get('fecha');
            $seguimiento->intervencion_individual_id = $request->get('intervencion_id');

            $seguimiento->save();

            return response()->json([
                 'status' => 'ok'
            ]);
        }else{

            return response()->json([
                'status' => 'error',
                'message'=> 'Seguimientos concluidos para el periodo actual'
            ]);

        }



    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
