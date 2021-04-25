@include('partials.top')
    <body class="d-flex h-100 text-center text-white body-external">
        <div class="col-6 d-flex h-100 p-3 mx-auto flex-column">
            <header class="mb-auto">
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
                                <a class="nav-link" href="{{ route('home') }}">Dashboard</a>
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

            @yield('content')

            <footer class="mt-auto">
                <p>Proyecto desarrollado por Susana Piñero Rodríguez</p>
                <p>Copyright © Susana Piñero Rodríguez 2021</p>
            </footer>
        </div>
        <!-- JS Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <!-- Llamada de los script de cada vista -->
        @yield('scripts')
    </body>
</html>