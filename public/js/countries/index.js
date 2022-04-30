
document.addEventListener("DOMContentLoaded", function (event) {
    $("#menu_countries").addClass("active");
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
        let ajax_url = "country/" + id;
        $.ajax({
            type: type,
            url: ajax_url,
            dataType: "json",
            success: function (data) { // Si la consulta fue exisota...
                if (data.code == "200") {
                    // Asigna valores en las etiquetas del "modal_show".
                    $("#name_show").val(data.country.name);
                    $("#iso_2_show").val(data.country.iso_2);
                    $("#iso_3_show").val(data.country.iso_3);
                    $("#iso_number_show").val(data.country.iso_number);
                    $("#phone_code_show").val("+" + data.country.phone_code);
                    $("#created_at").val(moment(data.country.created_at).format("DD/MM/YYYY HH:mm"));
                    $("#updated_at").val(moment(data.country.updated_at).format("DD/MM/YYYY HH:mm"));
                    // Crea array con las monedas y estados del país, concatenando una separación por comas.
                    let list_currencies = [];
                    let list_states     = [];
                    // "count" y "count_array" es para saber cuando concatenar un punto al final del array.
                    let count = 1;
                    let count_array = data.currencies.length;
                    data.currencies.forEach(element => {
                        if (count_array == count) {
                            list_currencies.push(element.name + ".");
                        } else {
                            list_currencies.push(element.name);
                        }
                        count++;
                    });
                    $("#currency_show").val(list_currencies);
                    count = 1;
                    count_array = data.states.length;
                    data.states.forEach(element => {
                        if (count_array == count) {
                            list_states.push(element.name + ".");
                        } else {
                            list_states.push(element.name);
                        }
                        count++;
                    });
                    $("#state_show").val(list_states);
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
        $("#form_delete").attr("action", "country/" + id);
    });
});
