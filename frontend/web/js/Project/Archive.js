$(document).ready(function () {


    $(document).on('click', '.archive-project', function (e) {
        var ob = $(this);
        var data = {};
        data.id = ob.attr('data-id');
        $.ajax({
            type: "POST",
            url: "/ajax/add-archive",
            data: data,
            success: function (res) {
                if (res == true) {
                    UpdateProjectList();
                }
            }
        });
        e.stopPropagation();
    })

});