@section('title', 'Listado de Usuarios')

@section('rsc_top')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="{{  asset('css/table.css')}}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('js/moment.min.js') }}" defer></script>
    <script src="{{ asset('js/table.js') }}" defer></script>
    <script src="{{ asset('js/users/index.js') }}" defer></script>
    <style>
        .table {
            min-width: 730px;
        }
        .form-control:disabled, .form-control[readonly] {
            pointer-events: none;
        }
    </style>
@endsection

<x-app-layout>
    <div class="card m-3">
        <div class="card-header fs-5">
            <i class="bi bi-person-check-fill me-2"></i> @lang('List of Users')
        </div>
        <div class="card-body">
            <x-jet-validation-errors/>
            <a href="{{route('user.create')}}" class="btn btn-primary text-white mb-2"><i class="bi bi-plus-circle"></i> @lang('Add User')</a>
            <table id="table_list" class="table cell-border w-100">
                <thead>
                    <tr>
                        <th style="width: 20%;">@lang('Firstname')</th>
                        <th style="width: 20%;">@lang('Lastname')</th>
                        <th style="width: 15%;">@lang('Username')</th>
                        <th style="width: 30%;">@lang('Email')</th>
                        <th class="text-center" style="width: 15%;">@lang('Action')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    @php
                        $admins = $user->roles()->where('id', '>', 2)->get();
                    @endphp
                    @if (count($admins) > 0)
                    <tr>
                        <td>{{$user->firstname}}</td>
                        <td>{{$user->lastname}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->email}}</td>
                        <td class="text-center">
                            <a href="#" data-id="{{$user->id}}" data-bs-toggle="modal" data-bs-target="#modal_show"
                                data-bs-tooltip="tooltip" data-bs-placement="top" title="@lang('See User')"
                                class="btn-table btn-show">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('user.edit', $user->id) }}" data-bs-tooltip="tooltip"
                                data-bs-placement="top" title="@lang('Edit User')" class="btn-table"><i class="bi bi-pencil-square"></i></a>
                            <a href="#" data-id="{{$user->id}}" data-bs-toggle="modal" data-bs-target="#modal_delete"
                                data-bs-tooltip="tooltip" data-bs-placement="top" title="@lang('Delete User')"
                                class="btn-table btn-delete">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>@lang('Firstname')</th>
                        <th>@lang('Lastname')</th>
                        <th>@lang('Username')</th>
                        <th>@lang('Email')</th>
                        <th class="text-center">@lang('Action')</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    @include('users.show')
    <div id="modal_delete" tabindex="-1" aria-labelledby="modal_delete_label" aria-hidden="true" class="modal fade position-absolute">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 id="modal_delete_label" class="modal-title fs-5">@lang('Delete User')</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="py-3">
                    @lang('Are you sure you want to delete the record?')
                </div>
            </div>
            <div class="modal-footer text-end">
                <form id="form_delete" action="" method="post" >
                    @method('delete')
                    @csrf
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> @lang('Close')</button>
                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i> @lang('Delete')</button>
                </form>
            </div>
          </div>
        </div>
    </div>
</x-app-layout>
