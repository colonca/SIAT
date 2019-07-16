@extends('citas.estudiante.index')

@section('content')

    <!--menu de navegacion de la pagina-->
    <div class="box-header with-border" style="background-color: rgb(23, 128, 62)">
        <ol class="breadcrumb">
            <li><a href="#" style="color: white;">
                    <i class="material-icons">home</i> inicio
                </a>
            </li>
            <li><a href="" style="color: white;">
                    <i class="material-icons">perm_identity</i> Historial de Citas
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
                       Historial de Citas
                    </h2>
                </div>
            </div>
            <div class="body table-responsive">
                <table class="table table-condensed" id="grupos">
                    <thead>
                    <tr>
                        <th>PSICOLOGO</th>
                        <th>FECHA</th>
                        <th>HORA</th>
                        <th>ESTADO</th>
                        <th>&nldr;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($citasEstudiante as $citas)
                        @foreach($citas as $cita)
                            <tr>
                                <td>
                                    {{$cita->personal->primer_nombre.' '.$cita->personal->segundo_nombre
                                    .' '.$cita->personal->primer_apellido.' '.$cita->personal->segundo_apellido}}
                                </td>
                                <td>{{$cita->fecha}}</td>
                                <td>{{$cita->hora}}:00</td>
                                <td>
                                    @if($cita->estado == 'ATENDIDO')
                                        <p  class="col-green">
                                            {{$cita->estado}}
                                        </p>
                                    @endif
                                    @if($cita->estado == 'PERDIDA')
                                        <p class="col-red">
                                            {{$cita->estado}}
                                        </p>
                                    @endif
                                    @if($cita->estado == 'PENDIENTE')
                                        <P class="col-blue ">
                                            {{$cita->estado}}
                                        </P>
                                    @endif
                                    @if($cita->estado == 'CANCELADA')
                                        <P class="col-red ">
                                            {{$cita->estado}}
                                        </P>
                                    @endif
                                </td>
                                <td>
                                    @if($cita->estado == 'ATENDIDO')
                                        <a class="col-green" title="cancelar cita" style="cursor: pointer">
                                            <i class="tinny material-icons green-text">done_all</i>
                                        </a>
                                    @endif
                                    @if($cita->estado == 'PERDIDA')
                                        <a class="col-red" title="cancelar cita" style="cursor: pointer">
                                            <i class="tinny material-icons green-text">done_all</i>
                                        </a>
                                    @endif
                                    @if($cita->estado == 'PENDIENTE')
                                        <a class="col-red" title="cancelar cita" style="cursor: pointer" onclick="cancelar(event,'{{$cita->id}}','{{$cita->fecha}}')">
                                            <i class="tinny material-icons green-text">done_all</i>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
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

        function cancelar(event,id,fecha){

            event.preventDefault();

            let fechaActual = new Date();
            let fechadeComparacion = new Date(fecha);
            fechaActual.getDay();
            fechaActual.getDate();
            fechadeComparacion.getDay();
            fechadeComparacion.getDate();


            if(fechaActual.getDay() == (fechadeComparacion.getDay()+1) && fechaActual.getDate() == fechadeComparacion.getDate()) {

                $.notify('no es posible cancelar la cita el mismo dia');

            }else if(fechaActual.getDay() > (fechadeComparacion.getDay()+1) || fechaActual.getDate() > fechadeComparacion.getDate()){

                $.notify('no es posible cancelar la cita');

            }else{
                Swal.fire({
                    title: 'Estas segur@ que deseas cancelar la cita?',
                    text: "no podras revertilo!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si',
                    cancelButtonText:'cancelar'
                }).then((result) => {
                    if (result.value) {
                        let url = '{{url('citas/estudiante/cancelarCita')}}';
                         axios.post(url,{
                             id: id,
                         }).then(result => {
                             Swal.fire(
                                 'Cancelada!',
                                 'La cita se ha cancelado correctamente.',
                                 'success'
                             ).then(result => {
                                 location.reload();
                             });
                         });
                    }
                    })
                }
            }



    </script>
@endsection
