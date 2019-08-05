@extends('layouts.app')

@section('styles')
    <style>
        .modal-body table {
            font-weight: bold;
            border-collapse: separate;
            margin: 10px;
            padding: 10px;
            border-radius: 5px;
            color: white;
        }
        .modal-body table thead th,tr{
            text-align: center;
            border-radius: 5px;
        }

    </style>
@endsection

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
                    <i class="material-icons">perm_identity</i> Talleristas
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
                        psicologos del Sistema
                    </h2>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <a href="{{route('psicologos.create')}}" class="btn btn-success pull-right">Agregar Nuevo Tallerista</a>
                </div>
            </div>
            <div class="body table-responsive">
                <table class="table table-condensed" id="psicologos">
                    <thead>
                    <tr>
                        <th>Cedula</th>
                        <th>Nombre</th>
                        <th>Direccion</th>
                        <th>Correos</th>
                        <th>Telefonos</th>
                        <th>Contacto de Emergencia</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                       @foreach($psicologos as $psicologo)
                         <tr>
                             <td>{{$psicologo->cedula}}</td>
                             <td>{{$psicologo->primer_nombre}} {{$psicologo->primer_apellido}}</td>
                             <td>{{$psicologo->direccion}} {{$psicologo->barrio}}</td>
                             <td>
                                 <ul class="list-unstyled">
                                     <li>{{$psicologo->email}}</li>
                                     <li>{{$psicologo->email_institucional}}</li>
                                 </ul>
                             </td>
                             <td>
                                 <ul class="list-unstyled">
                                     <li>{{$psicologo->telefono}}</li>
                                     <li>{{$psicologo->celular}}</li>
                                 </ul>
                             </td>
                             <td>
                                 <ul class="list-unstyled">
                                     <li>{{$psicologo->contacto->nombre}}</li>
                                     <li>{{$psicologo->contacto->parentezco}}</li>
                                     <li>{{$psicologo->contacto->celular}}</li>
                                 </ul>
                             </td>
                             <td>
                                 <a href="{{route('psicologos.show',$psicologo->id)}}"  class="btn btn-sm btn-info" title="Ver Informacion">
                                     <i class="material-icons">
                                         remove_red_eye
                                     </i>
                                 </a>

                                 <a href="#" onclick="eliminar(event,{{$psicologo->id}})"  class="btn btn-sm btn-danger" title="Eliminar" >
                                     <i class="material-icons">
                                         delete
                                     </i>
                                 </a>

                                 <!--<a href="{{route('psicologos.edit',$psicologo->id)}}" class="btn btn-sm btn-warning margin" title="Actualizar">
                                     <i class="material-icons">
                                         update
                                     </i>
                                 </a>-->

                                 <a href="#"  class="btn btn-sm btn-warning" onclick="verHorario({{$psicologo->id}})"  title="Ver Horario">
                                     <i class="material-icons">
                                         date_range
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

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="demo-masked-input">
                        <div class="row clearfix">
                            <div class="col-md-12">
                                <div class="cal">
                                    <table id="tabla" class="table table-responsive table-bordered">
                                        <thead class="bg-green">
                                        <th>Hora</th>
                                        <th>Lunes</th>
                                        <th>Martes</th>
                                        <th>Miercoles</th>
                                        <th>Jueves</th>
                                        <th>Viernes</th>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="bg-light-green text-center">8:00-9:00</td>
                                            <td data-value="11" ></td>
                                            <td data-value="12" ></td>
                                            <td data-value="13" ></td>
                                            <td data-value="14" ></td>
                                            <td data-value="15" ></td>
                                        </tr>
                                        <tr>
                                            <td class="bg-light-green text-center">09:00-10:00</td>
                                            <td data-value="21" ></td>
                                            <td data-value="22" ></td>
                                            <td data-value="23" ></td>
                                            <td data-value="24" ></td>
                                            <td data-value="25" ></td>
                                        </tr>
                                        <tr>
                                            <td class="bg-light-green text-center">10:00-11:00</td>
                                            <td data-value="31" ></td>
                                            <td data-value="32" ></td>
                                            <td data-value="33" ></td>
                                            <td data-value="34" ></td>
                                            <td data-value="35" ></td>
                                        </tr>
                                        <tr>
                                            <td class="bg-light-green text-center">11:00-12:00</td>
                                            <td data-value="41" ></td>
                                            <td data-value="42" ></td>
                                            <td data-value="43" ></td>
                                            <td data-value="44" ></td>
                                            <td data-value="45" ></td>
                                        </tr>
                                        <tr>
                                            <td colspan="6" class="text-center" style=" color: black;background-color: rgb(232, 234, 237); border-radius: 4px;">
                                                <h6 class="white">DESCANSO</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bg-light-green text-center">14:00-15:00</td>
                                            <td data-value="71" ></td>
                                            <td data-value="72" ></td>
                                            <td data-value="73" ></td>
                                            <td data-value="74" ></td>
                                            <td data-value="75" ></td>
                                        </tr>
                                        <tr>
                                            <td class="bg-light-green text-center">15:00-16:00</td>
                                            <td data-value="81" ></td>
                                            <td data-value="82" ></td>
                                            <td data-value="83" ></td>
                                            <td data-value="84" ></td>
                                            <td data-value="85" ></td>
                                        </tr>
                                        <tr>
                                            <td class="bg-light-green text-center">16:00-17:00</td>
                                            <td data-value="91" ></td>
                                            <td data-value="92" ></td>
                                            <td data-value="93" ></td>
                                            <td data-value="94" ></td>
                                            <td data-value="95" ></td>
                                        </tr>
                                        <tr>
                                            <td class="bg-light-green text-center">17:00-18:00</td>
                                            <td data-value="101" ></td>
                                            <td data-value="102" ></td>
                                            <td data-value="103" ></td>
                                            <td data-value="104" ></td>
                                            <td data-value="105" ></td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


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

        function verHorario(id){
            const url = 'horarios/'+id;
            axios.get(url).then(response => {
               let data = response.data;
               const items = document.querySelectorAll('td[data-value]');
               items.forEach(x => {
                   x.innerHTML = '';
                   x.classList = '';
                   x.style.backgroundColor ="white";
               });
               data.forEach(x => {
                   const hora = x.hora - 7;
                   const itemQuery = `td[data-value='${hora}${x.dia}']`;
                   const item = document.querySelector(itemQuery);
                   item.innerHTML = 'Disponible';
                   item.style.color = 'black';
                   item.classList = 'hora-activa';
                   item.style.backgroundColor ="rgb(253, 231, 112)";
               });
            });
            $('#exampleModal').modal('show');
        }

    </script>
@endsection
