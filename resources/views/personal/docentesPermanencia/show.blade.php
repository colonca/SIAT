@extends('layouts.app')
@section('content')

    <!--menu de navegacion de la modulo-->
    <div class="box-header with-border" style="background-color: rgb(23, 128, 62)">
        <ol class="breadcrumb">
            <li><a href="{{route('users')}}" style="color: white;">
                    <i class="material-icons">home</i> inicio
                </a>
            </li>
            <li>
                <a href="{{route('docentes_permanencia.index')}}" style="color: white;">
                    <i class="material-icons">perm_identity</i> Docentes de Permanencia
                </a>
            </li>
            <li>
                <a href="" style="color: white;">
                    <i class="material-icons">perm_identity</i>Datos del Docente
                </a>
            </li>
        </ol>
    </div>

    @if(session()->has('info'))
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="alert alert-success">
                <strong>Bien Hecho!</strong> {{session('info')}}
            </div>
        </div>
    @endif

    <!--menu de opciones-->
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body">
                <div class="row clearfix">
                    <div class="col-md-12 col-lg-12" style="margin: 2px 0">
                        <h4>Datos del Psicologo Selecionada</h4>
                        <hr>
                    </div>

                    <div class="col-md-12">
                        <div class="box-header with-border" style="background-color: rgb(23, 128, 62)">
                          <h3 style="color: white;" class="text-center">Información Personal</h3>
                        </div>
                    </div>
                    <div class="col-md-12 demo-masked-input">
                        <div class="row clearfix">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <b>Numero de Identificacion</b>
                                    <div class="input-group">
                                        <div class="form-line">
                                            <input type="text" name="cedula" class="form-control nombre" placeholder="Ex: 7765848xxx" required value="{{$personal->cedula}}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-3">
                                    <b>Primer Nombre</b>
                                    <div class="input-group">
                                        <div class="form-line">
                                            <input type="text" name="primer_nombre" class="form-control nombre" placeholder="Ex: daniel" required value="{{$personal->primer_nombre}}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <b>Segundo Nombre</b>
                                    <div class="input-group">
                                        <div class="form-line">
                                            <input type="text"  name="segundo_nombre" class="form-control apellido" placeholder="Ex: andres" value="{{$personal->segundo_nombre}}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <b>Primer Apellido</b>
                                    <div class="input-group">
                                        <div class="form-line">
                                            <input type="text" name="primer_apellido" class="form-control time12" placeholder="Ex: aguirre" required value="{{$personal->primer_apellido}}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <b>Segundo Apellido</b>
                                    <div class="input-group">
                                        <div class="form-line">
                                            <input type="text" name="segundo_apellido" class="form-control " placeholder="Ex: morales" value="{{$personal->segundo_apellido}}" disabled>
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
                                            <input type="text" name="celular" class="form-control mobile-phone-number" placeholder="Ex: +00 (000) 000-00-00" required value="{{$personal->celular}}" disabled>
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
                                            <input type="text" name="telefono" class="form-control mobile-phone-number" placeholder="Ex: +000 (000) 00-00" value="{{$personal->telefono}}" disabled>
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
                                            <input type="text" name="direccion" class="form-control money-dollar" placeholder="Ex: callexxD#xx-xxx" required value="{{$personal->direccion}}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <b>Barrio</b>
                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">my_location</i>
                                            </span>
                                        <div class="form-line">
                                            <input type="text"  name="barrio" class="form-control money-euro" placeholder="Ex:villa ligia" required disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-3">
                                    <b>Correo Electronico</b>
                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">email</i>
                                            </span>
                                        <div class="form-line">
                                            <input type="email" name="email" class="form-control email" placeholder="Ex: example@example.com" required value="{{$personal->email}}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <b>Correo Institucional</b>
                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">email</i>
                                            </span>
                                        <div class="form-line">
                                            <input type="email" name="email_institucional" class="form-control email" placeholder="Ex: example@example.com" value="{{$personal->email_institucional}}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-3">
                                    <b>Fecha de Nacimiento</b>
                                    <div class="input-group date">
                                        <div class="form-line ">
                                            <input type="text" name="fecha_nacimiento" class="form-control datepicker_component" placeholder="Please choose a date..." required value="{{$personal->fecha_nacimiento}}" disabled>
                                        </div>
                                        <span class="input-group-addon">
                                            <i class="material-icons">date_range</i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="box-header with-border" style="background-color: rgb(23, 128, 62)">
                            <h3 style="color: white;" class="text-center">Contacto de Emergencia</h3>
                        </div>
                    </div>
                    <div class="col-md-12 demo-masked-input">
                        <div class="row clearfix">
                            <div class="col-md-12">
                                <b>Nombre del contacto de emergencia</b>
                                <div class="input-group">
                                    <div class="form-line">
                                        <input type="text" name="nombre" class="form-control date" placeholder="Ex: daniel" required value="{{$personal->contacto->nombre}}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <b>Relación o parentezco (Conyuge,Padre,Amigo,ETC)</b>
                                <div class="input-group">
                                    <div class="form-line">
                                        <input type="text" name="paretezco" class="form-control time24" placeholder="Ex: andres" required value="{{$personal->contacto->parentezco}}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <b>Celular</b>
                                <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">phone_iphone</i>
                                            </span>
                                    <div class="form-line">
                                        <input type="text" name="celular_parentezco" class="form-control mobile-phone-number" placeholder="Ex: +00 (000) 000-00-00" required value="{{$personal->contacto->celular}}" disabled>
                                    </div>
                                </div>
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
@endsection


