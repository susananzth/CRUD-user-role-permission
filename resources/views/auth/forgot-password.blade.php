@section('title', 'Contraseña olvidada')
<x-guest-layout>
    <div class="row justify-content-md-center">
        <x-jet-authentication-card>
            <x-slot name="logo">
                <x-jet-authentication-card-logo />
            </x-slot>
            <div class="card-body">
                <div class="mb-4 text-gray-700">
                    @lang('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.')
                </div>

                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <x-jet-validation-errors/>

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="form-group text-start mt-2">
                        <label for="email">@lang('Email')</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope me-1"></i></span>
                            <input id="email" type="email" name="email" autocomplete="email" autofocus value="{{old('email')}}" class="form-control">
                        </div>
                        <span class="help-block"></span>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-jet-button>
                            @lang('Email Password Reset Link')
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </x-jet-authentication-card>
    </div>
</x-guest-layout>
