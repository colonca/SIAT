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

                <div class="row">
                        <form id="form_filtro" method="POST">                               
                            <div class="col-md-4">
                                <b>Periodo Académico</b>
                                    <div class="input-group">
                                        <select name="periodo" class="form-control selectpicker show-tick" multiple data-actions-box="true" data-live-search="true">
                                            <option>2016</option>
                                            <option>2017</option>
                                        </select>                           
                                    </div>            
                            </div>

                            <div class="col-md-6">
                                    <b>Periodo Académico</b>
                                        <div class="input-group">
                                            <select name="i_Diagnostica" class="form-control selectpicker show-tick" multiple data-actions-box="true" data-live-search="true" data-selected-text-format="count > 2">
                                                    <option>Dificultad de Aprendizaje</option>
                                                    <option>Problemas Académicos</option>
                                                    <option>Problemas de Comportamiento y Emocional</option>
                                                    <option>Adicciones</option>
                                                    <option>Violencia</option>
                                                    <option>Problemas de Salud Sexual</option>
                                            </select>                           
                                        </div>            
                                </div>
        
    
                            <div class="col-md-2">
                                <button type="button" class="btn btn-primary m-t-15 waves-effect">Filtrar</button>
                            </div>                                    
                        </form><br>
                    </div>  
    
            </div>
    
        </div>
    </div>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="header">
                <center><p class="font-bold col-teal font-20">TABLA DE INFORMES</p></center>
                <center><p class="font-bold col-teal font-20">Mañana revisamos bien estos reportes porque se me olvidó</p></center>                
            </div>
            <div class="body">               
                    <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover" id="tabla_Informes2">
                                <thead>
                                    <tr class="bg-green">
                                        <th>Periodo</th>
                                        <th>Cantidad Atendidos</th>
                                        <th>Inasistencia</th>
                                        <th>Riesgo Medio</th>
                                        <th>Riesgo Bajo</th>
                                        <th>Riesgo Súper Bajo</th>
                                        <th>Total General</th>
                                    </tr>
                                </thead>
                                <tfoot class="bg-green">
                                        <th class="align-center">Total General</th>
                                        <th class="align-center">55</th>
                                        <th class="align-center">731</th>
                                        <th class="align-center">7340</th>
                                        <th class="align-center">2427</th>
                                        <th class="align-center">1867</th>
                                        <th class="align-center">12420</th>
    
                                </tfoot>
                                <tbody>
                                    <tr>
                                        <td class="align-center">2016-1</td>
                                        <td class="align-center">55</td>
                                        <td class="align-center">731</td>
                                        <td class="align-center">7340</td>
                                        <td class="align-center">2427</td>
                                        <td class="align-center">1867</td>
                                        <td class="align-center">12420</td>
                                    </tr>
                                </tbody>
                            </table>
                    </div>   
            </div>
        </div>
</div>

<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>GRÁFICO CIRCULAR</h2>
            </div>
            <div class="body">
                <canvas id="pie_chart3" height="150"></canvas>
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
                        <canvas id="bar_chart3" height="150"></canvas>
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
    new Chart(document.getElementById("pie_chart3").getContext("2d"), getChartJs('pie'));
    new Chart(document.getElementById("bar_chart3").getContext("2d"), getChartJs('bar'));
});

function getChartJs(type) {
    var config = null;

    if (type === 'pie') {
        config = {
            type: 'pie',
            data: {
                datasets: [{
                    data: [225, 50, 100, 40],
                    backgroundColor: [
                        "rgb(233, 30, 99)",
                        "rgb(255, 193, 7)",
                        "rgb(0, 188, 212)",
                        "rgb(139, 195, 74)"
                    ],
                }],
                labels: [
                    "Pink",
                    "Amber",
                    "Cyan",
                    "Light Green"
                ]
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
                    label: "Conjunto de datos",
                    data: [65, 59, 80, 81, 56, 55, 40],
                    backgroundColor: 'rgba(0, 188, 212, 0.8)'
                }, {
                        label: "My Second dataset",
                        data: [28, 48, 40, 19, 86, 27, 90],
                        backgroundColor: 'rgba(233, 30, 99, 0.8)'
                    }],
            },
            options: {
                responsive: true,
                legend: {
                    diplay:true
                }
            }
        }
    }


    return config;
}


</script>

@endsection