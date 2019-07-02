@extends('layouts.app')

@section('content')


<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="header container">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <h2>Listado de intervenciones</h2>
            </div>
            
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <a href="{{route('intervenciones_individuales.create')}}" class="btn btn-success pull-right">Agregar Nueva Intervención</a>
            </div>

        </div>

        <div class="body">

                <div class="body table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="intervenciones">
                            <thead>
                                <tr>
                                    <th class="font-bold col-teal">#</th>
                                    <th class="font-bold col-teal"><center>NOMBRE DEL ESTUDIANTE</center></th>
                                    <th class="font-bold col-teal"><center>NO. DE HISTORIA</center></th>
                                    <th class="font-bold col-teal"><center>NO. CITAS</center></th>
                                    <th class="font-bold col-teal"><center>ESTADO</center></th>
                                    <th class="font-bold col-teal"><center>ACCIÓN</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Daniel Enrique Barros Agamez</td>
                                    <td>100</td>
                                    <td>3</td>
                                    <td>Concluido</td>
                                    <td><center><button type="button" class="btn bg-green waves-effect" title="Ver hisotria psicologica">
                                            <i class="material-icons">pageview</i>                                            
                                        </button>
                                        <button type="button" class="btn bg-deep-orange waves-effect" title="Imprimir hisotria psicologica">
                                                <i class="material-icons">print</i>
                                                
                                            </button>
                                    </center></td>
                                </tr>

                            </tbody>
                        </table>
                </div>                
        </div>
        

    </div>


</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
  $('#intervenciones').DataTable({
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
    }
  });
});
</script>
 

@endsection





