@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <!-- Row -->
        <div class="row">
            <!-- Column -->
            <div class="box-header with-border bg-teal">
                <ol class="breadcrumb">
                    <li><a href="{{route('loaders')}}" style="color: white;"> inicio</a></li>
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
                            <a href="{{route('loaderEstudiantes')}}" type="button" class="btn btn-success waves-effect">Cargar Estudiantes</a>
                            <a href="{{route('loaderAsignaturas')}}" type="button" class="btn btn-success waves-effect">Cargar Asignaturas</a>
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
