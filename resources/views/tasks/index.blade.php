@section('title', 'Listado sareas')

<x-app-layout>
    <div class="card m-3">
        <div class="card-header">
            <div class="card-title">
                Listado de tareas
            </div>
        </div>
        <div class="card-body">
            <a href="{{route('task.create')}}" target="_blank" rel="noopener noreferrer"
                class="btn btn-primary text-white mb-2">Nueva tarea</a>
            <table id="table_list" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Descripción</th>
                        <th>Creado</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                    <tr>
                        <td>{{$task->id}}</td>
                        <td>{{$task->description}}</td>
                        <td>{{$task->created_at}}</td>
                        <td>
                            <a href="{{ route('task.show', $task->id) }}" target="_blank" rel="noopener noreferrer" class="d-inline"><i class="bi bi-eye"></i></a>
                            <a href="{{ route('task.edit', $task->id) }}" target="_blank" rel="noopener noreferrer" class="d-inline"><i class="bi bi-pencil-square"></i></a>
                            <form action="{{route('task.destroy', $task->id)}}" method="post" class="d-inline">
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
                        <th>ID</th>
                        <th>Descripción</th>
                        <th>Creado</th>
                        <th>Acción</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</x-app-layout>
