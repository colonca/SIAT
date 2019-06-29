@extends('layouts.app')

@section('content')

    @if(session()->has('info'))
        <div class="row">
            <div class="col">
                <div class="alert alert-primary" role="alert">
                    {{session('info')}}
                </div>
            </div>
        </div>
    @endif

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
                    @if(session()->has('PAG_PAGINAS'))
                    <a  href="{{route('paginas.index')}}" type="button" class="btn bg-deep-orange btn-lg  waves-effect" > <i class="material-icons">pages</i><span>PÁGINAS</span></a>
                    @endif
                    @if(session()->has('PAG_GRUPOS_ROLES'))
                    <a  href="{{route('grupos.index')}}" type="button" class="btn bg-green btn-lg  waves-effect" > <i class="material-icons">group</i><span>GRUPOS O ROLES</span></a>
                    @endif
                    @if(session()->has('PAG_PRIVILEGIOS'))
                    <a  href="{{route('privilegios')}}" type="button" class="btn bg-brown btn-lg waves-effect" > <i class="material-icons">desktop_access_disabled</i><span>PRIVILEGIOS</span></a>
                    @endif
                    @if(session()->has('PAG_LISTA_USUARIOS'))
                    <a  href="{{route('usuarios.index')}}" type="button" class="btn bg-teal btn-lg  waves-effect" > <i class="material-icons">list</i><span>LISTADO USUARIOS</span></a>
                    @endif
                    @if(session()->has('PAG_USUARIO_NUEVO'))
                    <a  href="#" type="button" class="btn bg-red  btn-lg  waves-effect"> <i class="material-icons">book</i><span>NUEVO USUARIO</span></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Row -->
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <div class="card">
            <div class="header">
                <h2>
                    MODIFICACIÓN Y ELIMINACION DE USUARIOS
                </h2>
            </div>
            <div class="body">
                <div class="form-group">
                    <div class="row clearfix">
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                            <div class="form-line">
                                <input type="text" id="identificacion" class="form-control" placeholder="Escriba la identificacion a consultar">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                <center><button type="button" class="btn btn-primary waves-effect btn-lg">
                                        <i class="material-icons">search</i>
                                        <span>Consultar Usuarios</span>
                                    </button></center>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
