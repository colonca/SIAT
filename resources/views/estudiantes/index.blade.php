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
            <li>
                <a href="" style="color: white;">
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
            <div class="header">
                <h2>
                    ESTUDIANTES
                    <a href="{{route('estudiantes.create')}}" class="btn bg-deep-orange waves-effect pull-right"><i class="material-icons">person_add</i><span>Nuevo Estudiante</span></a>
                </h2>
                <small>Utilice las siguientes opciones para filtrar su búsqueda.</small>
            </div>
            <div class="body">
                <form action="{{route('estudiantes.index')}}" method="get">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-2">
                                <b>Cédula</b>
                                    <div class="input-group">
                                        <div class="form-line">
                                            <input type="number" name="cedula" class="form-control date" placeholder="ej: 1065xxx">
                                        </div>
                                    </div>
                            </div>

                            <div class="col-md-4">
                                    <b>Nombres</b>
                                    <div class="input-group">
                                        <div class="form-line">
                                            <input type="text" name="nombre" class="form-control date" placeholder="Ej: Nahun Montesino">
                                        </div>
                                    </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <b>Riesgo</b>
                                    <div class="input-group">
                                        <select name="riesgo" id="" class="form-control selectpicker show-tick">
                                            <option value="">Selecione...</option>
                                            <option value="Riesgo Bajo">Riesgo Bajo</option>
                                            <option value="super Bajo">Riesgo super Bajo</option>
                                            <option value="Riesgo Medio">Riesgo Medio</option>
                                            <option value="Alto">Riesgo Alto</option>
                                            <option value="super Alto">Riesgo Super Alto</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">

                                    <div class="form-group">
                                        <b>Periodo</b>
                                        <div class="input-group">
                                            <select name="periodo" id="" class="form-control selectpicker show-tick">
                                                <option value="">Selecione...</option>
                                                @foreach($periodos as $periodo)
                                                    <option value="{{$periodo->id}}">{{$periodo->anio}}-{{$periodo->periodo}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                            </div>

                        </div>
                        <div class="col-md-12">
                                <div class="col-md-7">
                                        <b>Programa</b>
                                        <div class="input-group">
                                            <select name="programa" class="form-control selectpicker show-tick"  data-actions-box="true" data-live-search="true">
                                                <option value="">Seleccione</option>
                                                @foreach($programas as $programa)
                                                    <option value="{{$programa->programa}}">{{$programa->programa}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                            <div class="col-md-3">
                                <b>Promedio</b>
                                <div class="input-group">
                                    <div class="form-line">
                                        <input type="text" name="promedio" class="form-control date" placeholder="ej: 3.1" title="Utilice el punto (.) para números decimales">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2">
                                    <button type="submit" class="btn  btn-block btn-success "><i class="material-icons">search</i><span>Filtrar</span></button>
                            </div>
                        </div>

                    </div>
                    </form>


                <div class="table-responsive">
                    <table class="table table-bordered table-condensed table-hover" id="grupos">
                        <thead>
                        <tr class="bg-green">
                            <th class="align-center">Cédula</th>
                            <th class="align-center">Nombres</th>
                            <th class="align-center">Programa</th>
                            <th class="align-center">Contacto</th>
                            <th class="align-center">Promedio General</th>
                            <th class="align-center">Periodo cronológico</th>
                            <th class="align-center">Riesgo</th>
                            <th class="align-center">Acción</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($estudiantes as $estudiante)
                            <tr>
                                <th class="align-center">{{$estudiante->cedula}}</th>
                                <td class="font-bold col-blue-grey">{{$estudiante->nombres}}</td>
                                <td>{{$estudiante->programa}}</td>
                                <td>
                                    <div class="demo-icon-container">
                                        <div class="demo-google-material-icon"> <i class="material-icons">room</i> <span class="icon-name">{{$estudiante->direccion}}</span></div>
                                        <div class="demo-google-material-icon"> <i class="material-icons">call</i> <span class="icon-name">{{$estudiante->telefono }}</span></div>
                                        <div class="demo-google-material-icon"> <i class="material-icons">mail_outline</i> <span class="icon-name font-underline col-pink">{{$estudiante->email}}</span></div>
                                    </div>
                                </td>
                                <td class="align-center">{{$estudiante->promedio_general}}</td>
                                <td class="align-center">{{$estudiante->periodo_cronologico}}</td>
                                <td class="font-bold font-underline col-teal">{{substr($estudiante->estado,2)}}</td>
                                <td class="align-center">
                                    <a href="{{route('estudiantes.show',$estudiante->id)}}"  class="btn btn-sm btn-info" title="Ver">
                                        <i class="material-icons">
                                            remove_red_eye
                                        </i>
                                    </a>
                                    <a href="#" onclick="enviarCorreo(event,'{{$estudiante->email}}')" class="btn btn-sm btn-outline-danger m-t-5" title="Enviar Correo Electronico">
                                        <i class="material-icons">
                                            exit_to_app
                                        </i>
                                    </a>
                                    <a href="{{route('estudiantes.edit',$estudiante->id)}}"  class="btn btn-sm btn-warning m-t-5" title="Modificar">
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
