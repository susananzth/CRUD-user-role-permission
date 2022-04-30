document.addEventListener("DOMContentLoaded", function (event) {
    $("#menu_countries").addClass("active");
    $("select").select2({
        placeholder: "Selecctione",
        language: "es",
        multiple: true,
        allowClear: true
    });
    $(".select2-container--default").addClass("form-control w-auto p-0");
    $("#currency").val("").trigger("change");
    var button_reset = document.querySelector(".btn-reset");
    button_reset.addEventListener("click", event => {
        $("#currency").val("").trigger("change");
    });
    $(".numbers").on("keypress", function(tecla) {
        let reg = /^[0-9]*$/;
        if (reg.test(tecla.key)) {
            return true;
        }
        return false;
    });
    $("#form_create").validate({
        onkeyup: false,
        errorClass: "invalid",
        validClass: "success",
        rules: {
            name: { required: true, maxlength: 200 },
            iso_2: { required: false, maxlength: 2 },
            iso_3: { required: false, maxlength: 3 },
            iso_number: { required: false, digits: true, maxlength: 6 },
            phone_code: { required: true, digits: true, maxlength: 6 },
            currency: { required: true }
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
