@extends('layouts.app')



@section('content')

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="header align-center m-t-15 font-bold">
            <h2>REPORTES INTERVENCIÓN INDIVIDUAL</h2>            
        </div>
        <div class="body">
            <div class="alert bg-green">
                <strong>Nota: </strong>  Escoja una de las dos opciones para crear sus reportes.</a>
            </div>
            <a href="{{route('reportes_Generales')}}" class="btn bg-red btn-lg waves-effect">
                <span>Reportes Generales</span><i class="material-icons">poll</i>
            </a>
            <a href="{{route('reporte_Diagnostico')}}" class="btn bg-blue btn-lg waves-effect">
                <span>Reportes por Impresión Diagnostica</span><i class="material-icons">poll</i>
           </a>
        </div>
    </div>
</div>
    

@endsection


