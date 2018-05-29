<link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'jquery-datatables-bs3/assets/css/datatables.css') ?>" />
<script src="<?= $this->config->base_url(JSPATH . 'settings.js') ?>"></script>

<div id="div-category" hidden="" style=" padding: 15px;">
    <section class="panel">
        <header class="panel-heading">

            <h2 class="panel-title"><?= lang('add') ?> / <?= lang('edit') ?> <?= lang('category') ?></h2>
            <p class="panel-subtitle">
            </p>
        </header>
        <div class="panel-body">
            <form class="form-inline">
                <div class="form-group">
                    <label class="sr-only" for="exampleInputUsername2"><?= lang('name') ?></label>
                    <input type="text" class="form-control" id="name" placeholder="<?= lang('name') ?>" value="">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="exampleInputPassword2"><?= lang('color') ?></label>
                    <input type="color" class="form-control" id="color" placeholder="<?= lang('color') ?>" value="" style=" width: 50px">
                </div>

                <div class="visible-sm clearfix mt-sm mb-sm"></div>
                <input type="text" class="form-control hidden" id="category_id" value="" >
                <div class="clearfix visible-xs mb-sm"></div>

                <a class="btn btn-primary" href="javascript:void(0)" onclick="save_category()"><?= lang('save') ?></a>
                <a class="btn btn-default"  href="javascript:void(0)" onclick="jQuery('#color').val('');
                        jQuery('#name').val('');
                        jQuery('#category_id').val('');
                        jQuery('#div-category').slideUp();"><?= lang('close') ?></a>
            </form>
        </div>
    </section>
    </br>
</div>

<section class="panel">
    <header class="panel-heading">
        <h2 class="panel-title"><?= lang('list_categories') ?>
            <a class="btn btn-primary" style="float: right; display: block"  href="javascript:void(0)" onclick="jQuery('#color').val('');
                    jQuery('#name').val('');
                    jQuery('#div-category').slideDown();
                    jQuery('#category_id').val('')" >Adicionar</a></h2>
    </header>

    <div class="panel-body">
        <table class="table table-bordered table-striped mb-none" id="datatable-tabletools">
            <thead>
                <tr>
                    <th><?= lang('id') ?></th>
                    <th><?= lang('name') ?></th>
                    <th><?= lang('color') ?></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($categories as $r): ?>
                <tr class="category_row" id="<?= $r['id'] ?>">
                    <td><?= $r['id'] ?></td>
                    <td><?= $r['name'] ?></td>
                    <td style="background-color:<?= $r['color'] ?>"></td>
                    <td style=" text-align: center; width: 150px">
                        <a href="javascript:void(0)" onclick="load_category(<?= $r['id'] ?>)" class="on-default edit-row" style=" margin-right: 5px; margin-left: 5px;"><i class="fa fa-pencil"></i></a>
                        <a href="javascript:void(0)" onclick="delete_category(<?= $r['id'] ?>)" class="on-default remove-row" style=" margin-right: 5px; margin-left: 5px;"><i class="fa fa-trash-o"></i></a>
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
<script src="<?= $this->config->base_url(JSPATH . 'tables/examples.datatables.default.js') ?>"></script>
<script src="<?= $this->config->base_url(JSPATH . 'tables/examples.datatables.row.with.details.js') ?>"></script>
<script src="<?= $this->config->base_url(JSPATH . 'theme.js') ?>"></script>
<script src="<?= $this->config->base_url(JSPATH . 'theme.custom.js') ?>"></script>
<script src="<?= $this->config->base_url(JSPATH . 'theme.init.js') ?>"></script>
<script>
                            jQuery('.nav.nav-main li').removeClass('nav-active');
</script>