@section('title', 'Listado roles')

@section('rsc_top')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="{{  asset('css/table.css')}}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('js/table.js') }}" defer></script>
@endsection

<x-app-layout>
    <div class="card m-3">
        <div class="card-header fs-5">
            Listado de Roles
        </div>
        <div class="card-body">
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
                            <a href="{{ route('role.show', $rol->id) }}" class="d-inline"><i class="bi bi-eye"></i></a>
                            <a href="{{ route('role.edit', $rol->id) }}" class="d-inline"><i class="bi bi-pencil-square"></i></a>
                            <form action="{{route('role.destroy', $rol->id)}}" method="post"  class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn-link d-inline botder-0"><i class="bi bi-trash"></i></button>
                            </form>
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
</x-app-layout>
