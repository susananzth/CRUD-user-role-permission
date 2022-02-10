@section('title', 'Inicio')
<x-guest-layout>
    <main class="px-5 py-5 text-white ">
        <h1>@lang('CRUD of Role, Permissions and Users')</h1>
        <p class="lead py-3">
            @lang('User creation project and assignment of roles and permissions. It serves as the basis for any project.')
        </p>
        <p class="lead">
            @lang('Developed with Laravel 8.*, includes Laravel Jetstream authentication system and Bootstrap 5 design toolkit.')
        </p>
        <p class="lead py-3">
            <a href="https://github.com/susananzth/CRUD-user-role-permission"
                target="_blank" rel="noopener noreferrer"
                class="btn btn-lg btn-primary fw-bold">
                @lang('More information') <i class="bi bi-box-arrow-up-right"></i>
            </a>
        </p>
    </main>
</x-guest-layout>
