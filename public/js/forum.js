function save_new_forum_text(forum_id) {
    if (!jQuery('#new_forum_text').code()) {
        alert('É preciso preencher o campo de texto do fórum!');
        return false;
    }
    jQuery('#btn_save_forum').attr("disabled", true);
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "home/save_new_forum_text",
        type: "post",
        dataType: 'json',
        data: {
            text: jQuery('#new_forum_text').code(),
            forum_id: forum_id
        },
        success: function (response) {
                jQuery("#layout_div").load(jQuery("body").data("baseurl") + "home/open_forum", {"forum_id": forum_id});
                send_email_new_forum_message(forum_id);
        }
    });
}
function send_email_new_forum_message(forum_id){
 jQuery.ajax({
        url: jQuery("body").data("baseurl") + "home/send_email_new_forum_message",
        type: "post",
        dataType: 'json',
        data: {
            forum_id: forum_id
        },
        success: function (response) {
        }
    });   
}

function open_forum(forum_id) {
    jQuery("#layout_div").load(jQuery("body").data("baseurl") + "home/open_forum", {"forum_id": forum_id});
}

function load_forum(id) {
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "home/load_forum",
        type: "post",
        dataType: 'json',
        data: {
            id: id
        },
        success: function (response) {
            jQuery('#forum_id').val(id);
            jQuery('#name').val(response.forum.forum_title);
            jQuery('#div-forum').slideDown();
            jQuery('#category').select2('val', response.forum.category_id);
            jQuery('#discipline').select2('val', response.forum.discipline_id);
        }
    });
}

function delete_forum(id) {
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "home/delete_forum",
        type: "post",
        dataType: 'json',
        data: {
            id: id
        },
        success: function (response) {
            jQuery('.forum_row#' + id).hide();
        }
    });
}

function save_forum() {
    if (!jQuery('#name_forum').val()) {
        alert('É preciso preencher o nome do fórum!');
        return false;
    }
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "home/save_forum",
        type: "post",
        dataType: 'json',
        data: {
            id: jQuery('#forum_id').val(),
            title: jQuery('#name_forum').val(),
            category_id: jQuery('#category_id').val(),
            discipline_id: jQuery('#discipline_id').val()
        },
        success: function (response) {
            jQuery("#layout_div").load(jQuery("body").data("baseurl") + "home/open_forum", {"forum_id": response.forum_id});
        }
    });
}