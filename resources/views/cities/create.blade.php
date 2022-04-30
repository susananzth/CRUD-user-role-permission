@section('title', 'Registrar Ciudad')

@section('rsc_top')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="{{  asset('css/forms.css')}}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script src="{{ asset('js/JQ-Validate.js') }}" defer></script>
    <script src="{{ asset('js/cities/create.js') }}" defer></script>
@endsection

<x-app-layout>
    <div class="card m-3">
        <div class="card-header fs-5">
            @lang('Add City')
        </div>
        <form id="form_create" action="{{route('city.store')}}" method="post">
            @csrf
            <div class="card-body">
                <x-jet-validation-errors/>
                <div  class="row">
                    <p class="m-0 fst-italic">@lang('Fields marked with * are required')</p>
                    <div class="col-12 col-md-6 mt-2">
                        <label for="name">@lang('Name') *</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-card-text me-1"></i></span>
                            <input id="name" type="text" name="name" placeholder="@lang('City name')"
                            maxlength="200" value="{{ old('name') }}" class="form-control">
                        </div>
                        <span class="help-block"></span>
                    </div>
                    <div class="col-12 col-md-6 mt-2">
                        <label for="state">@lang('State') *</label>
                        <div class="input-group">
                            <span class="input-group-text pe-3"><i class="bi bi-globe"></i></span>
                            <select id="state" name="state" class="form-control select-2">
                                <option value="">@lang('Select')</option>
                                @foreach ($states as $item)
                                    <option value="{{$item->id}}" {{ old('name') == $item->id ? 'selected' : '' }}>{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <span class="help-block"></span>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a id="cancel" href="{{route('city.index')}}" class="btn btn-secondary"><i class="bi bi-x-circle"></i> @lang('Cancel')</a>
                <button id="submit" type="submit" class="btn btn-primary float-end"><i class="bi bi-save"></i> @lang('Save')</button>
                <button id="reset" type="reset" class="btn btn-warning btn-reset me-2 float-end"><i class="bi bi-eraser"></i> @lang('Reset fields')</button>
            </div>
        </form>
    </div>
</x-app-layout>
