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
    <body class="d-flex h-100 text-center">
        <div class="col-12 col-md-10 col-xxl-8 d-flex h-100 p-3 mx-auto flex-column">
            <header class="mb-auto text-white ">
                <div>
                    <a class="nav-link" href="{{ url('/') }}">
                        <h3 class="float-md-start mb-0">
                            <x-jet-application-mark/>
                            SusanaNzth
                        </h3>
                    </a>

                    <nav class="nav nav-masthead justify-content-center float-md-end">
                        <a class="nav-link" href="{{ url('/') }}">@lang('Home')</a>
                        @if (Route::has('login'))
                            @auth
                                <a class="nav-link" href="{{ route('home') }}">@lang('Administrative Dashboard')</a>
                            @else
                                <a class="nav-link" href="{{ route('login') }}">@lang('Log In')</a>

                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">@lang('Sign in')</a>
                                @endif
                            @endauth
                        @endif
                        @if(count(config('app.languages')) > 1)
                        <div class="dropdown ms-2">
                            <button id="dropdown_language" type="button" data-bs-toggle="dropdown" aria-expanded="false" class="nav-link dropdown-toggle">
                                <i class="bi bi-globe"></i> {{ strtoupper(app()->getLocale()) }}
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdown_language">
                                @foreach(config('app.languages') as $lang_locale => $lang_name)
                                    <x-jet-dropdown-link href="{{ url()->current() }}?lang={{ $lang_locale }}">
                                        @lang($lang_name) ({{ strtoupper($lang_locale) }})
                                    </x-jet-dropdown-link>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </nav>
                </div>
            </header>

            {{ $slot }}

            <footer class="mt-auto">
                <p class="m-0">@lang('Project developed by') Susana Piñero Rodríguez</p>
                <p>Copyright © Susana Piñero Rodríguez 2021 - 2022</p>
            </footer>
        </div>
    </body>
</html>
