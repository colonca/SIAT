@extends('layouts.app')
@section('styles')
<link href="{{asset('css/Graficas/Chart.min.css')}}" rel="stylesheet">
@endsection

@section('content')


<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

    <div class="card">
        <div class="header">
            <h2>
                Usuarios del Sistema
            </h2>
            <small>MENU</small>
        </div>
        <div class="body">
            <div class="alert alert-success">
                <strong>Detalle: </strong>  Escoja una opción la cual le permitirá generar su reporte.</a>
            </div>
            

        </div>
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="card">
        <div class="header">
            <center><p class="font-bold col-teal font-20">UNIVERSIDAD POPULAR DEL CESAR</p></center>
            
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
                <h2>LINE CHART</h2>
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);">Action</a></li>
                            <li><a href="javascript:void(0);">Another action</a></li>
                            <li><a href="javascript:void(0);">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
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
                <h2>BAR CHART</h2>
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);">Action</a></li>
                            <li><a href="javascript:void(0);">Another action</a></li>
                            <li><a href="javascript:void(0);">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="body">
                <canvas id="bar_chart" height="150"></canvas>
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
            'excel', 'pdf', 'print'
        ]
    } );
} );

</script>


<script>

$(function () {
    new Chart(document.getElementById("line_chart").getContext("2d"), getChartJs('line'));
    new Chart(document.getElementById("bar_chart").getContext("2d"), getChartJs('bar'));
    //new Chart(document.getElementById("radar_chart").getContext("2d"), getChartJs('radar'));
    //new Chart(document.getElementById("pie_chart").getContext("2d"), getChartJs('pie'));
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
