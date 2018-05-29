<!-- Specific Page Vendor CSS -->
<link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'summernote/summernote.css') ?>" />	
<link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'summernote/summernote-bs3.css') ?>" />	

<script src="<?= $this->config->base_url(JSPATH . 'forum.js') ?>"></script>

<div class="timeline">
    <div class="tm-body">
        <div class="tm-title">
            <h3 class="h5 text-uppercase"><?php if (isset($category_name)): echo $category_name;
endif;
?></h3>
            <h3 class="h5 text-uppercase"><?= $forum_title ?></h3>
        </div>
        <ol class="tm-items">
<?php foreach ($forum as $f): ?>
                <li>
                    <div class="tm-info">
                        <div class="tm-icon"><i class="fa <?php if ($f['user_id'] == $f['owner_id']): ?>fa-star<?php else: ?>fa-comment-o<?php endif; ?>"></i></div>
                        <time class="tm-datetime" datetime="2013-11-22 19:13">
                            <img src="<?= $this->config->base_url(IMGPATH . $f['user_image']) ?>" alt="<?= $this->config->base_url(IMGPATH . $f['user_image']) ?>" class="img-circle" height="40px" />
                            <div class="tm-datetime-date"><?= $f['date'] ?></div>
                            <div class="tm-datetime-time"><?= $f['hour'] ?></div>
                        </time> 
                    </div>
                    <div class="tm-box appear-animation" data-appear-animation="fadeInRight"data-appear-animation-delay="100">
                        <p>
    <?= $f['post'] ?>
                        </p>
                        <div class="tm-meta">
                            <span>
                                <i class="fa fa-user"></i>  <a href="javascript:void(0)"><?= $f['user_name'] ?></a>
                            </span>
                        </div>
                    </div>
                </li>
<?php endforeach; ?>
        </ol>
    </div>
    </br>
    <div class="form-group">
        <div class="col-md-12">
            <div class="summernote" name="content" id="new_forum_text" data-plugin-summernote data-plugin-options='{ "height": 180, "codemirror": { "theme": "ambiance" } }'></div>
        </div>
    </div>
    </br>
    <div class="form-group">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
            <a style=" width: 100%" class="btn btn-primary" id="btn_save_forum" href="javascript:void(0)" onclick="save_new_forum_text(<?= $forum_id ?>)">Salvar</a>
        </div>
        <div class="col-md-3">
        </div>
    </div>
</div>

<!-- Specific Page Vendor -->	
<script src="<?= $this->config->base_url(VENDORPATH . 'jquery-appear/jquery.appear.js') ?>"></script>	
<script src="<?= $this->config->base_url(VENDORPATH . 'summernote/summernote.js') ?>"></script>		

<!-- Examples -->
<script src="<?= $this->config->base_url(JSPATH . 'pages/examples.timeline.js') ?>"></script>	

<!-- Theme Base, Components and Settings --> 
<script src="<?= $this->config->base_url(JSPATH . 'theme.js') ?>"></script>

<!-- Theme Custom -->
<script src="<?= $this->config->base_url(JSPATH . 'theme.custom.js') ?>"></script>

<!-- Theme Initialization Files -->
<script src="<?= $this->config->base_url(JSPATH . 'theme.init.js') ?>"></script>