@extends('layouts.app')

@section('content')

        @if(session()->has('info'))
            <div class="row">
                <div class="col">
                    <div class="alert alert-primary" role="alert">
                        {{session('info')}}
                    </div>
                </div>
            </div>
        @endif
        <div class="box-header with-border" style="background-color: rgb(23, 128, 62)">
            <ol class="breadcrumb">
                <li><a href="{{route('loaders')}}" style="color: white;">
                        <i class="material-icons">home</i> inicio
                    </a>
                </li>
                <li><a href="" style="color: white;">
                        <i class="material-icons">archive</i> Carga de Estudiantes
                    </a>
                </li>
            </ol>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <div class="card">
                <div class="header">
                    <h2>
                       Informacion de Estudiantes
                    </h2>
                </div>
                <div class="body">
                    <div class="alert alert-success">
                        <strong>Detalles: </strong>  Recuerde Que el archivo debe estar en el formato correcto para que se puede realizar el cargue correctamente en la base de datos.
                        <a onclick="showEjemplo(event)" href="javascript:void(0);" class="alert-link">Ver Ejemplo</a></a>.
                    </div>
                    <div class="row clearfix">
                        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                            {!! Form::open(['route'=>'loaderestudiante', 'method'=>'POST', 'files' => true, 'role' => 'form','id' => 'form']) !!}
                            <div class="form-group">
                                {!! Form::label('file', 'Agregar Archivo de Excel') !!}
                                {!! Form::file('file',null, ['required' => 'true','class' => 'form-control','id' => 'file']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('periodo', 'Periodo Academico') !!}
                                <select name="periodo" id="periodo" required>
                                    <option value="" >por favor, elije una opcion</option>
                                    @foreach($periodos as $periodo)
                                        <option value="{{$periodo->id}}">{{$periodo->anio}}==>{{$periodo->periodo}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group" id="check" style="display: none">
                                <img src="{{asset('images/checkedvalid.gif')}}" alt="" width="80px" height="80px">
                            </div>

                            <div class="form-group" id="spinner" style="display: none">
                                <img src="{{asset('images/spinner.gif')}}" alt="" width="80px" height="80px">
                            </div>

                            <div class="form-group">
                                <input id="btnCargarEstudiante"  onclick="cargarEstudiantes(event)" type="submit" value="Cargar Datos" class="btn btn-sm btn-success">
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <div class="row clearfix" id="ejemplos" style="display: none;">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="header">
                                    <h2>
                                        Ejemplos del Archivo
                                    </h2>
                                </div>
                                <div class="body">
                                    <img src="{{asset('images/Loaders/ejemplos/estudiantes.png')}}" class="js-animating-object img-responsive">
                                    <hr>
                                    <img src="{{asset('images/Loaders/ejemplos/estudiantes2.png')}}" class="js-animating-object img-responsive">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row -->
@endsection

@section('scripts')
    <script>
           $('document').ready(function () {

           });

           function showEjemplo(event){
               event.preventDefault();
               let ejemplo = document.getElementById('ejemplos');
               ejemplo.style.display = 'block';
           }

           function cargarEstudiantes(event){
               event.preventDefault();
               let btn = document.getElementById('btnCargarEstudiante');
               btn.disabled = true;
               let spinner = document.getElementById('spinner');
               let check = document.getElementById('check');
               let form  = document.getElementById('form');
               let datos = new FormData(form);
               if($('#periodo').val()==''){
                 $.notify('por favor selecione el periodo');
               }else{
                   spinner.style.display = 'block';
                   axios.post('{{route('loaderestudiante')}}',datos).then(response => {
                       spinner.style.display = 'none';
                       check.style.display = 'block';
                       setTimeout(function () {
                           check.style.display = 'none';
                           btn.disabled = false;
                       },3000);

                       location.href = "{{route('loaders')}}";
                   });
               }

           }
    </script>
@endsection