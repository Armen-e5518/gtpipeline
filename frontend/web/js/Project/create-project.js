var submitted = false;
$(document).ready(function () {
    window.onbeforeunload = function (e) {
        if ( !submitted) {
            var message = "Your changes will be not saved. Are you sure you want to leave?", e = e || window.event;
            if (e) {
                e.returnValue = message;
            }
            return message;
        }
    };
    $(document).on('click', function(e) {
        if($(e.target).hasClass("save-form")) {
            submitted = true;
        }else {
            submitted = false;
        }
    });

});