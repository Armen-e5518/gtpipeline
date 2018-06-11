$(document).ready(function () {

    $('.delete-user-photo').click(function () {
        var ob = $(this);
        var data = {};
        data.id = ob.attr('data-id');
        $.ajax({
            type: "POST",
            url: "/ajax/delete-user-photo",
            data: data,
            success: function (res) {
                if (res == true) {
                    ob.closest('.attachment').hide();
                }
            }
        });
    });

});