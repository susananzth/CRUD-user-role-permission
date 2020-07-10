<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Etiquetas meta -->
    <meta charset="utf-8">
    <meta name="DC.Language" scheme="RFC1766" content="Spanish">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistema web de administrador de usuarios y roles con Laravel 7, interfaz en bootstrap 4.5. Desarrollado por Susana Piñero @susananzth"/>
    <meta name="keywords" content="Laravel, Laravel 7, bootstrap, bootstrap 4.5, roles, usuarios, admin"/>
    <meta name="author" content="Susana Piñero Rodríguez" />
    <meta name="copyright" content="Susana Piñero Rodríguez" />
    <meta name="reply-to" content="susananzth@gmail.com">
    <link REV="made" href="mailto:susananzth@gmail.com">
    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="expires" content="43200"/>
    <meta name="Resource-type" content="Manual">
    <meta name="DateCreated" content="Sat, 08 July 2020 00:00:00 GMT-5">
    <meta name="Revisit-after" content="1 days">
    <meta name="robots" content="ALL">
    <!-- Título de la página -->
    <title>Laravel 7 | SusanaNzth</title>
    <!-- Ícono -->
    <link rel="icon" type="image/x-icon" href="{{asset('/img/favicon.ico')}}" />
    <!-- Fuentes -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Estilos -->
    <link rel="stylesheet" href="{{asset('/css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('/css/theme.css')}}"/>
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="body">
    <div class="layout-content bg-app">
        <!-- Navegación-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container">
                <!-- Link del logo-->
                <a class="navbar-brand js-scroll-trigger" href="{{ url('/') }}">SusanaNzth</a>
                <!-- Botón de menú móvil-->
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fa fa-bars"></i>
                </button>
                <!-- Menú de navegación-->
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <!-- Links de autenticación -->
                        @guest
                            <!-- Vista de invitados (Iniciar sesión) -->
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ URL('login') }}">Sing In</a></li>
                        @else
                            <!-- Vista de usuario logueado -->
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <!-- Botón de cerrar sesión -->
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <!-- Form de cerrar sesión que es accionado al hacer clic al botón de arriba -->
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Contenido-->
        <section class="text-center">
            <div class="container">
                <main class="py-5">
                    @yield('content') <!-- Aquí llama los fragmento de contenidos de las otras páginas -->
                </main>
            </div>
        </section>
    </div>
    <div class="layout-footer">
        <!-- Link de redes sociales-->
        <section class="contact-section bg-black">
            <div class="container">
                <div class="social d-flex justify-content-center">
                    <a class="mx-2" target="_blank" href="https://twitter.com/susananzth"><i class="fa fa-twitter"></i></a>
                    <a class="mx-2" target="_blank" href="https://facebook.com/susananzth"><i class="fa fa-facebook-f"></i></a>
                    <a class="mx-2" target="_blank" href="https://www.linkedin.com/in/susananzth/"><i class="fa fa-linkedin"></i></a>
                    <a class="mx-2" target="_blank" href="https://github.com/susananzth"><i class="fa fa-github"></i></a>
                    <a class="mx-2" target="_blank" href="https://gitlab.com/susananzth"><i class="fa fa-gitlab"></i></a>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer bg-black small text-center text-white-50"><div class="container">Copyright © SusanaNzth 2020</div></footer>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <!-- JS del tema -->
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>
