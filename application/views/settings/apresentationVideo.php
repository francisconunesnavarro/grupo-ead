<link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'dropzone/css/dropzone.css') ?>" />		
<?php if (isset($apresentation_video)): ?>
<div class=" add-divs" id="view_video" style="padding: 15px; text-align: center">
    <embed src="<?php
    if (isset($apresentation_video)): echo $apresentation_video;
    endif;
    ?>" width="640" height="390"
           autoplay="false" controller="false"
           </embed>
</div>
<?php endif; ?>

<section class="panel">
    <header class="panel-heading">
        <h2 class="panel-title"><?= lang('add') ?> / <?= lang('edit') ?> <?= lang('apresentation_video') ?></h2>
        <p class="panel-subtitle">
        </p>
    </header>
    <div class="panel-body">
        <form action="<?= $this->config->base_url('settings/receiveVideo') ?>" class="dropzone dz-square" id="dropzone-apresentation-video"></form>
    </div>

</section>
<script src="<?= $this->config->base_url(VENDORPATH . 'dropzone/dropzone.js') ?>"></script>		
<script>
    Dropzone.autoDiscover = false; // otherwise will be initialized twice
    var myDropzoneOptionsApVideo = {
        maxFiles: 1,
        maxFilesize: 500000000000000,
        acceptedMimeTypes: 'video/*',
        init: function () {
            this.on("complete", function (file) {
                window.location = jQuery("body").data('baseurl') + 'settings/apresentationVideo';
            });
        }
    };
    var myDropzoneApVideo = new Dropzone('#dropzone-apresentation-video', myDropzoneOptionsApVideo);
</script>