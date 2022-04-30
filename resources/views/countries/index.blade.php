@section('title', 'Listado de Países')

@section('rsc_top')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="{{  asset('css/table.css')}}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://momentjs.com/downloads/moment.js"></script>
    <script src="{{ asset('js/table.js') }}" defer></script>
    <script src="{{ asset('js/countries/index.js') }}" defer></script>
    <style>
        .table {
            min-width: 790px;
        }
        .form-control:disabled, .form-control[readonly] {
            pointer-events: none;
        }
    </style>
@endsection

<x-app-layout>
    <div class="card m-3">
        <div class="card-header fs-5">
            <i class="bi bi-globe me-2"></i> @lang('List of Countries')
        </div>
        <div class="card-body">
            <x-jet-validation-errors/>
            <a href="{{ route('country.create') }}" class="btn btn-primary text-white mb-2"><i class="bi bi-plus-circle"></i> @lang('Add Country')</a>
            <table id="table_list" class="table cell-border w-100">
                <thead>
                    <tr>
                        <th style="width: 23%;">@lang('Name')</th>
                        <th style="width: 22%;">@lang('ISO 2 Country code')</th>
                        <th style="width: 22%;">@lang('ISO 3 Country code')</th>
                        <th style="width: 20%;">@lang('Updated')</th>
                        <th class="text-center" style="width: 13%;">@lang('Action')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($countries as $country)
                    <tr>
                        <td>{{ $country->name }}</td>
                        <td>{{ $country->iso_2 }}</td>
                        <td>{{ $country->iso_3 }}</td>
                        <td>{{ date_format($country->updated_at, 'd/m/Y H:i:s') }}</td>
                        <td class="text-center">
                            <a href="#" data-id="{{ $country->id }}" data-bs-toggle="modal" data-bs-target="#modal_show"
                                data-bs-tooltip="tooltip" data-bs-placement="top" title="@lang('See Country')"
                                class="btn-table btn-show">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('country.edit', $country->id) }}" data-bs-tooltip="tooltip"
                                data-bs-placement="top" title="@lang('Edit Country')" class="btn-table"><i class="bi bi-pencil-square"></i></a>
                            <a href="#" data-id="{{ $country->id }}" data-bs-toggle="modal" data-bs-target="#modal_delete"
                                data-bs-tooltip="tooltip" data-bs-placement="top" title="@lang('Delete Country')"
                                class="btn-table btn-delete">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>@lang('Name')</th>
                        <th>@lang('ISO 2 Country code')</th>
                        <th>@lang('ISO 3 Country code')</th>
                        <th>@lang('Updated')</th>
                        <th class="text-center">@lang('Action')</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    @include('countries.show')
    <div id="modal_delete" tabindex="-1" aria-labelledby="modal_delete_label" aria-hidden="true" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 id="modal_delete_label" class="modal-title fs-5">@lang('Delete Country')</h5>
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
