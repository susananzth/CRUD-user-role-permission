var arr_roles = [];
document.addEventListener("DOMContentLoaded", function(event) {
    $("#menu_administrators").addClass("active");
    $("#code, #country, #state, #city").select2({
        placeholder: 'Selecctione',
        language: "es",
    });
    $("#role").select2({
        placeholder: 'Selecctione',
        language: "es",
        multiple: true,
        allowClear: true
    });
    $('.select2-container--default').addClass('form-control w-auto p-0');
    if (roles == '') {
        $("#role").val('').trigger('change');
    } else {
        roles.forEach(element => {
            arr_roles.push(element.id);
        });
        $("#role").val(arr_roles).trigger('change');
    }
    $(".numbers").on("keypress", function(tecla) {
        let reg = /^[0-9]*$/;
        if (reg.test(tecla.key)) {
            return true;
        }
        return false;
    });
    $("#country").on("change", function() {
        $("#state, #city").html("").attr('disabled', true);
        $("#country").attr("disabled", true);
        $("#spinner_state").show();
        let id = $("#country").val();
        if (id != "") {
            // Almacena el CSRF-TOKEN en la cabecera del ajax.
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "../../states/" + id,
            })
            .done(function(data) {
                let html = `<option value="">${trans_select}</option>`;
                data.states.forEach(element => {
                    html += `<option value="${element.id}">${element.name}</option>`;
                });
                $("#state").html(html).attr('disabled', false);
                $("#state").select2({
                    placeholder: 'Selecctione',
                    language: "es",
                });
                $("#state").next(".select2").addClass("form-control w-auto p-0");
                $("#country").attr("disabled", false);
                $('#spinner_state').hide();
            })
            .fail(function() {
                location.reload();
            });
        }
    });
    $("#state").on("change", function() {
        $("#country, #state").attr("disabled", true);
        $("#city").html("").attr("disabled", true);
        $("#spinner_city").show();
        let id = $("#state").val();
        if (id != "") {
            // Almacena el CSRF-TOKEN en la cabecera del ajax.
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "../../cities/" + id,
            })
            .done(function(data) {
                let html = `<option value="">${trans_select}</option>`;
                data.cities.forEach(element => {
                    html += `<option value="${element.id}">${element.name}</option>`;
                });
                $("#city").html(html).attr('disabled', false);
                $("#city").select2({
                    placeholder: 'Selecctione',
                    language: "es",
                });
                $("#city").next(".select2").addClass("form-control w-auto p-0");
                $("#country, #state").attr("disabled", false);
                $("#spinner_city").hide();
            })
            .fail(function() {
                location.reload();
            });
        }
    });
    $.validator.addMethod("lettersonly", function(value, element, regexp) {
        var re = new RegExp(/^[\s\p{L}-]*$/u);
        return this.optional(element) || re.test(value);
    }, "Ingrese solo letras, por favor.");
    $.validator.addMethod("alpha_num", function(value, element, regexp) {
        var re = new RegExp(/^([a-zA-Z0-9]+)$/);
        return this.optional(element) || re.test(value);
    }, "El usuario solo debe contener letras y números.");
    $("#form_update").validate({
        onkeyup: false,
        errorClass: "invalid",
        validClass: "success",
        rules: {
            firstname: { required: true, lettersonly: true, maxlength: 200 },
            lastname: { required: true, lettersonly: true, maxlength: 200 },
            username: { required: true, alpha_num: true, maxlength: 30 },
            email: { required: true, email:true, maxlength: 200 },
            password: { required: false, minlength:8, maxlength: 50 },
            code: { required: false, number: true },
            phone: { required: false, number: true, maxlength: 25 },
            country: { required: false, number: true },
            state: { required: false, number: true },
            city: { required: false, number: true },
            address: { required: false, maxlength: 255 },
            role: { required: false }
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
            return true;
        } else {
            return false;
        }
    });
});
