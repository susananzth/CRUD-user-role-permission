@section('title', 'Listado roles')

<x-app-layout>
    <div class="card m-3">
        <div class="card-header">
            <div class="card-title">
                Listado de roles
            </div>
        </div>
        <div class="card-body">
            <a href="{{route('role.create')}}" class="btn btn-primary text-white mb-2">Agregar rol</a>
            <table id="tableList" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Creado</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $rol)
                    <tr>
                        <td>{{$rol->title}}</td>
                        <td>{{$rol->created_at}}</td>
                        <td>
                            <a href="{{ route('role.show', $rol->id) }}" class="d-inline"><i class="bi bi-eye"></i></a>
                            <a href="{{ route('role.edit', $rol->id) }}" class="d-inline"><i class="bi bi-pencil-square"></i></a>
                            <form action="{{route('role.destroy', $rol->id)}}" method="post"  class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="d-inline botder-0"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Título</th>
                        <th>Creado</th>
                        <th>Acción</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</x-app-layout>
