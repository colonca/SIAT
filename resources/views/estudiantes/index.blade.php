@extends('layouts.app')

@section('content')

    <!--menu de navegacion de la pagina-->
    <div class="box-header with-border" style="background-color: rgb(23, 128, 62)">
        <ol class="breadcrumb">
            <li>
                @if(Auth()->user()->role->nombre == 'psicologo')
                    <a href="{{route('dashboard_psicologo')}}" style="color: white;">
                @else
                    <a href="{{route('dashboard')}}" style="color: white;">
                @endif
                    <i class="material-icons">home</i> inicio
                </a>
            </li>
            <li><a href="" style="color: white;">
                    <i class="material-icons">perm_identity</i> Estudiantes
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
                        Estudiantes
                    </h2>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <a href="{{route('estudiantes.create')}}" class="btn btn-success pull-right">Agregar Nuevo Estudiante</a>
                </div>
            </div>
            <div class="body table-responsive">

                <h3 class="col-blue-grey m-b-20">Filtrar</h3>
                <form action="{{route('estudiantes.index')}}" method="get">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <b>Riesgo</b>
                                    <select name="riesgo" id="" class="form-group">
                                        <option value="">Selecione...</option>
                                        <option value="Riesgo Bajo">Riesgo Bajo</option>
                                        <option value="super Bajo">Riesgo super Bajo</option>
                                        <option value="Riesgo Medio">Riesgo Medio</option>
                                        <option value="Alto">Riesgo Alto</option>
                                        <option value="super Alto">Riesgo Super Alto</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <b>Programa</b>
                                <div class="input-group">
                                    <select name="programa" class="form-control selectpicker show-tick"  data-actions-box="true" data-live-search="true">
                                        <option value="">por favor, elejir para filtrar</option>
                                        @foreach($programas as $programa)
                                            <option value="{{$programa->programa}}">{{$programa->programa}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <b>Cedula</b>
                                <div class="input-group">
                                    <div class="form-line">
                                        <input type="text" name="cedula" class="form-control date" placeholder="criterio de busqueda para el Alumno">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <b>Periodo</b>
                                    <select name="periodo" id="" class="form-group">
                                        <option value="">Selecione...</option>
                                        @foreach($periodos as $periodo)
                                            <option value="{{$periodo->id}}">{{$periodo->anio}}==>{{$periodo->periodo}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-6">
                                <b>Nombres</b>
                                <div class="input-group">
                                    <div class="form-line">
                                        <input type="text" name="nombre" class="form-control date" placeholder="criterio de busqueda para el Alumno">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <b>Promedio</b>
                                <div class="input-group">
                                    <div class="form-line">
                                        <input type="text" name="promedio" class="form-control date" placeholder="promedio">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 m-b--110">
                            <button type="submit" class="btn  btn-block btn-success ">Buscar</button>
                        </div>
                    </div>
                </form>

                <table class="table table-condensed table-bordered table-striped" id="grupos">
                    <thead>
                    <tr>
                        <th>Cedula</th>
                        <th width="150px">Nombres</th>
                        <th width="100px">Programa</th>
                        <th width="40px">Contacto</th>
                        <th width="10px">Promedio General</th>
                        <th width="10px">Periodo Cronologico</th>
                        <th>Riesgo</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($estudiantes as $estudiante)
                        <tr>
                            <td>{{$estudiante->cedula}}</td>
                            <td>{{$estudiante->nombres}}</td>
                            <td>{{$estudiante->programa}}</td>
                            <td>
                                <ul class="list-unstyled">
                                    <li>
                                        <div class="input-group">
                                          <span class="input-group-addon">
                                                <i class="material-icons">room</i>
                                            </span>
                                            {{$estudiante->direccion}}
                                        </div>
                                    </li>
                                    <li>
                                        <div class="input-group">
                                          <span class="input-group-addon">
                                                <i class="material-icons">settings_phone</i>
                                            </span>
                                            {{$estudiante->telefono }}
                                        </div>
                                    </li>
                                    <li>
                                        <div class="input-group">
                                          <span class="input-group-addon">
                                                <i class="material-icons">mail_outline</i>
                                            </span>
                                            {{$estudiante->email}}
                                        </div>
                                    </li>
                                </ul>
                            </td>
                            <td>{{$estudiante->promedio_general}}</td>
                            <td>{{$estudiante->periodo_cronologico}}</td>
                            <td>{{substr($estudiante->estado,2)}}</td>
                            <td>
                                <a href="{{route('estudiantes.show',$estudiante->cedula)}}"  class="btn btn-sm btn-info" title="Ver">
                                    <i class="material-icons">
                                        remove_red_eye
                                    </i>
                                </a>
                                <a href="#" onclick="enviarCorreo(event,'{{$estudiante->email}}')" class="btn btn-sm btn-outline-danger m-t-5" title="Enviar Correo Electronico">
                                    <i class="material-icons">
                                        exit_to_app
                                    </i>
                                </a>
                                <a href="#"  class="btn btn-sm btn-warning m-t-5" title="Modificar">
                                    <i class="material-icons">
                                        exit_to_app
                                    </i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    {!!$estudiantes->render()!!}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Row -->
    <div class="modal fade" id="correo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Correo Electronico</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" id="body_correo" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="destino" id="destino" class="form-control" placeholder="Destinatario">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name ="asunto" class="form-control" placeholder="Asunto">
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea name="" id="editor" name="mensaje" class="ckeditor" cols="30" rows="10">

                            </textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button"  onclick="enviar(event)" class="btn btn-primary">Enviar</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="{{asset('js/notify.min.js')}}"></script>
    <script src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
    <script>
        
        $(document).ready(function () {

            CKEDITOR.replace( 'editor',
                {
                    lang: 'es',
                    allowedContent: true,
                    ignoreEmptyParagraph: false,
                    enterMode: CKEDITOR.ENTER_BR
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
                    let url = 'grupos/'+id;
                    axios.delete(url).then(result => {
                        Swal.fire(
                            'Eliminado!',
                            'el grupo se a eliminado correctamente.',
                            'success'
                        ).then(result => {
                            location.reload();
                        });
                    });
                }
            })
        }
        function enviarCorreo(event,correo){
          event.preventDefault();
          document.getElementById('destino').value = correo;
          $('#correo').modal('show');
        }
        function enviar(event){
            event.preventDefault();
            let data = new FormData(document.getElementById('body_correo'));

            data.append('mensaje',CKEDITOR.instances['editor'].getData());

            axios.post('mensageIndividual',data)
                .then(response => {
                 $.notify('enviado correctamente','success');
                 $('#correo').modal('hide');
            });


        }
    </script>
@endsection
