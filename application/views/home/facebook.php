<!DOCTYPE html>
<html class="fixed">
    <head>
        <link rel="shortcut icon" href="<?= $this->config->base_url(IMGPATH . $this->config->item('favicon')) ?>">
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <title> <?= isset($title) ? $title : lang('title') ?> - <?= lang('site_title') ?></title>

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <!-- Web Fonts  -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Raleway:100' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'font-awesome/css/font-awesome.css') ?>" />

        <!-- Vendor CSS -->
        <link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'bootstrap/css/bootstrap.css') ?> " />
        <link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'magnific-popup/magnific-popup.css') ?> " />
        <link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'bootstrap-datepicker/css/datepicker3.css') ?> " />

        <!-- Theme CSS -->
        <link rel="stylesheet" href="<?= $this->config->base_url(CSSPATH . $this->config->item('theme')) ?>" />

        <!-- Specific Page Vendor CSS -->
        <link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'pnotify/pnotify.custom.css') ?> " />
        <link rel="stylesheet" href="<?= $this->config->base_url(VENDORPATH . 'select2/select2.css') ?>" />

        <!-- Head Libs -->
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
    </head>
    <?php $this->user = $this->session->userdata('user'); ?>
    <body data-baseurl="<?= $this->config->base_url(); ?>">
        <section class="body">

            <!-- start: header -->
            <header style="background-color: #3b5998 !important;">
                <div class="logo-container">
                    <img src="<?= $this->config->base_url(IMGPATH . 'logo.png') ?>" height="40" style=" margin: 10px;" />
                    <img src="<?= $this->config->base_url(IMGPATH . 'facebook.png') ?>" height="40" style=" margin: 10px;" />
                </div>
            </header>
            <!-- end: header -->

            <div class="inner-wrapper" style="background-color: #dfe3ee">
                <section role="main" class="content-body" >
                    <h2>Conectar com o facebook</h2>
                    <h3>O sistema não publicará em sua linha do tempo por voce.</h3>
                    <h3>Vamos apenas utilizar os dados do face para criar sua conta no EaD.</h3>
                    </br>
                    <a class="btn btn-facebook mb-md ml-xs mr-xs" href="<?= $login_url ?>"><?= lang('connect_with') ?> <i class="fa fa-facebook"></i></a>
                </section>
            </div>
        </section>

        <!-- Vendor -->
        <script src="<?= $this->config->base_url(VENDORPATH . 'bootstrap/js/bootstrap.js') ?>"></script>
        <script src="<?= $this->config->base_url(VENDORPATH . 'jquery-browser-mobile/jquery.browser.mobile.js') ?>"></script>
        <script src="<?= $this->config->base_url(VENDORPATH . 'jquery-cookie/jquery.cookie.js') ?>"></script>
        <script src="<?= $this->config->base_url(VENDORPATH . 'nanoscroller/nanoscroller.js') ?>"></script>
        <script src="<?= $this->config->base_url(VENDORPATH . 'bootstrap-datepicker/js/bootstrap-datepicker.js') ?>"></script>
        <script src="<?= $this->config->base_url(VENDORPATH . 'magnific-popup/magnific-popup.js') ?>"></script>
        <script src="<?= $this->config->base_url(VENDORPATH . 'jquery-placeholder/jquery.placeholder.js') ?>"></script>

        <!-- Specific Page Vendor -->
        <script src="<?= $this->config->base_url(VENDORPATH . 'select2/select2.js') ?>"></script>
        <script src="<?= $this->config->base_url(VENDORPATH . 'jquery-validation/jquery.validate.js') ?>"></script>
        <script src="<?= $this->config->base_url(VENDORPATH . 'pnotify/pnotify.custom.js') ?>"></script>

        <!-- Theme Base, Components and Settings --> 
        <script src="<?= $this->config->base_url(JSPATH . 'theme.js') ?>"></script>

        <!-- Theme Custom -->
        <script src="<?= $this->config->base_url(JSPATH . 'theme.custom.js') ?>"></script>

        <!-- Theme Initialization Files -->
        <script src="<?= $this->config->base_url(JSPATH . 'theme.init.js') ?>"></script>

    </body>
</html>