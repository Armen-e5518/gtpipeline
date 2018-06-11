function GetProjectHtmlByProjectId(roul) {
    console.log('User-', roul);
    if (roul == 'creator') {
        GetTitleEdit(true);
        GetDecisionMakersEdit(true);
        GetDescriptionEdit(true);
        GetAttachmentsEdit(true);
        GetChecklistEditEdit(false);
        GetAssignTasksEdit(false);
        GetStatusCEdit(true,true);
    }
    if (roul == 'moderator') {
        GetTitleEdit(true);
        GetDecisionMakersEdit(true);
        GetDescriptionEdit(true);
        GetAttachmentsEdit(true);
        GetChecklistEditEdit(true);
        GetAssignTasksEdit(true);
        GetStatusCEdit(true);
    }
    if (roul == 'closed') {
        GetTitleEdit(false);
        GetDecisionMakersEdit(false);
        GetDescriptionEdit(false);
        GetAttachmentsEdit(true);
        GetChecklistEditEdit(false);
        GetAssignTasksEdit(false);
        GetStatusCEdit(false);
    }


    $("#id_checklist_deadline").datepicker();
}


function GetTitleEdit(OpenFlag) {
    if (OpenFlag) {
        $('#id_title_edit').html('<textarea id="id_project_title" class="font-w-700 brd-rad-4 w-100-perc"></textarea>');
    } else {
        $('#id_title_edit').html('<h1 id="id_project_title" class="font-w-700 brd-rad-4 w-100-perc"></h1>');
    }
}

function GetDecisionMakersEdit(OpenFlag) {
    if (OpenFlag) {
        $('#id_decision_makers_edit').html(
            '<a href="#" id="id_add_members" title="Add members" class="add-member font-14 font-w-700"><i' +
            'class ="fa fa-user-plus"></i>Assign other members</a>' +
            '<select id="id_members" title="Select a member" style="display: none"' +
            'class="change-status-type padding-5 transparent-bg  gray-txt font-15">' +
            '<option value="0">Select a members</option>' +
            '</select> '
        )
    } else {
        $('#id_decision_makers_edit').html('')
    }
}

function GetDescriptionEdit(OpenFlag) {
    if (OpenFlag) {
        $('#id_description_edit').html('<a href="#" title="Edit project description" id="id_edit_project_des">Edit</a>')
    } else {
        $('#id_description_edit').html('')
    }
}

function GetAttachmentsEdit(OpenFlag) {
    if (OpenFlag) {
        $('#id_attachments_edit').html(
            '<div class="txt-without-icon attach-file-block">' +
            '<span title="Closed" id="id_close_attach_file" style="display: none">X</span>' +
            '<div id="fileuploader" style="display: none">Upload</div>' +
            '<a href="#" title="Attach new file" id="id_attach_file" class="add-member font-14 font-w-700"><i class="fa fa-paperclip"></i>Attach file</a>' +
            '</div>'
        )
    } else {
        $('#id_attachments_edit').html('')
    }
}

function GetChecklistEditEdit(OpenFlag) {
    if (OpenFlag) {
        $('#id_checklist_edit_edit').html('<a href="#edit" title="Edit checklist" id="id_checklist_edit">Edit</a>')
    } else {
        $('#id_checklist_edit_edit').html('')
    }
}

function GetStatusCEdit(OpenFlag, crater) {
    if (crater == true) {
        var id = 'id_approve_creator'
    } else {
        var id = 'id_approve'
    }
    if (OpenFlag) {
        $('#id_status_c_edit').html(
            '<ul>' +
            '<li>' +
            '<button style="display: none"' +
            'id="id_submit"' +
            'title="Submit project"' +
            'class="txt-upper status-class green-txt transparent-bg green-border font-18 w-100-perc font-w-700 padding-5">' +
            '<i class="fa fa-check"></i> Submit' +
            '</button>' +
            '</li>' +
            '<li>' +
            '<button style="display:none;"' +
            'id="' + id + '"' +
            'title="Approve project"' +
            'class="txt-upper status-class green-bg white-txt no-border font-18 w-100-perc font-w-700 padding-5">' +
            '<i class="fa fa-check"></i> Approve' +
            '</button>' +
            '</li>' +
            '<li>' +
            '<button style="display:none;"' +
            'id="id_reject"' +
            'title="Reject project"' +
            'class="txt-upper status-class transparent-bg red-border font-15 w-100-perc font-w-700">' +
            '<i class="fa fa-times"></i> Dismiss' +
            '</button>' +
            '</li>' +
            '<li>' +
            '<button style="display:none;"' +
            'id="id_accepted"' +
            'title="Accepted project"' +
            'class="txt-upper status-class green-txt transparent-bg green-border font-18 w-100-perc font-w-700 padding-5">' +
            '<i class="fa fa-check"></i> Accepted' +
            '</button>' +
            '</li>' +
            '<li>' +
            '<button style="display:none;"' +
            'id="id_closed"' +
            'title="Closed project"' +
            'class="txt-upper status-class transparent-bg red-border font-15 w-100-perc font-w-700">' +
            '<i class="fa fa-times"></i> Rejected' +
            '</button>' +
            '</li>' +
            '</ul>'
        )
    } else {
        $('#id_status_c_edit').html('')
    }
}

function GetAssignTasksEdit(OpenFlag) {
    if (OpenFlag) {
        $('#id_assign_tasks_edit').html(
            '<ul>' +
            '<li>' +
            '<button style="display:none;"' +
            'id="id_add_checklist"' +
            'class="transparent-bg violet-border violet-txt font-15 w-100-perc font-w-500">' +
            '<i class="fa fa-calendar-check-o"></i>Create task' +
            '</button>' +
            '<div style="display: none" id="id_create_checklist"' +
            'class="subpopup filtering-popup card-detail-popup brd-rad-4 p-rel">' +
            '<div class="list-data">' +
            '<span>Title</span>' +
            '<input id="id_checklist_title"' +
            'type="text"' +
            'class="d-block font-w-300 brd-rad-4 w-100-perc">' +
            '</div>' +
            '<div class="list-data">' +
            '<span>Description</span>' +
            '<div class="txt-without-icon no-padding">' +
            '<textarea id="id_checklist_desc"' +
            'class="d-block font-w-300 brd-rad-4 w-100-perc"></textarea>' +
            '</div>' +
            '</div>' +
            '<div class="list-data">' +
            '<span>Deadline</span>' +
            '<input id="id_checklist_deadline"' +
            'type="text"' +
            'class="d-block font-w-300 brd-rad-4 w-100-perc">' +
            '</div>' +
            '<div class="post-responsible-people font-15 font-w-700">' +
            '<span class="d-block">Responsible people</span>' +
            '<span id="id_checklist_members"></span>' +
            '&nbsp;' +
            '<a href="#" id="id_checklist_add_members" title="Add members"' +
            'class="add-member font-14 font-w-700">' +
            '<i class="fa fa-user-plus"></i>Assign other members' +
            '</a>' +
            '<select id="id_checklist_members_list"' +
            'title="Select a member"' +
            'style="display: none"' +
            'class="change-status-type padding-5 transparent-bg  gray-txt font-15">' +
            '<option>Select a members</option>' +
            '</select>' +
            '</div>' +
            '<div class="list-data" id="id_checklist_buttons">' +
            '<button title="Save" id="id_save_checklist"' +
            'class="red-border d-block font-15 white-bg font-w-700">' +
            'Create' +
            '</button>' +
            '<button title="Cencel" id="id_cancel_checklist"' +
            'class="red-border d-block font-15 white-bg font-w-700">' +
            'Cancel' +
            '</button>' +
            '</div>' +
            '</div>' +
            '</li>' +
            '</ul>'
        )
    } else {
        $('#id_assign_tasks_edit').html('')
    }
}

// --------------------------------------------------

function CheckOpenOrNot(project_id) {

    var data = {};
    data.id = project_id;
    $.ajax({
        type: "POST",
        url: "/ajax/get-project-rules",
        data: data,
        success: function (res) {
            if (res) {
                GetProjectHtmlByProjectId(res)
            }
        }
    });
}