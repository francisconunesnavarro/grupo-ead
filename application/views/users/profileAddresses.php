<table class="table table-bordered table-striped mb-none" >
    <thead>
        <tr>
            <th><?= lang('city') ?></th>
            <th><?= lang('state') ?></th>
            <th><?= lang('country') ?></th>
            <th><?= lang('neighborhood') ?></th>
            <th><?= lang('street') ?></th>
            <th><?= lang('number') ?></th>
            <th><?= lang('zipcode') ?></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($addresses as $a): ?>
            <tr>
                <th><?= $a['city'] ?></th>
                <th><?= $a['state'] ?></th>
                <th><?= $a['country'] ?></th>
                <th><?= $a['neighborhood'] ?></th>
                <th><?= $a['street'] ?></th>
                <th><?= $a['number'] ?></th>
                <th><?= $a['zipcode'] ?></th>
                <th><a href="javascript:void(0)" onclick="delete_address(<?= $a['id'] ?>)" class="on-default remove-row" style=" margin-right: 5px; margin-left: 5px;"><i class="fa fa-trash-o"></i></a></th>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>