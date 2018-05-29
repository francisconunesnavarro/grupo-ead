<!doctype html>
<html class="fixed">
    <head>

        <link rel="shortcut icon" href="<?= $this->config->base_url(IMGPATH . $this->config->item('favicon')) ?>">
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <title> 500 </title>

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

        <!-- Head Libs -->
        <script src="<?= $this->config->base_url(VENDORPATH . 'modernizr/modernizr.js') ?>"></script>

    </head>
    <body>
        <!-- start: page -->
        <section class="body-error error-outside">
            <div class="center-error">

                <div class="row">
                    <div class="col-sm-8">
                        <div class="main-error mb-xlg">
                            <h2 class="error-code text-dark text-center text-semibold m-none">500 <i class="fa fa-file"></i></h2>
                            </br>
                            <p class="error-explanation text-center">Algo esta errado.</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <h4 class="text">Faça o login, e tente novamente:</h4>
                        <ul class="nav nav-list primary">
                            <li><a href="<?= $this->config->base_url('home/login') ?>"><i class="fa fa-caret-right text-dark"></i> Login</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- end: page -->

        <!-- Vendor -->
        <script src="<?= $this->config->base_url(VENDORPATH . 'jquery/jquery.js') ?>"></script>
        <script src="<?= $this->config->base_url(VENDORPATH . 'jquery-browser-mobile/jquery.browser.mobile.js') ?>"></script>
        <script src="<?= $this->config->base_url(VENDORPATH . 'jquery-cookie/jquery.cookie.js') ?>"></script>
        <script src="<?= $this->config->base_url(VENDORPATH . 'nanoscroller/nanoscroller.js') ?>"></script>
        <script src="<?= $this->config->base_url(VENDORPATH . 'bootstrap/js/bootstrap.js') ?>"></script>	
        <script src="<?= $this->config->base_url(VENDORPATH . 'bootstrap-datepicker/js/bootstrap-datepicker.js') ?>"></script>
        <script src="<?= $this->config->base_url(VENDORPATH . 'magnific-popup/magnific-popup.js') ?>"></script>
        <script src="<?= $this->config->base_url(VENDORPATH . 'jquery-placeholder/jquery.placeholder.js') ?>"></script>

        <!-- Specific Page Vendor -->
        <script src="<?= $this->config->base_url(VENDORPATH . 'select2/select2.js') ?>"></script>
        <script src="<?= $this->config->base_url(VENDORPATH . 'jquery-datatables/media/js/jquery.dataTables.js') ?>"></script>
        <script src="<?= $this->config->base_url(VENDORPATH . 'jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js') ?>"></script>
        <script src="<?= $this->config->base_url(VENDORPATH . 'jquery-datatables-bs3/assets/js/datatables.js') ?>"></script>

        <!-- Theme Base, Components and Settings --> 
        <script src="<?= $this->config->base_url(JSPATH . 'theme.js') ?>"></script>

        <!-- Theme Custom -->
        <script src="<?= $this->config->base_url(JSPATH . 'theme.custom.js') ?>"></script>

        <!-- Theme Initialization Files -->
        <script src="<?= $this->config->base_url(JSPATH . 'theme.init.js') ?>"></script>

    </body>
</html>