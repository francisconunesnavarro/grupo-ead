<!doctype html>
<html class="fixed">
    <head>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="<?= $this->config->base_url(IMGPATH . $this->config->item('favicon')) ?>">
        <meta name="description" content="<?= $title ? $title : lang('title') ?>">
        <title> <?= isset($title) ? $title : lang('title') ?> - <?= lang('site_title') ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
        <link href="<?= $this->config->base_url(IMGPATH . 'apple-touch-icon.png') ?>" rel="apple-touch-icon" />
        <link href="<?= $this->config->base_url(IMGPATH . 'apple-touch-icon-76x76.png') ?>" rel="apple-touch-icon" sizes="76x76" />
        <link href="<?= $this->config->base_url(IMGPATH . 'apple-touch-icon-120x120.png') ?>" rel="apple-touch-icon" sizes="120x120" />
        <link href="<?= $this->config->base_url(IMGPATH . 'apple-touch-icon-152x152.png') ?>" rel="apple-touch-icon" sizes="152x152" />
        <link href="<?= $this->config->base_url(IMGPATH . 'apple-touch-icon-180x180.png') ?>" rel="apple-touch-icon" sizes="180x180" />
        <link href="<?= $this->config->base_url(IMGPATH . 'icon-hires.png') ?>" rel="icon" sizes="192x192" />
        <link href="<?= $this->config->base_url(IMGPATH . 'icon-normal.png') ?>" rel="icon" sizes="128x128" />
        <link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'bootstrap/css/bootstrap.css') ?>" />
        <link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'font-awesome/css/font-awesome.css') ?>" />
        <link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'magnific-popup/magnific-popup.css') ?>" />
        <link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'bootstrap-datepicker/css/datepicker3.css') ?>" />
        <link rel="stylesheet" href="<?= $this->config->base_url(CSSPATH . $this->config->item('theme')) ?>" />
        <script src="<?= $this->config->base_url(VENDORPATH . 'modernizr/modernizr.js') ?>"></script>
        <style>
            .body-sign .panel-sign .panel-title-sign .title {
                background-color: #47a447;
            }
            .body-sign .panel-sign .panel-body {
                border-top: 5px solid #47a447;
            }
        </style>
    </head>
    <body data-baseurl="<?= $this->config->base_url(); ?>">
        <section class="body-sign">
            <div class="center-sign">
                <a href="javascript:void(0)" class="logo">
                    <img src="<?= $this->config->base_url(IMGPATH . 'questionario.jpg') ?>" style="height: 170px; margin-bottom: -71px;" alt="<?= $title ? $title : lang('title') ?>" />
                </a>
                <div class="panel panel-sign">
                    <div class="panel-title-sign mt-xl text-right">
                        <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> <?= lang('questionnaires') ?></h2>
                    </div>
                    <div class="panel-body">
                        <form action="index.html" method="post">
                            <div class="form-group mb-lg">
                                <label><?= lang('name') ?></label>
                                <div class="input-group input-group-icon">
                                    <input name="name" id="name" type="text" class="form-control input-lg login" onkeyup="login_enter(event);"/>
                                    <span class="input-group-addon">
                                        <span class="icon icon-lg">
                                            <i class="fa fa-user"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group mb-lg">
                                <div class="clearfix">
                                    <label>Tipo de usuário</label>
                                </div>
                                <div class="input-group input-group-icon">
                                    <select id="select_type" class="form-control input-lg register">
                                        <option value="0" >Geral</option>
                                        <option value="1" >Médico(a)</option>
                                        <option value="2" >Enfermeiro(a)</option>
                                        <option value="3" >Farmacêutico(a)</option>
                                        <option value="4" >(Professor) Geral</option>
                                        <option value="5" >(Professor) Médico(a)</option>
                                        <option value="6" >(Professor) Enfermeiro(a)</option>
                                        <option value="7" >(Professor) Farmacêutico(a)</option>
                                    </select>
                                    <span class="input-group-addon">
                                        <span class="icon icon-lg">
                                            <i class="fa fa-tag "></i>
                                        </span>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group mb-lg">
                                <div class="clearfix">
                                    <label class="pull-left">Token de acesso</label>
                                </div>
                                <div class="input-group input-group-icon">
                                    <input name="access_token" id="access_token" type="text" class="form-control input-lg login" onkeyup="login_enter(event);"/>
                                    <span class="input-group-addon">
                                        <span class="icon icon-lg">
                                            <i class="fa fa-lock"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6" style="text-align: center">
                                    <a class="btn btn-primary" href="<?= $this->config->base_url() ?>">Voltar para login</a>
                                </div>
                                <div class="col-sm-6" style="text-align: center">
                                    <a id="btn_go_questionnaires" class="btn btn-success" href="javascript:void(0)" onclick="go_to_questionnaries()"><?= lang('access_questionnaries') ?></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <script src="<?= $this->config->base_url(VENDORPATH . 'jquery/jquery.js') ?>"></script>	
        <script src="<?= $this->config->base_url(VENDORPATH . 'jquery-browser-mobile/jquery.browser.mobile.js') ?>"></script>
        <script src="<?= $this->config->base_url(VENDORPATH . 'jquery-cookie/jquery.cookie.js') ?>"></script>	
        <script src="<?= $this->config->base_url(VENDORPATH . 'bootstrap/js/bootstrap.js') ?>"></script>	
        <script src="<?= $this->config->base_url(VENDORPATH . 'nanoscroller/nanoscroller.js') ?>"></script>	
        <script src="<?= $this->config->base_url(VENDORPATH . 'bootstrap-datepicker/js/bootstrap-datepicker.js') ?>"></script>	
        <script src="<?= $this->config->base_url(VENDORPATH . 'magnific-popup/magnific-popup.js') ?>"></script>	
        <script src="<?= $this->config->base_url(VENDORPATH . 'jquery-placeholder/jquery.placeholder.js') ?>"></script>	
        <link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'pnotify/pnotify.custom.css') ?> " />
        <script src="<?= $this->config->base_url(VENDORPATH . 'jquery-validation/jquery.validate.js') ?>"></script>
        <script src="<?= $this->config->base_url(VENDORPATH . 'pnotify/pnotify.custom.js') ?>"></script>
        <script src="<?= $this->config->base_url(JSPATH . 'theme.js') ?>"></script>	                
        <script src="<?= $this->config->base_url(JSPATH . 'theme.custom.js') ?>"></script>	                
        <script src="<?= $this->config->base_url(JSPATH . 'theme.init.js') ?>"></script>	                
        <script src="<?= $this->config->base_url(JSPATH . 'ui-elements/examples.modals.js') ?>"></script>
        <script src="<?= $this->config->base_url(JSPATH . 'login.js') ?>"></script>
    </body>
</html>