<table class="table table-bordered table-striped mb-none" >
    <thead>
        <tr>
            <th><?= lang('type') ?></th>
            <th><?= lang('number') ?></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($contacts as $c): ?>
            <tr>
                <th><?= lang($c['type']) ?></th>
                <th><?= $c['phone'] ?></th>
                <th><a href="javascript:void(0)" onclick="delete_contact(<?= $c['id'] ?>)" class="on-default remove-row" style=" margin-right: 5px; margin-left: 5px;"><i class="fa fa-trash-o"></i></a></th>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<input hidden="" value="<?= count($contacts) ?>" id="count_contacts">
<script>
    if (jQuery('#count_contacts').val() > 0) {
        jQuery('#li_contact_information').addClass('completed');
        update_percent_profile();
    } else {
        jQuery('#li_contact_information').removeClass('completed');
        update_percent_profile();
    }
</script>