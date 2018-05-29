<section class="panel">
    <header class="panel-heading">
        <a onclick="jQuery('#discipline_logs_minimize').click();" href="javascript:void(0)">
            <h2 class="panel-title">Logs da Disciplina</h2>
            <p class="panel-subtitle">
            </p>
            <div class="panel-actions">
                <a href="javascript:void(0)" class="fa fa-caret-up" id="discipline_logs_minimize"></a>
            </div>
        </a>
    </header>
    <div class="panel-body admin" style="display: none;">
        <?php if ($logs): ?>
            <table class="table table-bordered table-striped mb-none" id="datatable-logs" data-swf-path="<?= $this->config->base_url(VENDORPATH . 'jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf') ?>">
                <thead>
                    <tr>
                        <th hidden=""></th>
                        <th><?= lang('user') ?></th>
                        <th><?= lang('email') ?></th>
                        <th><?= lang('module') ?></th>
                        <th><?= lang('content') ?></th>
                        <th><?= lang('type') ?></th>
                        <th><?= lang('quantity') ?></th>
                        <th><?= lang('last_access') ?></th>
                        <th><?= lang('note') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($logs as $l): ?>
                        <tr>
                            <td hidden></td>
                            <td><?= $l['user_name'] ?></td>
                            <td><?= $l['email'] ?></td>
                            <td><?= $l['module_name'] ?></td> 
                            <td><?= $l['content_name'] ?></td>
                            <td><?= lang($l['content_type']) ?></td>
                            <td><?= $l['log_quantity'] ?></td>
                            <td><?= $l['last_access'] ?></td>
                            <td><?php
                                if ($l['content_type'] == 'evaluation') {
                                    echo $l['evaluation_note'];
                                }
                                ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <span>Nenhum Log até o momento!</span>
        <?php endif; ?>
    </div>
</section>
<script>
    var $tableLogs = $('#datatable-logs');
    $tableLogs.dataTable({
        sDom: "<'text-right mb-md'T>" + $.fn.dataTable.defaults.sDom,
        oTableTools: {
            sSwfPath: $tableLogs.data('swf-path'),
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