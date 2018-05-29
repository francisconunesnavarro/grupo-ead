<!doctype html>
<html class="fixed">
    <head>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="<?= $this->config->base_url(IMGPATH . $this->config->item('favicon')) ?>">
        <title> <?= isset($title) ? $title : lang('title') ?> - <?= lang('site_title') ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'bootstrap/css/bootstrap.css') ?>" />
        <link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'font-awesome/css/font-awesome.css') ?>" />
        <link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'magnific-popup/magnific-popup.css') ?>" />
        <link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'bootstrap-datepicker/css/datepicker3.css') ?>" />
        <link rel="stylesheet" href="<?= $this->config->base_url(CSSPATH . $this->config->item('theme')) ?>" />
        <script src="<?= $this->config->base_url(VENDORPATH . 'modernizr/modernizr.js') ?>"></script>
        <link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'pnotify/pnotify.custom.css') ?> " />
    </head>
    <body data-baseurl="<?= $this->config->base_url(); ?>">
        <section class="body-sign">
            <div class="center-sign">
                <a href="javascript:void(0)" class="logo">
                    <img src="<?= $this->config->base_url(IMGPATH . 'fmrp.png') ?>" style="height: 170px; margin-bottom: -71px;"/>
<!--                    <img src="<?= $this->config->base_url(IMGPATH . 'logo/logo_elearning.png') ?>" height="40" style="height: 60px;margin-top: -22px;" />-->

                </a>

                <div class="panel panel-sign">
                    <div class="panel-title-sign mt-xl text-right">
                        <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> <?= lang('login') ?></h2>
                    </div>
                    <div class="panel-body">
                        <form action="index.html" method="post">
                            <div class="form-group mb-lg">
                                <label><?= lang('username') ?></label>
                                <div class="input-group input-group-icon">
                                    <input name="username" id="username" type="text" class="form-control input-lg login" onkeyup="login_enter(event);"/>
                                    <span class="input-group-addon">
                                        <span class="icon icon-lg">
                                            <i class="fa fa-user"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group mb-lg">
                                <div class="clearfix">
                                    <label class="pull-left"><?= lang('password') ?></label>
                                </div>
                                <div class="input-group input-group-icon">
                                    <input name="pwd" id="password" type="password" class="form-control input-lg login" onkeyup="login_enter(event);"/>
                                    <span class="input-group-addon">
                                        <span class="icon icon-lg">
                                            <i class="fa fa-lock"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-8">
                                    <a class="mb-xs mt-xs mr-xs modal-sizes pull-left" href="#modalForgotPassword" ><?= lang('forgot_password') ?></a>
                                </div>
                                <div class="col-sm-4">
                                    <a id="btn_login" class="btn btn-primary pull-right" href="javascript:void(0)" onclick="login()"><?= lang('login') ?></a>
                                </div>
                            </div>

                            <span class="mt-lg mb-lg line-thru text-center text-uppercase">
                                <span><?= lang('or') ?></span>
                            </span>

                            <div class="mb-xs text-center">
                               <!-- <a class="btn btn-success mb-md ml-xs mr-xs" href="<?= $this->config->base_url('forms/user_type_questionnaires') ?>"><?= lang('go_to_questionnaries') ?> <i class="fa  fa-question-circle"></i></a>    -->                        
                                <a class="btn btn-facebook mb-md ml-xs mr-xs" href="<?= $this->config->base_url('login/check_facebook_login') ?>"><?= lang('connect_with') ?> <i class="fa fa-facebook"></i></a>                            
                            </div>
                            <p class="text-center"><?= lang('dont_have_an_account_yet') ?> <a href="<?= $this->config->base_url('login/register') ?>"><?= lang('sign_up') ?></a>
                        </form>
                    </div>
                </div>

                <p class="text-center text-muted mt-md mb-md">&copy; Copyright 2016. All Rights Reserved Marcelo Santos.</p>
            </div>
        </section>

        <div id="modalForgotPassword" class="modal-block mfp-hide" style="max-width: 400px;">
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title"><?= lang('forgot_password') ?></h2>
                </header>
                <div class="panel-body">
                    <h5><label>Digite seu email utilizado no momento do cadastro e lhe enviaremos sua senha por email.</label></h5>
                    <input name="forgot_password_email" id="forgot_password_email" type="text" class="form-control" placeholder="Email"/>
                    </br>
                </div>
                <footer class="panel-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button class="btn btn-success modal-dismiss" onclick="forgot_password()"><?= lang('send') ?></button>
                            <button class="btn btn-default modal-dismiss"><?= lang('close') ?></button>
                        </div>
                    </div>
                </footer>
            </section>
        </div>
        <script src="<?= $this->config->base_url(VENDORPATH . 'jquery/jquery.js') ?>"></script>	
        <script src="<?= $this->config->base_url(VENDORPATH . 'jquery-browser-mobile/jquery.browser.mobile.js') ?>"></script>
        <script src="<?= $this->config->base_url(VENDORPATH . 'jquery-cookie/jquery.cookie.js') ?>"></script>	
        <script src="<?= $this->config->base_url(VENDORPATH . 'bootstrap/js/bootstrap.js') ?>"></script>	
        <script src="<?= $this->config->base_url(VENDORPATH . 'nanoscroller/nanoscroller.js') ?>"></script>	
        <script src="<?= $this->config->base_url(VENDORPATH . 'bootstrap-datepicker/js/bootstrap-datepicker.js') ?>"></script>	
        <script src="<?= $this->config->base_url(VENDORPATH . 'magnific-popup/magnific-popup.js') ?>"></script>	
        <script src="<?= $this->config->base_url(VENDORPATH . 'jquery-placeholder/jquery.placeholder.js') ?>"></script>	
        <script src="<?= $this->config->base_url(VENDORPATH . 'jquery-validation/jquery.validate.js') ?>"></script>
        <script src="<?= $this->config->base_url(VENDORPATH . 'pnotify/pnotify.custom.js') ?>"></script>
        <script src="<?= $this->config->base_url(JSPATH . 'theme.js') ?>"></script>	                
        <script src="<?= $this->config->base_url(JSPATH . 'theme.custom.js') ?>"></script>	                
        <script src="<?= $this->config->base_url(JSPATH . 'theme.init.js') ?>"></script>	                
        <script src="<?= $this->config->base_url(JSPATH . 'login.js') ?>"></script>
        <script src="<?= $this->config->base_url(JSPATH . 'ui-elements/examples.modals.js') ?>"></script>
    </body>
</html>
