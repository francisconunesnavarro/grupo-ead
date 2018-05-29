function append_reply() {
    if (jQuery('.row_replys').length < 10) {
        jQuery('.add_replys').append('<div class="row row_replys"><div class="col-lg-1" style="text-align: center">' + jQuery('.row_replys').length + '.</div><div class="col-lg-2"><div class="form-group"><input type="number" class="form-control replys_values" name="replys_values" value="" placeholder="valor"></div></div><div class="col-lg-6"><div class="form-group"><input type="text" class="form-control replys" name="replys" value="" placeholder="resposta"></div></div><div class="col-lg-3"></div></div>');
    } else {
        var notice = new PNotify({
            title: 'Número máximo de respostas',
            text: 'Cada escala comporta no máximo 10 respostas.',
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

function append_question() {
    jQuery('.add_questions').append('<div class="row row_questions"><div class="col-lg-2"><div class="form-group"><input type="text" class="form-control question_order" name="question_order" value="" placeholder="Ordem"></div></div><div class="col-lg-6"><div class="form-group"><input type="text" class="form-control questions" name="questions" value="" placeholder="Pergunta"></div></div><div class="col-lg-2"><select name="select_type" class="form-control input register "><option value="0" >Geral</option><option value="1" >Médico(a)</option><option value="2" >Enfermeiro(a)</option><option value="3" >Farmacêutico(a)</option></select></div><div class="col-lg-2"><select name="select_replys" multiple class="form-control register select_replys"><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option></select></div></div>');
    jQuery('.select_replys').multiselect();
}

function close_divs() {
    jQuery('.add-divs').slideUp();
    jQuery('#consent_text').code('');
}

function save_consent_term() {
    if (!jQuery('#consent_text').code()) {
        alert('É preciso escrever algo!');
        return false;
    }
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "settings/save_consent_term",
        type: "post",
        dataType: 'json',
        data: {
            id: jQuery('#questionnaire_id').val(),
            consent_term: jQuery('#consent_text').code()
        },
        success: function (response) {
            window.location = jQuery("body").data('baseurl') + 'settings/listQuestionnaires';
        }
    });
}

function close_likert() {
    jQuery('#name').val('');
    jQuery('#likert_order').val('');
    jQuery('.form-control.replys').val('');
    jQuery('.form-control.questions').val('');
    jQuery('#likert_id').val('');
    jQuery('.row_replys').remove();
    jQuery('.row_questions').remove();
    jQuery('#div-likert').slideUp();
}

function add_likert() {
    jQuery('#div-open-question').slideUp();
    jQuery('input').removeClass('has-error');
    jQuery('#name').val('');
    jQuery('#likert_order').val('');
    jQuery('.form-control.replys').val('');
    jQuery('.form-control.questions').val('');
    jQuery('#likert_id').val('');
    jQuery('.row_replys').remove();
    jQuery('.row_questions').remove();
    jQuery('#div-likert').slideDown();
}

function close_open_question() {
    jQuery('#open_question').val('');
    jQuery('#open_question_order').val('');
    jQuery('#open_question_id').val('');
    jQuery('#div-open-question').slideUp();
}

function add_open_question() {
    jQuery('#div-likert').slideUp();
    jQuery('#open_question').val('');
    jQuery('#open_question_order').val('');
    jQuery('#open_question_id').val('');
    jQuery('#div-open-question').slideDown();
}

function delete_likert(id) {
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "settings/delete_likert",
        type: "post",
        dataType: 'json',
        data: {
            id: id
        },
        success: function (response) {
            jQuery('.likert_row#' + id).hide();
        }
    });
}

function delete_open_question(id) {
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "settings/delete_open_question",
        type: "post",
        dataType: 'json',
        data: {
            id: id
        },
        success: function (response) {
            jQuery('.open_question_row#' + id).hide();
        }
    });
}

function load_likert(id) {
    jQuery('input').removeClass('has-error');
    jQuery('.row_replys').remove();
    jQuery('.row_questions').remove();
    jQuery('#div-open-question').slideUp();
    jQuery('#div-likert').slideUp();
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "settings/load_likert",
        type: "post",
        dataType: 'json',
        data: {
            id: id
        },
        success: function (response) {
            jQuery('#likert_id').val(id);
            jQuery('#likert_order').val(response.likert.likert_order);
            jQuery('#name').val(response.likert.name);
            //carrega cada pergunta e resposta e da append
            jQuery.each(response.likert.replys, function (index, value) {
                jQuery('.add_replys').append('<div class="row row_replys"><div class="col-lg-1" style="text-align: center">' + jQuery('.row_replys').length + '.</div><div class="col-lg-2"><div class="form-group"><input type="number" class="form-control replys_values" name="replys_values" value="' + value.reply_value + '" placeholder="valor"></div></div><div class="col-lg-6"><div class="form-group"><input type="text" class="form-control replys" name="replys" value="' + value.reply + '" placeholder="resposta"></div></div><div class="col-lg-3"></div></div>');
            });
            jQuery.each(response.likert.questions, function (index, value) {
                jQuery('.add_questions').append('<div class="row row_questions"><div class="col-lg-2"><div class="form-group"><input type="text" class="form-control question_order" name="question_order" value="' + value.question_order + '" placeholder="Ordem"></div></div><div class="col-lg-6"><div class="form-group"><input type="text" class="form-control questions" name="questions" value="' + value.question + '"></div></div><div class="col-lg-2"><select name="select_type" class="form-control register"><option value="0" >Geral</option><option value="1" >Médico(a)</option><option value="2" >Enfermeiro(a)</option><option value="3" >Farmacêutico(a)</option></select></div><div class="col-lg-2"><select name="select_replys" multiple class="form-control register select_replys"><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option></select></div></div>');
            });
            jQuery('#div-likert').slideDown();
            jQuery('.select_replys').multiselect();
        }
    });
}

function load_open_question(id) {
    jQuery('#div-open-question').slideUp();
    jQuery('#div-likert').slideUp();
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "settings/load_open_question",
        type: "post",
        dataType: 'json',
        data: {
            id: id
        },
        success: function (response) {
            jQuery('#open_question_id').val(id);
            jQuery('#open_question_order').val(response.open_question.order);
            jQuery('#open_question').val(response.open_question.open_question);
            jQuery('#div-open-question').slideDown();
        }
    });
}

function save_open_question() {
    if (!jQuery('#open_question').val()) {
        alert('É preciso digitar algo!');
        return false;
    }
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "settings/save_open_question",
        type: "post",
        dataType: 'json',
        data: {
            open_question: jQuery('#open_question').val(),
            questionnaire_id: jQuery('#questionnaire_id').val(),
            order: jQuery('#open_question_order').val(),
            id: jQuery('#open_question_id').val()
        },
        success: function (response) {
            window.location = jQuery("body").data('baseurl') + 'settings/openQuestionnaire/' + jQuery('#questionnaire_id').val();
        }
    });
}

function save_likert() {
    jQuery('input').removeClass('has-error');
    if (!jQuery('#name').val()) {
        jQuery('#name').addClass('has-error');
        return false;
    }
    var questions = jQuery('input[name="questions"]').serialize();
    var select_questions = jQuery('select[name="select_type"]').serialize();
    var select_replys = [];
    $('select[name="select_replys"]').each(function () {
        select_replys.push($(this).serialize());
    });

    var replys = jQuery('input[name="replys"]').serialize();
    var replys_values = jQuery('input[name="replys_values"]').serialize();
    var question_order = jQuery('input[name="question_order"]').serialize();

    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "settings/save_likert",
        type: "post",
        dataType: 'json',
        data: {
            id: jQuery('#likert_id').val(),
            likert_order: jQuery('#likert_order').val(),
            questionnaire_id: jQuery('#questionnaire_id').val(),
            name: jQuery('#name').val(),
            replys: replys,
            replys_values: replys_values,
            question_order: question_order,
            questions: questions,
            select_questions: select_questions,
            reply_questions: select_replys
        },
        success: function (response) {
            window.location = jQuery("body").data('baseurl') + 'settings/openQuestionnaire/' + jQuery('#questionnaire_id').val();
        }
    });
}

function close_question() {
    jQuery('#question').val('');
    jQuery('#correct_reply1').val('');
    jQuery('#correct_reply2').val('');
    jQuery('#wrong_reply1').val('');
    jQuery('#wrong_reply2').val('');
    jQuery('#wrong_reply3').val('');
    jQuery('#wrong_reply4').val('');
    jQuery('#wrong_reply5').val('');
    jQuery('#wrong_reply6').val('');
    jQuery('#wrong_reply7').val('');
    jQuery('#wrong_reply8').val('');
    jQuery('#question_id').val('');
    jQuery('#div-question').slideUp();
}

function add_question() {
    jQuery('#question').val('');
    jQuery('#correct_reply1').val('');
    jQuery('#correct_reply2').val('');
    jQuery('#wrong_reply1').val('');
    jQuery('#wrong_reply2').val('');
    jQuery('#wrong_reply3').val('');
    jQuery('#wrong_reply4').val('');
    jQuery('#wrong_reply5').val('');
    jQuery('#wrong_reply6').val('');
    jQuery('#wrong_reply7').val('');
    jQuery('#wrong_reply8').val('');
    jQuery('#question_id').val('');
    jQuery('#div-question').slideDown();
}

function delete_question(id) {
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "settings/delete_question",
        type: "post",
        dataType: 'json',
        data: {
            id: id
        },
        success: function (response) {
            jQuery('.question_row#' + id).hide();
        }
    });
}

function load_question(id) {
    jQuery('#div-question').slideUp();
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "settings/load_question",
        type: "post",
        dataType: 'json',
        data: {
            id: id
        },
        success: function (response) {

            jQuery('#question_id').val(id);
            jQuery('.note-editable').val(response.question.question).text(response.question.question);
            jQuery('#correct_reply1').val(response.question.correct_reply1);
            jQuery('#correct_reply2').val(response.question.correct_reply2);
            jQuery('#wrong_reply1').val(response.question.wrong_reply1);
            jQuery('#wrong_reply2').val(response.question.wrong_reply2);
            jQuery('#wrong_reply3').val(response.question.wrong_reply3);
            jQuery('#wrong_reply4').val(response.question.wrong_reply4);
            jQuery('#wrong_reply5').val(response.question.wrong_reply5);
            jQuery('#wrong_reply6').val(response.question.wrong_reply6);
            jQuery('#wrong_reply7').val(response.question.wrong_reply7);
            jQuery('#wrong_reply8').val(response.question.wrong_reply8);
            jQuery('#div-question').slideDown();
            jQuery('#difficulty').select2('val', response.question.difficulty);
            jQuery('#theme_id').select2('val', response.question.theme_id);
            load_select_subthemes(response.question.theme_id, response.question.subtheme_id);
        }
    });
}

function load_select_subthemes(theme_id, subtheme_id) {
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "settings/load_subthemes",
        type: "post",
        dataType: 'json',
        data: {
            id: theme_id
        },
        success: function (response) {
            jQuery('#subtheme_id').html('');
            jQuery.each(response, function (index, value) {
                jQuery('#subtheme_id').append('<option value="' + response[index].id + '" selected>' + response[index].name + '</option>');
            });
            if (subtheme_id == null) {
                jQuery('#subtheme_id').select2('val', 1);
            } else {
                jQuery('#subtheme_id').select2('val', subtheme_id);
            }
        }
    });
}

function save_question() {
    if (!jQuery('#correct_reply1').val()) {
        alert('É preciso digitar uma resposta correta!');
        return false;
    }

    if (!jQuery('#wrong_reply1').val()) {
        alert('É preciso digitar uma resposta errada!');
        return false;
    }
    if (!jQuery('#wrong_reply2').val()) {
        alert('É preciso digitar uma resposta errada!');
        return false;
    }
    if (!jQuery('#wrong_reply3').val()) {
        alert('É preciso digitar uma resposta errada!');
        return false;
    }

    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "settings/save_question",
        type: "post",
        dataType: 'json',
        data: {
            id: jQuery('#question_id').val(),
            question: jQuery('.note-editable').html(),
            correct_reply1: jQuery('#correct_reply1').val(),
            correct_reply2: jQuery('#correct_reply2').val(),
            wrong_reply1: jQuery('#wrong_reply1').val(),
            wrong_reply2: jQuery('#wrong_reply2').val(),
            wrong_reply3: jQuery('#wrong_reply3').val(),
            wrong_reply4: jQuery('#wrong_reply4').val(),
            wrong_reply5: jQuery('#wrong_reply5').val(),
            wrong_reply6: jQuery('#wrong_reply6').val(),
            wrong_reply7: jQuery('#wrong_reply7').val(),
            wrong_reply8: jQuery('#wrong_reply8').val(),
            difficulty: jQuery('#difficulty').val(),
            theme_id: jQuery('#theme_id').val(),
            subtheme_id: jQuery('#subtheme_id').val()
        },
        success: function (response) {
            window.location = jQuery("body").data('baseurl') + 'settings/listQuestions';
        }
    });
}


function close_questionnaire() {
    jQuery('#name').val('');
    jQuery('#questionnaire_id').val('');
    jQuery('#div-questionnaire').slideUp();
}

function add_questionnaire() {
    jQuery('#name').val('');
    jQuery('#questionnaire_id').val('');
    jQuery('#div-questionnaire').slideDown();
}

function delete_questionnaire(id) {
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "settings/delete_questionnaire",
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

function load_questionnaire(id) {
    jQuery('#div-questionnaire').slideUp();
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "settings/load_questionnaire",
        type: "post",
        dataType: 'json',
        data: {
            id: id
        },
        success: function (response) {
            jQuery('#questionnaire_id').val(id);
            jQuery('#new_description_text').code(response.questionnaire.description_text);
            jQuery('#name').val(response.questionnaire.name);
            jQuery('#div-questionnaire').slideDown();
        }
    });
}

function load_questionnaire_consent_term(id) {
    jQuery('#consent_text').code("");
    jQuery('.add-divs').slideUp();
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "settings/load_questionnaire_consent_term",
        type: "post",
        dataType: 'json',
        data: {
            id: id
        },
        success: function (response) {
            jQuery('#questionnaire_id').val(id);
            jQuery('#consent_text').code(response.consent_term.consent_term);
            jQuery('#div-consent-term').slideDown();
        }
    });
}

function save_questionnaire() {
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "settings/save_questionnaire",
        type: "post",
        dataType: 'json',
        data: {
            id: jQuery('#questionnaire_id').val(),
            name: jQuery('#name').val(),
            description_text: jQuery('#new_description_text').code()
        },
        success: function (response) {
            window.location = jQuery("body").data('baseurl') + 'settings/listQuestionnaires';
        }
    });
}

function delete_category(id) {
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "settings/delete_category",
        type: "post",
        dataType: 'json',
        data: {
            id: id
        },
        success: function (response) {
            jQuery('.category_row#' + id).hide();
        }
    });
}

function load_category(id) {
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "settings/load_category",
        type: "post",
        dataType: 'json',
        data: {
            id: id
        },
        success: function (response) {
            jQuery('#category_id').val(id);
            jQuery('#color').val(response.category.color);
            jQuery('#name').val(response.category.name);
            jQuery('#div-category').slideDown();
        }
    });
}

function save_category() {
    if (!jQuery('#name').val()) {
        alert('É preciso digitar um nome!')
        return false;
    }
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "settings/save_category",
        type: "post",
        dataType: 'json',
        data: {
            id: jQuery('#category_id').val(),
            color: jQuery('#color').val(),
            name: jQuery('#name').val()
        },
        success: function (response) {
            window.location.reload();
        }
    });
}

function delete_theme(id, key) {
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "settings/delete_theme",
        type: "post",
        dataType: 'json',
        data: {
            id: id
        },
        success: function (response) {
            jQuery('.theme_row#' + key).hide();
        }
    });
}

function load_theme(id) {
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "settings/load_theme",
        type: "post",
        dataType: 'json',
        data: {
            id: id
        },
        success: function (response) {
            jQuery('#theme_id').val(id);
            jQuery('#name').val(response.theme.name);
            jQuery('#div-theme').slideDown();
        }
    });
}

function save_theme() {
    if (!jQuery('#name').val()) {
        alert('É preciso digitar um nome!')
        return false;
    }
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "settings/save_theme",
        type: "post",
        dataType: 'json',
        data: {
            id: jQuery('#theme_id').val(),
            name: jQuery('#name').val()
        },
        success: function (response) {
            window.location.reload();
        }
    });
}


function delete_subtheme(id, key) {
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "settings/delete_subtheme",
        type: "post",
        dataType: 'json',
        data: {
            id: id
        },
        success: function (response) {
            jQuery('.subtheme_row#' + key).hide();
        }
    });
}

function load_subtheme(id) {
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "settings/load_subtheme",
        type: "post",
        dataType: 'json',
        data: {
            id: id
        },
        success: function (response) {
            jQuery('#subtheme_id').val(id);
            jQuery('#name').val(response.subtheme.name);
            jQuery('#div-subtheme').slideDown();
        }
    });
}

function save_subtheme() {
    if (!jQuery('#name').val()) {
        alert('É preciso digitar um nome!')
        return false;
    }

    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "settings/save_subtheme",
        type: "post",
        dataType: 'json',
        data: {
            id: jQuery('#subtheme_id').val(),
            name: jQuery('#name').val()
        },
        success: function (response) {
            window.location.reload();
        }
    });
}