@extends('layouts.app')

@section('content')

<div class="box-header with-border" style="background-color: rgb(23, 128, 62)">
        <ol class="breadcrumb">
            <li><a href="{{route('dashboard_psicologo')}}" style="color: white;">
                    <i class="material-icons">home</i> inicio
                </a>
            </li>
            <li>
                <a href="" style="color: white;">
                    <i class="material-icons">perm_identity</i> Intervenciones
                </a>
            </li>

        </ol>
    </div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="header container">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <h2>Listado de intervenciones individuales</h2>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
              <a href="{{route('intervenciones_individuales.create')}}" class="btn btn-success pull-right"><i class="material-icons">fiber_new</i><span>Nueva Historia Psicológica</span></a>
            </div>

        </div>

        <div class="body">

                <div class="body table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="intervenciones">
                            <thead>
                                <tr>
                                    <th class="font-bold col-teal"><center>NO. DE HISTORIA</center></th>
                                    <th class="font-bold col-teal">FECHA</th>
                                    <th class="font-bold col-teal"><center>NOMBRE DEL ESTUDIANTE</center></th>
                                    <th class="font-bold col-teal"><center>NO. SEGUIMINETOS</center></th>
                                    <th class="font-bold col-teal"><center>ESTADO</center></th>
                                    <th class="font-bold col-teal"><center>ACCIÓN</center></th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach($intervenciones as $intervencion)
                                <tr>
                                    <td scope="row">{{$intervencion->id}}</td>
                                    <th>{{$intervencion->created_at}}</th>
                                    <td>{{$intervencion->estudiante->nombres}}</td>
                                    <td>{{$intervencion->seguimientos->count()}}</td>
                                    <td>
                                        @if($intervencion->seguimientos->count() == 3)
                                            CONCLUIDO
                                        @else
                                            SEGUIMIENTO
                                        @endif
                                    </td>
                                    <td><center><button type="button" class="btn bg-green waves-effect" title="Nuevo Seguimiento"  onclick="mostrarModal('{{$intervencion->id}}')">
                                                <i class="material-icons">
                                                    fiber_new
                                                </i>
                                        </button>
                                        <a type="button" href="{{route('pdf_intervencion_individual',$intervencion->id)}}" class="btn bg-deep-orange waves-effect" title="Imprimir hisotria psicologica">
                                                <i class="material-icons">print</i>
                                        </a>
                                    </center></td>
                                </tr>
                               @endforeach
                            </tbody>
                        </table>
                </div>                
        </div>
        

    </div>


</div>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Nuevo Seguimiento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="header">
                        <h2 class="pull-right" id="fecha-seguimiento"></h2>
                    </div>
                    <div class="body">
                        <form action="">
                            <h2 class="card-inside-title">Descripción</h2>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                             <input type="hidden" name="intervencion" id="intervencion">
                                            <textarea rows="4" class="form-control no-resize" name="descripcion"  id="descripcion" placeholder="Escribe aqui..." required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary" onclick="guardarSeguimineto(event)">Guardar Cambios</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {

        let now =new Date();
        let mes = now.getMonth().toString().length < 2 ? '0'+(now.getMonth()+1) : (now.getMonth()+1);
        let dia = now.getDate().toString().length < 2 ? '0'+now.getDate() : now.getDate();
        $('#fecha-seguimiento').text(now.getFullYear()+'-'+mes+'-'+dia);

  $('#intervenciones').DataTable({
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
    }
  });
});

    function mostrarModal(id) {
       $('#intervencion').val(id);
       $('#exampleModalCenter').modal('show');
    }

    function guardarSeguimineto(event){
       event.preventDefault();
       const fecha = $('#fecha-seguimiento').text();
       const descripcion = $('#descripcion').val();
       const intervencion_id = $('#intervencion').val();

       if(descripcion == ''){

           $.notify('debe rellenar los campos');

       }else{

           axios.post('{{url('/seguimientos')}}',{
               'fecha' : fecha,
               'descripcion':descripcion,
               'intervencion_id': intervencion_id
           }).then(response => {
             let data  = response.data;
             if(data.status == 'error'){
                 $.notify(data.message);
             }else{
                 $('#exampleModalCenter').modal('hide');
                 $.notify('seguimiento registrado correctamente','success');
                 setTimeout(function () {
                      window.location.reload();
                 },3000);
             }
           });

       }

    }

</script>
 

@endsection





