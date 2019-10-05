@if(session()->has('estudiante'))
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/logo-upc.png')}}">
    <title>{{ config('app.name', 'PEBI') }}</title>

    <!-- Favicon-->
    <link rel="icon" href="{{asset('images/logo-upc.png')}}" type="">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">



    <!-- Bootstrap Core Css -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <link href="{{asset("css/bootstrap-select.min.css")}}" rel="stylesheet">


    <!-- Waves Effect Css -->
    <link href="{{asset('css/waves.min.css')}}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{asset("css/animate.min.css")}}" rel="stylesheet" />

    <link href="{{asset("css/bootstrap-material-datetimepicker.css")}}" rel="stylesheet" />
    <link href="{{asset("css/bootstrap-datepicker/css/bootstrap-datepicker.css")}}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{asset("css/style.min.css")}}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{asset('css/all-themes.min.css')}}" rel="stylesheet" />

    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap.min.css')}}">


    @yield('styles')
</head>

<body class="theme-red">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
            <div class="spinner-layer pl-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>Please wait...</p>
    </div>
</div>
<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
<!-- Search Bar -->
<div class="search-bar">
    <div class="search-icon">
        <i class="material-icons">search</i>
    </div>
    <input type="text" placeholder="START TYPING...">
    <div class="close-search">
        <i class="material-icons">close</i>
    </div>
</div>
<!-- #END# Search Bar -->
<!-- Top Bar -->
<nav class="navbar" style="background-color:rgb(23, 128, 62);">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <img src="{{asset('images/logo.png')}}" alt="" height="50px">
        </div>
    </div>
</nav>
<!-- #Top Bar -->
<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="{{asset('images/user.png')}}" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ session('estudiante')->nombres}}</div>
                <div class="email">{{session('estudiante')->email}}</div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">Navegacion Principal</li>
                    <li onclick="">
                        <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                            <i class="material-icons">contacts</i>
                            <span>Citas</span>
                        </a>
                        <ul class="ml-menu" style="display: none;">
                            <li>
                                <a href="{{route('agendar')}}">
                                    <i class="material-icons" style="margin-top: -2px">calendar_today</i>
                                    <span>Apartar Cita</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('citas')}}">
                                    <i class="material-icons" style="margin-top: -2px">content_paste</i>
                                    <span>Historial de Citas</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                <li>
                    <a href="{{route('estudianteContraseña')}}">
                        <i class="material-icons">lock</i>
                        <span>Cambiar Contraseña</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('logoutStudent')}}">
                        <i class="material-icons">power_settings_new</i>
                        <span>Cerrar Sessión</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; 2019 - 2020 <a href="javascript:void(0);">PEBI- CAMILO COLON</a>.
            </div>
            <div class="version">
                <b>Version: </b> 1.0.0
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
    <!-- #END# Right Sidebar -->
</section>

<section class="content">
    @yield('content')
</section>

<script async="" src="https://www.google-analytics.com/analytics.js"></script>
<!-- Jquery Core Js -->
<script src="{{asset('js/jquery.min.js')}}"></script>

<!-- Bootstrap Core Js -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>

<!-- Select Plugin Js -->
<!--<script src="{{asset('js/bootstrap-select.min.js')}}"></script>-->

<script src="{{asset('js/bootstrap-select.min.js')}}"></script>

<!-- Slimscroll Plugin Js -->
<script src="{{asset('js/jquery.slimscroll.js')}}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{asset('js/waves.min.js')}}"></script>

<script src="{{asset('js/moment.js')}}"></script>
<script src="{{asset('js/bootstrap-material-datetimepicker.js')}}"></script>
<script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>


<!-- Custom Js -->
<script src="{{asset('js/admin.js')}}"></script>

<!-- Demo Js -->
<script src="{{asset('js/demo.js')}}"></script>

<script src="{{asset('js/axios.min.js')}}"></script>

<script src="{{asset('js/notifications.js')}}"></script>

<script src="{{asset('js/jquery.dataTables.js')}}"></script>

<script src="{{asset('js/notify.min.js')}}"></script>


@yield('scripts')

</body>

</html>
@else
    <?php header('location',route('loginEstudiante'));?>
@endif

