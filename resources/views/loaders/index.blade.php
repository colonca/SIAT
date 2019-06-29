@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <!-- Row -->
        <div class="row">
            <!-- Column -->
            <div class="box-header with-border" style="background-color: rgb(23, 128, 62)">
                <ol class="breadcrumb">
                    <li><a href="{{route('loaders')}}" style="color: white;">
                            <i class="material-icons">home</i> inicio
                        </a>
                    </li>
                </ol>
            </div>
            
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Informacion del Sistema
                            <small>Menu</small>
                        </h2>
                    </div>
                    <div class="body">
                        <div class="button-demo">
                            @if(session()->has('PAG_CARGAR_ESTUDIANTE'))
                            <a href="{{route('loaderEstudiantes')}}" type="button" class="btn btn-success waves-effect">Cargar Estudiantes</a>
                            @endif
                            @if(session()->has('PAG_CARGAR_ASIGNATURA'))
                            <a href="{{route('loaderAsignaturas')}}" type="button" class="btn btn-success waves-effect">Cargar Asignaturas</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <!-- Column -->
        </div>
        <!-- Row -->
        <!-- Row -->
    </div>
@endsection
