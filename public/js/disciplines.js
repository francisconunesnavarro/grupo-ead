
function alertasucesso(msg) {
    var notice = new PNotify({
        title: 'Obrigado!',
        text: msg + ' inserida com sucesso',
        addclass: 'stack-topleft',
        type: 'success'
    });
}
function alertafalha(msg) {
    var notice = new PNotify({
        title: 'Atenção!',
        text: msg,
        addclass: 'click-2-close',
        type: 'error',
        hide: false,
        buttons: {
            closer: true,
            sticker: false
        }
    });
}

function download_content_file(id) {
    jQuery.ajax({
        url: jQuery("body").data('baseurl') + 'modules/downloadContentFile/' + id,
        type: "post",
        dataType: 'json',
        success: function (response) {
            window.location.href = response.data;
        }
    });
}

function open_content_video(id) {
    jQuery('#view_video').html('');
    jQuery('.add-divs').hide();
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "disciplines/load_content_text",
        type: "post",
        dataType: 'json',
        data: {
            id: id
        },
        success: function (response) {
            jQuery('#view_video').html('<iframe class="embed-responsive-item" style="width:100%; height:100%;" src="' + jQuery("body").data('baseurl') + response.content.content + '"></iframe>');
            jQuery('#view_video').show();
        }
    });
}

function loadContentVideo(id, div) {
    jQuery('#view_video').html('');
    jQuery('.add-divs').hide();
    jQuery('#' + div).html('<video width="100%" height="500" preload controls> <source src="' + jQuery("body").data("baseurl") + 'modules/openContentCheck/' + id + '" /> </video>');
    jQuery('#view_video').show();
}

function loadContentImage(id, div) {
    jQuery('#view_video').html('');
    jQuery('.add-divs').hide();
    jQuery('#' + div).html('<img width="100%" src="' + jQuery("body").data("baseurl") + 'modules/openContentCheck/' + id + '" >');
    jQuery('#view_image').show();
}

function loadContent(id, div) {
    jQuery('#view_video').html('');
    jQuery('.add-divs').hide();
    jQuery('#' + div).html('<embed src="' + jQuery("body").data("baseurl") + 'modules/openContentCheck/' + id + '" width="100%" height="500px" controls="false"> </embed>');
    jQuery('#view_file').show();
}

function loadContentText(id, div) {
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "disciplines/load_content_text",
        type: "post",
        dataType: 'json',
        data: {
            id: id
        },
        success: function (response) {
            jQuery('#' + div).html(response.content.content);
        }
    });
}

function loadContentEvaluation(id, div) {
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "modules/can_open_evaluation",
        type: "post",
        dataType: 'json',
        data: {
            id: id
        },
        success: function (response) {
            if (response.status == 'OK') {
                jQuery("#" + div).load(jQuery("body").data("baseurl") + "modules/create_student_evaluation", {"id": id});
            } else {
                // exibe mensagem do pq nao pode abrir a prova
                jQuery("#" + div).load(jQuery("body").data("baseurl") + "home/view_message", {"message": response.message});
            }
        }
    });
}

function professor_view_file(id) {
    jQuery('#view_video').html('');
    jQuery('.add-divs').hide();
    jQuery('#view_file').html('<embed src="' + jQuery("body").data("baseurl") + 'modules/openContentCheck/' + id + '" width="100%" height="500px" controls="false"> </embed>');
    jQuery('#view_file').show();
}

function professor_view_video(id) {
    jQuery('#view_video').html('');
    jQuery('.add-divs').hide();
    jQuery('#view_video').html('<video width="100%" height="500" preload controls> <source src="' + jQuery("body").data("baseurl") + 'modules/openContentCheck/' + id + '" /> </video>');
    jQuery('#view_video').show();
}

function open_content_text(id) {
    jQuery('#view_video').html('');
    jQuery('.add-divs').hide();
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "disciplines/load_content_text",
        type: "post",
        dataType: 'json',
        data: {
            id: id
        },
        success: function (response) {
            jQuery('#view_text').html(response.content.content);
            jQuery('#view_text').show();
        }
    });
}

function open_content_evaluation(id) {

    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "modules/can_open_evaluation",
        type: "post",
        dataType: 'json',
        data: {
            id: id
        },
        success: function (response) {
            if (response.status == 'OK') {
                jQuery('#view_video').html('');
                jQuery('.add-divs').hide();
                jQuery("#view_evaluation").load(jQuery("body").data("baseurl") + "modules/create_student_evaluation", {"id": id});
                jQuery('#view_evaluation').show();
            } else {
                // exibe mensagem do pq nao pode abrir a prova
                jQuery('#view_video').html('');
                jQuery('.add-divs').hide();
                jQuery("#view_evaluation").load(jQuery("body").data("baseurl") + "home/view_message", {"message": response.message});
                jQuery('#view_evaluation').show();
            }
        }
    });

}

function finish_evaluation(evaluation_id) {
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "modules/finish_evaluation",
        type: "post",
        dataType: 'json',
        data: {
            replys: jQuery('#form_evaluation').serializeArray(),
            evaluation_id: evaluation_id,
            module_id: jQuery('#module_id').val()
        },
        success: function (response) {
            jQuery('#view_video').html('');
            jQuery('.add-divs').hide();
            jQuery("#view_evaluation").load(jQuery("body").data("baseurl") + "home/view_message", {"message": response.message});
            jQuery('#view_evaluation').show();
//            if (response.status == 'OK') {
//                setTimeout(location.reload(), 300);
//            }
        }
    });
}

function load_content_video_name(id) {
    jQuery('.add-divs').slideUp();
    jQuery('#view_video').html('');
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "disciplines/load_content_text",
        type: "post",
        dataType: 'json',
        data: {
            id: id
        },
        success: function (response) {
            jQuery('#video-name').val(response.content.name);
            jQuery('#video_order').val(response.content.order);
            jQuery('#content_video_id').val(id);
            jQuery('#div-video-name').slideDown();
        }
    });
}

function load_content_image_name(id) {
    jQuery('.add-divs').slideUp();
    jQuery('#image_video').html('');
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "disciplines/load_content_text",
        type: "post",
        dataType: 'json',
        data: {
            id: id
        },
        success: function (response) {
            jQuery('#image-name').val(response.content.name);
            jQuery('#image_order').val(response.content.order);
            jQuery('#content_image_id').val(id);
            jQuery('#div-image-name').slideDown();
        }
    });
}

function load_content_file_name(id) {
    jQuery('.add-divs').slideUp();
    jQuery('#view_video').html('');
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "disciplines/load_content_text",
        type: "post",
        dataType: 'json',
        data: {
            id: id
        },
        success: function (response) {
            jQuery('#file-name').val(response.content.name);
            jQuery('#file_order').val(response.content.order);
            jQuery('#content_file_id').val(id);
            jQuery('#div-file-name').slideDown();
        }
    });
}

function save_video_name() {
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "disciplines/save_content_name",
        type: "post",
        dataType: 'json',
        data: {
            name: jQuery('#video-name').val(),
            order: jQuery('#video_order').val(),
            id: jQuery('#content_video_id').val()
        },
        success: function (response) {
            if (response.status == 'OK') {
                window.location = jQuery("body").data('baseurl') + 'modules/openModule/' + jQuery('#module_id').val();
            } else {
                var notice = new PNotify({
                    title: 'Erro',
                    text: 'Verifique sua conexão e tente novamente',
                    type: 'error',
                    addclass: 'click-2-close',
                    hide: false,
                    buttons: {
                        closer: false,
                        sticker: false
                    }
                });
                notice.get().click(function () {
                    notice.remove();
                });
            }
        }
    });
}

function save_image_name() {
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "disciplines/save_content_name",
        type: "post",
        dataType: 'json',
        data: {
            name: jQuery('#image-name').val(),
            order: jQuery('#image_order').val(),
            id: jQuery('#content_image_id').val()
        },
        success: function (response) {
            if (response.status == 'OK') {
                window.location = jQuery("body").data('baseurl') + 'modules/openModule/' + jQuery('#module_id').val();
            } else {
                var notice = new PNotify({
                    title: 'Erro',
                    text: 'Verifique sua conexão e tente novamente',
                    type: 'error',
                    addclass: 'click-2-close',
                    hide: false,
                    buttons: {
                        closer: false,
                        sticker: false
                    }
                });
                notice.get().click(function () {
                    notice.remove();
                });
            }

        }
    });
}

function save_file_name() {
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "disciplines/save_content_name",
        type: "post",
        dataType: 'json',
        data: {
            name: jQuery('#file-name').val(),
            id: jQuery('#content_file_id').val(),
            order: jQuery('#file_order').val()
        },
        success: function (response) {
            if (response.status == 'OK') {
                window.location = jQuery("body").data('baseurl') + 'modules/openModule/' + jQuery('#module_id').val();
            } else {
                var notice = new PNotify({
                    title: 'Erro',
                    text: 'Verifique sua conexão e tente novamente',
                    type: 'error',
                    addclass: 'click-2-close',
                    hide: false,
                    buttons: {
                        closer: false,
                        sticker: false
                    }
                });
                notice.get().click(function () {
                    notice.remove();
                });
            }
        }
    });
}

function load_content_file(id) {
    jQuery.ajax({
        url: jQuery("body").data('baseurl') + 'modules/downloadContentFile/' + id,
        type: "post",
        dataType: 'json',
        success: function (response) {
            window.open(
                    response.data,
                    '_blank' // <- This is what makes it open in a new window.
                    );
        }
    });
}

function close_divs() {
    jQuery('.add-divs').slideUp();
    jQuery('#view_video').html('');
    jQuery('#content_file_id').val('');
    jQuery('#text_id').val('');
    jQuery('#file-name').val('');
    jQuery('#video-name').val('');
    jQuery('#content_video_id').val('');
}

function add_text() {
    jQuery('.add-divs').slideUp();
    jQuery('#view_video').html('');
    jQuery('#text_id').val('');
    jQuery('#module_text').code("");
    jQuery('#module_text_name').val("");
    jQuery('#div-text').slideDown();
}

function add_video() {
    jQuery('.add-divs').slideUp();
    jQuery('#view_video').html('');
    jQuery('#div-video').slideDown();
}

function add_image() {
    jQuery('.add-divs').slideUp();
    jQuery('#view_image').html('');
    jQuery('#div-image').slideDown();
}

function add_evaluation() {
    jQuery('.add-divs').slideUp();
    jQuery('#view_video').html('');
    jQuery('form.evaluation input:checkbox').removeAttr('checked');
    jQuery('#div-evaluation').slideDown();
}

function add_file() {
    jQuery('.add-divs').slideUp();
    jQuery('#view_video').html('');
    jQuery('#div-file').slideDown();
}

function save_text() {

    jQuery('#save_text_button').attr("disabled", true);
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "disciplines/save_content_text",
        type: "post",
        dataType: 'json',
        data: {
            content_id: jQuery('#text_id').val(),
            module_id: jQuery('#module_id').val(),
            text: jQuery('#module_text').code(),
            name: jQuery('#module_text_name').val(),
            order: jQuery('#text_order').val()
        },
        success: function (response) {
            if (response.status == 'OK') {
                window.location = jQuery("body").data('baseurl') + 'modules/openModule/' + jQuery('#module_id').val();
            } else {
                jQuery('#save_text_button').attr("disabled", false);
                var notice = new PNotify({
                    title: 'Erro',
                    text: 'Verifique sua conexão e tente novamente',
                    type: 'error',
                    addclass: 'click-2-close',
                    hide: false,
                    buttons: {
                        closer: false,
                        sticker: false
                    }
                });
                notice.get().click(function () {
                    notice.remove();
                });
            }
        }
    });
}

function delete_content(id) {
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "disciplines/delete_content",
        type: "post",
        dataType: 'json',
        data: {
            id: id
        },
        success: function (response) {
            jQuery('.content_row#' + id).hide();
        }
    });
}

function load_content_text(id) {
    jQuery('.add-divs').slideUp();
    jQuery('#view_video').html('');
    jQuery('#module_text').code("");
    jQuery('#module_text_name').val("");
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "disciplines/load_content_text",
        type: "post",
        dataType: 'json',
        data: {
            id: id
        },
        success: function (response) {
            jQuery('#text_id').val(id);
            jQuery('#module_text').code(response.content.content);
            jQuery('#text_order').val(response.content.order);
            jQuery('#module_text_name').val(response.content.name);
            jQuery('#div-text').slideDown();
        }
    });
}

function load_content_video(id) {
    jQuery('.add-divs').slideUp();
    jQuery('#view_video').html('');
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "disciplines/load_content_text",
        type: "post",
        dataType: 'json',
        data: {
            id: id
        },
        success: function (response) {
            jQuery('#view_video').html('<iframe class="embed-responsive-item" src="' + jQuery("body").data('baseurl') + response.content.content + '"></iframe>');
            jQuery('#view_video').slideDown();
        }
    });
}

function save_evaluation() {

    if (jQuery("input[name='quantity_very_easy']").val() === '0'
            && jQuery("input[name='quantity_easy']").val() === '0'
            && jQuery("input[name='quantity_medium']").val() === '0'
            && jQuery("input[name='quantity_hard']").val() === '0'
            && jQuery("input[name='quantity_very_hard']").val() === '0') {

        alertafalha('A quantidade de questões da prova não pode ser 0(zero)');
        return false;
    }
    var data = jQuery('form.evaluation').serialize();
    jQuery.ajax({
        type: 'POST',
        url: jQuery("body").data("baseurl") + "disciplines/save_evaluation",
        data: data,
        success: function (response) {
            setTimeout(alertasucesso('Avaliação'), 1500);
            window.location = jQuery("body").data('baseurl') + 'modules/openModule/' + jQuery('#module_id').val();
        }
    });
}

function load_evaluation_replys(id) {
    jQuery('.add-divs').slideUp();
    jQuery('#view_evaluation_replys').html('');
    jQuery('#view_evaluation_replys').load(jQuery("body").data("baseurl") + "modules/load_evaluation_replys/" + id);
    jQuery('#view_evaluation_replys').slideDown();
}

function load_content_evaluation(id) {
    jQuery('.add-divs').slideUp();
    jQuery('#view_video').html('');
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "disciplines/load_content_evaluation",
        type: "post",
        dataType: 'json',
        data: {
            id: id
        },
        success: function (response) {
            // zerando os inputs e checkboxes
            jQuery('form.evaluation input:checkbox').removeAttr('checked');
            jQuery('#evaluation_id').val(id);
            jQuery('#type_test').select2('val', response.type);
            jQuery('#quantity_very_easy').val(response.quantity_very_easy);
            jQuery('#quantity_easy').val(response.quantity_easy);
            jQuery('#quantity_medium').val(response.quantity_medium);
            jQuery('#quantity_hard').val(response.quantity_hard);
            jQuery('#quantity_very_hard').val(response.quantity_very_hard);
            jQuery('#evaluation_order').val(response.order)
            jQuery.each(response.questions, function (i, val) {
                jQuery("#" + val).prop("checked", true);
            });
            jQuery('#div-evaluation').slideDown();
        }
    });
}

function start_questionnaire(id) {
    jQuery("#layout_div").load(jQuery("body").data("baseurl") + "disciplines/start_questionnaire", {"id": id});
}

function modal_set_session() {
    jQuery('#modalUserTypeButton').click();
}

function save_session_type() {
    jQuery('#save_session_type_button').html('<i class="fa fa-spinner fa-spin"></i> Salvando...');
    jQuery('#save_session_type_button').addClass('disabled');
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "forms/set_session",
        type: "post",
        dataType: 'json',
        data: {
            type: jQuery('#select_type').val()
        },
        success: function (response) {
            jQuery('#modalUserType').modal('toggle');
            window.location.reload();
        }
    });
}

function start_form(id) {
    jQuery("#layout_div").load(jQuery("body").data("baseurl") + "disciplines/start_form", {"id": id});
}

function view_consent_term(id) {
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "disciplines/load_questionnaire_discipline_consent_term",
        type: "post",
        dataType: 'json',
        data: {
            questionnaire_discipline_id: id
        },
        success: function (response) {
            jQuery('#consent_term_modal').html(response.consent_term.consent_term);
            jQuery('#modalConsentButton').click();
        }
    });
}

function list_questionnaire_replys(id) {
    jQuery("#layout_div").load(jQuery("body").data("baseurl") + "disciplines/list_questionnaire_replys", {"id": id});
}

function list_questionnaire_graphs(id_enc) {
    window.location = jQuery("body").data("baseurl") + "disciplines/list_questionnaire_graphs/" + id_enc;
}

function delete_questionnaire_discipline(id) {
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "disciplines/delete_questionnaire_discipline",
        type: "post",
        dataType: 'json',
        data: {
            id: id
        },
        success: function (response) {
            jQuery('.questionnaire_row#' + id).hide();
        }
    });
}

function save_module() {
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "disciplines/save_module",
        type: "post",
        dataType: 'json',
        data: {
            id: jQuery('#module_id').val(),
            discipline_id: jQuery('#discipline_id').val(),
            name: jQuery('#module_name').val(),
            order: jQuery('#module_order').val(),
            start_date: jQuery('#module_start_date').val(),
            end_date: jQuery('#module_end_date').val()
        },
        success: function (response) {
            if (response.status == 'OK') {
                window.location = jQuery("body").data('baseurl') + 'disciplines/openDiscipline/' + jQuery('#discipline_id').val();
            } else {
                var notice = new PNotify({
                    title: 'Erro',
                    text: 'Verifique sua conexão e tente novamente',
                    type: 'error',
                    addclass: 'click-2-close',
                    hide: false,
                    buttons: {
                        closer: false,
                        sticker: false
                    }
                });
                notice.get().click(function () {
                    notice.remove();
                });
            }
        }
    });
}
function save_forms() {
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "disciplines/save_forms",
        type: "post",
        dataType: 'json',
        data: {
            id: jQuery('#forms_id').val(),
            discipline_id: jQuery('#discipline_id').val(),
            name: jQuery('#forms_name').val(),
            link: jQuery('#link').val()
        },
        success: function (response) {
            if (response.status == 'OK') {
                window.location = jQuery("body").data('baseurl') + 'disciplines/openDiscipline/' + jQuery('#discipline_id').val();
            } else {
                var notice = new PNotify({
                    title: 'Erro',
                    text: 'Verifique sua conexão e tente novamente',
                    type: 'error',
                    addclass: 'click-2-close',
                    hide: false,
                    buttons: {
                        closer: false,
                        sticker: false
                    }
                });
                notice.get().click(function () {
                    notice.remove();
                });
            }
        }
    });
}

function load_form(id) {
    jQuery('#div-forms').slideUp();
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "disciplines/load_form",
        type: "post",
        dataType: 'json',
        data: {
            id: id
        },
        success: function (response) {
            jQuery('#forms_id').val(id);
            jQuery('#forms_name').val(response.module.name);
            jQuery('#div-forms').slideDown();
        }
    });
}
function delete_form(id) {
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "disciplines/delete_form",
        type: "post",
        dataType: 'json',
        data: {
            id: id
        },
        success: function (response) {
            if (response.status == 'OK') {
                jQuery('.form_row#' + id).hide();
            } else {
                var notice = new PNotify({
                    title: 'Erro',
                    text: 'Verifique sua conexão e tente novamente',
                    type: 'error',
                    addclass: 'click-2-close',
                    hide: false,
                    buttons: {
                        closer: false,
                        sticker: false
                    }
                });
                notice.get().click(function () {
                    notice.remove();
                });
            }
        }
    });
}

function load_module(id) {
    jQuery('#div-module').slideUp();
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "disciplines/load_module",
        type: "post",
        dataType: 'json',
        data: {
            id: id
        },
        success: function (response) {
            jQuery('#module_id').val(id);
            jQuery('#module_name').val(response.module.name);
            jQuery('#module_start_date').val(response.module.start_date);
            jQuery('#module_end_date').val(response.module.end_date);
            jQuery('#div-module').slideDown();
        }
    });
}

function delete_module(id) {
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "disciplines/delete_module",
        type: "post",
        dataType: 'json',
        data: {
            id: id
        },
        success: function (response) {
            if (response.status == 'OK') {
                jQuery('.module_row#' + id).hide();
            } else {
                var notice = new PNotify({
                    title: 'Erro',
                    text: 'Verifique sua conexão e tente novamente',
                    type: 'error',
                    addclass: 'click-2-close',
                    hide: false,
                    buttons: {
                        closer: false,
                        sticker: false
                    }
                });
                notice.get().click(function () {
                    notice.remove();
                });
            }
        }
    });
}

function close_module() {
    jQuery('#module_start_date').val('');
    jQuery('#module_end_date').val('');
    jQuery('#module_name').val('');
    jQuery('#module_id').val('');
    jQuery('#div-module').slideUp();
}

function close_responsibles() {
    jQuery('#div-responsibles').slideUp();
}

function close_discipline_questionnaire() {
    jQuery('#div-questionnaire').slideUp();
}

function add_discipline_questionnaire(type) {
    jQuery('#type_questionnaire').val(type);
    jQuery('.type_subtitles').hide();
    jQuery('#' + type).show();
    jQuery('#div-questionnaire').slideDown();
}
function add_discipline_forms() {
    jQuery('#forms_name').val('');
    jQuery('#forms_id').val('');
    jQuery('#link').val('');
    jQuery('#div-forms').slideDown();
}
function close_forms() {
    jQuery('#forms_name').val('');
    jQuery('#forms_id').val('');
    jQuery('#link').val('');
    jQuery('#div-module').slideUp();
}



function save_discipline_questionnaire() {
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "disciplines/save_discipline_questionnaire",
        type: "post",
        dataType: 'json',
        data: {
            discipline_id: jQuery('#discipline_id').val(),
            questionnaire_id: jQuery('#questionnaire').val(),
            type: jQuery('#type_questionnaire').val(),
            order: jQuery('#questionnaire_order').val(),
            start_date: jQuery('#questionnaire_start_date').val(),
            end_date: jQuery('#questionnaire_end_date').val()

        },
        success: function (response) {
            if (response.status == 'OK') {
                window.location = jQuery("body").data('baseurl') + 'disciplines/openDiscipline/' + jQuery('#discipline_id').val();
            } else {
                var notice = new PNotify({
                    title: 'Erro',
                    text: 'Verifique sua conexão e tente novamente',
                    type: 'error',
                    addclass: 'click-2-close',
                    hide: false,
                    buttons: {
                        closer: false,
                        sticker: false
                    }
                });
                notice.get().click(function () {
                    notice.remove();
                });
            }
        }
    });
}

function add_module() {
    jQuery('#module_start_date').val('');
    jQuery('#module_end_date').val('');
    jQuery('#module_name').val('');
    jQuery('#module_id').val('');
    jQuery('#module_order').val('');
    jQuery('#div-module').slideDown();

}

function add_responsible() {
    jQuery('#div-responsibles').slideDown();
}

function btn_edit() {
    jQuery('.form_discipline').prop('disabled', false);
    jQuery('#btn_edit').hide();
    jQuery('#btn_save').show();
}

function btn_delete() {
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "disciplines/delete_discipline",
        type: "post",
        dataType: 'json',
        data: {
            id: jQuery('#discipline_id').val()
        },
        success: function (response) {
            if (response.status == 'OK') {
                window.location = jQuery("body").data('baseurl') + 'home';
            } else {
                var notice = new PNotify({
                    title: 'Erro',
                    text: 'Verifique sua conexão e tente novamente',
                    type: 'error',
                    addclass: 'click-2-close',
                    hide: false,
                    buttons: {
                        closer: false,
                        sticker: false
                    }
                });
                notice.get().click(function () {
                    notice.remove();
                });
            }
        }
    });
}

function remove_discipline_background(disc_id) {
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "disciplines/delete_background_image",
        type: "post",
        dataType: 'json',
        data: {
            disc_id: disc_id
        },
        success: function (response) {
            if (response.status == 'OK') {
                var notice = new PNotify({
                    title: 'Sucesso',
                    text: 'Imagem de capa removida',
                    type: 'success',
                    addclass: 'click-2-close',
                    hide: false,
                    buttons: {
                        closer: false,
                        sticker: false
                    }
                });
                notice.get().click(function () {
                    notice.remove();
                });
            } else {
                var notice = new PNotify({
                    title: 'Erro',
                    text: 'Verifique sua conexão e tente novamente',
                    type: 'error',
                    addclass: 'click-2-close',
                    hide: false,
                    buttons: {
                        closer: false,
                        sticker: false
                    }
                });
                notice.get().click(function () {
                    notice.remove();
                });
            }
        }
    });
}

function save_discipline() {
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "disciplines/save_discipline",
        type: "post",
        dataType: 'json',
        data: {
            id: jQuery('#discipline_id').val(),
            acronym: jQuery('#acronym').val(),
            name: jQuery('#name').val(),
            start_date_registrations: jQuery('#start_date_registrations').val(),
            end_date_registrations: jQuery('#end_date_registrations').val(),
            start_date_lessons: jQuery('#start_date_lessons').val(),
            end_date_lessons: jQuery('#end_date_lessons').val(),
            amount_students_group: jQuery('#amount_students_group').val(),
            desistance_time: jQuery('#desistance_time').val(),
            category_id: jQuery('#category_id').val(),
            credits: jQuery('#credits').val(),
            summary_content: jQuery('#summary_content').val(),
            summary_general_objective: jQuery('#summary_general_objective').val(),
            summary_specify_objective: jQuery('#summary_specify_objective').val(),
            summary_methodology: jQuery('#summary_methodology').val(),
            summary_publish_target: jQuery('#summary_publish_target').val(),
            summary_evaluation: jQuery('#summary_evaluation').val(),
            summary_bibliography: jQuery('#summary_bibliography').val(),
            published: jQuery('#published').is(':checked'),
            show_note: jQuery('#show_note').is(':checked'),
            availability: jQuery('#availability').is(':checked'),
            availability_tutor: jQuery('#availability_tutor').is(':checked'),
            availability_moderator: jQuery('#availability_moderator').is(':checked'),
            availability_student: jQuery('#availability_student').is(':checked'),
            availability_visitor: jQuery('#availability_visitor').is(':checked')
        },
        success: function (response) {
            if (response.status == 'OK') {
                window.location = jQuery("body").data('baseurl') + 'home';
            } else {
                var notice = new PNotify({
                    title: 'Erro',
                    text: 'Verifique sua conexão e tente novamente',
                    type: 'error',
                    addclass: 'click-2-close',
                    hide: false,
                    buttons: {
                        closer: false,
                        sticker: false
                    }
                });
                notice.get().click(function () {
                    notice.remove();
                });
            }
        }
    });
}

function save_discipline_registration() {
    if (!jQuery("#discipline_password").val()) {
        jQuery('#discipline_password').addClass('has-error');
        return false;
    }

    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "disciplines/save_discipline_registration",
        type: "post",
        dataType: 'json',
        data: {
            discipline_password: jQuery('#discipline_password').val()
        },
        success: function (response) {
            if (response.status == 'OK') {
                window.location = jQuery("body").data('baseurl') + 'disciplines/openDiscipline/' + response.discipline_id;
            } else {
                var notice = new PNotify({
                    title: response.title,
                    text: response.message,
                    type: 'error',
                    addclass: 'click-2-close',
                    hide: false,
                    buttons: {
                        closer: false,
                        sticker: false
                    }
                });
                notice.get().click(function () {
                    notice.remove();
                });
            }
        }
    });
}

function send_discipline_registration() {

    if (!jQuery('#discipline_id').val()) {
        var notice = new PNotify({
            title: 'Erro',
            text: 'É preciso escolher as disciplinas',
            type: 'error',
            addclass: 'click-2-close',
            hide: false,
            buttons: {
                closer: false,
                sticker: false
            }
        });
        notice.get().click(function () {
            notice.remove();
        });
        return false;
    }

    if (!jQuery('#student_email').val()) {
        var notice = new PNotify({
            title: 'Erro',
            text: 'É preciso digitar o email do estudante',
            type: 'error',
            addclass: 'click-2-close',
            hide: false,
            buttons: {
                closer: false,
                sticker: false
            }
        });
        notice.get().click(function () {
            notice.remove();
        });
        return false;
    }

    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "disciplines/send_discipline_registration",
        type: "post",
        dataType: 'json',
        data: {
            student_email: jQuery('#student_email').val(),
            discipline_id: jQuery('#discipline_id').val(),
            direct_registration: jQuery('input[name=direct_registration]:checked').val()
        },
        success: function (response) {
            var notice = new PNotify({
                title: response.title,
                text: response.text,
                type: response.type,
                addclass: 'click-2-close',
                hide: false,
                buttons: {
                    closer: false,
                    sticker: false
                }
            });
            notice.get().click(function () {
                notice.remove();
            });
            jQuery('#student_email').val('');
        }
    });
}

function change_status_enrolled_students(id, status) {
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "disciplines/change_status_enrolled_students",
        type: "post",
        dataType: 'json',
        data: {
            id: id,
            status: status
        },
        success: function (response) {
            if (response.status == 'OK') {
                jQuery('#list_students').load(jQuery('body').data('baseurl') + 'home/students/' + jQuery('#discipline_id').val());
            } else {
                var notice = new PNotify({
                    title: 'Erro',
                    text: 'Verifique sua conexão',
                    type: 'error',
                    addclass: 'click-2-close',
                    hide: false,
                    buttons: {
                        closer: false,
                        sticker: false
                    }
                });
                notice.get().click(function () {
                    notice.remove();
                });
            }
        }
    });
}

function save_responsible() {

//    if (!jQuery('#responsible_modules').val()) {
//        jQuery('#responsible_modules').addClass('has-error');
//        return false;
//    }

    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "disciplines/save_responsible",
        type: "post",
        dataType: 'json',
        data: {
            professor_id: jQuery('#professor').val(),
            responsible_modules: jQuery('#responsible_modules').val(),
            responsible_discipline: jQuery('#responsible_discipline').is(':checked'),
            discipline_id: jQuery('#discipline_id').val()
        },
        success: function (response) {
            if (response.id != 'NOK') {
                window.location = jQuery("body").data('baseurl') + 'disciplines/openDiscipline/' + jQuery('#discipline_id').val();
            } else {
                var notice = new PNotify({
                    title: 'Erro',
                    text: 'Verifique sua conexão',
                    type: 'error',
                    addclass: 'click-2-close',
                    hide: false,
                    buttons: {
                        closer: false,
                        sticker: false
                    }
                });
                notice.get().click(function () {
                    notice.remove();
                });
            }
        }
    });
}

function delete_responsible(id, table) {
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "disciplines/delete_responsible",
        type: "post",
        dataType: 'json',
        data: {
            id: id,
            table: table
        },
        success: function (response) {
            jQuery('.responsible_row#' + id).hide();
        }
    });
}

function copyToClipboard(elementId) {
    if (!jQuery('#discipline_id').val()) {
        var notice = new PNotify({
            title: 'Erro',
            text: 'É preciso escolher a(s) disciplina(s)',
            type: 'error',
            addclass: 'click-2-close',
            hide: false,
            buttons: {
                closer: false,
                sticker: false
            }
        });
        notice.get().click(function () {
            notice.remove();
        });
        return false;
    }
    // Create a "hidden" input
    var aux = document.createElement("input");
    // Assign it the value of the specified element
    aux.setAttribute("value", document.getElementById(elementId).innerHTML);
    // Append it to the body
    document.body.appendChild(aux);
    // Highlight its content
    aux.select();
    // Copy the highlighted text
    document.execCommand("copy");
    // Remove it from the body
    document.body.removeChild(aux);

}

