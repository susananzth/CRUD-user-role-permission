<div class="card">
    <div class="card-header fs-5">
        Información de perfil
    </div>
    <form id="form_create" action="{{route('role.store')}}" method="post">
        @csrf
        <div class="card-body">
            <div  class="row">
                <p class="m-0 italic">Los campos marcados con * son requerido</p>
                <!-- Profile Photo -->
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                        <!-- Profile Photo File Input -->
                        <input type="file" class="hidden"
                                    wire:model="photo"
                                    x-ref="photo"
                                    x-on:change="
                                            photoName = $refs.photo.files[0].name;
                                            const reader = new FileReader();
                                            reader.onload = (e) => {
                                                photoPreview = e.target.result;
                                            };
                                            reader.readAsDataURL($refs.photo.files[0]);
                                    " />

                        <x-jet-label for="photo" value="{{ __('Photo') }}" />

                        <!-- Current Profile Photo -->
                        <div class="mt-2" x-show="! photoPreview">
                            <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                        </div>

                        <!-- New Profile Photo Preview -->
                        <div class="mt-2" x-show="photoPreview">
                            <span class="block rounded-full w-20 h-20"
                                x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                            </span>
                        </div>

                        <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                            {{ __('Select A New Photo') }}
                        </x-jet-secondary-button>

                        @if ($this->user->profile_photo_path)
                            <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                                {{ __('Remove Photo') }}
                            </x-jet-secondary-button>
                        @endif

                        <x-jet-input-error for="photo" class="mt-2" />
                    </div>
                @endif
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
            </div>
        </div>
        <div class="card-footer">
            <a id="cancel" href="{{route('home')}}" class="btn btn-secondary"><i class="bi bi-x-circle"></i> Cancelar</a>
            <button id="submit" type="submit" class="btn btn-primary float-end"><i class="bi bi-save"></i> Guardar</button>
        </div>
    </form>
</div>
