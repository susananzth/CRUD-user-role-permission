@section('title', 'Editar País')

@section('rsc_top')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="{{  asset('css/forms.css')}}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script src="{{ asset('js/JQ-Validate.js') }}" defer></script>
    <script src="{{ asset('js/countries/edit.js') }}" defer></script>
    <script>
        var currencies = @json($country->currencies);
        var states     = @json($country->states);
    </script>
@endsection

<x-app-layout>
    <div class="card m-3">
        <div class="card-header fs-5">
            @lang('Edit Country')
        </div>
        <form id="form_update" action="{{route('country.update', $country->id)}}" method="post">
            @method('patch')
            @csrf
            <div class="card-body">
                <x-jet-validation-errors/>
                <div  class="row">
                    <p class="m-0 fst-italic">@lang('Fields marked with * are required')</p>
                    <div class="col-12 mt-2">
                        <label for="name">@lang('Name') *</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-card-text me-1"></i></span>
                            <input id="name" type="text" name="name" placeholder="@lang('Country name')"
                            maxlength="200" value="{{ $country->name }}" class="form-control">
                        </div>
                        <span class="help-block"></span>
                    </div>
                    <div class="col-12 col-md-6 mt-2">
                        <label for="iso_2">@lang('ISO 2 Country code')</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-braces me-1"></i></span>
                            <input id="iso_2" type="text" name="iso_2" placeholder="@lang('Example'): MX"
                            maxlength="2" value="{{ $country->iso_2 }}" class="form-control">
                        </div>
                        <span class="help-block"></span>
                    </div>
                    <div class="col-12 col-md-6 mt-2">
                        <label for="iso_3">@lang('ISO 3 Country code')</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-braces me-1"></i></span>
                            <input id="iso_3" type="text" name="iso_3" placeholder="@lang('Example'): MEX"
                            maxlength="3" value="{{ $country->iso_3 }}" class="form-control">
                        </div>
                        <span class="help-block"></span>
                    </div>
                    <div class="col-12 col-md-6 mt-2">
                        <label for="iso_number">@lang('ISO country number')</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-bullseye me-1"></i></span>
                            <input id="iso_number" type="tel" name="iso_number" placeholder="@lang('Example'): 484"
                            maxlength="3" value="{{ $country->iso_number }}" class="form-control numbers">
                        </div>
                        <span class="help-block"></span>
                    </div>
                    <div class="col-12 col-md-6 mt-2">
                        <label for="phone_code">@lang('Phone code') *</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-phone me-1"></i></span>
                            <input id="phone_code" type="tel" name="phone_code" placeholder="@lang('Example'): 52"
                            maxlength="6" value="{{ $country->phone_code }}" class="form-control numbers">
                        </div>
                        <span class="help-block"></span>
                    </div>
                    <div class="col-12 mt-2">
                        <label for="currency">@lang('Currencies') *</label>
                        <div class="input-group">
                            <span class="input-group-text pe-3"><i class="bi bi-currency-exchange"></i></span>
                            <select id="currency" name="currency[]" class="form-control select-2">
                                @foreach ($currencies as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <span class="help-block"></span>
                    </div>
                    <div class="col-12 mt-2">
                        <label for="state_show">@lang('States')</label>
                        <div class="input-group">
                            <span class="input-group-text pe-3"><i class="bi bi-globe"></i></span>
                            <textarea id="state_show" name="state_show" cols="30" rows="2" readonly class="form-control">{{$states}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a id="cancel" href="{{route('country.index')}}" class="btn btn-secondary"><i class="bi bi-x-circle"></i> @lang('Cancel')</a>
                <button id="submit" type="submit" class="btn btn-primary float-end"><i class="bi bi-arrow-up-circle"></i> @lang('Update')</button>
            </div>
        </form>
    </div>
</x-app-layout>
