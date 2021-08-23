<x-guest-layout>
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
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h1 class="h3 mb-3 fw-normal">{{ __('Log in') }}</h1>
                <div class="form-group">
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input id="email" type="email"
                        name="email" :value="old('email')" required autocomplete="email" autofocus />
                </div>

                <div class="form-group">
                    <x-jet-label for="password" value="{{ __('Password') }}" />
                    <x-jet-input id="password" type="password" name="password" required autocomplete="current-password"/>
                </div>

                <div class="checkbox mb-3">
                    <label for="remember_me" class="flex items-center">
                        <x-jet-checkbox id="remember_me" name="remember" />
                        <span class="ml-2 text-gray-700">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-jet-button class="btn btn-primary btn-lg ms-4">
                        {{ __('Log in') }}
                    </x-jet-button>
                </div>
            </form>
        </div>

    </x-jet-authentication-card>
</x-guest-layout>
