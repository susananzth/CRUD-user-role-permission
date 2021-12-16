@section('title', 'Registrar Rol')

@section('rsc_top')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="{{  asset('css/forms.css')}}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script src="{{ asset('js/JQ-Validate.js') }}" defer></script>
    <script src="{{ asset('js/roles/create.js') }}" defer></script>
@endsection

<x-app-layout>
    <div class="card m-3">
        <div class="card-header fs-5">
            Registrar Rol
        </div>
        <form id="form_create" action="{{route('role.store')}}" method="post">
            @csrf
            <div class="card-body">
                @include('partials.alerts')
                <div  class="row">
                    <p class="m-0 italic">Los campos marcados con * son requerido</p>
                    <div class="col-12 mt-2">
                        <label for="title">Título *</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-hash me-1"></i></span>
                            <input id="title" type="text" name="title" placeholder="Nombre del Rol" autocomplete="title"
                             maxlength="150" class="form-control">
                        </div>
                        <span class="help-block"></span>
                    </div>
                    <div class="col-12 mt-2">
                        <label for="select">Permisos</label>
                        <div class="input-group">
                            <span class="input-group-text pe-3"><i class="bi bi-list-ul"></i></span>
                            <select id="select" name="permission[]" class="form-control select-2">
                                @foreach ($permissions as $item)
                                    <option value="{{$item->id}}">{{$item->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a id="cancel" href="{{route('role.index')}}" class="btn btn-secondary"><i class="bi bi-x-circle"></i> Cancelar</a>
                <button id="submit" type="submit" class="btn btn-primary float-end"><i class="bi bi-save"></i> Guardar</button>
                <button id="reset" type="reset" class="btn btn-warning btn-reset me-2 float-end"><i class="bi bi-eraser"></i> Restablecer campos</button>
            </div>
        </form>
    </div>
</x-app-layout>
