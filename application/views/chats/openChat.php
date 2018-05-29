<!-- Specific Page Vendor CSS -->
<link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'summernote/summernote.css') ?>" />	
<link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'summernote/summernote-bs3.css') ?>" />	

<script src="<?= $this->config->base_url(JSPATH . 'chat.js') ?>"></script>

<div class='row'>
    <div class='col-md-9'>

        <div class="timeline">
            <div class="tm-body">
                <div class="tm-title">
                    <h3 class="h5 text-uppercase"><?php
                        if (isset($category_name)): echo $category_name;
                        endif;
                        ?></h3>
                    <h3 class="h5 text-uppercase"><?= $chat_title ?></h3>
                </div>
                <ol class="tm-items" id="chat_messages">
                    <?php if (isset($chat)): ?>
                        <?php foreach ($chat as $f): ?>
                            <li>
                                <div class="tm-info">
                                    <div class="tm-icon" style="padding: 0px; border: 0px;">
                                        <img src="<?= $this->config->base_url(IMGPATH . $f['user_image']) ?>" alt="<?= $this->config->base_url(IMGPATH . $f['user_image']) ?>" class="img-circle" height="55px" />
                                    </div>
                                </div>
                                <div class="tm-box">
                                    <p>
                                        <?= $f['post'] ?>
                                    </p>
                                    <div class="tm-meta">
                                        <span>
                                            <i class="fa fa-user"></i> <?= $f['user_name'] ?> - <?= $f['date'] ?>   <?= $f['hour'] ?>
                                        </span>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ol>
            </div>
            </br>
            <div class="form-group">
                <div class="col-md-10 pull-right">
                    <div class="input-group mb-md">
                        <input type="text" class="form-control" onkeyup="send_message_enter(<?= $chat_id ?>, event);" id="new_chat_text">
                        <span class="input-group-btn">
                            <a class="btn btn-success" href="javascript:void(0)" onclick="save_new_chat_text(<?= $chat_id ?>)" id="btn_save_chat">Enviar</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class='col-md-3'>
        <section class="panel">
            <div class="panel-body">
                <div class="h4 text-bold mb-none">Usuários Online</div>
            </div>
        </section>
        <div id="chat_users">
            <?php if (isset($chat_users)): ?>
                <?php foreach ($chat_users as $f): ?>
                    <section class="panel">
                        <div class="panel-body row">
                            <div class='col-md-4'>
                                <img src="<?= $this->config->base_url(IMGPATH . $f['image']) ?>" class="img-circle" height="35px" />
                            </div>
                            <div class='col-md-8'>
                                <div class="h4 text-bold mb-none"><?= $f['name'] ?></div>
<!--                                <p class="text-xs text-muted mb-none">Average Profile Visits</p>-->
                            </div>
                        </div>
                    </section>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
    jQuery('html, body').scrollTop($(document).height());

    var tid = setInterval(mycode, 5000);
    function mycode() {
        jQuery("#chat_messages").load(jQuery("body").data("baseurl") + "chat/open_chat_messages", {"chat_id": <?= $chat_id ?>});
    }

    var tidu = setInterval(online_users, 10000);
    function online_users() {
        jQuery("#chat_users").load(jQuery("body").data("baseurl") + "chat/open_chat_users", {"chat_id": <?= $chat_id ?>});
    }
</script>

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