$(document).ready(function () {

    $('.filtering-popup').on('click', '#id_add_checklist', function () {
        $('#id_checklist_members').html('');
        $('#id_checklist_title').val('');
        $('#id_checklist_desc').val('');
        $('#id_checklist_deadline').val('');
        $('#id_create_checklist').show();
        GetAllUsersChecklist()
    });

    $('.filtering-popup').on('click', '#id_save_checklist', function () {
        var data = {};
        data.project_id = $('#id_project').attr('data-id');
        data.title = $('#id_checklist_title').val();
        data.description = $('#id_checklist_desc').val();
        data.deadline = $('#id_checklist_deadline').val();
        data.members = GetMembersListByHtml();
        $.ajax({
            type: "POST",
            url: "/ajax/save-checklist-by-project-id",
            data: data,
            success: function (res) {
                if (res) {
                    $('#id_create_checklist').hide();
                    GetChecklistsByProjectId(data.project_id)
                }
            }
        });
    });

    $('.filtering-popup').on('change', '.checkbox-checklist', function () {
        var ob = $(this);
        var data = {};
        data.id = $(this).attr('data-id');
        $.ajax({
            type: "POST",
            url: "/ajax/save-checklist-status",
            data: data,
            success: function (res) {
                if (res == 1) {
                    // ob.closest('.txt-without-icon').addClass('disabled-area');
                } else {
                    // ob.closest('.txt-without-icon').removeClass('disabled-area');
                }
                CheckSliderStatus();
            }
        });
    });

    $('.filtering-popup').on('click', '.delete-checklist', function (e) {
        if (confirm("Do you really want to delete checklist!") == true) {
            var data = {};
            data.id = $(this).attr('data-id');
            $.ajax({
                type: "POST",
                url: "/ajax/delete-checklist-by-id",
                data: data,
                success: function (res) {
                    if (res) {
                        GetChecklistsByProjectId($('#id_project').attr('data-id'))
                    }
                }
            });
        }
    });

    $('#id_project.filtering-popup').on('click', '#id_checklist_edit', function (e) {
        $('#id_checklists_data .txt-without-icon').removeClass('disabled-area');
    });

    $('#id_checklist_members').on('click', '.remove-member', function () {
        $(this).closest('.checklist-member-add').remove();
        $('#id_checklist_members_list').append(
            '<option data-img = "' + $(this).attr('data-img') + '"  value="' + $(this).attr('data-id') + '">' + $(this).attr('data-name') + '</option>'
        )
    });

    $('.filtering-popup').on('change', '#id_checklist_members_list', function () {
        var id = $('#id_checklist_members_list option:selected').val();
        var img_o = $('#id_checklist_members_list option:selected').attr('data-img');
        var name = $('#id_checklist_members_list option:selected').html();
        var img = (img_o && img_o != 'null') ? '/uploads/' + img_o : '/uploads/no-user.png';

        $('#id_checklist_members').append(
            '<div title="' + name + '" data-id="' + id + '" class="checklist-member-add member-photo brd-rad-4">' +
            '<a href="#" class="d-block p-rel">' +
            '<em data-id="' + id + '" title="Remove member" data-img="' + img_o + '" data-name = "' + name + '" class="remove-member">X</em>' +
            '<img src="' + img + '">' +
            '<em class="tooltip p-abs brd-rad-4 font-12 white-txt">' + name + ' </em>' +
            '</a>' +
            '</div>'
        );

        $('#id_checklist_members_list option:selected').remove();
        $('#id_checklist_members_list').hide();
        $('#id_checklist_add_members').show();
    });
    $('.filtering-popup').on('click', '#id_cancel_checklist', function () {
        $('#id_create_checklist').hide();
    });

    $('.filtering-popup').on('click', '#id_checklist_add_members', function () {
        $(this).hide();
        $('#id_checklist_members_list').show();
    });

});

function GetAllUsersChecklist() {
    $.ajax({
        type: "POST",
        url: "/ajax/get-all-users",
        success: function (members) {
            if (members) {
                $('#id_checklist_members_list').html('<option value="0">Select a members</option>');
                members.forEach(function (val) {
                    $('#id_checklist_members_list').append(
                        '<option data-img = "' + val.image_url + '"  value="' + val.id + '">' + val.firstname + ' ' + val.lastname + '</option>'
                    )
                })
            }
        }
    });
}

function GetMembersListByHtml() {
    var members = [];
    $('#id_checklist_members .member-photo').each(function () {
        members.push($(this).attr('data-id'))
    });
    return members;
}