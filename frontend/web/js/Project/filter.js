$(document).ready(function () {

    if (window.location.hash) {
        var id = window.location.hash.slice(1);
        if ($("div[data-id='" + id + "']").length > 0) {
            $('#projects').scrollTop($("div[data-id='" + id + "']").offset().top)
        }
    }

    $("#id_deadline_from").datepicker({dateFormat: 'dd-mm-yy'});
    $("#id_deadline_to").datepicker({dateFormat: 'dd-mm-yy'});


});