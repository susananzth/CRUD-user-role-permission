var array_currencies = [];
var array_states     = [];
document.addEventListener("DOMContentLoaded", function(event) {
    $("#menu_countries").addClass("active");
    $("select").select2({
        placeholder: "Selecctione",
        language: "es",
        multiple: true,
        allowClear: true
    });
    $(".select2-container--default").addClass("form-control w-auto p-0");
    if (currencies == "") {
        $("#currency").val("").trigger("change");
    } else {
        currencies.forEach(element => {
            array_currencies.push(element.id);
        });
        $("#currency").val(array_currencies).trigger("change");
    }
    if (states == "") {
        $("#state").val("").trigger("change");
    } else {
        states.forEach(element => {
            array_states.push(element.id);
        });
        $("#state").val(array_states).trigger("change");
    }
    $(".numbers").on("keypress", function(tecla) {
        let reg = /^[0-9]*$/;
        if (reg.test(tecla.key)) {
            return true;
        }
        return false;
    });
    $("#form_update").validate({
        onkeyup: false,
        errorClass: "invalid",
        validClass: "success",
        rules: {
            name: { required: true, maxlength: 200 },
            iso_2: { required: false, maxlength: 2 },
            iso_3: { required: false, maxlength: 3 },
            iso_number: { required: false, digits: true, maxlength: 6 },
            phone_code: { required: true, digits: true, maxlength: 6 },
            currency: { required: true },
            state: { required: false }
        },
        errorPlacement : function(error, element) {
            $(element).closest(".input-group").next(".help-block").html(error.html());
        },
        highlight : function(element) {
            $(element).removeClass("success").addClass("invalid");
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass("invalid").addClass("success");
            $(element).closest(".input-group").next(".help-block").html("");
        },
    });
    $("#form_update").on("submit", function(e){
        if ($("#form_update").valid()) {
            return true;
        } else {
            return false;
        }
    });
});
