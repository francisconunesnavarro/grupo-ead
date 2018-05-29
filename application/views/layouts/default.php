<?php $this->user = $this->session->userdata('user') ?>
<!DOCTYPE html>
<html class="fixed sidebar-left-collapsed">
    <head>
        <link rel="shortcut icon" href="<?= $this->config->base_url(IMGPATH . $this->config->item('favicon')) ?>">
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <title> <?= isset($title) ? $title : lang('title') ?> - <?= lang('site_title') ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Raleway:100' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'font-awesome/css/font-awesome.css') ?>" />
        <link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'bootstrap/css/bootstrap.css') ?> " />
        <link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'magnific-popup/magnific-popup.css') ?> " />
        <link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'bootstrap-datepicker/css/datepicker3.css') ?> " />
        <link rel="stylesheet" href="<?= $this->config->base_url(CSSPATH . $this->config->item('theme')) ?>" />
        <link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'pnotify/pnotify.custom.css') ?> " />
        <link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'select2/select2.css') ?>" />
        <script src="<?= $this->config->base_url(VENDORPATH . 'modernizr/modernizr.js') ?>"></script>
        <style>
            .row{
                margin-top: 15px;
            }
            .pagination > .active > a,
            .pagination > .active > span,
            .pagination > .active > a:hover,
            .pagination > .active > span:hover,
            .pagination > .active > a:focus,
            .pagination > .active > span:focus {
                z-index: 2 !important;
                color: #ffffff !important;
                cursor: default !important;
            }
        </style>
        <script src="<?= $this->config->base_url(VENDORPATH . 'jquery/jquery.js') ?>"></script>
        <script src="<?= $this->config->base_url(JSPATH . 'home.js') ?>"></script>
        <script type="text/javascript" src="<?= $this->config->base_url(JSPATH . 'chat.js') ?>"></script>
        <script src="<?= $this->config->base_url(VENDORPATH . 'jquery-browser-mobile/jquery.browser.mobile.js') ?>"></script>
        <script src="<?= $this->config->base_url(VENDORPATH . 'jquery-cookie/jquery.cookie.js') ?>"></script>
        <script src="<?= $this->config->base_url(VENDORPATH . 'bootstrap/js/bootstrap.js') ?>"></script>
        <script src="<?= $this->config->base_url(VENDORPATH . 'nanoscroller/nanoscroller.js') ?>"></script>
        <script src="<?= $this->config->base_url(VENDORPATH . 'bootstrap-datepicker/js/bootstrap-datepicker.js') ?>"></script>
        <script src="<?= $this->config->base_url(VENDORPATH . 'magnific-popup/magnific-popup.js') ?>"></script>
        <script src="<?= $this->config->base_url(VENDORPATH . 'jquery-placeholder/jquery.placeholder.js') ?>"></script>
        <script src="<?= $this->config->base_url(VENDORPATH . 'select2/select2.js') ?>"></script>
        <script src="<?= $this->config->base_url(VENDORPATH . 'jquery-maskedinput/jquery.maskedinput.js') ?>"></script>
        <script src="<?= $this->config->base_url(VENDORPATH . 'jquery-validation/jquery.validate.js') ?>"></script>
        <script src="<?= $this->config->base_url(VENDORPATH . 'bootstrap-wizard/jquery.bootstrap.wizard.js') ?>"></script>
        <script src="<?= $this->config->base_url(VENDORPATH . 'pnotify/pnotify.custom.js') ?>"></script>

    </head>
    <body <?php if ($this->config->item('right_click') != 1): ?> oncontextmenu="return false;" <?php endif; ?> data-baseurl="<?= $this->config->base_url(); ?>">
        <section class="body">
            <header class="header">
                <div class="logo-container">
                    <a href="<?= $this->config->base_url('home') ?>" class="logo" style="margin: 17px 0 0 20px !important;">
                       <img src="<?= $this->config->base_url(IMGPATH . 'logo/logo_elearning.png') ?>" height="40" style="height: 60px;margin-top: -22px;" />
<!--                        <span style="font-size: 15pt">e-Learning</span>-->
                    </a>
                    <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
                        <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                    </div>
                </div>
                <div class="header-right">
                    <ul class="notifications">
                        <?php if ($this->user['type'] != 'pae'): ?>
                            <li  data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Fale conosco">
                                <a href="mailto:<?= $this->config->item('company_email') ?>" class="notification-icon" style="width: 85px; border-radius: 40%">
                                    <span style=" font-size: 9pt; vertical-align: -webkit-baseline-middle;">Fale conosco</span>
                                </a>
                            </li>
                            <li  data-toggle="tooltip" data-placement="bottom" title="" data-original-title="<?= lang('faq') ?>">
                                <a href="<?= $this->config->base_url('home/faq') ?>" class="notification-icon">
                                    <span style=" font-size: 9pt; vertical-align: -webkit-baseline-middle;"><?= lang('faq') ?></span>
                                </a>
                            </li>
                            <li  data-toggle="tooltip" data-placement="bottom" title="" data-original-title="<?= lang('chat') ?>">
                                <a href="index.html#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
                                    <i class="fa fa-wechat"></i>
                                </a>
                                <div class="dropdown-menu notification-menu">
                                    <div class="notification-title">
                                        <span class="pull-right label label-default"></span>
                                        <?= lang('chat') ?>
                                    </div>

                                    <div class="content">
                                        <ul>
                                            <?php foreach ($this->chats as $f):
                                                ?>
                                                <li>
                                                    <a href = "javascript:void(0)" onclick = "open_chat(<?= $f['chat_id'] ?>)" class = "clearfix">
                                                        <div class = "image">
                                                            <i class = "fa fa-comments-o bg-success"></i>
                                                        </div>
                                                        <span class = "title"><?= $f['chat_title'] ?></span>
                                                        <span class = "message"><?= $f['last_post'] ?> - <?= $f['posted_user'] ?></span>
                                                    </a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            </li>

                                <!--                            <li data-toggle = "tooltip" data-placement = "bottom" title = "" data-original-title = "<?= lang('foruns') ?>">
                                                                <a href = "index.html#" class = "dropdown-toggle notification-icon" data-toggle = "dropdown">
                                                                    <i class = "fa fa-bell"></i>
                                                                    <span class = "badge"><?php
                            if (isset($this->forum_today_posts)): echo $this->forum_today_posts;
                            endif;
                            ?></span>
                                                                </a>

                                                                <div class="dropdown-menu notification-menu">
                                                                    <div class="notification-title">
                                                                        <span class="pull-right label label-default"><?php
                            if (isset($this->forum_today_posts)): echo $this->forum_today_posts;
                            endif;
                            ?></span>
                            <?= lang('foruns') ?>
                                                                    </div>

                                                                    <div class="content">
                                                                        <ul>
                                                                            <li>
                                                                                <a href="javascript:void(0)" onclick="open_foruns()" class="clearfix">
                                                                                    <div class="image">
                                                                                        <i class="fa fa-comments-o bg-success"></i>
                                                                                    </div>
                                                                                    <span class="title">Veja os últimos posts</span>
                                                                                    <span class="message"></span>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </li>-->

                            <?php if ($this->user['type'] == 'admin' || $this->user['type'] == 'professor'): ?>
                                <li  data-toggle="tooltip" data-placement="bottom" title="" data-original-title="<?= lang('configuration') ?>">
                                    <a href="javascript:void(0)" class="dropdown-toggle notification-icon" data-toggle="dropdown">
                                        <i class="fa fa-cog"></i>
                                        <span class="badge"></span>
                                    </a>

                                    <div class="dropdown-menu notification-menu">
                                        <div class="notification-title">
                                            <span class="pull-right label label-default"></span>
                                            <?= lang('configuration') ?>
                                        </div>
                                        <div class="content">
                                            <ul>
                                                <li>
                                                    <a href="<?= $this->config->base_url('settings/listCategories') ?>" class="clearfix">
                                                        <div class="image">
                                                            <i class="fa fa-inbox fa-2x bg-success" style="height: 35px; width: 35px; "></i>
                                                        </div>
                                                        <span class="title">Categorias</span>
                                                        <span class="message"><?= lang('discipline_organize') ?></span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="<?= $this->config->base_url('settings/listQuestions') ?>" class="clearfix">
                                                        <div class="image">
                                                            <i class="fa fa-question-circle fa-2x bg-success" style="height: 35px; width: 35px;"></i>
                                                        </div>
                                                        <span class="title">Banco de Perguntas</span>
                                                        <span class="message">Crie seu banco de perguntas</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="<?= $this->config->base_url('settings/listQuestionnaires') ?>" class="clearfix">
                                                        <div class="image">
                                                            <i class="fa fa-check-circle-o fa-2x bg-success" style="height: 35px; width: 35px;"></i>
                                                        </div>
                                                        <span class="title">Questionários</span>
                                                        <span class="message">Descubra o perfil dos alunos</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="<?= $this->config->base_url('settings/listThemes') ?>" class="clearfix">
                                                        <div class="image">
                                                            <i class="fa fa-list bg-success" style="height: 35px; width: 35px; font-size: 19px;"></i>
                                                        </div>
                                                        <span class="title"><?= lang('themes') ?> <?= lang('subthemes') ?></span>
                                                        <span class="message">Organize seu banco de questões</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="<?= $this->config->base_url('settings/apresentationVideo') ?>" class="clearfix">
                                                        <div class="image">
                                                            <i class="fa fa-play-circle fa-2x bg-success" style="height: 35px; width: 35px;"></i>
                                                        </div>
                                                        <span class="title">Video de apresentação</span>
                                                        <span class="message">Dê uma cara nova para o EaD</span>
                                                    </a>
                                                </li>

                                            </ul>

                                            <hr />

                                        </div>
                                    </div>
                                </li>
                            <?php endif; ?>

                        <?php endif; ?>
                        <?php if ($this->user['type'] == 'pae'): ?>

                            <li  data-toggle="tooltip" data-placement="bottom" title="" data-original-title="<?= lang('configuration') ?>">
                                <a href="javascript:void(0)" class="dropdown-toggle notification-icon" data-toggle="dropdown">
                                    <i class="fa fa-cog"></i>
                                    <span class="badge"></span>
                                </a>

                                <div class="dropdown-menu notification-menu">
                                    <div class="notification-title">
                                        <span class="pull-right label label-default"></span>
                                        <?= lang('configuration') ?>
                                    </div>
                                    <div class="content">
                                        <ul>
                                            <li>
                                                <a href="<?= $this->config->base_url('settings/listQuestions') ?>" class="clearfix">
                                                    <div class="image">
                                                        <i class="fa fa-question-circle fa-2x bg-success" style="height: 35px; width: 35px;"></i>
                                                    </div>
                                                    <span class="title">Banco de Perguntas</span>
                                                    <span class="message">Crie seu banco de perguntas</span>
                                                </a>
                                            </li>

                                        </ul>

                                        <hr />

                                    </div>
                                </div>
                            </li>
                        <?php endif; ?>  

                    </ul>

                    <span class="separator"></span>

                    <div id="userbox" class="userbox">
                        <a href="#" data-toggle="dropdown">
                            <figure class="profile-picture">
                                <img src="<?= $this->user['image'] ?>" alt="<?= $this->user['name'] ?>" class="img-circle" />
                            </figure>
                            <div class="profile-info" >
                                <span class="name"><?= $this->user['name']; ?></span>
                                <span class="role"><?= lang('connected'); ?></span>
                            </div>
                            <i class="fa custom-caret"></i>
                        </a>

                        <div class="dropdown-menu">
                            <ul class="list-unstyled">
                                <li class="divider"></li>
                                <li>
                                    <a role="menuitem" tabindex="-1" href="<?= $this->config->base_url('home/profile') ?>"><i class="fa fa-user"></i> <?= lang('my_profile') ?></a>
                                </li>
                                <li>
                                    <a role="menuitem" tabindex="-1" href="<?= $this->config->base_url('home/logout') ?>"><i class="fa fa-power-off"></i> <?= lang('logout') ?></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </header>

            <div class="inner-wrapper">
                <aside id="sidebar-left" class="sidebar-left">

                    <div class="sidebar-header">
                        <div class="sidebar-title">
                            <?= lang('menu') ?>
                        </div>
                        <div class="sidebar-toggle" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
                            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                        </div>
                    </div>
                    <?php if ($this->user['type'] != 'pae'): ?>
                        <div class="nano">
                            <div class="nano-content">
                                <nav id="menu" class="nav-main" role="navigation">
                                    <ul class="nav nav-main">
                                        <!-- miniCEX 
                                        <li>
                                            <a href="<?= $this->config->base_url('miniCEX') ?>">
                                                <i class="fa fa-question-circle" aria-hidden="true"></i>
                                                <span><?= 'miniCEX' ?></span>
                                            </a>
                                        </li> -->
                                        <!-- home -->
                                        <li>
                                            <a href="<?= $this->config->base_url('home') ?>">
                                                <i class="fa fa-home" aria-hidden="true"></i>
                                                <span><?= lang('home') ?></span>
                                            </a>
                                        </li> 
<!--                                      <li>
                                            <a href="javascript:void(0)" onclick="batata()">
                                                <i class="fa fa-home" aria-hidden="true"></i>
                                                <span>batata</span>
                                            </a>
                                        </li> -->
                                        <!-- Foruns -->
                                        <!--                                        <li>
                                                                                    <a href="javascript:void(0)" onclick="open_foruns()">
                                                                                        <span class="pull-right label label-primary"><?php
                                        if (isset($this->forum_today_posts)): echo $this->forum_today_posts;
                                        endif;
                                        ?> post(s) novo(s)</span>
                                                                                        <i class="fa fa-comments-o" aria-hidden="true"></i>
                                                                                        <span><?= lang('foruns') ?></span>
                                                                                    </a>
                                                                                </li>-->
                                        <!-- Matricula -->
                                        <li>
                                            <a href="javascript:void(0)" onclick="discipline_registration()">
                                                <i class="fa fa-plus-square-o" aria-hidden="true"></i>
                                                <span><?= lang('discipline_registration') ?></span>
                                            </a>
                                        </li>
                                        


                                        <?php if ($this->config->item('all_disciplines_layout_default') == 1): ?>
                                            <!-- primeiro mostramos todas disciplinas-->
                                            <li class="nav-parent nav-active">
                                                <a>
                                                    <i class="fa fa-copy" aria-hidden="true"></i>
                                                    <span><?= lang('disciplines') ?></span>
                                                </a>
                                                <?php foreach ($this->disciplines as $disc): ?>
                                                    <ul class="nav nav-children">
                                                        <li>
                                                            <a href="<?php
                                                            if ($disc['active'] == 1 || $this->user['type'] == 'admin' || $this->user['type'] == 'professor'): echo $this->config->base_url('disciplines/openDiscipline/') . $disc['disc_id'];
                                                            else: echo 'javascript:void(0)';
                                                            endif;
                                                            ?>">
                                                                   <?= $disc['disc_acronym'] ? $disc['disc_acronym'] . '-' . $disc['disc_name'] : $disc['disc_name'] ?>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                <?php endforeach; ?>
                                                <?php if ($this->user['type'] == 'admin' || $this->user['type'] == 'professor'): ?>
                                                    <ul class="nav nav-children" style="background: #f2f2f2 !important">
                                                        <li>
                                                            <a href="<?= $this->config->base_url('disciplines/newDiscipline') ?>">
                                                                <?= lang('add_new_discipline') ?>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                <?php endif; ?>
                                            </li>
                                        <?php endif; ?>
                                        <!-- agora mostramos as disciplinas dividindo por categoria-->

                                        <?php
                                        $cat_temp_id = 0;
                                        foreach ($this->disciplines as $disc):
                                            if (!isset($disc['category_id'])):
                                                $disc['category_id'] = 999999999;
                                                $disc['category_name'] = 'Sem categoria';
                                            endif;

                                            if ($cat_temp_id != $disc['category_id']):

                                                if ($cat_temp_id != 0):
                                                    ?>
                                                    <?php if ($this->user['type'] == 'admin' || $this->user['type'] == 'professor'): ?>
                                                        <ul class="nav nav-children" style="background: #f2f2f2 !important">
                                                            <li>
                                                                <a href="<?= $this->config->base_url('disciplines/newDiscipline/') . $cat_temp_id ?>">
                                                                    <?= lang('add_new_discipline') ?>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    <?php endif; ?>
                                                    </li>
                                                    <?php
                                                endif;
                                                $cat_temp_id = $disc['category_id'];
                                                ?>

                                                <li class="nav-parent nav-active">
                                                    <a>
                                                        <i class="fa fa-copy" aria-hidden="true"></i>
                                                        <span><?= $disc['category_name'] ?></span>
                                                    </a>
                                                <?php endif; ?>

                                                <ul class="nav nav-children">
                                                    <li>
                                                        <a href="<?php
                                                        if ($disc['active'] == 1 || $this->user['type'] == 'admin' || $this->user['type'] == 'professor'): echo $this->config->base_url('disciplines/openDiscipline/') . $disc['disc_id'];
                                                        else: echo 'javascript:void(0)';
                                                        endif;
                                                        ?>">
                                                               <?= $disc['disc_acronym'] ? $disc['disc_acronym'] . '-' . $disc['disc_name'] : $disc['disc_name'] ?>
                                                        </a>
                                                    </li>
                                                </ul>
                                            <?php endforeach; ?>
                                        </li>
                                        <?php if ($this->user['type'] == 'admin' || $this->user['type'] == 'professor'): ?>
                                            <li>
                                                <a href="<?= $this->config->base_url('disciplines/newDiscipline') ?>">
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                    <span><?= lang('add_new_discipline') ?></span>    
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    <?php endif; ?>
                </aside>

                <a id="modalTextButton" class="mb-xs mt-xs mr-xs modal-sizes" hidden="" href="#modalText" ></a>
                <div id="modalText" class="modal-block mfp-hide" style="max-width: 900px;">
                    <section class="panel">
                        <header class="panel-heading">
                            <h2 class="panel-title" id="modal_title"></h2>
                        </header>
                        <div class="panel-body" id="modal_text">

                        </div>
                        <footer class="panel-footer">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <button class="btn btn-default modal-dismiss"><?= lang('close') ?></button>
                                </div>
                            </div>
                        </footer>
                    </section>
                </div>

                <section role="main" class="content-body">
                    <header class="page-header">
                        <h2><?= isset($title) ? $title : '' ?></h2>
                        <?php if (isset($return_button)): ?>
                            <a class="btn btn-primary pull-right" style="margin: 9px;" href="<?= $return_button ?>"><i class="fa fa-reply"></i> Voltar</a>
                        <?php endif; ?>
                    </header>
                    <div id="layout_div">
                        <?php $this->load->view($content) ?>
                    </div>
                </section>
            </div>
        </section>
    </body>

</html>
