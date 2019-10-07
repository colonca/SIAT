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

<body class="theme-teal">
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
        <p>Por favor espere...</p>
    </div>
</div>
<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
<!-- Search Bar -->
<div class="search-bar">
    <div class="search-icon">
        <i class="material-icons">Buscar</i>
    </div>
    <input type="text" placeholder="START TYPING...">
    <div class="close-search">
        <i class="material-icons">cerrar</i>
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
        <div class="collapse navbar-collapse">
            <p class="navbar-brand navbar-right">UNIVERSIDAD POPULAR DEL CESAR</p>
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
            </div>
        </div>
        
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">Navegacion Principal</li>

                @if(session()->has('MOD_PERSONAL'))
                    @if($location=='personal' || $location=='talleristas')
                        <li class="active">
                    @else
                        <li>
                    @endif
                    <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                        <i class="material-icons">contacts</i>
                        <span>Personal</span>
                    </a>
                    <ul class="ml-menu" style="display: none;">
                        @if(session()->has('PAG_PSICOLOGOS'))
                            @if($location=='talleristas')
                                <li class="active">
                            @else
                                <li>
                            @endif
                            <a href="{{route('psicologos.index')}}" class="waves-effect waves-block">
                                <span>Talleristas</span>
                            </a>
                        </li>
                        @endif
                        @if(session()->has('PAG_DOCENTES_DE_PERMANENCIA'))
                            @if($location=='personal')
                                <li class="active">
                            @else
                                <li>
                            @endif
                            <a href="{{route('docentes_permanencia.index')}}" class="waves-effect waves-block">
                                <span>Docentes de Permanencia</span>
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endif

                @if(session()->has('MOD_REPORTES'))
                    @if($location=='reportes_estudiante' || $location=='reportes_intervencion_individual')
                        <li class="active">
                    @else
                        <li>
                    @endif
                    <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                        <i class="material-icons">equalizer</i>
                        <span>Reportes</span>
                    </a>
                    <ul class="ml-menu" style="display: none;">
                        @if($location=='reportes_intervencion_individual')
                            <li class="active">
                        @else
                            <li>
                        @endif
                            <a href="{{route('reporte_individual')}}" class="waves-effect waves-block">
                                <i class="material-icons">assessment</i>
                                <span>Intervenciones Individuales</span>
                            </a>
                        </li>

                            @if($location=='reportes_estudiante')
                                <li class="active">
                            @else
                                <li>
                            @endif
                            <a href="{{route('reporte_Estudiante')}}" class="waves-effect waves-block">
                                <i class="material-icons">assessment</i>
                                <span>Estudiantes</span>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                @if(session()->has('MOD_ESTUDIANTES'))
                    @if($location=='estudiante')
                      <li class="active">
                    @else
                      <li>
                   @endif
                        <a href="{{route('estudiantes.index')}}" class="waves-effect waves-block">
                            <i class="material-icons">face</i>
                            <span>Estudiantes</span>
                        </a>
                      </li>
                @endif
                @if(session()->has('MOD_CARGAR_INFORMACIóN'))
                    @if($location=='loader')
                        <li class="active">
                    @else
                        <li>
                    @endif
                        <a href="{{route('loaders')}}" class="waves-effect waves-block">
                            <i class="material-icons">note_add</i>
                            <span>Cargar Informacion</span>
                        </a>
                    </li>
                  @endif
                @if(session()->has('MOD_PERIODOS_ACADEMICOS'))
                    @if($location=='periodo')
                        <li class="active">
                    @else
                        <li>
                     @endif
                        <a href="{{route('periodoa.index')}}" class="waves-effect waves-block">
                            <i class="material-icons">
                                timeline
                            </i>
                            <span>Periodos Academicos</span>
                        </a>
                    </li>
                @endif

                @if(session()->has('MOD_USUARIOS'))
                @if($location=='usuarios')
                    <li class="active">
                @else
                    <li>
                @endif
                    <a href="{{route('users')}}" class="waves-effect waves-block">
                        <i class="material-icons">people</i>
                        <span>Usuarios</span>
                    </a>
                </li>
             @endif
            @if(session()->has('MOD_INTERVENCIONES_INDIVIDUALES'))
                @if($location=='intervencion_individual')
                    <li class="active">
                @else
                    <li>
                @endif
                 <a href="{{route('intervenciones_individuales.index')}}" class="waves-effect waves-block">
                     <i class="material-icons">people</i>
                     <span>Intervención Individual</span>
                 </a>
             </li>
           @endif

            @if(session()->has('MOD_CITAS_AGENDADAS'))
                <li>
                    <a href="{{route('citas_agendadas')}}" class="waves-effect waves-block">
                        <i class="material-icons">
                            card_membership
                        </i>
                        <span>Citas Agendadas</span>
                    </a>
                </li>
            @endif
                    @if($location=='contrasenia')
                        <li class="active">
                    @else
                        <li>
                    @endif
                    <a href="{{route('nuevoPassword')}}" class="waves-effect waves-block">
                        <i class="material-icons">lock_open</i>
                        <span>Cambiar Contraseña</span>
                    </a>
                </li>
              <li>
                  <a href="{{url('logout')}}" class="waves-effect waves-block">
                      <i class="material-icons">input</i>
                     <span>Cerrar Sesion</span>
                  </a>
              </li>
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; 2019 - 2020 <a href="javascript:void(0);"> Camilo Colón - Daniel Barros</a>.
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

<!-- Custom Js -->
<script src="{{asset('js/admin.js')}}"></script>

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


<!-- Demo Js -->
<script src="{{asset('js/demo.js')}}"></script>

<script src="{{asset('js/axios.min.js')}}"></script>

<script src="{{asset('js/notifications.js')}}"></script>

<script src="{{asset('js/jquery.dataTables.js')}}"></script>

<script src="{{asset('js/dataTables.bootstrap.js')}}"></script>

<script src="{{asset('js/notify.min.js')}}"></script>




@yield('scripts')

</body>

</html>

