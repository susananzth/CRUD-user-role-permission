@extends('layouts.app')

@section('title', 'Listado de Tareas')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
@endsection

@section('content')
{{-- Título --}}
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Listado de Tareas</h1>
</div>

<div class="container">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Listado de tareas</h6>
        </div>
        <div class="card-body">
            <div class="">
                <table class="table table-bordered" id="dataTableTask" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Descripción</th>
                            <th>Creado</th>
                            <th>Actualizado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Descripción</th>
                            <th>Creado</th>
                            <th>Actualizado</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($tasks as $task)
                        <tr>
                            <td>{{ $task->id }}</td>
                            <td>{{ $task->description }}</td>
                            <td>{{ $task->created_at }}</td>
                            <td>{{ $task->updated_at }}</td>
                            <td>
                                <a href="{{ route('task.show', $task->id) }}" class="d-inline"><i class="fas fa-fw fa-eye"></i></a>
                                <a href="{{ route('task.edit', $task->id) }}" class="d-inline"><i class="fas fa-fw fa-edit"></i></a>
                                <a href="{{ route('task.destroy', $task->id) }}" class="d-inline"><i class="fas fa-fw fa-trash"></i></a>
                            </td>
                        </tr> 
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script>
    jQuery( document ).ready(function( $ ) {
        $('#dataTableTask').DataTable();
    });
</script>
@endsection