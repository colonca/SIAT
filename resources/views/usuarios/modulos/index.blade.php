@extends('layouts.app')

@section('content')

    <!--menu de navegacion de la modulo-->
    <div class="box-header with-border" style="background-color: rgb(23, 128, 62)">
        <ol class="breadcrumb">
            <li><a href="{{route('dashboard')}}" style="color: white;">
                    <i class="material-icons">home</i> inicio
                </a>
            </li>
            <li><a href="{{route('users')}}" style="color: white;">
                    <i class="material-icons">perm_identity</i> Usuarios
                </a>
            </li>
            <li><a href="" style="color: white;">
                    <i class="material-icons">
                        view_module
                    </i>
                    Modulos
                </a>
            </li>
        </ol>
    </div>

    @if(session()->has('info'))
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="body">
                    <div class="alert alert-success">
                        <strong>Bien Hecho!</strong> {{session('info')}}
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!--menu de opciones-->
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header container">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <h2>
                        Modulos del Sistema
                    </h2>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <a href="{{route('modulos.create')}}" class="btn btn-success pull-right">Agregar Nuevo Modulo</a>
                </div>
            </div>
            <div class="body table-responsive">
                <table class="table table-condensed" id="modulos">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($modulos as $modulo)
                        <tr>
                            <th scope="row">{{$modulo->nombre}}</th>
                            <td>{{substr($modulo->descripcion,0,80).'...'}}</td>
                            <td>
                                <a href="{{route('modulos.show',$modulo->id)}}"  class="btn btn-sm btn-info" title="Ver">
                                    <i class="material-icons">
                                        remove_red_eye
                                    </i>
                                </a>
                            <!--onclick="eliminar(event,{{$modulo->id}})"-->
                                <a href="#"  class="btn btn-sm btn-danger" title="Eliminar" disabled="true">
                                    <i class="material-icons">
                                        delete
                                    </i>
                                </a>

                                <a href="{{route('modulos.edit',$modulo->id)}}" class="btn btn-sm btn-warning margin" title="Actualizar">
                                    <i class="material-icons">
                                        update
                                    </i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Row -->
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script>
        $('document').ready(function () {
            $('#modulos').dataTable({
                "paging":   false,
                "ordering": false,
                "info":     false
            });
        });

        function eliminar(event,id){
            event.preventDefault();
            Swal.fire({
                title: 'Estas segur@?',
                text: "no podras revertilo!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminarlo!',
                cancelButtonText:'cancelar'
            }).then((result) => {
                if (result.value) {
                    let url = 'modulos/'+id;
                    axios.delete(url).then(result => {
                        Swal.fire(
                            'Eliminado!',
                            'el modulo se a eliminado correctamente.',
                            'success'
                        ).then(result => {
                            location.reload();
                        });
                    });
                }
            })

        }
    </script>
@endsection
