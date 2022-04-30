document.addEventListener("DOMContentLoaded", function (event) {
    $("#menu_states").addClass("active");
    $("#country").select2({
        placeholder: "Selecctione",
        language: "es"
    });
    $(".select2-container--default").addClass("form-control w-auto p-0");
    var button_reset = document.querySelector(".btn-reset");
    button_reset.addEventListener("click", event => {
        $("#country").val("").trigger("change");
    });
    $("#form_create").validate({
        onkeyup: false,
        errorClass: "invalid",
        validClass: "success",
        rules: {
            name: { required: true, maxlength: 200 },
            iso_2: { required: false, maxlength: 4 },
            country: { required: true, digits: true, maxlength: 20 },
        },
        errorPlacement: function (error, element) {
            $(element).closest(".input-group").next(".help-block").html(error.html());
        },
        highlight: function (element) {
            $(element).removeClass("success").addClass("invalid");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass("invalid").addClass("success");
            $(element).closest(".input-group").next(".help-block").html("");
        },
    });
    $("#form_create").on("submit", function (e) {
        if ($("#form_create").valid()) {
            return true;
        } else {
            return false;
        }
    });
});