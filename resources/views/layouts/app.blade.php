<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/logo-upc.png')}}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="{{asset('css/all.css')}}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<!-- Preloader - style  spinners.css -->
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
</div>
<!-- Main wrapper - style pages.scss -->
<div id="main-wrapper">
    <!-- Topbar header - style pages.scss -->
    <header class="topbar">
        <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
            <!-- Logo -->
            <div class="navbar-header">
                <a class="navbar-brand" href="index.html">
                    <!-- Logo icon -->
                    <b>
                        <img src="{{asset('images/logo-upc.png')}}" alt="homepage" class="dark-logo"  width="50px" height="50px"/>
                    </b>
                    <!--End Logo icon -->
                    <!-- Logo text -->
                    <span>
                                <!-- dark Logo text -->
                                <i class="dark-logo">S<b>IA</b>T</i>
                            </span>
                </a>
            </div>
            <!-- End Logo -->
            <div class="navbar-collapse">
                <!-- toggle and nav items -->
                <ul class="navbar-nav mr-auto mt-md-0 ">
                    <!-- This is  -->
                    <li class="nav-item">
                        <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)">
                            <i class="ti-menu"></i>
                        </a>
                    </li>
                    <li class="nav-item hidden-sm-down">
                        <form class="app-search p-l-20">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <a class="srh-btn">
                                <i class="ti-search"></i>
                            </a>
                        </form>
                    </li>
                </ul>

                <!-- User profile and search -->

                <ul class="navbar-nav my-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">
                            <img src="{{asset('images/users/1.jpg')}}" alt="user" class="profile-pic m-r-5" />{{Auth::user()->name}}</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- End Topbar header -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li>
                        <a href="index.html" class="waves-effect">
                            <i class="fas fa-clock m-r-10" aria-hidden="true"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="pages-profile.html" class="waves-effect">
                            <i class="fa fa-user m-r-10" aria-hidden="true"></i>Profile</a>
                    </li>
                    <li>
                        <a href="table-basic.html" class="waves-effect">
                            <i class="fa fa-table m-r-10" aria-hidden="true"></i>Table</a>
                    </li>
                    <li>
                        <a href="icon-fontawesome.html" class="waves-effect">
                            <i class="fa fa-font m-r-10" aria-hidden="true"></i>Icons</a>
                    </li>
                    <li>
                        <a href="map-google.html" class="waves-effect">
                            <i class="fa fa-globe m-r-10" aria-hidden="true"></i>Google Map</a>
                    </li>
                    <li>
                        <a href="pages-blank.html" class="waves-effect">
                            <i class="fa fa-columns m-r-10" aria-hidden="true"></i>Blank Page</a>
                    </li>
                    <li>
                        <a href="{{route('loaders')}}" class="waves-effect">
                            <i class="fas fa-cloud-upload-alt"></i> Cargar Datos</a>
                    </li>
                </ul>
                <div class="text-center m-t-30">
                    <a href="" class="btn btn-danger">Subcribete a YouTube</a>
                </div>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
    <!-- End Left Sidebar - style sidebar.scss  -->

    <!-- Page wrapper  -->
    <div class="page-wrapper">
        <!-- Container fluid  -->
        @yield('content')
        <!-- End Container fluid  -->
        <!-- footer -->
        <footer class="footer text-center">
            © 2019 Camilo Colon
        </footer>
        <!-- End footer -->
    </div>
    <!-- End Page wrapper  -->
</div>
@yield('scripts')
</body>
</html>
