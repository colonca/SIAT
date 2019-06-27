<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cita Individual SIAT</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{asset('images/icons/agenda.png')}}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/animate/animate.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/animsition/css/animsition.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/daterangepicker/daterangepicker.css')}}">
    <link href="{{asset("css/bootstrap-material-datetimepicker.css")}}" rel="stylesheet" />
    <link href="{{asset("css/bootstrap-datepicker/css/bootstrap-datepicker.css")}}" rel="stylesheet" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.min.css')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!--===============================================================================================-->
    <style>
        .cita {
            margin-top: 50px;
            display: flex;
            justify-content: center;
            align-content: center;
        }
    </style>

</head>

<body style="background-image: url({{asset('images/fondo2.jpg')}});

        background-size:cover">

<div class="container">
    <div class="row">
        <div class="col-md-12" style="margin: 10px 0 20px 0;">
            <img src="{{asset('images/users/logo.png')}}" style="margin-top: 20px;">
            <img src="{{asset('images/logoEntidad.png')}}" class = "pull-right" height="125px">
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center">
            <h2>AGENDAMIENTO DE CITAS PARA INTERVENCIÓN INDIVIDUAL</h2>
        </div>

        <div class="col-12 cita" id="form1">
            <div class="card col-6">
                <div class="body">
                    <form id="sign_in" method="POST" novalidate="novalidate">
                        <P class="font-bold font-underline text-center font-20">DATOS DE IDENTIFICACIÓN</P>
                        <label for="password"><b>Número de Identificación</b></label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="number" name="numID" id="numID" class="form-control" placeholder="Ejemplo: 1065...">
                            </div>
                        </div>

                        <div class="row ">
                            <div class="col-12">
                                <button type="button" onclick="btnAgendar()" class="btn btn-block btn-lg btn-success waves-effect">

                                <i class="material-icons">rate_review</i>
                                <span>Agendar Cita</span>
                                </button>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-12">
                                <button type="button" class="btn btn-block btn-lg btn-info waves-effect"">
                                <i class="material-icons">search</i>
                                <span>Consultar Cita</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="form2" class="col-12 cita" style="display:none">
            <div class="card col-9" >
                <div class="body">
                    <form id="formulario" action="cita_Individual">
                        <P class="font-bold font-underline text-center font-20">DATOS DEL ESTUDIANTE</P><br>
                        <div class="row">
                            <div class="col-md-5">
                                <b>Numero de Identificación</b>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">verified_user</i>
                                                </span>
                                    <input type="number" name="numID" id="numID" class="form-control" placeholder="Ejemplo: 1065...">
                                </div>
                            </div>

                            <div class="col-md-7">
                                <b>Apellidos y Hombres</b>
                                <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">person</i>
                                            </span>
                                    <input type="text" name="nombres" id="nombres" class="form-control" placeholder="Ejemplo: Juan">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <b>Programa</b>
                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">credit_card</i>
                                                    </span>
                                    <input type="text" name="programa" id="programa" class="form-control" placeholder="Ejemplo: Sistemas">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <b>Semestre</b>
                                <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">sort</i>
                                                </span>
                                    <input type="number" name="semestre" id="semestre" class="form-control" placeholder="Ejemplo: 3">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <b>Promedio Acumulado</b>
                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">trending_up</i>
                                                    </span>
                                    <input type="text" name="promedio" id="promedio" class="form-control" placeholder="Ejemplo: 3.4">
                            </div>
                            
                            <div class="row">
                                    <div class="col-md-4">
                                        <b>Programa</b>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">credit_card</i>
                                                    </span>                                                        
                                                    <input type="text" name="programa" id="programa" class="form-control" placeholder="Ejemplo: Sistemas">                                               
                                                </div>                                        
                                    </div>
    
                                    <div class="col-md-4">
                                        <b>Semestre</b>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">sort</i>
                                                </span>                                                        
                                                <input type="number" name="semestre" id="semestre" class="form-control" placeholder="Ejemplo: 3">                                               
                                            </div>                                        
                                    </div>


                        <div class="row">
                            <div class="col-md-12">
                                <b>MOTIVO DE SOLICITUD DE ATENCION: (Describa brevemente porque efectúa la solicitud) </b>
                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">text_format</i>
                                                    </span>
                                    <input type="text" name="motivo" id="motivo" class="form-control" placeholder="Escriba aquí...">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <b>Escoja una fecha</b>
                                <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">date_range</i>
                                        </span>
                                    <input type="text" onchange="buscarDisponibilidad(event)" name="fecha" class="datetimepicker form-control" placeholder="Por favor escoja una fecha..." data-dtp="dtp_l0wTT">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-6">
                                <button type="button" onclick="prueba()" class="btn btn-success float-right">
                                    <i class="material-icons">check_box</i>
                                    <span>AGENDAR</span>
                                </button>

                            </div>
                            <div class="col-6">
                                <button type="reset" onclick="btnRegresar()" class="btn bg-red waves-effect">
                                    <i class="material-icons">cancel</i>
                                    <span>CANCELAR</span>
                                </button>

                            </div>
                        </div>

                    </form>


                </div>

            </div>
        </div>


    </div>



    </div>


</div>

</div>

 

<!--===============================================================================================-->
<script src="{{asset('vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('vendor/bootstrap/js/popper.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('vendor/daterangepicker/moment.min.js')}}"></script>
<script src="{{asset('vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('js/main.js')}}"></script>

<script src="{{asset('js/bootstrap-material-datetimepicker.js')}}"></script>
<script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>

=======
<script src="{{asset('js/axios.min.js')}}"></script>
<script src="{{asset('js/notify.min.js')}}"></script>

<!--Calendario-->
<script>
    $(document).ready(function(){
        moment.locale("es");
        $('.datetimepicker').bootstrapMaterialDatePicker({
            format: 'dddd DD MMMM YYYY',
            clearButton: false,
            lang : 'es',
            weekStart: 1,
            time: false,
        });
    });

    function btnAgendar(){

        let url = location.pathname;
        url = 'cita/estudiante/'+$('#numID').val();
        axios.get(url).then(response => {
            let data = response.data;
            if(data == null){
                  $.notify('Error\n' +
                      'No se encuentran registros con esta identificación');
            }else{

                $('#form2 #numID').val(data.cedula);
                $('#nombres').val(data.nombres);
                $('#programa').val(data.programa);
                $('#promedio').val(data.promedio_general);
                $('#semestre').val(data.periodo_cronologico);


                form1 = document.getElementById('form1');
                form1.style.display = 'none';
                form2 = document.getElementById('form2');
                form2.style.display = 'flex';

            }
        });

    }

    function btnRegresar(){
        form2 = document.getElementById('form2');
        form2.style.display = 'none';
        form1 = document.getElementById('form1');
        form1.style.display = 'flex';
    }
    
    function prueba() {
        console.log('xxx00');
        console.log($('#formulario').serialize());
    }

    function buscarDisponibilidad(event){
          let dayweek  = [''];
          console.log(event.target.value.split(' ')[0]);
    }
</script>


</body>
</html>