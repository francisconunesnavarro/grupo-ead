<link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'jquery-datatables-bs3/assets/css/datatables.css') ?>" />

<div class="panel-body">
    <table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="<?= $this->config->base_url(VENDORPATH . 'jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf') ?>">
        <thead>
            <tr>
                <th><?= lang('name') ?></th>
                <th><?= lang('resolved_time') ?></th>
                <th><?= lang('gender') ?></th>
                <th><?= lang('birthday') ?></th>
                <th><?= lang('age') ?></th>
                <?php if (isset($questionnaire_users_replys[0]['replys'])): ?>
                    <?php foreach ($questionnaire_users_replys[0]['replys'] as $qur): ?>
                        <?php if (isset($qur['question_order'])): ?>    
                            <th><?= $qur['question_order'] ?></th>
                        <?php else: ?>
                            <th><?= $qur['question'] ?></th>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tr>
        </thead>
        <?php if (isset($questionnaire_users_replys[0]['replys'])): ?>
            <tbody>
                <?php $user = 0; ?>
                <?php foreach ($questionnaire_users_replys as $qur): ?>
                    <?php if ($user != $qur['user_id']): ?>
                        <tr>
                            <td><?= $qur['name'] ?></td>
                            <td><?= $qur['created_time'] ?></td>
                            <td><?= lang($qur['gender']) ?></td>
                            <td><?= $qur['birthday'] ?></td>
                            <td><?= $qur['age'] ?></td>
                            <?php foreach ($qur['replys'] as $rp): ?>
                                <td><?= $rp['reply_value'] ?></td>
                            <?php endforeach; ?>
                            <?php $user = $qur['user_id']; ?>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        <?php endif; ?>
    </table>
</div>

<script src="<?= $this->config->base_url(VENDORPATH . 'jquery-datatables/media/js/jquery.dataTables.js') ?>"></script>
<script src="<?= $this->config->base_url(VENDORPATH . 'jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js') ?>"></script>
<script src="<?= $this->config->base_url(VENDORPATH . 'jquery-datatables-bs3/assets/js/datatables.js') ?>"></script>
<script src="<?= $this->config->base_url(JSPATH . 'tables/examples.datatables.default.js') ?>"></script>
<script src="<?= $this->config->base_url(JSPATH . 'tables/examples.datatables.row.with.details.js') ?>"></script>
<script src="<?= $this->config->base_url(JSPATH . 'tables/examples.datatables.tabletools.js') ?>"></script>                
<script src="<?= $this->config->base_url(JSPATH . 'theme.js') ?>"></script>
<script src="<?= $this->config->base_url(JSPATH . 'theme.custom.js') ?>"></script>
<script src="<?= $this->config->base_url(JSPATH . 'theme.init.js') ?>"></script>
<script>
    jQuery('.nav.nav-main li').removeClass('nav-active');
</script>