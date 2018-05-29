function login_enter(e) {
    if (e.keyCode == 13) {
        login();
    }
}

$(document).ready(function () {

    jQuery("#select_type").change(
            function () {
                if (jQuery('#select_type').val() > 3 || jQuery('#select_type').val() === 0) {
                    jQuery('#form_info').html('');
                } else {
                    jQuery('#form_info').load(
                            jQuery("body").data("baseurl")
                            + 'login/form_info', {
                                user_type: jQuery('#select_type').val()
                            }, function (response, status, xhr) {

                        jQuery('#fez_outra_med').change(function () {
                            sel = jQuery('#fez_outra_med').val();
                            if (sel == 1 || sel == 2) {
                                jQuery('#fez_outra_med_plus').show();
                            } else {
                                jQuery('#fez_outra_med_plus').hide();
                            }
                        });

                        jQuery('#titulo_esp').change(function () {
                            sel = jQuery('#titulo_esp').val();
                            if (sel == 1 || sel == 2) {
                                jQuery('#titulo_esp_plus').show();
                            } else {
                                jQuery('#titulo_esp_plus').hide();
                            }
                        });

                        jQuery('#pos_graduacao').change(function () {
                            sel = jQuery('#pos_graduacao').val();
                            if (sel == 1 || sel == 2) {
                                jQuery('#pos_graduacao_plus').show();
                            } else {
                                jQuery('#pos_graduacao_plus').hide();
                            }
                        });

                        jQuery('#local').change(function () {
                            sel = jQuery('#local').val();
                            if (sel == 0) {
                                jQuery('#local1_plus').show();
                                jQuery('#local2_plus').hide();
                            } else {
                                jQuery('#local2_plus').show();
                                jQuery('#local1_plus').hide();
                            }
                        });

                        jQuery('#vinculo_hosp').change(function () {
                            sel = jQuery('#vinculo_hosp').val();
                            if (sel == 1 || sel == 2) {
                                jQuery('#vinculo_hosp_plus').show();
                            } else {
                                jQuery('#vinculo_hosp_plus').hide();
                            }
                        });

                        jQuery('#vinculo_hosp_pri').change(function () {
                            sel = jQuery('#vinculo_hosp_pri').val();
                            if (sel == 1 || sel == 2) {
                                jQuery('#vinculo_hosp_pri_plus').show();
                            } else {
                                jQuery('#vinculo_hosp_pri_plus').hide();
                            }
                        });

                        jQuery('#fim_de_sema').change(function () {
                            sel = jQuery('#fim_de_sema').val();
                            if (sel != 0) {
                                jQuery('#fim_de_sema_plus').show();
                            } else {
                                jQuery('#fim_de_sema_plus').hide();
                            }
                        });
                    });
                }
            });

});

function login() {
    jQuery('.login').removeClass('has-error');
    if (!jQuery("#username").val()) {
        jQuery('#username').addClass('has-error');
        return false;
    }

    if (!jQuery("#password").val()) {
        jQuery('#password').addClass('has-error');
        return false;
    }

    jQuery('#btn_login').html('<i class="fa fa-spinner fa-spin"></i> Entrando...');

    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "login/check_login",
        type: "post",
        dataType: 'json',
        data: {
            username: jQuery("#username").val(),
            password: jQuery("#password").val()
        },
        success: function (response) {
            if (response.status == "OK") {
                window.location = jQuery("body").data('baseurl') + 'home';
                
            } else {
                jQuery('#btn_login').html('Entrar');
                var notice = new PNotify({
                    title: 'Dados de acesso',
                    text: 'Usuário ou senha inválidos!',
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

function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function save_register() {
    if (!jQuery('#name').val()) {
        var notice = new PNotify({
            title: 'Nome',
            text: 'Corrija o campo de nome',
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
    //if (!jQuery('#email').val() || !validateEmail(jQuery("#email").val())) {
    if (!jQuery('#email').val()) {
        var notice = new PNotify({
            title: 'Email',
            text: 'Corrija o campo de email',
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
    if (!jQuery('#password').val()) {
        var notice = new PNotify({
            title: 'Nome',
            text: 'Corrija o campo de senha',
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
    if (jQuery('#password').val() !== jQuery('#password_confirmation').val()) {
        var notice = new PNotify({
            title: 'Nome',
            text: 'Senha e confirmação de senha estã diferentes',
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
    if (jQuery('#select_type').val() === '0') {
        var notice = new PNotify({
            title: 'Nome',
            text: 'Corrija o campo de tipo de usuário',
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

    if (!jQuery('#AgreeTerms').is(':checked')) {
        var notice = new PNotify({
            title: 'Termos de uso',
            text: 'É preciso aceitar os termos de uso!',
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
        url: jQuery("body").data("baseurl") + "login/save_register",
        type: "post",
        dataType: 'json',
        data: {
            name: jQuery('#name').val(),
            email: jQuery('#email').val(),
            password: jQuery('#password').val(),
            info: jQuery('#form_info_res').serializeArray(),
            user_type: jQuery('#select_type').val(),
            birthday: jQuery('#birthday').val()

        },
        success: function (response) {
            if (response.status == 'NOK') {
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
            } else {
                window.location = jQuery("body").data('baseurl') + 'home/profile';
            }
        }
    });
}

function forgot_password() {
    if (!jQuery('#forgot_password_email').val()
            || !validateEmail(jQuery("#forgot_password_email").val())) {
        var notice = new PNotify({
            title: 'Campos vazio',
            text: 'O campo de email precisa estar preenchido',
            type: 'error',
            addclass: 'click-2-close',
            hide: false,
            buttons: {
                closer: false,
                sticker: false
            }
        });
        return false;
    }

    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "login/forgot_password",
        type: "post",
        dataType: 'json',
        data: {
            email: jQuery('#forgot_password_email').val()
        },
        success: function (response) {
            var notice = new PNotify({
                title: response.title,
                text: response.message,
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
        }
    });
}

function go_to_questionnaries() {
    jQuery('.login').removeClass('has-error');
    if (!jQuery("#name").val()) {
        jQuery('#name').addClass('has-error');
        return false;
    }
    if (!jQuery("#access_token").val()) {
        jQuery('#access_token').addClass('has-error');
        return false;
    }
    jQuery('#btn_login').html('<i class="fa fa-spinner fa-spin"></i> Entrando...');
    jQuery.ajax({
        url: jQuery("body").data("baseurl") + "forms/check_token",
        type: "post",
        dataType: 'json',
        data: {
            username: jQuery("#name").val(),
            type: jQuery("#select_type").val(),
            token: jQuery("#access_token").val()
        },
        success: function (response) {
            if (response.status === "OK") {
                window.location = jQuery("body").data('baseurl') + 'forms/form_workshop'; // abre questionario correspondente
            } else {
                jQuery('#btn_login').html('Entrar');
                var notice = new PNotify({
                    title: 'Dados de acesso',
                    text: 'Token Inválido',
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
