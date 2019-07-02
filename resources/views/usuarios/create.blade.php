@extends('layouts.app')

@section('content')

    <!--menu de navegacion de la pagina-->
    <div class="box-header with-border" style="background-color: rgb(23, 128, 62)">
        <ol class="breadcrumb">
            <li><a href="{{route('dashboard')}}" style="color: white;">
                    <i class="material-icons">home</i> inicio
                </a>
            </li>
            <li><a href="{{route('users')}}" style="color: white;">
                    <i class="material-icons">home</i> usuarios
                </a>
            </li>
            <li><a href="{{route('usuarios.index')}}" style="color: white;">
                    <i class="material-icons">perm_identity</i> Lista de Usuario
                </a>
            </li>
            <li>
                <a href="" style="color: white;">
                    <i class="material-icons">perm_identity</i>Nuevo Usuario
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

    @if(session()->has('error'))
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="alert alert-danger">
                <strong>Error!</strong> {{session('error')}}
            </div>
        </div>
    @endif

    <!--menu de opciones-->
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <div class="card">
            <div class="header container">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <h2>
                        Crear un Nuevo Usuario
                    </h2>
                </div>
            </div>
            <div class="body table-responsive">
                <form action="{{route('usuarios.store')}}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="" class="form-control">Numero de identificación</label>
                        <div class="form-line">
                            <input name ="cedula" type="text" class="form-control" placeholder="Ingresa el nombre del modulo" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="form-control">Nombre</label>
                        <div class="form-line">
                            <input name ="nombres" type="text" class="form-control" placeholder="Ingresa el nombre del modulo" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="form-control">Correo Electronico</label>
                        <div class="form-line">
                            <input name ="email" type="text" class="form-control" placeholder="Breve descripción del Modulo">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="form-control">Selecione el Grupo o Role del Usuario</label>
                        <select name="role" id="" class="selectpicker form-control"  data-live-search="true" data-size="10" required>
                            @foreach($roles as $role)
                                <option value="{{$role->id}}">{{$role->nombre}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-success m-t-15 waves-effect pull-right">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Row -->
@endsection

@section('scripts')
@endsection
