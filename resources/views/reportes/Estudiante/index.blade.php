@extends('layouts.app')
@section('styles')
<link href="{{asset('css/Graficas/Chart.min.css')}}" rel="stylesheet">
@endsection

@section('content')

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="card">
        <div class="header">
            <center><p class="font-bold col-teal font-20">ESTUDIANTES CLASIFICADOS POR NIVEL DE RIESGO VS PERIODOS ACADÉMICOS</p></center>
            
        </div>
        <div class="body">
                <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover" id="tabla_Informes">
                            <thead>
                                <tr class="bg-green">
                                    <th>Periodo</th>
                                    <th>Riesgo Súper Alto</th>
                                    <th>Riesgo Alto</th>
                                    <th>Riesgo Medio</th>
                                    <th>Riesgo Bajo</th>
                                    <th>Riesgo Super Bajo</th>
                                    <th>Total General</th>
                                </tr>
                            </thead>
                            <tfoot class="bg-cyan">
                            <th>Total General</th>
                            <th>{{$totales[0]}}</th>
                            <th>{{$totales[1]}}</th>
                            <th>{{$totales[2]}}</th>
                            <th>{{$totales[3]}}</th>
                            <th>{{$totales[4]}}</th>
                            <th>{{$totales[0]+$totales[1]+$totales[2]+$totales[3]+$totales[4]}}</th>
                            </tfoot>
                            <tbody>
                              @foreach($datos as $dato)
                                  <tr>
                                      <td>{{$dato['periodo']}}</td>
                                      <td>{{$dato['Riesgo super alto']}}</td>
                                      <td>{{$dato['Alto']}}</td>
                                      <td>{{$dato['Riesgo Medio']}}</td>
                                      <td>{{$dato['Riesgo Bajo']}}</td>
                                      <td>{{$dato['Riesgo super Bajo']}}</td>
                                      <td>{{$dato['Riesgo super alto']+$dato['Alto']+$dato['Riesgo Medio']+$dato['Riesgo Bajo']+$dato['Riesgo super Bajo']}}</td>
                                  </tr>
                              @endforeach
                            </tbody>
                        </table>
                </div>   
        </div>
    </div>
</div>

    <!-- Line Chart -->
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2><center>ESTUDIANTES CLASIFICADOS POR NIVEL DE RIESGO-LINEA</center></h2>
            </div>
            <div class="body">
                <canvas id="line_chart" height="150"></canvas>
            </div>
        </div>
    </div>

      <!-- Bar Chart -->
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2><center>ESTUDIANTES CLASIFICADOS POR NIVEL DE RIESGO-BARRAS</center></h2>
            </div>
            <div class="body">
                <canvas id="bar_chart" height="150"></canvas>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="header">
                    <center><p class="font-bold col-teal font-20">ESTUDIANTES CLASIFICADOS POR NIVEL DE RIESGO VS PROGRAMAS ACADÉMICOS</p></center>
                    
                </div>
                <div class="body">
                    <div class="row">
                        <form id="form_filtro" method="POST">                               
                            <div class="col-md-8">
                                <b>Periodo Académico</b>
                                    <div class="input-group">
                                        <select name="periodo" class="form-control show-tick">
                                            <option>Todos</option>
                                            <option>2016</option>
                                            <option>2017</option>
                                        </select>                           
                                    </div>
            
                                </div>

                            <div class="col-md-4">
                                <button type="button" class="btn btn-primary m-t-15 waves-effect">Filtrar</button>
                            </div>                                    
                        </form><br>
                    </div>                  
                        
                        <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover" id="tabla_Informes2">
                                    <thead>
                                        <tr class="bg-green">
                                            <th>Programa</th>
                                            <th>Riesgo Súper Alto</th>
                                            <th>Riesgo Alto</th>
                                            <th>Riesgo Medio</th>
                                            <th>Riesgo Bajo</th>
                                            <th>Riesgo Súper Bajo</th>
                                            <th>Total General</th>
                                        </tr>
                                    </thead>
                                    <tfoot class="bg-cyan">
                                    <th>Total General</th>
                                    <th>{{$totales[0]}}</th>
                                    <th>{{$totales[1]}}</th>
                                    <th>{{$totales[2]}}</th>
                                    <th>{{$totales[3]}}</th>
                                    <th>{{$totales[4]}}</th>
                                    <th>{{$totales[0]+$totales[1]+$totales[2]+$totales[3]+$totales[4]}}</th>
                                    </tfoot>
                                    <tbody>
                                    @foreach($datosPrograma as $dato)
                                        <tr>
                                            <td>{{$dato['programa']}}</td>
                                            <td>{{$dato['Riesgo super alto']}}</td>
                                            <td>{{$dato['Alto']}}</td>
                                            <td>{{$dato['Riesgo Medio']}}</td>
                                            <td>{{$dato['Riesgo Bajo']}}</td>
                                            <td>{{$dato['Riesgo super Bajo']}}</td>
                                            <td>{{$dato['Riesgo super alto']+$dato['Alto']+$dato['Riesgo Medio']+$dato['Riesgo Bajo']+$dato['Riesgo super Bajo']}}</td>
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


<script>
var periodo;
$(function () {

    axios.get('{{url('reportes/Periodos')}}')
        .then(response => {
            datos = response.data;
            new Chart(document.getElementById("line_chart").getContext("2d"), getChartJs('line',datos));
            new Chart(document.getElementById("bar_chart").getContext("2d"), getChartJs('bar',datos));
        });
});

function getChartJs(type,datos) {
    var config = null;

    if (type === 'line') {
        config = {
            type: 'line',
            data: {
                labels: datos.periodos,
                datasets: [{
                    label: "Riesgo Super Alto",
                    data: datos.riesgoSuperAlto,
                    borderColor: 'rgba(68, 114, 196, 0.75)',
                    backgroundColor: 'rgba(68, 114, 196, 0.3)',
                    pointBorderColor: 'rgba(68, 114, 196, 0)',
                    pointBackgroundColor: 'rgba(68, 114, 196, 0.9)',
                    pointBorderWidth: 1
                }, {
                        label: "Riesgo Alto",
                        data: datos.riesgoAlto,
                        borderColor: 'rgba(237, 125, 49, 0.75)',
                        backgroundColor: 'rgba(237, 125, 49, 0.3)',
                        pointBorderColor: 'rgba(237, 125, 49, 0)',
                        pointBackgroundColor: 'rgba(237, 125, 49, 0.9)',
                        pointBorderWidth: 1
                    },{
                    label: "Riesgo Medio",
                    data: datos.riesgoMedio,
                    borderColor: 'rgba(165, 165, 165, 0.75)',
                    backgroundColor: 'rgba(165, 165, 165, 0.3)',
                    pointBorderColor: 'rgba(165, 165, 165, 0)',
                    pointBackgroundColor: 'rgba(165, 165, 165, 0.9)',
                    pointBorderWidth: 1
                },{
                    label: "Riesgo Bajo",
                    data: datos.riegoBajo,
                    borderColor: 'rgba(255, 192, 0, 0.75)',
                    backgroundColor: 'rgba(255, 192, 0, 0.3)',
                    pointBorderColor: 'rgba(255, 192, 0, 0)',
                    pointBackgroundColor: 'rgba(255, 192, 0, 0.9)',
                    pointBorderWidth: 1
                },{
                    label: "Riesgo Super Bajo",
                    data: datos.riesgoSuperBajo,
                    borderColor: 'rgba(68, 114, 196, 0.75)',
                    backgroundColor: 'rgba(68, 114, 196, 0.3)',
                    pointBorderColor: 'rgba(68, 114, 196, 0)',
                    pointBackgroundColor: 'rgba(68, 114, 196, 0.9)',
                    pointBorderWidth: 1
                }]
            },
            options: {
                responsive: true,
                legend: false
            }
        }
    }
    else if (type === 'bar') {
        config = {
            type: 'bar',
            data: {
                labels: datos.periodos,
                datasets: [{
                    label: "Riesgo Super Alto",
                    data:datos.riesgoSuperAlto,
                    backgroundColor: 'rgba(68, 114, 196, 0.8)'
                }, {
                        label: "Riesgo Alto",
                        data: datos.riesgoAlto,
                        backgroundColor: 'rgba(237, 125, 49, 0.8)'
                    },{

                        label: "Riesgo Medio",
                        data: datos.riesgoMedio,
                        backgroundColor: 'rgba(165, 165, 165, 0.8)'
                },{
                    label: "Riesgo Bajo",
                    data: datos.riegoBajo,
                    backgroundColor: 'rgba(255, 192, 0, 0.8)'
                },{
                    label: "Riesgo Super Bajo",
                    data: datos.riesgoSuperBajo,
                    backgroundColor: 'rgba(68, 114, 196, 0.8)'
                }]
            },
            options: {
                responsive: true,
                legend: false
            }
        }
    }


    return config;
}


</script>

@endsection
