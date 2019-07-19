@extends('layouts.app')

@section('content')
    <!--menu de navegacion de la modulo-->
    <div class="box-header with-border" style="background-color: rgb(23, 128, 62)">
        <ol class="breadcrumb">
            <li>
                <a href="{{route('psicologos.index')}}" style="color: white;">
                    <i class="material-icons">home</i> Inicio
                </a>
            </li>
            <li>
                <a href="" style="color: white;">
                    <i class="material-icons">perm_identity</i> Psicologos
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
                       Citas Agendadas
                    </h2>
                </div>
            </div>
            <div class="body table-responsive">
                <table class="table table-condensed" id="psicologos">
                    <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Estudiante</th>
                        <th>Hora</th>
                        <th>Estado</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($citas as $cita)
                        <tr>
                            <td>{{$cita->fecha}}</td>
                            <td>{{$cita->estudiante->nombres}}</td>
                            <td>{{$cita->hora}}:00</td>
                            <td>{{$cita->estado}}
                            <td>
                                @if($cita->estado == 'ATENDIDO' || $cita->estado == 'PERDIDA')
                                    <a href="" class="btn btn-success" onclick="estado(event,'{{$cita->id}}','Atender')" disabled="true"> Atender</a>
                                    <a href="" class="btn btn-danger" onclick="estado(event,'{{$cita->id}}','Perdida')" disabled="true">Perdida</a>
                                @else
                                    <a href="" class="btn btn-success" onclick="estado(event,'{{$cita->id}}','Atender')"> Atender</a>
                                    <a href="" class="btn btn-danger" onclick="estado(event,'{{$cita->id}}','Perdida')">Perdida</a>
                                @endif
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
            $('#psicologos').dataTable({
                "paging":   false,
                "ordering": false,
                "info":     false
            });
        });

        function estado(event,id,estado){
             event.preventDefault();
             if(!event.target.getAttribute('disabled')){
                 axios.post('{{url('citas/cambiar_estado')}}',{
                     estado:estado,
                     id:id
                 }).then(response => {
                     let datos = response.data;
                     if(datos.status == 'ok'){
                         $.notify('Estado Modificado Correctamente','success');
                         setTimeout(function () {
                             location.reload();
                         },1500);
                     }
                 });
             }
        }
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
                    let url = 'psicologos/'+id;
                    axios.delete(url).then(result => {
                        Swal.fire(
                            'Eliminado!',
                            'el psicologo se a eliminado correctamente.',
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
