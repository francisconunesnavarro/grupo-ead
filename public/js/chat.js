function save_new_chat_text(chat_id) {
    if (!jQuery('#new_chat_text').val()) {
        alert('É preciso escrever algo.');
        return false;
    }
    jQuery('#btn_save_chat').attr("disabled", true);
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "chat/save_new_chat_text",
        type: "post",
        dataType: 'json',
        data: {
            text: jQuery('#new_chat_text').val(),
            chat_id: chat_id
        },
        success: function (response) {
            jQuery('#btn_save_chat').attr("disabled", false);
            jQuery("#chat_messages").load(jQuery("body").data("baseurl") + "chat/open_chat_messages", {"chat_id": chat_id});
        }
    });
    jQuery('#new_chat_text').val('');

}

function open_chat(chat_id) {
    jQuery("#layout_div").load(jQuery("body").data("baseurl") + "chat/open_chat", {"chat_id": chat_id});
}

function send_message_enter(chat_id, e) {
    if (e.keyCode == 13) {
        save_new_chat_text(chat_id);
    }
}