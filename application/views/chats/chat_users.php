<?php foreach ($chat_users as $f): ?>
    <section class="panel">
        <div class="panel-body row">
            <div class='col-md-4'>
                <img src="<?= $this->config->base_url(IMGPATH . $f['image']) ?>" class="img-circle" height="35px" />
            </div>
            <div class='col-md-8'>
                <div class="h4 text-bold mb-none"><?= $f['name'] ?></div>
<!--                <p class="text-xs text-muted mb-none">Average Profile Visits</p>-->
            </div>
        </div>
    </section>  
<?php endforeach; ?>