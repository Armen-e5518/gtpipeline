$(document).ready(function () {

    $('.filtering-popup').on('click', '#id_approve', function () {
        var data = {};
        data.project_id = $('#id_project').attr('data-id');
        data.status = 1;
        $.ajax({
            type: "POST",
            url: "/ajax/save-change-status",
            data: data,
            success: function (res) {
                if (res) {
                    var Status = GetStatusTile(data.status);
                    ApproveStatus()
                    $('#id_status_title').html(Status.title).attr('class','post-status font-w-700 txt-upper').addClass(Status.class);
                }
            }
        });
    });
    $('.filtering-popup').on('click', '#id_submit', function () {
        $('#id_pop_submitted').show();
    });
    $('.filtering-popup').on('click', '#id_save_submitted', function () {
        $('#id_checklist_buttons .load').show();
        var data = {};
        data.project_id = $('#id_project').attr('data-id');
        data.name_firm = $('#id_name_firm').val();
        data.project_value = $('#id_project_value').val();
        data.industry_id = $('#id_industry_id').val();
        data.service_id = $('#id_service_id').val();
        data.consultants = $('#id_consultants').val();
        data.lead_partner = $('#id_lead_partner').val();
        data.partner_contact = $('#id_partner_contact').val();
        data.location_within_country = $('#id_location_within_country').val();
        $.ajax({
            type: "POST",
            url: "/ajax/save-submitted-data",
            data: data,
            success: function (res) {
                if (res == true) {
                    var data = {};
                    data.project_id = $('#id_project').attr('data-id');
                    data.status = 2;
                    $.ajax({
                        type: "POST",
                        url: "/ajax/save-change-status",
                        data: data,
                        success: function (res) {
                            $('#id_checklist_buttons .load').hide();
                            if (res) {
                                $('#id_pop_submitted').hide();
                                var Status = GetStatusTile(data.status);
                                SubmitStatus();
                                $('#id_status_title').html(Status.title).attr('class','post-status font-w-700 txt-upper').addClass(Status.class);
                            }
                        }
                    });
                }
            }
        });
    });

    $('.filtering-popup').on('click', '#id_accepted', function () {
        $('#id_pop_accepted').show();

    });

    $('.filtering-popup').on('click', '#id_save_accepted', function () {
        $('#id_checklist_buttons .load').show();
        var data = {};
        data.project_id = $('#id_project').attr('data-id');
        data.address_client = $('#id_address_client').val();
        data.duration_assignment = $('#id_duration_assignment').val();
        data.staff_months = $('#id_staff_months').val();
        data.services_value = $('#id_services_value').val();
        data.start_date = $('#id_start_date').val();
        data.completion_date = $('#id_completion_date').val();
        data.name_senior_professional = $('#id_name_senior_professional').val();
        data.assignment_id = $('#id_assignment_id').val();
        data.proportion = $('#id_proportion').val();
        data.no_professional_staff = $('#id_no_professional_staff').val();
        data.no_provided_staff = $('#id_no_provided_staff').val();
        data.narrative_description = $('#id_narrative_description').val();
        data.actual_services_description = $('#id_actual_services_description').val();
        $.ajax({
            type: "POST",
            url: "/ajax/save-accepted-data",
            data: data,
            success: function (res) {
                if (res == true) {
                    var data = {};
                    data.project_id = $('#id_project').attr('data-id');
                    data.status = 3;
                    $.ajax({
                        type: "POST",
                        url: "/ajax/save-change-status",
                        data: data,
                        success: function (res) {
                            $('#id_checklist_buttons .load').hide();
                            if (res) {
                                $('#id_pop_accepted').hide();
                                var Status = GetStatusTile(data.status);
                                HideButtons()
                                $('#id_status_title').html(Status.title).attr('class','post-status font-w-700 txt-upper').addClass(Status.class);
                            }
                        }
                    });
                }
            }
        });
    });

    $('.filtering-popup').on('click', '#id_reject', function () {
        var data = {};
        data.project_id = $('#id_project').attr('data-id');
        data.status = 4;
        $.ajax({
            type: "POST",
            url: "/ajax/save-change-status",
            data: data,
            success: function (res) {
                if (res) {
                    var Status = GetStatusTile(data.status);
                    HideButtons()
                    $('#id_status_title').html(Status.title).attr('class','post-status font-w-700 txt-upper').addClass(Status.class);
                }
            }
        });
    });

    $('.filtering-popup').on('click', '#id_closed', function () {
        var data = {};
        data.project_id = $('#id_project').attr('data-id');
        data.status = 5;
        $.ajax({
            type: "POST",
            url: "/ajax/save-change-status",
            data: data,
            success: function (res) {
                if (res) {
                    var Status = GetStatusTile(data.status);
                    HideButtons()
                    $('#id_status_title').html(Status.title).attr('class','post-status font-w-700 txt-upper').addClass(Status.class);
                }
            }
        });
    });
});

function ApproveStatus() {
    $('#id_checklist_block').show();
    $('#id_buttons').show();
    // $('#id_change_status').show();
    $('#id_add_checklist').show();
    $('#id_submit').show();
    $('#id_approve').hide();
    $('#id_decision_makers_edit').show();
    $('#id_reject').hide();
}
function SubmitStatus() {
    $('#id_buttons').show();
    $('#id_submit').hide();
    $('#id_checklist_block').show();
    // $('#id_change_status').show();
    $('#id_add_checklist').show();
    $('#id_accepted').show();
    $('#id_closed').show();
    $('#id_decision_makers_edit').show();
}
function HideButtons() {
    $('#id_buttons').hide();
    $('#id_checklist_block').show();
    $('#id_add_checklist').show();
    $('#id_decision_makers_edit').show();
}