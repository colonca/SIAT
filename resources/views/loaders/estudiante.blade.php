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
        <div class="box-header with-border bg-teal">
            <ol class="breadcrumb">
                <li><a href="{{route('loaders')}}" style="color: white;">inicio</a></li>
                <li><a href="" style="color: white;">Carga de Estudiantes</a></li>
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
                    <div class="row clearfix">
                        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                            {!! Form::open(['route'=>'loaderestudiante', 'method'=>'POST', 'files' => true, 'role' => 'form','id' => 'form']) !!}
                            <div class="form-group">
                                {!! Form::label('file', 'Agregar Archivo de Excel') !!}
                                {!! Form::file('file',null, ['required' => 'true','class' => 'form-control','id' => 'file']) !!}
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
                </div>
            </div>
        </div>
        <!-- Row -->
@endsection

@section('scripts')
    <script>
           $('document').ready(function () {

           });

           function cargarEstudiantes(event){
               event.preventDefault();
               let btn = document.getElementById('btnCargarEstudiante');
               btn.disabled = true;
               let spinner = document.getElementById('spinner');
               let check = document.getElementById('check');
               spinner.style.display = 'block';
               let form  = document.getElementById('form');
               let datos = new FormData(form);
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
    </script>
@endsection