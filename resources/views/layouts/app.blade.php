<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        {{-- Etiquetas meta --}}
        <meta charset="utf-8">
        <meta name="DC.Language" scheme="RFC1766" content="Spanish">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Página de guía de un crud básico de roles y permisos. Desarrollado por Susana Piñero @susananzth"/>
        <meta name="keywords" content="Laravel, Laravel 8, PHP, Laravel, Roles, Permisos"/>
        <meta name="author" content="Susana Piñero Rodríguez" />
        <meta name="copyright" content="Susana Piñero Rodríguez" />
        <meta name="reply-to" content="susananzth@gmail.com">
        <link rev="made" href="mailto:susananzth@gmail.com">
        <meta http-equiv="cache-control" content="no-cache"/>
        {{-- CSRF Token --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{-- Título de la página --}}
        <title>@yield('title') - By SusanaNzth</title>
        {{-- Ícono --}}
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico')}}" />
        {{-- Estilos --}}
        <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" type="text/css" href="{{  asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{  asset('font/bootstrap-icons-1.5.0/bootstrap-icons.css')}}">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.2/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" type="text/css" href="{{  asset('css/style.css')}}">
        @yield('css')
        @livewireStyles
        {{-- Scripts --}}
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body id="page-top" class="font-sans antialiased">
        <x-jet-banner />
        {{-- Page Wrapper --}}
        <div id="wrapper">

            {{-- Barra laterar izquierda --}}

            <div class="sidebar bg-gradient-primary flex-shrink-0 p-3">
                <a href="/" class="d-flex align-items-center pb-3 mb-3 text-white">
                    <x-jet-application-mark  />
                  <span class="ms-2 fs-5 fw-semibold">SusanaNzth</span>
                </a>

                <div class="accordion" id="accordionMenu">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                        <a href="{{route('home')}}" class="accordion-button collapsed no-toggle">
                            <i class="bi bi-house-door me-2"></i>Inicio
                        </a>
                        </h2>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <i class="bi bi-person-square me-2"></i>Usuarios
                        </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionMenu">
                        <div class="accordion-body">
                            <ul class="list-group">
                                <li class="list-group-item ps-5">
                                    <a href="" target="_blank" rel="noopener noreferrer">
                                        <i class="bi bi-card-list me-2"></i>
                                        Listado
                                    </a>
                                </li>
                                <li class="list-group-item ps-5">
                                    <a href="" target="_blank" rel="noopener noreferrer">
                                        <i class="bi bi-plus-square me-2"></i>
                                        Nuevo
                                    </a>
                                </li>
                              </ul>
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <i class="bi bi-people me-2"></i>Roles
                        </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionMenu">
                        <div class="accordion-body">
                            <ul class="list-group">
                                <li class="list-group-item ps-5">
                                    <a href="{{route('role.index')}}"><i class="bi bi-card-list me-2"></i> Listado</a>
                                </li>
                                <li class="list-group-item ps-5">
                                    <a href="" target="_blank" rel="noopener noreferrer">
                                        <i class="bi bi-plus-square me-2"></i>
                                        Nuevo
                                    </a>
                                </li>
                            </ul>
                        </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            <i class="bi bi-shield-shaded me-2"></i>Permisos
                        </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionMenu">
                        <div class="accordion-body">
                            <ul class="list-group">
                                <li class="list-group-item ps-5">
                                    <a href="" target="_blank" rel="noopener noreferrer">
                                        <i class="bi bi-card-list me-2"></i>
                                        Listado
                                    </a>
                                </li>
                                <li class="list-group-item ps-5">
                                    <a href="" target="_blank" rel="noopener noreferrer">
                                        <i class="bi bi-plus-square me-2"></i>
                                        Nuevo
                                    </a>
                                </li>
                            </ul>
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                        <a href="{{route('profile.show')}}" class="accordion-button collapsed no-toggle">
                            <i class="bi bi-gear me-2"></i>Account
                        </a>
                        </h2>
                    </div>
                </div>
            </div>
            {{-- End of Sidebar --}}

            {{-- Content Wrapper --}}
            <div class="content-wrapper">
                {{-- Contenido --}}
                <div id="content">

                    {{-- Barra de navegación --}}
                    @livewire('navigation-menu')
                    {{-- Fin de barra de navegación --}}

                    {{-- Contenido de la página --}}
                    <div class="container-fluid">

                        {{-- Page Heading --}}
                        @if (isset($header))
                            <header class="bg-white">
                                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                                    {{ $header }}
                                </div>
                            </header>
                        @endif
                        {{-- Contenido de la página. Llamado con una función. --}}
                        <main>
                            {{ $slot }}
                        </main>

                    </div>{{-- Fin del Contenido de la página --}}

                </div>{{-- Fin del contenido --}}

                {{-- Footer --}}
                <footer class="footer bg-white">
                    <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; SusanaNzth 2021</span>
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

        @stack('modals')

        {{-- JS Bootstrap
        <script src="{{ asset('js/jquery-3.6.0.min.js') }}" defer></script> --}}
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}" defer></script>
        <script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.2/js/dataTables.bootstrap5.min.js"></script>
        <script src="{{ asset('js/scripts.js') }}" defer></script>
        {{-- Llamada de los script de cada vista --}}
        @yield('scripts')
        @livewireScripts
    </body>
</html>
