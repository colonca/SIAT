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
                        <form id="form_filtro" method="GET">
                            <div class="col-md-4">
                                <b>Periodo Académico</b>
                                    <div class="input-group">
                                        <select name="periodo" id="periodo" class="form-control selectpicker show-tick"  data-actions-box="true" data-live-search="true">
                                            <option value="">por favor, elejir un periodo para filtrar</option>
                                            @foreach($periodos as $periodo)
                                                <option value="{{$periodo->id}}">{{$periodo->anio.' '.$periodo->periodo}}</option>
                                            @endforeach
                                        </select>                           
                                    </div>            
                            </div>
                            <div class="col-md-6">
                                    <b>Programam</b>
                                        <div class="input-group">
                                            <select name="programa" id="programa" class="form-control selectpicker show-tick"  data-actions-box="true" data-live-search="true" data-selected-text-format="count > 2">
                                                   <option value="">por favor, elejir un programa para filtrar</option>
                                                    @foreach($programas as $programa)
                                                    <option value="{{$programa->programa}}">{{$programa->programa}}</option>
                                                    @endforeach
                                            </select>                           
                                        </div>            
                                </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect" onclick="filtrar(event)">Filtrar</button>
                            </div>                                    
                        </form><br>
                    </div>
            </div>
    
        </div>
    </div>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="header">
                <center><p class="font-bold col-teal font-20">Impresiones Diagnosticas</p></center>
            </div>
            <div class="body">               
                    <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover" id="tabla_Informes2">
                                <thead>
                                    <tr class="bg-green">
                                        <th><center>#</center></th>
                                        <th><center>Impresion Diagnostica</center></th>
                                        <th><center>Cantidad</center></th>
                                    </tr>
                                </thead>
                                <tbody id="tabla">
                                <?php $i =1?>
                                @foreach($impresionesDiagnosticas as $impresion)
                                    <tr>
                                        <td class="align-center">{{$i}}</td>
                                        <td class="align-justify">{{$impresion->descripcion}}</td>
                                        <td class="align-center">{{$impresion->intervenciones->count()}}</td>
                                    </tr>
                                    <?php $i++?>
                                @endforeach
                                </tbody>
                            </table>
                    </div>   
            </div>
        </div>
</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="marcopie1" style="display: none;">
        <div class="card">
            <div class="header">
                <h2>GRÁFICO CIRCULAR</h2>
            </div>
            <div class="body">
                <canvas id="pie_chart3" height="150"></canvas>
            </div>
        </div>
</div>


<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="display: none;" id="marcopie2">
    <div class="card">
        <div class="header">
            <h2>GRÁFICO CIRCULAR</h2>
        </div>
        <div class="body">
            <canvas id="pie_chart2" height="150"></canvas>
        </div>
    </div>
</div>
<!-- Bar Chart -->

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

function filtrar(event) {
  event.preventDefault();
  if($('#programa').val() !== '' || $('#periodo').val() !== ''){
      let url = '{{url('reportes/Impresiones')}}'+'/'+$('#programa').val()+'/'+$('#periodo').val();
      axios.get(url).then(response=>{
          let datos = response.data;
          if(datos.status == 'ok'){
              let array =  datos.datos;
              let table =  document.getElementById('tabla');
              let html = '';
              let i =1;
              array.forEach(x=>{
                  html += `<tr>
                 <td class="align-center">${i}</td>
                 <td class="align-justify">${x.impresion}</td>
                 <td class="align-center">${x.cantidad}</td>
                 </tr>`;
                  i++;
              });
              table.innerHTML = html;

              document.getElementById("marcopie2").style.display = 'block';
              document.getElementById("marcopie1").style.display = 'none';
              new Chart(document.getElementById("pie_chart2").getContext("2d"), getChart('pie',datos));
          }

      });
  }else{
    $.notify('Debe rellenar los campos para filtrar');
  }
}

</script>


<script>

$(function () {
    new Chart(document.getElementById("pie_chart3").getContext("2d"), getChartJs('pie'));
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
                    display: true
                }
            }
        }
    }


    return config;
}
function getChart(type,datos) {
    var config = null;

    if (type === 'pie') {
        config = {
            type: 'pie',
            data: {
                datasets: [{
                    data: datos.grafica,
                    backgroundColor: [
                        "rgb(233, 30, 99)",
                        "rgb(255, 193, 7)",
                        "rgb(0, 188, 212)",
                        "rgb(139, 195, 74)",
                        "rgb(233, 30, 99)",
                        "rgb(255, 193, 7)",
                        "rgb(0, 188, 212)",
                        "rgb(139, 195, 74)",
                        "rgb(233, 30, 99)",
                        "rgb(255, 193, 7)",
                        "rgb(0, 188, 212)",
                        "rgb(139, 195, 74)"
                    ],
                }],
                labels: datos.title
            },
            options: {
                responsive: true,
                legend: {
                    display:true
                }
            }
        }
    }
    else if (type === 'bar') {
        config = {
            type: 'bar',
            data: {
                labels: datos.title,
                datasets: [{
                    label: "Impresion Diagnostica",
                    data: datos.grafica,
                    backgroundColor: 'rgba(0, 188, 212, 0.8)'
                }]
            },
            options: {
                responsive: true,
                legend: {
                    display: true
                }
            }
        }
    }


    return config;
}
</script>

@endsection