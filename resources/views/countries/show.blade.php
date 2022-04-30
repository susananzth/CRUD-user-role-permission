<div class="modal fade" id="modal_show" tabindex="-1" aria-labelledby="modal_show_label" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title fs-5" id="modal_show_label">@lang('See Country')</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div id="spinner" class="spinner">
                <div class="spinner-grow d-block m-auto" role="status"></div>
                <span class="">@lang('Loading')</span>
            </div>
            <div  class="row">
                <div class="col-12">
                    <label for="name_show">@lang('Name')</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-card-text me-1"></i></span>
                        <input id="name_show" type="text" name="name_show" readonly class="form-control">
                    </div>
                </div>
                <div class="col-12 col-md-6 mt-2">
                    <label for="iso_2_show">@lang('ISO 2 Country code')</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-braces me-1"></i></span>
                        <input id="iso_2_show" type="text" name="iso_2_show" readonly class="form-control">
                    </div>
                </div>
                <div class="col-12 col-md-6 mt-2">
                    <label for="iso_3_show">@lang('ISO 3 Country code')</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-braces me-1"></i></span>
                        <input id="iso_3_show" type="text" name="iso_3_show" readonly class="form-control">
                    </div>
                </div>
                <div class="col-12 col-md-6 mt-2">
                    <label for="iso_number_show">@lang('ISO country number')</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-bullseye me-1"></i></span>
                        <input id="iso_number_show" type="tel" name="iso_number_show" readonly class="form-control">
                    </div>
                </div>
                <div class="col-12 col-md-6 mt-2">
                    <label for="phone_code_show">@lang('Phone code')</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-phone me-1"></i></span>
                        <input id="phone_code_show" type="tel" name="phone_code_show" readonly class="form-control">
                    </div>
                </div>
                <div class="col-12 mt-2">
                    <label for="currency_show">@lang('Currencies')</label>
                    <div class="input-group">
                        <span class="input-group-text pe-3"><i class="bi bi-currency-exchange"></i></span>
                        <textarea id="currency_show" name="currency_show" cols="30" rows="1" readonly class="form-control"></textarea>
                    </div>
                </div>
                <div class="col-12 mt-2">
                    <label for="state_show">@lang('States')</label>
                    <div class="input-group">
                        <span class="input-group-text pe-3"><i class="bi bi-globe"></i></span>
                        <textarea id="state_show" name="state_show" cols="30" rows="2" readonly class="form-control"></textarea>
                    </div>
                </div>
                <div class="col-12 col-md-6 mt-2">
                    <label for="created_at">@lang('Created')</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-calendar me-1"></i></span>
                        <input id="created_at" type="text" name="created_at" readonly class="form-control">
                    </div>
                </div>
                <div class="col-12 col-md-6 mt-2">
                    <label for="updated_at">@lang('Updated')</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-calendar me-1"></i></span>
                        <input id="updated_at" type="text" name="updated_at" readonly class="form-control">
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
