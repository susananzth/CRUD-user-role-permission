<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        {{-- Etiquetas meta --}}
        <meta charset="utf-8">
        <meta name="DC.Language" scheme="RFC1766" content="Spanish">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Sistema base de CRUD de Usuarios, Roles y Permisos. Desarrollado por Susana N. Piñero Rodríguez @susananzth"/>
        <meta name="keywords" content="Laravel, Laravel 8, PHP, Laravel, User, Roles, Permisos"/>
        <meta name="author" content="Susana Piñero Rodríguez" />
        <meta name="copyright" content="Susana N. Piñero Rodríguez" />
        <meta name="reply-to" content="me@susananzth.com">
        <link rev="made" href="mailto:me@susananzth.com">
        <meta http-equiv="cache-control" content="no-cache"/>
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
        <link rel="stylesheet" type="text/css" href="{{  asset('css/susananzth.css')}}">
        <link rel="stylesheet" type="text/css" href="{{  asset('css/layout.css')}}">
        {{-- Scripts --}}
        {{-- <script src="{{ mix('js/app.js') }}" defer></script> --}}
        <script src="{{ asset('js/layout.js') }}" defer></script>
        {{-- Includes --}}
        @yield('rsc_top')
        @livewireStyles
    </head>
    <body class="d-flex h-100 text-center body-external">
        <div class="col-6 d-flex h-100 p-3 mx-auto flex-column">
            <header class="mb-auto text-white ">
                <div>
                    <a class="no-style" href="{{ url('/') }}">
                        <h3 class="float-md-start mb-0">
                            <img src="img\logo.png" class="d-inline-block logo" alt="susananzth" loading="lazy">
                            SusanaNzth
                        </h3>
                    </a>

                    <nav class="nav nav-masthead justify-content-center float-md-end">
                        <a class="nav-link" href="{{ url('/') }}">inicio</a>
                        @if (Route::has('login'))
                            @auth
                                <a class="nav-link" href="{{ route('home') }}">Panel administrativo</a>
                            @else
                                <a class="nav-link" href="{{ route('login') }}">Iniciar sesión</a>

                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
                                @endif
                            @endauth
                        @endif
                    </nav>
                </div>
            </header>

            {{ $slot }}

            <footer class="mt-auto text-white ">
                <p>Proyecto desarrollado por Susana Piñero Rodríguez</p>
                <p>Copyright © Susana Piñero Rodríguez 2021</p>
            </footer>
        </div>
    </body>
</html>
