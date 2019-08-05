@extends('layouts.app')

@section('content')

    <!--menu de navegacion de la pagina-->
    <div class="box-header with-border" style="background-color: rgb(23, 128, 62)">
        <ol class="breadcrumb">
            <li><a href="{{route('dashboard')}}" style="color: white;">
                    <i class="material-icons">home</i> inicio
                </a>
            </li>
            <li><a href="" style="color: white;">
                    <i class="material-icons">perm_identity</i> Usuarios
                </a>
            </li>
        </ol>
    </div>

    @if(session()->has('error'))
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger" role="alert">
                    {{session('error')}}
                </div>
            </div>
        </div>
    @endif

    @if(session()->has('info'))
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success" role="alert">
                    {{session('info')}}
                </div>
            </div>
        </div>
    @endif


    <!--menu de opciones-->
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <div class="card">
            <div class="header">
                <h2>
                    Usuarios del Sistema
                </h2>
                <small>MENU</small>
            </div>
            <div class="body">
                <div class="alert alert-success">
                    <strong>Detalles: </strong>  Agregue usuarios al sistema y administre sus privilegios, gestione los usuarios, configure los grupos de usuarios, asi como tambien los modulos del sistema, entre otras tareas</a>.
                </div>
                <div class="icon-and-text-button-demo">
                    @if(session()->has('PAG_MODULOS'))
                    <a  href="{{route('modulos.index')}}" type="button" class="btn btn-primary btn-lg  waves-effect" > <i class="material-icons">view_module</i><span>MÓDULOS</span></a>
                    @endif
                    <a  href="{{route('paginas.index')}}" type="button" class="btn bg-deep-orange btn-lg  waves-effect" > <i class="material-icons">pages</i><span>PÁGINAS</span></a>
                    <a  href="{{route('grupos.index')}}" type="button" class="btn bg-green btn-lg  waves-effect" > <i class="material-icons">group</i><span>GRUPOS O ROLES</span></a>
                    <a  href="{{route('privilegios')}}" type="button" class="btn bg-brown btn-lg waves-effect" > <i class="material-icons">desktop_access_disabled</i><span>PRIVILEGIOS</span></a>
                    @if(session()->has('PAG_LISTA_USUARIOS'))
                    <a  href="{{route('usuarios.index')}}" type="button" class="btn bg-teal btn-lg  waves-effect" > <i class="material-icons">list</i><span>LISTADO USUARIOS</span></a>
                    @endif
                    @if(session()->has('PAG_USUARIO_NUEVO'))
                    <a  href="{{route('usuarios.create')}}" type="button" class="btn bg-red  btn-lg  waves-effect"> <i class="material-icons">book</i><span>NUEVO USUARIO</span></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Row -->
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h2>
                    MODIFICACIÓN Y ELIMINACIÓN DE USUARIOS
                </h2>
            </div>
            <div class="body">
                <div class="row clearfix">
                    <form method="POST" action="{{route('operaciones')}}" accept-charset="UTF-8" class="form-horizontal form-label-left">
                        @csrf
                        <div class="col-md-12">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input class="form-control" placeholder="Escriba la identificación a consultar" id="id" name="id" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <input class="btn bg-deep-orange waves-effect btn-block" type="submit" value="CONSULTAR USUARIO">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
