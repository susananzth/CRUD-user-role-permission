@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center pt-10">
        <div class="col-md-8">
            <div class="card">
                <!-- Título del formulario-->
                <div class="card-header h4 mb-4">{{ __('Confirm Password') }}</div>

                <div class="card-body">
                    {{ __('Please confirm your password before continuing.') }}
                    <!-- Formulario, al dar clic en el botón de 'Confirm Password', enviará los datos ejecutando la ruta: password.confirm -->
                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf
                        <div class="form-group row">
                            <!-- Contenedor de la contraseña -->
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                            <div class="col-md-6">
                                <!-- @error('dato') is-invalid @enderror = accionará el mensaje de error en caso de que el dato ingresado sea inválido -->
                                <!-- required = Validación de html para notificar que es un dato requerido para ergistrarse -->
                                <!-- autocomplete = le dará opciones al usuario para autocompletar el campo -->
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <!-- Botón que acciona el metodo y action del form -->
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Confirm Password') }}
                                </button>
                                <!-- Link para iniciar el proceso de contraseña olvidada -->
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
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
