@section('title', 'Restablecer contraseña')
<x-guest-layout>
    <div class="row justify-content-md-center">
        <x-jet-authentication-card>
            <x-slot name="logo">
                <x-jet-authentication-card-logo />
            </x-slot>

            <x-jet-validation-errors class="mb-4" />
            <div class="card-body">
                <h1 class="h3 mb-3 fw-normal">@lang('Reset password')</h1>
                <form method="POST" action="{{ route('password.update') }}" class="text-start">
                    @csrf

                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div class="form-group col-12 mt-2">
                        <label for="email">@lang('Email')</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope me-1"></i></span>
                            <input id="email" type="email" name="email" autocomplete="email" autofocus value="{{old('email', $request->email)}}" class="form-control">
                        </div>
                        <span class="help-block"></span>
                    </div>

                    <div class="form-group col-12 mt-2">
                        <label for="password">@lang('Password')</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-key me-1"></i></span>
                            <input id="password" type="password" name="password" autocomplete="new-password" value="" class="form-control">
                        </div>
                        <span class="help-block"></span>
                    </div>

                    <div class="form-group col-12 mt-2">
                        <label for="password_confirmation">@lang('Confirm password')</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-key me-1"></i></span>
                            <input id="password_confirmation" type="password" name="password_confirmation" autocomplete="new-password" value="" class="form-control">
                        </div>
                        <span class="help-block"></span>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-jet-button class="btn btn-primary btn-lg ms-4">
                            @lang('Reset password')
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </x-jet-authentication-card>
    </div>
</x-guest-layout>
