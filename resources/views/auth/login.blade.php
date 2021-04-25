@extends('layouts.external')

@section('title', 'Iniciar sesión')

@section('content')

            <main class="form-signin py-2 px-2">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <img class="mb-4 logo" src="img\logo.png" alt="susananzth">
                            <h1 class="h3 mb-3 fw-normal">Iniciar sesión</h1>
                        
                            <div class="form-group">
                                <label for="email" class="py-2">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control mb-2 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password" class="py-2">{{ __('Password') }}</label>
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
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
@endsection
