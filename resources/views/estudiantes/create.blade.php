@extends('layouts.app')

@section('content')

    <!--menu de navegacion de la pagina-->
    <div class="box-header with-border" style="background-color: rgb(23, 128, 62)">
        <ol class="breadcrumb">
            <li><a href="{{route('users')}}" style="color: white;">
                    <i class="material-icons">home</i> inicio
                </a>
            </li>
            <li><a href="{{route('estudiantes.index')}}" style="color: white;">
                    <i class="material-icons">perm_identity</i> Gestion de Estudiantes
                </a>
            </li>
            <li>
                <a href="" style="color: white;">
                    <i class="material-icons">perm_identity</i>Nuevo Estudiante
                </a>
            </li>
        </ol>
    </div>

    @if(session()->has('info'))
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="body">
                    <div class="alert alert-success">
                        <strong>Bien Hecho!</strong> {{session('info')}}
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if(session()->has('error'))
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="body">
                    <div class="alert alert-danger">
                        <strong>Error!</strong> {{session('error')}}
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <div id="form1" class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Nuevo Estudiante
                            <small>Complete con precision la siguiente información para asegurarnos de mantener un registro actualizado del estudiante</small>
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
                                                    <input type="text" name="cedula" class="form-control nombre" placeholder="Ex: 9999999999" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <b>Periodo Academico</b>
                                            <div class="input-group">
                                                    <select name="periodo" id="periodo" required>
                                                        <option value="">Por favor, elija una opcion</option>
                                                        @foreach($periodos as $periodo)
                                                            <option value="{{$periodo->id}}">{{$periodo->anio}}==>{{$periodo->periodo}}</option>
                                                        @endforeach
                                                    </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <b>Nombres</b>
                                            <div class="input-group">
                                                <div class="form-line">
                                                    <input type="text" name="nombres" class="form-control nombre" placeholder="Ex: CAÑIZARES ALVERNIA JUAN CAMILO" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <b>Programa</b>
                                            <div class="input-group">
                                                <div class="form-line">
                                                    <input type="text" name="programa" class="form-control nombre" placeholder="Ex: Sociologia" required>
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
                                                    <input type="text" name="celular" class="form-control mobile-phone-number" placeholder="Ex: +00 (000) 000-00-00" required>
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
                                                    <input type="text" name="telefono" class="form-control mobile-phone-number" placeholder="Ex: +000 (000) 00-00">
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
                                                    <input type="text" name="direccion" class="form-control money-dollar" placeholder="Ex: callexxD#xx-xxx" required>
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
                                                    <input type="email" name="email" class="form-control email" placeholder="Ex: example@example.com" required>
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
                                                    <input type="number" name="periodo_academico" class="form-control email" placeholder="" required>
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
                                                    <input type="number" name="periodo_cronologico" class="form-control email" placeholder="" required>
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
                                                    <input type="number" min="0" max="5" name="promedio_general" class="form-control email" placeholder="" required>
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
                                                    <input type="number" name="promedio_semestral" min="0" max="5" class="form-control email" placeholder="" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                          <div class="col-md-3">
                                                <div class="form-group">
                                                    <b>Riesgo</b>
                                                    <select name="riesgo" id="" class="form-group">
                                                        <option value="">Selecione...</option>
                                                        <option value="Riesgo Bajo">Riesgo Bajo</option>
                                                        <option value="super Bajo">Riesgo super Bajo</option>
                                                        <option value="Riesgo Medio">Riesgo Medio</option>
                                                        <option value="Alto">Riesgo Alto</option>
                                                        <option value="super Alto">Riesgo Super Alto</option>
                                                    </select>
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

@endsection


