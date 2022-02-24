@section('title', 'Registro de usuario')
<x-guest-layout>
    <div class="row justify-content-md-center">
        <x-jet-authentication-card>
            <x-slot name="logo">
                <x-jet-authentication-card-logo />
            </x-slot>

            <x-jet-validation-errors/>
            <div class="card-body">
                <h1 class="h3 mb-3 fw-normal">@lang('User register')</h1>
                <form method="POST" action="{{ route('register') }}" class="row text-start">
                    @csrf

                    <div class="form-group col-12 col-md-6 mt-2">
                        <label for="firtsname">@lang('Firtsname')</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person-lines-fill me-1"></i></span>
                            <input id="firtsname" type="text" name="firtsname" autocomplete="given-name firts-name" autofocus value="{{old('firtsname')}}" class="form-control">
                        </div>
                        <span class="help-block"></span>
                    </div>

                    <div class="form-group col-12 col-md-6 mt-2">
                        <label for="lastname">@lang('Lastname')</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person-lines-fill me-1"></i></span>
                            <input id="lastname" type="text" name="lastname" autocomplete="family-name last-name surname" value="{{old('firtsname')}}" class="form-control">
                        </div>
                        <span class="help-block"></span>
                    </div>

                    <div class="form-group col-12 col-md-6 mt-2">
                        <label for="country_code">@lang('Country code')</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-telephone me-1"></i></span>
                            <select id="country_code" name="country_code" class="form-control">
                                <option value="">Seleccione...</option>
                            </select>
                        </div>
                        <span class="help-block"></span>
                    </div>

                    <div class="form-group col-12 col-md-6 mt-2">
                        <label for="phone">@lang('Phone number')</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-telephone-fill me-1"></i></span>
                            <input id="phone" type="tel" name="phone" value="{{old('phone')}}" autocomplete="tel-national phone tel" class="form-control">
                        </div>
                        <span class="help-block"></span>
                    </div>

                    <div class="form-group col-12 mt-2">
                        <label for="address">@lang('Address')</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-map me-1"></i></span>
                            <input id="address" type="text" name="address" value="{{old('address')}}" autocomplete="address street-address" class="form-control">
                        </div>
                        <span class="help-block"></span>
                    </div>

                    <div class="form-group col-12 col-md-6 mt-2">
                        <label for="username">@lang('Username')</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person-circle me-1"></i></span>
                            <input id="username" type="text" name="username" value="{{old('username')}}" autocomplete="username" class="form-control">
                        </div>
                        <span class="help-block"></span>
                    </div>

                    <div class="form-group col-12 col-md-6 mt-2">
                        <label for="email">@lang('Email')</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope me-1"></i></span>
                            <input id="email" type="email" name="email" autocomplete="email" autofocus value="{{old('email', $request->email)}}" class="form-control">
                        </div>
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group col-12 col-md-6 mt-2">
                        <label for="password">@lang('Password')</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-key me-1"></i></span>
                            <input id="password" type="password" name="password" autocomplete="new-password" value="" class="form-control">
                        </div>
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group col-12 col-md-6 mt-2">
                        <label for="password_confirmation">@lang('Confirm password')</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-key me-1"></i></span>
                            <input id="password_confirmation" type="password" name="password_confirmation" autocomplete="new-password" value="" class="form-control">
                        </div>
                        <span class="help-block"></span>
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
                            @lang('Already registered? Log in')
                        </a>

                        <x-jet-button class="ml-4 ms-3">
                            @lang('Register')
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </x-jet-authentication-card>
    </div>
</x-guest-layout>
