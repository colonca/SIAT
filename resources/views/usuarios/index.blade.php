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
            <li><a href="{{route('loaders')}}" style="color: white;">
                    <i class="material-icons">home</i> inicio
                </a>
            </li>
            <li><a href="" style="color: white;">
                    <i class="material-icons">perm_identity</i> Usuarioss
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
                <div class="button-demo">
                    @if(session()->has('PAG_MODULOS'))
                        <a  href="{{route('modulos.index')}}" type="button" class="btn bg-light-green waves-effect" >MODULOS DEL SISTEMA</a>
                    @endif
                    <a  href='{{route('paginas.index')}}' type="button" class="btn bg-light-green waves-effect">PAGINAS DEL SISTEMA</a>
                    <a  href="{{route('grupos.index')}}" type="button" class="btn bg-light-green waves-effect">GRUPOS O ROLES DE USUARIOS</a>
                    <a  href="{{route('privilegios')}}" type="button" class="btn bg-light-green waves-effect">PRIVILEGIOS A PAGINAS</a>
                    <a  href="#" type="button" class="btn bg-light-green waves-effect">LISTAR A LOS USUARIOS</a>
                    <a  href="#" type="button" class="btn bg-light-green waves-effect">USUARIO MANUAL</a>
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
                            <button type="button"  class="btn btn-success btn-lg m-l-15 waves-effect"> <i class="material-icons">search</i> CONSULTAR USUARIO</button>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
