@section('title', 'Registrar rol')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{  asset('css/select2.min.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.2.0/dist/select2-bootstrap-5-theme.rtl.min.css" />
@endsection

<x-app-layout>
    <div class="card m-3">
        <div class="card-header">
            Registrar Rol
        </div>
        <div class="card-body">
            <p class="m-0 italic">Los campos marcados con * son requerido</p>
            <form action="{{route('role.store')}}" method="post" class="row">
                @csrf
                <div class="col-12 mt-2">
                    <label for="title">Título *</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-hash me-1"></i></span>
                        <input id="title" type="text" name="title" placeholder="Nombre del Rol" autocomplete="title"
                        required maxlength="150" class="form-control">
                    </div>
                </div>
                <div class="col-12 mt-2">
                    <div class="input-group">
                        <span class="input-group-text" id="selectAddon"><i class="bi bi-list-ul"></i></span>
                        <select id="select" name="permission[]" class="form-control select-2">
                            <option value="1">Arriba</option>
                            <option value="2">Abajo</option>
                            <option value="3">Derecha</option>
                            <option value="4">Izquierda</option>
                          </select>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

@section('scripts')

@endsection
