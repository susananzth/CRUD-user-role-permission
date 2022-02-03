@section('title', 'Registrar Usuario')

@section('rsc_top')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="{{  asset('css/forms.css')}}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script src="{{ asset('js/JQ-Validate.js') }}" defer></script>
    <script src="{{ asset('js/roles/create.js') }}" defer></script>
@endsection

<x-app-layout>
    <div class="card m-3">
        <div class="card-header fs-5">
            Registrar Usuario
        </div>
        <form id="form_create" action="{{route('user.store')}}" method="post">
            @csrf
            <div class="card-body">
                @include('partials.alerts')
                <div  class="row">
                    <p class="m-0 italic">Los campos marcados con * son requerido</p>
                    <div class="col-12 col-md-6 mt-2">
                        <label for="first_name">Nombres *</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person-lines-fill me-1"></i></span>
                            <input id="first_name" type="text" name="first_name" placeholder="Nombres del Usuario" autocomplete="given-name"
                             maxlength="150" class="form-control">
                        </div>
                        <span class="help-block"></span>
                    </div>
                    <div class="col-12 col-md-6 mt-2">
                        <label for="last_name">Apellidos *</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person-lines-fill me-1"></i></span>
                            <input id="last_name" type="text" name="last_name" placeholder="Apellidos del Usuario" autocomplete="family-name"
                             maxlength="150" class="form-control">
                        </div>
                        <span class="help-block"></span>
                    </div>
                    <div class="col-12 col-md-6 mt-2">
                        <label for="username">Usuario *</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person-circle me-1"></i></span>
                            <input id="username" type="text" name="username" placeholder="Nombre de usuario" autocomplete="username"
                             maxlength="30" class="form-control">
                        </div>
                        <span class="help-block"></span>
                    </div>
                    <div class="col-12 col-md-6 mt-2">
                        <label for="email">Correo *</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope me-1"></i></span>
                            <input id="email" type="email" name="email" placeholder="ejemplo@empresa.com" autocomplete="email"
                             maxlength="200" class="form-control">
                        </div>
                        <span class="help-block"></span>
                    </div>
                    <div class="col-12 col-md-6 mt-2">
                        <label for="password">Contraseña *</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-shield me-1"></i></span>
                            <input id="password" type="password" name="password" placeholder="*********" autocomplete="new-password"
                             maxlength="20" class="form-control">
                        </div>
                        <span class="help-block"></span>
                    </div>
                    <div class="col-12 col-md-6 mt-2">
                        <label for="repeat_password">Repetir Contraseña *</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-shield me-1"></i></span>
                            <input id="repeat_password" type="password" name="repeat_password" placeholder="*********" autocomplete="off"
                             maxlength="20" class="form-control">
                        </div>
                        <span class="help-block"></span>
                    </div>
                    <div class="col-12 col-md-6 mt-2">
                        <label for="code">Código de país *</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-globe2 me-1"></i></span>
                            <input id="code" type="text" name="code" placeholder="+51" autocomplete="tel-country-code"
                             maxlength="4" class="form-control">
                        </div>
                        <span class="help-block"></span>
                    </div>
                    <div class="col-12 col-md-6 mt-2">
                        <label for="phone">Teléfono *</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-telephone me-1"></i></span>
                            <input id="phone" type="tel" name="phone" placeholder="999666333" autocomplete="tel"
                             maxlength="9" class="form-control">
                        </div>
                        <span class="help-block"></span>
                    </div>
                    <div class="col-12 mt-2">
                        <label for="address">Dirección *</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope me-1"></i></span>
                            <input id="address" type="text" name="address" placeholder="Calle, Av, Urb, Ciudad" autocomplete="street-address"
                             maxlength="250" class="form-control">
                        </div>
                        <span class="help-block"></span>
                    </div>
                    <div class="col-12 mt-2">
                        <label for="select">Rol(es)</label>
                        <div class="input-group">
                            <span class="input-group-text pe-3"><i class="bi bi-list-ul"></i></span>
                            <select id="select" name="role[]" class="form-control select-2">
                                @foreach ($roles as $item)
                                    <option value="{{$item->id}}">{{$item->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a id="cancel" href="{{route('user.index')}}" class="btn btn-secondary"><i class="bi bi-x-circle"></i> Cancelar</a>
                <button id="submit" type="submit" class="btn btn-primary float-end"><i class="bi bi-save"></i> Guardar</button>
                <button id="reset" type="reset" class="btn btn-warning btn-reset me-2 float-end"><i class="bi bi-eraser"></i> Restablecer campos</button>
            </div>
        </form>
    </div>
</x-app-layout>
