@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12">
            <div class="card profile-card">
                <div class="profile-header">&nbsp;</div>
                <div class="profile-body">
                    <div class="image-area">
                    <img src="{{asset('images/logo-upc.png')}}" alt="AdminBSB - Profile Image">
                    </div>
                    <!--información del usuario-->
                    <div class="content-area">
                        <h3>NOMBRE DE LA PERSONA TRAIDA DE LA BASE DE DATOS</h3>
                        <p>{{strtoupper(Auth::user()->role->nombre)}}</p>
                    </div>
                </div>
                <div class="profile-footer">
                        <div class="body">
                                <div>
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">Perfil</a></li>
                                        <li role="presentation"><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab">Cambio de Contraseña</a></li>
                                    </ul>
            
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="profile_settings">
                                            <form class="form-horizontal">
                                                <div class="form-group">
                                                    <label for="NameSurname" class="col-sm-2 control-label">Usuario</label>
                                                    <div class="col-sm-4">
                                                        <div class="form-line focused">
                                                            <input type="text" class="form-control" id="nombre_Usuario" name="nombre_Usuario" placeholder="Nombre de Usuario" required="" value="{{Auth::user()->nombre}}">
                                                        </div>
                                                    </div>

                                                    <label for="Email" class="col-sm-2 control-label">Correo</label>
                                                    <div class="col-sm-4">
                                                        <div class="form-line focused">
                                                            <input type="email" class="form-control" id="Email" name="Email" placeholder="Correo" value="{{Auth::user()->email}}">
                                                        </div>
                                                    </div>

                                                    <label for="NameSurname" class="col-sm-2 control-label">Teléfono</label>
                                                    <div class="col-sm-4">
                                                        <div class="form-line focused">
                                                            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ejemplo: xxxxxx" required="" value="{{$personal == null ? '': $personal->telefono}}">
                                                        </div>
                                                    </div>

                                                    <label for="Email" class="col-sm-2 control-label">Dirección</label>
                                                    <div class="col-sm-4">
                                                        <div class="form-line focused">
                                                            <input type="text" class="form-control" id="l" name="Email" placeholder="Direción" value="{{$personal == null? '': $personal->direccion}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </form>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade in" id="change_password_settings">
                                            <form class="form-horizontal">
                                                <div class="form-group">
                                                    <label for="OldPassword" class="col-sm-3 control-label">Antigua clave</label>
                                                    <div class="col-sm-9">
                                                        <div class="form-line">
                                                            <input type="password" class="form-control" id="OldPassword" name="OldPassword" placeholder="Antigua clve" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="NewPassword" class="col-sm-3 control-label">Nueva Clave</label>
                                                    <div class="col-sm-9">
                                                        <div class="form-line">
                                                            <input type="password" class="form-control" id="NewPassword" name="NewPassword" placeholder="Nueva Clave" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="NewPasswordConfirm" class="col-sm-3 control-label">Nueva Clave (Confirmar)</label>
                                                    <div class="col-sm-9">
                                                        <div class="form-line">
                                                            <input type="password" class="form-control" id="NewPasswordConfirm" name="NewPasswordConfirm" placeholder="Nueva Clave" required="">
                                                        </div>
                                                    </div>
                                                </div>
            
                                                <div class="form-group">
                                                    <div class="col-sm-offset-3 col-sm-9">
                                                        <button type="submit" class="btn btn-danger">Registrar Cambio</button>
                                                    </div>
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
</div>

@endsection