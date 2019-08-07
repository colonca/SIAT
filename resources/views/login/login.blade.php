<!DOCTYPE html>
<html lang="en">
<head>
    <title>SIAT</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{asset('images/icons/favicon.ico')}}"/>
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
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-form-title" style="background-image:url({{asset('images/bg-01.jpg')}});">
                <img src="" alt="">
                <span class="login100-form-title-1">
						<img src="{{asset('images/logo.png')}}" alt="">
					</span>
            </div>

            @if(session()->has('flag'))
              <div class="alert alert-info">
                    {{session('flag')}}
              </div>
            @endif

            <form class="login100-form validate-form" action="{{route('login')}}" method="POST">
                @csrf
                <div class="wrap-input100 validate-input m-b-26 {{$errors->has('cedula') ? 'has-error' : '' }}" data-validate="Usuario requerido">
                    <span class="label-input100">Cedula</span>
                    <input class="input100" type="text" name="cedula" value="{{ old('cedula') }}" placeholder="Ingresa tu Identificación">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-18"  data-validate = "Clave requerida">
                    <span class="label-input100">Clave</span>
                    <input class="input100" type="password" name="password" placeholder="Digite la clave">
                    <span class="focus-input100"></span>
                </div>
                <div class="{{$errors->has('cedula') ? 'alert alert-danger' : '' }}">
                    {!! $errors->first('cedula','<span class="help-block">:message</span>') !!}
                </div>
                <div class="{{$errors->has('password') ? 'alert alert-danger' : '' }}">
                    {!! $errors->first('password','<span class="help-block">:message</span>') !!}
                </div>
                <div class="flex-sb-m w-full p-b-30">
                    <div class="contact100-form-checkbox">
                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                        <label class="label-checkbox100" for="ckb1">
                            Recuerdame
                        </label>
                    </div>

                    <!--<div>
                        <a class="btn btn-link" href="#">
                            Forgot Your Password?
                        </a>
                    </div>-->
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Iniciar Sesión
                    </button>
                </div>
            </form>
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
