@extends('layouts.app')



@section('content')

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header align-center m-t-15 font-bold">
                <h2>REPORTES INTERVENCIÓN INDIVIDUAL</h2>            
            </div>
            <div class="body">
                <div class="alert alert-warning">
                    <strong>Nota: </strong>  Genere sus reportes de acuerdo a los siguientes filtros.</a>
                </div>

                <div class="row clearfix">
                        <form id="form_filtro" action="{{route('reportes_Generales')}}" method="GET">
                            @csrf
                            <div class="col-md-4">
                                <b>Periodo Académico</b>
                                    <div class="input-group">
                                        <select name="periodo" class="form-control selectpicker show-tick"  data-actions-box="true" data-live-search="true">
                                            <option value="">por favor, elegir para filtrar</option>
                                            @foreach($periodos as $periodo)
                                                <option value="{{$periodo->id}}">{{$periodo->anio.'-'.$periodo->periodo}}</option>
                                            @endforeach
                                        </select>
                                    </div>
            
                                </div>
                            <div class="col-md-4">
                                <b>Tallerista</b>
                                <div class="input-group">
                                    <select name="tallerista" class="form-control selectpicker show-tick"  data-actions-box="true" data-live-search="true">
                                     <option value="">por favor, elegir para filtrar</option>
                                      @foreach($talleristas as $tallerista)
                                        <option value="{{$tallerista->cedula}}">{{$tallerista->primer_nombre.' '.$tallerista->primer_apellido}}</option>
                                      @endforeach
                                    </select>
                                </div>

                            </div>
                            <!--<div class="col-xs-4">
                                <b>Rango</b>
                                <div class="input-daterange input-group" id="bs_datepicker_range_container">
                                    <div class="form-line">
                                        <input type="text" name="fechaInicial" class="form-control" placeholder="Fecha Inicial..." autocomplete="false">
                                    </div>
                                    <span class="input-group-addon">to</span>
                                    <div class="form-line">
                                        <input type="text" name="fechaFinal" class="form-control" placeholder="Fecha Final..." autocomplete="false">
                                    </div>
                                </div>
                            </div>-->
                            <div class="col-md-12 ">
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect pull-right">Filtrar</button>
                            </div>                                    
                        </form><br>
                    </div>
            </div>
    
        </div>
    </div>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="header">
                <center><p class="font-bold col-teal font-20">Intervenciones Individuales</p></center>
            </div>
            <div class="body">               
                    <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover" id="tabla_Informes2">
                                <thead>
                                    <tr class="bg-green">
                                        <th>N° Historia</th>
                                        <th>Tallerista</th>
                                        <th>Nombre del Estudiante</th>
                                        <th>Programa</th>
                                        <th>N° Seguimientos</th>
                                        <th>Estado</th>
                                        <th>Periodo</th>
                                        <th>Fecha</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach($intervenciones as $intervencion)
                                      <tr>
                                          <td class="align-center">{{$intervencion->id}}</td>
                                          <td class="align-center">{{$intervencion->personal->primer_nombre.' '.$intervencion->personal->primer_apellido}}</td>
                                          <td class="align-center">{{$intervencion->estudiante->nombres}}</td>
                                          <td class="align-center">{{$intervencion->estudiante->programa}}</td>
                                          <td class="align-center">{{$intervencion->seguimientos->count()}}</td>
                                          <td class="align-center">
                                              @if($intervencion->seguimientos->count() == 3)
                                                  CONCLUIDO
                                              @else
                                                  SEGUIMIENTO
                                              @endif
                                          </td>
                                          <td class="align-center">{{$intervencion->periodo->anio.'-'.$intervencion->periodo->periodo}}</td>
                                          <td class="align-center">{{strftime('%Y-%m-%d',strtotime($intervencion->created_at))}}</td>
                                      </tr>
                                  @endforeach
                                </tbody>
                            </table>
                    </div>   
            </div>
        </div>
</div>



@endsection


@section('scripts')
<!-- Tablas-->
<script src="{{asset('js/plugins_Tables/buttons.html5.min.js')}}"></script>
<script src="{{asset('js/plugins_Tables/buttons.print.min.js')}}"></script>
<script src="{{asset('js/plugins_Tables/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('js/plugins_Tables/jszip.min.js')}}"></script>
<script src="{{asset('js/plugins_Tables/pdfmake.min.js')}}"></script>
<script src="{{asset('js/plugins_Tables/vfs_fonts.js')}}"></script>
<!--Graficas-->
<script src="{{asset('js/Graficas/Chart.min.js')}}"></script>
<script src="{{asset('js/Graficas/Chart.bundle.min.js')}}"></script>

<script>
//Exportable table
$(document).ready(function() {

    $('#bs_datepicker_range_container').datepicker({
        autoclose: true,
        container: '#bs_datepicker_range_container'
    });

    $('#tabla_Informes').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            {
                extend:     'excelHtml5',
                text:       '<i class="material-icons">file_copy</i>',
                titleAttr:  'Exportar a Excel',
                className:  'btn btn-success waves-effect'

            },
            {
                extend:     'pdfHtml5',
                text:       '<i class="material-icons">picture_as_pdf</i>',
                titleAttr:  'Exportar a PDF',
                className:  'btn btn-danger waves-effect'

            },
            {
                extend:     'print',
                text:       '<i class="material-icons">print</i>',
                titleAttr:  'Imprimir',
                className:  'btn btn-info waves-effect'

            },
        ]
    } );
} );

$(document).ready(function() {
    $('#tabla_Informes2').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            {
                extend:     'excelHtml5',
                text:       '<i class="material-icons">file_copy</i>',
                titleAttr:  'Exportar a Excel',
                className:  'btn btn-success waves-effect'

            },
            {
                extend:     'pdfHtml5',
                text:       '<i class="material-icons">picture_as_pdf</i>',
                titleAttr:  'Exportar a PDF',
                className:  'btn btn-danger waves-effect'

            },
            {
                extend:     'print',
                text:       '<i class="material-icons">print</i>',
                titleAttr:  'Imprimir',
                className:  'btn btn-info waves-effect'

            },
        ]
    } );
} );

</script>


@endsection