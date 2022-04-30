@section('title', 'Panel administrativo')
@section('rsc_top')
    <script>
        document.addEventListener("DOMContentLoaded", function (event) {
            $("#menu_dashboard").addClass("active");
        });
    </script>
@endsection
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
