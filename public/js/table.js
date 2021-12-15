document.addEventListener("DOMContentLoaded", function (event) {
    $('#table_list').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "No hay registros para mostrar",
            "info": "Mostrando _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros para mostrar",
            "infoFiltered": "(filtered from _MAX_ total records)",
            "decimal":        ".",
            "emptyTable":     "No hay registros para mostrar",
            "infoPostFix":    "",
            "thousands":      ",",
            "loadingRecords": "Cargando...",
            "processing":     "Procesando...",
            "search":         "Buscar:",
            "paginate": {
                "first":      '<i class="bi bi-chevron-double-left"></i>',
                "last":       '<i class="bi bi-chevron-double-right"></i>',
                "next":       '<i class="bi bi-chevron-right"></i>',
                "previous":   '<i class="bi bi-chevron-left"></i>',
            },
            "aria": {
                "sortAscending":  ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
            }
        }
    });
});
