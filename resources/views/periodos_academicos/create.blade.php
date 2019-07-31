@extends('layouts.app')
@section('content')

<div class="box-header with-border" style="background-color: rgb(23, 128, 62)">
        <ol class="breadcrumb">
            <li>
                <a href="{{route('dashboard')}}" style="color: white;">
                    <i class="material-icons">home</i> Inicio
                </a>
            </li>
            <li>
                <a href="{{route('periodoa.index')}}" style="color: white;">
                    <i class="material-icons">perm_identity</i>Periodos Academicos
                </a>
            </li>
            <li>
                <a href="" style="color: white;">
                    <i class="material-icons">perm_identity</i>Nuevo Periodo Academico
                </a>
            </li>
        </ol>
    </div>
<div class="col-md-12">
    <div class="alert alert-success alert-border alert-dismissible fade in" role="alert">
        <h3>Detalles
            <button type="button" class="close pull-right" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        </h3>
        <p>Agregue nuevos períodos. Contiene la información de los períodos académicos de la institución.</p>
    </div>
    @include('flash::message')
</div>
<div class="col-md-12">
    @if(session()->has('error'))
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="alert alert-success">
                <strong>Error!</strong> {{session('error')}}
            </div>
        </div>
    @endif
</div>
<div class="col-md-12 top-20 padding-0">
    <div class="col-md-12">
        <div class="panel form-element-padding">
            <div class="panel-heading">
                <h4>Datos del Período</h4>
            </div>
            <div class="panel-body" style="padding-bottom:30px;">
                <div class="col-md-12">
                    <form action="{{route('periodoa.store')}}" method="POST" class="form-horizontal form-label-left">
                        @csrf
                        <div class="form-group">
                            <div class="col-md-4">
                                <label class="control-label">Fecha Inicio</label>
                                <input type="date" name="fechainicio" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label">Fecha Fin</label>
                                <input type="date" name="fechafin" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-3">
                                <label class="control-label">Año</label>
                                <input type="text" class="form-control" name="anio" placeholder="Año para el período" required>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label">Período</label>
                                <input type="text" name="periodo" class="form-control" placeholder="Período del año" required>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label">Fecha Inicio Clases</label>
                                <input type="date" name="fechainicioclases" class="form-control" required>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label">Fecha Fin Clases</label>
                                <input type="date" name="fechafinclases" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                <a href="{{route('periodoa.index')}}" class="btn btn-3d btn-danger">Cancelar</a>
                                <button class="btn btn-3d btn-primary" type="reset">Limpiar Formulario</button>
                                <button class="btn btn-3d btn-success" type="submit">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(".chosen-select").chosen({});
</script>
@endsection