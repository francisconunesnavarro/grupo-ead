<link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'jquery-datatables-bs3/assets/css/datatables.css') ?>" />
<section class="panel">
    <?php if (isset($questionnaire_users_replys[0]['replys'])): ?>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table mb-none">
                    <thead>
                        <tr>
                            <th><?= lang('name') ?></th>
                            <th>Data</th>
                            <th><?= lang('type') ?></th>
                            <?php foreach ($questionnaire_questions as $qur): ?>
                                <th><a data-toggle="tooltip" title="<?= $qur['question'] ?>" href="<?= $this->config->base_url('disciplines/question_graph/' . secencode($qur['id']) . '/' . $questionnaire_discipline_id_encoded) ?>"><?= $qur['question'] ?></a></th>

                                <!--                            
                                <?php if ($qur['question_order']): ?>    
                                                                                <th><a data-toggle="tooltip" title="<?= $qur['question'] ?>" href="<?= $this->config->base_url('disciplines/question_graph/' . secencode($qur['id']) . '/' . $questionnaire_discipline_id_encoded) ?>"><?= $qur['question_order'] ?></a></th>
                                <?php else: ?>
                                                                                <th><a data-toggle="tooltip" title="<?= $qur['question'] ?>" href="<?= $this->config->base_url('disciplines/question_graph/' . secencode($qur['id']) . '/' . $questionnaire_discipline_id_encoded) ?>"><?= $qur['question'] ?></a></th>
                                <?php endif; ?>
                                                                    
                                -->
                            <?php endforeach; ?>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($questionnaire_users_replys as $qur): ?>
                            <tr>
                                <td><?= $qur['name'] ?></td>
                                <td><?= $qur['created_time'] ?></td>
                                <td><?php
                                    if ($qur['user_type'] == '0'):
                                        echo 'Geral';
                                    elseif ($qur['user_type'] == '1'):
                                        echo 'Médico(a)';
                                    elseif ($qur['user_type'] == '2'):
                                        echo 'Enfermeiro(a)';
                                    elseif ($qur['user_type'] == '3'):
                                        echo 'Farmacêutico(a)';
                                    elseif ($qur['user_type'] == '4'):
                                        echo '(Professor) Geral';
                                    elseif ($qur['user_type'] == '5'):
                                        echo '(Professor) Médico(a)';
                                    elseif ($qur['user_type'] == '6'):
                                        echo '(Professor) Enfermeiro(a)';
                                    elseif ($qur['user_type'] == '7'):
                                        echo '(Professor) Farmacêutico(a)';
                                    endif;
                                    ?></td>

                                <!--QUESTÕES -->
                                <?php foreach ($questionnaire_questions as $qq): ?>
                                    <td>
                                        <!--RESPOSTAS -->
                                        <?php foreach ($qur['replys'] as $qqq): ?>
                                            <?php if (isset($qqq['lq_id'])): ?>
                                                <?php if ($qq['id'] == $qqq['lq_id']): ?>
                                                    <?php
                                                    if ($qqq['reply'] == 'Adequado') {
                                                        echo '<span style="color: green">Adequado</span>';
                                                    } else if ($qqq['reply'] == 'Parcialmente Adequado') {
                                                        echo '<span style="color: blue">Parcialmente Adequado</span>';
                                                    } else if ($qqq['reply'] == 'Não Fez') {
                                                        echo '<span style="color: red">Não Fez</span>';
                                                    } else if ($qqq['reply'] == 'Regular') {
                                                        echo '<span style="color: pink">Regular</span>';
                                                    } else if ($qqq['reply'] == 'Bom') {
                                                        echo 'Bom';
                                                    } else {
                                                        echo $qqq['reply'];
                                                    }
                                                    ?>
                                                    <!-- <?php if ($qqq['reply_value'] === '0'): ?>
                                                        <?= $qqq['reply'] ?>
                                                    <?php else: ?>
                                                        <?= $qqq['reply_value'] ?>
                                                    <?php endif; ?> -->
                                                <?php endif; ?>  
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </td>
                                <?php endforeach; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php else: ?>
        NENHUMA RESPOSTA 
    <?php endif; ?>
</section>

<script src="<?= $this->config->base_url(VENDORPATH . 'jquery-datatables/media/js/jquery.dataTables.js') ?>"></script>
<script src="<?= $this->config->base_url(VENDORPATH . 'jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js') ?>"></script>
<script src="<?= $this->config->base_url(VENDORPATH . 'jquery-datatables-bs3/assets/js/datatables.js') ?>"></script>
<script src="<?= $this->config->base_url(JSPATH . 'tables/examples.datatables.default.js') ?>"></script>
<script src="<?= $this->config->base_url(JSPATH . 'tables/examples.datatables.row.with.details.js') ?>"></script>
<script src="<?= $this->config->base_url(JSPATH . 'tables/examples.datatables.tabletools.js') ?>"></script>                
<script src="<?= $this->config->base_url(JSPATH . 'theme.js') ?>"></script>
<script src="<?= $this->config->base_url(JSPATH . 'theme.custom.js') ?>"></script>
<script src="<?= $this->config->base_url(JSPATH . 'theme.init.js') ?>"></script>