@extends('layouts.app')

@section('css')
<!-- CDN DataTable con Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css" rel="stylesheet" crossorigin="anonymous" />
@endsection

@section('content')
<div class="container">
    <button id="addRow">añadir fila</button>
    <form method="POST" action="{{ url('posts') }}">
        @csrf
        <div class="datatable table-responsive">
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Contenido</th>
                    </tr>
                </thead>
                <tbody>
                      
                </tbody>
            </table>
        </div>
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
            </div>
        </div>
    </form>
</div>

@endsection

@section('scripts')
<!-- JS Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        var t = $('#example').DataTable();
    
        $('#addRow').on( 'click', function () {
            t.row.add( [
                'Nombre' +'<input type="text" class="form-control" name="name[]" required autofocus>',
                'Contenido' +'<input type="text" class="form-control" name="content[]" required>'
            ] ).draw( false );
        } );
        // Automatically add a first row of data
        $('#addRow').click();
    });
</script>
@endsection'