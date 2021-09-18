@section('title', 'Crear Tarea')
<x-app-layout>
    <div class="card col-6 m-3">
        <div class="card-header">
            <div class="card-title">
                Nueva tarea
            </div>
        </div>
        <form method="POST" action="{{ route('task.store') }}">
            @csrf
            <div class="card-body">
                    <div class="form-group">
                        <x-jet-label for="description" value="{{ __('Descripción') }}" />
                        <x-jet-input id="description" type="text"
                            name="description" :value="old('description')" required autocomplete="description" autofocus />
                    </div>
            </div>
            <div class="card-footer">
                <x-jet-secondary-button>
                    {{ __('Cancelar') }}
                </x-jet-secondary-button>
                <x-jet-button class="float-end">
                    {{ __('Guardar') }}
                </x-jet-button>
            </div>
        </form>
    </div>
</x-app-layout>
