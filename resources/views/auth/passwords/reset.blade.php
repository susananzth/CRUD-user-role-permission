@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center pt-10">
        <div class="col-md-8">
            <div class="card">
                <!-- Título del formulario-->
                <div class="card-header h4 mb-4">{{ __('Reset Password') }}</div>
                <div class="card-body">
                    <!-- Formulario, al dar clic en el botón de 'Reset Password', enviará los datos ejecutando la ruta: password.update -->
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group row">
                            <!-- Contenedor del correo -->
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <div class="col-md-6">
                                <!-- @error('dato') is-invalid @enderror = accionará el mensaje de error en caso de que el dato ingresado sea inválido -->
                                <!-- value = guardará el dato anteriormente ingresado en caso que la vista se recargue por mensaje de error -->
                                <!-- required = Validación de html para notificar que es un dato requerido para iniciar sesión -->
                                <!-- autocomplete = le dará opciones al usuario para autocompletar el campo -->
                                <!-- autofocus = al ingresar a esta vista, el cursor se posicionará en esta caja para facilitar el ingreso de los datos del usuario -->
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                <!-- Saldrá un mensaje de error si el dato es inválido. Los mensajes se editan en: resources/lang/en-es -->
                                @error('email')
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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <!-- Saldrá un mensaje de error si el dato es inválido. Los mensajes se editan en: resources/lang/en-es -->
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <!-- Contenedor de la confirmación de contraseña -->
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                            <div class="col-md-6">
                                <!-- required = Validación de html para notificar que es un dato requerido para iniciar sesión -->
                                <!-- autocomplete = le dará opciones al usuario para autocompletar el campo -->
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <!-- Botón que acciona el metodo y action del form -->
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
