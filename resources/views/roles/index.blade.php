@section('title', 'Listado de Roles')

@section('rsc_top')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="{{  asset('css/table.css')}}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('js/table.js') }}" defer></script>
    <script src="{{ asset('js/roles.js') }}" defer></script>
@endsection

<x-app-layout>
    <div class="card m-3">
        <div class="card-header fs-5">
            Listado de Roles
        </div>
        <div class="card-body">
            @if (session('message'))
            <div class="alert alert-{{ session('alert_class') ? session('alert_class') : 'info' }} alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                {{ session('message') }}
            </div>
            @endif
            <a href="{{route('role.create')}}" class="btn btn-primary text-white mb-2"><i class="bi bi-plus-circle"></i> Agregar Rol</a>
            <table id="tableList" class="table cell-border w-100">
                <thead>
                    <tr>
                        <th style="width: 45%;">Título</th>
                        <th style="width: 35%;">Creado</th>
                        <th class="text-center" style="width: 20%;">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $rol)
                    <tr>
                        <td>{{$rol->title}}</td>
                        <td>{{$rol->created_at}}</td>
                        <td class="text-center">
                            <a href="#" data-id="{{$rol->id}}" data-bs-toggle="modal" data-bs-target="#showModal"
                                data-bs-tooltip="tooltip" data-bs-placement="top" title="Ver Rol"
                                class="d-inline btn-show">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('role.edit', $rol->id) }}" class="d-inline"><i class="bi bi-pencil-square"></i></a>
                            <a href="#" data-id="{{$rol->id}}" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                data-bs-tooltip="tooltip" data-bs-placement="top" title="Eliminar Rol"
                                class="d-inline btn-delete">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Título</th>
                        <th>Creado</th>
                        <th class="text-center">Acción</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    @include('roles.show')
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title fs-5" id="deleteModalLabel">Eliminar Rol</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="py-3">
                    ¿Está segura(o) de eliminar el registro?
                </div>
            </div>
            <div class="modal-footer text-end">
                <form id="formDelete" action="" method="post" >
                    @method('delete')
                    @csrf
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
          </div>
        </div>
    </div>
</x-app-layout>
