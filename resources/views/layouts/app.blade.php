<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        {{-- Etiquetas meta --}}
        <meta charset="utf-8">
        <meta name="DC.Language" scheme="RFC1766" content="Spanish">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Sistema base de CRUD de Usuarios, Roles y Permisos. Desarrollado por Susana N. Piñero Rodríguez @susananzth"/>
        <meta name="keywords" content="Laravel, Laravel 8, PHP, Laravel, User, Roles, Permisos"/>
        <meta name="author" content="Susana Piñero Rodríguez" />
        <meta name="copyright" content="Susana N. Piñero Rodríguez" />
        <meta name="reply-to" content="me@susananzth.com">
        <link rev="made" href="mailto:me@susananzth.com">
        <meta http-equiv="cache-control" content="no-cache"/>
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        {{-- CSRF Token --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{-- Título de la página --}}
        <title>@yield('title') - By SusanaNzth</title>
        {{-- Ícono --}}
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico')}}" />
        {{-- Estilos --}}
        {{-- <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}"> --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link rel="stylesheet" type="text/css" href="{{  asset('css/susananzth.css')}}">
        <link rel="stylesheet" type="text/css" href="{{  asset('css/layout.css')}}">
        {{-- Scripts --}}
        {{-- <script src="{{ mix('js/app.js') }}" defer></script> --}}
        <script src="{{ asset('js/layout.js') }}" defer></script>
        {{-- Includes --}}
        @yield('rsc_top')
        @livewireStyles
    </head>
    <body id="page-top" class="font-sans antialiased">
        <x-jet-banner />
        {{-- Page Wrapper --}}
        <div id="wrapper">

            {{-- Barra laterar izquierda --}}

            <ul class="navbar-nav sidebar bg-gradient-primary">
                <a href="{{ route('home') }}" class="sidebar-brand d-flex align-items-center justify-content-center">
                    <img class="logo" style="width: 7rem;" src="{{ asset('img/logo1.png')}}" alt="Vizionn">
                </a>

                <hr class="sidebar-divider my-0">

                <div id="menu_dashboard" class="nav-item">
                    <a href="{{route('home')}}" class="nav-link">
                        <i class="bi bi-speedometer2"></i><span>@lang('Home')</span>
                    </a>
                </div>

                <hr class="sidebar-divider my-0">
                @if (!Gate::denies('user_index'))
                <div id="menu_users" class="btn-group nav-item dropend">
                    <button type="button" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-check-fill"></i><span>@lang('Users')</span>
                    </button>
                    <ul class="dropdown-menu ms-1">
                        <li>
                            <a href="{{route('user.index')}}"><i class="bi bi-card-list me-2"></i> @lang('List')</a>
                        </li>
                        <li>
                            <a href="{{route('user.create')}}"><i class="bi bi-plus-circle me-2"></i> @lang('Add')</a>
                        </li>
                    </ul>
                </div>
                @endif
                @if (!Gate::denies('country_index'))
                <div id="menu_countries" class="btn-group nav-item dropend">
                    <button type="button" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-globe"></i><span>@lang('Countries')</span>
                    </button>
                    <ul class="dropdown-menu ms-1">
                        <li>
                            <a href="{{route('country.index')}}"><i class="bi bi-card-list me-2"></i> @lang('List')</a>
                        </li>
                        <li>
                            <a href="{{route('country.create')}}"><i class="bi bi-plus-circle me-2"></i> @lang('Add')</a>
                        </li>
                    </ul>
                </div>
                @endif
                @if (!Gate::denies('state_index'))
                <div id="menu_states" class="btn-group nav-item dropend">
                    <button type="button" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-map"></i><span>@lang('States')</span>
                    </button>
                    <ul class="dropdown-menu ms-1">
                        <li>
                            <a href="{{route('state.index')}}"><i class="bi bi-card-list me-2"></i> @lang('List')</a>
                        </li>
                        <li>
                            <a href="{{route('state.create')}}"><i class="bi bi-plus-circle me-2"></i> @lang('Add')</a>
                        </li>
                    </ul>
                </div>
                @endif
                @if (!Gate::denies('city_index'))
                <div id="menu_cities" class="btn-group nav-item dropend">
                    <button type="button" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-geo-alt"></i><span>@lang('Cities')</span>
                    </button>
                    <ul class="dropdown-menu ms-1">
                        <li>
                            <a href="{{route('city.index')}}"><i class="bi bi-card-list me-2"></i> @lang('List')</a>
                        </li>
                        <li>
                            <a href="{{route('city.create')}}"><i class="bi bi-plus-circle me-2"></i> @lang('Add')</a>
                        </li>
                    </ul>
                </div>
                @endif
                @if (!Gate::denies('role_index'))
                <div id="menu_roles" class="btn-group nav-item dropend">
                    <button type="button" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-people"></i><span>@lang('Roles')</span>
                    </button>
                    <ul class="dropdown-menu ms-1">
                        <li>
                            <a href="{{route('role.index')}}"><i class="bi bi-card-list me-2"></i> @lang('List')</a>
                        </li>
                        <li>
                            <a href="{{route('role.create')}}"><i class="bi bi-plus-circle me-2"></i> @lang('Add')</a>
                        </li>
                    </ul>
                </div>
                @endif
                <hr class="sidebar-divider my-0">

                <div id="menu_profile" class="nav-item">
                    <a href="{{route('user.profile')}}" class="nav-link">
                        <i class="bi bi-gear"></i><span>@lang('Profile')</span>
                    </a>
                </div>
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>
            </ul>
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
                        <span>Copyright &copy; SusanaNzth 2021 - 2022</span>
                    </div>
                    </div>
                </footer>{{-- Fin del Footer --}}
            </div>{{-- Fin del Content Wrapper --}}
        </div>{{-- Fin del DIV Page Wrapper --}}

        {{-- Botón de scroll --}}
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        @stack('modals')
    </body>
</html>
