@section('title', 'Editar Tarea')
<x-app-layout>
    <div class="card col-6 m-3">
        <div class="card-header">
            <div class="card-title">
                Editar tarea
            </div>
        </div>
        <form method="POST" action="{{ route('task.update', $task->id) }}">
            @method('patch')
            @csrf
            <div class="card-body">
                    <div class="form-group">
                        <x-jet-label for="description" value="{{ __('Descripción') }}" />
                        <x-jet-input id="description" type="text"
                            name="description" value="{{$task->description}}" required autocomplete="description" autofocus />
                    </div>
            </div>
            <div class="card-footer">
                <x-jet-secondary-button>
                    {{ __('Cancelar') }}
                </x-jet-secondary-button>
                <x-jet-button class="float-end">
                    {{ __('Actualizar') }}
                </x-jet-button>
            </div>
        </form>
    </div>
</x-app-layout>

