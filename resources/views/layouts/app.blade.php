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
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <!-- Call Search -->
                <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                <!-- #END# Call Search -->
                <!-- Notifications -->
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                        <i class="material-icons">notifications</i>
                        <span class="label-count">7</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">NOTIFICATIONS</li>
                        <li class="body">
                            <ul class="menu">
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="icon-circle bg-light-green">
                                            <i class="material-icons">person_add</i>
                                        </div>
                                        <div class="menu-info">
                                            <h4>12 new members joined</h4>
                                            <p>
                                                <i class="material-icons">access_time</i> 14 mins ago
                                            </p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="icon-circle bg-cyan">
                                            <i class="material-icons">add_shopping_cart</i>
                                        </div>
                                        <div class="menu-info">
                                            <h4>4 sales made</h4>
                                            <p>
                                                <i class="material-icons">access_time</i> 22 mins ago
                                            </p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="icon-circle bg-red">
                                            <i class="material-icons">delete_forever</i>
                                        </div>
                                        <div class="menu-info">
                                            <h4><b>Nancy Doe</b> deleted account</h4>
                                            <p>
                                                <i class="material-icons">access_time</i> 3 hours ago
                                            </p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="icon-circle bg-orange">
                                            <i class="material-icons">mode_edit</i>
                                        </div>
                                        <div class="menu-info">
                                            <h4><b>Nancy</b> changed name</h4>
                                            <p>
                                                <i class="material-icons">access_time</i> 2 hours ago
                                            </p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="icon-circle bg-blue-grey">
                                            <i class="material-icons">comment</i>
                                        </div>
                                        <div class="menu-info">
                                            <h4><b>John</b> commented your post</h4>
                                            <p>
                                                <i class="material-icons">access_time</i> 4 hours ago
                                            </p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="icon-circle bg-light-green">
                                            <i class="material-icons">cached</i>
                                        </div>
                                        <div class="menu-info">
                                            <h4><b>John</b> updated status</h4>
                                            <p>
                                                <i class="material-icons">access_time</i> 3 hours ago
                                            </p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="icon-circle bg-purple">
                                            <i class="material-icons">settings</i>
                                        </div>
                                        <div class="menu-info">
                                            <h4>Settings updated</h4>
                                            <p>
                                                <i class="material-icons">access_time</i> Yesterday
                                            </p>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="javascript:void(0);">View All Notifications</a>
                        </li>
                    </ul>
                </li>
                <!-- #END# Notifications -->
                <!-- Tasks -->
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                        <i class="material-icons">flag</i>
                        <span class="label-count">9</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">TASKS</li>
                        <li class="body">
                            <ul class="menu tasks">
                                <li>
                                    <a href="javascript:void(0);">
                                        <h4>
                                            Footer display issue
                                            <small>32%</small>
                                        </h4>
                                        <div class="progress">
                                            <div class="progress-bar bg-pink" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 32%">
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <h4>
                                            Make new buttons
                                            <small>45%</small>
                                        </h4>
                                        <div class="progress">
                                            <div class="progress-bar bg-cyan" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <h4>
                                            Create new dashboard
                                            <small>54%</small>
                                        </h4>
                                        <div class="progress">
                                            <div class="progress-bar bg-teal" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 54%">
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <h4>
                                            Solve transition issue
                                            <small>65%</small>
                                        </h4>
                                        <div class="progress">
                                            <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 65%">
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <h4>
                                            Answer GitHub questions
                                            <small>92%</small>
                                        </h4>
                                        <div class="progress">
                                            <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 92%">
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="javascript:void(0);">View All Tasks</a>
                        </li>
                    </ul>
                </li>
                <!-- #END# Tasks -->
            </ul>
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
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->nombre}}</div>
                <div class="email">{{Auth::user()->email}}</div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="javascript:void(0);"><i class="material-icons">person</i>Perfil</a></li>
                        <li role="separator" class="divider"></li>
                          <!--<li></li>-->
                        <li role="separator" class="divider"></li>
                        <li><a href="{{url('logout')}}"><i class="material-icons">input</i>Cerrar Session</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">Navegacion Principal</li>
                

                @if(session()->has('MOD_PERSONAL'))
                <li onclick="">
                    <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                        <i class="material-icons">contacts</i>
                        <span>Personal</span>
                    </a>
                    <ul class="ml-menu" style="display: none;">
                            @if(session()->has('PAG_PSICOLOGOS'))
                        <li>
                            <a href="{{route('psicologos.index')}}">
                                <span>Psicologos</span>
                            </a>
                        </li>
                        @endif
                        @if(session()->has('PAG_DOCENTES_DE_PERMANENCIA'))
                        <li>
                            <a href="{{route('docentes_permanencia.index')}}">
                                <span>Docentes de Permanencia</span>
                            </a>
                        </li>
                        @endif
                        @if(session()->has('PAG_TALLERISTAS'))
                        <li>
                            <a href="{{route('loaders')}}">
                                <span>Talleristas</span>
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endif

                @if(session()->has('MOD_ESTUDIANTES'))
                <li>
                    <a href="{{route('estudiantes.index')}}">
                        <i class="material-icons">face</i>
                        <span>Estudiantes</span>
                    </a>
                </li>
                @endif
                @if(session()->has('MOD_CARGAR_INFORMACIóN'))
                    <li>
                        <a href="{{route('loaders')}}">
                            <i class="material-icons">note_add</i>
                            <span>Cargar Informacion</span>
                        </a>
                    </li>
                  @endif

                @if(session()->has('MOD_USUARIOS'))
                <li>
                    <a href="{{route('users')}}">
                        <i class="material-icons">people</i>
                        <span>Usuarios</span>
                    </a>
                </li>
             @endif
            @if(session()->has('MOD_INTERVENCIONES_INDIVIDUALES'))
             <li>
                 <a href="{{route('intervenciones_individuales.index')}}">
                     <i class="material-icons">people</i>
                     <span>Intervención Individual</span>
                 </a>
             </li>
           @endif
                                 
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; 2019 - 2020 <a href="javascript:void(0);">PEBI- CANADA</a>.
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

