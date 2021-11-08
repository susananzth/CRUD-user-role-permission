
document.addEventListener("DOMContentLoaded", function (event) {
    // Evento del botón mostrar del listado de roles.
    $('.btn-show').click(function () {
        // Muestra el spinner visual de 'cargando'.
        $("#spinner").hide();
        // Captura el ID del rol almacenado en su atributo 'data-id'
        let id = $(this).attr('data-id');
        // Almacena el CSRF-TOKEN en la cabecera del ajax.
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        // Almacena variales del tipo de la consulta.
        let type = "get";
        let ajax_url = "role/" + id;
        $.ajax({
            type: type,
            url: ajax_url,
            dataType: 'json',
            success: function (data) { // Si la consulta fue exisota...
                //Si el status del response es diferente a '200'.anchor.
                if (data.status != '200') {
                    // Muestra mensaje de error en el alert de la vista.
                    $('#danger_code').html(data.code + ': ');
                    $('#danger_status').html(data.status);
                    $('.alert-danger').show();
                }else{
                    // Asigna valores en las etiquetas del 'modalShow'.
                    $("#title_show").html(data.role.title);
                    // Crea array con los permisos del rol, concatenando una separación por comas.
                    let arr = [];
                    data.permissions.forEach(element => {
                        arr.push(element.title + ', ');
                    });
                    $("#select_show").html(arr);
                    // Oculta el spinner visual de 'cargando'.
                    $("#spinner").hide();
                }
            },
            error: function (data) { // Si la consulta falló...
                // Muestra mensaje de error en el alert de la vista.
                $('#danger_code').html(data.code + ': ');
                $('#danger_status').html(data.status);
                $('.alert-danger').show();
            }
        });
    });
    // Evento del botón eliminar del listado de roles.
    $('.btn-delete').click(function () {
        // Captura el ID del rol almacenado en su atributo 'data-id'
        // Luego lo asigna al atributo 'action' del formulario en 'modalDelete'.
        let id = $(this).attr('data-id');
        $('#formDelete').attr('action', 'role/' + id);
    });
});
