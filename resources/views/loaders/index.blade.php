@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Loaders</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="javascript:void(0)" style="margin-right: 10px">Inicio </a>
                        <i class="fas fa-angle-right"></i>
                    </li>
                    <li class="breadcrumb-item">Dashboard</li>
                </ol>
            </div>
        </div>
        <!-- Row -->
        <div class="row">
            <!-- Column -->
            <div class="col">
                <div class="card">
                    <div class="card-block">
                        <a  href="{{route('loaderEstudiantes')}}" onclick="" class="btn btn-success btn-md margin">Cargar Estudiantes</a>
                        <a  href="{{route('loaderAsignaturas')}}" href="" class="btn btn-success btn-md margin">Cargar Asignaturas</a>
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
