document.addEventListener("DOMContentLoaded", function(event) {
    $("select").select2({
        placeholder: 'Selecctione',
        language: "es",
        multiple: true,
        allowClear: true
    });
    $('.select2-container--default').addClass('form-control w-auto p-0');
    $("select").val('').trigger('change');
    var button_reset = document.querySelector('.btn-reset');
    button_reset.addEventListener('click', event => {
        $("select").val('').trigger('change');
    });
    $("#form_create").validate({
        onkeyup: false,
        errorClass: "invalid",
        validClass: "success",
        rules: {
            title: { required: true, maxlength: 255 },
            select: { required: false }
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
    $("#form_create").on('submit', function(e){
        if ($("#form_create").valid()) {
            return true;
        } else {
            return false;
        }
    });
});
