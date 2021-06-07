<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        {{-- Etiquetas meta --}}
        <meta charset="utf-8">
        <meta name="DC.Language" scheme="RFC1766" content="Spanish">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Página de guía de un crud básico de roles y permisos. Desarrollado por Susana Piñero @susananzth"/>
        <meta name="keywords" content="Laravel, Laravel 8, PHP, Laravel, Roles, Permisos"/>
        <meta name="author" content="Susana Piñero Rodríguez" />
        <meta name="copyright" content="Susana Piñero Rodríguez" />
        <meta name="reply-to" content="susananzth@gmail.com">
        <link rev="made" href="mailto:susananzth@gmail.com">
        <meta http-equiv="cache-control" content="no-cache"/>
        <meta http-equiv="expires" content="43200"/>
        <meta name="Resource-type" content="content">
        <meta name="DateCreated" content="Thu, 02 Apr 2021 00:00:00 GMT-5">
        <meta name="Revisit-after" content="1 days">
        <meta name="robots" content="ALL">
        {{-- CSRF Token --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{-- Título de la página --}}
        <title>@yield('title') - By SusanaNzth</title>
        {{-- Ícono --}}
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico')}}" />
        {{-- Fuentes --}}
        <link href="{{ asset('font/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
        <script src="{{ asset('js/app.js') }}" defer></script>

        {{-- Estilos --}}
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{  asset('css/sb-admin-2.min.css')}}" rel="stylesheet" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link href="{{  asset('css/style.css')}}" rel="stylesheet" type="text/css">
        @yield('css')
    </head>
    <body id="page-top">

        {{-- Page Wrapper --}}
        <div id="wrapper">
    
            {{-- Barra laterar izquierda --}}
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
                {{-- Logo --}}
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <img class="logo" src="{{ asset('img/logo.png')}}" alt="SusanaNzth">
                    </div>
                    <div class="sidebar-brand-text mx-3">SusanaNzth</div>
                </a>
                <hr class="sidebar-divider my-0">
                {{-- Menú del Dashboard --}}
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Panel administrativo</span></a>
                </li>
                <hr class="sidebar-divider">
                {{-- Título de menú --}}
                <div class="sidebar-heading">
                    Administrador
                </div>
                @can('task_access')
                    {{-- Menú de Tareas --}}
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTask"
                            aria-expanded="true" aria-controls="collapseTask">
                            <i class="fas fa-fw fa-tasks"></i>
                            <span>Tareas</span>
                        </a>
                        <div id="collapseTask" class="collapse" aria-labelledby="headingTask"
                            data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Administrar Tareas:</h6>
                                <a class="collapse-item" href="{{ route('task.create') }}">Agregar Tarea</a>
                                <a class="collapse-item" href="{{ route('task.index') }}">Listar Tareas</a>
                            </div>
                        </div>
                    </li>
                @endcan
                @can('user_access')
                {{-- Menú de usuarios --}}
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser"
                        aria-expanded="true" aria-controls="collapseUser">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Usuarios</span>
                    </a>
                    <div id="collapseUser" class="collapse" aria-labelledby="headingUser"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Administrar Usuarios:</h6>
                            <a class="collapse-item" href="utilities-color.html">Agregar Usuario</a>
                            <a class="collapse-item" href="utilities-border.html">Listar Usuarios</a>
                        </div>
                    </div>
                </li>
                @endcan
                {{-- Menú de roles --}}
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRole"
                        aria-expanded="true" aria-controls="collapseRole">
                        <i class="fas fa-fw fa-user-shield"></i>
                        <span>Roles</span>
                    </a>
                    <div id="collapseRole" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Administrar Roles:</h6>
                            <a class="collapse-item" href="buttons.html">Agregar Rol</a>
                            <a class="collapse-item" href="cards.html">Listar Roles</a>
                        </div>
                    </div>
                </li>
                {{-- Menú de permisos --}}
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePermission"
                        aria-expanded="true" aria-controls="collapsePermission">
                        <i class="fas fa-fw fa-user-lock"></i>
                        <span>Permisos</span>
                    </a>
                    <div id="collapsePermission" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Administrar Permisos:</h6>
                            <a class="collapse-item" href="">Agregar Permiso</a>
                            <a class="collapse-item" href="">Listar Permisos</a>
                        </div>
                    </div>
                </li>
                <hr class="sidebar-divider d-none d-md-block">
    
                {{-- Sidebar Toggler (Sidebar) --}}
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>
            </ul>
            {{-- End of Sidebar --}}
    
            {{-- Content Wrapper --}}
            <div id="content-wrapper" class="d-flex flex-column">
                {{-- Contenido --}}
                <div id="content">
                    {{-- Barra de navegación --}}
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                        {{-- Botón de menú móbil --}}
                        <button id="sidebarToggleTop" class="btn btn-p btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                        </button>
                        {{-- Barra de búsqueda --}}
                        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                            <button class="btn btn-p btn-primary" type="button">
                                <i class="fa fa-search fa-sm"></i>
                            </button>
                            </div>
                        </div>
                        </form>
                        <ul class="navbar-nav ml-auto">
                        {{-- Botón para barra de búsqueda en móbil --}}
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-search fa-fw"></i>
                            </a>
                            {{-- Barra de búsqueda en móbil --}}
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-p btn-primary" type="button">
                                    <i class="fa fa-search fa-sm"></i>
                                    </button>
                                </div>
                                </div>
                            </form>
                            </div>
                        </li>
                        <div class="topbar-divider d-none d-sm-block"></div>
            
                        {{-- Información de usuario --}}
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</span>
                            <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
                            </a>
                            {{-- Lista desplegable de información de usuario --}}
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fa fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Perfil
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fa fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Cerrar sesión
                            </a>
                            </div>
                        </li>
                        </ul>
                    </nav>
                    {{-- Fin de barra de navegación --}}
    
                    {{-- Contenido de la página --}}
                    <div class="container-fluid">
                        {{-- Contenido de la página. Llamado con una función. --}}
                        @yield('content')

                    </div>{{-- Fin del Contenido de la página --}}

                </div>{{-- Fin del contenido --}}
    
                {{-- Footer --}}
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; SusanaNzth 2020</span>
                    </div>
                    </div>
                </footer>{{-- Fin del Footer --}}
            </div>{{-- Fin del Content Wrapper --}}
        </div>{{-- Fin del DIV Page Wrapper --}}
    
        {{-- Botón de scroll --}}
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
    
        {{-- Ventana modal de cerrar sesión --}}
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModal1" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="logoutModal1">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                </div>
            </div>
            </div>
        </div>
        {{-- JS Bootstrap --}}
        <script src="{{ asset('js/sb-admin-2.min.js') }}" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        {{-- Llamada de los script de cada vista --}}
        @yield('scripts')
    </body>
</html>
