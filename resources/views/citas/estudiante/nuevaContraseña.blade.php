@extends('citas.estudiante.index')

@section('content')
    <div class="container-fluid">
        <!-- Row -->
        <div class="row">
            <!-- Column -->
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

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Cambie su Contraseña aqui
                        </h2>
                    </div>
                    <div class="body">

                        <form action="{{route('actualizarContraseña')}}" method="post">
                            @csrf
                            <input type="hidden" name="cedula" value="{{session('estudiante')->cedula}}">
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <b>Nueva Contraseña</b>
                                        <div class="input-group">
                                            <div class="form-line ">
                                                <input type="password" name="password1" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <b>Repetir Contraseña</b>
                                        <div class="input-group ">
                                            <div class="form-line ">
                                                <input type="password"  name="password2" class="form-control" placeholder="" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12" style="margin-bottom: 4px;">
                                        <div class="form-group col-md-12">
                                            <button type="submit" class="btn btn-lg btn-success pull-right">Comfirmar Contraseña</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <!-- Column -->
        </div>
        <!-- Row -->
        <!-- Row -->
    </div>
@endsection