<script src="<?= $this->config->base_url(JSPATH . 'disciplines.js') ?>"></script>
<style>
    .jstree-children .jstree-leaf{
        height: 60px;   
    }
</style>

<div class="panel-body">
    <table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="<?= $this->config->base_url(VENDORPATH . 'jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf') ?>">
        <thead>
            <tr>
                <th><i class="fa fa-file"></i>Conteúdo</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contents as $c): ?>
                <?php if ($c['type'] == 'video'): ?>
                    <tr class="content_row">
                        <td>        
                            <?php if ($c['disabled'] != 1): ?>
                                <a href="javascript:void(0)" <?php if ($c['disabled'] != 1): ?>onclick="loadContentVideo(<?= $c['id'] ?>, 'view_video')"<?php endif; ?> > 
                                    <?= $c['name'] ?>
                                </a>
                            <?php else: ?>
                                <?= $c['name'] ?>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php elseif ($c['type'] == 'evaluation'): ?>
                    <tr class="content_row">
                        <td>
                            <?php if ($c['disabled'] != 1): ?>
                                <a href="javascript:void(0)" <?php if ($c['disabled'] != 1): ?>onclick="open_content_evaluation(<?= $c['id'] ?>)"<?php endif; ?> > 
                                    <?= $c['name'] ?>
                                </a>
                            <?php else: ?>
                                <?= $c['name'] ?>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php elseif ($c['type'] == 'text'): ?>
                    <tr class="content_row">
                        <td>        
                            <?php if ($c['disabled'] != 1): ?>
                                <a href="javascript:void(0)" <?php if ($c['disabled'] != 1): ?>onclick="open_content_text(<?= $c['id'] ?>)"<?php endif; ?> > 
                                    <?= $c['name'] ?>
                                </a>
                            <?php else: ?>
                                <?= $c['name'] ?>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php elseif ($c['type'] == 'image'): ?>
                    <tr class="content_row">
                        <td>
                            <?php if ($c['disabled'] != 1): ?>
                                <a href="javascript:void(0)" onclick="loadContentImage(<?= $c['id'] ?>, 'view_image')" > 
                                    <?= $c['name'] ?>
                                </a>
                            <?php else: ?>
                                <?= $c['name'] ?>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>

        <thead>
            <tr>
                <th><i class="fa fa-folder-o"></i>  Anexos</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($contents as $c): ?>
                <?php if ($c['type'] == 'file'): ?>
                    <tr class="content_row">
                        <td>        
                            <a href="javascript:void(0)" onclick="loadContent(<?= $c['id'] ?>, 'view_file')"> 
                                <?= $c['name'] ?>
                            </a>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="row">
    <!--VENDO VIDEO-->
    <div class="add-divs" id="view_video" hidden=""  style="text-align: center; height:500px;"></div>
    <!--VENDO TEXT-->
    <div class="add-divs" id="view_text" hidden=""  style="height:100%; overflow-y: scroll; text-align: center;"></div>
    <!--VENDO AVALIACAO-->
    <div class="add-divs" id="view_evaluation" hidden=""  style="height:100%; overflow-y: scroll; text-align: center;"></div>
    <!--VENDO IMAGEM-->
    <div class="add-divs" id="view_image" hidden=""  style="text-align: center; height:100%; overflow-y: scroll;"></div>
    <!--VENDO ANEXO-->
    <div class="add-divs" id="view_file" hidden=""  style="text-align: center; width:100%; overflow-y: scroll"></div>
</div>
<input type="text" class="form-control hidden" id="module_id" name="module_id" value="<?= $module['id'] ?>">

<!-- Theme Base, Components and Settings --> 
<script src="<?= $this->config->base_url(JSPATH . 'theme.js') ?>"></script>
<!-- Theme Custom -->
<script src="<?= $this->config->base_url(JSPATH . 'theme.custom.js') ?>"></script>
<!-- Theme Initialization Files -->
<script src="<?= $this->config->base_url(JSPATH . 'theme.init.js') ?>"></script>
<script>
                        function open_file_new_page(url) {
                            window.open(url);
                        }
</script>