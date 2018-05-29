<script src="<?= $this->config->base_url(JSPATH . 'forum.js') ?>"></script>
<div id="div-forum" hidden="" style=" padding: 15px;">  
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title"><?= lang('add') ?> / <?= lang('edit') ?> <?= lang('forum') ?></h2>
            <p class="panel-subtitle">
            </p>
        </header>
        <div class="panel-body">
            <form class="form-inline">
                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group" style=" width: 100%">
                            <label class="control-label"><?= lang('forum_title') ?></label></br>
                            <input type="text" class="form-control" style=" width: 100%" id="name_forum" placeholder="<?= lang('forum_title') ?>" value="">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        </br>
                        <div class="visible-sm clearfix mt-sm mb-sm"></div>
                        <input type="text" class="form-control hidden" id="forum_id" value="" >
                        <div class="clearfix visible-xs mb-sm"></div>
                        <a class="btn btn-primary" href="javascript:void(0)" onclick="save_forum()"><?= lang('save') ?></a>
                        <a class="btn btn-default"  href="javascript:void(0)" onclick="jQuery('#name').val('');
                                jQuery('#forum_id').val('');
                                jQuery('#div-forum').slideUp();"><?= lang('close') ?></a>
                    </div>
            </form>
        </div>
    </section>
    </br>
</div>

        <!--SECTION QUE MINIMIZA OU MAXIMIZA a aba FORUNS -->

<section class="panel">
    <header class="panel-heading">
        <a onclick="jQuery('#discipline_foruns_minimize').click();" href="javascript:void(0)">
            <h2 class="panel-title">Fóruns da Disciplina</h2>
            <p class="panel-subtitle">
            </p>
            <div class="panel-actions">
                <a href="javascript:void(0)" class="fa fa-caret-up" id="discipline_foruns_minimize"></a>
            </div>
        </a>
    </header>
    <div class="panel-body admin" style="display: none;">
        <?php if ($this->user['type'] == 'admin' || $this->user['type'] == 'professor'): ?>
            <a class="btn btn-primary" style="float: left; margin-bottom: 15px;"  href="javascript:void(0)" onclick="jQuery('#name').val('');
                    jQuery('#div-forum').slideDown();
                    jQuery('#forum_id').val('')" >Adicionar Forum</a>
           <?php endif; ?>
        <br>
            <!-- TABELA DE ALUNOS MATRICULADOS NA DISCIPLINA -->

        <table class="table table-bordered table-striped mb-none table-foruns" id="datatable-foruns" data-swf-path="<?= $this->config->base_url(VENDORPATH . 'jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf') ?>">
            <thead>
                <tr>
                    <th hidden=""></th>
                    <th><?= lang('forum_title') ?></th>
                    <th><?= lang('category') ?></th>
                    <th><?= lang('posts') ?></th>
                    <th><?= lang('last_post') ?></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($foruns):
                    foreach ($foruns as $f):
                        ?>
                        <tr class="forum_row" style=" background-color: <?= $f['category_color'] ?>" id="<?= $f['forum_id'] ?>">  
                            <td hidden="<?= $f['category_name'] ?>"></td>
                            <td>
                                <a href="javascript:void(0)" onclick="open_forum(<?= $f['forum_id'] ?>)" style="display: block;"><?= $f['forum_title'] ?></a>
                            </td>
                            <td><?= $f['category_name'] ?></td>
                            <td><?= $f['number_posts'] ?></td>
                            <td><?= $f['last_post'] ?> - <?= $f['posted_user'] ?></td>
                            <td style=" text-align: center; width: 150px">
                                <?php if ($this->user['type'] == 'admin' || $this->user['type'] == 'professor'): ?>
                                    <a href="javascript:void(0)" onclick="load_forum(<?= $f['forum_id'] ?>)" class="on-default edit-row" style=" margin-right: 5px; margin-left: 5px;"><i class="fa fa-pencil"></i></a>
                                    <a href="javascript:void(0)" onclick="delete_forum(<?= $f['forum_id'] ?>)" class="on-default remove-row" style=" margin-right: 5px; margin-left: 5px;"><i class="fa fa-trash-o"></i></a>
                                    <?php endif; ?>
                            </td>
                        </tr>
                        <?php
                    endforeach;
                endif;
                ?>
            </tbody>
        </table>
    </div>
</section>

<script>
    var $tableForuns = $('#datatable-foruns');
    $tableForuns.dataTable({
        sDom: "<'text-right mb-md'T>" + $.fn.dataTable.defaults.sDom,
        oTableTools: {
            sSwfPath: $tableForuns.data('swf-path'),
            aButtons: [
                {
                    sExtends: 'pdf',
                    sButtonText: 'PDF'
                },
                {
                    sExtends: 'csv',
                    sButtonText: 'CSV'
                },
                {
                    sExtends: 'xls',
                    sButtonText: 'Excel'
                },
                {
                    sExtends: 'print',
                    sButtonText: 'Print',
                    sInfo: 'Please press CTR+P to print or ESC to quit'
                }
            ]
        }
    });
</script>