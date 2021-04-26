@extends('layouts.external')

@section('title', 'Iniciar sesión')

@section('content')

            <main class="form-signin col-sm-10 col-md-6 py-2 px-2">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <img class="mb-4 logo" src="img\logo.png" alt="susananzth">
                            <h1 class="h3 mb-3 fw-normal">Iniciar sesión</h1>
                        
                            <div class="form-group">
                                <label for="username" class="py-2">Usuario</label>
                                <input id="username" type="text" class="form-control mb-2 @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password" class="py-2">Contraseña</label>
                                <input id="password" type="password" class="form-control mb-2 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="checkbox mb-3">
                                <label>
                                  <input type="checkbox" value="remember-me" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Recordar contraseña
                                </label>
                            </div>

    
                            <div class="form-group ">
                                <div class="">
                                    <button type="submit" class="btn btn-primary btn-lg mb-3">
                                        Iniciar sesión
                                    </button>
    
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link d-block" href="{{ route('password.request') }}">
                                            ¿Olvidó su contraseña?
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
@endsection
