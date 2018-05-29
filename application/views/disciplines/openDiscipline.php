<link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'jquery-datatables-bs3/assets/css/datatables.css') ?>" />
<link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'codemirror/lib/codemirror.css') ?>" />	
<link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'codemirror/theme/monokai.css') ?>" />
<link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'dropzone/css/basic.css') ?>" />		
<link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'dropzone/css/dropzone.css') ?>" />
<script src="<?= $this->config->base_url(JSPATH . 'disciplines.js') ?>"></script>
<br>


<!-- DIV INFORMAÇÕES DA DISCIPLINA -->
<?php if ($this->user['type'] == 'admin' || $this->user['type'] == 'professor' || $discipline['availability_visitor'] == 1): ?>
    <section class="panel">
        <header class="panel-heading">
            <a onclick="jQuery('#discipline_minimize').click();" href="javascript:void(0)">
                <h2 class="panel-title"><?= lang('discipline_information') ?></h2>
                <p class="panel-subtitle">
                </p>
                <div class="panel-actions">
                    <a href="javascript:void(0)" class="fa fa-caret-up" id="discipline_minimize"></a>
                </div>
            </a>
        </header>
        <div class="panel-body admin" style="display: none;">
            <div class="row">
                <?php if (($this->user['type'] == 'admin' || $this->user['type'] == 'professor') && !empty($discipline)): ?>
                    <div class="col-sm-12">
                        <label class="control-label"><?= lang('discipline_password') ?></label><br>   
                        <p><?= base64_encode($discipline['id']) ?></p>
                    </div>
                    <br>
                <?php endif; ?>
                <!-- SIGLA -->
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label">Sigla</label>
                        <input type="text" name="acronym" id="acronym" class="form-control form_discipline" value="<?php
                        if (isset($discipline)): echo $discipline['acronym'];
                        endif;
                        ?>">
                    </div>
                </div>
                <!-- NOME -->
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label">Nome</label>
                        <input type="text" name="name" id="name" class="form-control form_discipline" value="<?php
                        if (isset($discipline)): echo $discipline['name'];
                        endif;
                        ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                                    <!-- INSCRIÇÕES -->
                    <div class="form-group">
                        <label class="control-label">Inscricoes</label>
                        <div class="input-daterange input-group" data-plugin-datepicker>
                            <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                            <input type="text" class="form-control form_discipline" name="start_date_registrations" id="start_date_registrations" value="<?php
                            if (isset($discipline)): echo $discipline['start_date_registrations'];
                            endif;
                            ?>">
                            <span class="input-group-addon">até</span>
                            <input type="text" class="form-control form_discipline" name="end_date_registrations" id="end_date_registrations" value="<?php
                            if (isset($discipline)): echo $discipline['end_date_registrations'];
                            endif;
                            ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label">Curso</label>
                        <div class="input-daterange input-group" data-plugin-datepicker>
                            <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                            <input type="text" class="form-control form_discipline" name="start_date_lessons" id="start_date_lessons" value="<?php
                            if (isset($discipline)): echo $discipline['start_date_lessons'];
                            endif;
                            ?>">
                            <span class="input-group-addon">até</span>
                            <input type="text" class="form-control form_discipline" name="end_date_lessons" id="end_date_lessons" value="<?php
                            if (isset($discipline)): echo $discipline['end_date_lessons'];
                            endif;
                            ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label">Quant. Alunos Turma</label>
                        <input type="text" name="amount_students_group" id="amount_students_group" class="form-control form_discipline" value="<?php
                        if (isset($discipline)): echo $discipline['amount_students_group'];
                        endif;
                        ?>">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label">Tempo Desistencia</label>
                        <input type="text" name="desistance_time" id="desistance_time" class="form-control form_discipline" value="<?php
                        if (isset($discipline)): echo $discipline['desistance_time'];
                        endif;
                        ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label">Categoria</label>
                        <select data-plugin-selectTwo class="form-control populate form_discipline input-lg mb-md" id="category_id">
                            <?php foreach ($categories as $cat): ?>
                                <option value="<?= $cat['id'] ?>" ><?= $cat['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label">Créditos</label>
                        <select data-plugin-selectTwo class="form-control populate form_discipline input-lg mb-md" id="credits">
                            <option value="1" <?php if (isset($discipline)): if ($discipline['credits'] == 1): ?> selected <?php
                                endif;
                            endif;
                            ?>>1</option>
                            <option value="2" <?php if (isset($discipline)): if ($discipline['credits'] == 2): ?> selected <?php
                                endif;
                            endif;
                            ?>>2</option>
                            <option value="3" <?php if (isset($discipline)): if ($discipline['credits'] == 3): ?> selected <?php
                                endif;
                            endif;
                            ?>>3</option>
                            <option value="4" <?php if (isset($discipline)): if ($discipline['credits'] == 4): ?> selected <?php
                                endif;
                            endif;
                            ?>>4</option>
                            <option value="5" <?php if (isset($discipline)): if ($discipline['credits'] == 5): ?> selected <?php
                                endif;
                            endif;
                            ?>>5</option>
                            <option value="6" <?php if (isset($discipline)): if ($discipline['credits'] == 6): ?> selected <?php
                                endif;
                            endif;
                            ?>>6</option>
                            <option value="7" <?php if (isset($discipline)): if ($discipline['credits'] == 7): ?> selected <?php
                                endif;
                            endif;
                            ?>>7</option>
                            <option value="8" <?php if (isset($discipline)): if ($discipline['credits'] == 8): ?> selected <?php
                                endif;
                            endif;
                            ?>>8</option>
                            <option value="9" <?php if (isset($discipline)): if ($discipline['credits'] == 9): ?> selected <?php
                                endif;
                            endif;
                            ?>>9</option>
                            <option value="10" <?php if (isset($discipline)): if ($discipline['credits'] == 10): ?> selected <?php
                                endif;
                            endif;
                            ?>>10</option>
                        </select>
                    </div>
                </div>
            </div>

            <!--        ementas-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="control-label">Ementa - Conteudo</label>
                        <textarea class="form-control form_discipline" rows="5" placeholder="Ementa - Conteudo" id="summary_content"><?php
                            if (isset($discipline)): echo $discipline['summary_content'];
                            endif;
                            ?></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">Ementa - Objetivos gerais</label>
                        <textarea class="form-control form_discipline" rows="5" placeholder="Ementa - Objetivos gerais" id="summary_general_objective"><?php
                            if (isset($discipline)): echo $discipline['summary_general_objective'];
                            endif;
                            ?></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">Ementa - Objetivos especificos</label>
                        <textarea class="form-control form_discipline" rows="5" placeholder="Ementa - Objetivos especificos" id="summary_specify_objective"><?php
                            if (isset($discipline)): echo $discipline['summary_specify_objective'];
                            endif;
                            ?></textarea>
                    </div> 
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">Ementa - Metodologia</label>
                        <textarea class="form-control form_discipline" rows="5" placeholder="Ementa - Metodologia" id="summary_methodology"><?php
                            if (isset($discipline)): echo $discipline['summary_methodology'];
                            endif;
                            ?></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">Ementa - Publico alvo</label>
                        <textarea class="form-control form_discipline" rows="5" placeholder="Ementa - Publico alvo" id="summary_publish_target"><?php
                            if (isset($discipline)): echo $discipline['summary_publish_target'];
                            endif;
                            ?></textarea>
                    </div> 
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">Ementa - Avaliação</label>
                        <textarea class="form-control form_discipline" rows="5" placeholder="Ementa - Avaliação" id="summary_evaluation"><?php
                            if (isset($discipline)): echo $discipline['summary_evaluation'];
                            endif;
                            ?></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">Bibliografia</label>
                        <textarea class="form-control form_discipline" rows="5" placeholder="Bibliografia" id="summary_bibliography"><?php
                            if (isset($discipline)): echo $discipline['summary_bibliography'];
                            endif;
                            ?></textarea>
                    </div> 
                </div>
            </div>
            <?php if ($this->user['type'] == 'admin' || $this->user['type'] == 'professor'): ?>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="checkbox-custom checkbox-default">
                                <input class="form_discipline" type="checkbox" <?php if (isset($discipline)): if ($discipline['published'] == 1): ?> checked <?php
                                    endif;
                                else:
                                    ?> checked <?php endif; ?> id="published">
                                <label>Publicada</label>
                            </div>
                            <div class="checkbox-custom checkbox-default">
                                <input class="form_discipline" type="checkbox" <?php if (isset($discipline)): if ($discipline['show_note'] == 1): ?> checked <?php
                                    endif;
                                else:
                                    ?> checked <?php endif; ?> id="show_note">
                                <label>Exibir nota</label>
                            </div>
                            <div class="checkbox-custom checkbox-default">
                                <input class="form_discipline" type="checkbox" <?php if (isset($discipline)): if ($discipline['availability'] == 1): ?> checked <?php
                                    endif;
                                else:
                                    ?> checked <?php endif; ?> id="availability">
                                <label>Disponibilidade</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="checkbox-custom checkbox-default">
                                <input class="form_discipline" type="checkbox" <?php if (isset($discipline)): if ($discipline['availability_tutor'] == 1): ?> checked <?php
                                    endif;
                                else:
                                    ?> checked <?php endif; ?> id="availability_tutor">
                                <label>Disponibilidade Tutor</label>
                            </div>
                            <div class="checkbox-custom checkbox-default">
                                <input class="form_discipline" type="checkbox" <?php if (isset($discipline)): if ($discipline['availability_moderator'] == 1): ?> checked <?php
                                    endif;
                                else:
                                    ?> checked <?php endif; ?> id="availability_moderator">
                                <label>Disponibilidade Moderador</label>
                            </div>
                            <div class="checkbox-custom checkbox-default">
                                <input class="form_discipline" type="checkbox" <?php if (isset($discipline)): if ($discipline['availability_student'] == 1): ?> checked <?php
                                    endif;
                                else:
                                    ?> checked <?php endif; ?> id="availability_student">
                                <label>Disponibilidade Estudante</label>
                            </div>
                            <div class="checkbox-custom checkbox-default">
                                <input class="form_discipline" type="checkbox" <?php if (isset($discipline)): if ($discipline['availability_visitor'] == 1): ?> checked <?php
                                    endif;
                                else:
                                    ?> checked <?php endif; ?> id="availability_visitor">
                                <label>Disponibilidade Visitante</label>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <input type="text" class="form-control hidden" id="set_category" value="<?php
            if (isset($set_category)): echo $set_category;
            endif;
            ?>">
            <input type="text" class="form-control hidden" id="discipline_id" value="<?php
            if (isset($discipline)): echo $discipline['id'];
            endif;
            ?>">
            <input type="text" class="form-control hidden" id="is_disabled" value="<?php
            if (isset($is_disabled)): echo $is_disabled;
            endif;
            ?>">
        </div>
        <?php if ($this->user['type'] == 'admin' || $this->user['type'] == 'professor'): ?>
            <footer class="panel-footer" style="display: none;">
                <a class="btn btn-primary" id="btn_save" href="javascript:void(0)" onclick="save_discipline()"><?= lang('save') ?></a>
                <a class="btn btn-success" id="btn_edit" href="javascript:void(0)" onclick="btn_edit()" hidden=""><?= lang('edit') ?></a>
                <a class="btn btn-danger" id="btn_delete" href="javascript:void(0)" onclick="btn_delete()" hidden="">Deletar disciplina</a>
            </footer>
        <?php endif; ?>
    </section>
<?php endif; ?>
<!-- DIV QUESTIONÁRIO DA DISCIPLINA -->
<div id="div-questionnaire" hidden="" style=" padding: 15px;">
    <section class="panel">
        <header class="panel-heading">

            <h2 class="panel-title"> <?= lang('edit') ?> <?= lang('questionnaire') ?></h2>
            <p class="panel-subtitle">
            <h3 class="panel-title type_subtitles" id="begin"><?= lang('begin') ?></h3>
            <h3 class="panel-title type_subtitles" id="end"><?= lang('end') ?></h3>
            </p>
        </header>
        <div class="panel-body">
            <form class="form-horizontal form-bordered">
                <div class="row">
                    <div class="col-sm-1"style='left: 20px;'>
                        <div class="form-group">
                            <label class="control-label"><?= lang('order') ?></label>
                            <input type="text" class="form-control" id="questionnaire_order" placeholder="<?= lang('order') ?>" value="">
                        </div>
                    </div>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label">Questionário</label>
                            <select data-plugin-selectTwo class="form-control populate input-lg mb-md" id="questionnaire" name="type_test">
                                <?php foreach ($questionnaires as $q): ?>
                                    <option value="<?= $q['id'] ?>" ><?= $q['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>                   
                    <div class="visible-sm clearfix mt-sm mb-sm"></div>
                    <input type="text" class="form-control hidden" id="type_questionnaire" value="" >
                    <div class="clearfix visible-xs mb-sm"></div>
                    <div class="col-sm-1"></div>


                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label">Questionário ativo</label>
                            <div class="input-daterange input-group" data-plugin-datepicker>
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <input type="text" class="form-control" name="questionnaire_start_date" id="questionnaire_start_date" value="">
                                <span class="input-group-addon">até</span>
                                <input type="text" class="form-control" name="questionnaire_end_date" id="questionnaire_end_date" value="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class='row'>  
                    <div class="col-sm-1">
                        <br>
                        <a class="btn btn-primary" href="javascript:void(0)" onclick="save_discipline_questionnaire()">Salvar</a>
                    </div>
                    <div class="col-sm-1">
                        <br>
                        <a class="btn btn-default"  href="javascript:void(0)" onclick="close_discipline_questionnaire()">Fechar</a>
                    </div>
                </div>

            </form>
        </div>
    </section>
    <br>
</div>

<?php if ($this->user['type'] == 'student'): ?>
    <section class="panel">
        <div class="row">
            <div class="col-md-6 col-lg-12 col-xl-6">
                <div class="row">
                    <?php $input = array('bg-primary', 'bg-info', 'bg-success', 'bg-quartenary', 'bg-tertiary'); ?>

                    <?php foreach ($begin_questionnaires as $begin_questionnaire): ?>

                        <?php if ($begin_questionnaire['questionnaire_discipline_id']): ?>
                            <div class="col-md-6 col-lg-6 col-xl-6" style="height: 160px">
                                <section class="panel">
                                    <div class="panel-body <?= $input[array_rand($input, 1)] ?>">
                                        <a href="javascript:void(0)" onclick="<?php if (!$this->session->userdata('user_type')): ?> modal_set_session();<?php else: ?>start_questionnaire(<?= $begin_questionnaire['questionnaire_discipline_id'] ?>) <?php endif; ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="">
                                            <div class="widget-summary">
                                                <div class="widget-summary-col widget-summary-col-icon">
                                                    <div class="summary-icon">
                                                        <i class="fa fa-play-circle" style="font-size: 45pt; vertical-align: text-top;"></i>
                                                    </div>
                                                </div>
                                                <div class="widget-summary-col">
                                                    <div class="summary">
                                                        <h4 class="title" style="font-size: 22px; margin-top: 5px"><?= $begin_questionnaire['questionnaire_name'] ?></h4>
                                                        <div class="info">
                                                        </div>
                                                    </div>
                                                    <div class="summary-footer">
                                                        <a class="text-uppercase" href="javascript:void(0)" onclick="view_consent_term(<?= $begin_questionnaire['questionnaire_discipline_id'] ?>)" data-toggle="tooltip" data-placement="top" title="" data-original-title=""><?= lang('consent_term') ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </section>
                            </div>
                            <?php
                        endif;
                        ;
                        ?>
                    <?php endforeach; ?>

                    <?php if ($forms != 'none'): ?>
                        <?php foreach ($forms as $f): ?>
                            <div class="col-md-6 col-lg-6 col-xl-6" style="height: 160px">
                                <section class="panel">
                                    <div class="panel-body <?= $input[array_rand($input, 1)] ?>">
                                        <a href="javascript:void(0)" onclick="start_form(<?= $f['id'] ?>)">
                                            <div class="widget-summary">
                                                <div class="widget-summary-col widget-summary-col-icon">
                                                    <div class="summary-icon">
                                                        <i class="fa fa-play-circle" style="font-size: 45pt; vertical-align: text-top;"></i>
                                                    </div>
                                                </div>
                                                <div class="widget-summary-col">
                                                    <div class="summary">
                                                        <h4 class="title" style="font-size: 22px; margin-top: 5px; word-break: initial;"><?= $f['name'] ?></h4>
                                                        <div class="info">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </section>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>



                    <?php if ($modules != 'none'): ?>
                        <?php foreach ($modules as $m): ?>
                            <?php if ($m['active'] == 1): ?>
                                <div class="col-md-6 col-lg-6 col-xl-6" style="height: 160px">
                                    <section class="panel">
                                        <div class="panel-body <?= $input[array_rand($input, 1)] ?>">
                                            <a href="javascript:void(0)" onclick="rowOpenModule(<?= $m['id'] ?>)">
                                                <div class="widget-summary">
                                                    <div class="widget-summary-col widget-summary-col-icon">
                                                        <div class="summary-icon">
                                                            <i class="fa fa-play-circle" style="font-size: 45pt; vertical-align: text-top;"></i>
                                                        </div>
                                                    </div>
                                                    <div class="widget-summary-col">
                                                        <div class="summary">
                                                            <h4 class="title" style="font-size: 22px; margin-top: 5px; word-break: initial;"><?= $m['name'] ?></h4>
                                                            <div class="info">
                                                            </div>
                                                        </div>
                                                        <div class="summary-footer">
                                                            <a class="text-uppercase"><?= implode('/', array_reverse(explode('-', $m['start_date']))) ?> - <?= implode('/', array_reverse(explode('-', $m['end_date']))) ?></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </section>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <?php foreach ($end_questionnaires as $end_questionnaire): ?>
                        <?php if ($end_questionnaire['questionnaire_discipline_id']): ?>
                            <div class="col-md-6 col-lg-6 col-xl-6" style="height: 160px">
                                <section class="panel">
                                    <div class="panel-body <?= $input[array_rand($input, 1)] ?>" >
                                        <a href="javascript:void(0)" onclick="<?php if (!$this->session->userdata('user_type')): ?> modal_set_session();<?php else: ?>start_questionnaire(<?= $end_questionnaire['questionnaire_discipline_id'] ?>) <?php endif; ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?= lang('questionnaire') ?>">
                                            <div class="widget-summary">
                                                <div class="widget-summary-col widget-summary-col-icon">
                                                    <div class="summary-icon">
                                                        <i class="fa fa-play-circle" style="font-size: 45pt; vertical-align: text-top;"></i>
                                                    </div>
                                                </div>
                                                <div class="widget-summary-col">
                                                    <div class="summary">
                                                        <h4 class="title" style="font-size: 22px; margin-top: 5px"><?= $end_questionnaire['questionnaire_name'] ?></h4>
                                                        <div class="info">
                                                        </div>
                                                    </div>
                                                    <div class="summary-footer">
                                                        <a class="text-uppercase" href="javascript:void(0)" onclick="view_consent_term(<?= $end_questionnaire['questionnaire_discipline_id'] ?>)" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?= lang('consent_term') ?>"><?= lang('consent_term') ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </section>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- ADICIONANDO NOVO MÓDULO -->
<?php else: ?>
    <div id="div-module" hidden="" style=" padding: 15px;">
        <section class="panel">
            <header class="panel-heading">

                <h2 class="panel-title"><?= lang('add') ?> / <?= lang('edit') ?> <?= lang('module') ?></h2>
                <p class="panel-subtitle">
                </p>
            </header>
            <div class="panel-body">
                <form class="form-inline">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label"><?= lang('name') ?></label>
                                <input type="text" class="form-control" id="module_name" placeholder="<?= lang('name') ?>" value="">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label"><?= lang('order') ?></label>
                                <input type="text" class="form-control" id="module_order" placeholder="<?= lang('order') ?>" value="">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">Modulo ativo</label>
                                <div class="input-daterange input-group" data-plugin-datepicker>
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                    <input type="text" class="form-control" name="module_start_date" id="module_start_date" value="">
                                    <span class="input-group-addon">até</span>
                                    <input type="text" class="form-control" name="module_end_date" id="module_end_date" value="">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-3">
                        <div class="visible-sm clearfix mt-sm mb-sm"></div>
                        <input type="text" class="form-control hidden" id="module_id" value="" >
                        <div class="clearfix visible-xs mb-sm"></div>
                        <br>           
                        <a class="btn btn-primary" href="javascript:void(0)" onclick="save_module()">Salvar</a>
                        <a class="btn btn-default"  href="javascript:void(0)" onclick="close_module()">Fechar</a>
                    </div>
                </form>
            </div>
        </section>
        <br>
    </div>

    <!-- ADICIONANDO NOVO GOOGLE FORMS -->
    <div id="div-forms" hidden="" style=" padding: 15px;">
        <section class="panel">
            <header class="panel-heading">

                <h2 class="panel-title"><?= lang('add') ?> / <?= lang('edit') ?> Google Form</h2>
                <p class="panel-subtitle">
                </p>
            </header>
            <div class="panel-body">
                <form class="form-inline">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label"><?= lang('name') ?></label>
                                <input type="text" class="form-control" id="forms_name" placeholder="<?= lang('name') ?>" value="">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="control-label">URL</label>
                                <input type="text" class="form-control" id="link" placeholder="URL" value="">
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class="col-sm-3">
                            <div class="visible-sm clearfix mt-sm mb-sm"></div>
                            <input type="text" class="form-control hidden" id="forms_id" value="" >
                            <div class="clearfix visible-xs mb-sm"></div>
                            <br>
                            <a class="btn btn-primary" href="javascript:void(0)" onclick="save_forms()">Salvar</a>
                            <a class="btn btn-default"  href="javascript:void(0)" onclick="close_forms()">Fechar</a>
                        </div>    
                    </div>
                </form>
            </div>
        </section>
        <br>
    </div>

    <section class="panel <?php if ($modules == 'none'): ?> hidden <?php endif; ?>">
        <header class="panel-heading">
            <a onclick="jQuery('#modules_minimize').click();" href="javascript:void(0)">
                <h2 class="panel-title"><?= lang('modules') ?></h2>
                <p class="panel-subtitle">
                </p>
                <div class="panel-actions">
                    <a href="javascript:void(0)" class="fa fa-caret-down" id="modules_minimize"></a>
                </div>
            </a>
        </header>
        <div class="panel-body admin">
            <?php if ($this->user['type'] == 'admin' || $discipline_owner == 1): ?>
                <a class="btn btn-primary" style="margin-bottom: 15px;"  href="javascript:void(0)" onclick="add_discipline_questionnaire('begin')" >Adicionar Questionário Inicial</a>
                <a class="btn btn-primary" style="margin-bottom: 15px;"  href="javascript:void(0)" onclick="add_discipline_questionnaire('end')" >Adicionar Questionário Final</a>
                <a class="btn btn-primary" style="margin-bottom: 15px;"  href="javascript:void(0)" onclick="add_discipline_forms()" >Adicionar Google Forms</a>
                <a class="btn btn-primary" style="float: right; display: block; margin-bottom: 15px;"  href="javascript:void(0)" onclick="add_module()" >Adicionar</a>
            <?php endif; ?>
            <!-- LISTANDO OS CONTEÚDOS(módulos e questionários) DA DISCIPLINA -->

            <table class="table table-bordered table-striped mb-none table-modules datatable-tabletools" data-swf-path="<?= $this->config->base_url(VENDORPATH . 'jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf') ?>">
                <!-- CABEÇALHO DOS MÓDULOS DA DISCIPLINA -->
                <thead>
                    <tr>
                        <th><?= lang('order') ?></th>
                        <th><?= lang('name') ?></th>
                        <th><?= lang('start_date') ?></th>
                        <th><?= lang('end_date') ?></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- LISTANDO OS QUESTIONÁRIOS INICIAIS DA DISCIPLINA -->
                    <?php foreach ($begin_questionnaires as $begin_questionnaire): ?>
                        <tr class="questionnaire_row" style="background-color: #94FFB8" id="<?= $begin_questionnaire['questionnaire_discipline_id'] ?>">
                            <td></td>
                            <td><?= $begin_questionnaire['questionnaire_name'] ?></td>
                            <td><?php if (isset($begin_questionnaire['start_date'])) echo $begin_questionnaire['start_date']; ?></td>
                            <td><?php if (isset($begin_questionnaire['end_date'])) echo $begin_questionnaire['end_date']; ?></td>
                            <td style=" text-align: center; width: 150px">
                                <a href="javascript:void(0)" onclick="<?php if (!$this->session->userdata('user_type')): ?> modal_set_session();<?php else: ?>start_questionnaire(<?= $begin_questionnaire['questionnaire_discipline_id'] ?>) <?php endif; ?>" class="on-default edit-row" style=" margin-right: 5px; margin-left: 5px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?= lang('questionnaire') ?>"><i class="fa fa-eye"></i></a>
                                <a href="javascript:void(0)" onclick="view_consent_term(<?= $begin_questionnaire['questionnaire_discipline_id'] ?>)" class="on-default list-row" style=" margin-right: 5px; margin-left: 5px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?= lang('consent_term') ?>"><i class="fa fa-file-o"></i></a>                                
                                <?php if ($this->user['type'] == 'admin' || $discipline_owner == 1): ?>
<!--                                    <a href="javascript:void(0)" onclick="list_questionnaire_graphs('<?= secencode($begin_questionnaire['questionnaire_discipline_id']) ?>')" class="on-default list-row" style=" margin-right: 5px; margin-left: 5px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="Gráficos das respostas"><i class="fa fa-pie-chart"></i></a>                                -->
                                    <a href="javascript:void(0)" onclick="list_questionnaire_graphs('<?= $begin_questionnaire['questionnaire_discipline_id'] ?>')" class="on-default list-row" style=" margin-right: 5px; margin-left: 5px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="Gráficos das respostas"><i class="fa fa-pie-chart"></i></a>                                
                                    <a href="javascript:void(0)" onclick="list_questionnaire_replys(<?= $begin_questionnaire['questionnaire_discipline_id'] ?>)" class="on-default list-row" style=" margin-right: 5px; margin-left: 5px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?= lang('list_questionnaire_reply') ?>"><i class="fa fa-list"></i></a>                                
                                    <a href="javascript:void(0)" onclick="delete_questionnaire_discipline(<?= $begin_questionnaire['questionnaire_discipline_id'] ?>)" class="on-default remove-row" style=" margin-right: 5px; margin-left: 5px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?= lang('delete') ?>"><i class="fa fa-trash-o"></i></a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <!-- LISTANDO OS GOOGLE FORMS DA DISCIPLINA -->
                    <?php foreach ($forms as $f): ?>
                        <tr class="form_row" id="<?= $f['id'] ?>">
                            <td></td>
                            <td>
                                <?php if ($this->user['type'] == 'admin' || $this->user['type'] == 'professor'): ?>
                                    <a href="javascript:void(0)" onclick="start_form(<?= $f['id'] ?>)" style="display: block;"><?= $f['name'] ?></a>
                                <?php else: ?>
                                    <?= $f['name'] ?>
                                <?php endif; ?>
                            </td>
                            <td>-</td>
                            <td>-</td>
                            <td style=" text-align: center; width: 150px">
                                <?php if ($this->user['type'] == 'admin' || $this->user['type'] == 'professor'): ?>
                                    <a href="javascript:void(0)" onclick="load_form(<?= $f['id'] ?>)" class="on-default edit-row" style=" margin-right: 5px; margin-left: 5px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?= lang('edit') ?>"><i class="fa fa-pencil"></i></a>
                                    <a href="javascript:void(0)" onclick="delete_form(<?= $f['id'] ?>)" class="on-default remove-row" style=" margin-right: 5px; margin-left: 5px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?= lang('delete') ?>"><i class="fa fa-trash-o"></i></a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                    <!-- LISTANDO OS MÓDULOS DA DISCIPLINA -->
                    <?php foreach ($modules as $m): ?>
                        <tr class="module_row" id="<?= $m['id'] ?>">
                            <td>
                                <?= $m['order'] ?>
                            </td>
                            <td>
                                <?php if ($this->user['type'] == 'admin' || $this->user['type'] == 'professor' || $m['active'] == 1): ?>
                                    <a href="javascript:void(0)" onclick="rowOpenModule(<?= $m['id'] ?>)" style="display: block;"><?= $m['name'] ?></a>
                                <?php else: ?>
                                    <?= $m['name'] ?>
                                <?php endif; ?>
                            </td>
                            <td><?= implode('/', array_reverse(explode('-', $m['start_date']))) ?></td>
                            <td><?= implode('/', array_reverse(explode('-', $m['end_date']))) ?></td>
                            <td style=" text-align: center; width: 150px">
                                <?php if ($this->user['type'] == 'admin' || $this->user['type'] == 'professor'): ?>
                                    <a href="javascript:void(0)" onclick="load_module(<?= $m['id'] ?>)" class="on-default edit-row" style=" margin-right: 5px; margin-left: 5px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?= lang('edit') ?>"><i class="fa fa-pencil"></i></a>
                                    <a href="javascript:void(0)" onclick="delete_module(<?= $m['id'] ?>)" class="on-default remove-row" style=" margin-right: 5px; margin-left: 5px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?= lang('delete') ?>"><i class="fa fa-trash-o"></i></a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <!-- LISTANDO OS QUESTIONÁRIOS FINAIS DA DISCIPLINA -->
                    <?php foreach ($end_questionnaires as $end_questionnaire): ?>
                        <tr class="questionnaire_row" style="background-color: #FF8E8E" id="<?= $end_questionnaire['questionnaire_discipline_id'] ?>">
                            <td></td>
                            <td><?= $end_questionnaire['questionnaire_name'] ?></td>
                            <td><?= $end_questionnaire['start_date'] ?></td>
                            <td><?= $end_questionnaire['end_date'] ?></td>
                            <td style=" text-align: center; width: 150px">
                                <a href="javascript:void(0)" onclick="<?php if (!$this->session->userdata('user_type')): ?> modal_set_session();<?php else: ?>start_questionnaire(<?= $end_questionnaire['questionnaire_discipline_id'] ?>) <?php endif; ?>" class="on-default edit-row" style=" margin-right: 5px; margin-left: 5px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?= lang('questionnaire') ?>"><i class="fa fa-eye"></i></a>
                                <a href="javascript:void(0)" onclick="view_consent_term(<?= $end_questionnaire['questionnaire_discipline_id'] ?>)" class="on-default list-row" style=" margin-right: 5px; margin-left: 5px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?= lang('consent_term') ?>"><i class="fa fa-file-o"></i></a>                                
                                <?php if ($this->user['type'] == 'admin' || $discipline_owner == 1): ?>
<!--                                    <a href="javascript:void(0)" onclick="list_questionnaire_graphs('<?= secencode($end_questionnaire['questionnaire_discipline_id']) ?>')" class="on-default list-row" style=" margin-right: 5px; margin-left: 5px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="Gráficos das respostas"><i class="fa fa-pie-chart"></i></a>                                -->
                                    <a href="javascript:void(0)" onclick="list_questionnaire_graphs('<?= $end_questionnaire['questionnaire_discipline_id'] ?>')" class="on-default list-row" style=" margin-right: 5px; margin-left: 5px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="Gráficos das respostas"><i class="fa fa-pie-chart"></i></a>                                
                                    <a href="javascript:void(0)" onclick="list_questionnaire_replys(<?= $end_questionnaire['questionnaire_discipline_id'] ?>)" class="on-default list-row" style=" margin-right: 5px; margin-left: 5px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?= lang('list_questionnaire_reply') ?>"><i class="fa fa-list"></i></a>                                
                                    <a href="javascript:void(0)" onclick="delete_questionnaire_discipline(<?= $end_questionnaire['questionnaire_discipline_id'] ?>)" class="on-default remove-row" style=" margin-right: 5px; margin-left: 5px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?= lang('delete') ?>"><i class="fa fa-trash-o"></i></a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </section>
<?php endif; ?>

<!-- DIV FÓRUM DA DISCIPLINA -->
<section class="panel" id="list_foruns">
</section>

<!-- DIV LOG DA DISCIPLINA -->
<?php if ($this->user['type'] == 'admin' || $this->user['type'] == 'professor'): ?>
    <section class="panel" id="list_logs">

    </section>
    <!-- DIV ESTUDANTES MATRICULADOS NA DISCIPLINA -->

    <section class="panel" id="list_students">

    </section>
<?php endif; ?>

<!-- DIV RESPONSÁVEIS DA DISCIPLINA -->

<div id="div-responsibles" hidden="" style=" padding: 15px;">
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title">Adicionar Responsável</h2>
            <p class="panel-subtitle">
            </p>
        </header>
        <div class="panel-body">
            <form class="form-inline">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group" style="width: 100%">
                            <label class="control-label">Professores</label>
                            <select data-plugin-selectTwo class="form-control populate input-lg mb-md" id="professor">
                                <?php foreach ($professors as $p): ?>
                                    <option value="<?= $p['id'] ?>" ><?= $p['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group" style="width: 100%">
                            <label class="control-label"><?= lang('module') ?></label>
                            <select data-plugin-selectTwo class="form-control populate input-lg mb-md" multiple id="responsible_modules">
                                <?php foreach ($modules as $m): ?>
                                    <option value="<?= $m['id'] ?>" ><?= $m['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group" style="width: 100%">
                            <br>
                            <div class="checkbox-custom checkbox-default">
                                <input type="checkbox" id="responsible_discipline">
                                <label><?= lang('entire_discipline') ?></label>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-1">
                        <br>
                        <a class="btn btn-primary" href="javascript:void(0)" onclick="save_responsible()">Salvar</a>
                    </div>
                    <div class="col-sm-1">
                        <br>
                        <a class="btn btn-default"  href="javascript:void(0)" onclick="close_responsibles()">Fechar</a>
                    </div>
                </div>

            </form>
        </div>
    </section>
    <br>
</div>

<section class="panel <?php if ($discipline_owner != 1 || $responsibles_modules == 'none'): ?> hidden <?php endif; ?>">
    <header class="panel-heading">
        <a onclick="jQuery('#responsibles_minimize').click();" href="javascript:void(0)">
            <h2 class="panel-title"><?= lang('responsibles') ?></h2>
            <p class="panel-subtitle">
            </p>
            <div class="panel-actions">
                <a href="javascript:void(0)" class="fa fa-caret-up" id="responsibles_minimize"></a>
            </div>
        </a>
    </header>
    <div class="panel-body admin" style="display:none">
        <?php if (($this->user['type'] == 'admin' || $this->user['type'] == 'professor') && !empty($discipline)): ?>
            <a class="btn btn-primary" style="float: left; display: block; margin-bottom: 15px;"  href="javascript:void(0)" onclick="add_responsible()" >Adicionar</a></h2>
            <br>
        <?php endif; ?>
        <table class="table table-bordered table-striped mb-none responsibles_table datatable-tabletools" data-swf-path="<?= $this->config->base_url(VENDORPATH . 'jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf') ?>">
            <thead>
                <tr>
                    <th><?= lang('name') ?></th>
                    <th><?= lang('module') ?></th>
                    <th><?= lang('created_time') ?></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($responsibles_modules)): ?>
                    <?php foreach ($responsibles_modules as $rm): ?>
                        <tr class="responsible_row" id="<?= $rm['relationship_id'] ?>">
                            <td><?= $rm['user_name'] ?></td>
                            <td><?= $rm['module_name'] ?></td>
                            <td><?= $rm['relationship_created_time'] ?></td>
                            <td style=" text-align: center; width: 150px">
                                <a href="javascript:void(0)" onclick="delete_responsible(<?= $rm['relationship_id'] ?>, 'modules')" class="on-default remove-row" style=" margin-right: 5px; margin-left: 5px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?= lang('delete') ?>"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</section>

<?php if (($this->user['type'] == 'admin' || $this->user['type'] == 'professor' ) && isset($discipline)): ?>
    <!--ADICIONANDO IMAGEM DE CAPA -->
    <section class="panel">
        <header class="panel-heading">
            <a onclick="jQuery('#background_image_minimize').click();" href="javascript:void(0)">
                <h2 class="panel-title">Trocar a imagem de capa</h2>
                <p class="panel-subtitle">
                </p>
                <div class="panel-actions">
                    <a href="javascript:void(0)" class="fa fa-caret-up" id="background_image_minimize"></a>
                </div>
            </a>
        </header>
        <div class="panel-body" style="display:none">
            <form action="<?= $this->config->base_url('disciplines/receive_background_image/') . $discipline['id'] ?>" class="dropzone dz-square" id="dropzone-image" style="min-height: 200px;"></form>
            <a style="width: 100%;" class="btn btn-danger" href="javascript:void(0)" onclick="remove_discipline_background('<?= $discipline['id'] ?>')" ><i class="fa fa-close mr-xs"></i> Remover capa</a>
        </div>
    </section>
<?php endif; ?>

<a id="modalConsentButton" class="mb-xs mt-xs mr-xs modal-sizes btn btn-primary" href="#modalContentTerm" style=" display: none"></a>
<a id="modalUserTypeButton" class="mb-xs mt-xs mr-xs modal-sizes btn btn-primary" href="#modalUserType" style=" display: none"></a>

<div id="modalUserType" class="modal-block mfp-hide" style="max-width: 668px;">
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title">Escolha o tipo do seu usuário</h2>
        </header>
        <div class="panel-body">
            <div class="form-group mb-lg">
                <div class="clearfix">
                    <label>Tipo de usuário</label>
                </div>
                <div class="input-group input-group-icon">
                    <select id="select_type" class="form-control input-lg register">
                        <option value="0" >Geral</option>
                        <option value="1" >Médico(a)</option>
                        <option value="2" >Enfermeiro(a)</option>
                        <option value="3" >Farmacêutico(a)</option>
                        <option value="4" >(Professor) Geral</option>
                        <option value="5" >(Professor) Médico(a)</option>
                        <option value="6" >(Professor) Enfermeiro(a)</option>
                        <option value="7" >(Professor) Farmacêutico(a)</option>
                    </select>
                </div>
            </div>

        </div>
        <footer class="panel-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    <a class="btn btn-primary" href="javascript:void(0)" id="save_session_type_button" onclick="save_session_type()">Salvar</a>
                    <button class="btn btn-default modal-dismiss"><?= lang('close') ?></button>
                </div>
            </div>
        </footer>
    </section>
</div>

<div id="modalContentTerm" class="modal-block mfp-hide" style="max-width: 668px;">
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title"><?= lang('consent_term') ?></h2>
        </header>
        <div class="panel-body" id="consent_term_modal">


        </div>
        <footer class="panel-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    <button class="btn btn-default modal-dismiss"><?= lang('close') ?></button>
                </div>
            </div>
        </footer>
    </section>
</div>

<script src="<?= $this->config->base_url(VENDORPATH . 'jquery-datatables/media/js/jquery.dataTables.js') ?>"></script>
<script src="<?= $this->config->base_url(VENDORPATH . 'jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js') ?>"></script>
<script src="<?= $this->config->base_url(VENDORPATH . 'jquery-datatables-bs3/assets/js/datatables.js') ?>"></script>
<script src="<?= $this->config->base_url(VENDORPATH . 'codemirror/lib/codemirror.js') ?>"></script>	
<script src="<?= $this->config->base_url(VENDORPATH . 'codemirror/addon/selection/active-line.js') ?>"></script>	
<script src="<?= $this->config->base_url(VENDORPATH . 'codemirror/addon/edit/matchbrackets.js') ?>"></script>	
<script src="<?= $this->config->base_url(VENDORPATH . 'codemirror/mode/javascript/javascript.js') ?>"></script>		
<script src="<?= $this->config->base_url(VENDORPATH . 'codemirror/mode/xml/xml.js') ?>"></script>		
<script src="<?= $this->config->base_url(VENDORPATH . 'codemirror/mode/htmlmixed/htmlmixed.js') ?>"></script>	
<script src="<?= $this->config->base_url(VENDORPATH . 'codemirror/mode/css/css.js') ?>"></script>	
<script src="<?= $this->config->base_url(VENDORPATH . 'flot-tooltip/jquery.flot.tooltip.js') ?>"></script>	
<script src="<?= $this->config->base_url(VENDORPATH . 'dropzone/dropzone.js') ?>"></script>		
<script src="<?= $this->config->base_url(JSPATH . 'tables/examples.datatables.default.js') ?>"></script>
<script src="<?= $this->config->base_url(JSPATH . 'tables/examples.datatables.row.with.details.js') ?>"></script>
<script src="<?= $this->config->base_url(JSPATH . 'tables/examples.datatables.tabletools.js') ?>"></script>                
<script src="<?= $this->config->base_url(JSPATH . 'ui-elements/examples.modals.js') ?>"></script>
<script src="<?= $this->config->base_url(JSPATH . 'theme.js') ?>"></script>
<script src="<?= $this->config->base_url(JSPATH . 'theme.custom.js') ?>"></script>
<script src="<?= $this->config->base_url(JSPATH . 'theme.init.js') ?>"></script>

<?php if ($this->user['type'] == 'admin' || $this->user['type'] == 'professor'): ?>
    <script>
                            if (jQuery('#discipline_id').val() != "") {
                            jQuery('#list_logs').load(jQuery('body').data('baseurl') + 'home/accessLogs/' + jQuery('#discipline_id').val());
                            jQuery('#list_students').load(jQuery('body').data('baseurl') + 'home/students/' + jQuery('#discipline_id').val());
                            }
    </script>
<?php endif; ?>

<script>
    jQuery(document).ready(function () {
    if (jQuery('#discipline_id').val() != "") {
    jQuery('#list_foruns').load(jQuery('body').data('baseurl') + 'home/listForuns/' + jQuery('#discipline_id').val());
    }

    jQuery('.nav.nav-main li').removeClass('nav-active');
    jQuery('#btn_edit').hide();
    jQuery('#btn_delete').hide();
    jQuery('#category_id').first().val(jQuery('#set_category').val()).trigger('liszt:updated');
    // se for apenas visualizacao coloca disabled em tudo
    if (jQuery('#is_disabled').val() === '1') {
    jQuery('.form_discipline').prop('disabled', true);
    jQuery('#btn_save').hide();
    jQuery('#btn_edit').show();
    jQuery('#btn_delete').show();
    }
    });
    function rowOpenModule(id) {
    window.location = jQuery("body").data('baseurl') + 'modules/openModule/' + id;
    }
</script>
<?php if ($this->user['type'] == 'admin' || $this->user['type'] == 'professor'): ?>
    <script>
        jQuery(document).ready(function () {
        var myDropzoneOptionsImage = {
        maxFiles: 1,
                maxFilesize: 500000000000000,
                acceptedMimeTypes: 'image/*',
                init: function () {
                this.on("addedfile", function(file) {
                setTimeout(function(){alertasucesso("Imagem")}, 300);
                setTimeout(function(){window.location.reload()}, 2000);
                });
                //                this.on("complete", function (file) {
                //              //  window.location = jQuery("body").data('baseurl') + 'home';
                //                });
                }
        };
        var myDropzoneImage = new Dropzone('#dropzone-image', myDropzoneOptionsImage);
        });
    </script>
<?php endif; ?>
