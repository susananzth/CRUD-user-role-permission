var new_arr = [];
document.addEventListener("DOMContentLoaded", function(event) {
    $("#menu_roles").addClass("active");
    $("select").select2({
        placeholder: 'Selecctione',
        language: "es",
        multiple: true,
        allowClear: true
    });
    $('.select2-container--default').addClass('form-control w-auto p-0');
    if (permissions == '') {
        $("select").val('').trigger('change');
    } else {
        permissions.forEach(element => {
            new_arr.push(element.id);
        });
        $("select").val(new_arr).trigger('change');
    }
    $("#form_update").validate({
        onkeyup: false,
        errorClass: "invalid",
        validClass: "success",
        rules: {
            title: { required: true, maxlength: 255 },
        },
        errorPlacement : function(error, element) {
            $(element).closest('.input-group').next('.help-block').html(error.html());
        },
        highlight : function(element) {
            $(element).removeClass('success').addClass('invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('invalid').addClass('success');
            $(element).closest('.input-group').next('.help-block').html('');
        },
    });
    $("#form_update").on('submit', function(e){
        if ($("#form_update").valid()) {
            if ($("#select").val() == "") {
                $($("#select")).removeClass('success').addClass('invalid');
                $($("#select")).closest('.input-group').next('.help-block').html("Este campo es obligatorio.");
                return false;
            } else {
                $($("#select")).removeClass('invalid').addClass('success');
                $($("#select")).closest('.input-group').next('.help-block').html('');
                return true;
            }
        } else {
            return false;
        }
    });
})
