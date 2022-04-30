@section('title', 'Listado de Roles')

@section('rsc_top')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="{{  asset('css/table.css')}}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('js/table.js') }}" defer></script>
    <script src="{{ asset('js/roles/index.js') }}" defer></script>
    <script>
        document.addEventListener("DOMContentLoaded", function (event) {
        // Evento del botón mostrar del listado de roles.
            $('.btn-show').on('click', function () {
                // Muestra el spinner visual de 'cargando'.
                $("#spinner").show();
                // Captura el ID del rol almacenado en su atributo 'data-id'
                let id = $(this).attr('data-id');
                // Almacena el CSRF-TOKEN en la cabecera del ajax.
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                });
                // Almacena variales del tipo de la consulta.
                let type = "get";
                let ajax_url = "role/" + id;
                $.ajax({
                    type: type,
                    url: ajax_url,
                    dataType: 'json',
                    success: function (data) { // Si la consulta fue exisota...
                        if (data.code == '200') {
                            // Asigna valores en las etiquetas del 'modal_show'.
                            $("#title_show").html(data.role.title);
                            // Crea array con los permisos del rol, concatenando una separación por comas.
                            let arry_list = [];
                            // 'count' y 'count_array' es para saber cuando concatenar un punto al final del array.
                            let count = 1;
                            let count_array = data.permissions.length;
                            data.permissions.forEach(element => {
                                let menu = element.permission + " " + element.menu;
                                if (count_array == count){
                                    arry_list.push(menu + '.');
                                }else{
                                    arry_list.push(menu + ', ');
                                }
                                count++;
                            });
                            $("#select_show").html(arry_list);
                            // Oculta el spinner visual de 'cargando'.
                            $("#spinner").hide();
                        }else{
                            // Cierra el modal
                            var modal_show = document.getElementById('modal_show');
                            var modal = bootstrap.Modal.getInstance(modal_show)
                            modal.hide();
                            // Refresca la página para mostrar mensaje de error en el alert de la vista.
                            location.reload();
                        }
                    },
                    error: function (data) { // Si la consulta falló...
                        // Refresca la página para mostrar mensaje de error en el alert de la vista.
                        location.reload();
                    }
                });
            });
        });
    </script>
    <style>
        .table {
            min-width: 700px;
        }
        .form-control:disabled, .form-control[readonly] {
            pointer-events: none;
        }
    </style>
@endsection

<x-app-layout>
    <div class="card m-3">
        <div class="card-header fs-5">
            <i class="bi bi-people me-2"></i> @lang('List of Roles')
        </div>
        <div class="card-body">
            <x-jet-validation-errors/>
            <a href="{{route('role.create')}}" class="btn btn-primary text-white mb-2"><i class="bi bi-plus-circle"></i> @lang('Add Role')</a>
            <table id="table_list" class="table cell-border w-100">
                <thead>
                    <tr>
                        <th style="width: 45%;">@lang('Title')</th>
                        <th style="width: 35%;">@lang('Created')</th>
                        <th class="text-center" style="width: 20%;">@lang('Action')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $rol)
                    <tr>
                        <td>{{$rol->title}}</td>
                        <td>{{$rol->created_at}}</td>
                        <td class="text-center">
                            <a href="#" data-id="{{$rol->id}}" data-bs-toggle="modal" data-bs-target="#modal_show"
                                data-bs-tooltip="tooltip" data-bs-placement="top" title="@lang('See Role')"
                                class="btn-table btn-show">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('role.edit', $rol->id) }}" data-bs-tooltip="tooltip"
                                data-bs-placement="top" title="@lang('Edit Role')" class="btn-table"><i class="bi bi-pencil-square"></i></a>
                            <a href="#" data-id="{{$rol->id}}" data-bs-toggle="modal" data-bs-target="#modal_delete"
                                data-bs-tooltip="tooltip" data-bs-placement="top" title="@lang('Delete Role')"
                                class="btn-table btn-delete">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>@lang('Title')</th>
                        <th>@lang('Created')</th>
                        <th class="text-center">@lang('Action')</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    @include('roles.show')
    <div id="modal_delete" tabindex="-1" aria-labelledby="modal_delete_label" aria-hidden="true" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 id="modal_delete_label" class="modal-title fs-5">@lang('Delete Role')</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="py-3">
                    @lang('Are you sure you want to delete the record?')
                </div>
            </div>
            <div class="modal-footer text-end">
                <form id="form_delete" action="" method="post" >
                    @method('delete')
                    @csrf
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> @lang('Close')</button>
                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i> @lang('Delete')</button>
                </form>
            </div>
          </div>
        </div>
    </div>
</x-app-layout>
