@section('title', 'Registrar Usuario')

@section('rsc_top')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="{{  asset('css/forms.css')}}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script src="{{ asset('js/JQ-Validate.js') }}" defer></script>
    <script src="{{ asset('js/users/create.js') }}" defer></script>
    <script>
        var trans_select = "@lang('Select')";
    </script>
    <style>
        .spinner-animation{
            color: black !important;
            cursor: pointer;
            position: relative;
            right: 38px;top: 6px;
            width: 1px;
        }
    </style>
@endsection

<x-app-layout>
    <div class="card m-3">
        <div class="card-header fs-5">
            @lang('Add User')
        </div>
        <form id="form_create" action="{{route('user.store')}}" method="post">
            @csrf
            <div class="card-body">
                <x-jet-validation-errors/>
                <div  class="row">
                    <p class="m-0 fst-italic">@lang('Fields marked with * are required')</p>
                    <div class="col-12 col-md-6 mt-2">
                        <label for="firstname">@lang('Firstname') *</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person-lines-fill me-1"></i></span>
                            <input id="firstname" type="text" name="firstname" autocomplete="given-name"
                            value="{{old('firstname')}}" autofocus class="form-control">
                        </div>
                        <span class="help-block"></span>
                    </div>
                    <div class="col-12 col-md-6 mt-2">
                        <label for="lastname">@lang('Lastname') *</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person-lines-fill me-1"></i></span>
                            <input id="lastname" type="text" name="lastname" autocomplete="family-name"
                            value="{{old('lastname')}}" class="form-control">
                        </div>
                        <span class="help-block"></span>
                    </div>
                    <div class="col-12 col-md-6 mt-2">
                        <label for="username">@lang('Username') *</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person-circle me-1"></i></span>
                            <input id="username" type="text" name="username" autocomplete="username"
                            value="{{old('username')}}" class="form-control">
                        </div>
                        <span class="help-block"></span>
                    </div>
                    <div class="col-md-6 mt-2 d-none d-md-block">
                    </div>
                    <div class="col-12 col-md-6 mt-2">
                        <label for="email">@lang('Email') *</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope me-1"></i></span>
                            <input id="email" type="email" name="email" placeholder="ejemplo@empresa.com"
                            autocomplete="email" value="{{old('email')}}" class="form-control">
                        </div>
                        <span class="help-block"></span>
                    </div>
                    <div class="col-12 col-md-6 mt-2">
                        <label for="password">@lang('Password') *</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-shield me-1"></i></span>
                            <input id="password" type="password" name="password" placeholder="*********"
                            autocomplete="new-password" class="form-control">
                        </div>
                        <span class="help-block"></span>
                    </div>
                    <div class="col-12 col-md-6 mt-2">
                        <label for="code">@lang('Phone code')</label>
                        <div class="input-group">
                            <span class="input-group-text pe-3"><i class="bi bi-telephone-plus-fill"></i></span>
                            <select id="code" name="code" class="form-control select-2">
                                @foreach ($countries as $item)
                                    <option value="{{$item->id}}" {{old('code') == $item->id ? 'selected' : ''}}>
                                        +{{$item->phone_code}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <span class="help-block"></span>
                    </div>
                    <div class="col-12 col-md-6 mt-2">
                        <label for="phone">@lang('Phone')</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-telephone me-1"></i></span>
                            <input id="phone" type="tel" name="phone" placeholder="999666333" autocomplete="tel"
                            value="{{old('phone')}}" class="form-control numbers">
                        </div>
                        <span class="help-block"></span>
                    </div>
                    <div class="col-12 col-md-6 mt-2">
                        <label for="country">@lang('Country')</label>
                        <div class="input-group">
                            <span class="input-group-text pe-3"><i class="bi bi-globe"></i></span>
                            <select id="country" name="country" class="form-control select-2">
                                @foreach ($countries as $item)
                                    <option value="{{$item->id}}" {{old('country') == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <span class="help-block"></span>
                    </div>
                    <div class="col-12 col-md-6 mt-2">
                        <label for="state">@lang('State')</label>
                        <div class="input-group">
                            <span class="input-group-text pe-3"><i class="bi bi-map"></i></span>
                            <select id="state" name="state" class="form-control select-2" disabled>
                            </select>
                            <div id="spinner_state" class="spinner-animation" style="display: none;">
                                <span class="spinner-border spinner-border-sm " role="status" aria-hidden="true"></span>
                            </div>
                        </div>
                        <span class="help-block"></span>
                    </div>
                    <div class="col-12 mt-2">
                        <label for="city">@lang('City')</label>
                        <div class="input-group">
                            <span class="input-group-text pe-3"><i class="bi bi-geo-alt"></i></span>
                            <select id="city" name="city" class="form-control select-2" disabled>
                            </select>
                            <div id="spinner_city" class="spinner-animation" style="display: none;">
                                <span class="spinner-border spinner-border-sm " role="status" aria-hidden="true"></span>
                            </div>
                        </div>
                        <span class="help-block"></span>
                    </div>
                    <div class="col-12 mt-2">
                        <label for="address">@lang('Address')</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-pin-map me-1"></i></span>
                            <input id="address" type="text" name="address" placeholder="Calle, Av, Urb, Ciudad"
                            autocomplete="street-address" value="{{old('address')}}" class="form-control">
                        </div>
                        <span class="help-block"></span>
                    </div>
                    <div class="col-12 mt-2">
                        <label for="role">@lang('Roles') *</label>
                        <div class="input-group">
                            <span class="input-group-text pe-3"><i class="bi bi-list-ul"></i></span>
                            <select id="role" name="role[]" class="form-control select-2">
                                @foreach ($roles as $item)
                                    <option value="{{$item->id}}">{{$item->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a id="cancel" href="{{route('user.index')}}" class="btn btn-secondary"><i class="bi bi-x-circle"></i> @lang('Cancel')</a>
                <button id="submit" type="submit" class="btn btn-primary float-end"><i class="bi bi-save"></i> @lang('Save')</button>
                <button id="reset" type="reset" class="btn btn-warning btn-reset me-2 float-end"><i class="bi bi-eraser"></i> @lang('Reset fields')</button>
            </div>
        </form>
    </div>
</x-app-layout>
