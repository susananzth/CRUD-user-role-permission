
document.addEventListener("DOMContentLoaded", function (event) {
    $('.btn-show').click(function () {
        let id = $(this).attr('data-id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        var type = "get";
        let ajaxurl = "role/" + id;
        $.ajax({
            type: type,
            url: ajaxurl,
            dataType: 'json',
            success: function (data) {
                $("#title_show").html(data.success.role.title);
                let arr = [];
                data.success.permissions.forEach(element => {
                    arr.push(element.title+', ');
                });
                $("#select_show").html(arr);
                $("#spinner").hide();
            },
            error: function (data) {
                console.log(data);
            }
        });
    });
});
