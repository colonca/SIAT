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
                                    <th>Riesgo Súper Bajo</th>
                                    <th>Total General</th>
                                </tr>
                            </thead>
                            <tfoot class="bg-cyan">
                                    <th>Total General</th>
                                    <th>55</th>
                                    <th>731</th>
                                    <th>7340</th>
                                    <th>2427</th>
                                    <th>1867</th>
                                    <th>12420</th>

                            </tfoot>
                            <tbody>
                                <tr>
                                    <td>2016-1</td>
                                    <td>55</td>
                                    <td>731</td>
                                    <td>7340</td>
                                    <td>2427</td>
                                    <td>1867</td>
                                    <td>12420</td>
                                </tr>
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
                <h2>GRÁFICO DE LINEA</h2>
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
                <h2>GRÁFICO DE BARRAS</h2>
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
                                            <th>55</th>
                                            <th>731</th>
                                            <th>7340</th>
                                            <th>2427</th>
                                            <th>1867</th>
                                            <th>12420</th>
        
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>2016-1</td>
                                            <td>55</td>
                                            <td>731</td>
                                            <td>7340</td>
                                            <td>2427</td>
                                            <td>1867</td>
                                            <td>12420</td>
                                        </tr>
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
                        <h2>GRÁFICO DE LINEA</h2>
                    </div>
                    <div class="body">
                        <canvas id="line_chart2" height="150"></canvas>
                    </div>
                </div>
            </div>
        
              <!-- Bar Chart -->
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>GRÁFICO DE BARRAS</h2>
                    </div>
                    <div class="body">
                        <canvas id="bar_chart2" height="150"></canvas>
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

$(function () {
    new Chart(document.getElementById("line_chart").getContext("2d"), getChartJs('line'));
    new Chart(document.getElementById("bar_chart").getContext("2d"), getChartJs('bar'));
    new Chart(document.getElementById("line_chart2").getContext("2d"), getChartJs('line'));
    new Chart(document.getElementById("bar_chart2").getContext("2d"), getChartJs('bar'));
});

function getChartJs(type) {
    var config = null;

    if (type === 'line') {
        config = {
            type: 'line',
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [{
                    label: "My First dataset",
                    data: [65, 59, 80, 81, 56, 55, 40],
                    borderColor: 'rgba(0, 188, 212, 0.75)',
                    backgroundColor: 'rgba(0, 188, 212, 0.3)',
                    pointBorderColor: 'rgba(0, 188, 212, 0)',
                    pointBackgroundColor: 'rgba(0, 188, 212, 0.9)',
                    pointBorderWidth: 1
                }, {
                        label: "My Second dataset",
                        data: [28, 48, 40, 19, 86, 27, 90],
                        borderColor: 'rgba(233, 30, 99, 0.75)',
                        backgroundColor: 'rgba(233, 30, 99, 0.3)',
                        pointBorderColor: 'rgba(233, 30, 99, 0)',
                        pointBackgroundColor: 'rgba(233, 30, 99, 0.9)',
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
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [{
                    label: "My First dataset",
                    data: [65, 59, 80, 81, 56, 55, 40],
                    backgroundColor: 'rgba(0, 188, 212, 0.8)'
                }, {
                        label: "My Second dataset",
                        data: [28, 48, 40, 19, 86, 27, 90],
                        backgroundColor: 'rgba(233, 30, 99, 0.8)'
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
