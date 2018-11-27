$(document).ready(function () {

    $('#u_first_name , #u_last_name').change(function () {
        GetUserName();
    })
});
function GetUserName() {
    var u_first_name = $('#u_first_name').val().toLowerCase();
    var u_last_name = $('#u_last_name').val().toLowerCase();
    // //console.log(u_first_name)
    // //console.log(u_last_name)
    if (!u_first_name) {
        $('#u_name').val(u_last_name);
    } else if (!u_last_name) {
        $('#u_name').val(u_first_name);
    } else {
        $('#u_name').val(u_first_name + '.' + u_last_name);
    }
}