<script src="<?= $this->config->base_url(JSPATH . 'disciplines.js') ?>"></script>

<style>
    div.tm-box img {
        width: 100% !important
    }
</style>

<div class="timeline" style="margin-left: -55px;  margin-top: -25px;" >
    <div class="tm-body">
        <ol class="tm-items">
            <?php foreach ($contents as $c): ?>
                <?php if ($c['type'] != 'file'): ?>
                    <li>
                        <div class="tm-info">
                            <div class="tm-icon">
                                <?php if ($c['type'] == 'video'): ?>
                                    <i class="fa fa-file-video-o"></i>
                                <?php elseif ($c['type'] == 'text'): ?>
                                    <i class="fa fa-file-text-o"></i>
                                <?php elseif ($c['type'] == 'image'): ?>
                                    <i class="fa fa-file-image-o"></i>
                                <?php elseif ($c['type'] == 'evaluation'): ?>
                                    <i class="fa fa-check"></i>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if ($c['type'] == 'video'): ?>
                            <div id="<?= $c['id'] ?>"  style="text-align: center; height:500px;">
                            </div>
                        <?php else: ?>
                            <div class="tm-box appear-animation" data-appear-animation="fadeInRight" data-appear-animation-delay="100">
                                <div id="<?= $c['id'] ?>" style="-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none;" unselectable="on" onselectstart="return false;" onmousedown="return false;">
                                </div>
                                <div class="tm-meta">
                                    <span>
                                        <i class="fa fa-angellist"></i>  <a href="javascript:void(0)"><?= $c['name'] ?></a>
                                    </span>
                                </div>
                            </div>
                        <?php endif; ?>
                    </li>
                    <?php if ($c['type'] == 'video'): ?>
                        <script>
                            loadContentVideo(<?= $c['id'] ?>, <?= $c['id'] ?>);
                        </script>
                    <?php elseif ($c['type'] == 'text'): ?>
                        <script>
                            loadContentText(<?= $c['id'] ?>, <?= $c['id'] ?>);
                        </script>
                    <?php elseif ($c['type'] == 'image'): ?>
                        <script>
                            loadContentImage(<?= $c['id'] ?>, <?= $c['id'] ?>);
                        </script>
                    <?php elseif ($c['type'] == 'evaluation'): ?>
                        <script>
                            loadContentEvaluation(<?= $c['id'] ?>, <?= $c['id'] ?>);
                        </script>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; ?>

            <!-- Anexos -->
            <?php foreach ($contents as $c): ?>
                <?php if ($c['type'] == 'file'): ?>
                    <li>
                        <div class="tm-info">
                            <div class="tm-icon">
                                <i class="fa fa-file-o"></i>
                            </div>
                        </div>
                        <div class="tm-box appear-animation" data-appear-animation="fadeInRight"data-appear-animation-delay="100">
                            <div id="<?= $c['id'] ?>">
                            </div>
                            <div class="tm-meta">
                                <span>
                                    <i class="fa fa-angellist"></i>  <a href="javascript:void(0)"><?= $c['name'] ?></a>
                                </span>
                            </div>
                        </div>
                    </li>
                    <script>
                        loadContent(<?= $c['id'] ?>, <?= $c['id'] ?>);
                    </script>
                <?php endif; ?>
            <?php endforeach; ?>

        </ol>
    </div>
    </br>

</div>

<?php if (isset($previous_module)): ?>
    <a class="mb-xs mt-xs mr-xs modal-sizes btn btn-primary" href="<?= $this->config->base_url('modules/openModule/' . $previous_module) ?>" style="position: fixed; bottom: 5px; right: 125px; z-index: 1;"><i class="fa fa-backward"></i> <?= lang('previous_module') ?></a>
<?php endif; ?>
<?php if (isset($next_module)): ?>
    <a class="mb-xs mt-xs mr-xs modal-sizes btn btn-primary" href="<?= $this->config->base_url('modules/openModule/' . $next_module) ?>" style="position: fixed; bottom: 5px; right: 5px; z-index: 1;"><i class="fa fa-forward"></i> <?= lang('next_module') ?></a>
<?php endif; ?>
<input type="text" class="form-control hidden" id="module_id" name="module_id" value="<?= $module['id'] ?>">

<!-- Specific Page Vendor -->	
<script src="<?= $this->config->base_url(VENDORPATH . 'jquery-appear/jquery.appear.js') ?>"></script>	

<!-- Examples -->
<script src="<?= $this->config->base_url(JSPATH . 'pages/examples.timeline.js') ?>"></script>	

<!-- Theme Base, Components and Settings --> 
<script src="<?= $this->config->base_url(JSPATH . 'theme.js') ?>"></script>

<!-- Theme Custom -->
<script src="<?= $this->config->base_url(JSPATH . 'theme.custom.js') ?>"></script>

<!-- Theme Initialization Files -->
<script src="<?= $this->config->base_url(JSPATH . 'theme.init.js') ?>"></script>