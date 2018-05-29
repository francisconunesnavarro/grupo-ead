<!doctype html>
<html class="fixed">
    <head>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="<?= $this->config->base_url(IMGPATH . $this->config->item('favicon')) ?>">
        <meta name="description" content="<?= $title ? $title : lang('title') ?>">
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
        <!-- start: page -->
        <section class="body-sign">
            <div class="center-sign">
                <a href="javascript:void(0)" class="logo pull-left">
                    <img src="<?= $this->config->base_url(IMGPATH . 'logo.png') ?>" height="54" alt="<?= $title ? $title : lang('title') ?>" />
                </a>

                <div class="panel panel-sign">
                    <div class="panel-title-sign mt-xl text-right">
                        <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> <?= lang('sign_up') ?></h2>
                    </div>
                    <div class="panel-body">
                        <div class="form-group mb-lg">
                            <label><?= lang('name') ?></label>
                            <input name="name" id="name" type="text" class="form-control input-lg register" />
                        </div>

                        <div class="form-group mb-lg">
                            <label><?= lang('email') ?></label>
                            <input name="email" id="email" type="email" class="form-control input-lg register" />
                        </div>

                        <div class="form-group mb-none">
                            <div class="row">
                                <div class="col-sm-6 mb-lg">
                                    <label><?= lang('password') ?></label>
                                    <input name="pwd" id="password" type="password" class="form-control input-lg register" />
                                </div>
                                <div class="col-sm-6 mb-lg">
                                    <label><?= lang('password_confirmation') ?></label>
                                    <input name="pwd_confirm" id="password_confirmation" type="password" class="form-control input-lg register" />
                                </div>
                            </div>
                        </div>

                        <!--                        <div class="form-group mb-lg">
                                                    <label>Tipo de usuário</label>
                                                    <select id="select_type" class="form-control input-lg register">
                                                        <option value="0" >------</option>
                                                        <option value="1" >Graduandos de Medicina</option>
                                                        <option value="2" >Médicos residentes</option>
                                                        <option value="3" >Médicos assistentes</option>
                                                        <option value="4" >Graduandos de Enfermagem</option>
                                                        <option value="5" >Graduandos de outros cursos da área da saúde</option>
                                                        <option value="6" >Graduandos de cursos de outras áreas que não a saúde</option>
                                                        <option value="7" >Pós-graduandos regularmente matriculados</option>
                                                        <option value="8" >Outros profissionais</option>
                                                    </select>
                                                </div>-->
                        <form id="form_info_res">
                            <div id="form_info" class="form-group mb-lg"></div>
                        </form>
                        <div class="row">
                            <!-- Imput para genero -->
                            <div class="col-md-6">
                                <label>Gênero</label>
                                <select id="genero" class="form-control mb-md">
                                    <option value="0">------</option>
                                    <option value="male" > Masculino</option>
                                    <option value="female" >Feminino</option>
                                    <option value="other" >Outro</option>
                                </select>
                            </div>
                            <!-- Fim imput genero -->

                            <!-- Imput para data nasc -->
                            <label>Data de Nascimento</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <input id="birthday" data-plugin-masked-input data-input-mask="99/99/9999" placeholder="__/__/____" class="form-control">
                            </div>
                            <!-- Fim imput data nasc -->
                        </div>

                            <form id="form_info_res">
                                <div id="form_info" class="form-group mb-lg"></div>
                            </form>
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="checkbox-custom checkbox-default">
                                        <input id="AgreeTerms" name="agreeterms" type="checkbox"/>
                                        <label for="AgreeTerms"><?= lang('i_agree_with') ?> <a class="mb-xs mt-xs mr-xs modal-sizes" href="#modalLG"><?= lang('terms_of_use') ?></a></label>
                                    </div>
                                </div>
                                <div class="col-sm-4 text-right">
                                    <a class="btn btn-primary" href="javascript:void(0)" onclick="save_register()"><?= lang('sign_up') ?></a>

                                </div>
                            </div>
                            <!--
                                                        <span class="mt-lg mb-lg line-thru text-center text-uppercase">
                                                            <span><?= lang('or') ?></span>
                                                        </span>

                                                        <div class="mb-xs text-center">
                                                            <a class="btn btn-facebook mb-md ml-xs mr-xs" href="<?= $this->config->base_url('login/check_facebook_login') ?>"><?= lang('connect_with') ?> <i class="fa fa-facebook"></i></a>
                                                            <a class="btn btn-twitter mb-md ml-xs mr-xs" href="javascript:void(0)"><?= lang('connect_with') ?> <i class="fa fa-twitter"></i></a>
                                                        </div>-->

                            <p class="text-center"><?= lang('already_have_an_account') ?> <a href="<?= $this->config->base_url('home/login') ?>"><?= lang('login') ?></a>

                                <!-- Modal LG -->
                            <div id="modalLG" class="modal-block modal-block-lg mfp-hide">
                                <section class="panel">
                                    <header class="panel-heading">
                                        <h2 class="panel-title"><?= lang('terms_of_use') ?></h2>
                                    </header>
                                    <div class="panel-body">
                                        <div class="modal-wrapper">
                                            <div class="modal-text">
                                                <p><?php $this->load->view('home/termsOfUse') ?></p>
                                            </div>
                                        </div>
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

                        </div>
                    </div>

                </div>
        </section>
        <!-- end: page -->
        <script src="<?= $this->config->base_url(VENDORPATH . 'jquery/jquery.js') ?>"></script>
        <script src="<?= $this->config->base_url(VENDORPATH . 'jquery-browser-mobile/jquery.browser.mobile.js') ?>"></script>
        <script src="<?= $this->config->base_url(VENDORPATH . 'jquery-cookie/jquery.cookie.js') ?>"></script>
        <script src="<?= $this->config->base_url(VENDORPATH . 'bootstrap/js/bootstrap.js') ?>"></script>
        <script src="<?= $this->config->base_url(VENDORPATH . 'nanoscroller/nanoscroller.js') ?>"></script>
        <script src="<?= $this->config->base_url(VENDORPATH . 'bootstrap-datepicker/js/bootstrap-datepicker.js') ?>"></script>
        <script src="<?= $this->config->base_url(VENDORPATH . 'magnific-popup/magnific-popup.js') ?>"></script>
        <script src="<?= $this->config->base_url(VENDORPATH . 'jquery-placeholder/jquery.placeholder.js') ?>"></script>
        <script src="<?= $this->config->base_url(VENDORPATH . 'jquery-maskedinput/jquery.maskedinput.js') ?>"></script>
        <!-- Specific Page Vendor -->
        <link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'pnotify/pnotify.custom.css') ?> " />
        <script src="<?= $this->config->base_url(VENDORPATH . 'jquery-validation/jquery.validate.js') ?>"></script>
        <script src="<?= $this->config->base_url(VENDORPATH . 'pnotify/pnotify.custom.js') ?>"></script>
        <script src="<?= $this->config->base_url(JSPATH . 'theme.js') ?>"></script>
        <script src="<?= $this->config->base_url(JSPATH . 'theme.custom.js') ?>"></script>
        <script src="<?= $this->config->base_url(JSPATH . 'theme.init.js') ?>"></script>
         <!--Colocar o time para resetar o cache-->
        <script src="<?= $this->config->base_url(JSPATH . 'login.js?') . time() ?>"></script>

        <script src="<?= $this->config->base_url(JSPATH . 'ui-elements/examples.modals.js') ?>"></script>
    </body>
</html>
