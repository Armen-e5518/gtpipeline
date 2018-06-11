$(document).ready(function () {


    $(document).on('click', '.delete-project', function (e) {
        if (confirm("Do you want to delete the project?!")) {
            var ob = $(this);
            var data = {};
            data.id = ob.attr('data-id');
            $.ajax({
                type: "POST",
                url: "/ajax/delete-project",
                data: data,
                success: function (res) {
                    if (res == true) {
                        UpdateProjectList();
                    }
                }
            });
            e.stopPropagation();
        }
    })

});