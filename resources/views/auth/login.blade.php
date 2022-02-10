@section('title', 'Iniciar sesión')
<x-guest-layout>
    <div class="row justify-content-md-center">
        <x-jet-authentication-card>
            <x-slot name="logo">
                <x-jet-authentication-card-logo />
            </x-slot>

            <x-jet-validation-errors />
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <h1 class="h3 mb-3 fw-normal">@lang('Log In')</h1>
                <form method="POST" action="{{ route('login') }}" class="row text-start">
                    @csrf
                    <div class="form-group col-12 mt-2">
                        <label for="email">@lang('Email')</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope me-1"></i></span>
                            <input id="email" type="email" name="email" autocomplete="email" autofocus value="{{old('email')}}" class="form-control">
                        </div>
                        <span class="help-block"></span>
                    </div>

                    <div class="form-group col-12 mt-2">
                        <label for="password">@lang('Password')</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-key me-1"></i></span>
                            <input id="password" type="password" name="password" autocomplete="current-password" value="" class="form-control">
                        </div>
                        <span class="help-block"></span>
                    </div>

                    <div class="form-check col-12 mt-2 ps-3">
                        <input id="remember_me" type="checkbox" name="remember" value="" class="form-check-input" style="margin-left: 0;">
                        <label for="remember_me" class="form-check-label ms-1">
                            @lang('Remember me')
                        </label>
                    </div>

                    <div class="flex items-center text-center mt-4">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">@lang('Forgot your password?')</a>
                        @endif

                        <x-jet-button class="btn btn-primary btn-lg ms-4">
                            @lang('Log In')
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </x-jet-authentication-card>
    </div>
</x-guest-layout>
