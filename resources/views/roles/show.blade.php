<div class="modal fade" id="modal_show" tabindex="-1" aria-labelledby="modal_show_label" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title fs-5" id="modal_show_label">Ver Rol</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div id="spinner" class="spinner">
                <div class="spinner-grow d-block m-auto" role="status"></div>
                <span class="">Cargando...</span>
            </div>
            <div  class="row">
                <div class="col-12 mt-2">
                    <label for="title">Título</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-hash me-1"></i></span>
                        <label id="title_show" type="text" class="form-control m-0"></label>
                    </div>
                </div>
                <div class="col-12 mt-2">
                    <label for="select">Permisos</label>
                    <div class="input-group">
                        <span class="input-group-text pe-3"><i class="bi bi-list-ul"></i></span>
                        <label id="select_show" type="text" class="form-control m-0"></label>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer text-end">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Cerrar</button>
        </div>
      </div>
    </div>
  </div>
