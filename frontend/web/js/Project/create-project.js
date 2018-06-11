var submitted = false;

$(document).ready(function () {
    window.onbeforeunload = function (e) {
        console.log('submitted',submitted);
        if ( !submitted) {
            var message = "Your changes will be not saved. Are you sure you want to leave?", e = e || window.event;
            if (e) {
                e.returnValue = message;
            }
            return message;
        }
    };

    $("#save_form").click(function() {
        submitted = true;
    });

    setInterval(function () {
        submitted = false;
    },500)

});