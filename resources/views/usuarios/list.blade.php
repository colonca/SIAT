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
                    <i class="material-icons">perm_identity</i> Usuarios
                </a>
            </li>
            <li><a href="" style="color: white;">
                    <i class="material-icons">
                        supervised_user_circle
                    </i>
                    Lista de Usuarios
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
                       Usuarios del Sistema
                    </h2>
                </div>
            </div>
            <div class="body table-responsive">
                <table class="table table-bordered table-condensed table-hover" id="grupos">
                    <thead>
                    <tr class="bg-green text-center">
                        <th>Cedula</th>
                        <th>Nombre</th>
                        <th>Correo Electronico</th>
                        <th>Grupo o Role</th>
                        <th>Creado</th>
                        <th>Modificado</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($usuarios as $usuario)
                        <tr >
                            <td>{{$usuario->cedula}}</td>
                            <td>{{$usuario->nombre}}</td>
                            <td>{{$usuario->email}}</td>
                            <td>{{$usuario->role->nombre}}</td>
                            <td>{{$usuario->created_at}}</td>
                            <td>{{$usuario->updated_at}}</td>
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
            $('#grupos').dataTable({
                "paging":   false,
                "ordering": false,
                "info":     false
            });
        });

        function eliminar(event,id){
            event.preventDefault();
            Swal.fire({
                title: 'Estas seguro(a)?',
                text: "no podras revertilo!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminarlo!',
                cancelButtonText:'cancelar'
            }).then((result) => {
                if (result.value) {
                    let url = 'usuarios/'+id;
                    axios.delete(url).then(result => {
                        Swal.fire(
                            'Eliminado!',
                            'el Usuario se a eliminado correctamente.',
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
