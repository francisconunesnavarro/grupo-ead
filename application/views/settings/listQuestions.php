<!-- Specific Page Vendor CSS -->
<link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'jquery-datatables-bs3/assets/css/datatables.css') ?>" />
<script src="<?= $this->config->base_url(JSPATH . 'settings.js') ?>"></script>
<link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'summernote/summernote.css') ?>" />	
<link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'summernote/summernote-bs3.css') ?>" />	

<div id="div-question" hidden="" style=" padding: 15px;">
    <section class="panel">
        <header class="panel-heading">

            <h2 class="panel-title"><?= lang('add') ?> / <?= lang('edit') ?> <?= lang('Question') ?></h2>
            <p class="panel-subtitle">
            </p>
        </header>
        <div class="panel-body">

            <div class="row">
                <div class="col-lg-9">
                    <div class="form-group">
                        <label class="control-label"><?= lang('question') ?></label>
                        <textarea class="form-control summernote" rows="5" id="question"  data-plugin-summernote data-plugin-options='{ "height": 180, "codemirror": { "theme": "ambiance" } }'></textarea>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="control-label"><?= lang('difficulty') ?></label>
                        <select data-plugin-selectTwo class="form-control populate input-lg mb-md select2" id="difficulty">
                            <option value="1"><?= lang('very_easy') ?></option>
                            <option value="2"><?= lang('easy') ?></option>
                            <option value="3"><?= lang('medium') ?></option>
                            <option value="4"><?= lang('hard') ?></option>
                            <option value="5"><?= lang('very_hard') ?></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><?= lang('themes') ?></label>
                        <select data-plugin-selectTwo class="form-control populate input-lg mb-md select2" id="theme_id">
                            <?php foreach ($themes as $d): ?>
                                <option value="<?= $d['id'] ?>"><?= $d['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><?= lang('subthemes') ?></label>
                        <select data-plugin-selectTwo class="form-control populate input-lg mb-md select2" id="subtheme_id">

                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <h2><label class="control-label">Campos obrigatórios</label></h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <h2><label class="control-label">Campos optativos</label></h2>
                    </div> 
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">Resposta correta</label>
                        <textarea class="form-control " rows="5" id="correct_reply1"></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">Resposta correta</label>
                        <textarea class="form-control " rows="5" id="correct_reply2"></textarea>
                    </div> 
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">Resposta errada</label>
                        <textarea class="form-control " rows="5" id="wrong_reply1"></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">Resposta errada</label>
                        <textarea class="form-control " rows="5" id="wrong_reply5"></textarea>
                    </div> 
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">Resposta errada</label>
                        <textarea class="form-control " rows="5" id="wrong_reply2"></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">Resposta errada</label>
                        <textarea class="form-control " rows="5" id="wrong_reply6"></textarea>
                    </div> 
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">Resposta errada</label>
                        <textarea class="form-control " rows="5" id="wrong_reply3"></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">Resposta errada</label>
                        <textarea class="form-control " rows="5" id="wrong_reply7"></textarea>
                    </div> 
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">Resposta errada</label>
                        <textarea class="form-control " rows="5" id="wrong_reply4"></textarea>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">Resposta errada</label>
                        <textarea class="form-control " rows="5" id="wrong_reply8"></textarea>
                    </div> 
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <a class="btn btn-primary" href="javascript:void(0)" onclick="save_question()"><?= lang('save') ?></a>
                    <a class="btn btn-default"  href="javascript:void(0)" onclick="close_question()"><?= lang('close') ?></a>
                </div>
            </div>

            <div class="visible-sm clearfix mt-sm mb-sm"></div>
            <input type="text" class="form-control hidden" id="question_id" value="">
            <div class="clearfix visible-xs mb-sm"></div>
        </div>

    </section>
    </br>
</div>

<section class="panel">
    <header class="panel-heading">
        <h2 class="panel-title">Perguntas
            <a class="btn btn-primary" style="float: right; display: block"  href="javascript:void(0)" onclick="add_question()" >Adicionar</a></h2>
    </header>
    <div class="panel-body">
        <table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="<?= $this->config->base_url(VENDORPATH . 'jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf') ?>">
            <thead>
                <tr>
                    <th><?= lang('id') ?></th>
                    <th><?= lang('question') ?></th>
                    <th><?= lang('difficulty') ?></th>
                    <th><?= lang('tema') ?></th>
                    <th><?= lang('subtema') ?></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $r): ?>
                    <tr class="question_row" id="<?= $r['id'] ?>">
                        <td><?= $r['id'] ?></td>
                        <td><?= $r['question'] ?></td>
                        <td><?php
                            if ($r['difficulty'] == 1) {
                                echo 'Muito facil';
                            } else if ($r['difficulty'] == 2) {
                                echo 'Facil';
                            } else if ($r['difficulty'] == 3) {
                                echo 'Medio';
                            } else if ($r['difficulty'] == 4) {
                                echo 'Dificil';
                            } else if ($r['difficulty'] == 5) {
                                echo 'Muito dificil';
                            }
                            ?></td>
                        <td><?= $r['theme_name'] ?></td>
                        <td><?= $r['subtheme_name'] ?></td>
                        <td style=" text-align: center; width: 150px">
                            <a href="javascript:void(0)" onclick="load_question(<?= $r['id'] ?>)" class="on-default edit-row" style=" margin-right: 5px; margin-left: 5px;"><i class="fa fa-pencil"></i></a>
                            <a href="javascript:void(0)" onclick="delete_question(<?= $r['id'] ?>)" class="on-default remove-row" style=" margin-right: 5px; margin-left: 5px;"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>

<!-- Specific Page Vendor -->
<script src="<?= $this->config->base_url(VENDORPATH . 'jquery-datatables/media/js/jquery.dataTables.js') ?>"></script>
<script src="<?= $this->config->base_url(VENDORPATH . 'jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js') ?>"></script>
<script src="<?= $this->config->base_url(VENDORPATH . 'jquery-datatables-bs3/assets/js/datatables.js') ?>"></script>

<!-- Examples -->
<script src="<?= $this->config->base_url(JSPATH . 'tables/examples.datatables.default.js') ?>"></script>
<script src="<?= $this->config->base_url(JSPATH . 'tables/examples.datatables.row.with.details.js') ?>"></script>
<script src="<?= $this->config->base_url(JSPATH . 'tables/examples.datatables.tabletools.js') ?>"></script>                
<script src="<?= $this->config->base_url(VENDORPATH . 'summernote/summernote.js') ?>"></script>		

<!-- Theme Base, Components and Settings --> 
<script src="<?= $this->config->base_url(JSPATH . 'theme.js') ?>"></script>

<!-- Theme Custom -->
<script src="<?= $this->config->base_url(JSPATH . 'theme.custom.js') ?>"></script>

<!-- Theme Initialization Files -->
<script src="<?= $this->config->base_url(JSPATH . 'theme.init.js') ?>"></script>

<script>
                            jQuery('.nav.nav-main li').removeClass('nav-active');
                            load_select_subthemes(jQuery('#theme_id').val(), null);

                            jQuery('#theme_id').on('change', function () {
                                jQuery.ajax({
                                    url: jQuery("body").data("baseurl") + "settings/load_subthemes",
                                    type: "post",
                                    dataType: 'json',
                                    data: {
                                        id: jQuery('#theme_id').val()
                                    },
                                    success: function (response) {
                                        jQuery('#subtheme_id').html('');
                                        jQuery.each(response, function (index, value) {
                                            jQuery('#subtheme_id').append('<option value="'+response[index].id+'" selected>'+response[index].name+'</option>');
                                        });
                                        jQuery('#subtheme_id').select2('val', 1);
                                    }
                                });
                            });
</script>
