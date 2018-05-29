<!-- Specific Page Vendor CSS -->
<link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'jquery-datatables-bs3/assets/css/datatables.css') ?>" />
<link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css') ?>" />	
<link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'dropzone/css/basic.css') ?>" />		
<link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'dropzone/css/dropzone.css') ?>" />		
<link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'summernote/summernote.css') ?>" />	
<link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'summernote/summernote-bs3.css') ?>" />	
<link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'codemirror/lib/codemirror.css') ?>" />	
<link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'codemirror/theme/monokai.css') ?>" />
<script>
    var bool = false;
    var bool1 = false;
    var bool2 = false;
    var bool3 = false;
    var bool4 = false;
</script>
<script src="<?= $this->config->base_url(JSPATH . 'disciplines.js?') . time(); ?>"></script>

<!--RESPOSTAS AVALIAÇOES-->
<div class="add-divs" id="view_evaluation_replys" hidden=""  style="padding: 15px; text-align: center"></div>
<!--VENDO VIDEO-->
<div class="add-divs" id="view_video" hidden=""  style="padding: 15px; text-align: center"></div>
<!--VENDO FILE-->
<div class="add-divs" id="view_file" hidden=""  style="padding: 15px; text-align: center"></div>
<!--ADICIONANDO TEXTO-->
<div class="add-divs" id="div-text" hidden="" style=" padding: 15px;">
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title"><?= lang('add') ?> / <?= lang('edit') ?> <?= lang('text') ?></h2>
            <p class="panel-subtitle">
            </p>
        </header>
        <div class="panel-body">
            <form class="form-horizontal form-bordered">
                <div class="form-group">
                    <div class="col-md-6">
                        <label class="control-label">Nome</label>
                        <input type="text" name="module_text_name" id="module_text_name" class="form-control" value="">
                    </div>
                    <div class="col-md-6">
                        <label><?= lang('order') ?></label>
                        <input type="text" class="form-control" id="text_order" placeholder="<?= lang('order') ?>" value="">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="summernote" name="content" id="module_text" data-plugin-summernote data-plugin-options='{ "height": 180, "codemirror": { "theme": "ambiance" } }'>...</div>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-lg-6">
                    <a class="btn btn-primary" href="javascript:void(0)" id="save_text_button" onclick="save_text()"><?= lang('save') ?></a>
                    <a class="btn btn-default"  href="javascript:void(0)" onclick="close_divs()"><?= lang('close') ?></a>
                </div>
            </div>
            <div class="visible-sm clearfix mt-sm mb-sm"></div>
            <input type="text" class="form-control hidden" id="text_id" value="">
            <div class="clearfix visible-xs mb-sm"></div>
        </div>
    </section>
    </br>
</div>
<!--ADICIONANDO VIDEO-AULAS-->
<div class="add-divs" id="div-video" hidden="" style=" padding: 15px;">
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title"><?= lang('add') ?> / <?= lang('edit') ?> <?= lang('video') ?></h2>
            <p class="panel-subtitle">
            </p>
        </header>
        <div class="panel-body">
            <form action="<?= $this->config->base_url('disciplines/receive/') . 'video/' . $module['id'] ?>" class="dropzone dz-square" id="dropzone-video"></form>
        </div>
    </section>
    </br>
</div>

<!--ADICIONANDO IMAGENS-->
<div class="add-divs" id="div-image" hidden="" style=" padding: 15px;">
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title"><?= lang('add') ?> / <?= lang('edit') ?> <?= lang('image') ?></h2>
            <p class="panel-subtitle">
            </p>
        </header>
        <div class="panel-body">
            <form action="<?= $this->config->base_url('disciplines/receive/') . 'image/' . $module['id'] ?>" class="dropzone dz-square" id="dropzone-image"></form>
        </div>
    </section>
    </br>
</div>

<!--ADICIONANDO AVALIACAO-->
<div class="add-divs" id="div-evaluation" hidden="" style=" padding: 15px;">
    <form class="evaluation">
        <!-- usado em varias funcoes e nao apenas aqui na avaliacao -->
        <input type="text" class="form-control hidden" id="module_id" name="module_id" value="<?= $module['id'] ?>">
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title"><?= lang('add') ?> / <?= lang('edit') ?> <?= lang('evaluation') ?></h2>
                <p class="panel-subtitle">
                </p>
            </header>
            <div class="panel-body">
                <div class="col-lg-12">
                    <div class="form-group">
                        <h3><label class="control-label">Informações da avaliação</label></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label"><?= lang('type') ?></label>
                            <select data-plugin-selectTwo class="form-control populate input-lg mb-md" id="type_test" name="type_test">
                                <option value="1" ><?= lang('daily_pay_test') ?></option>
                                <option value="2" ><?= lang('after_test') ?></option>
                                <option value="3" ><?= lang('evaluation') ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label><?= lang('order') ?></label>
                            <input type="text" class="form-control" id="evaluation_order" name="evaluation_order" placeholder="<?= lang('order') ?>" value="">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <h3><label class="control-label">Quantidades questões na avaliação</label></h3>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="control-label">Muito Fácil</label>
                            <div data-plugin-spinner data-plugin-options='{ "value":0, "min": 0, "max": <?= $max_very_easy ?> }'>
                                <div class="input-group">
                                    <input type="number" class="spinner-input form-control" maxlength="3" id="quantity_very_easy" name="quantity_very_easy">
                                    <div class="spinner-buttons input-group-btn">
                                        <button type="button" class="btn btn-default spinner-up">
                                            <i class="fa fa-angle-up"></i>
                                        </button>
                                        <button type="button" class="btn btn-default spinner-down">
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <p>
                                Há<code id="quantity_very_easy_code"><?= $max_very_easy ?></code> questões.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="control-label">Fácil</label>
                            <div data-plugin-spinner data-plugin-options='{ "value":0, "min": 0, "max": <?= $max_easy ?> }'>
                                <div class="input-group">
                                    <input type="number" class="spinner-input form-control" maxlength="3" id="quantity_easy" name="quantity_easy">
                                    <div class="spinner-buttons input-group-btn">
                                        <button type="button" class="btn btn-default spinner-up">
                                            <i class="fa fa-angle-up"></i>
                                        </button>
                                        <button type="button" class="btn btn-default spinner-down">
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <p>
                                Há <code id="quantity_easy_code"><?= $max_easy ?></code> questões.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="control-label">Médio</label>
                            <div data-plugin-spinner data-plugin-options='{ "value":0, "min": 0, "max": <?= $max_medium ?> }'>
                                <div class="input-group">
                                    <input type="number" class="spinner-input form-control" maxlength="3" id="quantity_medium" name="quantity_medium">
                                    <div class="spinner-buttons input-group-btn">
                                        <button type="button" class="btn btn-default spinner-up">
                                            <i class="fa fa-angle-up"></i>
                                        </button>
                                        <button type="button" class="btn btn-default spinner-down">
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <p>
                                Há<code id="quantity_medium_code"><?= $max_medium ?></code> questões.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="control-label">Dificil</label>
                            <div data-plugin-spinner data-plugin-options='{ "value":0, "min": 0, "max": <?= $max_hard ?> }'>
                                <div class="input-group">
                                    <input type="number" class="spinner-input form-control" maxlength="3" id="quantity_hard" name="quantity_hard">
                                    <div class="spinner-buttons input-group-btn">
                                        <button type="button" class="btn btn-default spinner-up">
                                            <i class="fa fa-angle-up"></i>
                                        </button>
                                        <button type="button" class="btn btn-default spinner-down">
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <p>
                                Há<code id="quantity_hard_code"><?= $max_hard ?></code> questões.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="control-label">Muito Difícil</label>
                            <div data-plugin-spinner data-plugin-options='{ "value":0, "min": 0, "max": <?= $max_very_hard ?> }'>
                                <div class="input-group">
                                    <input type="number" class="spinner-input form-control" maxlength="3" id="quantity_very_hard" name="quantity_very_hard">
                                    <div class="spinner-buttons input-group-btn">
                                        <button type="button" class="btn btn-default spinner-up">
                                            <i class="fa fa-angle-up"></i>
                                        </button>
                                        <button type="button" class="btn btn-default spinner-down">
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <p>
                                Há<code id="quantity_very_hard_code"><?= $max_very_hard ?></code> questões.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <h3><label class="control-label">Escolha as questões</label></h3>
                            <a href="<?= $this->config->base_url('settings/listQuestions') ?>">
                                <i class="fa fa-question-circle"></i>
                                Adicionar mais questões ao banco
                            </a>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Tema</label>
                                <select id="category"  data-plugin-selectTwo class="form-control populate input-lg mb-md">
                                    <?php foreach ($categories as $d): ?>
                                        <option value="<?= $d['id'] ?>"><?= $d['name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Subtema</label>
                                <select id="subject" data-plugin-selectTwo class="form-control populate input-lg mb-md select2">

                                </select>
                            </div>
                        </div>

                        <div class="col-sm-2" style="top: 30px;">
                            <div class="form-group">
                                <label class="control-label"></label>
                                <span onclick="load_questions()" href="" class="btn btn-info" style="margin: 9px;" href=""><i class="fa fa-refresh"></i> Atualizar</span>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <h4><label class="control-label"><?= lang('very_easy') ?></label></h4>
                                <a onclick="check_all_very_easy()"><span class="control-label">Selecionar todas</span></a>
                                <div id="questions_very_easy">

                                </div>
                                <?php foreach ($questions_very_easy as $q): ?>
                                    <div class="checkbox-custom checkbox-default">
                                        <input type="checkbox" name="questions_very_easy[]" value="<?= $q['id'] ?>" id="<?= $q['id'] ?>">
                                        <label><?= $q['question'] ?></label>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="form-group">
                                <h4><label class="control-label"><?= lang('easy') ?></label></h4>
                                <a onclick="check_all_easy()"><span class="control-label">Selecionar todas</span></a>
                                <div id="questions_easy">
                                    <?php foreach ($questions_easy as $q): ?>
                                        <div class="checkbox-custom checkbox-default">
                                            <input type="checkbox" name="questions_easy[]" value="<?= $q['id'] ?>" id="<?= $q['id'] ?>">
                                            <label><?= $q['question'] ?></label>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="form-group">
                                    <h4><label class="control-label"><?= lang('medium') ?></label></h4>
                                    <a onclick="check_all_medium()"><span class="control-label">Selecionar todas</span></a>

                                    <div id="questions_medium">
                                        <?php foreach ($questions_medium as $q): ?>
                                            <div class="checkbox-custom checkbox-default">
                                                <input type="checkbox" name="questions_medium[]" value="<?= $q['id'] ?>" id="<?= $q['id'] ?>">
                                                <label><?= $q['question'] ?></label>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="form-group">
                                        <h4><label class="control-label"><?= lang('hard') ?></label></h4>
                                        <a onclick="check_all_hard()"><span class="control-label">Selecionar todas</span></a>

                                        <div id="questions_hard">
                                            <?php foreach ($questions_hard as $q): ?>
                                                <div class="checkbox-custom checkbox-default">
                                                    <input type="checkbox" name="questions_hard[]" value="<?= $q['id'] ?>" id="<?= $q['id'] ?>">
                                                    <label><?= $q['question'] ?></label>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                        <div class="form-group">
                                            <h4><label class="control-label"><?= lang('very_hard') ?></label></h4>
                                            <a onclick="check_all_very_hard()"><span class="control-label">Selecionar todas</span></a>

                                            <div id="questions_very_hard">
                                                <?php foreach ($questions_very_hard as $q): ?>
                                                    <div class="checkbox-custom checkbox-default">
                                                        <input type="checkbox" name="questions_very_hard[]" value="<?= $q['id'] ?>" id="<?= $q['id'] ?>">
                                                        <label><?= $q['question'] ?></label>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>                        
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <a class="btn btn-primary" href="javascript:void(0)" onclick="save_evaluation()"><?= lang('save') ?></a>
                                        <a class="btn btn-default"  href="javascript:void(0)" onclick="close_divs()"><?= lang('close') ?></a>
                                    </div>
                                </div>
                                <div class="visible-sm clearfix mt-sm mb-sm"></div>
                                <input type="text" class="form-control hidden" id="evaluation_id" name="evaluation_id" value="">
                                <div class="clearfix visible-xs mb-sm"></div>
                            </div>


                            </section>
                            </form>
                            </br>
                        </div>
                        <!--ADICIONANDO ANEXO-->
                        <div class="add-divs" id="div-file" hidden="" style=" padding: 15px;">
                            <section class="panel">
                                <header class="panel-heading">

                                    <h2 class="panel-title"><?= lang('add') ?> / <?= lang('edit') ?> <?= lang('file') ?></h2>
                                    <p class="panel-subtitle">
                                    </p>
                                </header>
                                <div class="panel-body">
                                    <form action="<?= $this->config->base_url('disciplines/receive/') . 'file/' . $module['id'] ?>" class="dropzone dz-square" id="dropzone-file"></form>
                                </div>
                            </section>
                            </br>
                        </div>

                        <!-- EDITANDO NOME VIDEO -->
                        <div class="add-divs" id="div-video-name" hidden="" style=" padding: 15px;">
                            <section class="panel">
                                <header class="panel-heading">

                                    <h2 class="panel-title"><?= lang('edit') ?> <?= lang('video_name') ?></h2>
                                    <p class="panel-subtitle">
                                    </p>
                                </header>
                                <div class="panel-body">
                                    <form class="form-inline">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label><?= lang('name') ?> </label>
                                                <input type="text" class="form-control" id="video-name" placeholder="<?= lang('name') ?>" value="">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label><?= lang('order') ?> </label>
                                                <input type="text" class="form-control" id="video_order" placeholder="<?= lang('order') ?>" value="">
                                            </div>
                                        </div>
                                        <div class="visible-sm clearfix mt-sm mb-sm"></div>
                                        <input type="text" class="form-control hidden" id="content_video_id" value="" >
                                        <div class="clearfix visible-xs mb-sm"></div>
                                        <div class="row">
                                            <a class="btn btn-primary" href="javascript:void(0)" onclick="save_video_name()"><?= lang('save') ?></a>
                                            <a class="btn btn-default"  href="javascript:void(0)" onclick="close_divs()"><?= lang('close') ?></a>
                                        </div>
                                    </form>
                                </div>
                            </section>
                            </br>
                        </div>

                        <!-- EDITANDO NOME IMAGEM -->
                        <div class="add-divs" id="div-image-name" hidden="" style=" padding: 15px;">
                            <section class="panel">
                                <header class="panel-heading">

                                    <h2 class="panel-title"><?= lang('edit') ?> <?= lang('image_name') ?></h2>
                                    <p class="panel-subtitle">
                                    </p>
                                </header>
                                <div class="panel-body">
                                    <form class="form-inline">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label><?= lang('name') ?></label>
                                                <input type="text" class="form-control" id="image-name" placeholder="<?= lang('name') ?>" value="">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label><?= lang('order') ?></label>
                                                <input type="text" class="form-control" id="image_order" placeholder="<?= lang('order') ?>" value="">
                                            </div>
                                        </div>

                                        <div class="visible-sm clearfix mt-sm mb-sm"></div>
                                        <input type="text" class="form-control hidden" id="content_image_id" value="" >
                                        <div class="clearfix visible-xs mb-sm"></div>
                                        <div class="row">
                                            <a class="btn btn-primary" href="javascript:void(0)" onclick="save_image_name()"><?= lang('save') ?></a>
                                            <a class="btn btn-default"  href="javascript:void(0)" onclick="close_divs()"><?= lang('close') ?></a>
                                        </div>
                                    </form>
                                </div>
                            </section>
                            </br>
                        </div>

                        <!-- EDITANDO NOME ARQUIVO -->
                        <div class="add-divs" id="div-file-name" hidden="" style=" padding: 15px;">
                            <section class="panel">
                                <header class="panel-heading">

                                    <h2 class="panel-title"><?= lang('edit') ?> <?= lang('file_name') ?></h2>
                                    <p class="panel-subtitle">
                                    </p>
                                </header>
                                <div class="panel-body">
                                    <form class="form-inline">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label><?= lang('name') ?></label>
                                                <input type="text" class="form-control" id="file-name" placeholder="<?= lang('name') ?>" value="">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label><?= lang('order') ?></label>
                                                <input type="text" class="form-control" id="file_order" placeholder="<?= lang('order') ?>" value="">
                                            </div>
                                        </div>
                                        <div class="visible-sm clearfix mt-sm mb-sm"></div>
                                        <input type="text" class="form-control hidden" id="content_file_id" value="" >
                                        <div class="clearfix visible-xs mb-sm"></div>
                                        <div class="row">
                                            <a class="btn btn-primary" href="javascript:void(0)" onclick="save_file_name()"><?= lang('save') ?></a>
                                            <a class="btn btn-default"  href="javascript:void(0)" onclick="close_divs()"><?= lang('close') ?></a>
                                        </div>
                                    </form>
                                </div>
                            </section>
                            </br>
                        </div>

                        <!-- BOTÕES DE AÇÃO DO MÓDULO -->

                        <div style=" text-align: center; margin-bottom: 15px">
                            <a class="btn btn-primary" href="javascript:void(0)" onclick="add_text()" ><?= lang('add') ?> <?= lang('text') ?></a>
                            <a class="btn btn-primary" href="javascript:void(0)" onclick="add_video()" ><?= lang('add') ?> <?= lang('video_class') ?></a>
                            <a class="btn btn-primary" href="javascript:void(0)" onclick="add_file()" ><?= lang('add') ?> <?= lang('file') ?></a>
                            <a class="btn btn-primary" href="javascript:void(0)" onclick="add_image()" ><?= lang('add') ?> <?= lang('image') ?></a>
                            <a class="btn btn-primary" href="javascript:void(0)" onclick="add_evaluation()" ><?= lang('add') ?> <?= lang('evaluation') ?></a>
                        </div>
                        <!-- LISTANDO CONTEÚDO DOS MÓDULOS -->
                        <section class="panel">
                            <header class="panel-heading">
                                <h2 class="panel-title"><?= $title ?></h2>
                            </header>
                            <div class="panel-body">
                                <table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="<?= $this->config->base_url(VENDORPATH . 'jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf') ?>">
                                    <thead>
                                        <tr>
                                            <th hidden=""></th>
                                            <th><?= lang('order') ?></th>
                                            <th><?= lang('name') ?></th>
                                            <th><?= lang('type') ?></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($contents as $c): ?>
                                            <tr class="content_row" id="<?= $c['id'] ?>">
                                                <td hidden=""></td>
                                                <td><?= $c['order'] ?></td>
                                                <td><?= $c['name'] ?></td>
                                                <td><?= lang($c['type']) ?></td>
                                                <td style=" text-align: center; width: 150px">
                                                    <?php if ($c['type'] == 'text'): ?>
                                                        <a href="javascript:void(0)" onclick="load_content_text(<?= $c['id'] ?>)" class="on-default edit-row" style=" margin-right: 5px; margin-left: 5px;"><i class="fa fa-pencil"></i></a>
                                                    <?php elseif ($c['type'] == 'evaluation'): ?>
                                                        <a href="javascript:void(0)" onclick="load_evaluation_replys(<?= $c['id'] ?>)" class="on-default edit-row" style=" margin-right: 5px; margin-left: 5px;"><i class="fa fa-list"></i></a>
                                                        <a href="javascript:void(0)" onclick="load_content_evaluation(<?= $c['id'] ?>)" class="on-default edit-row" style=" margin-right: 5px; margin-left: 5px;"><i class="fa fa-pencil"></i></a>
                                                    <?php elseif ($c['type'] == 'file'): ?>
                                                        <a href="javascript:void(0)" onclick="professor_view_file(<?= $c['id'] ?>)" class="on-default open-row" style=" margin-right: 5px; margin-left: 5px;"><i class="fa fa-eye"></i></a>
                                                        <a href="javascript:void(0)" oncick="load_content_file(<?= $c['id'] ?>)" class="on-default open-row" style=" margin-right: 5px; margin-left: 5px;"><i class="fa fa-cloud-download"></i></a>
                                                        <a href="javascript:void(0)" onclick="load_content_file_name(<?= $c['id'] ?>)" class="on-default edit-row" style=" margin-right: 5px; margin-left: 5px;"><i class="fa fa-pencil"></i></a>
                                                    <?php elseif ($c['type'] == 'video'): ?>
                                                        <a href="javascipt:void(0)" onclick="professor_view_file(<?= $c['id'] ?>)" class="on-default edit-row" style=" margin-right: 5px; margin-left: 5px;"><i class="fa fa-eye"></i></a>
                                                        <a href="javascript:void(0)" onclick="load_content_video_name(<?= $c['id'] ?>)" class="on-default edit-row" style=" margin-right: 5px; margin-left: 5px;"><i class="fa fa-pencil"></i></a>
                                                    <?php elseif ($c['type'] == 'image'): ?>
                                                        <a href="javascipt:void(0)" onclick="professor_view_file(<?= $c['id'] ?>)" class="on-default edit-row" style=" margin-right: 5px; margin-left: 5px;"><i class="fa fa-eye"></i></a>
                                                        <a href="javascript:void(0)" onclick="load_content_image_name(<?= $c['id'] ?>)" class="on-default edit-row" style=" margin-right: 5px; margin-left: 5px;"><i class="fa fa-pencil"></i></a>
                                                    <?php endif; ?>
                                                    <a href="javascript:void(0)" onclick="delete_content(<?= $c['id'] ?>)" class="on-default remove-row" style=" margin-right: 5px; margin-left: 5px;"><i class="fa fa-trash-o"></i></a>
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
                        <script src="<?= $this->config->base_url(VENDORPATH . 'jquery-ui/js/jquery-ui-1.10.4.custom.js') ?>"></script>	
                        <script src="<?= $this->config->base_url(VENDORPATH . 'jquery-ui-touch-punch/jquery.ui.touch-punch.js') ?>"></script>	
                        <script src="<?= $this->config->base_url(VENDORPATH . 'jquery-maskedinput/jquery.maskedinput.js') ?>"></script>		
                        <script src="<?= $this->config->base_url(VENDORPATH . 'fuelux/js/spinner.js') ?>"></script>	
                        <script src="<?= $this->config->base_url(VENDORPATH . 'dropzone/dropzone.js') ?>"></script>		
                        <script src="<?= $this->config->base_url(VENDORPATH . 'codemirror/lib/codemirror.js') ?>"></script>	
                        <script src="<?= $this->config->base_url(VENDORPATH . 'codemirror/addon/selection/active-line.js') ?>"></script>	
                        <script src="<?= $this->config->base_url(VENDORPATH . 'codemirror/addon/edit/matchbrackets.js') ?>"></script>	
                        <script src="<?= $this->config->base_url(VENDORPATH . 'codemirror/mode/javascript/javascript.js') ?>"></script>		
                        <script src="<?= $this->config->base_url(VENDORPATH . 'codemirror/mode/xml/xml.js') ?>"></script>		
                        <script src="<?= $this->config->base_url(VENDORPATH . 'codemirror/mode/htmlmixed/htmlmixed.js') ?>"></script>	
                        <script src="<?= $this->config->base_url(VENDORPATH . 'codemirror/mode/css/css.js') ?>"></script>	
                        <script src="<?= $this->config->base_url(VENDORPATH . 'summernote/summernote.js') ?>"></script>		
                        <script src="<?= $this->config->base_url(VENDORPATH . 'bootstrap-maxlength/bootstrap-maxlength.js') ?>"></script>
                        <script src="<?= $this->config->base_url(VENDORPATH . 'ios7-switch/ios7-switch.js') ?>"></script>

                        <!-- Examples -->
                        <script src="<?= $this->config->base_url(JSPATH . 'tables/examples.datatables.default.js') ?>"></script>
                        <script src="<?= $this->config->base_url(JSPATH . 'tables/examples.datatables.row.with.details.js') ?>"></script>
                        <script src="<?= $this->config->base_url(JSPATH . 'tables/examples.datatables.tabletools.js') ?>"></script>  
                        <script src="<?= $this->config->base_url(JSPATH . 'forms/examples.advanced.form.js') ?>"></script>                

                        <!-- Theme Base, Components and Settings --> 
                        <script src="<?= $this->config->base_url(JSPATH . 'theme.js') ?>"></script>

                        <!-- Theme Custom -->
                        <script src="<?= $this->config->base_url(JSPATH . 'theme.custom.js') ?>"></script>

                        <!-- Theme Initialization Files -->
                        <script src="<?= $this->config->base_url(JSPATH . 'theme.init.js') ?>"></script>

                        <script>
                                                        jQuery('.nav.nav-main li').removeClass('nav-active');
                                                        Dropzone.autoDiscover = false; // otherwise will be initialized twice
                                                        // video                            
                                                        var myDropzoneOptionsVideo = {
                                                            maxFiles: 1,
                                                            maxFilesize: 500000000000000,
                                                            acceptedMimeTypes: 'video/*',
                                                            init: function () {
                                                                this.on("complete", function (file) {
                                                                    window.location = jQuery("body").data('baseurl') + 'modules/openModule/' + jQuery('#module_id').val();
                                                                });
                                                            }
                                                        };
                                                        var myDropzoneVideo = new Dropzone('#dropzone-video', myDropzoneOptionsVideo);
                                                        // image
                                                        var myDropzoneOptionsImage = {
                                                            maxFiles: 1,
                                                            maxFilesize: 500000000000000,
                                                            acceptedMimeTypes: 'image/*',
                                                            init: function () {
                                                                this.on("complete", function (file) {
                                                                    window.location = jQuery("body").data('baseurl') + 'modules/openModule/' + jQuery('#module_id').val();
                                                                });
                                                            }
                                                        };
                                                        var myDropzoneImage = new Dropzone('#dropzone-image', myDropzoneOptionsImage);
                                                        // file
                                                        var myDropzoneOptionsFile = {
                                                            maxFiles: 1,
                                                            maxFilesize: 500000000000000,
                                                            init: function () {
                                                                this.on("complete", function (file) {
                                                                    window.location = jQuery("body").data('baseurl') + 'modules/openModule/' + jQuery('#module_id').val();
                                                                });
                                                            }
                                                        };
                                                        var myDropzoneFile = new Dropzone('#dropzone-file', myDropzoneOptionsFile);

                                                        jQuery('#category').on('change', function () {
                                                            jQuery.ajax({
                                                                url: jQuery("body").data("baseurl") + "disciplines/load_category",
                                                                type: "post",
                                                                dataType: 'json',
                                                                data: {
                                                                    id: jQuery('#category').val()
                                                                },
                                                                success: function (response) {
                                                                    jQuery('#subject').html('');
                                                                    jQuery.each(response, function (index, value) {
                                                                        jQuery('#subject').append('<option value="' + response[index].id + '" selected>' + response[index].name + '</option>');
                                                                    });
                                                                    jQuery('#subject').select2('val', 1);
                                                                }
                                                            });
                                                        });

                                                        function load_questions() {
                                                            jQuery.ajax({
                                                                url: jQuery("body").data("baseurl") + "modules/load_questions",
                                                                type: "post",
                                                                dataType: 'json',
                                                                data: {
                                                                    subject_id: jQuery('#subject').val()
                                                                },
                                                                success: function (response) {

                                                                    jQuery('#questions_easy').empty();

                                                                    //easy
                                                                    jQuery.each(response.questions.questions_easy, function (index, value) {
                                                                        jQuery('#questions_easy').append('<div class="checkbox-custom checkbox-default">'
                                                                                + '<input type="checkbox" name="questions_easy[]" value="' + value.id + '" id="' + value.id + '">'
                                                                                + '<label>' + value.question + '</label>'
                                                                                + '</div>'
                                                                                );
                                                                    });
                                                                    jQuery('#questions_hard').empty();
                                                                    //hard
                                                                    jQuery.each(response.questions.questions_hard, function (index, value) {
                                                                        jQuery('#questions_hard').append('<div class="checkbox-custom checkbox-default">'
                                                                                + '<input type="checkbox" name="questions_hard[]" value="' + value.id + '" id="' + value.id + '">'
                                                                                + '<label>' + value.question + '</label>'
                                                                                + '</div>'
                                                                                );
                                                                    });
                                                                    jQuery('#questions_medium').empty();
                                                                    //medium
                                                                    jQuery.each(response.questions.questions_medium, function (index, value) {
                                                                        jQuery('#questions_medium').append('<div class="checkbox-custom checkbox-default">'
                                                                                + '<input type="checkbox" name="questions_medium[]" value="' + value.id + '" id="' + value.id + '">'
                                                                                + '<label>' + value.question + '</label>'
                                                                                + '</div>'
                                                                                );
                                                                    });
                                                                    jQuery('#questions_very_easy').empty();
                                                                    //very easy
                                                                    jQuery.each(response.questions.questions_very_easy, function (index, value) {
                                                                        jQuery('#questions_very_easy').append('<div class="checkbox-custom checkbox-default">'
                                                                                + '<input class="checkbox_very_easy" type="checkbox" name="questions_very_easy[]" value="' + value.id + '" id="' + value.id + '">'
                                                                                + '<label>' + value.question + '</label>'
                                                                                + '</div>'
                                                                                );
                                                                    });

                                                                    jQuery('#questions_very_hard').empty();
                                                                    //very hard
                                                                    jQuery.each(response.questions.questions_very_hard, function (index, value) {
                                                                        jQuery('#questions_very_hard').append('<div class="checkbox-custom checkbox-default">'
                                                                                + '<input class="checkbox_very_hard" type="checkbox" name="questions_very_hard[]" value="' + value.id + '" id="' + value.id + '">'
                                                                                + '<label>' + value.question + '</label>'
                                                                                + '</div>'
                                                                                );
                                                                    });

                                                                    jQuery("#quantity_very_hard").attr('max', response.questions.questions_very_hard_count);
                                                                    jQuery("#quantity_hard").attr('max', response.questions.questions_hard_count);
                                                                    jQuery("#quantity_very_easy").attr('max', response.questions.questions_very_easy_count);
                                                                    jQuery("#quantity_easy").attr('max', response.questions.questions_easy_count);
                                                                    jQuery("#quantity_medium").attr('max', response.questions.questions_medium_count);

                                                                    jQuery("#quantity_very_hard_code").html(response.questions.questions_very_hard_count);
                                                                    jQuery("#quantity_hard_code").html(response.questions.questions_hard_count);
                                                                    jQuery("#quantity_very_easy_code").html(response.questions.questions_very_easy_count);
                                                                    jQuery("#quantity_easy_code").html(response.questions.questions_easy_count);
                                                                    jQuery("#quantity_medium_code").html(response.questions.questions_medium_count);

                                                                }
                                                            });
                                                        }
                                                        function check_all_very_easy() {
                                                            if (bool = !bool) { // check select status
                                                                $('.checkbox_very_easy').each(function () { //loop through each checkbox
                                                                    this.checked = true;  //select all checkboxes with class "checkbox1"
                                                                });
                                                            } else {
                                                                $('.checkbox_very_easy').each(function () { //loop through each checkbox
                                                                    this.checked = false; //deselect all checkboxes with class "checkbox1"
                                                                });
                                                            }
                                                        }
                                                        function check_all_easy() {
                                                            if (bool1 = !bool1) { // check select status
                                                                $('.checkbox_easy').each(function () { //loop through each checkbox
                                                                    this.checked = true;  //select all checkboxes with class "checkbox1"
                                                                });
                                                            } else {
                                                                $('.checkbox_easy').each(function () { //loop through each checkbox
                                                                    this.checked = false; //deselect all checkboxes with class "checkbox1"
                                                                });
                                                            }
                                                        }
                                                        function check_all_medium() {
                                                            if (bool2 = !bool2) { // check select status
                                                                $('.checkbox_medium').each(function () { //loop through each checkbox
                                                                    this.checked = true;  //select all checkboxes with class "checkbox1"
                                                                });
                                                            } else {
                                                                $('.checkbox_medium').each(function () { //loop through each checkbox
                                                                    this.checked = false; //deselect all checkboxes with class "checkbox1"
                                                                });
                                                            }
                                                        }
                                                        function check_all_hard() {
                                                            if (bool3 = !bool3) { // check select status
                                                                $('.checkbox_hard').each(function () { //loop through each checkbox
                                                                    this.checked = true;  //select all checkboxes with class "checkbox1"
                                                                });
                                                            } else {
                                                                $('.checkbox_hard').each(function () { //loop through each checkbox
                                                                    this.checked = false; //deselect all checkboxes with class "checkbox1"
                                                                });
                                                            }
                                                        }
                                                        function check_all_very_hard() {
                                                            if (bool4 = !bool4) { // check select status
                                                                $('.checkbox_very_hard').each(function () { //loop through each checkbox
                                                                    this.checked = true;  //select all checkboxes with class "checkbox1"
                                                                });
                                                            } else {
                                                                $('.checkbox_very_hard').each(function () { //loop through each checkbox
                                                                    this.checked = false; //deselect all checkboxes with class "checkbox1"
                                                                });
                                                            }
                                                        }
                        </script>