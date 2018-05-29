<!-- Specific Page Vendor CSS -->
<link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'jquery-datatables-bs3/assets/css/datatables.css') ?>" />
<script src="<?= $this->config->base_url(JSPATH . 'settings.js'); ?>"></script>
<link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'bootstrap-multiselect/bootstrap-multiselect.css') ?>" />
<script src="<?= $this->config->base_url(VENDORPATH . 'bootstrap-multiselect/bootstrap-multiselect.js') ?>"></script>
<input type="text" class="form-control hidden" id="questionnaire_id" value="<?= $questionnaire_id ?>">

<div id="div-open-question" hidden="" style=" padding: 15px;">
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title"><?= lang('add') ?> / <?= lang('edit') ?> <?= lang('open_question') ?></h2>
            <p class="panel-subtitle">
            </p>
        </header>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-2">
                    <div class="form-group">
                        <input type="text" class="form-control" name="open_question_order" id="open_question_order" value="" placeholder="<?= lang('order') ?>">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <textarea type="text" class="form-control" name="open_question" id="open_question" value="" placeholder="<?= lang('open_question') ?>"></textarea>
                    </div>
                </div>
                <div class="col-lg-4">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <a class="btn btn-primary" href="javascript:void(0)" onclick="save_open_question()"><?= lang('save') ?></a>
                    <a class="btn btn-default"  href="javascript:void(0)" onclick="close_open_question()"><?= lang('close') ?></a>
                </div>
                <div class="col-lg-6">
                </div>
            </div>
            <div class="visible-sm clearfix mt-sm mb-sm"></div>
            <input type="text" class="form-control hidden" id="open_question_id" value="">
            <div class="clearfix visible-xs mb-sm"></div>
        </div>
    </section>
</div>

<div id="div-likert" hidden="" style=" padding: 15px;">
    <form class="likert">
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title"><?= lang('add') ?> / <?= lang('edit') ?> <?= lang('likert_scale') ?></h2>
                <p class="panel-subtitle">
                </p>
            </header>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="form-group">
                            <h3><label class="control-label"><?= lang('order') ?></label></h3>
                            <input type="text" class="form-control" name="likert_order" id="likert_order" value="" placeholder="<?= lang('order') ?>">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <h3><label class="control-label"><?= lang('likert_name') ?></label></h3>
                            <input type="text" class="form-control" id="name" placeholder="<?= lang('likert_name') ?>" value="">
                        </div>
                    </div>
                    <div class="col-lg-4">
                    </div>
                </div>
               
                
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <h3><label class="control-label">Respostas</label>
                                <a href="javascript:void(0)" onclick="append_reply()" style=" color: blue"> <i class='fa fa-plus-circle'></i></a>
                            </h3>
                        </div>
                    </div>
                    <div class="col-lg-6">
                    </div>
                </div>
                <!--            adiciona as respostas adicionais aqui-->
                <div class="add_replys"></div>
                
                
                
                 <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <h3><label class="control-label"><?= lang('questions') ?></label>
                                <a href="javascript:void(0)" onclick="append_question()" style=" color: blue"> <i class='fa fa-plus-circle'></i></a>
                            </h3>
                        </div>
                    </div>
                    <div class="col-lg-6">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2" style="float: left">
                        <h4><strong>Ordem</strong></h4>
                    </div>
                    <div class="col-lg-6" style="float: left">
                        <h4><strong>Pergunta</strong></h4>
                    </div>
                    <div class="col-lg-2" style="float: left">
                        <h4><strong>Tipo usuário</strong></h4>
                    </div>
                    <div class="col-lg-2" style="float: left">
                        <h4><strong>Respostas</strong></h4>
                    </div>
                </div>

                <!--            adiciona as perguntas adicionais aqui-->
                <div class="add_questions"></div>

                <div class="row">
                    <div class="col-lg-6">
                        <a class="btn btn-primary" href="javascript:void(0)" onclick="save_likert()"><?= lang('save') ?></a>
                        <a class="btn btn-default"  href="javascript:void(0)" onclick="close_likert()"><?= lang('close') ?></a>
                    </div>
                    <div class="col-lg-6">
                    </div>
                </div>

                <div class="visible-sm clearfix mt-sm mb-sm"></div>
                <input type="text" class="form-control hidden" id="likert_id" value="">
                <div class="clearfix visible-xs mb-sm"></div>
            </div>
        </section>
    </form>
    </br>
</div>

<section class="panel">
    <header class="panel-heading">
        <h2 class="panel-title"><?= lang('questions') ?>
            <a class="btn btn-primary" style="float: right; display: block; margin-left: 10px;"  href="javascript:void(0)" onclick="add_likert()" ><?= lang('add') ?> <?= lang('likert_scale') ?></a>
            <a class="btn btn-primary" style="float: right; display: block; margin-left: 10px;"  href="javascript:void(0)" onclick="add_open_question()" ><?= lang('add') ?> <?= lang('open_question') ?></a></h2>
    </header>
    <div class="panel-body">
        <table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="<?= $this->config->base_url(VENDORPATH . 'jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf') ?>">
            <thead>
                <tr>
                    <th><?= lang('order') ?></th>
                    <th><?= lang('name') ?></th>
                    <th><?= lang('type') ?></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($likerts as $r): ?>
                    <tr class="likert_row" id="<?= $r['id'] ?>">
                        <td><?= $r['likert_order'] ?></td>
                        <td><?= $r['name'] ?></td>
                        <td><?= lang('likert_scale') ?></td>                        
                        <td style=" text-align: center; width: 150px">
                            <a href="javascript:void(0)" onclick="load_likert(<?= $r['id'] ?>)" class="on-default edit-row" style=" margin-right: 5px; margin-left: 5px;"><i class="fa fa-pencil"></i></a>
                            <a href="javascript:void(0)" onclick="delete_likert(<?= $r['id'] ?>)" class="on-default remove-row" style=" margin-right: 5px; margin-left: 5px;"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php foreach ($open_questions as $r): ?>
                    <tr class="open_question_row" id="<?= $r['id'] ?>">
                        <td><?= $r['order'] ?></td>
                        <td><?= $r['open_question'] ?></td>
                        <td><?= lang('open_question') ?></td>                        
                        <td style=" text-align: center; width: 150px">
                            <a href="javascript:void(0)" onclick="load_open_question(<?= $r['id'] ?>)" class="on-default edit-row" style=" margin-right: 5px; margin-left: 5px;"><i class="fa fa-pencil"></i></a>
                            <a href="javascript:void(0)" onclick="delete_open_question(<?= $r['id'] ?>)" class="on-default remove-row" style=" margin-right: 5px; margin-left: 5px;"><i class="fa fa-trash-o"></i></a>
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


<!-- Theme Base, Components and Settings --> 
<script src="<?= $this->config->base_url(JSPATH . 'theme.js') ?>"></script>

<!-- Theme Custom -->
<script src="<?= $this->config->base_url(JSPATH . 'theme.custom.js') ?>"></script>

<!-- Theme Initialization Files -->
<script src="<?= $this->config->base_url(JSPATH . 'theme.init.js') ?>"></script>

<script>
                            jQuery('.nav.nav-main li').removeClass('nav-active');
</script>
