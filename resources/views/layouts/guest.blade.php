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
        <title>Inicio - By SusanaNzth</title>
        {{-- Ícono --}}
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico')}}" />
        {{-- Fuentes --}}
        <link href="{{ asset('font/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
        {{-- Estilos --}}
        <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{  asset('css/style.css')}}">
        @yield('css')
        {{-- Scripts --}}
        <script src="{{ mix('js/app.js') }}" defer></script>
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
        {{-- JS Bootstrap --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        {{-- Llamada de los script de cada vista --}}
        @yield('scripts')
    </body>
</html>
