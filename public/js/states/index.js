
document.addEventListener("DOMContentLoaded", function (event) {
    $("#menu_states").addClass("active");
    $(".alert").delay(4000).slideUp(500, function () {
        $(this).alert("close");
    });
    // Evento del botón mostrar del listado de países.
    $("#table_list").on("click", ".btn-show", function () {
        // Muestra el spinner visual de "cargando".
        $("#spinner").show();
        // Captura el ID del país almacenado en su atributo "data-id"
        let id = $(this).attr("data-id");
        // Almacena el CSRF-TOKEN en la cabecera del ajax.
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": jQuery('meta[name="csrf-token"]').attr("content")
            }
        });
        // Almacena variales del tipo de la consulta.
        let type = "get";
        let ajax_url = "state/" + id;
        $.ajax({
            type: type,
            url: ajax_url,
            dataType: "json",
            success: function (data) { // Si la consulta fue exisota...
                if (data.code == "200") {
                    // Asigna valores en las etiquetas del "modal_show".
                    $("#name_show").val(data.state.name);
                    $("#country_show").val(data.country);
                    $("#iso_2_show").val(data.state.iso_2);
                    $("#created_at").val(moment(data.state.created_at).format("DD/MM/YYYY HH:mm"));
                    $("#updated_at").val(moment(data.state.updated_at).format("DD/MM/YYYY HH:mm"));
                    // Crea array con las ciudades del estado, concatenando una separación por comas.
                    let arry_list = [];
                    // "count" y "count_array" es para saber cuando concatenar un punto al final del array.
                    let count = 1;
                    let count_array = data.cities.length;
                    data.cities.forEach(element => {
                        if (count_array == count) {
                            arry_list.push(element.name + ".");
                        } else {
                            arry_list.push(element.name + ", ");
                        }
                        count++;
                    });
                    $("#city_show").val(arry_list);
                    // Oculta el spinner visual de "cargando".
                    $("#spinner").hide();
                } else {
                    // Cierra el modal
                    var modal_show = document.getElementById("modal_show");
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
    // Evento del botón eliminar del listado de países.
    $("#table_list").on("click", ".btn-delete", function () {
        // Captura el ID del país almacenado en su atributo "data-id"
        // Luego lo asigna al atributo "action" del formulario en "modal_delete".
        let id = $(this).attr("data-id");
        $("#form_delete").attr("action", "state/" + id);
    });
});
