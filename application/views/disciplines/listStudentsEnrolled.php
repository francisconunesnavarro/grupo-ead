<script src="<?= $this->config->base_url(JSPATH . 'disciplines.js') ?>"></script>

<div id="div-student" hidden="" style=" padding: 15px;">  
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title"><?= lang('add') ?> / <?= lang('edit') ?> <?= lang('student') ?></h2>
            <p class="panel-subtitle">
            </p>
        </header>
        <div class="panel-body">
            <form class="form-inline">
                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group" style=" width: 100%">
                            <label class="control-label"><?= lang('student_email') ?></label></br>
                            <input type="text" class="form-control" style=" width: 100%" id="email_student" placeholder="<?= lang('student_email') ?>" value="">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        </br>
                        <div class="visible-sm clearfix mt-sm mb-sm"></div>
                        <input type="text" class="form-control hidden" id="student_id" value="" >
                        <div class="clearfix visible-xs mb-sm"></div>
                        <a class="btn btn-primary" href="javascript:void(0)" onclick="()"><?= lang('save') ?></a>
                        <a class="btn btn-default"  href="javascript:void(0)" onclick="jQuery('#name').val('');
                                jQuery('#student_id').val('');
                                jQuery('#div-student').slideUp();"><?= lang('close') ?></a>
                    </div>
            </form>
        </div>
    </section>
    </br>
</div>

<!--SECTION QUE MINIMIZA OU MAXIMIZA a aba estudantes matriculados -->
<section class="panel">
    <header class="panel-heading">
        <a onclick="jQuery('#discipline_students_minimize').click();" href="javascript:void(0)">
            <h2 class="panel-title"><?= $title ?></h2>
            <p class="panel-subtitle">
            </p>
            <div class="panel-actions">
                <a href="javascript:void(0)" class="fa fa-caret-up" id="discipline_students_minimize"></a>
            </div>
        </a>
    </header>
    
    <div class="panel-body admin" style="display: none;">
        <?php if ($this->user['type'] == 'admin' || $this->user['type'] == 'professor'): ?>
            <a class="btn btn-primary" style="float: left; margin-bottom: 15px;"  href="javascript:void(0)" onclick="jQuery('#name').val('');
                    jQuery('#div-student').slideDown();
                    jQuery('#student_id').val('')" >Adicionar Aluno</a>
           <?php endif; ?>
        <br>
            <!-- TABELA DE ALUNOS MATRICULADOS NA DISCIPLINA -->
        <table class="table table-bordered table-striped mb-none table-foruns" id="datatable-students" data-swf-path="<?= $this->config->base_url(VENDORPATH . 'jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf') ?>">
            <thead>
                <tr>
                    <th><?= lang('student') ?></th>
                    <th><?= lang('email') ?></th>
                    <th>Último acesso</th>
                    <th><?= lang('created_time') ?></th>
                    <th><?= lang('status') ?></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($students):
                    foreach ($students as $s):
                        ?>
                        <tr>  
                            <td><?= $s['user_name'] ?></td>
                            <td><?= $s['user_email'] ?></td>
                            <td><?= $s['date_hour'] ?></td>
                            <td><?= $s['created_time'] ?></td>
                            <td><?php
                                if ($s['enabled'] == 1): echo 'Ativo';
                                else: echo 'Desativado';
                                endif;
                                ?></td>
                            <td style=" text-align: center; width: 150px">
                                <a href="javascript:void(0)" onclick="change_status_enrolled_students(<?= $s['id'] ?>, <?= $s['enabled'] ?>)" class="on-default edit-row" style=" margin-right: 5px; margin-left: 5px;"><i class="fa fa-pencil"></i></a>
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
    var $tableStudents = $('#datatable-students');
    $tableStudents.dataTable({
        sDom: "<'text-right mb-md'T>" + $.fn.dataTable.defaults.sDom,
        oTableTools: {
            sSwfPath: $tableStudents.data('swf-path'),
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
