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

<body style="background-image: url({{asset('images/fondo_cita_individual.jpg')}});
        background-repeat:no-repeat;
        background-size:cover">

<div class="container">
    <div class="row">
        <div class="col-md-12" style="margin: 10px 0 20px 0;">
            <img src="http://localhost/SIAT/public/images/logo.png" style="margin-top: 20px;">
            <img src="{{asset('images/logoEntidad.png')}}" class = "pull-right" height="125px">
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center">
            <h2>AGENDAMIENTO DE CITAS PARA INTERVENCIÓN INDIVIDUAL</h2>
        </div>

        <div class="col-12 cita">
            <div class="card col-6">
                <div class="body">
                    <form id="sign_in" method="POST" novalidate="novalidate">


                        <P class="font-bold font-underline text-center">DATOS DE IDENTIFICACIÓN</P>

                        <label for="tipi">Tipo de Identificación</label>
                        <select class="form-control" id="tipoID">
                            <option value="">--Escoja una Opción--</option>
                            <option value="CC">Cédula de Ciudadanía</option>
                            <option value="TI">Tarjeta de Identidad</option>
                            <option value="CE">Cédula de Extranjería</option>
                            <option value="RC">Registro Civil</option>
                            <option value="PA">Pasaporte</option>
                        </select><br>

                        <label for="password">Número de Identificación</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="number" name="numID" id="numID" class="form-control" placeholder="Ejemplo: 1065...">
                            </div>
                        </div>

                        <div class="row ">
                            <div class="col-12">
                                <button type="button" class="btn btn-block btn-lg btn-success waves-effect"">
                                <i class="material-icons">home</i>
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

        <div class="col-12 cita">
            <div class="card col-6">
                <div class="body">
                    <form id="sign_in" method="POST" novalidate="novalidate">


                        <P class="font-bold font-underline text-center">DATOS DE IDENTIFICACIÓN</P>

                        <label for="tipi">Tipo de Identificación</label>
                        <select class="form-control" id="tipoID">
                            <option value="">--Escoja una Opción--</option>
                            <option value="CC">Cédula de Ciudadanía</option>
                            <option value="TI">Tarjeta de Identidad</option>
                            <option value="CE">Cédula de Extranjería</option>
                            <option value="RC">Registro Civil</option>
                            <option value="PA">Pasaporte</option>
                        </select><br>

                        <label for="password">Número de Identificación</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="number" name="numID" id="numID" class="form-control" placeholder="Ejemplo: 1065...">
                            </div>
                        </div>

                        <div class="row ">
                            <div class="col-12">
                                <button type="button" class="btn btn-block btn-lg btn-success waves-effect"">
                                <i class="material-icons">home</i>
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

</body>
</html>

