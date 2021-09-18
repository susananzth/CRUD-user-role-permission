@section('title', 'Mostrar Tarea')
<x-app-layout>
    <div class="card col-6 m-3">
        <div class="card-header">
            <div class="card-title">
                Mostrar tarea
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <x-jet-label for="description" value="{{ __('Descripción') }}" />
                <x-jet-label for="description" value="{{$task->description}}" />
            </div>
        </div>
    </div>
</x-app-layout>
