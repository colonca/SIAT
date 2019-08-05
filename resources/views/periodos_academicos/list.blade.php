@extends('layouts.app')
@section('content')

    <div class="box-header with-border" style="background-color: rgb(23, 128, 62)">
        <ol class="breadcrumb">
            <li>
                <a href="{{route('dashboard')}}" style="color: white;">
                    <i class="material-icons">home</i> Inicio
                </a>
            </li>
            <li>
                <a href="" style="color: white;">
                    <i class="material-icons">perm_identity</i>Periodos Academicos
                </a>
            </li>
        </ol>
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h3>Detalles
                    <button type="button" class="close pull-right" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                </h3>
                <p>Contiene la información de los períodos académicos de la institución.</p>
            </div>
        </div>
    </div>

<div class="col-md-12 top-20 padding-0">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <h3>Listado de Períodos Académicos  <a href="{{ route('periodoa.create') }}" class="btn btn-3d btn-primary"><span> Agregar Nuevo Período</span></a></h3>
            </div>
            <div class="panel-body">
                <div class="responsive-table">
                    <table id="tabla" class="table table-hover table-responsive table-bordered table-condensed" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Fecha Inicio</th>
                                <th>Fecha Fin</th>
                                <th>Año</th>
                                <th>Período</th>
                                <th>Inicio Clases</th>
                                <th>Fin Clases</th>
                                <th>Creado</th>
                                <th>Modificado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($periodos as $p)
                            <tr>
                                <td><label class="label label-success">{{$p->fechainicio}}</label></td>
                                <td><label class="label label-danger">{{$p->fechafin}}</label></td>
                                <td>{{$p->anio}}</td>
                                <td>{{$p->periodo}}</td>
                                <td>{{$p->fechainicioclases}}</td>
                                <td>{{$p->fechafinclases}}</td>
                                <td>{{$p->created_at}}</td>
                                <td>{{$p->updated_at}}</td>
                                <td>
                                    <a href="{{ route('periodoa.edit',$p->id)}}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Editar Período"><i class="material-icons">update</i></a>
                                    <button class="btn btn-danger" onclick="eliminar(event,{{$p->id}})"><i class="material-icons">delete</i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>  
</div>
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#tabla').DataTable();
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
                let url = 'periodoa/delete/'+id;
                axios.delete(url).then(result => {
                    Swal.fire(
                        'Eliminado!',
                        'periodo eliminado correctamente.',
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