@section('title', 'Listado roles')

<x-app-layout>
    <div class="card m-3">
        <div class="card-header">
            Listado de roles
        </div>
        <div class="card-body">
            <a href="{{route('role.create')}}" class="btn btn-primary text-white mb-2">Agregar Rol</a>
            <table id="tableList" class="table cell-border w-100">
                <thead>
                    <tr>
                        <th class="w-50">Título</th>
                        <th class="w-25">Creado</th>
                        <th class="text-center w-25">Acción</th>
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
