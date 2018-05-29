<link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'jquery-datatables-bs3/assets/css/datatables.css') ?>" />
<link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'summernote/summernote.css') ?>" />	
<link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'summernote/summernote-bs3.css') ?>" />	
<link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'codemirror/lib/codemirror.css') ?>" />	
<link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'codemirror/theme/monokai.css') ?>" />
<script src="<?= $this->config->base_url(JSPATH . 'settings.js'); ?>"></script>

<!--ADICIONANDO TEXTO-->
<div class="add-divs" id="div-consent-term" hidden="" style=" padding: 15px;">
    <section class="panel">
        <header class="panel-heading">

            <h2 class="panel-title"><?= lang('edit') ?> <?= lang('consent_term') ?></h2>
            <p class="panel-subtitle">
            </p>
        </header>
        <div class="panel-body">
            <form class="form-horizontal form-bordered">
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="summernote" name="content" id="consent_text" data-plugin-summernote data-plugin-options='{ "height": 180, "codemirror": { "theme": "ambiance" } }'>...</div>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-lg-6">
                    <a class="btn btn-primary" href="javascript:void(0)" onclick="save_consent_term()"><?= lang('save') ?></a>
                    <a class="btn btn-default"  href="javascript:void(0)" onclick="close_divs()"><?= lang('close') ?></a>
                </div>
            </div>
        </div>
    </section>
    </br>
</div>

<div id="div-questionnaire" hidden="" style=" padding: 15px;">
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title"><?= lang('edit') ?> / <?= lang('edit') ?> <?= lang('questionnaire') ?></h2>
            <p class="panel-subtitle">
            </p>
        </header>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="control-label">Nome</label>
                        <input type="text" class="form-control" id="name" value="">
                    </div>                  
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="control-label">Descrição</label>
                        <div class="summernote" name="content" id="new_description_text" data-plugin-summernote data-plugin-options='{ "height": 180, "codemirror": { "theme": "ambiance" } }'></div>
                    </div>
                </div>
                <div class="col-lg-6">
                    </br>
                    <a class="btn btn-primary" href="javascript:void(0)" onclick="save_questionnaire()"><?= lang('save') ?></a>
                    <a class="btn btn-default"  href="javascript:void(0)" onclick="close_questionnaire()"><?= lang('close') ?></a>
                </div>
            </div>
            <div class="visible-sm clearfix mt-sm mb-sm"></div>
            <input type="text" class="form-control hidden" id="questionnaire_id" value="">
            <div class="clearfix visible-xs mb-sm"></div>
        </div>
    </section>
    </br>
</div>

<section class="panel">
    <header class="panel-heading">
        <h2 class="panel-title">Questionários
            <a class="btn btn-primary" style="float: right; display: block"  href="javascript:void(0)" onclick="add_questionnaire()" >Adicionar</a></h2>
    </header>
    <div class="panel-body">
        <table class="table table-bordered table-striped mb-none table-quesionnaires" id="datatable-tabletools" data-swf-path="<?= $this->config->base_url(VENDORPATH . 'jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf') ?>">
            <thead>
                <tr>
                    <th><?= lang('name') ?></th>
                    <th>Token</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
        
                <?php foreach ($questionnaires as $r): ?>

                    <tr class="questionnaire_row" id="<?= $r['id'] ?>">
                        <td>
                            <a href="javascript:void(0)" onclick="rowOpenQuestionnaire(<?= $r['id'] ?>)" style="display: block;"><?= $r['name'] ?></a>
                        </td>
                        <td>
                            <?php
                            if (isset($r['access_token'])): echo $r['access_token'];
                            endif;
                            ?>
                        </td>
                        <td style=" text-align: center; width: 150px">
                            <a href="javascript:void(0)" onclick="load_questionnaire_consent_term(<?= $r['id'] ?>)" class="on-default list-row" style=" margin-right: 5px; margin-left: 5px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?= lang('consent_term') ?>"><i class="fa fa-file-o"></i></a>
                            <a href="javascript:void(0)" onclick="load_questionnaire(<?= $r['id'] ?>)" class="on-default edit-row" style=" margin-right: 5px; margin-left: 5px;"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?= lang('edit') ?>"></i></a>
                            <a href="javascript:void(0)" onclick="delete_questionnaire(<?= $r['id'] ?>)" class="on-default remove-row" style=" margin-right: 5px; margin-left: 5px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?= lang('delete') ?>"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>

<script src="<?= $this->config->base_url(VENDORPATH . 'jquery-datatables/media/js/jquery.dataTables.js') ?>"></script>
<script src="<?= $this->config->base_url(VENDORPATH . 'jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js') ?>"></script>
<script src="<?= $this->config->base_url(VENDORPATH . 'jquery-datatables-bs3/assets/js/datatables.js') ?>"></script>
<script src="<?= $this->config->base_url(VENDORPATH . 'codemirror/lib/codemirror.js') ?>"></script>	
<script src="<?= $this->config->base_url(VENDORPATH . 'summernote/summernote.js') ?>"></script>		
<script src="<?= $this->config->base_url(VENDORPATH . 'flot-tooltip/jquery.flot.tooltip.js') ?>"></script>	
<script src="<?= $this->config->base_url(JSPATH . 'tables/examples.datatables.default.js') ?>"></script>
<script src="<?= $this->config->base_url(JSPATH . 'tables/examples.datatables.row.with.details.js') ?>"></script>
<script src="<?= $this->config->base_url(JSPATH . 'tables/examples.datatables.tabletools.js') ?>"></script>                
<script src="<?= $this->config->base_url(JSPATH . 'theme.js') ?>"></script>
<script src="<?= $this->config->base_url(JSPATH . 'theme.custom.js') ?>"></script>
<script src="<?= $this->config->base_url(JSPATH . 'theme.init.js') ?>"></script>
<script>
                            jQuery('.nav.nav-main li').removeClass('nav-active');
                            function rowOpenQuestionnaire(id) {
                                window.location = jQuery("body").data('baseurl') + 'settings/openQuestionnaire/' + id;
                            }
</script>