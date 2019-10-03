@extends('layouts.app')

@section('content')
    <div class="box-header with-border" style="background-color: rgb(23, 128, 62)">
        <ol class="breadcrumb">
            <li>
                @if(Auth()->user()->role->nombre == 'psicologo')
                    <a href="{{route('dashboard_psicologo')}}" style="color: white;">
                        @else
                            <a href="{{route('dashboard')}}" style="color: white;">
                                @endif
                                <i class="material-icons">home</i> inicio
                    </a>
            </li>
            <li>
                <a href="{{route('estudiantes.index')}}" style="color: white;">
                    <i class="material-icons">perm_identity</i> Estudiantes
                </a>
            </li>

            <li>
                <a href="" style="color: white;">
                    <i class="material-icons">perm_identity</i> Datos del Estudiante
                </a>
            </li>
        </ol>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <div id="form1" class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Datos del Estudiante
                                <small>Información detallada del estudiante</small>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="demo-masked-input">
                                <div class="row clearfix">
                                    <form action="{{route('estudiantes_save')}}" method="post">
                                        @csrf
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <b>Numero de Identificacion</b>
                                                <div class="input-group">
                                                    <div class="form-line">
                                                        <input type="text" name="cedula" class="form-control nombre" placeholder="Ex: 9999999999" required value="{{$estudiante->cedula}}" disabled>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <b>Periodo Academico</b>
                                                <div class="input-group">
                                                    <div class="input-group">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" required value="{{$estudiante->periodo->anio.'-'.$estudiante->periodo->periodo}}" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <b>Nombres</b>
                                                <div class="input-group">
                                                    <div class="form-line">
                                                        <input type="text"  class="form-control"  required value="{{$estudiante->nombres}}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <b>Programa</b>
                                                <div class="input-group">
                                                    <div class="input-group">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" required disabled value="{{$estudiante->programa}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                                <b>Celular</b>
                                                <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">phone_iphone</i>
                                            </span>
                                                    <div class="form-line">
                                                        <input type="text" name="celular" class="form-control mobile-phone-number" placeholder="Ex: +00 (000) 000-00-00" required disabled value="{{$estudiante->celular=='NULL'? 'no registrado':$estudiante->celular}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <b>Telefono Domiciliario</b>
                                                <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">phone</i>
                                            </span>
                                                    <div class="form-line">
                                                        <input type="text" name="telefono" class="form-control mobile-phone-number" placeholder="Ex: +000 (000) 00-00" disabled value="{{$estudiante->telefono==' '? 'no registrado':$estudiante->telefono}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <b>Dirección</b>
                                                <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">place</i>
                                            </span>
                                                    <div class="form-line">
                                                        <input type="text" name="direccion" class="form-control money-dollar" placeholder="Ex: callexxD#xx-xxx" required disabled value="{{$estudiante->direccion}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <b>Correo Electronico</b>
                                                <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">email</i>
                                            </span>
                                                    <div class="form-line">
                                                        <input type="email" name="email" class="form-control email" disabled value="{{$estudiante->email==' '?'no registrado':$estudiante->email}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-3">
                                                <b>Periodo Academico</b>
                                                <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">
                                                   timeline
                                                </i>
                                            </span>
                                                    <div class="form-line">
                                                        <input type="number" name="periodo_academico" min="0" class="form-control email" placeholder="" required value="{{$estudiante->periodo_academico}}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <b>Periodo Cronologico</b>
                                                <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">
                                                    timeline
                                                </i>
                                            </span>
                                                    <div class="form-line">
                                                        <input type="number" min="0" name="periodo_cronologico" class="form-control email" placeholder="" required disabled value="{{$estudiante->periodo_cronologico}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <b>Promedio General</b>
                                                <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">
                                                  local_library
                                                </i>
                                            </span>
                                                    <div class="form-line">
                                                        <input type="number" min="0" max="5" step="0.1" name="promedio_general" class="form-control email" placeholder="" required disabled value="{{$estudiante->promedio_general}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <b>Promedio Semestral</b>
                                                <div class="input-group">
                                            <span class="input-group-addon">
                                               <i class="material-icons">
                                                 local_library
                                                </i>
                                            </span>
                                                    <div class="form-line">
                                                        <input type="number" name="promedio_semestral" min="0" max="5"  step="0.1" class="form-control email" placeholder="" required value="{{$estudiante->promedio_semestral}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                    <div class="form-group">
                                                        <b>Riesgo</b>
                                                        <div class="input-group">
                                                            <div class="form-line">
                                                                <input type="text" class="form-control"  disabled value="{{$estudiante->estado}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <button class="btn btn-lg btn-success pull-right" type="submit">Guardar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
