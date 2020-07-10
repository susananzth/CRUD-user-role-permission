@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center pt-10">
        <div class="col-md-8">
            <div class="card border-0 shadow-lg bd-1">
                <!-- Título del formulario-->
                <div class="card-header h4 mb-4">{{ __('Welcome Back!') }}</div>
                <div class="card-body">
                    <!-- Formulario, al dar clic en el botón de login, enviará los datos ejecutando la ruta: login-->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row">
                            <!-- Contenedor del correo -->
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <div class="col-md-6">
                                <!-- @error('dato') is-invalid @enderror = accionará el mensaje de error en caso de que el dato ingresado sea inválido -->
                                <!-- value = guardará el dato anteriormente ingresado en caso que la vista se recargue por mensaje de error -->
                                <!-- required = Validación de html para notificar que es un dato requerido para iniciar sesión -->
                                <!-- autocomplete = le dará opciones al usuario para autocompletar el campo -->
                                <!-- autofocus = al ingresar a esta vista, el cursor se posicionará en esta caja para facilitar el ingreso de los datos del usuario -->
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email') <!-- Saldrá un mensaje de error si el correo es inválido. Los mensajes se editan en: resources/lang/en-es -->
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <!-- Contenedor de la contraseña -->
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                            <div class="col-md-6">
                              <!-- @error('dato') is-invalid @enderror = accionará el mensaje de error en caso de que el dato ingresado sea inválido -->
                              <!-- required = Validación de html para notificar que es un dato requerido para iniciar sesión -->
                              <!-- autocomplete = le dará opciones al usuario para autocompletar el campo -->
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')<!-- Saldrá un mensaje de error si el dato es inválido. Los mensajes se editan en: resources/lang/en-es -->
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <!-- Selecciona en caso de querer guardar la contraseña -->
                                <div class="form-check">
                                    <!-- {{ old('remember') ? 'checked' : '' }} = guardará la selección del usuario -->
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <!-- Botón de logín que acciona el metodo y action del form -->
                                <button type="submit" class="btn btn-primary mr-1">
                                    {{ __('Login') }}
                                </button>
                                <!-- Link para iniciar el proceso de contraseña olvidada -->
                                @if (Route::has('password.request'))
                                    <a class="btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
