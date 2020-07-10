@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center py-5 pt-10">
        <div class="col-md-8">
            <div class="card border-0 shadow-lg bd-1">
                <!-- Título del formulario-->
                <div class="card-header h4 mb-4">{{ __('Forgot Your Password?') }}</div>
                <!-- Mensaje que mostrará al realizar un proceso exitoso -->
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="pb-5">
                      We get it, stuff happens. Just enter your email address below and we'll send you a link to reset your password!
                    </div>
                    <!-- Formulario, al dar clic en el botón de "Send Password Reset Link", enviará los datos ejecutando la ruta: password.email -->
                    <form method="POST" action="{{ route('password.email') }}">
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
                                <!-- Saldrá un mensaje de error si el correo es inválido. Los mensajes se editan en: resources/lang/en-es -->
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <!-- Botón que acciona el metodo y action del form -->
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
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
