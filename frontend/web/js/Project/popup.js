$(document).ready(function () {

    $('#popup-project .filtering-popup, #projects a').click(function (e) {
        //console.log('stop');

        e.stopPropagation();
    });

    $('.popup-close').click(function (e) {
        $('#popup-filtering').removeClass('active-popup')
    });

    $('#popup-project,i.popup-close').click(function (e) {
        $('#id_project').hide();
        $('#id_loader').show();
        clearInterval(commentInterval);
        UpdateProjectList();
        e.stopPropagation();
    })

});