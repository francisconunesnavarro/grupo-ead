$(document).ready(function () {

    $.getJSON(jQuery("body").data("baseurl") + 'public/js/estados_cidades.json', function (data) {
        var items = [];
        var options = '<option value="">Escolha um estado</option>';
        $.each(data, function (key, val) {
            options += '<option value="' + val.nome + '">' + val.nome + '</option>';
        });
        $("#state").html(options);

        $("#state").change(function () {

            var options_cidades = '';
            var str = "";

            $("#state option:selected").each(function () {
                str += $(this).text();
            });

            $.each(data, function (key, val) {
                if (val.nome == str) {
                    $.each(val.cidades, function (key_city, val_city) {
                        options_cidades += '<option value="' + val_city + '">' + val_city + '</option>';
                    });
                }
            });
            $("#city").html(options_cidades);

        }).change();

    });

});
function alertafalha(msg) {
    var notice = new PNotify({
        title: 'Atenção!',
        text: 'Preencha o campo : ' + msg,
        addclass: 'stack-topright'
    });
}

function open_foruns() {
    jQuery("#layout_div").load(jQuery("body").data("baseurl") + "home/listForuns");
}

function open_chats() {
    jQuery("#layout_div").load(jQuery("body").data("baseurl") + "chat/listChats");
}

function discipline_registration() {
    jQuery("#layout_div").load(jQuery("body").data("baseurl") + "home/disciplineRegistration");
}
function batata() {
    jQuery("#layout_div").load(jQuery("body").data("baseurl") + "home/batata");
}

function students() {
    jQuery("#layout_div").load(jQuery("body").data("baseurl") + "home/students");
}

function access_logs() {
    window.location = jQuery("body").data('baseurl') + 'home/accessLogs';
//    jQuery("#layout_div").load(jQuery("body").data("baseurl") + "home/accessLogs");
}
$("select[name='scholarity_status']").change(function () {
    var $val = $(this).val();
    if ($val === 'Completo') {
        $('#div_formation_year').show();
    } else {
        $('#div_formation_year').hide();

    }
});
$("select[name='scholarity_status']").change(function () {
    var $val = $(this).val();
    if ($val === 'Cursando') {
        $('#div_student_course_year').show();
    } else {
        $('#div_student_course_year').hide();

    }
});
function save_profile_user() {

    var password = null;
    if (jQuery('form.profile #password').val() && (jQuery('form.profile #password').val() == jQuery('form.profile #password_confirmation').val())) {
        password = jQuery('form.profile #password').val();
    } else if (jQuery('form.profile #password').val() && (jQuery('form.profile #password').val() != jQuery('form.profile #password_confirmation').val())) {
        var notice = new PNotify({
            title: 'Senhas diferentes',
            text: 'Favor digitar as senhas iguais!',
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

    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "users/save_profile_user",
        type: "post",
        dataType: 'json',
        data: {
            name: jQuery('form.profile #name').val(),
            email: jQuery('form.profile #email').val(),
            birthday: jQuery('form.profile #birthday').val(),
//            add_info: jQuery('.add_info').serializeArray(),
            password: password
        },
        success: function (response) {
            var notice = new PNotify({
                title: 'Sucesso',
                text: 'Dados salvos!',
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
        }
    });
}

function save_formation_user() {

    if (jQuery('#state').val() === '') {
        alertafalha('Estado');
        return false;
    }
    if (jQuery("select[name='scholarity']").val() === 'vazio') {
        alertafalha('Escolaridade');
        return false;
    }
    if (jQuery("select[name='scholarity_status']").val() === 'vazio') {
        alertafalha('Situação');
        return false;
    }
    if ((jQuery("#scholarity_status").val() === 'Completo') && (jQuery("#formation_year").val() === '')) {
        alertafalha('Ano de Formação');
        return false;
    }
    if ((jQuery("#scholarity_status").val() === 'Cursando') && (jQuery("#student_course_year").val() === '')) {
        alertafalha('Semestre que está cursando');
        return false;
    }
    if (jQuery("#course").val() === '') {
        alertafalha('Curso');
        return false;
    }
    if (jQuery("#school").val() === '') {
        alertafalha('Nome da Instituição');
        return false;
    }

    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "users/save_formation_user",
        type: "post",
        dataType: 'json',
        data: {
            school: jQuery('#school').val(),
            city: jQuery('#city').val(),
            state: jQuery('#state').val(),
            formation_year: jQuery('#formation_year').val(),
            student_course_year: jQuery('#student_course_year').val(),
            course: jQuery('#course').val(),
            scholarity_status: jQuery('#scholarity_status').val(),
            scholarity: jQuery('#scholarity').val()
        },
        success: function (response) {
            jQuery('form.formation input').val('');
            jQuery('form.formation select').val('');
            jQuery("fieldset.formation").load(jQuery("body").data("baseurl") + "users/load_formation");
        }
    });
}

function save_address_user() {
    jQuery('form input').removeClass('has-error');
    var hasError = false;
    if (!jQuery('form.addresses #country').val()) {
        jQuery('form.addresses #country').addClass('has-error');
        hasError = true;
    }
    if (!jQuery('form.addresses #city').val()) {
        jQuery('form.addresses #city').addClass('has-error');
        hasError = true;
    }
    if (!jQuery('form.addresses #state').val()) {
        jQuery('form.addresses #state').addClass('has-error');
        hasError = true;
    }
    if (!jQuery('form.addresses #neighborhood').val()) {
        jQuery('form.addresses #neighborhood').addClass('has-error');
        hasError = true;
    }
    if (!jQuery('form.addresses #street').val()) {
        jQuery('form.addresses #street').addClass('has-error');
        hasError = true;
    }
    if (!jQuery('form.addresses #number').val()) {
        jQuery('form.addresses #number').addClass('has-error');
        hasError = true;
    }

    if (hasError) {
        var notice = new PNotify({
            title: 'Erro!',
            text: 'É preciso preencher os campos com "*"',
            addclass: 'stack-topright'
        });
        return false;
    }

    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "users/save_address_user",
        type: "post",
        dataType: 'json',
        data: {
            country: jQuery('form.addresses #country').val(),
            city: jQuery('form.addresses #city').val(),
            state: jQuery('form.addresses #state').val(),
            neighborhood: jQuery('form.addresses #neighborhood').val(),
            number: jQuery('form.addresses #number').val(),
            street: jQuery('form.addresses #street').val(),
            zipcode: jQuery('form.addresses #zipcode').val()
        },
        success: function (response) {
            jQuery('form.addresses input').val('');
            jQuery("fieldset.addresses").load(jQuery("body").data("baseurl") + "users/load_addresses");
        }
    });
}

function save_contact_user() {
    jQuery('form input').removeClass('has-error');
    if (!jQuery('form.contacts #phone').val()) {
        jQuery('form.contacts #phone').addClass('has-error');
        return false;
    }

    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "users/save_contact_user",
        type: "post",
        dataType: 'json',
        data: {
            phone: jQuery('form.contacts #phone').val(),
            type: jQuery('form.contacts #type').val()
        },
        success: function (response) {
            jQuery('form.contacts input').val('');
            jQuery("fieldset.contacts").load(jQuery("body").data("baseurl") + "users/load_contacts");
        }
    });
}

function delete_formation(id) {
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "users/delete_formation",
        type: "post",
        dataType: 'json',
        data: {
            id: id
        },
        success: function (response) {
            jQuery("fieldset.formation").load(jQuery("body").data("baseurl") + "users/load_formation");
        }
    });
}

function delete_contact(id) {
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "users/delete_contact",
        type: "post",
        dataType: 'json',
        data: {
            id: id
        },
        success: function (response) {
            jQuery("fieldset.contacts").load(jQuery("body").data("baseurl") + "users/load_contacts");
        }
    });
}

function delete_address(id) {
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "users/delete_address",
        type: "post",
        dataType: 'json',
        data: {
            id: id
        },
        success: function (response) {
            jQuery("fieldset.addresses").load(jQuery("body").data("baseurl") + "users/load_addresses");
        }
    });
}

function update_percent_profile() {
    var width = 0;
    if (jQuery('#li_formation_information').hasClass('completed')) {
        width = width + 20;
    }
    if (jQuery('#li_contact_information').hasClass('completed')) {
        width = width + 20;
    }
    if (jQuery('#li_personal_information').hasClass('completed')) {
        width = width + 20;
    }
    if (jQuery('#learning_style').hasClass('completed')) {
        width = width + 20;
    }
    if (jQuery('#li_user_image').hasClass('completed')) {
        width = width + 20;
    }
    jQuery('div.progress-bar').css({"width": width + "%"});
}

function add_new_faq() {
    jQuery('#faq_id').val('');
    jQuery('#question').val('');
    jQuery('#reply').val('');
    jQuery('#div-add-faq').slideDown();
}

function close_faq() {
    jQuery('#faq_id').val('');
    jQuery('#question').val('');
    jQuery('#reply').val('');
    jQuery('#div-add-faq').slideUp();
}

function save_faq() {
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "home/save_faq",
        type: "post",
        dataType: 'json',
        data: {
            id: jQuery('#faq_id').val(),
            question: jQuery('#question').val(),
            reply: jQuery('#reply').val()
        },
        success: function (response) {
            window.location = jQuery("body").data('baseurl') + 'home/faq';
        }
    });
}

function delete_faq(id) {
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "home/delete_faq",
        type: "post",
        dataType: 'json',
        data: {
            id: id
        },
        success: function (response) {
            window.location = jQuery("body").data('baseurl') + 'home/faq';
        }
    });
}

function load_faq(id) {
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "home/load_faq",
        type: "post",
        dataType: 'json',
        data: {
            id: id
        },
        success: function (response) {
            jQuery('#faq_id').val(id);
            jQuery('#question').val(response.question);
            jQuery('#reply').val(response.reply);
            jQuery('#div-add-faq').slideDown();
        }
    });
}

function save_mbti() {

    if (jQuery("select[name='mbti']").val() === '') {
        var notice = new PNotify({
            title: 'Atenção!',
            text: 'Preencha o campo Resultado MBTI ',
            addclass: 'stack-topright'
        });
        return false;
    }

    jQuery('#save_mbti_btn').html('<i class="fa fa-refresh fa-spin"></i> Salvando');
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "users/save_mbti",
        type: "post",
        dataType: 'json',
        data: {
            mbti: jQuery('#mbti').val()
        },
        success: function (response) {
            alertasucesso();
            jQuery('#save_mbti_btn').html('Salvo');
            jQuery('#section_mbti').addClass('panel-success');
            jQuery('#mbti_minimize').click();
        }
    });
}

function alertasucesso() {
    var notice = new PNotify({
        title: 'Obrigado!',
        text: 'Respostas inseridas com sucesso',
        type: 'success',
        addclass: 'click-2-close',
        hide: false,
    });
}
function alertafalha(msg) {
    var notice = new PNotify({
        title: 'Atenção!',
        text: 'Preencha o campo: ' + msg,
        addclass: 'stack-topright'
    });
}
$(".max_min").change(function () {
    var max = $(this).val();
    if ($(this).val() > 0 && $(this).val() < 11)
    {
        $(this).val(max);
    } else
    {
        $(this).val('');
    }

});
function save_enade() {
    if (jQuery("input[name='estado_civil']").val() === '') {
        alertafalha('1');
        return false;
    }
    if (jQuery("input[name='cor']").val() === '') {
        alertafalha('2');
        return false;
    }
    if (jQuery("input[name='nacionalidade']").val() === '') {
        alertafalha('3');
        return false;
    }
    if (jQuery("select[name='escolaridade_pai']").val() === '') {
        alertafalha('4');
        return false;
    }
    if (jQuery("select[name='escolaridade_mae']").val() === '') {
        alertafalha('5');
        return false;
    }
    if (jQuery("select[name='moradia']").val() === '') {
        alertafalha('6');
        return false;
    }
    if (jQuery("select[name='pessoas_moradia']").val() === '') {
        alertafalha('7');
        return false;
    }
    if (jQuery("select[name='renda_salario']").val() === '') {
        alertafalha('8');
        return false;
    }
    if (jQuery("select[name='situacao_financeira']").val() === '') {
        alertafalha('9');
        return false;
    }
    if (jQuery("input[name='trabalho']").val() === '') {
        alertafalha('10');
        return false;
    }
    if (jQuery("select[name='financiamento_estudo']").val() === '') {
        alertafalha('11');
        return false;
    }
    if (jQuery("input[name='auxilio']").val() === '') {
        alertafalha('12');
        return false;
    }
    if (jQuery("input[name='bolsa']").val() === '') {
        alertafalha('13');
    }
    if (jQuery("input[name='atividade_exterior']").val() === '') {
        alertafalha('14');
        return false;
    }
    if (jQuery("select[name='inclusao_social']").val() === '') {
        alertafalha('15');
        return false;
    }
    if (jQuery("select[name='estado_ensino_medio']").val() === '') {
        alertafalha('16');
        return false;
    }
    if (jQuery("input[name='ensino_medio']").val() === '') {
        alertafalha('17');
        return false;
    }
    if (jQuery("input[name='modalidade_ensino_medio']").val() === '') {
        alertafalha('18');
        return false;
    }
    if (jQuery("select[name='incentivador']").val() === '') {
        alertafalha('19');
        return false;
    }
    if (jQuery("select[name='grupo_dificuldades']").val() === '') {
        alertafalha('20');
        return false;
    }
    if (jQuery("input[name='familia_concluiu_superior']").val() === '') {
        alertafalha('21');
        return false;
    }
    if (jQuery("input[name='livro_ano']").val() === '') {
        alertafalha('22');
        return false;
    }
    if (jQuery("input[name='hrs_semanais_estudo']").val() === '') {
        alertafalha('23');
        return false;
    }
    if (jQuery("input[name='aprendizado_idiomas']").val() === '') {
        alertafalha('24');
        return false;
    }
    if (jQuery("select[name='escolha_curso']").val() === '') {
        alertafalha('25');
        return false;
    }
    if (jQuery("select[name='escolha_instituicao']").val() === '') {
        alertafalha('26');
        return false;
    }
//    if (jQuery("input[name='didatico-pedag27']").val() === '') {
//        alertafalha('27');
//        return false;
//    }
//    if (jQuery("input[name='didatico-pedag28']").val() === '') {
//        alertafalha('28');
//        return false;
//    }
//    if (jQuery("input[name='didatico-pedag29']").val() === '') {
//        alertafalha('29');
//        return false;
//    }
//    if (jQuery("input[name='didatico-pedag30']").val() === '') {
//        alertafalha('30');
//        return false;
//    }
//    if (jQuery("input[name='didatico-pedag31']").val() === '') {
//        alertafalha('31');
//        return false;
//    }
//    if (jQuery("input[name='didatico-pedag32']").val() === '') {
//        alertafalha('32');
//        return false;
//    }
//    if (jQuery("input[name='didatico-pedag33']").val() === '') {
//        alertafalha('33');
//        return false;
//    }
//    if (jQuery("input[name='didatico-pedag34']").val() === '') {
//        alertafalha('34');
//        return false;
//    }
//    if (jQuery("input[name='didatico-pedag35']").val() === '') {
//        alertafalha('35');
//        return false;
//    }
//    if (jQuery("input[name='didatico-pedag36']").val() === '') {
//        alertafalha('36');
//        return false;
//    }
//    if (jQuery("input[name='didatico-pedag37']").val() === '') {
//        alertafalha('37');
//        return false;
//    }
//    if (jQuery("input[name='didatico-pedag38']").val() === '') {
//        alertafalha('38');
//        return false;
//    }
//    if (jQuery("input[name='didatico-pedag39']").val() === '') {
//        alertafalha('39');
//        return false;
//    }
//    if (jQuery("input[name='didatico-pedag40']").val() === '') {
//        alertafalha('40');
//        return false;
//    }
//    if (jQuery("input[name='didatico-pedag41']").val() === '') {
//        alertafalha('41');
//        return false;
//    }
//    if (jQuery("input[name='didatico-pedag42']").val() === '') {
//        alertafalha('42');
//        return false;
//    }
//    if (jQuery("input[name='didatico-pedag43']").val() === '') {
//        alertafalha('43');
//        return false;
//    }
//    if (jQuery("input[name='didatico-pedag44']").val() === '') {
//        alertafalha('44');
//        return false;
//    }
//    if (jQuery("input[name='didatico-pedag45']").val() === '') {
//        alertafalha('45');
//        return false;
//    }
//    if (jQuery("input[name='didatico-pedag46']").val() === '') {
//        alertafalha('46');
//        return false;
//    }
//    if (jQuery("input[name='didatico-pedag47']").val() === '') {
//        alertafalha('47');
//        return false;
//    }
//    if (jQuery("input[name='didatico-pedag48']").val() === '') {
//        alertafalha('48');
//        return false;
//    }
//    if (jQuery("input[name='didatico-pedag49']").val() === '') {
//        alertafalha('49');
//        return false;
//    }
//    if (jQuery("input[name='didatico-pedag50']").val() === '') {
//        alertafalha('50');
//        return false;
//    }
//    if (jQuery("input[name='didatico-pedag51']").val() === '') {
//        alertafalha('51');
//        return false;
//    }
//    if (jQuery("input[name='didatico-pedag52']").val() === '') {
//        alertafalha('52');
//        return false;
//    }
//    if (jQuery("input[name='didatico-pedag53']").val() === '') {
//        alertafalha('53');
//        return false;
//    }
//    if (jQuery("input[name='didatico-pedag54']").val() === '') {
//        alertafalha('54');
//        return false;
//    }
//    if (jQuery("input[name='didatico-pedag55']").val() === '') {
//        alertafalha('55');
//        return false;
//    }
//    if (jQuery("input[name='didatico-pedag56']").val() === '') {
//        alertafalha('56');
//        return false;
//    }
//    if (jQuery("input[name='didatico-pedag57']").val() === '') {
//        alertafalha('57');
//        return false;
//    }
//    if (jQuery("input[name='didatico-pedag58']").val() === '') {
//        alertafalha('58');
//        return false;
//    }
//    if (jQuery("input[name='didatico-pedag59']").val() === '') {
//        alertafalha('59');
//        return false;
//    }
//    if (jQuery("input[name='didatico-pedag60']").val() === '') {
//        alertafalha('60');
//        return false;
//    }
//    if (jQuery("input[name='didatico-pedag61']").val() === '') {
//        alertafalha('61');
//        return false;
//    }
//    if (jQuery("input[name='didatico-pedag62']").val() === '') {
//        alertafalha('62');
//        return false;
//    }
//    if (jQuery("input[name='didatico-pedag63']").val() === '') {
//        alertafalha('63');
//        return false;
//    }
//
//    if (jQuery("input[name='didatico-pedag64']").val() === '') {
//        alertafalha('64');
//        return false;
//    }
//
//    if (jQuery("input[name='didatico-pedag65']").val() === '') {
//        alertafalha('65');
//        return false;
//    }
//
//    if (jQuery("input[name='didatico-pedag66']").val() === '') {
//        alertafalha('66');
//        return false;
//    }
//
//    if (jQuery("input[name='didatico-pedag67']").val() === '') {
//        alertafalha('67');
//        return false;
//    }
//    if (jQuery("input[name='didatico-pedag68']").val() === '') {
//        alertafalha('68');
//        return false;
//    }

    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "forms/save_enade",
        type: "post",
        dataType: 'json',
        data: {
            reply_enade: jQuery('#iQSocio').serializeArray() // id do formulário #
        },
        success: function (response) { //verifica a resposta que vem do controller
            if (response.status === "OK") {
                alertasucesso();
                setTimeout(function () {
                    window.location = jQuery("body").data('baseurl') + 'home/profile';
                });
            }

        }
    });
}
function save_learning_style() {

    if (jQuery("input[name='ls1']").val() === '') {
        alertafalha('1');
        return false;
    }
    if (jQuery("input[name='ls2']").val() === '') {
        alertafalha('2');
        return false;
    }
    if (jQuery("input[name='ls3']").val() === '') {
        alertafalha('3');
        return false;
    }
    if (jQuery("input[name='ls4']").val() === '') {
        alertafalha('4');
        return false;
    }
    if (jQuery("input[name='ls5']").val() === '') {
        alertafalha('5');
        return false;
    }
    if (jQuery("input[name='ls6']").val() === '') {
        alertafalha('6');
        return false;
    }
    if (jQuery("input[name='ls7']").val() === '') {
        alertafalha('7');
        return false;
    }
    if (jQuery("input[name='ls8']").val() === '') {
        alertafalha('8');
        return false;
    }
    if (jQuery("input[name='ls9']").val() === '') {
        alertafalha('9');
        return false;
    }
    if (jQuery("input[name='ls10']").val() === '') {
        alertafalha('10');
        return false;
    }
    if (jQuery("input[name='ls11']").val() === '') {
        alertafalha('11');
        return false;
    }
    if (jQuery("input[name='ls12']").val() === '') {
        alertafalha('12');
        return false;
    }
    if (jQuery("input[name='ls13']").val() === '') {
        alertafalha('13');
        return false;
    }
    if (jQuery("input[name='ls14']").val() === '') {
        alertafalha('14');
        return false;
    }
    if (jQuery("input[name='ls15']").val() === '') {
        alertafalha('15');
        return false;
    }
    if (jQuery("input[name='ls16']").val() === '') {
        alertafalha('16');
        return false;
    }
    if (jQuery("input[name='ls17']").val() === '') {
        alertafalha('17');
        return false;
    }
    if (jQuery("input[name='ls18']").val() === '') {
        alertafalha('18');
        return false;
    }
    if (jQuery("input[name='ls19']").val() === '') {
        alertafalha('19');
        return false;
    }
    if (jQuery("input[name='ls20']").val() === '') {
        alertafalha('20');
        return false;
    }
    if (jQuery("input[name='ls21']").val() === '') {
        alertafalha('21');
        return false;
    }
    if (jQuery("input[name='ls22']").val() === '') {
        alertafalha('22');
        return false;
    }
    if (jQuery("input[name='ls23']").val() === '') {
        alertafalha('23');
        return false;
    }
    if (jQuery("input[name='ls24']").val() === '') {
        alertafalha('24');
        return false;
    }
    if (jQuery("input[name='ls25']").val() === '') {
        alertafalha('25');
        return false;
    }
    if (jQuery("input[name='ls26']").val() === '') {
        alertafalha('26');
        return false;
    }
    if (jQuery("input[name='ls27']").val() === '') {
        alertafalha('27');
        return false;
    }
    if (jQuery("input[name='ls28']").val() === '') {
        alertafalha('28');
        return false;
    }
    if (jQuery("input[name='ls29']").val() === '') {
        alertafalha('29');
        return false;
    }
    if (jQuery("input[name='ls30']").val() === '') {
        alertafalha('30');
        return false;
    }
    if (jQuery("input[name='ls31']").val() === '') {
        alertafalha('31');
        return false;
    }
    if (jQuery("input[name='ls32']").val() === '') {
        alertafalha('32');
        return false;
    }
    if (jQuery("input[name='ls33']").val() === '') {
        alertafalha('33');
        return false;
    }
    if (jQuery("input[name='ls34']").val() === '') {
        alertafalha('34');
        return false;
    }
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "forms/save_learning_style",
        type: "post",
        dataType: 'json',
        data: {
            reply_ls: jQuery('#form_ls').serializeArray() // id do formulário #
        },
        success: function (response) { //verifica a resposta que vem do controller
            if (response.status === "OK") {
                alertasucesso();
                setTimeout(function () {
                    window.location = jQuery("body").data('baseurl') + 'home/profile';
                }, 2000);
            }

        }
    });
}

function save_vark() {

//    if (!(jQuery("input[name='iria']:checked").val() === 'k')&& !(jQuery("input[name='explicaria']:checked").val() === '')&& !(jQuery("input[name='escreveria']:checked").val() === '')&& !(jQuery("input[name='mapa']:checked").val() === ''))  {
//        alertafalha('1');
//        return false;
//    }
//        if (!(jQuery("input[name='ver_mentalmente']:checked").val() === '')&& !(jQuery("input[name='pronuncia']:checked").val() === '')&& !(jQuery("input[name='dicionario']:checked").val() === '')&& !(jQuery("input[name='escrever']:checked").val() === ''))  {
//        alertafalha('2');
//        return false;
//    }
//        if (!(jQuery("input[name='lugares_principais']:checked").val() === '')&& !(jQuery("input[name='mapa_internet']:checked").val() === '')&& !(jQuery("input[name='itinerario']:checked").val() === '')&& !(jQuery("input[name='telefonar_msg_email']:checked").val() === ''))  {
//        alertafalha('3');
//        return false;
//    }
//        if (!(jQuery("input[name='cozinhar']:checked").val() === '')&& !(jQuery("input[name='sugestao']:checked").val() === '')&& !(jQuery("input[name='livro_receitas']:checked").val() === '')&& !(jQuery("input[name='receita_boa']:checked").val() === ''))  {
//        alertafalha('4');
//        return false;
//    }
//        if (!(jQuery("input[name='falaria']:checked").val() === '')&& !(jQuery("input[name='fotos']:checked").val() === '')&& !(jQuery("input[name='levaria']:checked").val() === '')&& !(jQuery("input[name='livro']:checked").val() === ''))  {
//        alertafalha('5');
//        return false;
//    }
//        if (!(jQuery("input[name='experimentar-testa']:checked").val() === '')&& !(jQuery("input[name='detalhes-aparelho']:checked").val() === '')&& !(jQuery("input[name='aparencia-qualidade']:checked").val() === '')&& !(jQuery("input[name='explicacao-vendedor']:checked").val() === ''))  {
//        alertafalha('6');
//        return false;
//    }
//        if (!(jQuery("input[name='observando']:checked").val() === '')&& !(jQuery("input[name='explicacao-questionamentos']:checked").val() === '')&& !(jQuery("input[name='diagramas-graficos']:checked").val() === '')&& !(jQuery("input[name='manual-livro']:checked").val() === ''))  {
//        alertafalha('7');
//        return false;
//    }
//        if (!(jQuery("input[name='site-leitura']:checked").val() === '')&& !(jQuery("input[name='modelo']:checked").val() === '')&& !(jQuery("input[name='contar-contras']:checked").val() === '')&& !(jQuery("input[name='diagrama-contras']:checked").val() === ''))  {
//        alertafalha('8');
//        return false;
//    }
//        if (!(jQuery("input[name='instrucoes']:checked").val() === '')&& !(jQuery("input[name='conversa-quem-conhece']:checked").val() === '')&& !(jQuery("input[name='controles-teclado']:checked").val() === '')&& !(jQuery("input[name='diagramas-programa']:checked").val() === ''))  {
//        alertafalha('9');
//        return false;
//    }
//        if (!(jQuery("input[name='clicar-mudar-tentar']:checked").val() === '')&& !(jQuery("input[name='visual-interessante']:checked").val() === '')&& !(jQuery("input[name='descricoes-explicacoes']:checked").val() === '')&& !(jQuery("input[name='midias-audios']:checked").val() === ''))  {
//        alertafalha('10');
//        return false;
//    }
//        if (!(jQuery("input[name='visual-atraente']:checked").val() === '')&& !(jQuery("input[name='leitura-previa-parte']:checked").val() === '')&& !(jQuery("input[name='recomendacao']:checked").val() === '')&& !(jQuery("input[name='vida-real']:checked").val() === ''))  {
//        alertafalha('11');
//        return false;
//    }
//        if (!(jQuery("input[name='poder-fazer-perguntas']:checked").val() === '')&& !(jQuery("input[name='instrucoes-claras']:checked").val() === '')&& !(jQuery("input[name='diagramas-camera']:checked").val() === '')&& !(jQuery("input[name='exemplos-fotos']:checked").val() === ''))  {
//        alertafalha('12');
//        return false;
//    }
//        if (!(jQuery("input[name='demonstracoes-praticas']:checked").val() === '')&& !(jQuery("input[name='debates-discussoes']:checked").val() === '')&& !(jQuery("input[name='livros-materiais']:checked").val() === '')&& !(jQuery("input[name='diag-tabelas-graficos']:checked").val() === ''))  {
//        alertafalha('13');
//        return false;
//    }
//        if (!(jQuery("input[name='exemplos-feitos-base']:checked").val() === '')&& !(jQuery("input[name='descricao-resultados']:checked").val() === '')&& !(jQuery("input[name='informacoes-externas']:checked").val() === '')&& !(jQuery("input[name='graficos-resultados']:checked").val() === ''))  {
//        alertafalha('14');
//        return false;
//    }
//        if (!(jQuery("input[name='experimentado']:checked").val() === '')&& !(jQuery("input[name='sugestao-garcom-amigo']:checked").val() === '')&& !(jQuery("input[name='menu']:checked").val() === '')&& !(jQuery("input[name='observar-outros-fotos']:checked").val() === ''))  {
//        alertafalha('15');
//        return false;
//    }
//        if (!(jQuery("input[name='diagramas-grafs']:checked").val() === '')&& !(jQuery("input[name='palavras-chaves-treino']:checked").val() === '')&& !(jQuery("input[name='decorar-discurso']:checked").val() === '')&& !(jQuery("input[name='exemplos-realidade']:checked").val() === ''))  {
//        alertafalha('16');
//        return false;
//    }
//    
    jQuery('#save_vark_btn').html('<i class="fa fa-refresh fa-spin"></i> Salvando');
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "forms/save_vark",
        type: "post",
        dataType: 'json',
        data: {
            reply_vark: jQuery('#form_vark').serializeArray()
        },
        success: function (response) { //verifica a resposta que vem do controller
            if (response.status === "OK") {
                alertasucesso();
                jQuery('#save_vark_btn').html('Salvo');
                jQuery('#section_vark').addClass('panel-success');
                jQuery('#vark_minimize').click();
            }
        }
    });
}

function save_kts() {
    for (var i = 1; i < 71; i++) {
        if ((jQuery("input[name='q" + i + "']:checked").length) == 0) {
            alertafalha("'" + i + "'");
            return false;
        }
    }

    jQuery('#save_kts_btn').html('<i class="fa fa-refresh fa-spin"></i> Salvando');
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "forms/save_kts",
        type: "post",
        dataType: 'json',
        data: {
            reply_kts: jQuery('#form_kts').serializeArray()
        },
        success: function (response) { //verifica a resposta que vem do controller
            if (response.status === "OK") {
                alertasucesso();
                jQuery('#save_kts_btn').html('Salvo');
                jQuery('#section_kts').addClass('panel-success');
                jQuery('#kts_minimize').click();
            }
        }
    });
}
