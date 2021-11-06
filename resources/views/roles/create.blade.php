@section('title', 'Registrar rol')

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection

<x-app-layout>
    <div class="card m-3">
        <div class="card-header">
            Registrar Rol
        </div>
        <form action="{{route('role.store')}}" method="post">
        @csrf
            <div class="card-body">
                <div  class="row">
                    <p class="m-0 italic">Los campos marcados con * son requerido</p>
                    <div class="col-12 mt-2">
                        <label for="title">Título *</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-hash me-1"></i></span>
                            <input id="title" type="text" name="title" placeholder="Nombre del Rol" autocomplete="title"
                            required maxlength="150" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 mt-2">
                        <label for="title">Permisos</label>
                        <div class="input-group">
                            <span class="input-group-text pe-3" id="selectAddon"><i class="bi bi-list-ul"></i></span>
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
                <input id="submit" type="submit" value="Guardar" class="btn btn-primary float-end">
                <input id="reset" type="reset" value="Restablecer campos" class="btn btn-warning btn-reset">
            </div>
        </form>
    </div>
    @section('js')
    <script>
        $(document).ready(function() {

            $("select").select2({
                placeholder: 'Selecctione',
                language: "es",
                multiple: true,
                allowClear: true
            });
            $('.select2-container--default').addClass('form-control w-auto p-0');
            $("select").val('').trigger('change');
            $('.btn-reset').click(function(){
                $("select").val('').trigger('change');
            });
        });
    </script>
    @endsection
</x-app-layout>


