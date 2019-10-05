<?php

namespace App\Http\Controllers;

use App\Estudiante;
use App\Exceptions\LoaderException;
use App\Imports\StudentImport;
use App\Periodoacademico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use mysql_xdevapi\Exception;

class LoaderExcelController extends Controller
{

    public function index(){

        $location = 'loader';
        return view('loaders.index',compact('location'));
    }

    public function viewEstudiantes(){
        $periodos = Periodoacademico::all();
        $location = 'loader';
       return view('loaders.estudiante',compact('periodos','location'));
    }

    public function loadEstudiantes(Request $request){

        $this->validate($request, [
            'file' => 'required'
        ]);

        if($request->file('file')){

               $path  = Storage::disk('public') ->put('fileLoaders',$request->file('file'));
               $name = $request->file('file')->getClientOriginalName();

               $ruta = $request->file('file')->getRealPath();

               Excel::import(new StudentImport($request->get('periodo')), $request->file('file'));

               return response([
                    'success' => true
               ]);
        }

    }


}
