@extends('layouts.app')

@section('content')

    <div class="box-header with-border" style="background-color: rgb(23, 128, 62)">
        <ol class="breadcrumb">
            <li><a href="{{route('dashboard')}}" style="color: white;">
                    <i class="material-icons">home</i> inicio
                </a>
            </li>
            <li><a href="" style="color: white;">
                    <i class="material-icons">perm_identity</i> Editar/Eliminar Usuario
                </a>
            </li>
        </ol>
    </div>

    @if(session()->has('info'))
        <div class="row">
            <div class="col">
                <div class="alert alert-primary" role="alert">
                    {{session('info')}}
                </div>
            </div>
        </div>
    @endif

    <div class="block-header">
        <div class="col-md-12">
        </div>
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            USUARIOS DEL SISTEMA - EDITAR/ELIMINAR USUARIO
                        </h2>
                    </div>
                    <div class="body">
                        <div class="alert bg-green alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <strong>Edite ó elimine un usuario del sistema.</strong>
                        </div>
                        <div class="col-md-12">
                        </div>
                        <h1 class="card-inside-title">DATOS DEL USUARIO</h1>
                        <div class="row clearfix">
                            <div class="col-md-12">
                                <form method="post" action="{{route('updateUser',$user->cedula)}}" accept-charset="UTF-8" class="form-horizontal col-md-12">
                                    @csrf
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <br><input class="form-control" placeholder="Escriba el número de identificación del usuario, con éste tendrá acceso al sistema" required="" name="cedula" type="text" value="{{$user->cedula}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <br><input class="form-control" placeholder="Escriba los nombres del usuario" required="" id="txt_nombres" name="nombre" type="text" value="{{$user->nombre}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <br><input class="form-control" placeholder="Escriba el correo electrónico del usuario" required="" id="txt_email" name="email" type="email" value="{{$user->email}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="form-control">Selecione los Grupos o Roles de Usuario</label>
                                            <select name="grupo_usuario_id" id="" class="selectpicker form-control"  data-live-search="true" data-size="10">
                                                @foreach($roles as $role)
                                                    @if($role->nombre == $user->role->nombre)
                                                        <option value="{{$role->id}}" selected>{{$role->nombre}}</option>
                                                    @else
                                                        <option value="{{$role->id}}">{{$role->nombre}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <br><br><a href="{{route('users')}}" class="btn bg-red waves-effect">Cancelar</a>
                                            <button class="btn bg-indigo waves-effect" type="reset">Limpiar Formulario</button>
                                            <input class="btn bg-green waves-effect" type="submit" value="Guardar">
                                            <a href="{{route('usuarios.destroy',$user->cedula)}}" class="btn bg-red waves-effect">Eliminar Usuario</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            USUARIOS DEL SISTEMA - CAMBIAR CONTRASEÑA
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a data-toggle="modal" data-target="#mdModal" class=" waves-effect waves-block">Ayuda</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="col-md-12">
                        </div>
                        <h1 class="card-inside-title">DATOS DEL USUARIO</h1>
                        <div class="row clearfix">
                            <div class="col-md-12">
                                <form method="POST" action="{{route('actualizarContrasnia')}}" accept-charset="UTF-8" class="form-horizontal col-md-12" id="formularioPassword">
                                    @csrf
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <br><input type="text" name="identificacion2" value="{{$user->cedula}}" class="form-control" readonly="" required="required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>Escriba la Nueva Contraseña</label>
                                                <br><input type="password" name="pass1" id="pass1" placeholder="Mínimo 6 caracteres" class="form-control" required="required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>Vuelva a Escribir La Nueva Contraseña</label>
                                                <br><input type="password" name="pass2" id="pass2" placeholder="Mínimo 6 caracteres" class="form-control" required="required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button class="btn bg-indigo waves-effect" type="reset">Limpiar</button>
                                            <button class="btn bg-green waves-effect" type="submit" onclick="enviar(event)">Guardar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="mdModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content modal">
                    <div class="modal-header">
                        <h4 class="modal-title" id="defaultModalLabel">SOBRE LOS USUARIOS</h4>
                    </div>
                    <div class="modal-body">
                        <strong>Edite ó elimine un usuario del sistema. Además, puede cambiar la contraseña.</strong>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">ACEPTAR</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
   <script>
       function enviar(event) {
         event.preventDefault();
         const data = $('#formularioPassword').serialize();
         axios.post('{{url('usuario/cambiar_password_2/finalizar')}}',data)
             .then(response => {
                 const data = response.data;
                 if(data.status == 'ok'){
                     $.notify(data.info,'success');
                     $('#formularioPassword #pass1').val('');
                     $('#formularioPassword #pass2').val('');
                 }else{
                     $.notify(data.info);
                 }
             });
       }
   </script>
@endsection
