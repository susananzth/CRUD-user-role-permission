

document.addEventListener("DOMContentLoaded", function (event) {
    $("#menu_roles").addClass("active");
    $('.alert').delay(4000).slideUp(500, function(){
        $(this).alert('close');
    });
    // Evento del botón eliminar del listado de roles.
    $("#table_list").on("click", ".btn-delete", function () {
        // Captura el ID del rol almacenado en su atributo 'data-id'
        // Luego lo asigna al atributo 'action' del formulario en 'modal_delete'.
        let id = $(this).attr('data-id');
        $('#form_delete').attr('action', 'role/' + id);
    });
});
