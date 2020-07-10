@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center pt-10">
        <div class="col-md-8">
            <div class="card">
                <!-- Título del formulario-->
                <div class="card-header h4 mb-4">{{ __('Register') }}</div>
                <div class="card-body">
                    <!-- Formulario, al dar clic en el botón de register, enviará los datos ejecutando la ruta: register-->
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                            <!-- Contenedor del nombre -->
                            <label for="firstname" class="col-sm-4 col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>
                            <div class="col-md-6">
                                <!-- @error('dato') is-invalid @enderror = accionará el mensaje de error en caso de que el dato ingresado sea inválido -->
                                <!-- value = guardará el dato anteriormente ingresado en caso que la vista se recargue por mensaje de error -->
                                <!-- required = Validación de html para notificar que es un dato requerido para ergistrarse -->
                                <!-- autocomplete = le dará opciones al usuario para autocompletar el campo -->
                                <!-- autofocus = al ingresar a esta vista, el cursor se posicionará en esta caja para facilitar el ingreso de los datos del usuario -->
                                <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>
                                @error('firstname')<!-- Saldrá un mensaje de error si el dato es inválido. Los mensajes se editan en: resources/lang/en-es -->
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <!-- Contenedor del apellido -->
                            <label for="lastname" class="col-sm-4 col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>
                            <div class="col-md-6">
                                <!-- @error('dato') is-invalid @enderror = accionará el mensaje de error en caso de que el dato ingresado sea inválido -->
                                <!-- value = guardará el dato anteriormente ingresado en caso que la vista se recargue por mensaje de error -->
                                <!-- required = Validación de html para notificar que es un dato requerido para ergistrarse -->
                                <!-- autocomplete = le dará opciones al usuario para autocompletar el campo -->
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname">
                                @error('lastname')<!-- Saldrá un mensaje de error si el dato es inválido. Los mensajes se editan en: resources/lang/en-es -->
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <!-- Contenedor del código de país de teléfono -->
                            <label for="codeCountry" class="col-sm-4 col-md-4 col-form-label text-md-right">{{ __('Code phone') }}</label>
                            <div class="col-md-6">
                                <!-- @error('dato') is-invalid @enderror = accionará el mensaje de error en caso de que el dato ingresado sea inválido -->
                                <!-- value = guardará el dato anteriormente ingresado en caso que la vista se recargue por mensaje de error -->
                                <!-- required = Validación de html para notificar que es un dato requerido para ergistrarse -->
                                <!-- autocomplete = le dará opciones al usuario para autocompletar el campo -->
                                <input id="codeCountry" type="text" class="form-control @error('codeCountry') is-invalid @enderror" name="codeCountry" value="{{ old('codeCountry') }}" required autocomplete="codeCountry">
                                @error('codeCountry')<!-- Saldrá un mensaje de error si el dato es inválido. Los mensajes se editan en: resources/lang/en-es -->
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <!-- Contenedor del código de país de teléfono -->
                            <label for="phone" class="col-sm-4 col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>
                            <div class="col-md-6">
                                <!-- @error('dato') is-invalid @enderror = accionará el mensaje de error en caso de que el dato ingresado sea inválido -->
                                <!-- value = guardará el dato anteriormente ingresado en caso que la vista se recargue por mensaje de error -->
                                <!-- required = Validación de html para notificar que es un dato requerido para ergistrarse -->
                                <!-- autocomplete = le dará opciones al usuario para autocompletar el campo -->
                                <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                                @error('phone')<!-- Saldrá un mensaje de error si el dato es inválido. Los mensajes se editan en: resources/lang/en-es -->
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <!-- Contenedor del nombre de usuario -->
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>
                            <div class="col-md-6">
                                <!-- @error('dato') is-invalid @enderror = accionará el mensaje de error en caso de que el dato ingresado sea inválido -->
                                <!-- value = guardará el dato anteriormente ingresado en caso que la vista se recargue por mensaje de error -->
                                <!-- required = Validación de html para notificar que es un dato requerido para ergistrarse -->
                                <!-- autocomplete = le dará opciones al usuario para autocompletar el campo -->
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name">
                                @error('name')<!-- Saldrá un mensaje de error si el dato es inválido. Los mensajes se editan en: resources/lang/en-es -->
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
