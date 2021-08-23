<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />
        <div class="card-body">
            <form method="POST" action="{{ route('register') }}" class="row">
                @csrf
                <div class="form-group col-sm-12 col-md-6">
                    <x-jet-label for="firtsname" value="{{ __('Firtsname') }}" />
                    <x-jet-input id="firtsname" type="text" name="firtsname" :value="old('firts name')" required autofocus autocomplete="given-name firts-name" />
                </div>

                <div class="form-group col-sm-12 col-md-6">
                    <x-jet-label for="lastname" value="{{ __('Lastname') }}" />
                    <x-jet-input id="lastname" type="text" name="lastname" :value="old('last name')" required autocomplete="family-name last-name surname" />
                </div>

                <div class="form-group col-sm-12 col-md-6">
                    <x-jet-label for="code" value="{{ __('Country code') }}" />
                    <x-jet-input id="code" type="text" name="code" :value="old('code')" required autocomplete="tel-country-code" />
                </div>

                <div class="form-group col-sm-12 col-md-6">
                    <x-jet-label for="phone" value="{{ __('Phone number') }}" />
                    <x-jet-input id="phone" type="tel" name="phone" :value="old('phone')" required autocomplete="tel-national phone tel" />
                </div>

                <div class="form-group col-sm-12">
                    <x-jet-label for="address" value="{{ __('Address') }}" />
                    <x-jet-input id="address" type="text" name="address" :value="old('address')" required autocomplete="address street-address" />
                </div>

                <div class="form-group col-sm-12 col-md-6">
                    <x-jet-label for="username" value="{{ __('Username') }}" />
                    <x-jet-input id="username" type="username" name="username" :value="old('username')" required autocomplete="username" />
                </div>

                <div class="form-group col-sm-12 col-md-6">
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input id="email" type="email" name="email" :value="old('email')" required autocomplete="email" />
                </div>

                <div class="form-group col-sm-12 col-md-6">
                    <x-jet-label for="password" value="{{ __('Password') }}" />
                    <x-jet-input id="password" type="password" name="password" required autocomplete="new-password" />
                </div>

                <div class="form-group col-sm-12 col-md-6">
                    <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                    <x-jet-input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4">
                        <x-jet-label for="terms">
                            <div class="flex items-center">
                                <x-jet-checkbox name="terms" id="terms"/>

                                <div class="ml-2">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                    ]) !!}
                                </div>
                            </div>
                        </x-jet-label>
                    </div>
                @endif

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-jet-button class="ml-4">
                        {{ __('Register') }}
                    </x-jet-button>
                </div>
            </form>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
