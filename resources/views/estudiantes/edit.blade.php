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
                    <i class="material-icons">perm_identity</i>Estudiantes
                </a>
            </li>
            <li>
                <a href="" style="color: white;">
                    <i class="material-icons">perm_identity</i>Editar Estudiante
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
                            Actualizar Estudiante
                            <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, quod.</small>
                        </h2>
                    </div>
                    <div class="body">
                        <div class="demo-masked-input">
                            <div class="row clearfix">
                                <form action="{{route('estudiantes.update',$estudiante->id)}}" method="POST">
                                    @csrf
                                    {{method_field('PUT')}}
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <b>Numero de Identificacion</b>
                                            <div class="input-group">
                                                <div class="form-line">
                                                    <input type="text" name="cedula" class="form-control nombre" placeholder="Ex: 9999999999" required value="{{$estudiante->cedula}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <b>Periodo Academico</b>
                                            <div class="input-group">
                                                    <select name="periodo" id="periodo_id" required>
                                                        <option value="">Por favor, elija una opcion</option>
                                                        @foreach($periodos as $periodo)
                                                            @if($periodo==$estudiante->periodo)
                                                                <option value="{{$periodo->id}}" selected>{{$periodo->anio}}-{{$periodo->periodo}}</option>
                                                            @else
                                                                <option value="{{$periodo->id}}" >{{$periodo->anio}}-{{$periodo->periodo}}</option>
                                                            @endif
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
                                                    <input type="text" name="nombres" class="form-control nombre" placeholder="Ex: CAÑIZARES ALVERNIA JUAN CAMILO" required value="{{$estudiante->nombres}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <b>Programa</b>
                                            <div class="input-group">
                                                <select name="programa" class="form-control selectpicker show-tick"  data-actions-box="true" data-live-search="true">
                                                    <option value="">Seleccione</option>
                                                    @foreach($programas as $programa)
                                                        @if($estudiante->programa == $programa->programa)
                                                          <option value="{{$programa->programa}}" selected>{{$programa->programa}}</option>
                                                        @else
                                                            <option value="{{$programa->programa}}" selected>{{$programa->programa}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
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
                                                    <input type="text" name="celular" class="form-control mobile-phone-number" placeholder="{{$estudiante->celular=='NULL'? 'no registrado':$estudiante->celular}}"  value="{{$estudiante->celular=='NULL'? '':$estudiante->celular}}">
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
                                                    <input type="text" name="telefono" class="form-control mobile-phone-number" placeholder="{{$estudiante->telefono==' '? 'no registrado':$estudiante->telefono}}" value="{{$estudiante->telefono==' '? '':$estudiante->telefono}}">
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
                                                    <input type="text" name="direccion" class="form-control money-dollar" placeholder="Ex: callexxD#xx-xxx" value="{{$estudiante->direccion}}" >
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
                                                    <input type="email" name="email" class="form-control email" placeholder="{{$estudiante->email==' '?'no registrado':$estudiante->email}}" value="{{$estudiante->email==' '? '':$estudiante->email}}">
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


