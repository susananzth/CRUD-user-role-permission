<div class="modal fade" id="modal_show" tabindex="-1" aria-labelledby="modal_show_label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title fs-5" id="modal_show_label">@lang('See User')</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div id="spinner" class="spinner">
                <div class="spinner-grow d-block m-auto" role="status"></div>
                <span class="">@lang('Loading')</span>
            </div>
            <div  class="row">
                <div class="col-12 col-md-6 mt-2">
                    <label for="name_show">@lang('Firstname')</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person-lines-fill me-1"></i></span>
                        <input id="name_show" type="text" name="name_show" readonly class="form-control">
                    </div>
                </div>
                <div class="col-12 col-md-6 mt-2">
                    <label for="last_name_show">@lang('Lastname')</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person-lines-fill me-1"></i></span>
                        <input id="last_name_show" type="text" name="last_name_show" readonly class="form-control">
                    </div>
                </div>
                <div class="col-12 col-md-6 mt-2">
                    <label for="username_show">@lang('Username')</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person-circle me-1"></i></span>
                        <input id="username_show" type="text" name="username_show" readonly class="form-control">
                    </div>
                </div>
                <div class="col-12 col-md-6 mt-2">
                    <label for="phone_show">@lang('Phone')</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-telephone me-1"></i></span>
                        <input id="phone_show" type="text" name="phone_show" readonly class="form-control">
                    </div>
                </div>
                <div class="col-12 mt-2">
                    <label for="email_show">@lang('Email')</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope me-1"></i></span>
                        <input id="email_show" type="text" name="email_show" readonly class="form-control">
                    </div>
                </div>
                <div class="col-12 col-md-6 mt-2">
                    <label for="country_show">@lang('Country')</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-globe me-1"></i></span>
                        <input id="country_show" type="text" name="country_show" readonly class="form-control">
                    </div>
                </div>
                <div class="col-12 col-md-6 mt-2">
                    <label for="state_show">@lang('State')</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-map me-1"></i></span>
                        <input id="state_show" type="text" name="state_show" readonly class="form-control">
                    </div>
                </div>
                <div class="col-12 mt-2">
                    <label for="city_show">@lang('City')</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-geo-alt me-1"></i></span>
                        <input id="city_show" type="text" name="city_show" readonly class="form-control">
                    </div>
                </div>
                <div class="col-12 mt-2">
                    <label for="address_show">@lang('Address')</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-pin-map me-1"></i></span>
                        <input id="address_show" type="text" name="address_show" readonly class="form-control">
                    </div>
                </div>
                <div class="col-12 col-md-6 mt-2">
                    <label for="create_show">@lang('Created')</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-calendar me-1"></i></span>
                        <input id="create_show" type="text" name="create_show" readonly class="form-control">
                    </div>
                </div>
                <div class="col-12 col-md-6 mt-2">
                    <label for="update_show">@lang('Updated')</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-calendar me-1"></i></span>
                        <input id="update_show" type="text" name="update_show" readonly class="form-control">
                    </div>
                </div>
                <div class="col-12 mt-2">
                    <label for="select">@lang('Roles')</label>
                    <div class="input-group">
                        <span class="input-group-text pe-3"><i class="bi bi-list-ul"></i></span>
                        <input id="select_show" type="text" name="select_show" readonly class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer text-end">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> @lang('Close')</button>
        </div>
      </div>
    </div>
  </div>
