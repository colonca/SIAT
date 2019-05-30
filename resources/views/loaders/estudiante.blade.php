@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Loaders</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{route('loaders')}}" style="margin-right: 10px">Inicio </a>
                        <i class="fas fa-angle-right"></i>
                    </li>
                    <li class="breadcrumb-item">
                        Estudiante
                    </li>
                </ol>
            </div>
        </div>
        <!-- Row -->
        <div class="row">
            <!-- Column -->
            <div class="col">
                <div class="card">
                    <div class="card-block">
                        <a  href="{{route('loaderEstudiantes')}}" class="btn btn-success btn-md margin">Cargar Estudiantes</a>
                        <a  href="{{route('loaderEstudiantes')}}"  class="btn btn-success btn-md margin">Cargar Asignaturas</a>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <!-- Column -->
        </div>
        <!-- Row -->
        @if(session()->has('info'))
            <div class="row">
                <div class="col">
                    <div class="alert alert-primary" role="alert">
                        {{session('info')}}
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col">
                {!! Form::open(['route'=>'loaderestudiante', 'method'=>'POST', 'files' => true, 'role' => 'form']) !!}
                <div class="form-group">
                    {!! Form::label('file', 'Agregar Archivo de Excel') !!}
                    {!! Form::file('file',null, ['required' => 'true','class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {{ Form::submit('Cargar Datos',['class' => 'btn btn-sm btn-success']) }}
                </div>

                {!! Form::close() !!}
            </div>

        </div>
        <!-- Row -->
    </div>
@endsection
