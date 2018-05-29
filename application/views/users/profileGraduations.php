<table class="table table-bordered table-striped mb-none" >
    <thead>
        <tr>
            <th>Escolaridade</th>
            <th>Situação</th>
            <th><?= lang('course') ?></th>
            <th><?= lang('institution_name') ?></th>
            <th>Ano/Semestre</th>
            <th><?= lang('city') ?></th>
            <th><?= lang('state') ?></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($graduations as $g): ?>
            <tr>
                <th><?= $g['scholarity'] ?></th>
                <th><?= $g['scholarity_status'] ?></th>
                <th><?= $g['course'] ?></th>
                <th><?= $g['school'] ?></th>
                <?php if ($g['scholarity_status'] === 'Cursando'): ?>
                    <th><?= $g['student_course_year'] ?></th>

                <?php elseif ($g['scholarity_status'] === 'Completo'): ?>
                    <th><?= $g['formation_year'] ?></th>
                <?php else: ?>
                    <th>-</th>
                <?php endif; ?>
                <th><?= $g['city'] ?></th>
                <th><?= $g['state'] ?></th>
                <th><a href="javascript:void(0)" onclick="delete_formation(<?= $g['id'] ?>)" class="on-default remove-row" style=" margin-right: 5px; margin-left: 5px;"><i class="fa fa-trash-o"></i></a></th>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<input hidden="" value="<?= count($graduations) ?>" id="count_graduations">
<script>
    if (jQuery('#count_graduations').val() > 0) {
        jQuery('#li_formation_information').addClass('completed');
        update_percent_profile();
    } else {
        jQuery('#li_formation_information').removeClass('completed');
        update_percent_profile();
    }
</script>