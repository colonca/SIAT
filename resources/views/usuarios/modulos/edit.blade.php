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
                    <i class="material-icons">perm_identity</i>Actualizando modulo
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
            <div class="header container">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <h2>
                        Actualizar modulo Existente
                    </h2>
                </div>
            </div>
            <div class="body table-responsive">
                <form action="{{route('modulos.update',$modulo->id)}}" method="POST">
                    @csrf
                    {{ method_field('PATCH') }}
                    <div class="form-group">
                        <label for="" class="form-control">Nombre</label>
                        <div class="form-line">
                            <input name ="nombre" type="text" class="form-control" placeholder="Ingresa el nombre de la modulo" value="{{$modulo->nombre}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="form-control">Descripcion</label>
                        <div class="form-line">
                            <input name ="descripcion" type="text" class="form-control" placeholder="Breve descripcion del modulo" value="{{$modulo->descripcion}}">
                        </div>
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

