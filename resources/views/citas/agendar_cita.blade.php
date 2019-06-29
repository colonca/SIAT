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

        <div class="col-12 cita" id="form1">
            <div class="card col-6">
                <div class="body">
                    <form id="sign_in" method="POST" action="{{route('loginEstudiante')}}">
                        {{csrf_field()}}
                        <P class="font-bold font-underline text-center font-20">Inicio de Session</P>
                        <label for="password"><b>Número de Identificación</b></label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="number" name="usuario" value="{{old('usuario')}}" id="numID" class="form-control" placeholder="Identificacion" required>
                            </div>
                        </div>
                        <label for="password"><b>Contraseña</b></label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="password" name="contraseña" id="password"  class="form-control" placeholder="Contraseña" required>
                            </div>
                        </div>
                        <div class="{{session()->has('error') ? 'alert alert-danger' : '' }}">
                            <span class="help-block">{{session('error')}}</span>
                        </div>
                        <div class="row ">
                            <div class="col-12">
                                <button type="submit" class="btn btn-block btn-lg btn-info waves-effect">
                                <i class="material-icons">rate_review</i>
                                <span>Ingresar</span>
                                </button>
                            </div>
                        </div><br>
                    </form>
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

<script src="{{asset('js/axios.min.js')}}"></script>
<script src="{{asset('js/notify.min.js')}}"></script>

<!--Calendario-->
<script>
    $(document).ready(function(){
        moment.locale("es");
        $('.datetimepicker').datepicker({
            autoclose: true,
            dateFormat: 'yyyy/mm/dd'
        });
    });


</script>


</body>
</html>