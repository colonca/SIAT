@extends('layouts.app')

@section('content')



    <!--menu de navegacion de la modulo-->
    <div class="box-header with-border" style="background-color: rgb(23, 128, 62)">
        <ol class="breadcrumb">
            <li><a href="{{route('users')}}" style="color: white;">
                    <i class="material-icons">home</i> inicio
                </a>
            </li>
            <li><a href="{{route('modulos.index')}}" style="color: white;">
                    <i class="material-icons">perm_identity</i> Grupo de modulos
                </a>
            </li>
            <li>
                <a href="" style="color: white;">
                    <i class="material-icons">perm_identity</i>Datos del Modulo
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
                        <h4>Datos del Modulo Selecionada</h4>
                        <hr>
                    </div>
                    <div class="col-md-12 " style="margin: 2px 0">
                        <div class="form-group">
                                <div class="form-line">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-4" style="margin: 5px 0;">
                                            <p><b>Id del Modulo</b></p>
                                        </div>
                                        <div class="col-md-8 col-lg-8" style="margin: 5px 0;">
                                            <p>{{$modulo->id}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                     </div>
                    <div class="col-md-12" style="margin: 2px 0">
                      <div class="form-group">
                        <div class="form-line">
                            <div class="row">
                                <div class="col-md-4 col-lg-4" style="margin: 5px 0">
                                    <p><b>Nombre</b></p>
                                </div>
                                <div class="col-md-8 col-lg-8" style="margin: 5px 0">
                                    <p>{{$modulo->nombre}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-12" style="margin: 2px 0">
                        <div class="form-group">
                            <div class="form-line">
                                <div class="row">
                                    <div class="col-md-4 col-lg-4" style="margin-bottom: 5px">
                                        <p> <b>Descripcion</b></p>
                                    </div>
                                    <div class="col-md-8 col-lg-8" style="margin-bottom: 5px">
                                        <p>{{$modulo->descripcion}}</p>
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


