@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center pt-10">
        <div class="col-md-8">
            <div class="card border-0 shadow-lg bd-1">
                <!-- Título del formulario-->
                <div class="card-header h4 mb-4">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <!-- Formulario, al dar clic en el botón de 'click here to request another', enviará los datos ejecutando la ruta: verification.resend -->
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
