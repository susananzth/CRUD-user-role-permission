@extends('layouts.external')

@section('title', 'Registro')

@section('content')

            <main class="form-signin col-sm-12 col-md-8 py-2 px-2">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" class="row">
                            @csrf
                            <img class="mb-4 logo" src="img\logo.png" alt="susananzth">
                            <h1 class="h3 mb-3 fw-normal">Registro</h1>

                            <div class="form-group col-sm-12 col-md-6">
                                <label for="firtsname" class="py-2">Nombres</label>
                                <input id="firtsname" type="text" class="form-control  mb-2 @error('firtsname') is-invalid @enderror" name="firtsname" value="{{ old('firtsname') }}" required autocomplete="firtsname" autofocus>
                                @error('firtsname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-sm-12 col-md-6">
                                <label for="lastname" class="py-2">Apellidos</label>
                                <input id="lastname" type="text" class="form-control  mb-2 @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname">
                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-sm-12 col-md-6">
                                <label for="code" class="py-2">Código de país</label>
                                <input id="code" type="text" class="form-control  mb-2 @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" required autocomplete="code">
                                @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-sm-12 col-md-6">
                                <label for="phone" class="py-2">Teléfono</label>
                                <input id="phone" type="number" class="form-control  mb-2 @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-sm-12">
                                <label for="address" class="py-2">Direccion</label>
                                <input id="address" type="text" class="form-control  mb-2 @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-sm-12 col-md-6">
                                <label for="username" class="py-2">Usuario</label>
                                <input id="username" type="text" class="form-control  mb-2 @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username">
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        
                            <div class="form-group col-sm-12 col-md-6">
                                <label for="email" class="py-2">Correo</label>
                                <input id="email" type="email" class="form-control mb-2 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label for="password" class="py-2">Contraseña</label>
                                <input id="password" type="password" class="form-control mb-2 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label for="password-confirm" class="py-2">Confirmar contraseña</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-12">
                                <div class="py-2">
                                    <button type="submit" class="btn btn-primary">
                                        Registrarse
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
@endsection
