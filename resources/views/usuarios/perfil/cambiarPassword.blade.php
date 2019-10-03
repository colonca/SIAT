@extends('layouts.app')

@section('content')

    <div class="box-header with-border" style="background-color: rgb(23, 128, 62)">
        <ol class="breadcrumb">
            <li><a href="{{route('dashboard')}}" style="color: white;">
                    <i class="material-icons">home</i> inicio
                </a>
            </li>
            <li><a href="" style="color: white;">
                    <i class="material-icons">phonelink_lock</i> Nueva Contraseña
                </a>
            </li>
        </ol>
    </div>
    @if(session()->has('error'))
        <div class="col-md-12">
            <div class="alert alert-danger" role="alert">
                {{session('error')}}
            </div>
        </div>
    @endif
    @if(session()->has('info'))
        <div class="col-md-12">
            <div class="alert alert-info" role="alert">
                {{session('info')}}
            </div>
        </div>
    @endif

    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h2>
                        CAMBIAR CONTRASEÑA<small>Haga clic en el botón de 3 puntos de la derecha de este título para agregar un nuevo registro.</small>
                    </h2>
                </div>
                <div class="body">
                    <div class="alert bg-green alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <strong>Detalles: </strong>Esta funcionalidad permite al usuario realizar el cambio de su contraseña.</div>
                    <div class="col-md-12">
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <form method="POST" action="{{route('updateContrasenia')}}" accept-charset="UTF-8" class="form-horizontal">
                                @csrf
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="form-line">
                                            <label class="control-label">Escriba Su Contraseña Actual</label>
                                            <input class="form-control" required="" name="pass0" type="password" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-line">
                                            <label class="control-label">Escriba La Nueva Contraseña</label>
                                            <input class="form-control" minlength="6" placeholder="Mínimo 6 caracteres" required="" name="pass1" type="password" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-line">
                                            <label class="control-label">Vuelva a Escribir La Nueva Contraseña</label>
                                            <input class="form-control"  minlength="6" placeholder="Mínimo 6 caracteres" required="" name="pass2" type="password" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input class="btn btn-raised btn-success" type="submit" value="Realizar Cambio">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
