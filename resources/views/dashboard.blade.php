@section('title', 'Panel administrativo')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto">
            <div class="bg-white overflow-hidden">
                <x-jet-welcome />
            </div>
        </div>
    </div>
</x-app-layout>
