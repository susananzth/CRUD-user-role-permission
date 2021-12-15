var new_arr = [];
document.addEventListener("DOMContentLoaded", function(event) {
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
});
