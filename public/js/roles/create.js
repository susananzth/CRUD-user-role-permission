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
});
