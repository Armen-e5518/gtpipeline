$(document).ready(function () {
    $(document).on('click', '.post-actions .stop-remove ,.post-actions .stop-archive', function (e) {
        e.preventDefault();
        e.stopPropagation();
    })

});