<nav class="navbar navbar-light navbar-panel">
    <div class="container-fluid d-block">
        {{--<a href="{{ route('home') }}" class="navbar-brand">
            <x-jet-application-mark  />
        </a>
        <!-- Navigation Links -->
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-jet-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                {{ __('Dashboard') }}
            </x-jet-nav-link>
        </div>--}}
        <!-- Teams Dropdown -->
        @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
            <div class="ml-3 relative">
                <x-jet-dropdown align="right" width="60">
                    <x-slot name="trigger">
                        <span class="inline-flex rounded-md">
                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                                {{ Auth::user()->currentTeam->name }}

                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </span>
                    </x-slot>

                    <x-slot name="content">
                        <div class="w-60">
                            <!-- Team Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                @lang('Manage team')
                            </div>

                            <!-- Team Settings -->
                            <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                @lang('Team settings')
                            </x-jet-dropdown-link>

                            @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                    @lang('Create new team"')
                                </x-jet-dropdown-link>
                            @endcan

                            <div class="border-t border-gray-100"></div>

                            <!-- Team Switcher -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                @lang('Switch teams')
                            </div>

                            @foreach (Auth::user()->allTeams() as $team)
                                <x-jet-switchable-team :team="$team" />
                            @endforeach
                        </div>
                    </x-slot>
                </x-jet-dropdown>
            </div>
        @endif
        <!-- Settings Dropdown -->
        <li class="nav-item dropdown float-end">
            <a id="dropdown_profile" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" class="nav-link dropdown-toggle">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->username }}" />
                @else
                {{ Auth::user()->username }}
                @endif
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown_profile">
                <li><span class="dropdown-item-text text-muted" style="width: max-content;">@lang('Account settings')</span></li>
                <x-jet-dropdown-link href="{{ route('profile.show') }}">
                    @lang('Profile')
                </x-jet-dropdown-link>
                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                        @lang('API Tokens')
                    </x-jet-dropdown-link>
                @endif
                <li><hr class="dropdown-divider"></li>
                <x-jet-dropdown-link href="{{ route('logout') }}" data-bs-toggle="modal" data-bs-target="#modal_logout">
                    @lang('Log Out')
                </x-jet-dropdown-link>
            </ul>
        </li>
        @if(count(config('app.languages')) > 1)
        <li class="nav-item dropdown float-end me-3">
            <a id="dropdown_language" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" class="nav-link dropdown-toggle">
                <i class="bi bi-globe"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown_language">
                @foreach(config('app.languages') as $lang_locale => $lang_name)
                    <x-jet-dropdown-link href="{{ url()->current() }}?lang={{ $lang_locale }}">
                        @lang($lang_name) ({{ strtoupper($lang_locale) }})
                    </x-jet-dropdown-link>
                @endforeach
            </ul>
        </li>
        @endif
    </div>
</nav>

{{-- Ventana modal de cerrar sesión --}}
<div class="modal fade" id="modal_logout" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="label_modal_logout" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="label_modal_logout">@lang('Ready to Leave?')</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @lang('Select *Logout* below if you are ready to end your current session.')
            </div>
            <div class="modal-footer">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('Cancel')</button>
                <button type="submit" class="btn btn-primary">@lang('Logout')</button>
            </form>
            </div>
        </div>
    </div>
</div>

