
document.addEventListener("DOMContentLoaded", function (event) {
    $('.alert').delay(4000).slideUp(500, function(){
        $(this).alert('close');
    });
    // Evento del botón mostrar del listado de roles.
    $('.btn-show').on('click', function () {
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
                if (data.code == '200') {
                    // Asigna valores en las etiquetas del 'modalShow'.
                    $("#title_show").html(data.role.title);
                    // Crea array con los permisos del rol, concatenando una separación por comas.
                    let arry_list = [];
                    // 'count' y 'count_array' es para saber cuando concatenar un punto al final del array.
                    let count = 1;
                    let count_array = data.permissions.length;
                    data.permissions.forEach(element => {
                        if (count_array == count){
                            arry_list.push(element.title + '.');
                        }else{
                            arry_list.push(element.title + ', ');
                        }
                        count++;
                    });
                    $("#select_show").html(arry_list);
                    // Oculta el spinner visual de 'cargando'.
                    $("#spinner").hide();
                }else{
                    // Cierra el modal
                    var modal_show = document.getElementById('modal_show');
                    var modal = bootstrap.Modal.getInstance(modal_show)
                    modal.hide();
                    // Refresca la página para mostrar mensaje de error en el alert de la vista.
                    location.reload();
                }
            },
            error: function (data) { // Si la consulta falló...
                // Refresca la página para mostrar mensaje de error en el alert de la vista.
                location.reload();
            }
        });
    });
    // Evento del botón eliminar del listado de roles.
    $('.btn-delete').on('click', function () {
        // Captura el ID del rol almacenado en su atributo 'data-id'
        // Luego lo asigna al atributo 'action' del formulario en 'modalDelete'.
        let id = $(this).attr('data-id');
        $('#form_delete').attr('action', 'role/' + id);
    });
});
