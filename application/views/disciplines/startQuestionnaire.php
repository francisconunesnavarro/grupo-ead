<script src="<?= $this->config->base_url(JSPATH . 'disciplines.js') ?>"></script>
<?php $this->user_type = $this->session->userdata['user_type']; ?>
<style>
    .row_reply_radio{
        border-top: solid 0.5px #f2f2f2;
        padding: 5px 0px 0px 0px;
    }
    .row_reply{
        margin-top: 5px !important;
    }
    .row_reply_radio label{
        font-size: 10px !important;
        padding: 0px 0px 0px 5px !important;
    }
    .radio-custom{
        padding: 0 0 0 15px !important;
    }
    .col-xs-3{
        padding-left: 2px !important;
        padding-right: 2px !important;
    }
    .col-xs-5{
        padding-left: 2px !important;
        padding-right: 2px !important;
    }
    .col-xs-6{
        padding-left: 2px !important;
        padding-right: 2px !important;
    }
    .col-xs-7{
        padding-left: 2px !important;
        padding-right: 2px !important;
    }
</style>

<div class="row">
    <div class="col-xs-12">
        <form id="form_start_questionnaire" >

            <!-- Descrição do checklist -->
            <?php if ($questionnaire['description_text']): ?>
                <section class="panel">
                    <header class="panel-heading">
                        <h2 class="panel-title" style="font-size: 16px;">Descrição do questionário</h2>
                        <p class="panel-subtitle">
                        </p>
                    </header>
                    <div class="panel-body">
                        <div class="row">
                            <div class="form-group" style="text-align: -webkit-center;">
                                <?= $questionnaire['description_text'] ?>
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>


            <?php foreach ($likerts as $keyLi => $l): ?>
                <?php foreach ($open_questions as $key => $oq): ?>
                    <?php if ($l['likert_order'] >= $oq['order']): ?>
                        <section class="panel">
                            <header class="panel-heading">
                                <a onclick="jQuery('#oq<?= $oq['id'] ?>').click();" href="javascript:void(0)">
                                    <!-- nome da escala -->
                                    <h2 class="panel-title" style="font-size: 16px;"><?= lang('open_question') ?></h2>
                                    <p class="panel-subtitle">
                                    </p>
                                    <div class="panel-actions">
                                        <a href="javascript:void(0)" class="fa fa-caret-down" id="oq-<?= $oq['id'] ?>"></a>
                                    </div>
                                </a>
                            </header>
                            <div class="panel-body">
                                <!-- respostas da escala -->
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-sm-9 control-label" style="font-size: 16px;"><?= $oq['open_question'] ?></label>
                                    </div>
                                </div>
                                <div class="row row_reply">
                                    <div class="form-group">
                                        <div class="col-sm-9">
                                            <textarea style="width: 100%" name="oq-<?= $oq['id'] ?>"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <?php unset($open_questions[$key]); ?>
                    <?php endif; ?>
                <?php endforeach; ?>

                <section class="panel">
                    <header class="panel-heading">
                        <a onclick="jQuery('#<?= $l['id'] ?>').click();" href="javascript:void(0)">
                            <!-- nome da escala -->
                            <h2 class="panel-title"><?= $l['name'] ?></h2>
                            <p class="panel-subtitle">
                            </p>
                            <div class="panel-actions">
                                <a href="javascript:void(0)" class="fa fa-caret-down" id="<?= $l['id'] ?>"></a>
                            </div>
                        </a>
                    </header>
                    <div class="panel-body">
                        <!-- respostas da escala -->
                        <!-- <div class="row">
                             <div class="form-group">
                        <?php
                        if (count($likerts[$keyLi]['replys']) > 5) {
                            $col = 1;
                            $col2 = 2;
                        } else if (count($likerts[$keyLi]['replys']) == 3) {
                            $col = 3;
                            $col2 = 3;
                        } else if (count($likerts[$keyLi]['replys']) == 4) {
                            $col = 1;
                            $col2 = 8;
                        } else {
                            $col = 2;
                            $col2 = 2;
                        }
                        ?>
                                 <label class="col-sm-<?= $col2 ?> control-label"></label>
                        <?php foreach ($likerts[$keyLi]['replys'] as $replys): ?>
                                             <label class="col-sm-<?= $col ?> control-label"><?= $replys['reply'] ?></label>
                        <?php endforeach; ?>
                             </div>
                         </div>-->
                        <?php foreach ($likerts[$keyLi]['questions'] as $key2 => $questions): ?>

                            <?php if ($questions['select_type'] === $this->user_type['type'] || $questions['select_type'] === '0' || $this->user_type['type'] === '0' || $this->user_type['type'] === '4' || ($questions['select_type'] === '1' && $this->user_type['type'] === '5') || ($questions['select_type'] === '2' && $this->user_type['type'] === '6') || ($questions['select_type'] === '3' && $this->user_type['type'] === '7')): ?>
                                <div class="row row_reply" id="lik-<?= $l['questions_ids'][$key2]['id'] ?>">
                                    <div class="form-group row_reply_radio">
                                        <?php
                                        if (count($l['replys_ids']) > 5) {
                                            $col = 1;
                                            $col2 = 2;
                                        } else if (count($l['replys_ids']) == 3) {
                                            $col = 3;
                                            $col2 = 3;
                                        } else if (count($l['replys_ids']) == 4) {
                                            $col = 3;
                                            $col2 = 5;
                                        } else {
                                            $col = 2;
                                            $col2 = 2;
                                        }
                                        ?>
                                        <label class="col-xs-<?= $col2 ?> control-label" style="font-size: 16px;"><?= $questions['question'] ?></label>
                                        <div class="col-xs-<?= 12 - $col2 ?>">
                                            <?php foreach ($l['replys_ids'] as $kkk => $replys_ids): ?>
                                                <?php if ($questions['reply_questions'] != '[]' && $questions['reply_questions'] != '' && $questions['reply_questions'] != NULL): ?>
                                                    <?php if (in_array($kkk, json_decode($questions['reply_questions']))): ?>
                                                        <div class="col-xs-<?= $col ?> ">
                                                            <div class="radio-custom radio-primary">
                                                                <input name="lik-<?= $l['questions_ids'][$key2]['id'] ?>" type="radio" value="<?= $replys_ids['id'] ?>" style=" border-color: red" />
                                                                <label><?= $likerts[$keyLi]['replys'][$kkk]['reply'] ?></label>
                                                            </div>
                                                        </div>
                                                    <?php else: ?>
                                                        <div class="col-xs-<?= $col ?>"></div>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <div class="col-xs-<?= $col ?> ">
                                                        <div class="radio-custom radio-primary">
                                                            <input name="lik-<?= $l['questions_ids'][$key2]['id'] ?>" type="radio" value="<?= $replys_ids['id'] ?>" style=" border-color: red" />
                                                            <label><?= $likerts[$keyLi]['replys'][$kkk]['reply'] ?></label>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                        <?php endforeach; ?>
                    </div>
                </section>
            <?php endforeach; ?>

            <!-- Questões abertas-->
            <!-- imprimindo as questoes faltantes -->
            <?php foreach ($open_questions as $key => $oq): ?>
                <section class="panel">
                    <header class="panel-heading">
                        <a onclick="jQuery('#oq-<?= $oq['id'] ?>').click();" href="javascript:void(0)">
                            <!-- nome da escala -->
                            <h2 class="panel-title" style="font-size: 16px;"><?= lang('open_question') ?></h2>
                            <p class="panel-subtitle">
                            </p>
                            <div class="panel-actions">
                                <a href="javascript:void(0)" class="fa fa-caret-down" id="oq-<?= $oq['id'] ?>"></a>
                            </div>
                        </a>
                    </header>
                    <div class="panel-body">
                        <!-- respostas da escala -->
                        <div class="row">
                            <div class="form-group">
                                <label class="col-sm-9 control-label" style="font-size: 16px;"><?= $oq['open_question'] ?></label>
                            </div>
                        </div>
                        <div class="row row_reply">
                            <div class="form-group">
                                <div class="col-sm-9">
                                    <textarea style="width: 100%" name="oq-<?= $oq['id'] ?>"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php endforeach; ?>

            <div class="row" style="margin: 10px; text-align: center">
                <a style="width: 30%;" href="javascript:void(0)" id="save_complete_questionnaire_button" onclick="save_complete_questionnaire(<?= $questionnaire_discipline_id ?>, <?= $discipline_id ?>)" class="btn btn-primary">Salvar</a>
                <a style="width: 30%;" href="<?= $this->config->base_url('disciplines/openDiscipline/') . $discipline_id ?>" class="btn btn-default">Voltar</a>
            </div>
        </form>
    </div>
</div>
<script>
    jQuery(document).ready(function () {
        jQuery('.page-header h2').html('<?= $questionnaire['name'] ?>');
    });
    var qi = <?= json_encode($questions_ids); ?>;
    function save_complete_questionnaire(questionnaire_discipline_id, discipline_id) {
        if (jQuery('.row_reply').length != jQuery('#form_start_questionnaire').serializeArray().length) {
            var notice = new PNotify({
                title: 'Questionário incompleto',
                text: 'É preciso responder todo o questionário',
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
            // leva tela para a pergunta que nao foi respondida
            jQuery.each(qi, function (index, value) {
                if (!jQuery("input[name='lik-" + value + "']:checked").val()) {
                    $('html,body').animate({
                        scrollTop: $("#lik-" + value).offset().top - 200},
                            'slow');
                }
            });
            return false;
        } else {
            jQuery('#save_complete_questionnaire_button').addClass('disabled');
            jQuery('#save_complete_questionnaire_button').html('<i class="fa fa-spinner fa-spin"></i> Salvando...');
            jQuery.ajax({
                url: jQuery("body").data("baseurl") + "disciplines/save_complete_questionnaire",
                type: "post",
                dataType: 'json',
                data: {
                    questionnaire_replys: jQuery('#form_start_questionnaire').serializeArray(),
                    questionnaire_discipline_id: questionnaire_discipline_id
                },
                success: function (response) {
                    if (response.status === 'OK') {
                        window.location = jQuery("body").data('baseurl') + 'disciplines/openDiscipline/' + discipline_id;
                    } else {
                        jQuery('#save_complete_questionnaire_button').removeClass('disabled');
                        jQuery('#save_complete_questionnaire_button').html('Salvar');

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
    }
</script>
<script src="<?= $this->config->base_url(JSPATH . 'theme.js') ?>"></script>
<script src="<?= $this->config->base_url(JSPATH . 'theme.custom.js') ?>"></script>
<script src="<?= $this->config->base_url(JSPATH . 'theme.init.js') ?>"></script>